<?php

	/* utilizaremos namespace en la primera línea de código */
	namespace config\settings;

	/* Definimos las constantes que usaremos */
	
	define("_ROUTE_" , "/systemUT/");					/* direccion del proyecto */
	define("_THEME_" , "/systemUT/assets");			/* Direccion de recursos y estilos */
	define("_INDEX_FILE_" , "/systemUT/index.php");	/* direccion del archivo index */

	define('_DIRECTORY_', 'content/controllers/'); 					/* Direccion de controladores */
	define("_MODEL_" , "content/modelo/");							/* direccion de los modelos */
	define("_CONTROLLER_" , "Controller.php");						/* complemento para la llamada de controladores */
	
	define("_DB_SERVER_" , "http://localhost/");					/* nombre del servidor */

	define('_DB_MANAGER_', 	'mysql');						        /* manejador de base de datos */
	define("_DB_WEB_" , "id16202188_utsystem");								/* nombre de la base de datos */
	define('_HOST_', 		'localhost');							/* nombre del host */
	define("_DB_USER_", "id16202188_root");									/* nombre del usuario de la BD */
	define("_DB_PASS_", "SISTEMAUT2022");										/* contraseña de la base de datos  */
	define("_COMPLEMENT_" , "/systemUT/view/assets/");					/* direccion del proyecto */

	define("_REPORTS_" , "/systemUT/content/controllers/reports/");					/* reportes pdf del proyecto */
		define("_ESTADISTICOS_" , "/dashboard/systemUT/content/modelo/estadisticos/");					/* reportes estadisticos del proyecto */
	define("_NAMESYSTEM_" , "UT");					/* direccion del proyecto */

	/* clase con el nombre config  */
	class sysConfig{

		/* método publico llamado _init()   */
		public function _int(){
			/* verifica si existe dentro de la carpeta Controllers el archivo frontcontroller.php */
			if (file_exists("content/controllers/frontcontroller.php")){
				require_once('content/controllers/frontcontroller.php');
			}
			else{
				die("<script>location='?url=error'</script>");
			}
		}
		/* métodos protegidos los cuales retornan los define que se definieron en la parte superior del código */
		protected function _ROUTE_()		{return _ROUTE_;}
		protected function _THEME_()		{return _THEME_;}
		protected function _INDEX_FILE_()	{return _INDEX_FILE_;}
		protected function _DIRECTORY_()	{return _DIRECTORY_;}
		protected function _MODEL_()		{return _MODEL_;}
		protected function _CONTROLLER_()	{return _CONTROLLER_;}
		protected function _DB_SERVER_()	{return _DB_SERVER_;}
		protected function _DB_MANAGER_()	{return _DB_MANAGER_;}
		protected function _DB_WEB_()		{return _DB_WEB_;}
		protected function _HOST_()			{return _DB_WEB_;}
		protected function _DB_USER_()		{return _DB_USER_;}

		protected function _REPORTS_()		{return _REPORTS_;}
		protected function _ESTADISTICOS_()		{return _ESTADISTICOS_;}
		protected function _DB_PASS_()		{return _DB_PASS_;}

	}


?>