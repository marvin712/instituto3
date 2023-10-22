<?php 
class Carreras extends Controllers{
    public function __construct()
    {
        parent:: __construct();  
        session_start();
        if(empty($_SESSION['login3']))
        {
            header('Location: '.base_url());
        } 
    }
    public function carreras(){
        $data['page_id']  = 17;
       $data['page_tag'] = "Carreras";
       $data['page_title'] = "Página carreras";
       $data['page_name'] = "carreras";
        $this->views->getView($this,"carreras",$data);
    }

    public function getCarreras()
    {
        $arrData = $this->model->selectCarreras();

        for ($i=0; $i < count($arrData); $i++) {

            if($arrData[$i]['status'] == 1)
            {
                $arrData[$i]['status'] = '<span class="badge badge-secondary bg-secondary">Activo</span>';
            }else{
                $arrData[$i]['status'] = '<span class="badge badge-danger bg-danger">Inactivo</span>';
            }

            $arrData[$i]['options'] = '<div class="text-center">
       
            <button class="btn btn-sm btnEditCarrera" onClick="fntEditCarrera('.$arrData[$i]['idCarrera'].')" title="Editar"><img src="Assets/images/lapiz2.png" alt="Editar" width="22" title="Editar"></button>
            <button class="btn btn-sm btnDelCarrera" onClick="fntDelCarrera('.$arrData[$i]['idCarrera'].')" title="Eliminar">
            <img src="Assets/images/basurero.png" alt="Editar" width="22" title="Editar"></button>
            </div>';
        }
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        die();
    }


    public function setCarrera(){
			
        $intIdcarrera = intval($_POST['idCarrera']);
        $strNombre =  strClean($_POST['txtNombre']);
        $intDuracion = intval($_POST['txtDuracion']);
        $intStatus = intval($_POST['listStatus']);

        if($intIdcarrera == 0)
        {
            //Crear
            $request_rol = $this->model->insertCarrera($strNombre,$intDuracion, $intStatus);
            $option = 1;
        }else{
            //Actualizar
            $request_rol = $this->model->updateCarrera($intIdcarrera, $strNombre,$intDuracion,$intStatus);
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

    	//Funcion para mostrar carreras en estudiantes Admin
		public function getSelectCarreras()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectCarreras();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idCarrera'].'">'.$arrData[$i]['nombreCarrera'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}


        //Obtener una carrera para luego ser editada
        public function getCarrera(int $idcarrera)
		{
			$intIdcarrera = intval(strClean($idcarrera));
			if($intIdcarrera > 0)
			{
				$arrData = $this->model->selectCarrera($intIdcarrera);
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


        //Funcion para eliminar
		public function delCarrera()
		{
			if($_POST){
				$intIdCarrera = intval($_POST['idCarrera']);
				$requestDelete = $this->model->deleteCarrera($intIdCarrera);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la carrera');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la carrera.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

}
?>