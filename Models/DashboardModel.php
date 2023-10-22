<?php

    class DashboardModel extends Mysql {
        
        public function __construct()
        {
            parent:: __construct();    
        }
        
        public function cantEstudiantes(){
            $sql = "SELECT COUNT(*) AS 'total' From estudiantes WHERE status != 0";
             $request = $this->select($sql);
             $total = $request['total'];
             return $total;
        }

        public function cantProfesores(){
            $sql = "SELECT COUNT(*) AS 'total' From profesores WHERE status != 0";
             $request = $this->select($sql);
             $total = $request['total'];
             return $total;
        }
        public function cantCursos(){
            $sql = "SELECT COUNT(*) AS 'total' From cursos WHERE status != 0";
             $request = $this->select($sql);
             $total = $request['total'];
             return $total;
        }
        public function cantUsuarios(){
            $sql = "SELECT (SELECT COUNT(*) FROM estudiantes WHERE status !=0) + (SELECT COUNT(*) FROM profesores WHERE status !=0) AS total_general;
            ?>";
             $request = $this->select($sql);
             $total = $request['total_general'];
             return $total;
        }
    }
    