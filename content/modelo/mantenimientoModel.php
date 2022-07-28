<?php

	namespace content\modelo;

	use content\config\conection\database as database;


	class mantenimientoModel extends database{

		private $id_mantenimiento;
		private $nombre;
		private $id_vehiculo;
		private $costo;
		private $fecha;
		private $id_taller;
		private $status;
		private $kilometraje;



		public function __construct(){
			parent::__construct();
		}
		
		public function Consultar(){
			
			try {
				$query = parent::prepare('SELECT * FROM mantenimientos');
				////$query = parent::prepare('SELECT id_taller AS taller, nombre AS nombre_taller, rif AS rif, nombre AS nombre_mantenimiento, placa AS placa, id_mantenimiento AS orden FROM mantenimientos INNER JOIN vehiculos ON id_vehiculo = id_vehiculo INNER JOIN taller ON id_taller= id_taller WHERE id_taller=".$id_taler"');
				//SELECT mantenimientos.id_taller AS taller, taller.nombre AS nombre_taller, taller.rif AS rif, mantenimientos.nombre AS nombre_mantenimiento, vehiculos.placa AS placa, mantenimientos.id_mantenimiento AS orden FROM mantenimientos INNER JOIN vehiculos ON mantenimientos.id_vehiculo = vehiculos.id_vehiculo INNER JOIN taller ON mantenimientos.id_taller= taller.id_taller WHERE mantenimientos.id_taller= taller.id_taller;
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

		public function Consultar_notificaciones(){
			
			try {
				$query = parent::prepare('SELECT * FROM notificaciones');
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
				$query = parent::prepare("SELECT * FROM mantenimientos WHERE nombre = '{$this->nombre}' and fecha = '{$this->fecha}' and id_taller = '{$this->id_taller}' and id_vehiculo = '{$this->id_vehiculo}'");
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

		public function ConsultarVehiculo($id_vehiculo){
			try {
				$query = parent::prepare("SELECT kilometraje,fecha FROM mantenimientos WHERE fecha=( SELECT MAX(fecha) FROM mantenimientos WHERE id_vehiculo=".$id_vehiculo." );");
				$respuestaArreglo = '';
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
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
				$query = parent::prepare("INSERT INTO mantenimientos (id_mantenimiento, nombre, kilometraje,  id_vehiculo,costo, fecha, id_taller, status) VALUES ($id, '{$this->nombre}','{$this->kilometraje}', '{$this->id_vehiculo}','{$this->costo}', '{$this->fecha}', '{$this->id_taller}', 1)");
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

		public function Agregar_notificacion($datos){
			try {
				$query = parent::prepare("INSERT INTO notificaciones (estado, fecha, titulo, contenido,id_vehiculo) VALUES (0,'".$datos['fecha']."','".$datos['titulo']."', '".$datos['contenido']."', '".$datos['id_vehiculo']."')");
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
				$query = parent::prepare("UPDATE mantenimientos SET nombre = '{$this->nombre}', kilometraje = '$this->kilometraje',id_vehiculo='$this->id_vehiculo', nombre='$this->nombre', costo='$this->costo', fecha='$this->fecha', id_taller='$this->id_taller' WHERE id_mantenimiento = $this->id_mantenimiento");
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
		public function setIdVehiculo($id_vehiculo){
			$this->id_vehiculo = $id_vehiculo;
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
		public function setIdTaller($id_taller){
			$this->id_taller = $id_taller;
		}
		public function setKilometraje($kilometraje){
			$this->kilometraje = $kilometraje;
		}

		public function getIdMantenimiento(){
			return $this->id_mantenimiento;
		}
		public function getNombreTipo(){
			return $this->nombre_tipo;
		}

		public function getIdVehiculo(){
			return $this->id_vehiculo;
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
		public function getIdTaller(){
			return $this->id_taller;
		}
		public function getKilometraje(){
			return $this->kilometraje;
		}
	}
