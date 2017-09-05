<?php  

	class sangreControlador extends Controlador
	{
		private $_modeloSangre;
		
		public function __construct()
		{
			parent::__construct();
			$this->_modeloSangre 	= $this->obtenerModelo('sangre');
		}

		public function index()
		{
			
		}

		public function sangre()
		{

			$html = null;
			$cabecera = $this ->_modeloSangre->ListarCabecerasAnemia();



			for ($i=0; $i < count($cabecera); $i++) { 
				$html .= "<div class='col-md-12 col-sm-12 col-xs-12'>";
						$html .= "<div class='panel panel-default'>";
						$html .= "<div class='panel-heading'>" . $cabecera[$i]['CABECERA'] . "</div>";
							$html .= "<div class='panel-body'>";
							$html .= "</div>";
								$html .= "<div class='table-responsive'>";
						  			$html .= "<table class='table table-bordered' style='text-align: left;'>";

						  		$preguntas = $this ->_modeloSangre->ListarPreguntasxCabeceraAnemia($cabecera[$i]['IDCABECERA']);

						  			for ($j=0; $j < count($preguntas); $j++) { 
						  				$str = $preguntas[$j]['idPregunta'];
										$last = $str[1];
						  				$html .= "<td width='50px' style='text-align:center;'><label>" . $last . ".-</label></td>";
						  				$html .= "<td colspan = 2><label>" . $preguntas[$j]['pregunta'] . "</label></td>";
						  				$html .= "</tr>";

						  				$opciones = $this ->_modeloSangre->ListarOpcionxPreguntasxCabeceraAnemia($cabecera[$i]['IDCABECERA'], $preguntas[$j]['idPregunta']);

						  						for ($x=0; $x < count($opciones); $x++) {
						  						$html .= "<tr>"; 
						  						$html .= "<td><label></label></td>";
						  						$html .= "<td>" . $opciones[$x]['opcion'] . "</td>";
						  						if ($opciones[$x]['llenado'] == 0) {
						  							if ($opciones[$x]['idSeccion'] == 5 && $opciones[$x]['idPregunta'] == 1) {
						  								$html .= "<td width='100px' style='text-align:center;'><input type='checkbox'></td>";
						  							} else {
						  								$html .= "<td width='100px' style='text-align:center;'><input type='radio' name='" . $preguntas[$j]['idPregunta'] . $cabecera[$i]['CABECERA'] . "' value='"  . $opciones[$x]['idResultados'] . "' placeholder=''></td>";
						  							}
						  						} else {
						  							$html .= "<td width='100px' style='text-align:center;'><input type='radio' name='" . $preguntas[$j]['idPregunta'] . $cabecera[$i]['CABECERA'] . "' value='"  . $opciones[$x]['idResultados'] . "' placeholder=''>";
						  							$html .= "<input class='form-control' id='" . $opciones[$x]['idResultados']  . $preguntas[$j]['idPregunta'] . "'></td>";
						  						}
						  						
						  						$html .= "</tr>";


						  						}
						  			}
						  			$html .= "</table>";
						  		$html .= "</div>";
							
					$html .= "</div>";
					$html .= "</div>";

			}
			$html .= "<div class='col-md-12 col-sm-12 col-xs-12'>";
			$html .= "<textarea class='form-control' rows='5' placeholder='Observaciones'></textarea></div>";
			$html .= "</div>";
				
				$html .= "<div class='row'>";
					$html .= "<div class ='col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-12'>";
						$html .= "<br><button id='guardarEvaluacion'  class='btn btn-success' style='width: 65%;'><i class='glyphicon glyphicon-ok' aria-hidden='true'></i>&nbsp;Guardar</button>";
					$html .= "</div>";
				$html .= "</div>";
			//echo json_encode($html);
			//exit();
			$this->_vista->plantilla = $html;

			$this->_vista->breadcrumb = $this->breadcrumbVista('Sangre','Anemia');
			$this->_vista->tituloGeneral = "Ficha de monitoreo domiciliario a niños menores de 1 año para la prevención y control de la anemia";
			$this->_vista->construirVista('anemia','monitoreoAnemia');
		}

		public function BusquedaDePacientesAnemia()
		{
			$dni = $this->obtenerDatosNumero("dni");
			$respuesta = $this->_modeloSangre->MostrarDatosCabecera($dni);
			for ($i=0; $i < count($respuesta); $i++) { 
				$paciente = array(	
						'idCabecera'			=> $respuesta[$i]['idCabecera'],
						'Nombre' 				=> $respuesta[$i]['nombNino'],
						'fecNacimiento'		 	=> $respuesta[$i]['fechaNac'],
						'edad' 					=> $respuesta[$i]['edad'],
						'domicilio' 			=> $respuesta[$i]['domicilio'],
						'buscarDniParentesco' 	=> $respuesta[$i]['dniRespon'],
						'nombResponsable' 		=> $respuesta[$i]['nombResponsable'],
						'fecNacimientoPariente' => $respuesta[$i]['fechaNacRespon'],
						'edadPariente' 			=> $respuesta[$i]['edadRespon'],
						'parentesco' 			=> $respuesta[$i]['parentesco'],
						'hnc' 					=> $respuesta[$i]['hnc'],
						'establecimiento' 		=> $respuesta[$i]['estableSalud'],
						'diagnostico'			=> $respuesta[$i]['diagHemoglobina'],
						//'anemiaEstado'		=> $respuesta[$i]['anemia'],
						'fechaSuplemento' 		=> $respuesta[$i]['fechaIniSuple'],
						//'numDosis' 			=> $respuesta[$i]['numDosis']
						//'usuarioVisita' 		=> $respuesta[$i]['usuario'],
						//'fechaVisita' 		=> $respuesta[$i]['fechaVisita']
					);
			}

			echo json_encode($paciente);
			exit();
		}

		public function ListarCantidadVisitasPaciente()
		{
			$dni = $this->obtenerDatosCadena("dni");
			$respuesta = $this->_modeloSangre->ListarCantidadVisitas($dni);
			$html = "<option> </option>";
			for ($i=0; $i < count($respuesta); $i++) { 
				if ($respuesta[$i]['idCabecera'] == null || $respuesta[$i]['idCabecera'] == " ") {
					$i++;
				}
				$html .= "<option value='" . $respuesta[$i]['nvisita'] . "'> Visita N° " . $respuesta[$i]['nvisita'] . "</option>";
			}
			echo json_encode($html);
		}

		public function MostrarDatosControlDeVisita()
		{
			$nvisita = $this->obtenerDatosNumero("nvisita");
			$dni = $this->obtenerDatosCadena("dni");
			$respuesta = $this->_modeloSangre->MostrarDatosControlVisita($nvisita, $dni);

			for ($i=0; $i < count($respuesta); $i++) { 
				$paciente = array(	

						'idCabecera'			=> $respuesta[$i]['idCabecera'],
						'Nombre' 				=> $respuesta[$i]['nombNino'],
						'fecNacimiento'		 	=> $respuesta[$i]['fechaNac'],
						'edad' 					=> $respuesta[$i]['edad'],
						'domicilio' 			=> $respuesta[$i]['domicilio'],
						'buscarDniParentesco' 	=> $respuesta[$i]['dniRespon'],
						'nombResponsable' 		=> $respuesta[$i]['nombResponsable'],
						'fecNacimientoPariente' => $respuesta[$i]['fechaNacRespon'],
						'edadPariente' 			=> $respuesta[$i]['edadRespon'],
						'parentesco' 			=> $respuesta[$i]['parentesco'],
						'hnc' 					=> $respuesta[$i]['hnc'],
						'establecimiento' 		=> $respuesta[$i]['estableSalud'],
						'diagnostico'			=> $respuesta[$i]['diagHemoglobina'],
						'fechaSuplemento' 		=> $respuesta[$i]['fechaIniSuple'],

						'usuarioVisita' 		=> $respuesta[$i]['usuario'],
						'fechaVisita' 			=> $respuesta[$i]['fechaVisita'],
						'numDosis' 				=> $respuesta[$i]['numDosis'],
						'anemiaEstado'			=> $respuesta[$i]['anemia']
					);
			}

			echo json_encode($paciente);
			exit();
		}

		public function ModificarRegistroPacienteAnemia()
		{
			
			$nombre 			= $this->obtenerDatosCadena('nombre');
			$fechaNac 			= $this->obtenerDatosCadena('fechaNac');
			$domicilio 			= $this->obtenerDatosCadena('domicilio');
			$dniRespon 			= $this->obtenerDatosCadena('dniRespon');
			$nombreRespon 		= $this->obtenerDatosCadena('nombreRespon');
			$fechaNacRespon 	= $this->obtenerDatosCadena('fechaNacRespon');
			$parentesco 		= $this->obtenerDatosCadena('parentesco');
			$hnc 				= $this->obtenerDatosCadena('hnc');
			$estableSalud 		= $this->obtenerDatosCadena('estableSalud');
			$hemoglobina		= $this->obtenerDatosCadena('hemoglobina');
			$anemia 			= $this->obtenerDatosCadena('anemia');
			$fechaIniSuple		= $this->obtenerDatosCadena('fechaIniSuple');
			$numDosis 			= $this->obtenerDatosNumero('numDosis');
			$idEmpleado 		= $this->obtenerDatosNumero('idEmpleado');
			$fechaVisita		= $this->obtenerDatosCadena('fechaVisita');
			$idCabecera			= $this->obtenerDatosNumero('idCabecera');

			list($anio,$mes,$dia)=explode("/",$fechaNac);
    		$fechaNac = $dia."-".$mes."-".$anio;

    		list($anio,$mes,$dia)=explode("/",$fechaNacRespon);
    		$fechaNacRespon = $dia."-".$mes."-".$anio;

    		list($anio,$mes,$dia)=explode("/",$fechaIniSuple);
    		$fechaIniSuple = $dia."-".$mes."-".$anio;

    		list($anio,$mes,$dia)=explode("/",$fechaVisita);
    		$fechaVisita = $dia."-".$mes."-".$anio;

			//echo $dni.'<br>'.$fechaNac.'<br>'.$domicilio.'<br>'.$dniRespon.'<br>'.$nombreRespon.'<br>'.$fechaNacRespon.'<br>'.$parentesco.'<br>'.$hnc.'<br>'.$estableSalud.'<br>'.$hemoglobina.'<br>'.$anemia.'<br>'.$fechaIniSuple.'<br>'.$numDosis.'<br>'.$fechaVisita;
			//exit();


			$respuesta =  $this->_modeloSangre->ModificarRegistrosPaciente($nombre, $fechaNac, $domicilio, $dniRespon, $nombreRespon, $fechaNacRespon, $parentesco, $hnc, $estableSalud, $hemoglobina, $anemia, $fechaIniSuple, $numDosis, $idEmpleado, $fechaVisita, $idCabecera);

			if ($respuesta == "M_1") {
				echo json_encode('Datos Modificados.');
			}
			else
			{
				echo json_encode('Error al modificar.');
			}
			
		}


		public function BusquedaDeUsuariosVisita()
		{
			$respuesta = $this->_modeloSangre->BuscarUsuariosxNombre($parametro = $_GET['term']);
			for ($i=0; $i < count($respuesta); $i++) { 
				$sangre[$i] = array(
						'idEmpleado' 		=> $respuesta[$i]['idEmpleado'],
						'nombres' 			=> $respuesta[$i]['nombres']. ' ' . $respuesta[$i]['apellidoPaterno']. ' ' . $respuesta[$i]['apellidoMaterno']
					);
			}

			echo json_encode($sangre);
		}


		public function RegistrarDatoscabecera()
		{


			$dni 				= $this->obtenerDatosCadena('dni');
			$nombre 			= $this->obtenerDatosCadena('nombre');
			$fechaNac 			= $this->obtenerDatosCadena('fechaNac');
			$domicilio 			= $this->obtenerDatosCadena('domicilio');
			$dniRespon 			= $this->obtenerDatosCadena('dniRespon');
			$nombreRespon 		= $this->obtenerDatosCadena('nombreRespon');
			$fechaNacRespon 	= $this->obtenerDatosCadena('fechaNacRespon');
			$parentesco 		= $this->obtenerDatosCadena('parentesco');
			$hnc 				= $this->obtenerDatosCadena('hnc');
			$estableSalud 		= $this->obtenerDatosCadena('estableSalud');
			$hemoglobina		= $this->obtenerDatosCadena('hemoglobina');
			$anemia 			= $this->obtenerDatosCadena('anemia');
			$fechaIniSuple		= $this->obtenerDatosCadena('fechaIniSuple');
			$numDosis 			= $this->obtenerDatosNumero('numDosis');
			$fechaVisita		= $this->obtenerDatosCadena('fechaVisita');

			$temp_aleatorio = rand(0,10) * rand(0,10);
			$temp_aleatorio = $temp_aleatorio * rand(10,20);
			$aleatorio = $temp_aleatorio . $idResultados;


			$this->_modeloPiscina->RegistrarDatosEvaluacionCabecera($dni, $nombre, $fechaNac, $domicilio, $dniRespon, $nombreRespon, $fechaNacRespon, $parentesco, $hnc, $estableSalud, $hemoglobina, $anemia, $fechaIniSuple, $numDosis, $idEmpleado, $fechaVisita, $observaciones, $nvisita);
			$respuesta = $this->_modeloSangre->BuscarEvaluacionxIdCabecera($aleatorio);

			if (count($respuesta) > 0) {
				for ($i=0; $i < count($codigos); $i++) { 
					$this->_modeloPiscina->RegistrarDatosEvaluacionDetalle($aleatorio,$this->obtenerDatosCadena($idResultados[$i]['CODIGO_A']), $resultado);
				}
				$this->_vista->mensajeAlerta = "Registro con exito";
			}
			else {
				$this->_vista->mensajeAlerta = "Hubo un error al registrar";
			}
		}


	}
?>