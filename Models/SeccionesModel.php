<?php

    class SeccionesModel extends Mysql {
        
        private $intIdSeccion;
        private $strSeccion;
        private $intStatus;

        public function __construct()
        {
            parent:: __construct();    
        }
        

        public function selectSecciones()
		{
			//EXTRAE SECCIONES
			$sql = "SELECT * FROM secciones WHERE status != 0";
			$request = $this->select_all($sql);
			return $request;
		}

        public function selectSeccion(int $idseccion)
		{
			//BUSCAR ROLE
			$this->intIdSeccion = $idseccion;
			$sql = "SELECT * FROM secciones WHERE idSeccion = $this->intIdSeccion";
			$request = $this->select($sql);
			return $request;
		}


        public function insertSeccion(string $seccion, int $status){

			$return = "";
			$this->strSeccion = $seccion;
			$this->intStatus = $status;

			$sql = "SELECT * FROM secciones";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO secciones(seccion,status) VALUES(?,?)";
	        	$arrData = array($this->strSeccion, $this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}

        
         //Funcion para eliminar
	public function deleteSeccion(int $intIdSeccion)
	{
		$this->intIdSeccion = $intIdSeccion;
		$sql = "UPDATE secciones SET status = ? WHERE idSeccion = $this->intIdSeccion ";
		$arrData = array(0);
		$request = $this->update($sql,$arrData);
		return $request;
	}

       
    }

?>