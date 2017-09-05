<?php
	class Libreria
	{
		
		public function __construct()
		{
			# code...
		}

		public function cargarLibreria($libreria)
		{
			
			$claseLibreria = null;
			$rutaLibreria  = null;

			$claseLibreria = $libreria . 'Libreria';
			$rutaLibreria = ROOT . 'libreria' . DS . $claseLibreria . '.php';


			if (!is_readable($rutaLibreria)) {
				echo "libreria inexistente o no accesible";
			}
			else
			{
				
				require($rutaLibreria);
				$claseLibreria = new $claseLibreria;
				return $claseLibreria;
			}
		}
	}
 ?>