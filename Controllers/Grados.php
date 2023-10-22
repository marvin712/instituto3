<?php 
class Grados extends Controllers{
    public function __construct()
    {
        parent:: __construct();   
        session_start();
        if(empty($_SESSION['login3']))
        {
            header('Location: '.base_url());
        }
    }
    public function grados(){
        $data['page_id']  = 18;
       $data['page_tag'] = "Grados";
       $data['page_title'] = "Página grados";
       $data['page_name'] = "grados";
        $this->views->getView($this,"grados",$data);
    }

    public function getGrados()
    {
        $arrData = $this->model->selectGrados();

        for ($i=0; $i < count($arrData); $i++) {

            if($arrData[$i]['status'] == 1)
            {
                $arrData[$i]['status'] = '<span class="badge badge-secondary bg-secondary">Activo</span>';
            }else{
                $arrData[$i]['status'] = '<span class="badge badge-danger bg-danger">Inactivo</span>';
            }

            $arrData[$i]['options'] = '<div class="text-center">
       
            <button class="btn btn-sm btnEditGrado" onClick="fntEditGrado('.$arrData[$i]['idGrado'].')" title="Editar"><img src="Assets/images/lapiz2.png" alt="Editar" width="22" title="Editar"></button>
            <button class="btn btn-sm btnDelGrado" onClick="fntDelGrado('.$arrData[$i]['idGrado'].')" title="Eliminar">
            <img src="Assets/images/basurero.png" alt="Editar" width="22" title="Editar"></button>
            </div>';
        }
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        die();
    }


    public function setGrado(){
			
        $intIdgrado = intval($_POST['idGrado']);
        $strNombre =  strClean($_POST['txtNombre']);
        $intStatus = intval($_POST['listStatus']);

        if($intIdgrado == 0)
        {
            //Crear
            $request_rol = $this->model->insertGrado($strNombre,$intStatus);
            $option = 1;
        }else{
            //Actualizar
            $request_rol = $this->model->updateGrado($intIdgrado, $strNombre,$intStatus);
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
            
            $arrResponse = array('status' => false, 'msg' => '¡Atención! El grado ya existe.');
        }else{
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

    	//Funcion para mostrar grados en estudiantes Admin
		public function getSelectGrados()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectGrados();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idGrado'].'">'.$arrData[$i]['nombreGrado'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}


      //Obtener un grado para luego ser editado
      public function getGrado(int $idgrado){
          $intIdgrado = intval(strClean($idgrado));
          if($intIdgrado > 0)
          {
              $arrData = $this->model->selectGrado($intIdgrado);
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
		public function delGrado()
		{
			if($_POST){
				$intIdGrado = intval($_POST['idGrado']);
				$requestDelete = $this->model->deleteGrado($intIdGrado);
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