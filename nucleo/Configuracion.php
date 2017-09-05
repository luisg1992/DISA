<?php
	class Configuracion
	{

		public function __construct()
		{
			#defiendo el folder de la aplicacion
			define('BASE_URL', 'http://localhost:8080/DISA/');

			#definiendo la ubicacion del layout
			define('DISENIO_POR_DEFECTO', 'disenio');

			#tiempo de sesion
			define('SESION_TIEMPO', 60);

			#nombre de la institucion
			define('INSTITUCION', 'HEMIS');

			#ubicacion de los archivos
			define('BASE_ARCHIVOS', 'C:\xampp\htdocs\DISA\archivos');

			#ubicacion de los imagenes de usuarios
			define('BASE_USU_IMG', 'http://localhost:8080/DISA/archivos/img/usuarios');

			#encabezado de documentos pdf
			define('IMAGEN_INSTITUCIONAL', BASE_URL . 'publico' . DS . 'img' . DS . 'logos' . DS . 'disa.jpg');
			define('TITULO', stripslashes('"DECENIO DE LAS PERSONAS CON DISCAPACIDAD EN EL PERU"'));
			define('SUBTITULO', stripslashes('"Año del Buen Servicio al Ciudadano"'));
		}

	}
 ?>