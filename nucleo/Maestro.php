<?php
	class Maestro
	{
		private $_controlador;
		private $_metodo;
		private $_argumentos;

		public function __construct()
		{
			if (isset($_GET['url'])) {
				$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				$url = array_filter($url);

				$this->_controlador = array_shift($url);
				$this->_metodo		= array_shift($url);
				$this->_argumentos	= $url;
			}

			if (!$this->_controlador) {
				$this->_controlador = 'index';
			}

			if (!$this->_metodo) {
				$this->_metodo = 'index';
			}

			if (!$this->_argumentos) {
				$this->_argumentos = 'index';
			}
		}

		#funcion para enrutar direccion
		public function enrutando()
		{
			$metodo 			= $this->_metodo;
			$argumentos 		= $this->_argumentos;
			$controlador 		= $this->_controlador;
			$claseControlador 	= $controlador . 'Controlador';
			$rutaControlador  	= ROOT . 'controlador' . DS . $claseControlador . '.php';

			if (!is_readable($rutaControlador)) {
				header("Location: " . BASE_URL . 'accesos/paginaVacia/');
			}
			else{
				Controlador::cargarControlador($rutaControlador,$claseControlador,$metodo,$argumentos);
			}

		}

		#funcion para obtener controlador
		public function obtenerControlador()
		{
			return $this->_controlador;
		}

		#funcion para obtener el metodo
		public function obtenerMetodo()
		{
			return $this->_metodo;
		}

		#funcion para obtener los metodos
		public function obtenerArgumentos()
		{
			return $this->_argumentos;
		}
	}
 ?>