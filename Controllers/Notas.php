<?php 
class Notas extends Controllers{
    public function __construct()
    {
        parent:: __construct(); 
        
        session_start();
        if(empty($_SESSION['login2']))
        {
            header('Location: '.base_url().'/loginGeneral');
        }
    }
    public function notas(){
       $data['page_id']  = 28;
       $data['page_tag'] = "Notas";
       $data['page_title'] = "Página de notas";
       $data['page_name'] = "notas";
    
        $this->views->getView($this,"notas",$data);
    }

}
?>