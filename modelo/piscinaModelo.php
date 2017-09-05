<?php
	class piscinaModelo extends DigesaModelo
	{
		public function __construct()
		{
			parent::__construct();
		}

		
		public function ListarCabecerasEvaluacion()
		{
			$consultaSql = "exec PISCINASLISTARCABECERAEVALUCACION";
			$parametros  = NULL;
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ListarItemsxIdCabecereEvaluacion($idCabecera)
		{
			$consultaSql = "exec PISCINASLISTARITEMXCABECERAEVALUCACION :idCabecera";
			$parametros  = array(':idCabecera' => $idCabecera);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ListarOpcionxIdItemxIdCabeceraEvaluacion($idCabecera,$idItem)
		{
			$consultaSql = "exec PISCINASLISTAROPCIONESEVALUCACION :idCabecera, :idItem";
			$parametros  = array(
								':idCabecera' 	=> $idCabecera,
								':idItem'		=> $idItem
								);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function BuscarPiscinasxNombre($nombre)
		{
			$consultaSql = "exec BuscarPiscinaxNombre :nombre";
			$parametros  = array(':nombre' => $nombre);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ListarCodigosPatchs()
		{
			$consultaSql = "exec PiscinaListarCOdigoPachts";
			$parametros  = null;
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function InsertarEvaluacionCabecera($idCalificacion,$fecha,$hora,$idPiscina,$usuario,$calificacion)
		{
			$consultaSql = "exec PiscinaInsertarCabecera :idCalificacion,:fecha,:hora,:idPiscina,:usuario, :calificacion";
			$parametros  = array(
							':idCalificacion' 	=> $idCalificacion,
							':fecha' 			=> $fecha,
							':hora' 			=> $hora,
							':idPiscina' 		=> $idPiscina,
							':usuario' 			=> $usuario,
							':calificacion'		=> $calificacion
								);
			$respuesta   = $this->_consultas->InsertarRegistro($consultaSql,$parametros);
			return $respuesta;
		}


		public function BuscarCalificacionxCodigo($codigo)
		{
			$consultaSql = "exec PiscinaObtenerxIdPiscina :codigo";
			$parametros  = array(':codigo' => $codigo);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function InsertarEvaluacionDetalle($idCalificacion,$codigo,$valor)
		{
			$consultaSql = "exec PiscinaInsertarDetalle :idCalificacion,:codigo,:valor";
			$parametros  = array(
							':idCalificacion' 	=> $idCalificacion,
							':codigo' 			=> $codigo,
							':valor' 			=> $valor
								);
			$respuesta   = $this->_consultas->InsertarRegistro($consultaSql,$parametros);
			return $respuesta;
		}

		public function ListarPiscinasGeneral()
		{
			$consultaSql = "exec PiscinaListarconDistrito";
			$parametros  = null;
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ListarPiscinasxDistrito($IDDISTRITO)
		{
			$consultaSql = "exec PiscinaListarxDistritoW :IDDISTRITO";
			$parametros  = array(':IDDISTRITO' => $IDDISTRITO);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}


		public function ListarPiscinasxIdPiscina($idPiscina)
		{
			$consultaSql = "exec PiscinaListarxIdPiscina :idPiscina";
			$parametros  = array(':idPiscina' => $idPiscina);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ListarPiscinasxCalificacion($calificacion)
		{
			$consultaSql = "exec PiscinasListarXCalificacion :calificacion";
			$parametros  = array(':calificacion' => $calificacion);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ImprimirCriterioxCodigo($codigo)
		{
			$consultaSql = "exec ImprimirCriterioxCodigo :codigo";
			$parametros  = array(':codigo' => $codigo);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function BuscarPiscinasxNombreAdmin($nombre,$idDepartamento)
		{
			$consultaSql = "exec BuscarPiscinaxNombreAdmin :nombre, :idDepartamento";
			$parametros  = array(
						':nombre' => $nombre,
						':idDepartamento' => $idDepartamento
						);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function IngresarPiscinaModelo($nombre,$direccion,$ubigeo,$latitud,$longitud,$idEmpleado,$estado)
		{
			$consultaSql = "exec insertarPiscina :nombre,:direccion,:ubigeo,:latitud,:longitud,:idEmpleado,:estado";
			$parametros  = array(
							':nombre' 		=> $nombre,
							':direccion' 	=> $direccion,
							':ubigeo' 		=> $ubigeo,
							':latitud' 		=> $latitud,
							':longitud' 	=> $longitud,
							':idEmpleado' 	=> $idEmpleado,
							':estado'		=> $estado 
								);
			$respuesta   = $this->_consultas->InsertarRegistro($consultaSql,$parametros);
			return $respuesta;
		}


		public function PiscinasCalificacionxDepartamentoPaginadoAdmin($calificacion, $ubigeo, $dMostrar, $dEmpezar)
		{
			$consultaSql = "exec PiscinasListarXCalificacionxUbigeoPaginadoAdmin :calificacion, :ubigeo, :dMostrar, :dEmpezar";
			$parametros  = array(
						':calificacion' => $calificacion, 
						':ubigeo' 		=> $ubigeo, 
						':dMostrar' 	=> $dMostrar, 
						':dEmpezar' 	=> $dEmpezar
						);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function PiscinasxDepartamentoPaginadoAdmin($ubigeo, $dMostrar, $dEmpezar)
		{
			$consultaSql = "exec PiscinaListarxDepartamentoPaginadoAdmin :ubigeo, :dMostrar, :dEmpezar";
			$parametros  = array(
						':ubigeo' 		=> $ubigeo, 
						':dMostrar' 	=> $dMostrar, 
						':dEmpezar' 	=> $dEmpezar
						);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function PiscinasxUbigeoPaginadoAdmin($ubigeo, $dMostrar, $dEmpezar)
		{
			$consultaSql = "exec PiscinaListarxUbigeoPaginadoAdmin :ubigeo, :dMostrar, :dEmpezar";
			$parametros  = array(
						':ubigeo' 		=> $ubigeo, 
						':dMostrar' 	=> $dMostrar, 
						':dEmpezar' 	=> $dEmpezar
						);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function PiscinasEliminar($estado,$codigo)
		{
			$consultaSql = "exec estadoPiscina :estado, :codigo";
			$parametros  = array(
						':estado' 	=> $estado, 
						':codigo' 	=> $codigo
						);
			$respuesta   = $this->_consultas->EliminarRegistro($consultaSql,$parametros);
			return $respuesta;
		}

		public function PiscinasModificar($nombre, $direccion, $ubigeo, $latitud , $longitud ,$usuCreador, $codigo)
		{
			$consultaSql = "exec actualizarPiscina :nombre, :direccion, :ubigeo, :latitud , :longitud ,:usuCreador, :codigo";
			$parametros  = array(
							':nombre' 		=> $nombre, 
							':direccion' 	=> $direccion, 
							':ubigeo' 		=> $ubigeo, 
							':latitud' 		=> $latitud, 
							':longitud' 	=> $longitud ,
							':usuCreador' 	=> $usuCreador, 
							':codigo' 		=> $codigo 
						);
			$respuesta   = $this->_consultas->ActualizarRegistro($consultaSql,$parametros);
			return $respuesta;
		}

		public function ListarPiscinasxDepartamentoPdF($ubigeo)
		{
			$consultaSql = "exec PiscinaListarxDepartamentoAdmin :ubigeo";
			$parametros  = array(':ubigeo' => $ubigeo);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ListarPiscinasxCalificacionPdF($ubigeo)
		{
			$consultaSql = "exec PiscinasListarXCalificacionxUbigeoAdmin :ubigeo";
			$parametros  = array(':ubigeo' => $ubigeo);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function listarCalificacion($ubigeo)
		{
			$consultaSql = "exec listarCalificacion :ubigeo";
			$parametros  = array(':ubigeo' => $ubigeo);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		//Web Services Para Piscinas
		public function MobilListarPiscinasDepartamento($idDepartamento,$calificacion)
		{
			$consultaSql = "exec MobilListarPiscinasxDepartamento :idDepartamento, :calificacion";
			$parametros  = array(':idDepartamento' => $idDepartamento, ':calificacion' => $calificacion);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function MobilListarPiscinasProvincia($idDepartamento,$idProvincia,$calificacion)
		{
			$consultaSql = "exec MobilListarPiscinasxProvinicia :idDepartamento, :idProvincia, :calificacion";
			$parametros  = array(
								':idDepartamento' 	=> $idDepartamento,
								':idProvincia' 		=> $idProvincia,
								':calificacion'		=> $calificacion
								);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function MobilListarPiscinasDistrito($ubige,$calificacion)
		{
			$consultaSql = "exec MobilListarPiscinasxDistritos :ubige, :calificacion";
			$parametros  = array(':ubige' => $ubige,':calificacion' => $calificacion);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}
		#fin de la clase
	}

 ?>