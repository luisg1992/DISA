<?php
	class accesosControlador extends Controlador
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function index($codigo)
		{
			$this->_vista->titulo  = 'Error';
			$this->_vista->mensaje = $this->_getError($codigo);
			$this->_vista->imagen  = $this->imgenError($codigo);
			$this->_vista->construirVista('error','accesos');
		}

		private function imgenError($codigo = false)
		{
			$error['default'] 	=  BASE_URL . 'publico/img/error/vacia.jpg';
			$error['404']  = BASE_URL . 'publico/img/error/oops.png';
			$error['6060'] = BASE_URL . 'publico/img/error/denied.png';
			$error['8585'] = BASE_URL . 'publico/img/error/session_error.png';

			$this->_vista->code = $codigo;

			if (array_key_exists($codigo, $error)) {
				return $error[$codigo];

			}
			else {
				return $error['default'];
			}
		}

		private function _getError($codigo = false)
		{
			$error['default'] 	= "";
			$error['404'] = "Ha ocurrido un error y la pagina no puede mostrarse<br><h4><mark>Puedes intentar regresar, o iniciar sesi&oacute;n nuevamente.</mark></h4>";
			$error['6060'] = "ACCESO RESTRINGIDO<BR><H4><mark>Debes Iniciar Sesi&oacute;n.</mark></H4>";
			$error['8585'] = "Sesi&oacute;n Expirada <h4><mark>Su tiempo de sesi&oacute;n ha expirado, por favor inicio sesi&oacute;n nuevamente.</mark></h4>";

			if (array_key_exists($codigo, $error)) {
				return $error[$codigo];
			}
			else {
				return $error['default'];
			}
		}

		public function paginaVacia()
		{
			$this->_vista->titulo = 'Error';
			$this->_vista->mensaje = $this->_getError(null);
			$this->_vista->imagen  = $this->imgenError(null);
			$this->_vista->construirVista('error','error');
		}
	}
 ?>