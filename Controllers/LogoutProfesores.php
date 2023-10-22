<?php 
class LogoutProfesores extends Controllers{
    public function __construct()
    {
        session_start();
        session_unset();
        session_destroy();
        header('location:'.base_url().'/loginProfesores');
        parent:: __construct();   
    }
  
    
}
?>