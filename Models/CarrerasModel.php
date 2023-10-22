<?php

    class CarrerasModel extends Mysql {
        
        private $intIdCarrera;
        private $strNombre;
        private $intDuracion;
        private $intStatus;

        public function __construct()
        {
            parent:: __construct();    
        }
        
        public function selectCarreras()
		{
			//EXTRAE ROLES
			$sql = "SELECT * FROM carreras WHERE status != 0";
			$request = $this->select_all($sql);
			return $request;
		}

        public function selectCarrera(int $idcarrera)
		{
			//BUSCAR Curso
			$this->intIdCarrera = $idcarrera;
			$sql = "SELECT * FROM carreras WHERE idCarrera = $this->intIdCarrera";
			$request = $this->select($sql);
			return $request;
		}

        public function insertCarrera(string $nombre, int $duracion, int $status){
			$return = 0;
			$this->strNombre = $nombre;
            $this->intDuracion = $duracion;
			$this->intStatus = $status;
			$sql = "SELECT * FROM carreras";
			$request = $this->select_all($sql);

			if(isset($request))
			{
				$query_insert  = "INSERT INTO carreras(nombre,duracion,status) VALUES(?,?,?)";
	        	$arrData = array($this->strNombre,$this->intDuracion,$this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}	

        //Funcion para actualizar carreras
			
		public function updateCarrera(int $idcarrera, string $nombre, int $duracion, int $status){
			$this->intIdCarrera = $idcarrera;
			$this->strNombre = $nombre;
            $this->intDuracion = $duracion;
			$this->intStatus = $status;

			$sql = "SELECT * FROM carreras WHERE nombre = '$this->strNombre' AND idCarrera != $this->intIdCarrera";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE carreras SET nombre = ?, duracion=?, status = ? WHERE idCarrera = $this->intIdCarrera ";
				$arrData = array($this->strNombre, $this->intDuracion, $this->intStatus);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}


         //Funcion para eliminar
	public function deleteCarrera(int $intIdcarrera)
	{
		$this->intIdCarrera = $intIdcarrera;
		$sql = "UPDATE carreras SET status = ? WHERE idCarrera = $this->intIdCarrera ";
		$arrData = array(0);
		$request = $this->update($sql,$arrData);
		return $request;
	}
    }

?>