<?php 
class Actividades extends Controllers{
    public function __construct()
    {
        parent:: __construct();   
        session_start();
        if(empty($_SESSION['login2']))
        {
            header('Location: '.base_url());
        } 
    }
    public function actividades(){
        $data['page_id']  = 26;
       $data['page_tag'] = "Actividades";
       $data['page_title'] = "Página principal";
       $data['page_name'] = "actividades";
        $this->views->getView($this,"actividades",$data);
    }


    public function getActividades()
    {
        $arrData = $this->model->selectActividades();

        for ($i=0; $i < count($arrData); $i++) {

            if($arrData[$i]['status'] == 1)
            {
                $arrData[$i]['status'] = '<span class="badge badge-secondary bg-secondary">Activo</span>';
            }else{
                $arrData[$i]['status'] = '<span class="badge badge-danger bg-danger">Inactivo</span>';
            }

            $arrData[$i]['options'] = '<div class="text-center">
            <a href="/inmac/notas">
            <button class="btn btn-sm btnEditCarrera" onClick="fntEditCarrera('.$arrData[$i]['idActividad'].')" title="Editar"><img src="Assets/images/leyendo.png" alt="Editar" width="35" title="Editar"></button>
            </a>
          
            <button class="btn btn-sm btnEditCarrera" onClick="fntEditCarrera('.$arrData[$i]['idActividad'].')" title="Editar"><img src="Assets/images/lapiz2.png" alt="Editar" width="22" title="Editar"></button>
            <button class="btn btn-sm btnDelCarrera" onClick="fntDelCarrera('.$arrData[$i]['idActividad'].')" title="Eliminar">
            <img src="Assets/images/basurero.png" alt="Editar" width="22" title="Editar"></button>
            </div>';
        }
    
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        die();
    }





    public function setActividad(){
			
        $intIdactividad = intval($_POST['idActividad']);
        $strNombre =  strClean($_POST['txtNombre']);
        $strFecha = $_POST['txtFecha'];
        $intValor = $_POST['txtValor'];
        $intStatus = intval($_POST['listStatus']);

        if($intIdactividad == 0)
        {
            //Crear
            $request_rol = $this->model->insertActividad($strNombre,$strFecha, $intValor, $intStatus);
            $option = 1;
        }else{
            //Actualizar
            $request_rol = $this->model->updateActividad($intIdactividad, $strNombre,$strFecha,$intStatus);
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
}
?>