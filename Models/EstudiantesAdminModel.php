<?php 

	class EstudiantesAdminModel extends Mysql
	{
		private $intIdEstudiante;
		private $strNombre;
        private $strApellido;
        private $strDireccion;
        private $strEmail;
        private $strPassword;
		private $intCarreraId;
		private $intGradoId;
		private $intSeccionId;
        private $intTipoId;
        private $intStatus;

		public function __construct()
		{
			parent::__construct();
		}
	

		// public function selectEstudiante(int $idrol)
		// {
		// 	//BUSCAR ROLE
		// 	$this->intIdrol = $idrol;
		// 	$sql = "SELECT * FROM rol WHERE idrol = $this->intIdrol";
		// 	$request = $this->select($sql);
		// 	return $request;
		// }

		public function insertEstudiante(string $nombre, string $apellido, string $direccion, string $email, string $password, int $carrera, int $grado, int $seccion, int $tipoid, int $status){

		
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->strDireccion = $direccion;
			$this->strEmail = $email;
			$this->strPassword = $password;
			$this->intCarreraId = $carrera;
			$this->intGradoId = $grado;
			$this->intSeccionId = $seccion;
			$this->intTipoId = $tipoid;
			$this->intStatus = $status;
			$return = 0;

			$sql = "SELECT * FROM estudiantes WHERE 
					email = '{$this->strEmail}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO estudiantes(nombreEstudiante, apellidoEstudiante, direccionEstudiante, email, password, idCarrera, idGrado, idSeccion, rolid, status) VALUES(?,?,?,?,?,?,?,?,?,?)";
	        	$arrData = array(
        						$this->strNombre,
        						$this->strApellido,
        						$this->strDireccion,
        						$this->strEmail,
        						$this->strPassword,
								$this->intCarreraId,
								$this->intGradoId,
								$this->intSeccionId,
        						$this->intTipoId,
        						$this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}	

		//Extraer estudiantes y mostrar los datos en una tabla
		public function selectEstudiantes()
		{
			$sql = "SELECT e.idEstudiante,e.nombreEstudiante,e.apellidoEstudiante,e.direccionEstudiante,e.email,e.status,r.nombrerol 
					FROM estudiantes e 
					INNER JOIN rol r
					ON e.rolid = r.idrol
					WHERE e.status != 0 ";
					$request = $this->select_all($sql);
					return $request;
		}

		//Extrae datos de un estudiante
		public function selectEstudiante(int $idestudiante){
			$this->intIdEstudiante = $idestudiante;

			$sql = "SELECT e.idEstudiante,e.nombreEstudiante,e.apellidoEstudiante,e.direccionEstudiante,e.email,c.idCarrera,c.nombreCarrera,g.idGrado,g.nombreGrado,s.idSeccion,s.nombreSeccion,r.idrol,r.nombrerol,e.status, DATE_FORMAT(e.datecreated, '%d-%m-%Y') as fechaRegistro FROM estudiantes e INNER JOIN rol r ON e.rolid = r.idrol INNER JOIN carreras c ON e.idCarrera=c.idCarrera INNER JOIN grados g ON e.idGrado = g.idGrado INNER JOIN secciones s ON e.idSeccion = s.idSeccion WHERE e.idEstudiante = $this->intIdEstudiante";
					// echo $sql;exit;
			$request = $this->select($sql);
			return $request;
		}

		//Funcion para actualizar estudiante
		public function updateEstudiante(int $idEstudiante, string $nombre, string $apellido, string $direccion, string $email, string $password, int $carrera, int $grado, int $seccion, int $tipoid, int $status){

			$this->intIdEstudiante = $idEstudiante;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->strDireccion = $direccion;
			$this->strEmail = $email;
			$this->strPassword = $password;
			$this->intCarreraId = $carrera;
			$this->intGradoId =$grado;
			$this->intSeccionId = $seccion;
			$this->intTipoId = $tipoid;
			$this->intStatus = $status;

			$sql = "SELECT * FROM estudiantes WHERE (email = '{$this->strEmail}' AND idEstudiante != $this->intIdEstudiante)";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				if($this->strPassword  != "")
				{
					$sql = "UPDATE estudiantes SET nombreEstudiante=?, apellidoEstudiante=?, direccionEstudiante=?, email=?, password=?, idCarrera=?, idGrado=?, idSeccion=?, rolid=?, status=? 
							WHERE idEstudiante = $this->intIdEstudiante";
					$arrData = array($this->strNombre,
	        						$this->strApellido,
	        						$this->strDireccion,
	        						$this->strEmail,
	        						$this->strPassword,
									$this->intCarreraId,
									$this->intGradoId,
									$this->intSeccionId,
	        						$this->intTipoId,
	        						$this->intStatus);
				}else{
					$sql = "UPDATE estudiantes SET nombreEstudiante=?, apellidoEstudiante=?, direccionEstudiante=?, email=?, idCarrera=?, idGrado=?, idSeccion=?, rolid=?, status=? 
							WHERE idEstudiante = $this->intIdEstudiante";
					$arrData = array($this->strNombre,
	        						$this->strApellido,
	        						$this->strDireccion,
	        						$this->strEmail,
									$this->intCarreraId,
									$this->intGradoId,
									$this->intSeccionId,
	        						$this->intTipoId,
	        						$this->intStatus);
				}
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
			return $request;
		
		}

		//Funcion para eliminar un estudiante
		public function deleteEstudiante(int $intIdestudiante)
		{
			$this->intIdEstudiante = $intIdestudiante;
			$sql = "UPDATE estudiantes SET status = ? WHERE idEstudiante = $this->intIdEstudiante ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}
	}
 ?>