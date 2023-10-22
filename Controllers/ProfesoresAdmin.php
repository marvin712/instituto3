<?php
class ProfesoresAdmin extends Controllers
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
    public function profesoresAdmin()
    {
        // $data['page_id']  = 11;
        $data['page_tag'] = "Profesores Admin";
        $data['page_title'] = "Profesores Admin";
        $data['page_name'] = "Profesores Admin";
        $this->views->getView($this,"profesoresAdmin", $data);
    }

    public function setProfesor()
    {
        if ($_POST) {

            if (empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtDireccion']) || empty($_POST['txtEmail']) || empty($_POST['listRolid']) || empty($_POST['listStatus'])) {
                $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
            } else {
                
                $idProfesor = intval($_POST['idProfesor']);
                $strNombre = ucwords(strClean($_POST['txtNombre']));
                $strApellido = ucwords(strClean($_POST['txtApellido']));
                $strDireccion = ucwords(strClean($_POST['txtDireccion']));
                $strEmail = strtolower(strClean($_POST['txtEmail']));
                
                // $intCursoId = intval(strClean($_POST['listCursoid']));
                // $intCarreraId = intval(strClean($_POST['listCarreraid']));
                // $intGradoId = intval(strClean($_POST['listGradoid']));
                // $intSeccionId = intval(strClean($_POST['listSeccionid']));


                $intTipoId = intval(strClean($_POST['listRolid']));
                $intStatus = intval(strClean($_POST['listStatus']));
                
                if($idProfesor == 0){
                    $option = 1;
                    $strPassword =  empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);
                    $request_user = $this->model->insertProfesor(
                        
                        $strNombre,
                        $strApellido,
                        $strDireccion,
                        $strEmail,
                        $strPassword,
                        // $intCursoId,
                        // $intCarreraId,
                        // $intGradoId,
                        // $intSeccionId,
                        $intTipoId,
                        $intStatus
                    );

                }else{
                    $option = 2;
                    $strPassword =  empty($_POST['txtPassword']) ? "" : hash("SHA256",$_POST['txtPassword']);
                    $request_user = $this->model->updateProfesor(
                        $idProfesor,
                        $strNombre,
                        $strApellido,
                        $strDireccion,
                        $strEmail,
                        $strPassword,
                        // $intCursoId,
                        // $intCarreraId,
                        // $intGradoId,
                        // $intSeccionId,
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
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }

  //Metodo para invocar todos los profesores
  public function getProfesores(){
    $arrData  = $this->model->selectProfesores();
    for ($i=0; $i < count($arrData); $i++) {

        if($arrData[$i]['status'] == 1)
        {
            $arrData[$i]['status'] = '<span class="badge badge-secondary bg-secondary">Activo</span>';
        }else{
            $arrData[$i]['status'] = '<span class="badge badge-danger bg-danger">Inactivo</span>';
        }

        $arrData[$i]['options'] = '<div class="text-center">
        <button class="btn btn-sm btnViewProfesor" onClick="fntViewProfesor('.$arrData[$i]['idProfesor'].')" title="Ver estudiante"><img src="Assets/images/ver.png" alt="Editar" width="25" title="Ver estudiante"></button>

        <button class="btn btn-sm btnEditProfesor" onClick="fntEditProfesor('.$arrData[$i]['idProfesor'].')" title="Editar estudiante"><img src="Assets/images/lapiz2.png" alt="Editar" width="25" title="Editar estudiante"></button>


        <button class="btn btn-sm btnDelProfesor" onClick="fntDelProfesor('.$arrData[$i]['idProfesor'].')" title="Eliminar">
        <img src="Assets/images/basurero.png" alt="Editar" width="22" title="Eliminar estudiante"></button>
        </div>';
    }
    echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
    die();
}


    //Para extraer informacion de un profesor
    public function getProfesor(int $idprofesor){
        $idprofesor = intval($idprofesor);
        if($idprofesor > 0 )
        {
            $arrData = $this->model->selectProfesor($idprofesor);
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

    //Funcion para eliminar un profesor
		public function delProfesor()
		{
			if($_POST){
				$intIdProfesor = intval($_POST['idProfesor']);
				$requestDelete = $this->model->deleteProfesor($intIdProfesor);
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

       
//Funcion para mostrar profesores en asignaturas
public function getSelectProfesores()
{
    $htmlOptions = "";
    $arrData = $this->model->selectProfesores();
    if(count($arrData) > 0 ){
        for ($i=0; $i < count($arrData); $i++) { 
            if($arrData[$i]['status'] == 1 ){
            $htmlOptions .= '<option value="'.$arrData[$i]['idProfesor'].'">'.$arrData[$i]['nombreProfesor'].'</option>';
            }
        }
    }
    echo $htmlOptions;
    die();		
}


}

?>