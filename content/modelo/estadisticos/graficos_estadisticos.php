<?php

	namespace content\estadisticos;

	use content\config\conection\database as database;

	class estadisticosModel extends database{

		private $con;

		public function __construct(){
			$this->con = parent::__construct();
		}

	}

?>