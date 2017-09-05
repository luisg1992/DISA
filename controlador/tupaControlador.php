	<?php
	class tupaControlador extends Controlador
	{
		private $_archivoLibreria;
		private $_pdfDisa;

		public function __construct()
		{
			parent::__construct();
			$this->_archivoLibreria = $this->obtenerLibreria('archivos');
			$this->_pdfDisa 		= $this->obtenerLibreria('pdfDisa');
		}

		public function index()
		{
			#Sesion::destruirSesion();
			#$this->_vista->construirVista('login','login');
		}

		public function desa()		
		{
			$this->_vista->tituloGeneral = "DESA";
			$this->_vista->breadcrumb = $this->breadcrumbVista('Tupa','DESA');
			$this->_vista->construirVista('tupa','desa');
		}

		public function demid()		
		{
			$this->_vista->tituloGeneral = "DEMID";
			$this->_vista->breadcrumb = $this->breadcrumbVista('Tupa','DEMID');
			$this->_vista->construirVista('tupa','demid');
		}

		public function descargarFormatoTupa($nombreArchivo)
		{
			$this->_archivoLibreria->descargarFormatos($nombreArchivo);
		}

		public function GenerarSolicitudDesa()
		{
			$personaNatural 	= $this->obtenerDatosCadena('solicitud_formato_personaNatural');
			$personaJuridica 	= $this->obtenerDatosCadena('solicitud_formato_personaJuridica');
			$representateLegal 	= $this->obtenerDatosCadena('solicitud_formato_representateLegal');
			$ruc 				= $this->obtenerDatosCadena('solicitud_formato_ruc');
			$domicilioFiscal 	= $this->obtenerDatosCadena('solicitud_formato_domicilioFiscal');
			$nombreDirector 	= $this->obtenerDatosCadena('solicitud_formato_nombreDirector');
			$cpiDirector 		= $this->obtenerDatosNumero('solicitud_formato_cpiDirector');
			$direccion 			= $this->obtenerDatosCadena('solicitud_formato_direccion');
			$relefono 			= $this->obtenerDatosNumero('solicitud_formato_relefono');
			$correo 			= $this->obtenerDatosCadena('solicitud_formato_correo');

			
			$this->_pdfDisa->FormatoTupaDesa($personaNatural,$personaJuridica,$representateLegal,$ruc,$domicilioFiscal,$nombreDirector,$cpiDirector,$direccion,$relefono,$correo);
		}

		public function SubirSolicitudDemid()
		{
			$ruta = 'subidas' . DS . 'demid' . DS . 'solicitudes' . DS;
			$respuesta = $this->_archivoLibreria->subirArchivos($_FILES['solicitud_enviar'],$ruta);
			echo json_encode($respuesta);
		}

	}
 ?>