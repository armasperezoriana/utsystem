<?php

	
	namespace content\modelo;

	use content\config\conection\database as database;

	class rutaModel extends database{

		private $id_ruta;
		private $placa;
	    private $nombre_ruta; 
	    private $direccion_ruta;
	    private $hora_salida;
	    private $kilometraje;
	    private $status;

		public function __construct(){
			// $this->con = parent::__construct();
			parent::__construct();
		}
		public function Consultar(){
			
			try {
				$query = parent::prepare('SELECT * FROM rutas');
				$respuestaArreglo = '';
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
				return $respuestaArreglo;
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}


		public function ConsultarOne(){
			try {
				$query = parent::prepare("SELECT * FROM rutas WHERE status = 1 and placa = '{$this->placa}'");
				$respuestaArreglo = '';
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
				$respuestaArreglo += ['ejecucion' => true];
				return $respuestaArreglo;
			} catch (PDOException $e) {
				$errorReturn = ['ejecucion' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}


		public function Agregar(){
			$id= 0;
			try {
				$query = parent::prepare('SELECT MAX(id_ruta) as max FROM rutas');
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$result = $query->fetchAll(parent::FETCH_ASSOC); 
				foreach($result as $row){
					if(!empty($row['max'])){
						$id = $row['max']+1;
					}else{
						$id++;
					}
				}
				$query = parent::prepare("INSERT INTO rutas (id_ruta, placa, nombre_ruta, direccion_ruta, hora_salida, kilometraje, status) VALUES ($id, '{$this->placa}', '{$this->nombre_ruta}', '{$this->direccion_ruta}', '{$this->hora_salida}','{$this->kilometraje}', 1)");
				$respuestaArreglo = '';
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
				$respuestaArreglo += ['ejecucion' => true];
				return $respuestaArreglo;
			} catch (PDOException $e) {
				$errorReturn = ['ejecucion' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}

		public function Modificar(){
			try{
				$query = parent::prepare("UPDATE rutas SET placa='{$this->placa}', nombre_ruta='{$this->nombre_ruta}', direccion_ruta = '{$this->direccion_ruta}', hora_salida = '{$this->hora_salida}', kilometraje='{$this->kilometraje}' WHERE id_ruta = {$this->id_ruta}");
				$respuestaArreglo = '';
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
				$respuestaArreglo += ['ejecucion' => true];
				return $respuestaArreglo;
			} 
			 catch (PDOException $e) {
				$errorReturn = ['ejecucion' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}

		public function Inhabilitar($id){    //Método que elimina logicamente un registro
			try{
				$consulta = parent::prepare("UPDATE rutas SET status=0 WHERE id_ruta=$id");
				$consulta->execute();
				$respuestaArreglo = ['ejecucion' => true];
				return $respuestaArreglo;
	
			} catch (PDOException $e) {
				$errorReturn = ['ejecucion' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}
		public function Habilitar($id){    //Método que habilita logicamente un registro
			try{
				$consulta = parent::prepare("UPDATE rutas SET status=1 WHERE id_ruta=$id");
				$consulta->execute();
				$respuestaArreglo = ['ejecucion' => true];
				return $respuestaArreglo;
	
			} catch (PDOException $e) {
				$errorReturn = ['ejecucion' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}

		public function setId_ruta($id_ruta){
			$this->id_ruta = $id_ruta;
		}
		public function setNombre_ruta($nombre_ruta){
			$this->nombre_ruta = $nombre_ruta;
		}
		public function setPlaca($placa){
			$this->placa = $placa;
		}
		public function setDireccion($direccion){
			$this->direccion_ruta = $direccion;
		}
		public function setHoraSalida($horaSalida){
			$this->hora_salida = $horaSalida;
		}
			public function setKilometraje($kilometraje){
			$this->kilometraje = $kilometraje;
		}
	}

?>