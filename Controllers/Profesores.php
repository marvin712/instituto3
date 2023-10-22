<?php 
class Profesores extends Controllers{
    public function __construct()
    {   
        session_start();
        if(empty($_SESSION['login2']))
        {
            header('Location: '.base_url());
        }
        parent:: __construct();   
    }
    public function profesores(){
        $data['page_id']  = 6;
       $data['page_tag'] = "Profesores";
       $data['page_title'] = "Página profesores";
       $data['page_name'] = "profesores";

    //    $data['cursos']=  $this->model->cantCursos();
        $this->views->getView($this,"profesores",$data);
    }

    public function getBimestres(){
        $arrData =  $this->model->selectBimestres();

        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
    }

}
?>