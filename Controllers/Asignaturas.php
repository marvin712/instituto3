<?php 
class Asignaturas extends Controllers{
    public function __construct()
    {
        parent:: __construct();   
        session_start();
        if(empty($_SESSION['login3']))
        {
            header('Location: '.base_url());
        } 
    }
    public function asignaturas(){
        $data['page_id']  = 25;
       $data['page_tag'] = "Asignatura";
       $data['page_title'] = "Página Asignatura de profesores";
       $data['page_name'] = "home";
        $this->views->getView($this,"asignaturas",$data);
    }

    
     //Metodo para invocar todas las asignaturas
     public function getAsignaturas(){
        $arrData  = $this->model->selectAsignaturas();
        for ($i=0; $i < count($arrData); $i++) {

            if($arrData[$i]['status'] == 1)
            {
                $arrData[$i]['status'] = '<span class="badge badge-secondary bg-secondary">Activo</span>';
            }else{
                $arrData[$i]['status'] = '<span class="badge badge-danger bg-danger">Inactivo</span>';
            }

            $arrData[$i]['options'] = '<div class="text-center">
            <button class="btn btn-sm btnEditCurso" onClick="fntEditAsignatura('.$arrData[$i]['idCurso'].')" title="Editar curso"><img src="Assets/images/lapiz2.png" alt="Editar" width="25" title="Editar curso"></button>
            <button class="btn btn-sm btnDelCurso" onClick="fntDelAsignatura('.$arrData[$i]['idCurso'].')" title="Eliminar">
            <img src="Assets/images/basurero.png" alt="Editar" width="22" title="Eliminar curso"></button>
            </div>';
        }
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function setAsignatura(){
			
        $intIdasignatura = intval($_POST['idAsignatura']);
        $intProfesor =  intval($_POST['listProfesorid']);
        $intCurso = intval($_POST['listCursoid']);
        $intCarrera = intval($_POST['listCarreraid']);
        $intGrado = intval($_POST['listGradoid']);
        $intSeccion = intval($_POST['listSeccionid']);
        $intStatus = intval($_POST['listStatus']);

        if($intIdasignatura == 0)
        {
            //Crear
            $request_rol = $this->model->insertAsignatura($intProfesor,$intCurso,$intCarrera, $intGrado, $intSeccion, $intStatus);
            $option = 1;
        }else{
            //Actualizar
            $request_rol = $this->model->updateCarrera($intIdasignatura, $intProfesor,$intCurso,$intCarrera, $intGrado, $intSeccion, $intStatus);
            $option = 2;
        }

        if($request_rol > 0 )
        {
            if($option == 1)
            {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            }else{
                $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
            }
        }else if($request_rol == 'exist'){
            
            $arrResponse = array('status' => false, 'msg' => '¡Atención! La Carrera ya existe.');
        }else{
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

     //Para extraer informacion de un estudiate
     public function getAsignatura(int $id){
        $idestudiante = intval($id);
        if($idestudiante > 0 )
        {
            $arrData = $this->model->selectAsignatura($idestudiante);
            if(empty($arrData))
            {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            }else{
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }


}
?>