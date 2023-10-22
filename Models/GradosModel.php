<?php

    class GradosModel extends Mysql {
        private $intIdGrado;
        private $strNombre;
        private $intStatus;

        public function __construct()
        {
            parent:: __construct();    
        }
        public function selectGrados()
		{
			//EXTRAE Grados
			$sql = "SELECT * FROM grados WHERE status != 0";
			$request = $this->select_all($sql);
			return $request;
		}

        public function selectGrado(int $idgrado)
		{
			//BUSCAR un grado
			$this->intIdGrado = $idgrado;
			$sql = "SELECT * FROM grados WHERE idGrado = $this->intIdGrado";
			$request = $this->select($sql);
			return $request;
		}


        public function insertGrado(string $nombre, int $status){
			$return = 0;
			$this->strNombre = $nombre;
           
			$this->intStatus = $status;
			$sql = "SELECT * FROM grados";
			$request = $this->select_all($sql);

			if(isset($request))
			{
				$query_insert  = "INSERT INTO grados(nombreGrado,status) VALUES(?,?)";
	        	$arrData = array($this->strNombre,$this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}	

         //Funcion para actualizar Grados
			
		public function updateGrado(int $idgrado, string $nombre, int $status){
			$this->intIdGrado = $idgrado;
			$this->strNombre = $nombre;
			$this->intStatus = $status;

			$sql = "SELECT * FROM grados WHERE nombreGrado = '$this->strNombre' AND idGrado != $this->intIdGrado";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE grados SET nombreGrado = ?, status = ? WHERE idGrado = $this->intIdGrado ";
				$arrData = array($this->strNombre,$this->intStatus);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

             //Funcion para eliminar
	public function deleteGrado(int $intIdgrado)
	{
		$this->intIdGrado = $intIdgrado;
		$sql = "UPDATE grados SET status = ? WHERE idGrado = $this->intIdGrado ";
		$arrData = array(0);
		$request = $this->update($sql,$arrData);
		return $request;
	}

    }

?>



