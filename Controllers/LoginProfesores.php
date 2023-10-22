<?php 
class LoginProfesores extends Controllers{
    public function __construct()
    {
        session_start();
        if(isset($_SESSION['login2']))
        {   
                header('Location: '.base_url().'/profesores');   
        }
        parent:: __construct();   
        
    }
    public function loginProfesores(){
        $data['page_id']  = 14;
       $data['page_tag'] = "Login profesores";
       $data['page_title'] = "Iniciar sesión";
       $data['page_name'] = "login";
       $data['page_functions_js'] ="functions_loginProfesores.js";
        $this->views->getView($this,"loginProfesores",$data);
    }

    public function loginUserProfesores(){
    	if($_POST){
            if(empty($_POST['txtEmail']) || empty($_POST['txtPassword'])){
                $arrResponse = array('status' => false, 'msg' => 'Error de datos' );
            }else{
                $strUsuario  =  strtolower(strClean($_POST['txtEmail']));
                $strPassword = hash("SHA256",$_POST['txtPassword']);
                $requestUser = $this->model->loginUserProfesores($strUsuario, $strPassword);
                
                if(empty($requestUser)){
                    $arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña es incorrecto del profesor.' ); 
                }else{
                    $arrData = $requestUser;
                    if($arrData['status'] == 1){
                        $_SESSION['idUser'] = $arrData['idProfesor'];
                        $_SESSION['login2'] = true;	
                        
                        
                        $arrData = $this->model->sessionLogin($_SESSION['idUser']);	
                        $_SESSION['userData']=$arrData;		

                        $arrData = $this->model->sessionCursos($_SESSION['idUser']);
                        $_SESSION['userCurso']=$arrData;		

                        $arrData = $this->model->sessionNombreCurso($_SESSION['idUser']);
                        $_SESSION['userNombreCurso']['NombreCurso']=$arrData;	
                        

                        
                        
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