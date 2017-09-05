<?php
	// ini_set('display_errors', 1);
	// error_reporting(E_ALL);
	
	
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);
	define('NUCLEO_PATH', ROOT . 'nucleo' . DS);

	date_default_timezone_set('America/Lima');
	header('Content-Type: text/html; charset=utf-8');

	spl_autoload_register(function ($clase){
		require(NUCLEO_PATH . $clase . '.php');
	});

	Sesion::iniciarSesion();

	$config = new Configuracion();
	$master = new Maestro();
	$master->enrutando();
 ?>