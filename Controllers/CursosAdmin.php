<?php 
class CursosAdmin extends Controllers{
    public function __construct()
    {
        parent:: __construct();   
        session_start();
        if(empty($_SESSION['login3']))
        {
            header('Location: '.base_url());
        }
    }
    public function cursosAdmin(){
        $data['page_id']  = 12;
       $data['page_tag'] = "Cursos Administrador";
       $data['page_title'] = "Cursos Administrador";
       $data['page_name'] = "Cursos Administrador";
        $this->views->getView($this,"cursosAdmin",$data);
    }

    public function setCurso(){
			
        $intIdcurso = intval($_POST['idCurso']);
        $strNombre =  strClean($_POST['txtNombre']);
        $intCodigo = intval($_POST['txtCodigo']);
        $intStatus = intval($_POST['listStatus']);

        if($intIdcurso == 0)
        {
            //Crear
            $request_rol = $this->model->insertCurso($intCodigo,$strNombre,$intStatus);
            $option = 1;
        }else{
            //Actualizar
            $request_rol = $this->model->updateCurso($intIdcurso,$intCodigo,$strNombre,$intStatus);
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
            
            $arrResponse = array('status' => false, 'msg' => '¡Atención! El Rol ya existe.');
        }else{
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

    //Obtener un curso para luego ser editado
    public function getCurso(int $idcurso)
		{
			$intIdcurso = intval(strClean($idcurso));
			if($intIdcurso > 0)
			{
				$arrData = $this->model->selectCurso($intIdcurso);
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

        	//Funcion para mostrar cursos en profesores Admin
		public function getSelectCursos()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectCursos();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idCurso'].'">'.$arrData[$i]['codigoCurso']." ".$arrData[$i]['nombreCurso'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}


     //Metodo para invocar todos los cursos
     public function getCursos(){
        $arrData  = $this->model->selectCursos();
        for ($i=0; $i < count($arrData); $i++) {

            if($arrData[$i]['status'] == 1)
            {
                $arrData[$i]['status'] = '<span class="badge badge-secondary bg-secondary">Activo</span>';
            }else{
                $arrData[$i]['status'] = '<span class="badge badge-danger bg-danger">Inactivo</span>';
            }

            $arrData[$i]['options'] = '<div class="text-center">
            <button class="btn btn-sm btnEditCurso" onClick="fntEditCurso('.$arrData[$i]['idCurso'].')" title="Editar curso"><img src="Assets/images/lapiz2.png" alt="Editar" width="25" title="Editar curso"></button>
            <button class="btn btn-sm btnDelCurso" onClick="fntDelCurso('.$arrData[$i]['idCurso'].')" title="Eliminar">
            <img src="Assets/images/basurero.png" alt="Editar" width="22" title="Eliminar curso"></button>
            </div>';
        }
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        die();
    }

    //Funcion para eliminar un curso
		public function delCurso()
		{
			if($_POST){
				$intIdCurso = intval($_POST['idCurso']);
				$requestDelete = $this->model->deleteCurso($intIdCurso);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el usuario');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el usuario.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}


}
?>