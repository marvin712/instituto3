<?php

    class ProfesoresAdminModel extends Mysql {
        
        private $intIdProfesor;
		private $strNombre;
        private $strApellido;
        private $strDireccion;
        private $strEmail;
        private $strPassword;
		private $intCursoId;
		private $intCarreraId;
		private $intGradoId;
		private $intSeccionId;
        private $intTipoId;
        private $intStatus;

        public function __construct()
        {
            parent:: __construct();    
        }
        

        public function insertProfesor(string $nombre, string $apellido, string $direccion, string $email, string $password, int $tipoid, int $status){

		
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->strDireccion = $direccion;
			$this->strEmail = $email;
			$this->strPassword = $password;

			// $this->intCursoId = $curso;
			// $this->intCarreraId = $carrera;
			// $this->intGradoId = $grado;
			// $this->intSeccionId = $seccion;

			$this->intTipoId = $tipoid;
			$this->intStatus = $status;
			$return = 0;

			$sql = "SELECT * FROM profesores WHERE 
					email = '{$this->strEmail}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO profesores(nombreProfesor, apellidoProfesor, direccionProfesor, email, password, rolid, status) VALUES(?,?,?,?,?,?,?)";
	        	$arrData = array(
        						$this->strNombre,
        						$this->strApellido,
        						$this->strDireccion,
        						$this->strEmail,
        						$this->strPassword,
								// $this->intCarreraId,
								// $this->intGradoId,
								// $this->intSeccionId,
								// $this->intCursoId,
        						$this->intTipoId,
        						$this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}	

        

    	//Extraer profesores y muestra los datos en una tabla
		public function selectProfesores()
		{
			$sql = "SELECT p.idProfesor,p.nombreProfesor,p.apellidoProfesor,p.direccionProfesor,p.email,p.status,r.nombrerol 
					FROM profesores p 
					INNER JOIN rol r
					ON p.rolid = r.idrol
					WHERE p.status != 0 ";
					$request = $this->select_all($sql);
					return $request;
		}

      	//Extrae datos de un estudiante
		public function selectProfesor(int $idprofesor){
			$this->intIdProfesor = $idprofesor;

			// $sql = "SELECT p.idProfesor,p.nombreProfesor,p.apellidoProfesor,p.direccionProfesor,p.email,c.idCarrera,c.nombre,g.idGrado,g.nombreGrado,s.idSeccion,s.seccion,m.idCurso,m.nombreCurso,r.idrol,r.nombrerol,p.status, DATE_FORMAT(p.datecreated, '%d-%m-%Y') as fechaRegistro FROM profesores p INNER JOIN rol r ON p.rolid = r.idrol INNER JOIN carreras c ON p.idCarrera=c.idCarrera INNER JOIN grados g ON p.idGrado = g.idGrado INNER JOIN secciones s ON p.idSeccion = s.idSeccion INNER JOIN cursos m ON p.idCurso =m.idCurso
			// 		WHERE p.idProfesor = $this->intIdProfesor";


			$sql = "SELECT p.idProfesor,p.nombreProfesor,p.apellidoProfesor,p.direccionProfesor,p.email,r.idrol,r.nombrerol,p.status, DATE_FORMAT(p.datecreated, '%d-%m-%Y') as fechaRegistro FROM profesores p INNER JOIN rol r ON p.rolid = r.idrol;
					WHERE p.idProfesor = $this->intIdProfesor";
			$request = $this->select($sql);
			return $request;
		}

			//Funcion para actualizar profesor
			public function updateProfesor(int $idProfesor, string $nombre, string $apellido, string $direccion, string $email, string $password, int $tipoid, int $status){

				$this->intIdProfesor = $idProfesor;
				$this->strNombre = $nombre;
				$this->strApellido = $apellido;
				$this->strDireccion = $direccion;
				$this->strEmail = $email;
				$this->strPassword = $password;
				$this->intTipoId = $tipoid;
				$this->intStatus = $status;
	
				$sql = "SELECT * FROM profesores WHERE (email = '{$this->strEmail}' AND idProfesor != $this->intIdProfesor)";
				$request = $this->select_all($sql);
	
				if(empty($request))
				{
					if($this->strPassword  != "")
					{
						$sql = "UPDATE profesores SET nombreProfesor=?, apellidoProfesor=?, direccionProfesor=?, email=?, password=?, rolid=?, status=? 
								WHERE idProfesor = $this->intIdProfesor";
						$arrData = array($this->strNombre,
										$this->strApellido,
										$this->strDireccion,
										$this->strEmail,
										$this->strPassword,
										$this->intTipoId,
										$this->intStatus);
					}else{
						$sql = "UPDATE profesores SET nombreProfesor=?, apellidoProfesor=?, direccionProfesor=?, email=?, rolid=?, status=? 
								WHERE idProfesor = $this->intIdProfesor";
						$arrData = array($this->strNombre,
										$this->strApellido,
										$this->strDireccion,
										$this->strEmail,
										$this->intTipoId,
										$this->intStatus);
					}
					$request = $this->update($sql,$arrData);
				}else{
					$request = "exist";
				}
				return $request;
			
			}
			

			 //Funcion para eliminar un profesor
		public function deleteProfesor(int $intIdprofesor)
		{
			$this->intIdProfesor = $intIdprofesor;
			$sql = "UPDATE profesores SET status = ? WHERE idProfesor = $this->intIdProfesor ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}

       
    }


        
?>