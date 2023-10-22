<?php

    class CursosAdminModel extends Mysql {

		private $intIdCurso;
      	private $strNombre;
		private $intCodigo;
		private $intStatus;

        
        public function __construct()
        {
            parent:: __construct();    
        }
        
        public function insertCurso(int $codigo, string $nombre, int $status){
			$return = 0;
			$this->strNombre = $nombre;
			$this->intCodigo = $codigo;
			$this->intStatus = $status;
			$sql = "SELECT * FROM cursos";
			$request = $this->select_all($sql);

			if(isset($request))
			{
				$query_insert  = "INSERT INTO cursos(codigoCurso,nombreCurso,status) VALUES(?,?,?)";
	        	$arrData = array($this->intCodigo,$this->strNombre,$this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}	

			
			public function selectCursos()
		{
			//Extrae Cursos
			$sql = "SELECT * FROM cursos WHERE status != 0";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectCurso(int $idcurso)
		{
			//BUSCAR Curso
			$this->intIdCurso = $idcurso;
			$sql = "SELECT * FROM cursos WHERE idCurso = $this->intIdCurso";
			$request = $this->select($sql);
			return $request;
		}
			
			//Funcion para actualizar cursos
			
		public function updateCurso(int $idcurso, int $codigo, string $curso, int $status){
			$this->intIdCurso = $idcurso;
			$this->intCodigo = $codigo;
			$this->strNombre = $curso;
			$this->intStatus = $status;

			$sql = "SELECT * FROM cursos WHERE codigoCurso= '$this->intCodigo' AND nombreCurso = '$this->strNombre' AND idCurso != $this->intIdCurso";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE cursos SET codigoCurso =?, nombreCurso = ?, status = ? WHERE idCurso = $this->intIdCurso ";
				$arrData = array($this->intCodigo,$this->strNombre, $this->intStatus);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}
		
    //Funcion para eliminar
	public function deleteCurso(int $intIdcurso)
	{
		$this->intIdCurso = $intIdcurso;
		$sql = "UPDATE cursos SET status = ? WHERE idCurso = $this->intIdCurso ";
		$arrData = array(0);
		$request = $this->update($sql,$arrData);
		return $request;
	}


        }

?>