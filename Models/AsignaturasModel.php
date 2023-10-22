<?php

    class AsignaturasModel extends Mysql {
        private $intIdAsignatura;
        private $intIdProfesor;
      private $intIdCurso;
      private $intIdCarrera;
      private $intIdGrado;
      private $intIdSeccion;
      private $intStatus;
        public function __construct()
        {
            parent:: __construct();    
        }

        public function selectAsignaturas()
		{
			//EXTRAE ROLES
			$sql = "SELECT * FROM relacion_cursos";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectAsignatura(int $id)
		{
			$this->intIdAsignatura = $id;
			//EXTRAE ROLES
			$sql = "SELECT a.idRelacion,p.nombreProfesor,q.nombreCurso,c.nombreCarrera,g.nombreGrado,s.nombreSeccion,a.status FROM relacion_cursos a INNER JOIN carreras c ON a.idCarrera=c.idCarrera INNER JOIN grados g ON a.idGrado = g.idGrado INNER JOIN secciones s ON a.idSeccion = s.idSeccion INNER JOIN profesores p ON a.idProfesor = p.idProfesor INNER JOIN cursos q ON a.idCurso = q.idCurso WHERE idRelacion= $this->intIdAsignatura";
			$request = $this->select($sql);
			return $request;
		}



        public function insertAsignatura(int $profesor, int $curso, int $carrera, int $grado, int $seccion, $status){
			$return = 0;
			$this->intIdProfesor = $profesor;
            $this->intIdCurso = $curso;
            $this->intIdCarrera = $carrera;
            $this->intIdGrado = $grado;
            $this->intIdSeccion = $seccion;
			$this->intStatus = $status;
			$sql = "SELECT * FROM relacion_cursos";
			$request = $this->select_all($sql);

			if(isset($request))
			{
				$query_insert  = "INSERT INTO relacion_cursos(idProfesor,idCurso, idCarrera, idGrado, idSeccion,status) VALUES(?,?,?,?,?,?)";
	        	$arrData = array($this->intIdProfesor, $this->intIdCurso, $this->intIdCarrera,$this->intIdGrado, $this->intIdSeccion,$this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}	
    }

?>









