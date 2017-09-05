<?php
	#cargando libreria de consultas //// error aun sin solucion //// para hacerle pruebas
	require(ROOT . 'libreria' . DS . 'consultasLibreria.php');

	class Modelo
	{
		protected $_consultas;

		public function __construct()
		{
			$this->_consultas = new consultasLibreria();
		}

		public function cargaModelo($modelo)
		{


			$claseModelo = null;
			$rutaModelo = null;

			$claseModelo = $modelo . 'Modelo';
			$rutaModelo = ROOT . 'modelo' . DS . $claseModelo . '.php';

			if (!is_readable($rutaModelo)) {
				echo "archivo modelo inexistente o no accesible";
			}
			else
			{
				require($rutaModelo);
				$claseModelo = new $claseModelo;
				return $claseModelo;
			}

		}

		protected function cargaLibreriaConsulta()
		{
			$rutaConsultas = ROOT . 'libreria' . DS . 'consultasLibreria.php';
			if (!is_readable($rutaConsultas)) {
				echo "error al cargar libreria de consultas<br>" . $rutaConsultas;
			}
			else
			{

				require($rutaConsultas);
			}
		}


	}

 ?>