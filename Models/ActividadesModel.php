<?php

    class ActividadesModel extends Mysql {
        private $idActividad;
        private $strNombre;
        private $strDate;
        private $intValor;
        private $intStatus;

        public function __construct()
        {
            parent:: __construct();    
        }

        public function selectActividades()
		{
			//EXTRAE Actividades
			$sql = "SELECT * FROM actividades WHERE status != 0";
			$request = $this->select_all($sql);
			return $request;
		}

        
        public function insertActividad(string $nombre, string $date, int $valor, int $status){
            $return = 0;
			$this->strNombre = $nombre;
            $this->strDate = $date;
            $this->intValor = $valor;
			$this->intStatus = $status;
			$sql = "SELECT * FROM actividades";
			$request = $this->select_all($sql);

			if(isset($request))
			{
				$query_insert  = "INSERT INTO actividades(nombreActividad,fecha,valor,status) VALUES(?,?,?,?)";
	        	$arrData = array($this->strNombre,$this->strDate,$this->intValor,$this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
        }
    }

?>