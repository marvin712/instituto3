<?php

    class ProfesoresModel extends Mysql {
        
        public function __construct()
        {
            parent:: __construct();    
        }
        
        // public function cantCursos(){
        //     $sql = "SELECT COUNT(relacion_cursos.idCurso) AS CantidadCursos FROM relacion_cursos";
        //      $request = $this->select($sql);
        //      $total = $request['total'];
        //      return $total;
        // }
       
        public function selectBimestres(){
            $sql = "SELECT * FROM bimestres WHERE status!= 0";
            $request = $this->select_all($sql);
            return $request;

        }
    }   

?>