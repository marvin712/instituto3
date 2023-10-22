<?php 
class LoginGeneral extends Controllers{
    public function __construct()
    {
        parent:: __construct();   
    }
    public function logingeneral(){
        $data['page_id']  = 9;
       $data['page_tag'] = "Login General";
       $data['page_title'] = "Inicio de sesión general";
       $data['page_name'] = "logingeneral";
        $this->views->getView($this,"logingeneral",$data);
    }
}
?>