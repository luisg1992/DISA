<?php
	class bancoSangreModelo extends Modelo
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function BuscarInstitucionxNombre($nombre)
		{
			$consultaSql = "exec BancoSangreBuscarInstitucionxNombre :nombre";
			$parametros  = array(':nombre' => $nombre);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function BuscarInstitucionxIdRenaes($idrenaes)
		{
			$consultaSql = "exec BancoSangreBuscarInstitucionxiIdRenaes :idrenaes";
			$parametros  = array(':idrenaes' => $idrenaes);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		function ListarBancoSangreHemoterapiaM()
		{
			$consultaSql = "exec BancoSangreListarHemoterapia";
			$parametros  = null;
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		function ListarBancoSangreSectorM()
		{
			$consultaSql = "exec BancoSangreListarSector";
			$parametros  = null;
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		function ListarBancoSangreCabM()
		{
			$consultaSql = "exec BancoSangreListarCab";
			$parametros  = null;
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		function ListarBancoSangreTipoM($cabecera)
		{
			$consultaSql = "exec BancoSangreListarTipo :cabecera";
			$parametros  = array(':cabecera' => $cabecera);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		function ListarBancoSangreSubTipoM($idtipo)
		{
			$consultaSql = "exec BancoSangreListarSubTipo :idtipo";
			$parametros  = array(':idtipo' => $idtipo);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		function ListarBancoSangreItemsM($cabecera)
		{
			$consultaSql = "exec BancoSangreListaItemsxCab :cabecera";
			$parametros  = array(':cabecera' => $cabecera);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;	
		}

		function InsertarBancoSangreCabecera($dirPertenece, $jefebanco, $telefono, $correo, $mes, $anio, $usuario, $idsector, $idhemoterapia, $idestablecimiento, $fechabs, $horabs)
		{
			$consultaSql = "exec BancoSangreInsertarCabecera :dirPertenece, :jefebanco, :telefono, :correo, :mes, :anio, :usuario, :idsector, :idhemoterapia, :idestablecimiento, :fechabs, :horabs";
			$parametros  = array(
							':dirPertenece' 		=> $dirPertenece,
							':jefebanco' 			=> $jefebanco,
							':telefono'				=> $telefono,
							':correo' 				=> $correo,
							':mes' 					=> $mes,
							':anio' 				=> $anio,
							':usuario' 				=> $usuario,
							':idsector' 			=> $idsector,
							':idhemoterapia' 		=> $idhemoterapia,
							':idestablecimiento' 	=> $idestablecimiento,
							':fechabs'				=> $fechabs,
							':horabs'				=> $horabs
								);
			$respuesta   = $this->_consultas->InsertarRegistro($consultaSql,$parametros);
			return $respuesta;
		}

		function BuscarBancoSangreCab($codigo)
		{
			$consultaSql = "exec BancoSangreBuscarCab :codigo";
			$parametros  = array(':codigo' => $codigo);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}
		
		function InsertarBancoSangreDetalle($cantidad,$IdInforDoc,$idtipo,$idsubtipo,$iditem)
		{
			$consultaSql = "exec BancoSangreInsertarDetalle :cantidad,:IdInforDoc,:idtipo,:idsubtipo,:iditem";
			$parametros  = array(
							':cantidad' 	=> $cantidad,
							':IdInforDoc' 	=> $IdInforDoc,
							':idtipo' 		=> $idtipo,
							':idsubtipo'	=> $idsubtipo,
							':iditem'		=> $iditem
								);
			$respuesta   = $this->_consultas->InsertarRegistro($consultaSql,$parametros);
			return $respuesta;
		}

		function BuscarCabeceraxId($mes,$anio,$idrenaes)
		{
			$consultaSql = "exec BancoSangreBuscarID :mes, :anio, :idrenaes";
			$parametros  = array(
							':mes' 		=> $mes,
							':anio'		=> $anio,
							':idrenaes' => $idrenaes
							);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		function BancoSangreBuscarReporteM($renaes,$anio,$mes)
		{
			$consultaSql = "exec BancoSangreBuscarReporte :renaes, :anio, :mes";
			$parametros  = array(
							':renaes' 	 => $renaes,
							':anio'		 => $anio,
							':mes'		 => $mes
							);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}
		
		function ListarBancoSangreSubTipoxCabM($cab)
		{
			$consultaSql = "exec BancoSangreListarSubTipoxCab :cab";
			$parametros  = array(
							':cab' 	 => $cab
							);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		function ListarBancoSangreTotales4($renaes,$anio,$mes)
		{
			$consultaSql = "exec BancoSangreSumatoria4 :anio, :mes, :renaes";
			$parametros  = array(
							':renaes' 	 => $renaes,
							':anio'		 => $anio,
							':mes'		 => $mes
							);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		function ListarBancoSangreTotales8($renaes,$anio,$mes)
		{
			$consultaSql = "exec BancoSangreSumatoria8 :anio, :mes, :renaes";
			$parametros  = array(
							':renaes' 	 => $renaes,
							':anio'		 => $anio,
							':mes'		 => $mes
							);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		function ListarBancoSangreTipo1M()
		{
			$consultaSql = "exec BancoSangreListarTipo1";
			$parametros  = null;
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}
		
		function ListarBancoSangreItems1M()
		{
			$consultaSql = "exec BancoSangreListaItems";
			$parametros  = null;
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}


		function ListarBancoSangreSubTipo1M()
		{
			$consultaSql = "exec BancoSangreListarSubTipo1";
			$parametros  = null;
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function BuscarRenaesxIdRenaes($idrenaes)
		{
			$consultaSql = "exec BuscarRenaesPorCodigoUnico :idrenaes";
			$parametros  = array(':idrenaes' => $idrenaes);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		//UNIDADES ALMACENADAS 

		public function ListarBancoSangreTipoSangreM()
		{
			$consultaSql = "exec BancoSangreListarTipoSangre";
			$parametros = null;
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ListarBancoSangreHemocomponenteM()
		{
			$consultaSql = "exec BancoSangreListarHemocomponente";
			$parametros = null;
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;	
		}

		public function UnidadesAlmacenadasBuscarM($renaes,$fecha,$hemocomponente)
		{
			$consultaSql = "exec UnidadesAlmacenadasBuscar :renaes, :fecha, :hemocomponente";
			$parametros = array(
							':renaes' 	 => $renaes,
							':fecha'	 => $fecha,
							':hemocomponente' => $hemocomponente
							);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;	
		}

		public function UnidadesAlmacenadasInsertarCabecerabM($renaes,$fecha,$hora,$sector,$hemocomponente)
		{
			$consultaSql = "exec UnidadesAlmacenadasInsertarCabecera :renaes, :fecha, :hora, :sector, :hemocomponente";
			$parametros = array(
							':renaes' 	 => $renaes,
							':fecha'	 => $fecha,
							':hora'		 => $hora,
							':sector'	 => $sector,
							':hemocomponente' => $hemocomponente
							);
			$respuesta   = $this->_consultas->InsertarRegistro($consultaSql,$parametros);
			return $respuesta;
		}

		public function UnidadesAlmacenadasInsertarDetallebM($idunidalm,$cantidad,$tiposangre)
		{
			$consultaSql = "exec UnidadesAlmacenadasInsertarDetalle :idunidalm, :cantidad, :tiposangre";
			$parametros = array(
							':idunidalm' 	 	 => $idunidalm,
							':cantidad'			 => $cantidad,
							':tiposangre'		 => $tiposangre
							);
			$respuesta   = $this->_consultas->InsertarRegistro($consultaSql,$parametros);
			return $respuesta;
		}
	}
	
 ?>