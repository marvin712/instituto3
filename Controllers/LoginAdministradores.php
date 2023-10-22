<?php 
class LoginAdministradores extends Controllers{
    public function __construct()
    {
        session_start();
        if(isset($_SESSION['login3']))
        {   
                header('Location: '.base_url().'/dashboard');   
        }
        
        parent:: __construct();   
    }
    public function loginAdministradores(){
        $data['page_id']  = 24;
       $data['page_tag'] = "Login Administradores";
       $data['page_title'] = "Iniciar sesión";
       $data['page_name'] = "login Administrador";
       $data['page_functions_js'] ="functions_loginAdministradores.js";
        $this->views->getView($this,"loginAdministradores",$data);
    }

    public function loginUserAdministradores(){
    	if($_POST){
            if(empty($_POST['txtEmail']) || empty($_POST['txtPassword'])){
                $arrResponse = array('status' => false, 'msg' => 'Error de datos' );
            }else{
                $strUsuario  =  strtolower(strClean($_POST['txtEmail']));
                $strPassword = hash("SHA256",$_POST['txtPassword']);
                $requestUser = $this->model->loginUser($strUsuario, $strPassword);
                
                if(empty($requestUser)){
                    $arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña es incorrecto.' ); 
                }else{
                    $arrData = $requestUser;
                    if($arrData['status'] == 1){
                        $_SESSION['idUser'] = $arrData['idAdministrador'];
                        $_SESSION['login3'] = true;		

                        
                        $arrData = $this->model->sessionLogin($_SESSION['idUser']);	
                        $_SESSION['userData']=$arrData;		
                     

                        $arrResponse = array('status' => true, 'msg' => 'ok');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Usuario inactivo.');
                    }
            }
        

            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
?>