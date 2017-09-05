<?php 
/**
* 
*/
class fichadomiciliariaControlador extends Controlador
{
	private $_modeloAnemia;
	public function __construct()
	{
		$this->_modeloAnemia = $this->obtenerModelo('anemia');
		parent::__construct();
	}

	public function index(){}

	public function InformeGestantes()
		{
			Sesion::accesos ( 'logueado' );
			$this->_vista->fichagestantespuerperas = $this->generarFichaGestantesPuerperas();		
			$this->_vista->breadcrumb = $this->breadcrumbVista('F.V.D.','A. Gestantes y Puérperas');
			$this->_vista->tituloGeneral = "F.V.D. Prevencion y Control de la Anemia Gestantes y Puérperas";
			$this->_vista->construirVista('informes','gestantes');
		}

		public function buscarNumeroVisitasGestantesPuerperas()
		{
			$anio = date('Y');
			$dni = $this->obtenerDatosCadena('dniPaciente');
			$respuesta = $this->_modeloAnemia->ListarNumVisitasxDNIGestantesPuerperas($dni,$anio);
			echo json_encode($respuesta[0]['NVISITA']);
		}

		private function generarFichaGestantesPuerperas()
		{
			$cabeceras = $this->_modeloAnemia->ListarCabecerasEvaluacionGestantesPuerperas();
			$html = null;

			for ($i=0; $i < count($cabeceras); $i++) { 
				$html .= "<div class='row'>";
				$html .= "<div class='panel panel-default'>";
					$html .= "<div class='panel-heading'>" . $cabeceras [$i] ['CABECERA'] . "</div>";
					$html .= "<div class='panel-body'>";
					$html .= "</div>";
					$html .= "<div class='table-responsive'>";
				    	$html .= "<table id='evaluaciongestantesypuerperas' class='table table-bordered' style='text-align: left;'>";
				    	#preguntas
				    	$indicePreguntas = 0;
				    	$preguntas = $this->_modeloAnemia->ListarPreguntasEvaluacionGestantesPuerperas($cabeceras [$i] ['IDCABECERA']);

				    	#preguntas

				    	for ($j=0; $j < count($preguntas); $j++) { 
				    		$indicePreguntas = $indicePreguntas + 1;				    		
				    		$html .= "<tr>";
				    			$html .= "<td colspan='2' class='text-center'>" . $indicePreguntas . ".-</td>";
				    			$html .= "<td colspan='3'><b>" . $preguntas[$j]['PREGUNTA'] ."</b></td>";
				    		$html .= "</tr>";				    		
				    		
				    		#preguntasrelacionadas
				    			
				    		$preguntasrelacionadas = $this->_modeloAnemia->ListarPreguntasRelacionadasEvaluacionGestantesPuerperas($cabeceras [$i] ['IDCABECERA'],$preguntas[$j]['IDPREGUNTA']);
				    			
				    		if(empty($preguntasrelacionadas)){

				    			//opcionespreguntas	

				    			$opciones_distintas = $this->_modeloAnemia->ListarOpcionesEvaluacionGestantesPuerperas($cabeceras [$i] ['IDCABECERA'],$preguntas[$j]['IDPREGUNTA'],'00');

				    			for ($p=0; $p < count($opciones_distintas); $p++) { 
				    				$html .= "<tr>";

				    				if ($opciones_distintas[$p]['LLENADO'] == 0 && $opciones_distintas[$p]['CHEKBOX'] == 0) {
							    		$html .= "<td colspan='2'></td>";
							    		$html .= "<td>" . $opciones_distintas[$p]['OPCION'] ."</td>";
							    		$html .= "<td class='text-center'><input type='radio' name='" . $opciones_distintas[$p]['NAME'] . "' value='" . $opciones_distintas[$p]['VALUE'] . "' id=''/></td>";	
							    		$html .= "<td></td>";
							    	}


							    	if ($opciones_distintas[$p]['LLENADO'] == 1 ) {

							    		if ($opciones_distintas[$p]['LLENADO'] == 1 && $opciones_distintas[$p]['OPCION'] == NULL && $opciones_distintas[$p]['CHEKBOX'] == 0)  {
					    					$html .= "<td colspan='2'></td>";					    						
					    					$html .= "<td colspan='3' style='padding: 0 !important;'><input type='text' name='" . $opciones_distintas[$p]['NAME'] . "' class='form-control input-sm' style='margin:0px !important; border: none;'><input type='hidden' id='" . $opciones_distintas[$p]['VALUE'] . "b' /></td>";
					    				}

					    				else{
							    			$html .= "<td colspan='2'></td>";
					    					$html .= "<td>" . $opciones_distintas[$p]['OPCION'] ."</td>";
					    					$html .= "<td class='text-center'><input type='radio' name='" . $opciones_distintas[$p]['NAME'] . "' id='" . $opciones_distintas[$p]['VALUE'] . "a' /></td>";
					    					$html .= "<td style='padding: 0 !important;'><input type='text' id='" . $opciones_distintas[$p]['VALUE'] . "' name='" . $opciones_distintas[$p]['NAME'] . "a' class='form-control input-sm' style='margin:0px !important; border: none;' disabled/><input type='hidden' id='" . $opciones_distintas[$p]['VALUE'] . "b' /></td>";
					    				}							    			
					    			}

					    			$html .= "</tr>";

				    			}

				    				
				    		}
				    		else{

				    			//opcionespreguntasquetienenpreguntasrelacionadas

				    			$opciones_distintas = $this->_modeloAnemia->ListarOpcionesEvaluacionGestantesPuerperas($cabeceras [$i] ['IDCABECERA'],$preguntas[$j]['IDPREGUNTA'],'00');

				    			for ($p=0; $p < count($opciones_distintas); $p++) { 
				    				$html .= "<tr>";

				    					if ($opciones_distintas[$p]['LLENADO'] == 0 && $opciones_distintas[$p]['CHEKBOX'] == 0) {
							    			$html .= "<td colspan='2'></td>";
							    			$html .= "<td>" . $opciones_distintas[$p]['OPCION'] ."</td>";
							    			$html .= "<td class='text-center'><input type='radio' name='" . $opciones_distintas[$p]['NAME'] . "' value='" . $opciones_distintas[$p]['VALUE'] . "' id=''/></td>";	
							    			$html .= "<td></td>";
							    		}

				    					if ($opciones_distintas[$p]['LLENADO'] == 1 ) {

							    			if ($opciones_distintas[$p]['LLENADO'] == 1 && $opciones_distintas[$p]['OPCION'] == NULL && $opciones_distintas[$p]['CHEKBOX'] == 0)  {
					    						$html .= "<td colspan='2'></td>";					    						
					    						$html .= "<td colspan='3' style='padding: 0 !important;'><input type='text' name='" . $opciones_distintas[$p]['NAME'] . "' id='" . $opciones_distintas[$p]['VALUE'] . "' class='form-control input-sm' style='margin:0px !important; border: none;'></td>";
					    					}

					    					else{
							    				$html .= "<td colspan='2'></td>";
					    						$html .= "<td>" . $opciones_distintas[$p]['OPCION'] ."</td>";
					    						$html .= "<td class='text-center'><input type='radio' name='" . $opciones_distintas[$p]['NAME'] . "' id='" . $opciones_distintas[$p]['VALUE'] . "a' /></td>";
					    						$html .= "<td style='padding: 0 !important;'><input type='text' id='" . $opciones_distintas[$p]['VALUE'] . "' name='" . $opciones_distintas[$p]['NAME'] . "a' class='form-control input-sm' style='margin:0px !important; border: none;' disabled/><input type='hidden' id='" . $opciones_distintas[$p]['VALUE'] . "b' /></td>";
					    					}							    			
					    				}

					    			$html .= "</tr>";
					    		}

					    		//preguntasrelacionadas

				    			for ($k=0; $k < count($preguntasrelacionadas); $k++) { 

				    				$idpreguntarelacionada = substr($preguntasrelacionadas[$k]['IDPREGUNTARELACIONADA'],1,1);	    		
				    				$indicePreguntasRelacionadas = $indicePreguntas + 1;
				    				$html .= "<tr>";
				    					$html .= "<td></td>";
				    					$html .= "<td class='text-center'>" .$indicePreguntas.".".$idpreguntarelacionada. ".-</td>";
				    					$html .= "<td colspan='3'>" . $preguntasrelacionadas[$k]['PREGUNTARELACIONADA'] ."</td>";
				    				$html .= "</tr>"; 
				    				
				    				$opciones = $this->_modeloAnemia->ListarOpcionesEvaluacionGestantesPuerperas($cabeceras [$i] ['IDCABECERA'],$preguntas[$j]['IDPREGUNTA'],$preguntasrelacionadas[$k]['IDPREGUNTARELACIONADA']);   				

				    				//opcionespreguntasrelacionadas

				    				for ($s=0; $s < count($opciones); $s++) { 

				    					if($opciones[$s]['NAME'])

				    					$html .= "<tr>";

				    						if ($opciones[$s]['LLENADO'] == 0 && $opciones[$s]['CHEKBOX'] == 0) {
							    				$html .= "<td colspan='2'></td>";
							    				$html .= "<td>" . $opciones[$s]['OPCION'] ."</td>";
							    				$html .= "<td class='text-center'><input type='radio' name='" . $opciones[$s]['NAME'] . "' value='" . $opciones[$s]['VALUE'] . "' id=''/></td>";	
							    				$html .= "<td></td>";
							    			}

							    			if ($opciones[$s]['LLENADO'] == 1 ) {

							    				if ($opciones[$s]['LLENADO'] == 1 && $opciones[$s]['OPCION'] == NULL && $opciones[$s]['CHEKBOX'] == 0)  {
					    						$html .= "<td colspan='2'></td>";					    						
					    						$html .= "<td colspan='3' style='padding: 0 !important;'><input type='text' name='" . $opciones[$s]['NAME'] . "' id='" . $opciones[$s]['VALUE'] . "' class='form-control input-sm' style='margin:0px !important; border: none;'></td>";
					    						}

					    						else{
							    				$html .= "<td colspan='2'></td>";
					    						$html .= "<td>" . $opciones[$s]['OPCION'] ."</td>";
					    						$html .= "<td class='text-center'><input type='radio' name='" . $opciones[$s]['NAME'] . "' id='" . $opciones[$s]['VALUE'] . "a' /></td>";
					    						$html .= "<td style='padding: 0 !important;'><input type='text' id='" . $opciones[$s]['VALUE'] . "' name='" . $opciones[$s]['NAME'] . "a' class='form-control input-sm' style='margin:0px !important; border: none;' disabled/><input type='hidden' id='" . $opciones[$s]['VALUE'] . "b' /></td>";
					    						}
					    					}

					    					if ($opciones[$s]['CHEKBOX'] == 1) {
					    						$html .= "<td colspan='2'></td>";
					    						$html .= "<td>" . $opciones[$s]['OPCION'] ."</td>";
					    						$html .= "<td class='text-center'><input type='checkbox' name='" . $opciones[$s]['NAME'] . "[]' value='" . $opciones[$s]['VALUE'] . "' /></td>";
					    						$html .= "<td></td>";
					    					}
					    					
					    					
					    				$html .= "</tr>";
				    				}
				    			}
				    		}
				    	}

				    	$html .= "</table>";
				    $html .= "</div>";
				$html .= "</div>";	
				$html .= "</div>";		
			}

			return $html;
		}

		public function registraranemiaGestantesPuerperas(){

			$dniPaciente 				= $this->obtenerDatosCadena('dniPaciente');
			$numHistoriaClinia 			= $this->obtenerDatosCadena('nhistoriaclinica');
			$apellidoPaterno 			= $this->obtenerDatosCadena('apellidopaterno');
			$apellidoMaterno 			= $this->obtenerDatosCadena('apellidomaterno');
			$nombres 					= $this->obtenerDatosCadena('nombres');	
			$edad 						= $this->obtenerDatosCadena('edad');	
			$telefono 					= $this->obtenerDatosCadena('telefono');	
			$direccion 					= $this->obtenerDatosCadena('direccion');	
			$tipopaciente 				= $this->obtenerDatosCadena('tipogop');	
			$semanagestacional 			= $this->obtenerDatosCadena('semanagestacional');			
			$anemia						= $this->obtenerDatosCadena('anemiaCa');	
			$diagnosticoHemoglobina 	= $this->obtenerDatosCadena('diagHemo');	
			$fechaUltControlHemoglobina = $this->obtenerDatosCadena('fechadosajehemoglobina');	
			$fechaInicioTomaSuplemento 	= $this->obtenerDatosCadena('fechaIniciSuplMicro');	
			$direccionactual 			= $this->obtenerDatosCadena('direccionactual');	
			$celular 					= $this->obtenerDatosCadena('celular');	
			$fechaEvaluacion 			= date('Y-m-d');	
			$numVisita 					= $this->obtenerDatosCadena('numVisitash');

			if($anemia==null){
				$anemiaCa=0;	
			}
			if($semanagestacional==null){
				$semanagestacional=0;	
			}			

			$idUsuarioRegistrador 		= Sesion::get ( 'idusuario' );
			$horaEvaluacion 			= date('h:i:s');

			$numVisita = $numVisita + 1;

			if ($numVisita < 10) {
				$numVisita = '0' . $numVisita;
			}

			$idEvaluacion = $dniPaciente . date('Y') . $numVisita;

			$respuestaCabecera = $this->_modeloAnemia->anemiaGestantesPuerperasInsertarCabecera($idEvaluacion,$dniPaciente,$numHistoriaClinia,$apellidoPaterno,$apellidoMaterno,$nombres,$edad,$telefono,$direccion,$tipopaciente,$semanagestacional,$anemia,$diagnosticoHemoglobina,$fechaUltControlHemoglobina,$fechaInicioTomaSuplemento,$fechaEvaluacion,$horaEvaluacion,$numVisita,$idUsuarioRegistrador,$direccionactual,$celular);
			//print_r($respuestaCabecera);return false;

			if ($respuestaCabecera == 'M_1') {

				$this->_modeloAnemia->anemiaGestantesPuerperasInsertarDetalleEvaluacion($idEvaluacion, '01080102' , $_POST['01080102']);	
				
				$codigo_patch = $this->_modeloAnemia->ListarCodigoPatchGestantesPuerperas();

				for ($i=0; $i < count($codigo_patch); $i++) { 

					if($codigo_patch[$i]['input'] == NULL) 
					{						
						$tempinp = $this->obtenerDatosCadena($codigo_patch[$i]['CODIGO_P']);
						if($tempinp != ""){
							$this->_modeloAnemia->anemiaGestantesPuerperasInsertarDetalleEvaluacion($idEvaluacion, $codigo_patch[$i]['value'] , $this->obtenerDatosCadena($codigo_patch[$i]['CODIGO_P']));
						}	
					}

					if($codigo_patch[$i]['checkbox'] == 1) 
					{
						//CHECKBOX
						if(empty($_POST[$codigo_patch[$i]['CODIGO_P']])){
							
						}
						else{
							foreach ($_POST[$codigo_patch[$i]['CODIGO_P']] as $checkbox) {
							//echo $checkbox;
							$this->_modeloAnemia->anemiaGestantesPuerperasInsertarDetalleEvaluacion($idEvaluacion, $checkbox , 1);
							}	
						}
					}

					
					else{
						$traba = $this->obtenerDatosCadena($codigo_patch[$i]['CODIGO_P'] . "a");
						
						if ($traba != "") {
							//TEXTBOX
							$this->_modeloAnemia->anemiaGestantesPuerperasInsertarDetalleEvaluacion($idEvaluacion,$this->obtenerDatosCadena($codigo_patch[$i]['CODIGO_P']),$this->obtenerDatosCadena($codigo_patch[$i]['CODIGO_P'] . "a"));													
						}
						else {
							if((isset($_POST[$codigo_patch[$i]['CODIGO_P']]))){
								
								$tempcodigo = $_POST[$codigo_patch[$i]['CODIGO_P']];
								if (strlen($tempcodigo)==8 and ctype_digit($tempcodigo)) {
									$this->_modeloAnemia->anemiaGestantesPuerperasInsertarDetalleEvaluacion($idEvaluacion,$tempcodigo,1);
								}							
								
							}
						}						
					}
				}
				$respuesta = array('Mensaje' => 'Ficha registrada con exito');
				echo json_encode($respuesta);				
			}	
			else
				{
				$respuestados = array('Mensaje' => 'Error intentelo nuevamente');
				echo json_encode($respuesta);
				}
			
		}


		public function informeMenores4Meses()
		{
			Sesion::accesos ( 'logueado' );
			$this->_vista->fichamenores4meses = $this->anemiaMenores4MesesgenerarFicha();		
			$this->_vista->breadcrumb = $this->breadcrumbVista('F.V.D.','A. Niños(as) menores de 4 meses');
			$this->_vista->tituloGeneral = "F.V.D. Buen Crecimiento, Prevención y Control de la Anemia: Recien nacidos y niños(as) menores de 4 meses";
			$this->_vista->construirVista('informes','menores4meses');
		}

		public function anemiaMenores4MesesbuscarNumeroVisitas()
		{
			$anio = date('Y');
			$dni = $this->obtenerDatosCadena('dniPaciente');
			$respuesta = $this->_modeloAnemia->anemiaMenores4MesesListarNumVisitasxDNI($dni,$anio);
			echo json_encode($respuesta[0]['NVISITA']);
		}

		private function anemiaMenores4MesesgenerarFicha()
		{
			$cabeceras = $this->_modeloAnemia->anemiaMenores4MesesListarCabecerasEvaluacion();
			$html = null;

			for ($i=0; $i < count($cabeceras); $i++){
				$html .= "<div class='row'>";
				$html .= "<div class='panel panel-default'>";
					$html .= "<div class='panel-heading'>" . $cabeceras [$i] ['CABECERA'] . "</div>";
					$html .= "<div class='panel-body'>";
					$html .= "</div>";

					$html .= "<div class='table-responsive'>";
				    	$html .= "<table id='evaluacion' class='table table-bordered' style='text-align: left;'>";

				    	#Preguntas
				    	$indicePreguntas = 0;
				    	$preguntas = $this->_modeloAnemia->anemiaMenores4MesesListarPreguntasEvaluacion($cabeceras [$i] ['IDCABECERA']);				    	

				    	for ($j=0; $j < count($preguntas); $j++) { 

				    		$indicePreguntas = $indicePreguntas + 1;

				    		if($preguntas[$j]['IDCABECERA']=='01' or $preguntas[$j]['IDCABECERA']=='03'){				    		
				    		$html .= "<tr>";
				    			$html .= "<td colspan='2' style='width:10%' class='text-center'>" . $indicePreguntas . ".-</td>";
				    			$html .= "<td colspan='3'><b>" . $preguntas[$j]['PREGUNTA'] ."</b></td>";
				    		$html .= "</tr>";	
				    		}
				    		else{				    		
				    		$html .= "<tr>";
				    			$html .= "<td colspan='2' class='text-center'>" . $indicePreguntas . ".-</td>";
				    			$html .= "<td colspan='3'><b>" . $preguntas[$j]['PREGUNTA'] ."</b></td>";
				    		$html .= "</tr>";	
				    		}			    		
				    		
				    		#PreguntasRelacionadas
				    			
				    		$preguntasrelacionadas = $this->_modeloAnemia->anemiaMenores4MesesListarPreguntasRelacionadasEvaluacion($cabeceras [$i] ['IDCABECERA'],$preguntas[$j]['IDPREGUNTA']);		    	
				    			
				    		#PreguntasQueNoTienenPreguntasRelacionadas

				    		if(empty($preguntasrelacionadas)){	

				    			#OpcionesPreguntas		    			

				    			$opciones_distintas = $this->_modeloAnemia->anemiaMenores4MesesListarOpcionesEvaluacion($cabeceras [$i] ['IDCABECERA'],$preguntas[$j]['IDPREGUNTA'],'00');

				    			for ($p=0; $p < count($opciones_distintas); $p++) {

				    				$html .= "<tr>";

				    				if ($opciones_distintas[$p]['LLENADO'] == 0 && $opciones_distintas[$p]['CHEKBOX'] == 0) {

							    		$html .= "<td colspan='2'></td>";
							    		$html .= "<td>" . $opciones_distintas[$p]['OPCION'] ."</td>";
							    		$html .= "<td class='text-center'><input type='radio' name='" . $opciones_distintas[$p]['NAME'] . "' value='" . $opciones_distintas[$p]['VALUE'] . "' id=''/></td>";
							    		$html .= "<td></td>";

							    	}

							    	if ($opciones_distintas[$p]['LLENADO'] == 1 ) {

							    		if ($opciones_distintas[$p]['LLENADO'] == 1 && $opciones_distintas[$p]['OPCION'] == NULL && $opciones_distintas[$p]['CHEKBOX'] == 0) {
					    					$html .= "<td colspan='2'></td>";					    						
					    					$html .= "<td colspan='3' style='padding: 0 !important;'><input type='text' name='" . $opciones_distintas[$p]['NAME'] . "' class='form-control input-sm' style='margin:0px !important; border: none;'><input type='hidden' id='" . $opciones_distintas[$p]['VALUE'] . "b' /></td>";
					    				}

					    				else{
							    			$html .= "<td colspan='2'></td>";
					    					$html .= "<td>" . $opciones_distintas[$p]['OPCION'] ."</td>";
					    					$html .= "<td class='text-center'><input type='radio' name='" . $opciones_distintas[$p]['NAME'] . "' id='" . $opciones_distintas[$p]['VALUE'] . "a' /></td>";
					    					$html .= "<td style='padding: 0 !important;'><input type='text' id='" . $opciones_distintas[$p]['VALUE'] . "' name='" . $opciones_distintas[$p]['NAME'] . "a' class='form-control input-sm' style='margin:0px !important; border: none;' disabled/><input type='hidden' id='" . $opciones_distintas[$p]['VALUE'] . "b' /></td>";
					    				}							    			
					    			}

					    			$html .= "</tr>";

				    			}				    				
				    		}

				    		else{

				    			//OpcionesPreguntasQueTienenPreguntasRelacionadas

				    			$opciones_distintas = $this->_modeloAnemia->anemiaMenores4MesesListarOpcionesEvaluacion($cabeceras [$i] ['IDCABECERA'],$preguntas[$j]['IDPREGUNTA'],'00');

				    			for ($p=0; $p < count($opciones_distintas); $p++) { 

				    				$html .= "<tr>";

				    					if ($opciones_distintas[$p]['LLENADO'] == 0 && $opciones_distintas[$p]['CHEKBOX'] == 0) {
							    			$html .= "<td colspan='2'></td>";
							    			$html .= "<td>" . $opciones_distintas[$p]['OPCION'] ."</td>";
							    			$html .= "<td class='text-center'><input type='radio' name='" . $opciones_distintas[$p]['NAME'] . "' value='" . $opciones_distintas[$p]['VALUE'] . "' id=''/></td>";
							    			$html .= "<td></td>";
							    		}

				    					if ($opciones_distintas[$p]['LLENADO'] == 1 ) {

							    			if ($opciones_distintas[$p]['LLENADO'] == 1 && $opciones_distintas[$p]['OPCION'] == NULL && $opciones_distintas[$p]['CHEKBOX'] == 0)  {
					    						$html .= "<td colspan='2'></td>";					    						
					    						$html .= "<td colspan='3' style='padding: 0 !important;'><input type='text' name='" . $opciones_distintas[$p]['NAME'] . "' id='" . $opciones_distintas[$p]['VALUE'] . "' class='form-control input-sm' style='margin:0px !important; border: none;'></td>";
					    					}

					    					else{
							    				$html .= "<td colspan='2'></td>";
					    						$html .= "<td>" . $opciones_distintas[$p]['OPCION'] ."</td>";
					    						$html .= "<td class='text-center'><input type='radio' name='" . $opciones_distintas[$p]['NAME'] . "' id='" . $opciones_distintas[$p]['VALUE'] . "a' /></td>";
					    						$html .= "<td style='padding: 0 !important;'><input type='text' id='" . $opciones_distintas[$p]['VALUE'] . "' name='" . $opciones_distintas[$p]['NAME'] . "a' class='form-control input-sm' style='margin:0px !important; border: none;' disabled/><input type='hidden' id='" . $opciones_distintas[$p]['VALUE'] . "b' /></td>";
					    					}							    			
					    				}

					    			$html .= "</tr>";
					    		}

					    		//PreguntasRelacionadas

				    			for ($k=0; $k < count($preguntasrelacionadas); $k++) { 

				    				$idpreguntarelacionada = substr($preguntasrelacionadas[$k]['IDPREGUNTARELACIONADA'],1,1);	    		
				    				$indicePreguntasRelacionadas = $indicePreguntas + 1;

				    				$html .= "<tr>";
				    					$html .= "<td></td>";
				    					$html .= "<td class='text-center'>" .$indicePreguntas.".".$idpreguntarelacionada. ".-</td>";
				    					$html .= "<td colspan='3'>" . $preguntasrelacionadas[$k]['PREGUNTARELACIONADA'] ."</td>";
				    				$html .= "</tr>"; 
				    				
				    				//OpcionesPreguntasRelacionadas

				    				$opciones = $this->_modeloAnemia->anemiaMenores4MesesListarOpcionesEvaluacion($cabeceras [$i] ['IDCABECERA'],$preguntas[$j]['IDPREGUNTA'],$preguntasrelacionadas[$k]['IDPREGUNTARELACIONADA']);   				

				    				for ($s=0; $s < count($opciones); $s++) { 

				    					if($opciones[$s]['NAME'])

				    					$html .= "<tr>";

				    						if ($opciones[$s]['LLENADO'] == 0 && $opciones[$s]['CHEKBOX'] == 0) {
							    				$html .= "<td colspan='2'></td>";
							    				$html .= "<td >" . $opciones[$s]['OPCION'] ."</td>";
							    				$html .= "<td class='text-center'><input type='radio' name='" . $opciones[$s]['NAME'] . "' value='" . $opciones[$s]['VALUE'] . "' id=''/></td>";	
							    				$html .= "<td></td>";
							    			}

							    			if ($opciones[$s]['LLENADO'] == 1 ) {

							    				if ($opciones[$s]['LLENADO'] == 1 && $opciones[$s]['OPCION'] == NULL && $opciones[$s]['CHEKBOX'] == 0)  {
					    						$html .= "<td colspan='2'></td>";					    						
					    						$html .= "<td colspan='3' style='padding: 0 !important;'><input type='text' name='" . $opciones[$s]['NAME'] . "' id='" . $opciones[$s]['VALUE'] . "' class='form-control input-sm' style='margin:0px !important; border: none;'></td>";
					    						}

					    						else{
							    				$html .= "<td colspan='2'></td>";
					    						$html .= "<td>" . $opciones[$s]['OPCION'] ."</td>";
					    						$html .= "<td class='text-center'><input type='radio' name='" . $opciones[$s]['NAME'] . "' id='" . $opciones[$s]['VALUE'] . "a' /></td>";
					    						$html .= "<td style='padding: 0 !important; style='width:10%''><input type='text' id='" . $opciones[$s]['VALUE'] . "' name='" . $opciones[$s]['NAME'] . "a' class='form-control input-sm' style='margin:0px !important; border: none;' disabled/><input type='hidden' id='" . $opciones[$s]['VALUE'] . "b' /></td>";
					    						}
					    					} 
					    					
					    				$html .= "</tr>";
				    				}
				    			}
				    		}
				    	}

				    	$html .= "</table>";
				    $html .= "</div>";
				$html .= "</div>";
				$html .= "</div>";
			}

			return $html;
		}

		public function registraranemiaMenores4Meses(){

			$dniPaciente 				= $this->obtenerDatosCadena('dniPaciente');
			$numHistoriaClinia 			= $this->obtenerDatosCadena('nhistoriaclinica');
			$apellidoPaternoPaciente 			= $this->obtenerDatosCadena('apellidopaternopaciente');
			$apellidoMaternoPaciente 			= $this->obtenerDatosCadena('apellidomaternopaciente');
			$nombresPaciente 					= $this->obtenerDatosCadena('nombrespaciente');	
			$dniMadre 					= $this->obtenerDatosCadena('dniMadre');
			$apellidoPaternoMadre 			= $this->obtenerDatosCadena('apellidopaternomadre');
			$apellidoMaternoMadre 			= $this->obtenerDatosCadena('apellidomaternomadre');
			$nombresMadre 					= $this->obtenerDatosCadena('nombresmadre');	
			$edadgestacionalnacer  		= $this->obtenerDatosCadena('edag');	
			$telefono 					= $this->obtenerDatosCadena('telefono');	
			$direccion 					= $this->obtenerDatosCadena('direccion');	
			$sexo 						= $this->obtenerDatosCadena('sexo');				
			$pesoNacer 						= $this->obtenerDatosCadena('peso');
			$fechaNacimiento			= $this->obtenerDatosCadena('fechanacimiento');				
			$controlcred 				= $this->obtenerDatosCadena('controlcred');
			$pesocred 					= $this->obtenerDatosCadena('pesocred');
			$fechaEvaluacion 			= date('Y-m-d');	
			$numVisita 					= $this->obtenerDatosCadena('numVisitash');
			$observaciones 				= $this->obtenerDatosCadena('observaciones');
			$anemia						= $this->obtenerDatosCadena('anemiaCa');	
			$diagnosticoHemoglobina 	= $this->obtenerDatosCadena('diagHemo');	
			$fechaUltControlHemoglobina = $this->obtenerDatosCadena('fechadosajehemoglobina');
			$celular 					= $this->obtenerDatosCadena('celular');
			$compromiso 				= $this->obtenerDatosCadena('compromiso');

			$numVisita = $numVisita + 1;

			if($controlcred==null){
				$controlcred=0;	
			}
			if($observaciones==null){
				$observaciones='NULL';	
			}
			if($pesocred==null){
				$pesocred=0;	
			}			

			$idEmpleado 				= Sesion::get ( 'idusuario' );
			$horaEvaluacion 			= date('h:i:s');		

			$numVisitaid = $numVisita + 1;
			
			if ($numVisita < 10) {
				$numVisitaid = '0' . $numVisitaid;
			}

			$idEvaluacion = $dniPaciente . date('Y') . $numVisitaid;			

			$respuestaCabecera = $this->_modeloAnemia->anemiaMenores4MesesInsertarCabecera($idEvaluacion,$dniPaciente,$numHistoriaClinia,$apellidoPaternoPaciente,$apellidoMaternoPaciente,$nombresPaciente,$sexo,$fechaNacimiento,$pesoNacer,$telefono,$dniMadre,$apellidoPaternoMadre,$apellidoMaternoMadre,$nombresMadre,$direccion,$idEmpleado,$fechaEvaluacion,$horaEvaluacion,$numVisita,$observaciones,$controlcred,$pesocred,$anemia,$diagnosticoHemoglobina,$fechaUltControlHemoglobina,$celular,$compromiso,$edadgestacionalnacer);

			//echo $respuestaCabecera;exit();

			if ($respuestaCabecera == 'M_1') {						

				$codigo_patch = $this->_modeloAnemia->anemiaMenores4MesesListarCodigoPatch();
				//print_r($codigo_patch); return false;

				for ($i=0; $i < count($codigo_patch); $i++) { 

					if($codigo_patch[$i]['input'] == NULL) 
					{						
						$tempinp = $this->obtenerDatosCadena($codigo_patch[$i]['CODIGO_P']);
						if($tempinp != ""){
							$this->_modeloAnemia->anemiaMenores4MesesInsertarDetalleEvaluacion($idEvaluacion, $codigo_patch[$i]['value'] , $this->obtenerDatosCadena($codigo_patch[$i]['CODIGO_P']));
						}	
					}

					if($codigo_patch[$i]['checkbox'] == 0 and $codigo_patch[$i]['input']==0){
						if(isset($_POST[$codigo_patch[$i]['CODIGO_P']])){
							$tempcodigo = $_POST[$codigo_patch[$i]['CODIGO_P']];
							if($tempcodigo != ""){
								if (strlen($tempcodigo)==8 and ctype_digit($tempcodigo)) {
								$this->_modeloAnemia->anemiaMenores4MesesInsertarDetalleEvaluacion($idEvaluacion,$tempcodigo,1);	
								}
							}
						}	
					}

					else
					{
						if($_POST[$codigo_patch[$i]['CODIGO_P']]){
							$tempcodigo = $_POST[$codigo_patch[$i]['CODIGO_P']];

							if (strlen($tempcodigo)==8 and ctype_digit($tempcodigo)) {
								$this->_modeloAnemia->anemiaMenores4MesesInsertarDetalleEvaluacion($idEvaluacion,$tempcodigo,1);
							}
						}						
					}
				}

				$respuesta = array('Mensaje' => 'Ficha registrada con exito');
				echo json_encode($respuesta);				
			}	
			else
			{
				$respuesta = array('Mensaje' => 'Error intentelo nuevamente');
				echo json_encode($respuesta);
			}

		}

		#FICHA VISTA DOMICILIARIA ENTRE 4 Y 15 MESES

		public function fvdEntre4y15Meses(){
			Sesion::accesos ( 'logueado');
			$this->_vista->fichaentre4y15meses 	= $this->anemiaEntre4y15MesesGenerarFicha();
			$this->_vista->breadcrumb 			= $this->breadcrumbVista('F.V.D.','A. Niños(as) entre 4 y 15 meses');
			$this->_vista->tituloGeneral 		= "F.V.D. Buen Crecimiento, Prevención y Control de la Anemia: Niños(as) entre los 4 y 15 meses";
			$this->_vista->construirVista('informes','entre4y15meses');
		}

		public function anemiaEntre4y15MesesBuscarNumeroVisitas(){
			$anio = date('Y');
			$dni = $this->obtenerDatosCadena('dni');
			$respuesta = $this->_modeloAnemia->anemiaEntre4y15MesesListarNumeroVisitasxDNI($dni,$anio);
			echo json_encode($respuesta[0]['NVISITA']);
		}

		public function anemiaEntre4y15MesesGenerarFicha(){

			$cabeceras = $this->_modeloAnemia->anemiaEntre4y15MesesListarCabecerasEvaluacion();
			$html = null;

			for ($i=0; $i < count($cabeceras); $i++) { 

				$html .= "<div class='row'>";			
					$html .= "<div class='panel panel-default'>";
						$html .= "<div class='panel-heading'>" . $cabeceras [$i] ['CABECERA'] . "</div>";
						$html .= "<div class='panel-body'>";
						$html .= "</div>";
						$html .= "<div class='table-responsive'>";
				    		$html .= "<table class='table table-bordered' style='text-align: left;' id='evaluacionentre4y15meses'>";
				    			
				    			#preguntas
				    			$indicePreguntas = 0;
				    			$preguntas = $this->_modeloAnemia->anemiaEntre4y15MesesListarPreguntasEvaluacion($cabeceras [$i] ['IDCABECERA']);				    			

				    			for ($j=0; $j < count($preguntas); $j++) { 
				    				$indicePreguntas = $indicePreguntas + 1;				    		
				    				$html .= "<tr>";
				    					$html .= "<td colspan='2' class='text-center'>" . $indicePreguntas . ".-</td>";
				    					$html .= "<td colspan='3'><b>" . $preguntas[$j]['PREGUNTA'] ."</b></td>";
				    				$html .= "</tr>";				    		
				    		
				    				#preguntasrelacionadas
				    			
				    				$preguntasrelacionadas = $this->_modeloAnemia->anemiaEntre4y15MesesListarPreguntasRelacionadasEvaluacion($cabeceras [$i] ['IDCABECERA'],$preguntas[$j]['IDPREGUNTA']);

				    				if(empty($preguntasrelacionadas)){

				    					//opcionespreguntas	

				    					$opciones_distintas = $this->_modeloAnemia->anemiaEntre4y15MesesListarOpcionesEvaluacion($cabeceras [$i] ['IDCABECERA'],$preguntas[$j]['IDPREGUNTA'],'00');

				    					for ($p=0; $p < count($opciones_distintas); $p++) { 
				    						$html .= "<tr>";

				    						if ($opciones_distintas[$p]['LLENADO'] == 0 && $opciones_distintas[$p]['CHEKBOX'] == 0) {
							    				$html .= "<td colspan='2'></td>";
							    				$html .= "<td>" . $opciones_distintas[$p]['OPCION'] ."</td>";
							    				$html .= "<td class='text-center'><input type='radio' name='" . $opciones_distintas[$p]['NAME'] . "' value='" . $opciones_distintas[$p]['VALUE'] . "' id=''/></td>";	
							    				$html .= "<td></td>";
							    			}


							    			if ($opciones_distintas[$p]['LLENADO'] == 1 ) {

							    				if ($opciones_distintas[$p]['LLENADO'] == 1 && $opciones_distintas[$p]['OPCION'] == NULL && $opciones_distintas[$p]['CHEKBOX'] == 0)  {
					    							$html .= "<td colspan='2'></td>";					    						
					    							$html .= "<td colspan='3' style='padding: 0 !important;'><input type='text' name='" . $opciones_distintas[$p]['NAME'] . "' class='form-control input-sm' style='margin:0px !important; border: none;'><input type='hidden' id='" . $opciones_distintas[$p]['VALUE'] . "b' /></td>";
					    						}

					    						else{
							    					$html .= "<td colspan='2'></td>";
					    							$html .= "<td>" . $opciones_distintas[$p]['OPCION'] ."</td>";
					    							$html .= "<td class='text-center'><input type='radio' name='" . $opciones_distintas[$p]['NAME'] . "' id='" . $opciones_distintas[$p]['VALUE'] . "a' /></td>";
					    							$html .= "<td style='padding: 0 !important;'><input type='text' id='" . $opciones_distintas[$p]['VALUE'] . "' name='" . $opciones_distintas[$p]['NAME'] . "a' class='form-control input-sm' style='margin:0px !important; border: none;' disabled/><input type='hidden' id='" . $opciones_distintas[$p]['VALUE'] . "b' /></td>";
					    						}							    			
					    					}
					    					
					    					$html .= "</tr>";

				    					}
				    				
				    				}
				    				else{

				    					//opcionespreguntasquetienenpreguntasrelacionadas

				    					$opciones_distintas = $this->_modeloAnemia->anemiaEntre4y15MesesListarOpcionesEvaluacion($cabeceras [$i] ['IDCABECERA'],$preguntas[$j]['IDPREGUNTA'],'00');

				    					for ($p=0; $p < count($opciones_distintas); $p++) { 
				    						$html .= "<tr>";

				    						if ($opciones_distintas[$p]['LLENADO'] == 0 && $opciones_distintas[$p]['CHEKBOX'] == 0) {
							    				$html .= "<td colspan='2'></td>";
							    				$html .= "<td>" . $opciones_distintas[$p]['OPCION'] ."</td>";
							    				$html .= "<td class='text-center'><input type='radio' name='" . $opciones_distintas[$p]['NAME'] . "' value='" . $opciones_distintas[$p]['VALUE'] . "' id=''/></td>";	
							    				$html .= "<td></td>";
							    			}

				    						if ($opciones_distintas[$p]['LLENADO'] == 1 ) {

							    				if ($opciones_distintas[$p]['LLENADO'] == 1 && $opciones_distintas[$p]['OPCION'] == NULL && $opciones_distintas[$p]['CHEKBOX'] == 0)  {
					    							$html .= "<td colspan='2'></td>";					    						
					    							$html .= "<td colspan='3' style='padding: 0 !important;'><input type='text' name='" . $opciones_distintas[$p]['NAME'] . "' id='" . $opciones_distintas[$p]['VALUE'] . "' class='form-control input-sm' style='margin:0px !important; border: none;'></td>";
					    						}

					    						else{
							    					$html .= "<td colspan='2'></td>";
					    							$html .= "<td>" . $opciones_distintas[$p]['OPCION'] ."</td>";
					    							$html .= "<td class='text-center'><input type='radio' name='" . $opciones_distintas[$p]['NAME'] . "' id='" . $opciones_distintas[$p]['VALUE'] . "a' /></td>";
					    							$html .= "<td style='padding: 0 !important;'><input type='text' id='" . $opciones_distintas[$p]['VALUE'] . "' name='" . $opciones_distintas[$p]['NAME'] . "a' class='form-control input-sm' style='margin:0px !important; border: none;' disabled/><input type='hidden' id='" . $opciones_distintas[$p]['VALUE'] . "b' /></td>";
					    						}							    			
					    					}

					    					if ($opciones_distintas[$p]['CHEKBOX'] == 1) {
					    						$html .= "<td colspan='2'></td>";
					    						$html .= "<td>" . $opciones_distintas[$p]['OPCION'] ."</td>";
					    						$html .= "<td class='text-center'><input type='checkbox' name='" . $opciones_distintas[$p]['NAME'] . "[]' value='" . $opciones_distintas[$p]['VALUE'] . "' /></td>";
					    						$html .= "<td></td>";
					    					}
					    					
					    					$html .= "</tr>";
					    				}

					    				//preguntasrelacionadas

				    					for ($k=0; $k < count($preguntasrelacionadas); $k++) { 

				    						$idpreguntarelacionada = substr($preguntasrelacionadas[$k]['IDPREGUNTARELACIONADA'],1,1);	    		
				    						$indicePreguntasRelacionadas = $indicePreguntas + 1;
				    						$html .= "<tr>";
				    							$html .= "<td></td>";
				    							$html .= "<td class='text-center'>" .$indicePreguntas.".".$idpreguntarelacionada. ".-</td>";
				    							$html .= "<td colspan='3'>" . $preguntasrelacionadas[$k]['PREGUNTARELACIONADA'] ."</td>";
				    						$html .= "</tr>"; 
				    				
				    						$opciones = $this->_modeloAnemia->anemiaEntre4y15MesesListarOpcionesEvaluacion($cabeceras [$i] ['IDCABECERA'],$preguntas[$j]['IDPREGUNTA'],$preguntasrelacionadas[$k]['IDPREGUNTARELACIONADA']);   				

				    						//opcionespreguntasrelacionadas

				    						for ($s=0; $s < count($opciones); $s++) { 				    						

				    							$html .= "<tr>";

				    							if ($opciones[$s]['LLENADO'] == 0 && $opciones[$s]['CHEKBOX'] == 0) {
							    					$html .= "<td colspan='2'></td>";
							    					$html .= "<td>" . $opciones[$s]['OPCION'] ."</td>";
							    					$html .= "<td class='text-center'><input type='radio' name='" . $opciones[$s]['NAME'] . "' value='" . $opciones[$s]['VALUE'] . "' id=''/></td>";	
							    					$html .= "<td></td>";
							    				}

							    				if ($opciones[$s]['LLENADO'] == 1 ) {

							    					if ($opciones[$s]['LLENADO'] == 1 && $opciones[$s]['OPCION'] == NULL && $opciones[$s]['CHEKBOX'] == 0)  {
					    								$html .= "<td colspan='2'></td>";					    						
					    								$html .= "<td colspan='3' style='padding: 0 !important;'><input type='text' name='" . $opciones[$s]['NAME'] . "' id='" . $opciones[$s]['VALUE'] . "' class='form-control input-sm' style='margin:0px !important; border: none;'></td>";
					    							}

					    							else{
							    						$html .= "<td colspan='2'></td>";
					    								$html .= "<td>" . $opciones[$s]['OPCION'] ."</td>";
					    								$html .= "<td class='text-center'><input type='radio' name='" . $opciones[$s]['NAME'] . "' id='" . $opciones[$s]['VALUE'] . "a' /></td>";
					    								$html .= "<td style='padding: 0 !important;'><input type='text' id='" . $opciones[$s]['VALUE'] . "' name='" . $opciones[$s]['NAME'] . "a' class='form-control input-sm' style='margin:0px !important; border: none;' disabled/><input type='hidden' id='" . $opciones[$s]['VALUE'] . "b' /></td>";
					    							}
					    						}

					    						$html .= "</tr>";
				    						}
				    					}
				    				}
				    			}
				    		$html .= "</table>";
				    	$html .= "</div>";
				    $html .= "</div>";
				$html .= "</div>";
			}

			return $html;
		}

		public function anemiaEntre4y15MesesRegistrar(){

			$numHistoriaClinica			= $this->obtenerDatosCadena('numerohistoriaclinica');
			$dniPaciente 				= $this->obtenerDatosCadena('dnininio');	
			$apellidoPaternoPaciente 	= $this->obtenerDatosCadena('apellidopaternoninio');
			$apellidoMaternoPaciente 	= $this->obtenerDatosCadena('apellidomaternoninio');
			$nombresPaciente 			= $this->obtenerDatosCadena('nombresninio');
			$sexo 						= $this->obtenerDatosCadena('sexo');
			$fechaNacimiento 			= $this->obtenerDatosCadena('fechanacimiento');
			$pesoNacer 					= $this->obtenerDatosCadena('peso');
			$edadgestacionalnacer  		= $this->obtenerDatosCadena('edag');
			$dniMadre  					= $this->obtenerDatosCadena('dniMadre'); 
			$apellidoPaternoMadre 		= $this->obtenerDatosCadena('apellidopaternomadre');
			$apellidoMaternoMadre  		= $this->obtenerDatosCadena('apellidomaternomadre');
			$nombresMadre  				= $this->obtenerDatosCadena('nombresmadre');
			$telefono  					= $this->obtenerDatosCadena('telefono');
			$direccion  				= $this->obtenerDatosCadena('direccion');
			$controlCred   				= $this->obtenerDatosCadena('controlcred');
			$pesoCred  					= $this->obtenerDatosCadena('pesocred');
			$idUsuarioRegistrador       = Sesion::get ('idusuario');
			$fechaEvaluacion   			= date('Y-m-d');
			$horaEvaluacion   			= date('h:i:s');
			$numVisita   				= $this->obtenerDatosCadena('numVisitash');
			$observaciones   			= $this->obtenerDatosCadena('observaciones');
			$anemia						= $this->obtenerDatosCadena('anemiaCa');	
			$diagnosticoHemoglobina 	= $this->obtenerDatosCadena('diagHemo');	
			$fechaUltControlHemoglobina = $this->obtenerDatosCadena('fechadosajehemoglobina');
			$celular 					= $this->obtenerDatosCadena('celular');
			$compromiso 				= $this->obtenerDatosCadena('compromiso');

			$numVisita = $numVisita + 1;

			if ($numVisita < 10) {
				$numVisita = '0' . $numVisita;
			}

			$idEvaluacion = $dniPaciente . date('Y') . $numVisita;

			$respuestaCabecera = $this->_modeloAnemia->anemiaEntre4y15MesesInsertarCabecera($idEvaluacion,$numHistoriaClinica,$dniPaciente,$apellidoPaternoPaciente,$apellidoMaternoPaciente,$nombresPaciente,$sexo,$fechaNacimiento,$pesoNacer,$edadgestacionalnacer,$dniMadre,$apellidoPaternoMadre,$apellidoMaternoMadre,$nombresMadre,$telefono,$direccion,$controlCred,$pesoCred,$idUsuarioRegistrador,$fechaEvaluacion,$horaEvaluacion,$numVisita,$observaciones,$anemia,$diagnosticoHemoglobina,$fechaUltControlHemoglobina,$celular,$compromiso);

			if($respuestaCabecera == 'M_1'){	
				
				$codigo_patch = $this->_modeloAnemia->anemiaEntre4y15MesesListarCodigoPatch();

				for ($i=0; $i < count($codigo_patch); $i++) { 

					if($codigo_patch[$i]['input'] == NULL) 
					{						
						$tempinp = $this->obtenerDatosCadena($codigo_patch[$i]['CODIGO_P']);
						if($tempinp != ""){
							$this->_modeloAnemia->anemiaEntre4y15MesesInsertarDetalleEvaluacion($idEvaluacion, $codigo_patch[$i]['value'] , $this->obtenerDatosCadena($codigo_patch[$i]['CODIGO_P']));
						}	
					}

					if($codigo_patch[$i]['checkbox'] == 1) 
					{
						#Checkbox
						if(empty($_POST[$codigo_patch[$i]['CODIGO_P']])){							
						}
						else{
							foreach ($_POST[$codigo_patch[$i]['CODIGO_P']] as $checkbox) {							
								$this->_modeloAnemia->anemiaEntre4y15MesesInsertarDetalleEvaluacion($idEvaluacion, $checkbox , 1);
							}	
						}
					}

					
					else{
						$traba = $this->obtenerDatosCadena($codigo_patch[$i]['CODIGO_P'] . "a");
						
						if ($traba != "") {
							#Input
							$this->_modeloAnemia->anemiaEntre4y15MesesInsertarDetalleEvaluacion($idEvaluacion,$this->obtenerDatosCadena($codigo_patch[$i]['CODIGO_P']),$this->obtenerDatosCadena($codigo_patch[$i]['CODIGO_P'] . "a"));													
						}
						else {
							if((isset($_POST[$codigo_patch[$i]['CODIGO_P']]))){								
								$tempcodigo = $_POST[$codigo_patch[$i]['CODIGO_P']];
								if (strlen($tempcodigo)==8 and ctype_digit($tempcodigo)) {
									$this->_modeloAnemia->anemiaEntre4y15MesesInsertarDetalleEvaluacion($idEvaluacion,$tempcodigo,1);
								}
							}
						}						
					}
				}
				$respuesta = array('Mensaje' => 'Ficha registrada con éxito');
				echo json_encode($respuesta);				
			}	
			else
			{
				$respuesta = array('Mensaje' => 'Error intentelo nuevamente');
				echo json_encode($respuesta);
			}
		}		
}
 ?>