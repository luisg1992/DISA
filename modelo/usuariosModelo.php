<?php
	class usuariosModelo extends Modelo
	{
		public function __construct()
		{
			parent::__construct();
		}

		/*validar usuarios*/
		public function validarExitensiaUsuario($usuario)
		{
			$consultaSql = "exec ValidarExistenciaUsuario :usuario";
			$parametros  = array(':usuario' => $usuario);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		/*validar datos de usuario*/
		public function validarDatosUsuario($usuario,$clave)
		{
			$consultaSql = "exec ValidarDatosLoginUsuario :usuario, :clave";
			$parametros  = array(
								':usuario' 	=> $usuario,
								':clave' 	=> $clave);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}
		
		/*listar permisos por id*/
		public function ListarPermisosxId($idEmpleado)
		{
			$consultaSql = "exec ListarPermisosxIdEmpleado :idEmpleado";
			$parametros  = array(':idEmpleado' => $idEmpleado);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		/*listar empleados por idEmpleado*/
		public function ListarEmpleadoxId($idEmpleado)
		{
			$consultaSql = "exec EmpleadoBuscarxIdEmpleado :idEmpleado";
			$parametros  = array(':idEmpleado' => $idEmpleado);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ActualizarUsuariosDato($contNueva,$idEmpleado)
		{
			$consultaSql = "exec UsuariosActualizarPassword :idEmpleado, :contNueva" ;
			$parametros  = array(
								':idEmpleado' 	=> $idEmpleado,
								':contNueva' 	=> $contNueva);
			$respuesta   = $this->_consultas->ActualizarRegistro($consultaSql,$parametros);
			return $respuesta;
		}

		public function MaximoIdUsuario()
		{
			$consultaSql = "exec UsuarioMaximoIdUsuario";
			$parametros = NULL;
			$respuesta = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);	
			return $respuesta;	
		}

		public function CrearUsuarioBancoSangre($idusuario,$establecimiento,$usuario,$contrasenia)
		{
			$consultaSql = "exec BancoSangreCrearUsuario :idusuario, :establecimiento, :usuario, :contrasenia" ;
			$parametros = array(
								':idusuario' => $idusuario,
								':establecimiento'	=>	$establecimiento,
								':usuario'	=>	$usuario,
								':contrasenia' =>	$contrasenia);
			$respuesta = $this->_consultas->InsertarRegistro($consultaSql,$parametros);	
			return $respuesta;
		}

		public function AgregarAReporteBancoSangre($idEstablecimiento,$idhemoterapia,$idsector)
		{
			$consultaSql = "exec BancoSangreAgregarAReporte :idEstablecimiento, :idhemoterapia, :idsector" ;
			$parametros = array(
								':idEstablecimiento'	=>	$idEstablecimiento,
								':idhemoterapia'	=>	$idhemoterapia,
								':idsector' =>	$idsector);
			$respuesta = $this->_consultas->InsertarRegistro($consultaSql,$parametros);	
			return $respuesta;
		}

		#fin de la clase
	}

 ?>