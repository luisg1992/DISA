	<?php
	class piscinaControlador extends Controlador
	{
		private $_modeloPiscina;
		private $_modeloUsuarios;
		private $_modeloUbigeo;
		private $_pdfDisa;

		public function __construct()
		{
			parent::__construct();
			$this->_modeloPiscina 	= $this->obtenerModelo('piscina');
			$this->_modeloUsuarios 	= $this->obtenerModelo('usuarios');
			$this->_modeloUbigeo 	= $this->obtenerModelo('ubigeo');
			$this->_pdfDisa 		= $this->obtenerLibreria('pdfDisa');
		}

		public function index()
		{
			Sesion::accesos('logueado');
			#$this->_vista->construirVista('login','login');
			
		}

		public function generarEvalucacion()
		{
			$codigos = $this->_modeloPiscina->ListarCodigosPatchs();

			$calificacion = 's';
			$calificacionNombreVista = "Saludable";
			for ($i=0; $i < count($codigos); $i++) { 
					$criterio = $this->_modeloPiscina->ImprimirCriterioxCodigo($this->obtenerDatosCadena($codigos[$i]['CODIGO_A']));
					# echo $criterio[0]['IdCriterio'];
					if ($criterio[0]['IdCriterio'] == 0) {
						$calificacion = 'n';
						$calificacionNombreVista = "No Saludable";
					}
				}
			
			$idpiscina = $this->obtenerDatosNumero('idPiscinaGrabar');
			$nopiscina = $this->obtenerDatosCadena('NombrePiscinaGrabar');
			$fecha 	= date('Y-m-d');
			$hora 	= date('H:i:s');
			$temp_aleatorio = rand(0,10) * rand(0,10);
			$temp_aleatorio = $temp_aleatorio * rand(10,20);
			$aleatorio = $temp_aleatorio . $idpiscina;
			$usuario = Sesion::get('idusuario');

			

			#insertando cabecera
			$this->_modeloPiscina->InsertarEvaluacionCabecera($aleatorio,$fecha,$hora,$idpiscina,$usuario,$calificacion);
			$respuesta = $this->_modeloPiscina->BuscarCalificacionxCodigo($aleatorio);

			if (count($respuesta) > 0) {
				for ($i=0; $i < count($codigos); $i++) { 
					$this->_modeloPiscina->InsertarEvaluacionDetalle($aleatorio,$this->obtenerDatosCadena($codigos[$i]['CODIGO_A']),'1');
					#echo $aleatorio ."-". $this->obtenerDatosCadena($codigos[$i]['CODIGO_A']) . "-1<br>";
				}
				#exit();
				$this->_vista->mensajeAlerta = "Evaluación ingresa con Éxito!!";
				$this->_vista->calificacion  = $calificacionNombreVista;
				$this->_vista->NombrePiscina = $nopiscina;
				$this->evaluacionPiscina();
			}
			else {
				$this->_vista->mensajeAlerta = "Hubo un error al registrar, intentelo nuevamente";
				$this->evaluacionPiscina();
			}
		}

		public function evaluacionPiscina()		
		{
			Sesion::accesos('logueado');

			#cabeceras
			$cabeceras_temporar = $this->_modeloPiscina->ListarCabecerasEvaluacion();
			


			#html 1
			$html = "<form action='" . BASE_URL . 'piscina' . DS . 'generarEvalucacion' . "' method='post'>";
			$html .= "<input type='hidden' name='idPiscinaGrabar'>";
			$html .= "<input type='hidden' name='NombrePiscinaGrabar'>";
			$html .= "<div class='row'>";

				for ($i=0; $i < 2; $i++) { 
					$html .= "<div class='col-md-10 col-md-offset-1 col-sm-12 col-xs-12'>";
						$html .= "<div class='panel panel-default'>";
							$html .= "<div class='panel-heading'>" . $cabeceras_temporar[$i]['CABECERA'] . "</div>";
							$html .= "<div class='panel-body'>";
							$html .= "</div>";
								$html .= "<div class='table-responsive'>";
						  			$html .= "<table class='table table-bordered' style='text-align: left;'>";

						  			#items
						  			$items_temporal = $this->_modeloPiscina->ListarItemsxIdCabecereEvaluacion($cabeceras_temporar[$i]['IDCABECERA']);
						  			for ($j=0; $j < count($items_temporal); $j++) { 
						  				$html .= "<tr>";

						  					$opcion_temporar = $this->_modeloPiscina->ListarOpcionxIdItemxIdCabeceraEvaluacion($cabeceras_temporar[$i]['IDCABECERA'],$items_temporal[$j]['idItem']);
						  					$rowspan = count($opcion_temporar);

						  					$item = $this->CortarCabeceras($items_temporal[$j]['Item']);

						  					$html .= "<td rowspan='" . $rowspan . "'><b>" . $item . "</b></td>";

						  					$item = null;

						  					#opciones
						  					#$opcion_temporar = $this->_modeloPiscina->ListarOpcionxIdItemxIdCabeceraEvaluacion($cabeceras_temporar[$i]['IDCABECERA'],$items_temporal[$j]['idItem']);
						  					for ($x=0; $x < count($opcion_temporar); $x++) { 
							  					$html .= "<td>" . $opcion_temporar[$x]['Opcion'] . "</td>";
							  					$html .= "<td><b>" . $opcion_temporar[$x]['Criterio'] . "</b></td>";
							  					$html .= "<td><input type='radio' name='" . $items_temporal[$j]['idItem'] . $cabeceras_temporar[$i]['IDCABECERA'] . "' value='" . $opcion_temporar[$x]['codigo'] . "' placeholder='' id='" . $opcion_temporar[$x]['IdCriterio'] . "'></td>";
							  					$html .= "</tr><tr>";
							  					
						  					}

						  				$html .= "</tr>";
						  			}

						  			$html .= "</table>";
						  		$html .= "</div>";
							
					$html .= "</div>";
					$html .= "</div>";
				}

			$html .= "</div>";

			#html 2
			$html .= "<div class='row'>";

				for ($i=2; $i < 4; $i++) { 
										$html .= "<div class='col-md-10 col-md-offset-1 col-sm-12 col-xs-12'>";
						$html .= "<div class='panel panel-default'>";
							$html .= "<div class='panel-heading'>" . $cabeceras_temporar[$i]['CABECERA'] . "</div>";
							$html .= "<div class='panel-body'>";
							$html .= "</div>";
								$html .= "<div class='table-responsive'>";
						  			$html .= "<table class='table table-bordered' style='text-align: left;'>";

						  			#items
						  			$items_temporal = $this->_modeloPiscina->ListarItemsxIdCabecereEvaluacion($cabeceras_temporar[$i]['IDCABECERA']);
						  			for ($j=0; $j < count($items_temporal); $j++) { 
						  				$html .= "<tr>";

						  					$opcion_temporar = $this->_modeloPiscina->ListarOpcionxIdItemxIdCabeceraEvaluacion($cabeceras_temporar[$i]['IDCABECERA'],$items_temporal[$j]['idItem']);
						  					$rowspan = count($opcion_temporar);

						  					$item = $this->CortarCabeceras($items_temporal[$j]['Item']);

						  					$html .= "<td rowspan='" . $rowspan . "'><b>" . $item . "</b></td>";

						  					$item = null;

						  					#opciones
						  					#$opcion_temporar = $this->_modeloPiscina->ListarOpcionxIdItemxIdCabeceraEvaluacion($cabeceras_temporar[$i]['IDCABECERA'],$items_temporal[$j]['idItem']);
						  					for ($x=0; $x < count($opcion_temporar); $x++) { 
							  					$html .= "<td>" . $opcion_temporar[$x]['Opcion'] . "</td>";
							  					$html .= "<td><b>" . $opcion_temporar[$x]['Criterio'] . "</b></td>";
							  					$html .= "<td><input type='radio' name='" . $items_temporal[$j]['idItem'] . $cabeceras_temporar[$i]['IDCABECERA'] . "' value='" . $opcion_temporar[$x]['codigo'] . "' placeholder='' id='" . $opcion_temporar[$x]['IdCriterio'] . "'></td>";
							  					$html .= "</tr><tr>";

						  					}

						  				$html .= "</tr>";
						  			}

						  			$html .= "</table>";
						  		$html .= "</div>";
							
					$html .= "</div>";
					$html .= "</div>";
				}
			$html .= "<div class='col-md-10 col-md-offset-1 col-sm-12 col-xs-12'>";
			$html .= "<textarea class='form-control' rows='5' placeholder='Observaciones'></textarea></div>";
			$html .= "</div>";
				$html .= "<hr>";
				$html .= "<div class='row'>";
					$html .= "<div class ='col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-12'>";
						$html .= "<button class='btn btn-primary'>Guardar</button>";
					$html .= "</div>";
				$html .= "</div>";

			$html .= "</form>";

			
			$this->_vista->breadcrumb = $this->breadcrumbVista('Piscina','Evaluación');
			$this->_vista->cuerpoEvaluacion = $html;
			$this->_vista->tituloGeneral = "Calidad Sanitaria de Piscinas";
			$this->_vista->construirVista('piscina','evaluacion');
		}

		public function reportesPiscinas($pagina = false)
		{
			#Sesion::accesos('logueado');
			if (!$pagina) {
				$pagina = 1;
			}

			$piscinas_temp = $this->_modeloPiscina->ListarPiscinasGeneral();
			$piscinas = json_decode($this->listadoPiscinaPaginado($piscinas_temp,$pagina,'reportesPiscinas'));

			$this->_vista->breadcrumb = $this->breadcrumbVista('Piscina','Reportes');
			$this->_vista->listaPiscina = $piscinas;
			$this->_vista->tituloGeneral = "Piscinas Saludables";
			$this->_vista->construirVista('piscina','reportes');
		}
		
		public function reportesPiscinasxUbigeo($Ubigeo,$pagina = false)
		{
			
			#Sesion::accesos('logueado');
			if (!$pagina) {
				$pagina = 1;
			}

			$piscinas_temp = $this->_modeloPiscina->ListarPiscinasxDistrito($Ubigeo);
			$piscinas = json_decode($this->listadoPiscinaPaginado($piscinas_temp,$pagina,'reportesPiscinasxUbigeo/'.$Ubigeo));

			$this->_vista->breadcrumb = $this->breadcrumbVista('Piscina','Reportes');
			$this->_vista->listaPiscina = $piscinas;
			$this->_vista->tituloGeneral = "Piscinas Saludables - <mark>" . $piscinas_temp[0]['DISTRITO'] . "</mark>";
			$this->_vista->construirVista('piscina','reportes');
		}

		public function reportesPiscinasxIdPiscina($idPiscina,$pagina = false)
		{
			
			#Sesion::accesos('logueado');
			if (!$pagina) {
				$pagina = 1;
			}

			$piscinas_temp = $this->_modeloPiscina->ListarPiscinasxIdPiscina($idPiscina);
			$piscinas = json_decode($this->listadoPiscinaPaginado($piscinas_temp,$pagina,'reportesPiscinasxUbigeo/'.$idPiscina));

			$this->_vista->breadcrumb = $this->breadcrumbVista('Piscina','Reportes');
			$this->_vista->listaPiscina = $piscinas;
			$this->_vista->tituloGeneral = "<mark>" . $piscinas_temp[0]['NOMBRE'] . "</mark>";
			$this->_vista->construirVista('piscina','reportes');
		}

		public function reportesPiscinasxCalificacion($calificacion,$pagina = false)
		{
			
			#Sesion::accesos('logueado');
			if (!$pagina) {
				$pagina = 1;
			}

			switch ($calificacion) {
				case 's':
					$tituloGeneralc = 'Piscinas Saludables';
					break;
				case 'ns':
					$tituloGeneralc = 'Piscinas No Saludables';
					break;
			}

			$piscinas_temp = $this->_modeloPiscina->ListarPiscinasxCalificacion($calificacion);
			$piscinas = json_decode($this->listadoPiscinaPaginado($piscinas_temp,$pagina,'reportesPiscinasxCalificacion/'.$calificacion));

			$this->_vista->breadcrumb = $this->breadcrumbVista('Piscina','Reportes');
			$this->_vista->listaPiscina = $piscinas;
			$this->_vista->tituloGeneral = "<mark>Reporte: " . $tituloGeneralc . "</mark>";
			$this->_vista->construirVista('piscina','reportes');
		}

		public function generarInformacionGeografica($idPiscina)
		{
			$piscinas_temp = $this->_modeloPiscina->ListarPiscinasxIdPiscina($idPiscina);
			// $nombre = $piscinas_temp[0]['NOMBRE'];
			// $latitud = $piscinas_temp[0]['LATITUD'];
			// $longitud = $piscinas_temp[0]['LONGITUD'];

			$datosGeograficos = array(
									'nombre' => $piscinas_temp[0]['NOMBRE'],
									'latitud' => $piscinas_temp[0]['LATITUD'],
									'longitud' =>$piscinas_temp[0]['LONGITUD']
									);
			echo json_encode($datosGeograficos);
			exit();
		}

		private function listadoPiscinaPaginado($piscinas,$pagina,$direccion)
		{
			if ($pagina == 1) {
				$class1 = 'disabled';
			}

			$contador = count($piscinas);
			$trb2 = ceil($contador/8);

			if ($pagina == $trb2) {
				$class2 = 'disabled';
			}
			$fin 	= ( $pagina * 8 ) - 1;
			$inicio	= $fin - 7 ; 

			/*ELIMNA LOS REGISTROS QUE TIENE ESTADO CERO - PISCINAS CON EVALUACION ACTUALIZADA 2o+*/
			for ($x=0; $x < count($piscinas); $x++) { 
				if ($piscinas[$x]['ESTADOEV'] != '0') {
					$piscinas_temp[] = $piscinas[$x];
				}
			}


			$html = "<div class='col-sm-12 col-md-9 col-xs-12' style='text-align:center;' id='piscinasListaGeneralReportes'>";
				$html .= "<div class='row'>";

			for ($i=$inicio; $i <= $fin; $i++) { 
				
				if ($piscinas_temp[$i]['NOMBRE'] != null) {

					$html .= "<div class='col-md-3 col-sm-6 col-xs-12' style='text-align: center; height:310px !important;'>";
						$html .= "<div class='panel panel-default' style='height:260px !important;padding: 0px !important;'>";
							$html .= "<div style='text-align:left;'><a type='button' id='mapsG' data-rel='".$piscinas_temp[$i]['CODIGO']."' class='btn btn-default' style='position: absolute;border:none;' alt='Google Maps'><i class='fa fa-map-marker' aria-hidden='true'></i></a></div>";
							$html .= "<div class='panel-body'>";
								$html .= "<img src='" . BASE_URL . 'publico' . DS . 'img' . DS . 'piscinas' . DS . "pool.png' style='width: 40%;'><br><br>";
								$html .= "<small>" . $piscinas_temp[$i]['NOMBRE'] . "</small><br>";
								$html .= "<small style='font-size: 11px !important;'>" . $piscinas_temp[$i]['DIRECCION'] . "</small><br>";
								$html .= "<small>" . $piscinas_temp[$i]['DISTRITO'] . "</small> <br>";
								$html .= "<small style='color: #fff;background-color: " . $piscinas_temp[$i]['COLOR'] . "; border: 1px solid " . $piscinas_temp[$i]['BORDE'] . " ; padding:5px;'>" . $piscinas_temp[$i]['CALIFICACION'] . "</small><br>";
							$html .= "</div>";	
						
						$html .= "</div>";	

					$html .= "</div>";	
					}	
				else{
					$i = $fin+1;
				}	
					
			}

				$html .= "</div>";

				$html .= "<nav aria-label='Page navigation'>";
				 	$html .= "<ul class='pager'>";
				 		$atras = $pagina - 1;
				 		$siguiente = $pagina + 1;
				    	$html .= "<li class='" . $class1 . "'><a href='" . BASE_URL . 'piscina' . DS . $direccion . DS . $atras . "' style='border-radius: 0px;'><span aria-hidden='true'>&larr;</span>Atras</a></li>&nbsp;";

				    	

    					$html .= "<li class='" . $class2 . "'><a href='" . BASE_URL . 'piscina' . DS . $direccion . DS . $siguiente . "' style='border-radius: 0px;'>Adelante <span aria-hidden='true'>&rarr;</span></a></li>";
				  	$html .= "</ul>";
				$html .= "</nav>";
				$html .= "<small><mark>P&aacute;gina " . $pagina . " de " . count($piscinas_temp) . "</mark></small>&nbsp;";
			$html .= "</div>";

			return json_encode($html);
			
		}

		private function CortarCabeceras($cadena)
		{
			$nueva_cadena = null;

			for ($i=0; $i < strlen($cadena); $i++) { 
				if($cadena[$i] == " ")
				{
					$nueva_cadena .= "<br>";
				}
				else{
					$nueva_cadena .= $cadena[$i];
				}
			}

			return $nueva_cadena;
		}

		public function BusquedaDePiscinas()
		{
			$respuesta = $this->_modeloPiscina->BuscarPiscinasxNombre($parametro = $_GET['term']);
			for ($i=0; $i < count($respuesta); $i++) { 
				$piscinas[$i] = array(
						'idpiscina' => $respuesta[$i]['IDPISCINA'],
						'Nombre' 	=> $respuesta[$i]['NOMBRE'],
						'Direccion' => $respuesta[$i]['DIRECCION'],
						'Distrito' 	=> $respuesta[$i]['DISTRITO']
					);
			}

			echo json_encode($piscinas);
		}

		public function BusquedaDePiscinasAdminUbigeo()
		{			

			if (Sesion::get('idusuario') == 1001) {
				$respuesta = $this->_modeloPiscina->BuscarPiscinasxNombre($parametro = $_GET['term']);
			}
			else{
				$temporal = $this->_modeloUsuarios->ListarEmpleadoxId(Sesion::get('idusuario'));
				$idDepartamento = substr($temporal[0]['ubigeo'], 0,-4);	

				$respuesta = $this->_modeloPiscina->BuscarPiscinasxNombreAdmin($parametro = $_GET['term'], $idDepartamento);
			}
			
			for ($i=0; $i < count($respuesta); $i++) { 
				$piscinas[$i] = array(
						'idpiscina' => $respuesta[$i]['IDPISCINA'],
						'Nombre' 	=> $respuesta[$i]['NOMBRE'],
						'Direccion' => $respuesta[$i]['DIRECCION'],
						'Distrito' 	=> $respuesta[$i]['DISTRITO']
					);
			}

			echo json_encode($piscinas);
		}

		/*FUNCIONES PARA EL ADMINISTRADOR DE PISCINA*/

		public function reporAdmin()
		{
			Sesion::accesos('logueado');

			$temporal = $this->_modeloUsuarios->ListarEmpleadoxId(Sesion::get('idusuario'));
			$idDepartamento = substr($temporal[0]['ubigeo'], 0,-4);
			$temp = $this->_modeloUbigeo->BuscarDepartamentoxCodigo($idDepartamento);

			$this->_vista->ubicacion = $temp[0]['DEPARTAMENTO'];
			$this->_vista->breadcrumb = $this->breadcrumbVista('Piscina','Reportes Admistración');
			$this->_vista->tituloGeneral = "Calificación de Piscinas";
			$this->_vista->construirVista('piscina','reportesAdministrador');
		}

		public function listarProviniciasPiscinaAdministrador()
		{
			$temporal = $this->_modeloUsuarios->ListarEmpleadoxId(Sesion::get('idusuario'));
			$idDepartamento = substr($temporal[0]['ubigeo'], 0,-4);

			$respuesta = $this->_modeloUbigeo->ListarProvinciasxDepartamento($idDepartamento);
			$html = "<option></option>";
			
			for ($i=0; $i < count($respuesta); $i++) { 
				if ($respuesta[$i]['IDPROVINCIA'] == null || $respuesta[$i]['IDPROVINCIA'] == " ") {
					$i++;
				}
				$html .= "<option value='" . $respuesta[$i]['IDPROVINCIA'] . "'>" . $respuesta[$i]['PROVINCIA'] . "</option>";
			}

			echo json_encode($html);
		}

		public function listarDistritosPiscinaAdministrador($provincia)
		{
			$temporal = $this->_modeloUsuarios->ListarEmpleadoxId(Sesion::get('idusuario'));
			$idDepartamento = substr($temporal[0]['ubigeo'], 0,-4);

			$distritos_tmp = $this->_modeloUbigeo->ListarDistritosxProvinciaxDepartamento($idDepartamento,$provincia);

			$html = "<option> </option>";
			
			for ($i=0; $i < count($distritos_tmp); $i++) { 
				if ($distritos_tmp[$i]['IDDISTRITO'] == null || $distritos_tmp[$i]['IDDISTRITO'] == " ") {
					$i++;
				}
				$html .= "<option value='" . $distritos_tmp[$i]['IDDISTRITO'] . "'>" . $distritos_tmp[$i]['DISTRITO'] . "</option>";
			}

			echo json_encode($html);			
		}

		public function registroPiscina()
		{
			$nombre 		= $this->obtenerDatosCadena('nueva_piscina_nombre');
			$direccion 		= $this->obtenerDatosCadena('nueva_piscina_direccion');
			$departamento 	= $this->obtenerDatosCadena('nueva_piscina_departamento');
			$provincia 		= $this->obtenerDatosCadena('nueva_piscina_provincia');
			$distrito 		= $this->obtenerDatosCadena('nueva_piscina_distrito');
			$latitud 		= $this->obtenerDatosCadena('nueva_piscina_latitud');
			$longitud 		= $this->obtenerDatosCadena('nueva_piscina_longitud');

			if ($latitud == NULL || $latitud == " ") {
				$latitud = " ";
			}

			if ($longitud == NULL || $longitud == " ") {
				$longitud = " ";
			}

			$ubigeo = $departamento . "" . $provincia . "" . $distrito;
			$idEmpleado = Sesion::get('idusuario');
			$estado=1;

			//echo $nombre.'<br>'.$direccion.'<br>'.$ubigeo.'<br>'.$latitud.'<br>'.$longitud.'<br>'.$idEmpleado.'<br>'.$estado;
			//exit();

			$respuesta = $this->_modeloPiscina->IngresarPiscinaModelo($nombre,$direccion,$ubigeo,$latitud,$longitud,$idEmpleado,$estado);
			if($respuesta == 'M_1'){
				echo json_encode('Piscina Registrada con Éxito');
				exit();
			}
			else
			{
				echo json_encode('Error, intentelo nuevamente');
				exit();
			}

		}

		public function ListarPiscinasxDptoPaginada()
		{
			
			$dEmpezar = $this->obtenerDatosNumero('dEmpezar');
			$dMostrar = $this->obtenerDatosNumero('dMostrar');

			$temporal = $this->_modeloUsuarios->ListarEmpleadoxId(Sesion::get('idusuario'));
			$idDepartamento = substr($temporal[0]['ubigeo'], 0,-4);
			$temporal = null;

			$clase = null;
			if ($dEmpezar == 0 ) {
				$clase = "deshabilitado";
			}



			$html = null;

			$temporal = $this->_modeloPiscina->PiscinasxDepartamentoPaginadoAdmin($idDepartamento, $dMostrar, $dEmpezar);

			
			$ind = $dEmpezar;

			for ($i=0; $i < count($temporal); $i++) { 
				$ind = $ind + 1;

				

				$html .= "<tr>";
					$html .= "<td class='text-center'>" . $ind . "</td>";
					$html .= "<td>" . $temporal[$i]['NOMBRE'] . "</td>";
					$html .= "<td>" . $temporal[$i]['DIRECCION'] . "</td>";
					$html .= "<td class='success'>" . $temporal[$i]['DEPARTAMENTO'] . "</td>";
					$html .= "<td>" . $temporal[$i]['PROVINCIA'] . "</td>";
					$html .= "<td>" . $temporal[$i]['DISTRITO'] . "</td>";
					$html .= "<td class='" . $temporal[$i]['COLOR'] . "'>" . $temporal[$i]['CALIFICACION'] . "</td>";
					$html .= "<td class='text-center'>";
						$html .= "<a type='button' id='editPiscina' data-rel='".$temporal[$i]['CODIGO']."' class='btn btn-default btn-sm'><i class='fa fa-pencil' aria-hidden='true'></i></a>&nbsp;";
						$html .= "<a type='button' id='deltPiscina' data-rel='".$temporal[$i]['CODIGO']."' class='btn btn-default btn-sm'><i class='fa fa-trash' aria-hidden='true'></i></a>&nbsp;";
						$html .= "<a type='button' id='ubicacionPiscina' data-rel='".$temporal[$i]['CODIGO']."' class='btn btn-default btn-sm'><i class='fa fa-map-marker' aria-hidden='true'></i></a>&nbsp;";
					$html .= "</td>";
					$html .= "</tr>";
			}

			$paginado = "<nav aria-label='Page navigation'>";
				$paginado .= "<ul class='pager'>";
					$atras = $dEmpezar - 10;
					$siguiente = $dEmpezar + 10;
				    $paginado .= "<li class='" . $clase . "'><a data-rel='" . $atras . "' style='border-radius: 0px;' id='paginacionxDpto'><span aria-hidden='true'>&larr;</span>Atras</a></li>&nbsp;";
   					$paginado .= "<li class=''><a data-rel='" . $siguiente . "' style='border-radius: 0px;' id='paginacionxDpto'>Adelante <span aria-hidden='true'>&rarr;</span></a></li>";
			  	$paginado .= "</ul>";
			$paginado .= "</nav>";
			

			echo json_encode(array('html'=>$html,'paginado' => $paginado));
		}

		public function ListarrPiscinasxUbigeo()
		{	
			$dEmpezar = $this->obtenerDatosNumero('dEmpezar');
			$dMostrar = $this->obtenerDatosNumero('dMostrar');
			$ubigeo = $this->obtenerDatosCadena('ubigeo');

			$temporal = $this->_modeloUsuarios->ListarEmpleadoxId(Sesion::get('idusuario'));
			$idDepartamento = substr($temporal[0]['ubigeo'], 0,-4);

			$ubigeo = $idDepartamento . "" . $ubigeo;

			$html = null;

			$temporal = $this->_modeloPiscina->PiscinasxUbigeoPaginadoAdmin($ubigeo, $dMostrar, $dEmpezar);
			

			$ind = 0;

			for ($i=0; $i < count($temporal); $i++) { 
				$ind = $ind + 1;
				$html .= "<tr>";
					$html .= "<td>" . $ind . "</td>";
					$html .= "<td>" . $temporal[$i]['NOMBRE'] . "</td>";
					$html .= "<td>" . $temporal[$i]['DIRECCION'] . "</td>";
					$html .= "<td>" . $temporal[$i]['DEPARTAMENTO'] . "</td>";
					$html .= "<td>" . $temporal[$i]['PROVINCIA'] . "</td>";
					$html .= "<td class='success'>" . $temporal[$i]['DISTRITO'] . "</td>";
					$html .= "<td class='" . $temporal[$i]['COLOR'] . "'>" . $temporal[$i]['CALIFICACION'] . "</td>";
					$html .= "<td>";
						$html .= "<a type='button' id='editPiscina' data-rel='".$temporal[$i]['CODIGO']."' class='btn btn-default'><i class='fa fa-pencil' aria-hidden='true'></i></a>&nbsp;";
						$html .= "<a type='button' id='deltPiscina' data-rel='".$temporal[$i]['CODIGO']."' class='btn btn-default'><i class='fa fa-trash' aria-hidden='true'></i></a>&nbsp;";
						$html .= "<a type='button' id='ubicacionPiscina' data-rel='".$temporal[$i]['CODIGO']."' class='btn btn-default'><i class='fa fa-map-marker' aria-hidden='true'></i></a>&nbsp;";
					$html .= "</td>";
					$html .= "</tr>";
			}

			$paginado = "<nav aria-label='Page navigation'>";
				$paginado .= "<ul class='pager'>";
					$atras = $dEmpezar - 10;
					$siguiente = $dEmpezar + 10;
				    $paginado .= "<li class=''><a data-rel='" . $atras . "' style='border-radius: 0px;' id='paginacionUbigeo'><span aria-hidden='true'>&larr;</span>Atras</a></li>&nbsp;";
   					$paginado .= "<li class=''><a data-rel='" . $siguiente . "' style='border-radius: 0px;' id='paginacionUbigeo'>Adelante <span aria-hidden='true'>&rarr;</span></a></li>";
			  	$paginado .= "</ul>";
			$paginado .= "</nav>";

			echo json_encode(array('html'=>$html,'paginado' => $paginado));
		}

		public function ListarPiscinasxCalificacionxDepartamento()
		{
			$dEmpezar = $this->obtenerDatosNumero('dEmpezar');
			$dMostrar = $this->obtenerDatosNumero('dMostrar');
			$calificacion = $this->obtenerDatosCadena('calificacion');

			$temporal = $this->_modeloUsuarios->ListarEmpleadoxId(Sesion::get('idusuario'));
			$idDepartamento = substr($temporal[0]['ubigeo'], 0,-4);


			$clase = null;
			if ($dEmpezar == 0 ) {
				$clase = "deshabilitado";
			}

			$html = null;

			
			$temporal = $this->_modeloPiscina->PiscinasCalificacionxDepartamentoPaginadoAdmin($calificacion, $idDepartamento, $dMostrar, $dEmpezar);

			$ind = $dEmpezar;

			for ($i=0; $i < count($temporal); $i++) { 
				$ind = $ind + 1;
				$html .= "<tr>";
					$html .= "<td class='text-cente'>" . $ind . "</td>";
					#$html .= "<td>" . $temporal[$i]['CODIGO'] . "</td>";
					$html .= "<td>" . $temporal[$i]['NOMBRE'] . "</td>";
					$html .= "<td>" . $temporal[$i]['DIRECCION'] . "</td>";
					$html .= "<td>" . $temporal[$i]['DEPARTAMENTO'] . "</td>";
					$html .= "<td>" . $temporal[$i]['PROVINCIA'] . "</td>";
					$html .= "<td>" . $temporal[$i]['DISTRITO'] . "</td>";
					$html .= "<td class='" . $temporal[$i]['COLOR'] . "'>" . $temporal[$i]['CALIFICACION'] . "</td>";
					$html .= "<td class='text-cente'>";
						$html .= "<a type='button' id='editPiscina' data-rel='".$temporal[$i]['CODIGO']."' class='btn btn-default'><i class='fa fa-pencil' aria-hidden='true'></i></a>&nbsp;";
						$html .= "<a type='button' id='deltPiscina' data-rel='".$temporal[$i]['CODIGO']."' class='btn btn-default'><i class='fa fa-trash' aria-hidden='true'></i></a>&nbsp;";
						$html .= "<a type='button' id='ubicacionPiscina' data-rel='".$temporal[$i]['CODIGO']."' class='btn btn-default'><i class='fa fa-map-marker' aria-hidden='true'></i></a>&nbsp;";
					$html .= "</td>";
					$html .= "</tr>";
			}

			$paginado = "<nav aria-label='Page navigation'>";
				$paginado .= "<ul class='pager'>";
					$atras = $dEmpezar - 10;
					$siguiente = $dEmpezar + 10;
				    $paginado .= "<li class='" . $clase . "'><a data-rel='" . $atras . "' style='border-radius: 0px;' id='paginacionxCalificacionxDepartamento'><span aria-hidden='true'>&larr;</span>Atras</a></li>&nbsp;";
   					$paginado .= "<li class=''><a data-rel='" . $siguiente . "' style='border-radius: 0px;' id='paginacionxCalificacionxDepartamento'>Adelante <span aria-hidden='true'>&rarr;</span></a></li>";
			  	$paginado .= "</ul>";
			$paginado .= "</nav>";

			echo json_encode(array('html'=>$html,'paginado' => $paginado));
		}

		public function EliminarPiscinas()
		{
			$codigo = $this->obtenerDatosNumero('codigo');
			$estado = 0;

			$respuesta = $this->_modeloPiscina->PiscinasEliminar($estado,$codigo);

			if ($respuesta == "M_1") {
				echo json_encode('Piscina Eliminado con Exito.');
			}
			else
			{
				echo json_encode('Error al registrar, intentelo nuevamente.');
			}
		}

		public function MostrarDatosdePiscinasxCodigo()
		{
			$codigo = $this->obtenerDatosNumero('codigo');
			$respuesta = $this->_modeloPiscina->ListarPiscinasxIdPiscina($codigo);

			$provinicias_tmp = $this->_modeloUbigeo->ListarProvinciasxDepartamento($respuesta[0]['CODDEPARTAMENTO']);

			$provincias = "<option>--Provincia--</option>";
			
			for ($i=0; $i < count($provinicias_tmp); $i++) { 
				$provincias .= "<option value='" . $provinicias_tmp[$i]['IDPROVINCIA'] . "'>" . $provinicias_tmp[$i]['PROVINCIA'] . "</option>";
			}

			$distritos_tmp = $this->_modeloUbigeo->ListarDistritosxProvinciaxDepartamento($respuesta[0]['CODDEPARTAMENTO'],$respuesta[0]['CODPROVINCIA']);

			$distritos = "<option>--Distrito--</option>";
			
			for ($i=0; $i < count($distritos_tmp); $i++) { 
				$distritos .= "<option value='" . $distritos_tmp[$i]['IDDISTRITO'] . "'>" . $distritos_tmp[$i]['DISTRITO'] . "</option>";
			}


			$data = array(
				'CODIGO' 		=> $respuesta[0]['CODIGO'],
				'NOMBRE' 		=> $respuesta[0]['NOMBRE'],
				'DIRECCION' 	=> $respuesta[0]['DIRECCION'],
				'CODIGODPTO'	=> $respuesta[0]['CODDEPARTAMENTO'],
				'CODIGOPROV' 	=> $respuesta[0]['CODPROVINCIA'],
				'CODIGODSTR' 	=> $respuesta[0]['CODIDSTRITO'],
				'PROVINICIAS'	=> $provincias,
				'DISTRITOS'		=> $distritos,
				'LATITUD' 		=> $respuesta[0]['LATITUD'],
				'LONGITUD' 		=> $respuesta[0]['LONGITUD']
			);

			echo json_encode($data);
		}


		public function ActualizarPiscinas()
		{
			$codigo_piscina 		= $this->obtenerDatosNumero('modificar_codigo_piscina');
			$piscina_nombre 		= $this->obtenerDatosCadena('modificar_piscina_nombre');
			$piscina_direccion 		= $this->obtenerDatosCadena('modificar_piscina_direccion');
			$piscina_departamento 	= $this->obtenerDatosCadena('modificar_piscina_departamento');
			$piscina_provincia 		= $this->obtenerDatosCadena('modificar_piscina_provincia');
			$piscina_distrito 		= $this->obtenerDatosCadena('modificar_piscina_distrito');
			$piscina_latitud 		= $this->obtenerDatosCadena('modificar_piscina_latitud');
			$piscina_longitud 		= $this->obtenerDatosCadena('modificar_piscina_longitud');

			$ubigeo = $piscina_departamento . '' . $piscina_provincia . '' . $piscina_distrito;

			$respuesta =  $this->_modeloPiscina->PiscinasModificar($piscina_nombre, $piscina_direccion, $ubigeo, $piscina_latitud , $piscina_longitud ,Sesion::get('idusuario'), $codigo_piscina);

			if ($respuesta == "M_1") {
				echo json_encode('Piscina Modificada con Exito.');
			}
			else
			{
				echo json_encode('Error al modificar, intentelo nuevamente.');
			}
		}

		public function GenerarReportePiscina($variable)
		{
			//CAPTURA VARIABLE PARA BUSCAR POR DEPARTAMENTO O CALIFICACION 
			#$variable=$this->obtenerDatosNumero('variable');

			$temporal = $this->_modeloUsuarios->ListarEmpleadoxId(Sesion::get('idusuario'));
			$idDepartamento = substr($temporal[0]['ubigeo'], 0,-4);

			//Si variable 1 busca por departamento
			if($variable==31)
				{
					$listar = $this->_modeloPiscina->ListarPiscinasxDepartamentoPdF($idDepartamento);
					for ($i=0; $i < count($listar); $i++) { 
					$piscinas[$i] = array(
						'Nombre' 		=> $listar[$i]['NOMBRE'],
						'Direccion' 	=> $listar[$i]['DIRECCION'],
						'Departamento' 	=> $listar[$i]['DEPARTAMENTO'],
						'Provincia' 	=> $listar[$i]['PROVINCIA'],
						'Distrito' 		=> $listar[$i]['DISTRITO'],
						'Calificacion' 	=> $listar[$i]['CALIFICACION'],
						'Latitud' 		=> $listar[$i]['LATITUD'],
						'Longitud' 		=> $listar[$i]['LONGITUD']
						);
					}
				}

			if($variable==32)
			{
					$listar = $this->_modeloPiscina->ListarPiscinasxCalificacionPdF($idDepartamento);
					for ($i=0; $i < count($listar); $i++) { 
					$piscinas[$i] = array(
						'Nombre' 		=> $listar[$i]['NOMBRE'],
						'Direccion' 	=> $listar[$i]['DIRECCION'],
						'Departamento' 	=> $listar[$i]['DEPARTAMENTO'],
						'Provincia' 	=> $listar[$i]['PROVINCIA'],
						'Distrito' 		=> $listar[$i]['DISTRITO'],
						'Calificacion' 	=> $listar[$i]['CALIFICACION'],
						'Latitud' 		=> $listar[$i]['LATITUD'],
						'Longitud' 		=> $listar[$i]['LONGITUD']
						);
					}
			}

			$this->_pdfDisa->ReportePiscina($listar);
		}

		Public function SumarListaCalificacion()
		{
			#detectar ubigeo
			$temporal = $this->_modeloUsuarios->ListarEmpleadoxId(Sesion::get('idusuario'));
			$idDepartamento = substr($temporal[0]['ubigeo'], 0,-4);

			$s=0;
			$n=0;
			$e=0;
			$respuesta = $this->_modeloPiscina->listarCalificacion($idDepartamento);

			for ($i=0; $i < count($respuesta); $i++) { 

				switch ($respuesta[$i]['calificacion']) {
					case 's':
						$s=$s + 1;
						break;
					case 'n':
						$n=$n + 1;
						break;
					case NULL:
						$e=$e + 1;
						break;
				}
					
			}
			$total = $n + $s + $e;
			
			$porcn = ($n*100) / $total;
			$porcs = ($s*100) / $total;
			$porce = ($e*100) / $total;

			$sumatoria = array(
				'saludable' 	=> round($porcs,2) ,
				'nosaludable' 	=> round($porcn,2) ,
				'entramite' 	=> round($porce,2) ,
				'total' 		=> $total
			);
			echo json_encode($sumatoria);
		}
	}
 ?>