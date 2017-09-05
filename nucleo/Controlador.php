<?php
	abstract class Controlador
	{
		protected $_vista;

		public function __construct()
		{
			$this->_vista 	= new Vista(new Maestro);
		}

		#funcion para cargar un controlador
		public static function cargarControlador($rutaControlador,$claseControlador,$metodo,$argumentos)
		{
			#cargando la clase del folder controlador
			require($rutaControlador);

				#instanciando el objeto de la clase
				$claseControlador = new $claseControlador;

					#verificando la existencia del metodo en la clase del controlador
					if (is_callable(array($claseControlador,$metodo))) {

						#verificando la existencia de argumentos
						if (($argumentos == 'index')) {
							#sin argumentos
							call_user_func(array($claseControlador,$metodo));
						}
						if ((count($argumentos) > 0) && ($argumentos != 'index') ) {
							#con argumentos
							call_user_func_array(array($claseControlador,$metodo), $argumentos);
						}
					}

					else {
						echo "tu metodo no existe";

					}

		}

		#funcion para cargar un modelo
		protected function obtenerModelo($modelo)
		{
			$obj_modelo = new Modelo();
			return $obj_modelo->cargaModelo($modelo);

		}

		#funcion para cargar una libreria
		protected function obtenerLibreria($libreria)
		{
			$obj_libreria = new Libreria();
			return $obj_libreria->cargarLibreria($libreria);

		}

		#funcion para obtener y validar cadenas y strings
		protected function obtenerDatosCadena($clave)
		{
			if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
				$_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
				return $_POST[$clave];
			}

			return '';
		}

		#funcion para obtener y validar datos numericos
		protected function obtenerDatosNumero($clave)
		{
			if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
				$_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
				return $_POST[$clave];
			}

			return '';
		}

		#eliminar duplicado de arrays manualmente
		protected function array_unique2($array) {
			$container = array();
			$i = 0;
			foreach ($array as $a=>$b)
				if (!in_array($b,$container)){
						$container[$i]=$b;
						$i++;
				}
			return $container;
		}

		#creando breadcrumb
		protected function breadcrumbVista($folder,$pagina)
		{
			$html = '<ol class="breadcrumb" style="text-align:right;background-color:#fff;">';
			  $html .= '<li>' . $folder . '</li>';
			  $html .= '<li class="active">' . $pagina . '</li>';
			$html .= '</ol>';

			return $html;
		}

		#redireccion a url
		protected function redireccionar($direccion = false)
		{
			if ($direccion) {
				header("Location: " . BASE_URL . $direccion);
			}
			else{
				header("Location: " . BASE_URL);	
			}
		}

	}
 ?>