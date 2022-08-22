<?php

namespace content\controllers;

use config\settings\sysConfig as sysConfig;
use content\component\headElement as headElement;
use content\modelo\loginModel as loginModel;
use content\modelo\usuariosModel as usuariosModel;
use content\traits\Utility;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class loginController
{
	use Utility;
	private $url;
	private $login;

	function __construct($url)
	{
		$this->url = $url;
		$this->usuario = new usuariosModel();
		$this->login = new loginModel();
	}

	public function Consultar()
	{
		if(!empty($_SESSION['ut_usuario'])) {
			header('Location: Home');
		}
		$objModel = new loginModel;
		$_css = new headElement;
		$_css->Heading();

		$url = $this->url;
		$usuarios = $this->usuario->Consultar();

		require_once("view/loginView.php");

	}

	public function IniciarSesion()
	{
		if (!empty($_POST['username']) || !empty($_POST['pass'])) {
			$username = $_POST['username'];
			$pass= $_POST['pass'];
			 $this->usuario->setPassword($pass);
			//Agregar un Consultar para ver si existe el registro; 
			$result = $this->usuario->ObtenerUsuario($username);
			
			if ($result['ejecucion'] == true) {
				$res = $result['resultado'];
				if ($res) {
					if(password_verify($pass, $res['contrasena'])){
						$resultP = $this->usuario->ObtenerPermisos($res['rol']);
						$permisos = $resultP['resultado'];
						$_SESSION['ut_usuario'] = $res['usuario'];
						$_SESSION['ut_id'] = $res['id_usuario'];
						$_SESSION['ut_rol'] = $res['rol'];
						$_SESSION['ut_nombre'] = $res['nombre'];
						$_SESSION['ut_apellido'] = $res['apellido'];
						$_SESSION['ut_cedula'] = $res['cedula'];
						$_SESSION['ut_correo'] = $res['correo'];
						$_SESSION['ut_permisos'] = $permisos;
						echo json_encode([
							'tipo' => 'success', 'mensaje' => 'Sesión Iniciada'
						]); 
					}
					else{
						echo json_encode([
							'titulo' => '¡Contraseña incorrecta!',
							'mensaje' => 'La Contraseña ingresada es incorrecta',
							'tipo' => 'error',
						]);
					}
				} else {
					echo json_encode([
						'titulo' => '¡Usuario incorrecto!',
						'mensaje' => 'Por favor verifique el usuario',
						'tipo' => 'error',
					]);
				}
			} else {
				echo json_encode([
					'titulo' => '¡Error!',
					'mensaje' => 'Intente nuevamente',
					'tipo' => 'error',
				]);
			}
		}
	}


public function codigoAleatorio(){
$caracteres='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#?*-';
//$logitud ='10';
for ($i =0; $i<7; $i++ ){
echo substr(($caracteres), rand (0,65), 1);
	}
}

public function emailValidation(){
	//header('Content-Type: application/json; charset=utf-8');
	$correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : null;
	$response =	$this->login->buscarCorreo($correo);
	// var_dump($response);
	if(!empty($response)){
		http_response_code(200);
	}else{

		http_response_code(404);
	}


}

public function modificarClaveUsuario(){
	if(isset($_POST['pass']))
{
$clave =  $this->encriptar($_POST['pass']);
if(isset($_COOKIE['pass'])==$clave){
	if(!empty($response)){
		//http_response_code(200);
		echo 'Cambio de clave exitosa';
	}else{
      echo "Error";
		//http_response_code(404);
	}

	}
}
}



public function mailReset(){
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

require 'vendor/autoload.php';

$longitud ='7';
$caracteres='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#?*-';
$miclave = substr(($caracteres), rand (0,65), $longitud);
$clave = $miclave;
$value = $clave;


setcookie("pass", $value, time()+3600);  /* expira en 1 hora */
$value = $this->encriptar($clave);

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'armasoriana98@gmail.com';                     //SMTP username
    $mail->Password   = 'tljsgfwvgglekuwl';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($mail->Username, 'SISTEMA UT');
   $mail->addAddress('armasoriana98@gmail.com', 'Usuario ');     //a quien se le va enviar
	//$mail->addAddress($usuario['correo']);    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Restablecer password SISTEMA UT';
    $mail->Body    = '<b>SISTEMA UNIDAD DE TRANSPORTE-RECUPERACIÓN DE USUARIO</b>
		<center>Correo automático de recuperación</center>
	Si solicitaste la recuperación de acceso para tu usuario, usa el codigo que aparece a 
                    continuación 
					<b>Nueva clave: '.$clave.'</b>
					para completar el proceso. Esta es una clave temporal y te recomendamos modificarla al ingresar al sistema.<br>
					Si no solicitaste esto, puedes ignorar este correo. <br>
                   <br>';
	
		
   $mail->send();
   require_once("view/recuperarUsuarioView.php");
    echo 'Correo enviado.';
	
	
} catch (Exception $e) {
    echo "Message no pudo enviarse.Intentelo nuevamente. Error: {$mail->ErrorInfo}";
	}
}


public function OlvidoClave(){

	if(empty($_SESSION['ut_usuario'])){
	require_once("view/recuperarUsuarioView.php");
	}else{

	require_once("view/loginView.php");

	}

}
	public function Iniciar($username, $pass)
	{

		if (isset($_POST['username']) && ($_POST['pass'] !== "")) {

			$username = ($_POST['username'] !== "") ? $_POST['username'] : NULL;

			$pass = ($_POST['pass'] !== "") ? $_POST['pass'] : NULL;

			//$pass = $this->desencriptarS($pass);
		} else {

			echo "Datos equivocados";
		}
	}

	public function logout(){
		session_destroy();
		header('Location: ../login');
	}
}
