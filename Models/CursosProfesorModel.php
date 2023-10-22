<?php

    class CursosProfesorModel extends Mysql {
        
        private $intIdUsuario;

        public function __construct()
        {
            parent:: __construct();    
        }
        
      public function nombreCursos(){
        
            $sql = "SELECT bimestres.nombreBimestre FROM bimestres WHERE status != 0";
             $request = $this->select_all($sql);
            
             return $request;
        
      }


      //Funcion para visualizar todos los cursos del profesor
	public function sessionNombreCurso(){
	
		$sql = "SELECT
		cursos.nombreCurso AS NombreCurso
	FROM
		cursos
	JOIN
		relacion_cursos ON cursos.idCurso = relacion_cursos.idCurso
	JOIN
		profesores ON relacion_cursos.idProfesor = profesores.idProfesor
	WHERE
		profesores.idProfesor = 1";
		
		$request = $this->select_all($sql);

		// $request = $this->select_all2($sql, $arrData);

		return $request;
	}
    }

?>