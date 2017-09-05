<?php
	class Vista
	{
		private $_controlador_vista;

		public function __construct(Maestro $peticion)
		{
			$this->_controlador_vista = $peticion->obtenerControlador();
		}

		#funcion para construir la vista
		public function construirVista($folder,$vista)
		{

			$rutaVista = ROOT . 'vista' . DS . 'plantillas' . DS . $folder . DS . $vista .'Vista.php';

			$rutasDisenio = array(
				'css'	=> BASE_URL . 'publico' . DS . 'css' .DS ,
				'js'	=> BASE_URL . 'publico' . DS . 'js' .DS,
				'img'	=> BASE_URL . 'publico' . DS . 'img' .DS
				);

				#verificando la existencia de la vista
				if (!is_readable($rutaVista)) {
					echo "problemas al cargar la vista";

				}
				else
				{
					$header  = ROOT . 'vista' . DS . DISENIO_POR_DEFECTO . DS . 'header.php';
					$footer  = ROOT . 'vista' . DS . DISENIO_POR_DEFECTO . DS . 'footer.php';

					if (Sesion::get('menu')) {
						$menu = ROOT . 'vista' . DS . DISENIO_POR_DEFECTO . DS . 'menu.php';

						require($header);
						require($menu);
						require($rutaVista);
						require($footer);
					}
					else
					{
						require($header);
						//require($menu);
						require($rutaVista);
						require($footer);
					}
				}
		}
	}
 ?>