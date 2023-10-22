<?php

    class LoginProfesoresModel extends Mysql {
        private $intIdUsuario;
		private $strUsuario;
		private $strPassword;
		private $strToken;

        
        public function __construct()
        {
            parent:: __construct();    
        }
        
        //Funcion para validar el inicio de sesión
		public function loginUserProfesores(string $usuario, string $password)
		{
			$this->strUsuario = $usuario;
			$this->strPassword = $password;
			 $sql = "SELECT idProfesor,status FROM profesores WHERE 
					email = '$this->strUsuario' and 
					password = '$this->strPassword' and 
					status != 0 ";
                    
			$request = $this->select($sql);
			return $request;
		
    }

	//Funcion para obtener los datos del profesor
	public function sessionLogin(int $idprofesor){
		$this->intIdUsuario = $idprofesor;

		$sql = "SELECT p.idProfesor, p.nombreProfesor,p.apellidoProfesor,p.direccionProfesor,p.email,r.idrol,r.nombrerol,p.status FROM profesores p INNER JOIN rol r ON p.rolid = r.idrol WHERE p.idProfesor = $this->intIdUsuario";
		$request = $this->select($sql);
		return $request;
	}


	//Funcion para conocer en cuantos cursos esta asignado el profesor
	public function sessionCursos(int $idprofesor){
		$this->intIdUsuario = $idprofesor;

		$sql = "SELECT COUNT(relacion_cursos.idCurso) AS CantidadCursos FROM relacion_cursos WHERE idProfesor = $this->intIdUsuario";
		$request = $this->select($sql);
		return $request;
	}

	//Funcion para visualizar todos los cursos del profesor
	public function sessionNombreCurso(int $idprofesor){
		$this->intIdUsuario = $idprofesor;

		$sql = "SELECT
		cursos.nombreCurso AS NombreCurso
	FROM
		cursos
	JOIN
		relacion_cursos ON cursos.idCurso = relacion_cursos.idCurso
	JOIN
		profesores ON relacion_cursos.idProfesor = profesores.idProfesor
	WHERE
		profesores.idProfesor = $this->intIdUsuario";
		
		$request = $this->select_all($sql);

		// $request = $this->select_all2($sql, $arrData);

		return $request;
	}
	


}
?>