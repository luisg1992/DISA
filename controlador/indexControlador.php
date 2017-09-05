	<?php
	class indexControlador extends Controlador
	{
		

		public function __construct()
		{
			parent::__construct();
			
		}

		public function index()
		{
			Sesion::destruirSesion();
			$this->_vista->fondo = true;
			$this->_vista->construirVista('login','login');
		}

				
		

	}
 ?>