<?php

	namespace content\modelo;

	use content\config\conection\database as database;


	class mantenimientoModel extends database{

		private $id_mantenimiento;
		private $nombre_tipo;
		private $tiempo;
		private $placa;
		private $nombre;
		private $costo;
		private $fecha;
		private $rif;
		 private $status;



		public function __construct(){
			parent::__construct();
		}
		
		public function Consultar(){
			
			try {
				$query = parent::prepare('SELECT * FROM mantenimientos');
				$respuestaArreglo = '';
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
				return $respuestaArreglo;
			} catch (PDOException $e) {
				$errorReturn = ['status' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}

		public function ConsultarOne(){
			try {
				$query = parent::prepare("SELECT * FROM mantenimientos WHERE nombre = '{$this->nombre}' and fecha = '{$this->fecha}' and rif = '{$this->rif}' and placa = '{$this->placa}'");
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
				$query = parent::prepare('SELECT MAX(id_mantenimiento) as max FROM mantenimientos');
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
				$query = parent::prepare("INSERT INTO mantenimientos (id_mantenimiento, nombre_tipo, tiempo, placa, nombre, costo, fecha, rif, status) VALUES ($id, '{$this->nombre_tipo}', '{$this->tiempo}', '{$this->placa}', '{$this->nombre}', '{$this->costo}', '{$this->fecha}', '{$this->rif}', 1)");
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
				$query = parent::prepare("UPDATE mantenimientos SET nombre_tipo = '{$this->nombre_tipo}', tiempo='$this->tiempo', placa='$this->placa', nombre='$this->nombre', costo='$this->costo', fecha='$this->fecha', rif='$this->rif' WHERE id_mantenimiento = $this->id_mantenimiento");
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
				$consulta = parent::prepare("UPDATE mantenimientos SET status=0 WHERE id_mantenimiento=$id");
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
				$consulta = parent::prepare("UPDATE mantenimientos SET status=1 WHERE id_mantenimiento=$id");
				$consulta->execute();
				$respuestaArreglo = ['ejecucion' => true];
				return $respuestaArreglo;
	
			} catch (PDOException $e) {
				$errorReturn = ['ejecucion' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}
		public function setIdMantenimiento($id_mantenimiento){
			$this->id_mantenimiento = $id_mantenimiento;
		}
		public function setNombreTipo($nombre_tipo){
			$this->nombre_tipo = $nombre_tipo;
		}
		public function setTiempo($tiempo){
			$this->tiempo = $tiempo;
		}
		public function setPlaca($placa){
			$this->placa = $placa;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function setCosto($costo){
			$this->costo = $costo;
		}
		public function setFecha($fecha){
			$this->fecha = $fecha;
		}
		public function setRif($rif){
			$this->rif = $rif;
		}

		public function getIdMantenimiento(){
			return $this->id_mantenimiento;
		}
		public function getNombreTipo(){
			return $this->nombre_tipo;
		}
		public function getTiempo(){
			return $this->tiempo;
		}
		public function getPlaca(){
			return $this->placa;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function getCosto(){
			return $this->costo;
		}
		public function getFecha(){
			return $this->fecha;
		}
		public function getRif(){
			return $this->rif;
		}
	}

?>