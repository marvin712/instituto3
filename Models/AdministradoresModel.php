<?php

    class AdministradoresModel extends Mysql {
        private $intIdAdmin;
		private $strNombre;
        private $strApellido;
        private $strDireccion;
        private $strEmail;
        private $strPassword;

        private $intTipoId;
        private $intStatus;

        public function __construct()
        {
            parent:: __construct();    
        }

        
		public function insertAdministrador(string $nombre, string $apellido, string $direccion, string $email, string $password, int $tipoid, int $status){

		
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->strDireccion = $direccion;
			$this->strEmail = $email;
			$this->strPassword = $password;
			
			$this->intTipoId = $tipoid;
			$this->intStatus = $status;
			$return = 0;

			$sql = "SELECT * FROM administradores WHERE 
					email = '{$this->strEmail}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO administradores(nombre, apellido, direccion, email, password, rolid, status) VALUES(?,?,?,?,?,?,?)";
	        	$arrData = array(
        						$this->strNombre,
        						$this->strApellido,
        						$this->strDireccion,
        						$this->strEmail,
        						$this->strPassword,
							
        						$this->intTipoId,
        						$this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}	

		//Funcion para seleccionar todos los admins y mostrarlos en una tabla
		public function selectAdministradores()
		{
			$sql = "SELECT a.idAdministrador,a.nombre,a.apellido,a.direccion,a.email,a.status,r.nombrerol 
					FROM administradores a 
					INNER JOIN rol r
					ON a.rolid = r.idrol
					WHERE a.status != 0 ";
					$request = $this->select_all($sql);
					return $request;
		}
     
    }

?>