<?php
class EstudiantesAdmin extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        if(empty($_SESSION['login3']))
        {
            header('Location: '.base_url());
        }
    }
    public function estudiantesAdmin()
    {
        // $data['page_id']  = 11;
        $data['page_tag'] = "Estudiantes Admin";
        $data['page_title'] = "Estudiantes Admin";
        $data['page_name'] = "Estudiantes Admin";
        $data['page_functions_js'] ="functions_estudiantes.js";
        $this->views->getView($this, "estudiantesAdmin", $data);
    }

    public function setEstudiante()
    {
        if ($_POST) {

            
            // if (empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtDireccion']) || empty($_POST['txtEmail']) || empty($_POST['listCarreraid']) || empty($_POST['listGradoid']) || empty($_POST['listSeccionid']) || empty($_POST['listRolid']) || empty($_POST['listStatus'])) {
            //     $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
            // } else {
                
                $idEstudiante = intval($_POST['idEstudiante']);
                $strNombre = ucwords(strClean($_POST['txtNombre']));
                $strApellido = ucwords(strClean($_POST['txtApellido']));
                $strDireccion = ucwords(strClean($_POST['txtDireccion']));
                $strEmail = strtolower(strClean($_POST['txtEmail']));
                
                $intCarreraId = intval(strClean($_POST['listCarreraid']));
                $intGradoId = intval(strClean($_POST['listGradoid']));
                $intSeccionId = intval(strClean($_POST['listSeccionid']));
                $intTipoId = intval(strClean($_POST['listRolid']));
                $intStatus = intval(strClean($_POST['listStatus']));
                
                if($idEstudiante == 0){
                    $option = 1;
                    $strPassword =  empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);
                    $request_user = $this->model->insertEstudiante(
                        
                        $strNombre,
                        $strApellido,
                        $strDireccion,
                        $strEmail,
                        $strPassword,
                        $intCarreraId,
                        $intGradoId,
                        $intSeccionId,
                        $intTipoId,
                        $intStatus
                    );

                }else{
                    $option = 2;
                    $strPassword =  empty($_POST['txtPassword']) ? "" : hash("SHA256",$_POST['txtPassword']);
                    $request_user = $this->model->updateEstudiante(
                        $idEstudiante,
                        $strNombre,
                        $strApellido,
                        $strDireccion,
                        $strEmail,
                        $strPassword,
                        $intCarreraId,
                        $intGradoId,
                        $intSeccionId,
                        $intTipoId,
                        $intStatus
                    );
                }


               
                if ($request_user > 0) {
                    if($option == 1){
                        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                    }else{
                        $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                    }
                    } else if ($request_user == 'exist') {
                    $arrResponse = array('status' => false, 'msg' => '¡Atención! el email o la identificación ya existe, ingrese otro.');
                } else {
                    $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                }
            // }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    //Metodo para invocar todos los estudiantes
    public function getEstudiantes(){
        $arrData  = $this->model->selectEstudiantes();
        for ($i=0; $i < count($arrData); $i++) {

            if($arrData[$i]['status'] == 1)
            {
                $arrData[$i]['status'] = '<span class="badge badge-secondary bg-secondary">Activo</span>';
            }else{
                $arrData[$i]['status'] = '<span class="badge badge-danger bg-danger">Inactivo</span>';
            }

            $arrData[$i]['options'] = '<div class="text-center">
            <button class="btn btn-sm btnViewEstudiante" onClick="fntViewEstudiante('.$arrData[$i]['idEstudiante'].')" title="Ver estudiante"><img src="Assets/images/ver.png" alt="Editar" width="25" title="Ver estudiante"></button>

            <button class="btn btn-sm btnEditEstudiante" onClick="fntEditEstudiante('.$arrData[$i]['idEstudiante'].')" title="Editar estudiante"><img src="Assets/images/lapiz2.png" alt="Editar" width="25" title="Editar estudiante"></button>


            <button class="btn btn-sm btnDelEstudiante" onClick="fntDelEstudiante('.$arrData[$i]['idEstudiante'].')" title="Eliminar">
            <img src="Assets/images/basurero.png" alt="Editar" width="22" title="Eliminar estudiante"></button>
            </div>';
        }
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        die();
    }

    //Para extraer informacion de un estudiate
    public function getEstudiante(int $idestudiante){
        $idestudiante = intval($idestudiante);
        if($idestudiante > 0 )
        {
            $arrData = $this->model->selectEstudiante($idestudiante);
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


    
		//Funcion para eliminar un estudiante
		public function delEstudiante()
		{
			if($_POST){
				$intIdEstudiante = intval($_POST['idEstudiante']);
				$requestDelete = $this->model->deleteEstudiante($intIdEstudiante);
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