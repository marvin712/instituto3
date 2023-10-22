<?php

    class EstudiantesModel extends Mysql {
        
        public function __construct()
        {
            parent:: __construct();    
        }
        
        public function getName(){
            $sql = "SELECT estudiantes.nombreEstudiante, estudiantes.apellidoEstudiante FROM estudiantes";
             $request = $this->select($sql);
             return $request;
        }
    }
    