<?php 
class CursosEstudiante extends Controllers{
    public function __construct()
    {   
        session_start();
        if(empty($_SESSION['login']))
        {
            header('Location: '.base_url().'/login');
        }
        parent:: __construct();   
    }
    public function cursosEstudiante(){
        $data['page_id']  = 20;
       $data['page_tag'] = "Cursos Estudiantes";
       $data['page_title'] = "Página cursos";
       $data['page_name'] = "cursos estudiante";
        $this->views->getView($this,"cursosEstudiante",$data);
    }

}
?>