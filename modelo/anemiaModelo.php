<?php
/**
 * @author Crisanto Rosas Rodolfo
 * @date 16/01/2017
 */
class anemiaModelo extends Modelo {
	public function __construct() {
		parent::__construct ();
	}
	public function ListarCabecerasEvaluacion() {
		$consultaSql = "exec anemiaListarCabeceras";
		$parametros = NULL;
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
	}
	public function ListarPreguntasEvaluacion($idCabecera) {
		$consultaSql = "exec anemiaListarPreguntas :idCabecera";
		$parametros = array (
				':idCabecera' => $idCabecera 
		);
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
	}
	public function ListarOpcionesEvaluacion($idCabecera, $idPregunta) {
		$consultaSql = "exec anemiaListarOpciones :idCabecera, :idPregunta";
		$parametros = array (
				':idCabecera' => $idCabecera,
				':idPregunta' => $idPregunta 
		);
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
	}
	public function ListarCodigoPatch() {
		$consultaSql = "exec anemiaListarCodigosPatch";
		$parametros = NULL;
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
	}

	public function ListarNumVisitasxDNI($dni, $anio) {
		$consultaSql = "exec anemiaListarNumeroVisitas :dni, :anio";
		$parametros = array (
				':dni' => $dni,
				':anio' => $anio 
		);
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
	}

	public function InsertarCabeceraEvaluacion($idEvaluacion,$dniPaciente,$numHistoriaClinica,$apellidoPaternoPaciente,$apellidoMaternoPaciente,$nombres,$diagnosticoHemoglobina,$anemia,$fechaInicioTomaSuplemento,$numDosis,$fechaNacimientoPaciente,$dniResponsable,$apellidoPaternoResponsable,$apellidoMaternoResponsable,$nombresResponsable,$fechaNacimientoResponsable,$tipoParentescoResponsable,$idUsuarioRegistrador,$idRenaes,$fechaEvaluacion,$horaEvaluacion,$numVisita,$observaciones,$domicilio)
		{
			$consultaSql = "exec anemiaInsertarEvaluacionCabecera :idEvaluacion,:dniPaciente,:numHistoriaClinica,:apellidoPaternoPaciente,:apellidoMaternoPaciente,:nombres,:diagnosticoHemoglobina,:anemia,:fechaInicioTomaSuplemento,:numDosis,:fechaNacimientoPaciente,:dniResponsable,:apellidoPaternoResponsable,:apellidoMaternoResponsable,:nombresResponsable,:fechaNacimientoResponsable,:tipoParentescoResponsable,:idUsuarioRegistrador,:idRenaes,:fechaEvaluacion,:horaEvaluacion,:numVisita,:observaciones,:domicilio";
			$parametros  = array(
							':idEvaluacion' 				=> $idEvaluacion,
							':dniPaciente' 					=> $dniPaciente,
							':numHistoriaClinica' 			=> $numHistoriaClinica,
							':apellidoPaternoPaciente' 		=> $apellidoPaternoPaciente,
							':apellidoMaternoPaciente' 		=> $apellidoMaternoPaciente,
							':nombres' 						=> $nombres,
							':diagnosticoHemoglobina' 		=> $diagnosticoHemoglobina,
							':anemia' 						=> $anemia,
							':fechaInicioTomaSuplemento'	=> $fechaInicioTomaSuplemento,
							':numDosis' 					=> $numDosis,
							':fechaNacimientoPaciente' 		=> $fechaNacimientoPaciente,
							':dniResponsable' 				=> $dniResponsable,
							':apellidoPaternoResponsable' 	=> $apellidoPaternoResponsable,
							':apellidoMaternoResponsable' 	=> $apellidoMaternoResponsable,
							':nombresResponsable' 			=> $nombresResponsable,
							':fechaNacimientoResponsable' 	=> $fechaNacimientoResponsable,
							':tipoParentescoResponsable' 	=> $tipoParentescoResponsable,
							':idUsuarioRegistrador' 		=> $idUsuarioRegistrador,
							':idRenaes' 					=> $idRenaes,
							':fechaEvaluacion' 				=> $fechaEvaluacion,
							':horaEvaluacion' 				=> $horaEvaluacion,
							':numVisita' 					=> $numVisita,
							':observaciones' 				=> $observaciones,
							':domicilio' 					=> $domicilio
								);
			$respuesta   = $this->_consultas->InsertarRegistro($consultaSql,$parametros);
			return $respuesta;
		}

		public function InsertarDetalleEvaluacion($idEvaluacion, $codigo, $respuesta)
		{
			$consultaSql = "exec anemiaInsertarEvaluacionDetalle :idEvaluacion, :codigo, :respuesta";
			$parametros = array(
							':idEvaluacion' => $idEvaluacion,
							':codigo' 		=> $codigo,
							':respuesta' 	=> $respuesta
								);
			$respuesta   = $this->_consultas->InsertarRegistro($consultaSql,$parametros);
			return $respuesta;
		}

		public function ListarCabecerasEvaluacionGestantesPuerperas() {
		$consultaSql = "exec anemiaGestantesPuerperasListarCabeceras";
		$parametros = NULL;
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
		}

		public function ListarPreguntasEvaluacionGestantesPuerperas($idCabecera) {
		$consultaSql = "exec anemiaGestantesPuerperasListarPreguntas :idCabecera";
		$parametros = array (
				':idCabecera' => $idCabecera 
		);
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
		}

		public function ListarPreguntasRelacionadasEvaluacionGestantesPuerperas($idCabecera,$idPregunta) {
		$consultaSql = "exec anemiaGestantesPuerperasListarPreguntasRelacionadas :idCabecera, :idPregunta";
		$parametros = array (
				':idCabecera' => $idCabecera, ':idPregunta' => $idPregunta
		);
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
		}	
		
		public function ListarOpcionesEvaluacionGestantesPuerperas($idCabecera,$idPregunta,$idPreguntaRelacionada) {
		$consultaSql = "exec anemiaGestantesPuerperasListarOpciones :idCabecera, :idPregunta, :idPreguntaRelacionada";
		$parametros = array (
				':idCabecera' => $idCabecera, ':idPregunta' => $idPregunta, ':idPreguntaRelacionada' => $idPreguntaRelacionada
		);
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
		}	

		public function ListarNumVisitasxDNIGestantesPuerperas($dni, $anio) {
		$consultaSql = "exec anemiaGestantesPuerperasListarNumeroVisitas :dni, :anio";
		$parametros = array (
				':dni' => $dni,
				':anio' => $anio 
					);
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
		}

		public function ListarCodigoPatchGestantesPuerperas() {

			$consultaSql = "exec anemiaGestantesPuerperasListarCodigoPatch";
			$parametros = NULL;
			$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
			return $respuesta;

		}

		public function anemiaGestantesPuerperasInsertarCabecera($idEvaluacion,$dniPaciente,$numHistoriaClinia,$apellidoPaterno,$apellidoMaterno,$nombres,$edad,$telefono,$direccion,$tipopaciente,$semanagestacional,$anemia,$diagnosticoHemoglobina,$fechaUltControlHemoglobina,$fechaInicioTomaSuplemento,$fechaEvaluacion,$horaEvaluacion,$numVisita,$idUsuarioRegistrador,$direccionactual,$celular){
			$consultaSql = "exec anemiaGestantesPuerperasInsertarEvaluacionCabecera :idEvaluacion,:dniPaciente,:numHistoriaClinia,:apellidoPaterno,:apellidoMaterno,:nombres,:edad,:telefono,:direccion,:tipopaciente,:semanagestacional,:anemia,:diagnosticoHemoglobina,:fechaUltControlHemoglobina,:fechaInicioTomaSuplemento,:fechaEvaluacion,:horaEvaluacion,:numVisita,:idUsuarioRegistrador, :direccionactual, :celular";
			$parametros = array(
							'idEvaluacion' 					=> $idEvaluacion, 
							'dniPaciente' 					=> $dniPaciente, 
							'numHistoriaClinia' 			=> $numHistoriaClinia, 
							'apellidoPaterno' 				=> $apellidoPaterno, 
							'apellidoMaterno'				=> $apellidoMaterno, 
							'nombres' 						=> $nombres, 
							'edad' 							=> $edad, 
							'telefono' 						=> $telefono, 
							'direccion' 					=> $direccion, 
							'tipopaciente' 					=> $tipopaciente, 
							'semanagestacional' 			=> $semanagestacional, 
							'anemia' 						=> $anemia, 
							'diagnosticoHemoglobina' 		=> $diagnosticoHemoglobina, 
							'fechaUltControlHemoglobina' 	=> $fechaUltControlHemoglobina, 
							'fechaInicioTomaSuplemento' 	=> $fechaInicioTomaSuplemento, 
							'fechaEvaluacion' 				=> $fechaEvaluacion, 
							'horaEvaluacion' 				=> $horaEvaluacion, 
							'numVisita' 					=> $numVisita,
							'idUsuarioRegistrador' 			=> $idUsuarioRegistrador,
							'direccionactual' 				=> $direccionactual,
							'celular' 						=> $celular,
							);
			
			$respuesta   = $this->_consultas->InsertarRegistro($consultaSql,$parametros);
			return $respuesta;
		}

		public function anemiaGestantesPuerperasInsertarDetalleEvaluacion($idEvaluacion, $codigo, $respuesta)
		{
			$consultaSql = "exec anemiaGestantesPuerperasInsertarEvaluacionDetalle :idEvaluacion, :codigo, :respuesta";
			$parametros = array(
							':idEvaluacion' => $idEvaluacion,
							':codigo' 		=> $codigo,
							':respuesta' 	=> $respuesta
								);
			$respuesta   = $this->_consultas->InsertarRegistro($consultaSql,$parametros);
			return $respuesta;
		}

		function anemiaGestantesPuerperasBuscarxDni($dni,$nvisita)
		{
			$consultaSql = "exec anemiaGestantesPuerperasBuscarxDni :dni, :nvisita";
			$parametros = array(':dni' => $dni,
								':nvisita' => $nvisita);
			$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
			return $respuesta;
		}

		public function ListarPreguntasEvaluacionGestantesPuerperasInforme()
		{
			$consultaSql = "exec anemiaGestantesPuerperasListarPreguntasInforme";
			$parametros = null;
			$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
			return $respuesta;
		}

		public function ListarPreguntasRelacionadasEvaluacionGestantesPuerperasInforme()
		{
			$consultaSql = "exec anemiaGestantesPuerperasListarPreguntasRelacionadasInforme";
			$parametros = null;
			$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
			return $respuesta;
		}

		public function ListarOpcionesInforme() 
		{
		$consultaSql = "exec anemiaGestantesPuerperasListarOpcionesInforme";
		$parametros = null;
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
		}

		public function ListarAnemiaGestantesPuerperasDetalleInforme($dni,$nvisita)
		{
			$consultaSql = "exec anemiaGestantesPuerperasListarDetalleInforme :dni, :nvisita";
			$parametros = array(':dni' => $dni,
								':nvisita' => $nvisita);
			$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
			return $respuesta;
			
		}

		public function anemiaMenores4MesesListarNumVisitasxDNI($dni, $anio) {
		$consultaSql = "exec anemiaMenores4MesesListarNumeroVisitas :dni, :anio";
		$parametros = array (
				':dni' => $dni,
				':anio' => $anio 
					);
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
		}

		public function anemiaMenores4MesesListarCabecerasEvaluacion() {
		$consultaSql = "exec anemiaMenores4MesesListarCabeceras";
		$parametros = NULL;
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
		}

		public function anemiaMenores4MesesListarPreguntasEvaluacion($idCabecera) {
		$consultaSql = "exec anemiaMenores4MesesListarPreguntas :idCabecera";
		$parametros = array (
				':idCabecera' => $idCabecera 
		);
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
		}

		public function anemiaMenores4MesesListarPreguntasRelacionadasEvaluacion($idCabecera,$idPregunta) {
		$consultaSql = "exec anemiaMenores4MesesListarPreguntasRelacionadas :idCabecera, :idPregunta";
		$parametros = array (
				':idCabecera' => $idCabecera, ':idPregunta' => $idPregunta
		);
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
		}

		public function anemiaMenores4MesesListarOpcionesEvaluacion($idCabecera,$idPregunta,$idPreguntaRelacionada) {
		$consultaSql = "exec anemiaMenores4MesesListarOpciones :idCabecera, :idPregunta, :idPreguntaRelacionada";
		$parametros = array (
				':idCabecera' => $idCabecera, ':idPregunta' => $idPregunta, ':idPreguntaRelacionada' => $idPreguntaRelacionada
		);
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
		}

		public function anemiaMenores4MesesListarCodigoPatch() {

			$consultaSql = "exec anemiaMenores4MesesListarCodigoPatch";
			$parametros = NULL;
			$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
			return $respuesta;

		}
	
		public function anemiaMenores4MesesInsertarCabecera($idEvaluacion,$dniPaciente,$numHistoriaClinia,$apellidoPaternoPaciente,$apellidoMaternoPaciente,$nombresPaciente,$sexo,$fechaNacimiento,$pesoNacer,$telefono,$dniMadre,$apellidoPaternoMadre,$apellidoMaternoMadre,$nombresMadre,$direccion,$idUsuarioRegistrador,$fechaEvaluacion,$horaEvaluacion,$numVisita,$observaciones,$controlcred,$pesocred,$anemia,$diagnosticoHemoglobina,$fechaUltControlHemoglobina,$celular,$compromiso,$edadgestacionalnacer){
			$consultaSql = "exec anemiaMenores4MesesInsertarEvaluacionCabecera  :idEvaluacion, :dniPaciente, :numHistoriaClinia, :apellidoPaternoPaciente, :apellidoMaternoPaciente, :nombresPaciente, :sexo, :fechaNacimiento, :pesoNacer, :telefono, :dniMadre, :apellidoPaternoMadre, :apellidoMaternoMadre, :nombresMadre, :direccion, :idUsuarioRegistrador, :fechaEvaluacion, :horaEvaluacion, :numVisita, :observaciones, :controlcred , :pesocred, :anemia,:diagnosticoHemoglobina,:fechaUltControlHemoglobina,:celular,:compromiso,:edadgestacionalnacer";
			//$consultaSql = "exec anemiaMenores4MesesInsertarEvaluacionCabecera ".$idEvaluacion.','.$dniPaciente.','.$numHistoriaClinia.','.$apellidoPaternoPaciente.','.$apellidoMaternoPaciente.','.$nombresPaciente.','.$sexo.','.$fechaNacimiento.','.$pesoNacer.','.$telefono.','.$dniMadre.','.$apellidoPaternoMadre.','.$apellidoMaternoMadre.','.$nombresMadre.','.$direccion.','.$idUsuarioRegistrador.','.$fechaEvaluacion.','.$horaEvaluacion.','.$numVisita.','.$observaciones.','.$controlcred .','.$pesocred;
			//echo $consultaSql;exit();
			$parametros = array(
							'idEvaluacion' 					=> $idEvaluacion, 
							'dniPaciente' 					=> $dniPaciente, 
							'numHistoriaClinia' 			=> $numHistoriaClinia, 
							'apellidoPaternoPaciente' 		=> $apellidoPaternoPaciente, 
							'apellidoMaternoPaciente'		=> $apellidoMaternoPaciente, 
							'nombresPaciente' 				=> $nombresPaciente, 
							'sexo' 							=> $sexo, 
							'fechaNacimiento' 				=> $fechaNacimiento, 
							'pesoNacer' 					=> $pesoNacer, 
							'telefono' 						=> $telefono,
							'dniMadre' 						=> $dniMadre, 
							'apellidoPaternoMadre' 			=> $apellidoPaternoMadre, 
							'apellidoMaternoMadre' 			=> $apellidoMaternoMadre, 
							'nombresMadre' 					=> $nombresMadre, 
							'direccion' 					=> $direccion, 
							'idUsuarioRegistrador' 			=> $idUsuarioRegistrador, 
							'fechaEvaluacion' 				=> $fechaEvaluacion, 
							'horaEvaluacion' 				=> $horaEvaluacion, 
							'numVisita' 					=> $numVisita,
							'observaciones' 				=> $observaciones,
							'controlcred' 					=> $controlcred, 
							'pesocred' 						=> $pesocred,
							'anemia' 						=> $anemia,
							'diagnosticoHemoglobina' 		=> $diagnosticoHemoglobina,
							'fechaUltControlHemoglobina' 	=> $fechaUltControlHemoglobina,
							'celular' 						=> $celular,
							'compromiso' 					=> $compromiso,
							'edadgestacionalnacer' 			=> $edadgestacionalnacer
							);

			//print_r($parametros);exit();
			$respuesta   = $this->_consultas->InsertarRegistro($consultaSql,$parametros);	
			//echo $respuesta;exit();
			return $respuesta;
		}

		public function anemiaMenores4MesesInsertarDetalleEvaluacion($idEvaluacion, $codigo, $respuesta)
		{
			$consultaSql = "exec anemiaMenores4MesesInsertarEvaluacionDetalle :idEvaluacion, :codigo, :respuesta";

			$parametros = array(
							':idEvaluacion' => $idEvaluacion,
							':codigo' 		=> $codigo,
							':respuesta' 	=> $respuesta
								);
			//print_r($parametros);return false;
			$respuesta   = $this->_consultas->InsertarRegistro($consultaSql,$parametros);
			return $respuesta;
		}

		//exec anemiaMenores4MesesInsertarEvaluacionCabecera '42424242201701','42424242','1222222222','pat','mat','nom','M','2017-01-03','4.5','131311313','16161611','pat','mat','nom','dire','1035','2017-01-31','10:31:25','01','NULL','NULL','NULL'

		#Entre4y15Meses

		public function anemiaEntre4y15MesesListarNumeroVisitasxDNI($dni, $anio) {
			$consultaSql = "exec anemiaEntre4y15MesesListarNumeroVisitas :dni, :anio";
			$parametros = array (
				':dni' => $dni,
				':anio' => $anio 
					);
			$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
			return $respuesta;
		}

		public function anemiaEntre4y15MesesListarCabecerasEvaluacion() {
			$consultaSql = "exec anemiaEntre4y15MesesListarCabeceras";
			$parametros = NULL;
			$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
			return $respuesta;
		}

		public function anemiaEntre4y15MesesListarPreguntasEvaluacion($idCabecera) {
			$consultaSql = "exec anemiaEntre4y15MesesListarPreguntas :idCabecera";
			$parametros = array (
					':idCabecera' => $idCabecera 
			);
			$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
		}

		public function anemiaEntre4y15MesesListarPreguntasRelacionadasEvaluacion($idCabecera,$idPregunta) {
			$consultaSql = "exec anemiaEntre4y15MesesListarPreguntasRelacionadas :idCabecera, :idPregunta";
			$parametros = array (
					':idCabecera' => $idCabecera, ':idPregunta' => $idPregunta
			);
			$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
			return $respuesta;
		}

		public function anemiaEntre4y15MesesListarOpcionesEvaluacion($idCabecera,$idPregunta,$idPreguntaRelacionada) {
			$consultaSql = "exec anemiaEntre4y15MesesListarOpciones :idCabecera, :idPregunta, :idPreguntaRelacionada";
			$parametros = array (
					':idCabecera' => $idCabecera, ':idPregunta' => $idPregunta, ':idPreguntaRelacionada' => $idPreguntaRelacionada
			);
			$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
			return $respuesta;
		}

		public function anemiaEntre4y15MesesInsertarCabecera($idEvaluacion,$numHistoriaClinica,$dniPaciente,$apellidoPaternoPaciente,$apellidoMaternoPaciente,$nombresPaciente,$sexo,$fechaNacimiento,$pesoNacer,$edadgestacionalnacer,$dniMadre,$apellidoPaternoMadre,$apellidoMaternoMadre,$nombresMadre,$telefono,$direccion,$controlCred,$pesoCred,$idUsuarioRegistrador,$fechaEvaluacion,$horaEvaluacion,$numVisita,$observaciones,$anemia,$diagnosticoHemoglobina,$fechaUltControlHemoglobina,$celular,$compromiso){
			$consultaSql = "exec anemiaEntre4y15MesesInsertarCabecera :idEvaluacion,:numHistoriaClinica,:dniPaciente,:apellidoPaternoPaciente,:apellidoMaternoPaciente,:nombresPaciente,:sexo,:fechaNacimiento,:pesoNacer,:edadgestacionalnacer,:dniMadre,:apellidoPaternoMadre,:apellidoMaternoMadre,:nombresMadre,:telefono,:direccion,:controlCred,:pesoCred,:idUsuarioRegistrador,:fechaEvaluacion,:horaEvaluacion,:numVisita,:observaciones, :anemia,:diagnosticoHemoglobina,:fechaUltControlHemoglobina,:celular,:compromiso";			
			$parametros = array(
							'idEvaluacion' 					=> $idEvaluacion, 
							'dniPaciente' 					=> $dniPaciente, 
							'numHistoriaClinica' 			=> $numHistoriaClinica, 
							'apellidoPaternoPaciente' 		=> $apellidoPaternoPaciente, 
							'apellidoMaternoPaciente'		=> $apellidoMaternoPaciente, 
							'nombresPaciente' 				=> $nombresPaciente, 
							'sexo' 							=> $sexo, 
							'fechaNacimiento' 				=> $fechaNacimiento, 
							'pesoNacer' 					=> $pesoNacer, 
							'edadgestacionalnacer' 			=> $edadgestacionalnacer,							
							'dniMadre' 						=> $dniMadre, 
							'apellidoPaternoMadre' 			=> $apellidoPaternoMadre, 
							'apellidoMaternoMadre' 			=> $apellidoMaternoMadre, 
							'nombresMadre' 					=> $nombresMadre, 
							'telefono' 						=> $telefono,
							'direccion' 					=> $direccion, 
							'controlCred' 					=> $controlCred,
							'pesoCred' 						=> $pesoCred,
							'idUsuarioRegistrador' 			=> $idUsuarioRegistrador, 
							'fechaEvaluacion' 				=> $fechaEvaluacion, 
							'horaEvaluacion' 				=> $horaEvaluacion, 
							'numVisita' 					=> $numVisita,
							'observaciones' 				=> $observaciones,
							'anemia' 						=> $anemia,
							'diagnosticoHemoglobina' 		=> $diagnosticoHemoglobina,
							'fechaUltControlHemoglobina' 	=> $fechaUltControlHemoglobina,
							'celular' 						=> $celular,
							'compromiso' 					=> $compromiso
							);
			$respuesta   = $this->_consultas->InsertarRegistro($consultaSql,$parametros);			
			return $respuesta;
		}

		public function anemiaEntre4y15MesesListarCodigoPatch() {

			$consultaSql = "exec anemiaEntre4y15MesesListarCodigoPatch";
			$parametros = NULL;
			$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
			return $respuesta;

		}

		public function anemiaEntre4y15MesesInsertarDetalleEvaluacion($idEvaluacion, $codigo, $respuesta)
		{
			$consultaSql = "exec anemiaEntre4y15MesesInsertarDetalle :idEvaluacion, :codigo, :respuesta";
			$parametros = array(
							':idEvaluacion' => $idEvaluacion,
							':codigo' 		=> $codigo,
							':respuesta' 	=> $respuesta
								);
			$respuesta   = $this->_consultas->InsertarRegistro($consultaSql,$parametros);
			return $respuesta;
		}
}
?>