<?php 
class Administradores extends Controllers{
    public function __construct()
    {
        parent:: __construct();   
        session_start();
        if(empty($_SESSION['login3']))
        {
            header('Location: '.base_url());
        }
    }
    public function administradores(){
        $data['page_id']  = 23;
       $data['page_tag'] = "Administrador";
       $data['page_title'] = "Página para administradores";
       $data['page_name'] = "administrador";
        $this->views->getView($this,"administradores",$data);
    }

    public function setAdministrador()
    {
        if ($_POST) {

            
             if (empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtDireccion']) || empty($_POST['txtEmail']) || empty($_POST['listRolid']) || empty($_POST['listStatus'])) {
                 $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
             } else {
                
                $idEstudiante = intval($_POST['idAdministrador']);
                $strNombre = ucwords(strClean($_POST['txtNombre']));
                $strApellido = ucwords(strClean($_POST['txtApellido']));
                $strDireccion = ucwords(strClean($_POST['txtDireccion']));
                $strEmail = strtolower(strClean($_POST['txtEmail']));
                
       
                $intTipoId = intval(strClean($_POST['listRolid']));
                $intStatus = intval(strClean($_POST['listStatus']));
                
                if($idEstudiante == 0){
                    $option = 1;
                    $strPassword =  empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);
                    $request_user = $this->model->insertAdministrador(
                        
                        $strNombre,
                        $strApellido,
                        $strDireccion,
                        $strEmail,
                        $strPassword,
                     
                        $intTipoId,
                        $intStatus
                    );

                }else{
                    $option = 2;
                    $strPassword =  empty($_POST['txtPassword']) ? "" : hash("SHA256",$_POST['txtPassword']);
                    $request_user = $this->model->updateAdministrador(
                        $idEstudiante,
                        $strNombre,
                        $strApellido,
                        $strDireccion,
                        $strEmail,
                        $strPassword,
                      
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

      //Metodo para invocar todos los administradores
      public function getAdministradores(){
        $arrData  = $this->model->selectAdministradores();
        for ($i=0; $i < count($arrData); $i++) {

            if($arrData[$i]['status'] == 1)
            {
                $arrData[$i]['status'] = '<span class="badge badge-secondary bg-secondary">Activo</span>';
            }else{
                $arrData[$i]['status'] = '<span class="badge badge-danger bg-danger">Inactivo</span>';
            }

            $arrData[$i]['options'] = '<div class="text-center">
            <button class="btn btn-sm btnViewAdministrador" onClick="fntViewAdministrador('.$arrData[$i]['idAdministrador'].')" title="Ver Administrador"><img src="Assets/images/ver.png" alt="Ver" width="25" title="Ver Administrador"></button>

            <button class="btn btn-sm btnEditAdministrador" onClick="fntEditAdministrador('.$arrData[$i]['idAdministrador'].')" title="Editar estudiante"><img src="Assets/images/lapiz2.png" alt="Editar" width="25" title="Editar"></button>

            <button class="btn btn-sm btnDelAdministrador" onClick="fntDelAdministrador('.$arrData[$i]['idAdministrador'].')" title="Eliminar">
            <img src="Assets/images/basurero.png" alt="Editar" width="22" title="Eliminar estudiante"></button>
            </div>';
        }
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        die();
    }
 
}
?>