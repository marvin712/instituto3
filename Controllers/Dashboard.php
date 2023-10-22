<?php 
class Dashboard extends Controllers{
    public function __construct()
    {
        parent:: __construct(); 
        
        session_start();
        if(empty($_SESSION['login3']))
        {
            header('Location: '.base_url().'/loginGeneral');
        }
    }
    public function dashboard(){
       $data['page_id']  = 2;
       $data['page_tag'] = "Dashboard";
       $data['page_title'] = "Página administrativa";
       $data['page_name'] = "dashboard";
    
       $data['estudiantes']=  $this->model->cantEstudiantes();
       $data['profesores']=  $this->model->cantProfesores();
       $data['cursos']=  $this->model->cantCursos();
       $data['usuarios']=  $this->model->cantUsuarios();
    //    dep($estudiantes);exit;
        $this->views->getView($this,"dashboard",$data);
    }

}
?>