<?php

    class LoginAdministradoresModel extends Mysql {
        private $intIdUsuario;
		private $strUsuario;
		private $strPassword;
		private $strToken;

        
        public function __construct()
        {
            parent:: __construct();    
        }
        
        //Funcion de inicio de sesion para los administradores
		public function loginUser(string $usuario, string $password)
		{
			$this->strUsuario = $usuario;
			$this->strPassword = $password;
			 $sql = "SELECT idAdministrador,status FROM administradores WHERE 
					email = '$this->strUsuario' and 
					password = '$this->strPassword' and 
					status != 0 ";
                    
			$request = $this->select($sql);
			return $request;
		
    }

	//Funcion para obtener los datos del administrador
	public function sessionLogin(int $idAdminstrador){
		$this->intIdUsuario = $idAdminstrador;

		$sql = "SELECT a.idAdministrador, a.nombre,a.apellido,a.direccion,a.email,r.idrol,r.nombrerol,a.status 
		FROM administradores a 
		INNER JOIN rol r ON a.rolid = r.idrol WHERE a.idAdministrador = $this->intIdUsuario";
		$request = $this->select($sql);
		return $request;
	}

	


}
?>