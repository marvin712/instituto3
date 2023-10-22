<?php

    class LoginModel extends Mysql {
        private $intIdUsuario;
		private $strUsuario;
		private $strPassword;
		private $strToken;

        
        public function __construct()
        {
            parent:: __construct();    
        }
        
        //Funcion de inicio de sesion para los estudiantes
		public function loginUser(string $usuario, string $password)
		{
			$this->strUsuario = $usuario;
			$this->strPassword = $password;
			 $sql = "SELECT idEstudiante,status FROM estudiantes WHERE 
					email = '$this->strUsuario' and 
					password = '$this->strPassword' and 
					status != 0 ";
                    
			$request = $this->select($sql);
			return $request;
		
    }
//Funcion para obtener los datos del estudiante
	public function sessionLogin(int $idestudiante){
		$this->intIdUsuario = $idestudiante;

		$sql = "SELECT e.idEstudiante, e.nombreEstudiante,e.apellidoEstudiante,e.direccionEstudiante,e.email,r.idrol,r.nombrerol,e.status FROM estudiantes e INNER JOIN rol r ON e.rolid = r.idrol WHERE e.idEstudiante = $this->intIdUsuario";
		$request = $this->select($sql);
		return $request;
	}

	


}
?>