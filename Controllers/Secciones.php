<?php 
class Secciones extends Controllers{
    public function __construct()
    {
        parent:: __construct();   
        session_start();
        if(empty($_SESSION['login3']))
        {
            header('Location: '.base_url());
        }
    }
    public function secciones(){
        $data['page_id']  = 19;
       $data['page_tag'] = "Secciones";
       $data['page_title'] = "Página secciones";
       $data['page_name'] = "secciones";
        $this->views->getView($this,"secciones",$data);
    }

    //Funcion para llamar a todos los registros y mostrarlos en una tabla
    public function getSecciones()
		{
			$arrData = $this->model->selectSecciones();

			for ($i=0; $i < count($arrData); $i++) {

				if($arrData[$i]['status'] == 1)
				{
					$arrData[$i]['status'] = '<span class="badge badge-secondary bg-secondary">Activo</span>';
				}else{
					$arrData[$i]['status'] = '<span class="badge badge-danger bg-danger">Inactivo</span>';
				}

				$arrData[$i]['options'] = '<div class="text-center">
			
				<button class="btn btn-sm btnEditSeccion" onClick="fntEditSeccion('.$arrData[$i]['idSeccion'].')" title="Editar"><img src="Assets/images/lapiz2.png" alt="Editar" width="22" title="Editar"></button>
				<button class="btn btn-sm btnDelSeccion" onClick="fntDelSeccion('.$arrData[$i]['idSeccion'].')" title="Eliminar">
				<img src="Assets/images/basurero.png" alt="Editar" width="22" title="Editar"></button>
				</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

        public function setSeccion(){
			
            $intIdseccion = intval($_POST['idSeccion']);
            $strNombre =  strClean($_POST['txtNombre']);
            $intStatus = intval($_POST['listStatus']);
    
            if($intIdseccion == 0)
            {
                //Crear
                $request_rol = $this->model->insertSeccion($strNombre,$intStatus);
                $option = 1;
            }else{
                //Actualizar
                $request_rol = $this->model->updateSeccion($intIdseccion, $strNombre,$intStatus);
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
                
                $arrResponse = array('status' => false, 'msg' => '¡Atención! La Sección ya existe.');
            }else{
                $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }
    

    public function getSeccion(int $idseccion)
    {
        $intIdseccion = intval(strClean($idseccion));
        if($intIdseccion > 0)
        {
            $arrData = $this->model->selectSeccion($intIdseccion);
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
    	//Funcion para mostrar secciones en estudiantes Admin
		public function getSelectSecciones()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectSecciones();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idSeccion'].'">'.$arrData[$i]['nombreSeccion'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}



      //Funcion para eliminar
		public function delSeccion()
		{
			if($_POST){
				$intIdSeccion = intval($_POST['idSeccion']);
				$requestDelete = $this->model->deleteSeccion($intIdSeccion);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la Sección');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la Sección.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

}
?>