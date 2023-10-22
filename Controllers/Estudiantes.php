<?php 
class Estudiantes extends Controllers{
    public function __construct()
    {   
        parent:: __construct();   

        session_start();
        if(empty($_SESSION['login']))
        {
            header('Location: '.base_url());
        }
    }
    public function estudiantes(){
        $data['page_id']  = 5;
       $data['page_tag'] = "Estudiantes";
       $data['page_title'] = "Página estudiantes";
       $data['page_name'] = "estudiantes";
  
        $this->views->getView($this,"estudiantes",$data);
    }

}
?>