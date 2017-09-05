<?php

	class Sesion
	{
		#iniciar variable de sesion
		public static function iniciarSesion()
		{
			session_start();
		}

		#destruir sesion
		public static function destruirSesion($sesion = false)
		{
			if ($sesion) {
				if (is_array($sesion)) {
					for ($i=0; $i < count($sesion); $i++) {
							if (isset($_SESSION[$sesion[$i]])) {
								unset($_SESSION[$sesion[$i]]);
							}
						}
				}
				else
				{
					if (isset($_SESSION[$sesion])) {
						unset($_SESSION[$sesion]);
					}
				}
			}
			else
			{
				session_destroy();
			}
		}

		#registrar una sesion
		public static function set($sesion, $valor)
		{
			$_SESSION[$sesion] = $valor;
		}

		#verificar y obtener una variable de sesion
		public static function get($sesion)
		{
			if(isset($_SESSION[$sesion]))
			{
				return $_SESSION[$sesion];
			}
			else
			{
				return false;
			}
		}


		#obteniendo nivel de acceso
		public static function getNivel($nivel)
		{
			#niveles ban de menor a mayor, a mas nivel en numero mayor acceso
			$rol["administrador"] = 1;
			$rol["administrador informatico"] = 2;
			$rol["tecnico soporte"] = 3;

			if (!array_key_exists($nivel, $rol)) {
				throw new Exception("Error de acceso");

			}
			else{
				return $rol[$nivel];
			}
		}

		#accesos al sistema
		public static function accesos($nivel)
		{

			if (!Sesion::get('logueado')) {
				header("Location: " . BASE_URL . "accesos/index/6060");
				exit();
			}

			Sesion::tiempoSesion();

			/*if(Sesion::getNivel($nivel) > Sesion::getNivel(Sesion::get('level')))
			{
				header("Location: " . BASE_URL . "accesos/index/6060");
				exit();
			}*/
		}

		#accesos a la vista
		public static function accesosVista($nivel)
		{
			if (!Sesion::get('logueado')) {
				return false;
			}
			if(Sesion::getNivel($level) > Sesion::getNivel(Sesion::get('level')))
			{
				return false;
			}

			return true;
		}

		#Controlado el tiempo de logueo
		public static function tiempoSesion()
		{
			if (!Sesion::get('tiempo') || !defined('SESION_TIEMPO')) {
				throw new Exception("No se ha definido el tiempo de sesion");
			}

			if (SESION_TIEMPO == 0) {
				return;
			}

			if (time() - Sesion::get('tiempo') > (SESION_TIEMPO * 60)){
				Sesion::destruirSesion();
				header("Location: " . BASE_URL . "accesos/index/8585");
			}
			else{
				Sesion::set('tiempo',time());
			}
		}

	#fin de la clase
	}
 ?>