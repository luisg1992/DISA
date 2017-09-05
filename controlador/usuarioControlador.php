<?php 
	/**
	* fecha: 05/01/2017
	* autor: Rodolfo Crisanto Rosas
	*/
	class usuarioControlador extends Controlador
	{
		private $_modeloUbigeo;

		public function __construct()
		{
			parent::__construct();
			$this->_modeloUsuarios 	= $this->obtenerModelo('usuarios');
		}

		public function index(){}

		public function verConfiguracion()
		{
			$usuario = $this->datosUsuarioLogueado();


			$this->_vista->nombreUsuario = $usuario['usuario'];
			$this->_vista->idEmpleado = $usuario['idEmpleado'];
			$this->_vista->breadcrumb = $this->breadcrumbVista('Cuenta','Configuración');
			$this->_vista->tituloGeneral = "Configuración de Contraseña";
			$this->_vista->construirVista('cuenta','configuracion');
		}

		public function crearUsuarioBancoSangre()
		{
			$idEstablecimiento = $this->obtenerDatosCadena('buscarRenaes');	
			$idUsuario = $this->obtenerDatosCadena('usuario');
			$idContrasenia = $this->obtenerDatosCadena('contra');
			$temporal = $this->_modeloUsuarios->MaximoIdUsuario();
			$temporal1 = $temporal[0]['empleado'];

			$respuesta = $this->_modeloUsuarios->CrearUsuarioBancoSangre($temporal1,$idEstablecimiento,$idUsuario,md5($idContrasenia));

			if($respuesta == "M_1"){
				$mensaje = array(
						'it' => 'M_3',
						'mensaje' => 'Creacion de Usuario exitosa'
					);	
				}
			else{
					$mensaje = array(
						'it' => 'M_4',
						'mensaje' => 'Intentelo nuevamente por favor'
					);
				}

			echo json_encode($mensaje);
			exit();

		}

		public function agregarReporteBancoSangre()
		{
			$idEstablecimiento = $this->obtenerDatosCadena('buscarRenaes');	
			$idhemoterapia = $this->obtenerDatosCadena('hemoterapiach');
			$idsector = $this->obtenerDatosCadena('sectorch');

			$respuesta = $this->_modeloUsuarios->AgregarAReporteBancoSangre($idEstablecimiento,$idhemoterapia,$idsector);

			if($respuesta == "M_1"){
				$mensaje = array(
						'it' => 'M_3',
						'mensaje' => 'Establecimiento Agregado a Reporte'
					);	
				}
			else{
					$mensaje = array(
						'it' => 'M_4',
						'mensaje' => 'Intentelo nuevamente por favor'
					);
				}

			echo json_encode($mensaje);
			exit();
		}

		public function actualizaContrasenia()
		{
			$idEmpleado = $this->obtenerDatosNumero('empleado_id');
			$antigua_contra = $this->obtenerDatosCadena('antigua_contra');
			$nueva_contra = $this->obtenerDatosCadena('nueva_contra');
			$repite_contra = $this->obtenerDatosCadena('repite_contra');

			$usuario = $this->datosUsuarioLogueado();

			if (md5($antigua_contra) != $usuario['clave']) {
				$mensaje = array(
						'it' => 'M_1',
						'mensaje' => 'La constraseña no es la correcta'
					);
			}
			else
			{
				if (md5($nueva_contra) != md5($repite_contra)) {
					$mensaje = array(
						'it' => 'M_2',
						'mensaje' => 'Las constraseñas no son iguales'
					);
				}
				else
				{
					if (strlen($nueva_contra) < 4) {
						$mensaje = array(
							'it' => 'M_5',
							'mensaje' => 'Mínimo 4 caracteres'
						);
					}
					else{
						$respuesta = $this->_modeloUsuarios->ActualizarUsuariosDato($idEmpleado,md5($nueva_contra));
						if ($respuesta == "M_1") {
							$mensaje = array(
								'it' => 'M_3',
								'mensaje' => 'Actualización exitosa, cierre sesión y vuelva a ingresar al sistema.'
							);	
						}
						else{
							$mensaje = array(
								'it' => 'M_4',
								'mensaje' => 'Intentelo nuevamente por favor'
							);
						}
					}

					
				}
			}

			echo json_encode($mensaje);
			exit();
		}	

		private function datosUsuarioLogueado()
		{
			$temporal = $this->_modeloUsuarios->ListarEmpleadoxId(Sesion::get('idusuario'));

			$usuarioLogueado = array(
				'idEmpleado' 			=> $temporal[0]['idEmpleado'],
				'apellidoPaterno' 		=> $temporal[0]['apellidoPaterno'],
				'apellidoMaterno' 		=> $temporal[0]['apellidoMaterno'],
				'nombres'				=> $temporal[0]['nombres'],
				'dni' 					=> $temporal[0]['dni'],
				'codigoPlanilla' 		=> $temporal[0]['codigoPlanilla'],
				'usuario' 				=> $temporal[0]['usuario'],
				'clave' 				=> $temporal[0]['clave'],
				'fechaNacimiento' 		=> $temporal[0]['fechaNacimiento'],
				'esActivo' 				=> $temporal[0]['esActivo'],
				'idCondicionTrabajo' 	=> $temporal[0]['idCondicionTrabajo'],
				'TiposCondicionTrabajo' => $temporal[0]['CONDICIONTRABAJO'],
				'idTipoEmpleado' 		=> $temporal[0]['idTipoEmpleado'],
				'TiposEmpleado' 		=> $temporal[0]['TIPOEMPLEADO'],
				'ubige' 				=> $temporal[0]['ubigeo']
			);

			return $usuarioLogueado;
		}

///////////////////////////CREAR INSTITUCION USUARIO///////////////////////////////

		public function creUsuIns()
		{
			$usuario = $this->datosUsuarioLogueado();


			$this->_vista->nombreUsuario = $usuario['usuario'];
			$this->_vista->idEmpleado = $usuario['idEmpleado'];
			$this->_vista->breadcrumb = $this->breadcrumbVista('Crear Usuario Banco Sangre','Configuración');
			$this->_vista->tituloGeneral = "Crear Usuario Banco Sangre";
			$this->_vista->construirVista('cuenta','configuracion');
		}


	/**
	* fin de la calse
	**/
	}
 ?>