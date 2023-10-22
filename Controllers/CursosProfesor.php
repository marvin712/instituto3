<?php 
class CursosProfesor extends Controllers{
    public function __construct()
    {   
        session_start();
        if(empty($_SESSION['login2']))
        {
            header('Location: '.base_url().'/loginGeneral');
        }
        parent:: __construct();   
    }
    public function cursosProfesor(){

        
        $data['page_id']  = 26;
       $data['page_tag'] = "Cursos Profesores";
       $data['page_title'] = "Página cursos";
       $data['page_name'] = "cursos profesor";
    //    $data['cursos']=  $this->model->nombreCursos();
        $this->views->getView($this,"cursosProfesor",$data);
    }

    public function getBimestres(){
       $arrData= $this->model->nombreCursos();
       echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
       die();
    }

    public function getcursosprofesor(){
       $arrData= $this->model->sessionNombreCurso();
      return $arrData;
    }


}
?>