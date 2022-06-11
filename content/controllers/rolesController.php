<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\usuariosModel as usuariosModel;
	use content\modelo\rolesModel as rolesModel;

	class rolesController{
		private $url;
		private $rol;
		private $usuario;
		function __construct($url){
			$this->url = $url;
			$this->usuario = new usuariosModel();
				$this->rol = new rolesModel();
		}

		public function Consultar(){
			$objModel = new rolesModel;
			$this->rol = new rolesModel();
			$_css = new headElement;
			$_css->Heading();

			$usuarios = $this->usuario->Consultar();
		$roles = $this->rol->Consultar();
			
			$url = $this->url;
			require_once("view/rolesView.php");
		}

public function Mostrar($param)
    {
        $rol = $this->rol->ObtenerOne($param);
        http_response_code(200);
        echo json_encode([
            'data' => $rol
        ]);
    }


	public function RegistrarRol()
	{
		
		if (!empty($_POST['nombre_rol']) && !empty($_POST['descripcion'])) {
			$nombre_rol = $_POST['nombre_rol'];
			$descripcion = $_POST['descripcion'];
			$status = $_POST['status']; 
			
			$this->rol->setNombreRol($nombre_rol);
			$this->rol->setDescripcion($descripcion);
			$this->rol->setStatus($status);
			
			$result = $this->rol->ConsultarOne();
			if ($result['ejecucion'] == true) {
				if (count($result) > 1) {
					echo "3";
				} else {
					$execute = $this->rol->AgregarR();
					//Codigo de bitacora sobre Agregar Usuario
					if ($execute['ejecucion'] == true) {
						echo '1';
					} else {
						echo "2";
					}
				}
			} else {
				echo "2";
			}
		}
	}


	public function Inhabilitar($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if ($method != 'POST') {
			http_response_code(404);
			return false;
		}

		$result = $this->rol->Inhabilitar($id);
		if ($result['ejecucion'] == true) {
			echo json_encode([
				'titulo' => 'Rol eliminado!',
				'mensaje' => 'Registro eliminado en nuestro sistema',
				'tipo' => 'success'
			]);
		} else {
			echo json_encode([
				'titulo' => 'Ocurrió un error!',
				'mensaje' => 'No se pudo eliminar el registro',
				'tipo' => 'error'
			]);
		}
	}
	
	public function Habilitar($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if ($method != 'POST') {
			http_response_code(404);
			return false;
		}

		$result = $this->rol->Habilitar($id);
		if ($result['ejecucion'] == true) {
			echo json_encode([
				'titulo' => 'Rol habilitado!',
				'mensaje' => 'Registro habilitado en nuestro sistema',
				'tipo' => 'success'
			]);
		} else {
			echo json_encode([
				'titulo' => 'Ocurrió un error!',
				'mensaje' => 'No se pudo habilitar el registro',
				'tipo' => 'error'
			]);
		}
	}
}

	
?>