	<?php
	class informesControlador extends Controlador
	{
		private $_modelobancoSangre;
		private $_pdfDisa;
		private $_modeloUtilitario;
		private $_libreriaUtilitario;
		private $_modeloUsuarios;
		private $_modeloAnemia;

		public function __construct()
		{
			$this->_modelobancoSangre = $this->obtenerModelo('bancoSangre');
			$this->_modeloUtilitario = $this->obtenerModelo('utilitario');
			$this->_modeloAnemia = $this->obtenerModelo('anemia');
			$this->_libreriaUtilitario = $this->obtenerLibreria('utilitario');
			$this->_modeloUsuarios 	= $this->obtenerModelo('usuarios');
			$this->_pdfDisa 		= $this->obtenerLibreria('pdfDisa');
			parent::__construct();	
		}

		public function index()
		{
			Sesion::accesos('logueado');
		
		}

		public function BuscarRenaes()
		{
			$temporal = $this->_modeloUsuarios->ListarEmpleadoxId(Sesion::get('idusuario'));
			$establecimiento = $this->_modelobancoSangre->BuscarInstitucionxIdRenaes(substr($temporal[0]['dni'],0,8));
			//$temporal[0]['dni']
			$data = array('NOMBRE' => $establecimiento[0]['NOMBRE'],
						  'ID'	   => $establecimiento[0]['IDRENAES'],
						  'TELEFONO'	   => $establecimiento[0]['TELEFONO'],
						  'DISA'	   => $establecimiento[0]['DISA'],
						  'CORREO'	   => $establecimiento[0]['CORREO'],
						  'HEMOTERAPIA'	   => $establecimiento[0]['HEMOTERAPIA'],
						  'SECTOR'	   => $establecimiento[0]['SECTOR'],
						  'UDRM'	   => $establecimiento[0]['UDRM'],
						  'RESPONSABLE' => $establecimiento[0]['RESPONSABLE'],
				);


			echo json_encode($data);
		}

		public function generarBancoSangre()
		{	
			$idestablecimiento = $this->obtenerDatosCadena('idEstablecimientoGrabar');
			$jefebanco 		   = $this->obtenerDatosCadena('JefeBancoGrabar');
			$email 			   = $_POST['CorreoBS'];
			$telefono          = $this->obtenerDatosCadena('TelefonoBS');
			$anio 			   = $this->obtenerDatosNumero('anio');
			$mes 	 	   	   = $_POST['mes'];
			$hemoterapia 	   = $_POST['hemoterapiaBS'];
			$sector 	 	   = $_POST['sectorBS'];
			$disa 			   = $this->obtenerDatosCadena('UDRMBS');
			$fechabs		   = $_POST['fechabs'];
			$horabs		  	   = $_POST['horabs'];


			$usuario = Sesion::get('idusuario');

			#insertando cabecera
			$repetido = $this->_modelobancoSangre->BuscarCabeceraxId($mes,$anio,$idestablecimiento);
			if (count($repetido) > 0) {
				$this->_vista->mensajeAlerta = "Ya se registro este reporte!!";
				$this->banSangre();
			}else{

			$this->_modelobancoSangre->InsertarBancoSangreCabecera($disa,$jefebanco,$telefono,$email,$mes,$anio,$usuario,$sector,$hemoterapia,$idestablecimiento,$fechabs,$horabs);
			$respuesta = $this->_modelobancoSangre->BuscarCabeceraxId($mes,$anio,$idestablecimiento);
			/*$respuesta = $this->_modelobancoSangre->BuscarBancoSangreCab(1);*/
			if (count($respuesta) > 0) 
			{ 
				if($hemoterapia==2)
				{
					$cab_temp = $this->_modelobancoSangre->ListarBancoSangreCabM();
					for ($j=0; $j < 14; $j=$j+2)
					{
						$tipo_temp = $this->_modelobancoSangre->ListarBancoSangreTipoM($cab_temp[$j+1]['IDCABECERA']);
						for ($k=0; $k < count($tipo_temp); $k++) 
						{
							if($tipo_temp[$k]['SUBTIPO']==0)
							{	
								$items_temp = $this->_modelobancoSangre->ListarBancoSangreItemsM($cab_temp[$j+1]['IDCABECERA']);
								for ($m=0; $m < count($items_temp); $m++)
								{
									$valor = $items_temp[$m]['IDITEM']."_".$tipo_temp[$k]['IDTIPO'];
									$resul = $_POST[$valor];
									$this->_modelobancoSangre->InsertarBancoSangreDetalle($resul,$respuesta[0]['ID'],$tipo_temp[$k]['IDTIPO'],1,$items_temp[$m]['IDITEM']);
								}
							}elseif($tipo_temp[$k]['SUBTIPO']==1){
									$subtipo_temp = $this->_modelobancoSangre->ListarBancoSangreSubTipoM($tipo_temp[$k]['IDTIPO']);
								for ($n=0; $n < count($subtipo_temp); $n++) 
								{
									$items_temp = $this->_modelobancoSangre->ListarBancoSangreItemsM($cab_temp[$j+1]['IDCABECERA']);
									for ($p=0; $p < count($items_temp); $p++)
									{
										$valor = $items_temp[$p]['IDITEM']."_".$subtipo_temp[$n]['IDSUBTIPO'];
										$resul = $_POST[$valor];
										$this->_modelobancoSangre->InsertarBancoSangreDetalle($resul,$respuesta[0]['ID'],$tipo_temp[$k]['IDTIPO'],$subtipo_temp[$n]['IDSUBTIPO'],$items_temp[$p]['IDITEM']);
									}
								}	
							}
						}
					}	
				}elseif($hemoterapia==1){
					$cab_temp = $this->_modelobancoSangre->ListarBancoSangreCabM();
					for ($j=10; $j < 14; $j=$j+2)
					{
						$tipo_temp = $this->_modelobancoSangre->ListarBancoSangreTipoM($cab_temp[$j+1]['IDCABECERA']);
						for ($k=0; $k < count($tipo_temp); $k++) 
						{
							if($tipo_temp[$k]['SUBTIPO']==0)
							{	
								$items_temp = $this->_modelobancoSangre->ListarBancoSangreItemsM($cab_temp[$j+1]['IDCABECERA']);
								for ($m=0; $m < count($items_temp); $m++)
								{
									$valor = $items_temp[$m]['IDITEM']."_".$tipo_temp[$k]['IDTIPO']."_2";
									$resul = $_POST[$valor];
									$this->_modelobancoSangre->InsertarBancoSangreDetalle($resul,$respuesta[0]['ID'],$tipo_temp[$k]['IDTIPO'],1,$items_temp[$m]['IDITEM']);
								}
							}elseif($tipo_temp[$k]['SUBTIPO']==1){
									$subtipo_temp = $this->_modelobancoSangre->ListarBancoSangreSubTipoM($tipo_temp[$k]['IDTIPO']);
								for ($n=0; $n < count($subtipo_temp); $n++) 
								{
									$items_temp = $this->_modelobancoSangre->ListarBancoSangreItemsM($cab_temp[$j+1]['IDCABECERA']);
									for ($p=0; $p < count($items_temp); $p++)
									{
										$valor = $items_temp[$p]['IDITEM']."_".$subtipo_temp[$n]['IDSUBTIPO']."_2";
										$resul = $_POST[$valor];
										$this->_modelobancoSangre->InsertarBancoSangreDetalle($resul,$respuesta[0]['ID'],$tipo_temp[$k]['IDTIPO'],$subtipo_temp[$n]['IDSUBTIPO'],$items_temp[$p]['IDITEM']);
									}
								}	
							}
						}
					}	
				}
					
				#exit();

				//$this->header("Refresh:0");	
				//$this->GenerarInformeBS($idestablecimiento,$anio,$mes);
				$this->_vista->mensajeAlerta = "Evaluación ingresada con Éxito!!";
				$this->banSangre();
			}
			else {
				$this->_vista->mensajeAlerta = "Hubo un error al registrar, intentelo nuevamente";
				$this->banSangre();
			}}	
		}

		public function banSangre()	
		{
			Sesion::accesos('logueado');

			$fecha=date('Y-m-d');
			$hora=date('H:i:s');

			$html2 .= "<form action='" . BASE_URL . 'informes' . DS . 'generarBancoSangre' . "' method='post'>";
				$html2 .= "<input type='hidden' name='idEstablecimientoGrabar'>";
			//$html2 .= "<input type='hidden' name='NombreEstablecimientoGrabar'>";
			//$html2 .= "<input type='hidden' name='JefeBancoGrabar'>";

				$html2 .= "<div class='row'>";
					$html2 .= "<div class='col-md-3 col-sm-12 col-xs-12' style='margin-bottom: 1%;'>";
						$html2 .= "<div class='ui-widget col-md-7 col-sm-12 col-xs-12' style='margin-bottom: 1%;margin-left:-15px;'>";
							$html2 .= "<div class='input-group'>";
								$html2 .= "<label>MES:</label>";
								$html2 .= "<input type='hidden' class='form-control' name='fechabs' id='fechabs' value='".$fecha."''>";
								$html2 .= "<input type='hidden' class='form-control' name='horabs' id='horabs' value='".$hora."'>";
							$html2 .= "</div>";
						$html2 .= "</div>";
						$html2 .= "<div class='ui-widget col-md-5 col-sm-12 col-xs-12' style='margin-bottom: 1%;margin-left:-15px;'>";
							$html2 .= "<div class='input-group'>";
								$html2 .= "<label>AÑO:</label>";
							$html2 .= "</div>";
						$html2 .= "</div>";
					$html2 .= "</div>";
					$html2 .= "<div class='col-md-2 col-sm-12 col-xs-12' style='margin-bottom: 1%;'>";
						$html2 .= "<div class='ui-widget'>";
							$html2 .= "<div class='input-group'>";
								$html2 .= "<label>JEFE BANCO DE SANGRE:</label>";
							$html2 .= "</div>";
						$html2 .= "</div>";
					$html2 .= "</div>";

					$html2 .= "<div class='col-md-2	 col-sm-12 col-xs-12' style='margin-bottom: 1%;'>";
						$html2 .= "<div class='ui-widget'>";
							$html2 .= "<div class='input-group'>";
								$html2 .= "<label>CORREO:</label>";
							$html2 .= "</div>";
						$html2 .= "</div>";
					$html2 .= "</div>";
					$html2 .= "<div class='col-md-2 col-sm-12 col-xs-12' style='margin-bottom: 1%;'>";
						$html2 .= "<div class='ui-widget'>";
							$html2 .= "<div class='input-group'>";
								$html2 .= "<label>TELEFONO:</label>";
							$html2 .= "</div>";
						$html2 .= "</div>";
					$html2 .= "</div>";	
					$html2 .= "<div class='col-md-2 col-sm-12 col-xs-12' style='margin-bottom: 1%;'>";
						$html2 .= "<div class='ui-widget'>";
							$html2 .= "<div class='input-group'>";
								$html2 .= "<div class='input-group'>";
									$html2 .= "<label>DISA:</label>";
								$html2 .= "</div>";
							$html2 .= "</div>";
						$html2 .= "</div>";
					$html2 .= "</div>";
				$html2 .= "</div>";
				$html2 .= "<div class='row'>";
					$html2 .= "<div class='col-md-3 col-sm-12 col-xs-12' style='margin-bottom: 1%;'>";
						$html2 .= "<div class='ui-widget col-md-7 col-sm-12 col-xs-12' style='margin-bottom: 1%;margin-left:-15px;'>";
							$html2 .= "<div class='input-group'>";
								$html2 .= "<select class='form-control' id='mes' name='mes' data-live-search='true' required>";
									$html2 .= "<option value='1'>Enero</option>";
									$html2 .= "<option value='2'>Febrero</option>";
									$html2 .= "<option value='3'>Marzo</option>";
									$html2 .= "<option value='4'>Abril</option>";
									$html2 .= "<option value='5'>Mayo</option>";
									$html2 .= "<option value='6'>Junio</option>";
									$html2 .= "<option value='7'>Julio</option>";
									$html2 .= "<option value='8'>Agosto</option>";
									$html2 .= "<option value='9'>Setiembre</option>";
									$html2 .= "<option value='10'>Octubre</option>";
									$html2 .= "<option value='11'>Noviembre</option>";
									$html2 .= "<option value='12'>Diciembre</option>";
								$html2 .= "</select>";
							$html2 .= "</div>";
						$html2 .= "</div>";
						$html2 .= "<div class='ui-widget col-md-5 col-sm-12 col-xs-12' style='margin-bottom: 1%;margin-left:-15px;'>";
							$html2 .= "<div class='input-group'>";
								$html2 .= "<input type='number' class='form-control' id='anio' name='anio' size='10' placeholder='Año' min='2015' max='2099' required>";
						  	$html2 .= "</div>";
						$html2 .= "</div>";
					$html2 .= "</div>";
					$html2 .= "<div class='col-md-2 col-sm-12 col-xs-12' style='margin-bottom: 1%;'>";
						$html2 .= "<div class='ui-widget'>";
							$html2 .= "<div class='input-group'>";
								$html2 .= "<input type='text' class='form-control' placeholder='JEFE BANCO DE SANGRE' name='JefeBancoGrabar' id='responsableBS' aria-describedby='sizing-addon2' autofocus>";
							$html2 .= "</div>";
						$html2 .= "</div>";
					$html2 .= "</div>";

					$html2 .= "<div class='col-md-2	 col-sm-12 col-xs-12' style='margin-bottom: 1%;'>";
						$html2 .= "<div class='ui-widget'>";
							$html2 .= "<div class='input-group'>";
								$html2 .= "<input type='email' class='form-control' placeholder='CORREO' name='CorreoBS' aria-describedby='sizing-addon2' autofocus>";
							$html2 .= "</div>";
						$html2 .= "</div>";
					$html2 .= "</div>";
					$html2 .= "<div class='col-md-2 col-sm-12 col-xs-12' style='margin-bottom: 1%;'>";
						$html2 .= "<div class='ui-widget'>";
							$html2 .= "<div class='input-group'>";
								$html2 .= "<input type='text' class='form-control' placeholder='TELEFONO' id='TelefonoBS' name='TelefonoBS' aria-describedby='sizing-addon2' autofocus>";
							$html2 .= "</div>";
						$html2 .= "</div>";
					$html2 .= "</div>";	
					$html2 .= "<div class='col-md-2 col-sm-12 col-xs-12' style='margin-bottom: 1%;'>";
						$html2 .= "<div class='ui-widget'>";
							$html2 .= "<div class='input-group'>";
								$html2 .= "<input type='text' class='form-control' placeholder='DISA' id='DISABS' name='DISABS' aria-describedby='sizing-addon2' autofocus readonly>";
								$html2 .= "<input type='hidden' class='form-control' id='UDRMBS' name='UDRMBS' aria-describedby='sizing-addon2'>";
							$html2 .= "</div>";
						$html2 .= "</div>";
					$html2 .= "</div>";
				$html2 .= "</div>";

				$html2 .= "<div class='row'>";
					$html2 .= "<div class='col-md-3 col-sm-12 col-xs-12' style='margin-bottom: 1%;'>";
						$html2 .= "<div class='ui-widget'>";
							$html2 .= "<div class='input-group'>";
								$html2 .= "<label for='hemoterapia'>CENTRO DE HEMOTERAPIA:</label>";
							$html2 .= "</div>";
						$html2 .= "</div>";
					$html2 .= "</div>";
					$html2 .= "<div class='col-md-5 col-sm-12 col-xs-12' style='margin-bottom: 1%;'>";
						$html2 .= "<div class='ui-widget'>";
							$html2 .= "<div class='input-group'>";
								$hemoterapa_temp = $this->_modelobancoSangre->ListarBancoSangreHemoterapiaM();
								for ($i=0; $i < count($hemoterapa_temp); $i++){
									$html2 .= "<label class='form-check-inline'>
													  <input class='form-check-input' type='radio' name='hemoterapiaBS' id='hemoterapiaBS' value='".$hemoterapa_temp[$i]['IDHEMOTERAPIA']."'>".$hemoterapa_temp[$i]['NOMBRE']."
													</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
								}
							$html2 .= "</div>";
						$html2 .= "</div>";
					$html2 .= "</div>	";
				$html2 .= "</div>";
				$html2 .= "<div class='row'>";
					$html2 .= "<div class='col-md-3 col-sm-12 col-xs-12' style='margin-bottom: 1%;'>";
						$html2 .= "<div class='ui-widget'>";
							$html2 .= "<div class='input-group'>";
								$html2 .= "<label for='hemoterapia'>SECTOR:</label>";
							$html2 .= "</div>";
						$html2 .= "</div>";
					$html2 .= "</div>";
					$html2 .= "<div class='col-md-5 col-sm-12 col-xs-12' style='margin-bottom: 1%;'>";
						$html2 .= "<div class='ui-widget'>";
							$html2 .= "<div class='input-group'>";
								$sector_temp = $this->_modelobancoSangre->ListarBancoSangreSectorM();
								for ($i=0; $i < count($sector_temp); $i++){
									$html2 .= "<label class='form-check-inline'>
													  <input class='form-check-input' type='radio' name='sectorBS' id='sectorBS' value='".$sector_temp[$i]['IDSECTOR']."'>".$sector_temp[$i]['NOMBRE']."
													</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
								}
							$html2 .= "</div>";
						$html2 .= "</div>";
					$html2 .= "</div>	";
				$html2 .= "</div>";


				$html2.="<div name='tipo1' id='tipo1' class='tipo1'>";

						$html2.="<div class='small col-md-12'>";
							$html2.="<ul class='nav nav-tabs nav-justified'>";
								$html2.="<li class='active col-md-2'><a href='#pagina1' data-toggle='tab'>CONDICIÓN DEL POSTULANTE</a></li>";
								$html2.="<li class='col-md-2'><a href='#pagina2' data-toggle='tab'>MUESTRAS EVALUADAS</a></li>";
								$html2.="<li class='col-md-2'><a href='#pagina3' data-toggle='tab'>REACTIVIDAD DE MUESTRAS SEGÚN TIPO DE POSTULANTE</a></li>";
								$html2.="<li class='col-md-1'><a href='#pagina4' data-toggle='tab'>UNIDADES APTAS</a></li>";
								$html2.="<li class='col-md-2'><a href='#pagina5' data-toggle='tab'>DESTINO DE UNIDADES APTAS</a></li>";
								$html2.="<li class='col-md-3'><a href='#pagina6' data-toggle='tab'>N° DE UNIDADES SOLICITADAS Y DESPACHADAS SEGÚN SOLICITUD TRANSFUSIONAL</a></li>";
								$html2.="<li class='col-md-2'><a href='#pagina7' data-toggle='tab'>CAUSAS DE ELIMINACIÓN DE UNIDADES DE SANGRE TOTAL Y PAQUETES GLOBULARES</a></li>";
							$html2.="</ul>";
						$html2.="</div>";	
						$html2 .= "<div class='row  tab-content'>";
							$cab_temp = $this->_modelobancoSangre->ListarBancoSangreCabM();
							for ($i=0; $i < 16; $i=$i+2)
							{
								$tipo_temp = $this->_modelobancoSangre->ListarBancoSangreTipoM($cab_temp[$i+1]['IDCABECERA']);
								if ($i==0) {$html2 .= "<div class='col-md-10 col-md-offset-1 col-sm-12 col-xs-12 small tab-pane fade in active' id='pagina1'>";}
								if ($i==2) {$html2 .= "<div class='col-md-10 col-md-offset-1 col-sm-12 col-xs-12 small tab-pane fade in' id='pagina2'>";}
								if ($i==4) {$html2 .= "<div class='col-md-10 col-md-offset-1 col-sm-12 col-xs-12 small tab-pane fade in' id='pagina3'>";}
								if ($i==6) {$html2 .= "<div class='col-md-12 col-sm-12 col-xs-12 small tab-pane fade in' id='pagina4'>";}
								if ($i==8) {$html2 .= "<div class='col-md-12 col-sm-12 col-xs-12 small tab-pane fade in' id='pagina5'>";}
								if ($i==10) {$html2 .= "<div class='col-md-10 col-md-offset-1 col-sm-12 col-xs-12 small tab-pane fade in' id='pagina6'>";}
								if ($i==12) {$html2 .= "<div class='col-md-10 col-md-offset-1 col-sm-12 col-xs-12 small tab-pane fade in' id='pagina7'>";}
								$html2.="</br>";	
								$html2 .= "<div class='panel panel-default small table-responsive '>";
									$html2 .= "<table class='table table-bordered table-condensed' style='text-align: left;'>";
										$html2 .= "<tr class='info'>";
											if($cab_temp[$i]['IDCABECERA']==13)
											{
												$html2 .= "<th rowspan='3'  style='vertical-align:middle;text-align:center;'>";
												$html2 .= $cab_temp[$i]['NOMBRE'];
												$html2 .= "</th>";
												$html2 .= "<th colspan='8' style='vertical-align:middle;text-align:center' width='10%'>";
												$html2 .= $cab_temp[$i+1]['NOMBRE'];
												$html2 .= "</th>";
											}elseif (count($tipo_temp)==10) {
												$html2 .= 	"<th rowspan='3'  style='vertical-align:middle;text-align:center;'>";
												$html2 .= $cab_temp[$i]['NOMBRE'];
												$html2 .= "</th>";
												$html2 .= "<th colspan='20' style='vertical-align:middle;text-align:center' width='10%'>";
												$html2 .= $cab_temp[$i+1]['NOMBRE'];
												$html2 .= "</th>";
											}else{
												$html2 .= 	"<th rowspan='2'  style='vertical-align:middle;text-align:center;'>";
												$html2 .= $cab_temp[$i]['NOMBRE'];
												$html2 .= "</th>";
												$html2 .= "<th colspan='".count($tipo_temp)."' style='vertical-align:middle;text-align:center' width='50%'>";
												$html2 .= $cab_temp[$i+1]['NOMBRE'];
												$html2 .= "</th>";
											}
										$html2 .= "</tr>";
										$html2 .= "<tr class='info'>";
											for ($j=0; $j < count($tipo_temp); $j++) { 
												if (count($tipo_temp)==10||$cab_temp[$i]['IDCABECERA']==13) {$html2 .= "<td colspan='2' style='vertical-align:middle;text-align:center;'><b>";}else{$html2 .= "<td style='vertical-align:middle;text-align:center;'><b>";}		
												$html2 .= $tipo_temp[$j]['NOMBRE'];
												$html2 .= "</b></td>";
											}
												
										$html2 .= "</tr>";
										if (count($tipo_temp)==10||$cab_temp[$i]['IDCABECERA']==13) 
										{
											$html2 .= "<tr class='info' style='vertical-align:middle;text-align:center;'>";
											for ($k=0; $k < count($tipo_temp); $k++) 
											{
												$subtipo_temp = $this->_modelobancoSangre->ListarBancoSangreSubTipoM($tipo_temp[$k]['IDTIPO']);
												for ($l=0; $l < count($subtipo_temp); $l++) 
												{
													$html2 .= "<td><b>";
													$html2 .= $subtipo_temp[$l]['NOMBRE'];
													$html2 .= "</b></td>";		
												}
											}
											$html2 .= "</tr>";
										}
										$items_temp = $this->_modelobancoSangre->ListarBancoSangreItemsM($cab_temp[$i+1]['IDCABECERA']);
										if($cab_temp[$i]['IDCABECERA']==13)
										{
											for ($s=0; $s < count($items_temp); $s++)
											{
												$html2 .= "<td style='vertical-align:middle;text-align:center;' width='10%;''>";
													$html2 .= $items_temp[$s]['IDITEM'].'.'.$items_temp[$s]['NOMBRE'];
												$html2 .= "</td>";
												for ($t=0; $t < count($tipo_temp); $t++) 
												{
													$subtipo_temp = $this->_modelobancoSangre->ListarBancoSangreSubTipoM($tipo_temp[$t]['IDTIPO']);
													for ($u=0; $u < count($subtipo_temp); $u++) 
													{
														$html2 .= "<td>";
																$html2 .= "<div class='form-group'>";
																	$html2 .= "<input type='text' class='form-control' name='".$items_temp[$s]['IDITEM']."_".$subtipo_temp[$u]['IDSUBTIPO']."'  id='".$items_temp[$s]['IDITEM']."_".$subtipo_temp[$u]['IDSUBTIPO']."'>";
																$html2 .= "</div>";
														$html2 .= "</td>";
														}
												}	
												$html2 .= "</tr>";
											}
										}elseif (count($tipo_temp)!=10) {
											for ($m=0; $m < count($items_temp); $m++)
											{
												$html2 .= "<td style='vertical-align:middle;text-align:center;' width='50%'>";
													$html2 .= $items_temp[$m]['IDITEM'].'. '.$items_temp[$m]['NOMBRE'];
												$html2 .= "</td>";
												for ($n=0; $n < count($tipo_temp); $n++) 
												{ 
													$html2 .= "<td style='vertical-align:middle;text-align:center;' size='1'>";
														$html2 .= "<div class='form-group'>";
																if($items_temp[$m]['IDITEM']==201 || $items_temp[$m]['IDITEM']==301 || $items_temp[$m]['IDITEM']==501)
																{
																	$html2 .= "<input type='text' class='form-control' id='".$items_temp[$m]['IDITEM']."_".$tipo_temp[$n]['IDTIPO']."' name='".$items_temp[$m]['IDITEM']."_".$tipo_temp[$n]['IDTIPO']."' readonly>";
																}
																else
																{
																	$html2 .= "<input type='text' class='form-control' id='".$items_temp[$m]['IDITEM']."_".$tipo_temp[$n]['IDTIPO']."' name='".$items_temp[$m]['IDITEM']."_".$tipo_temp[$n]['IDTIPO']."'>";
																}
														$html2 .= "</div>";
													$html2 .= "</td>";	
												} 	
												$html2 .= "</tr>";
											}
										}else
										{
											for ($o=0; $o < count($items_temp); $o++)
											{
												$html2 .= "<td style='vertical-align:middle;text-align:center;' width='10%;''>";
													$html2 .= $items_temp[$o]['IDITEM'].'.'.$items_temp[$o]['NOMBRE'];
												$html2 .= "</td>";
												for ($q=0; $q < count($tipo_temp); $q++) 
												{
													$subtipo_temp = $this->_modelobancoSangre->ListarBancoSangreSubTipoM($tipo_temp[$q]['IDTIPO']);
													for ($p=0; $p < count($subtipo_temp); $p++) 
													{
														$html2 .= "<td>";
															$html2 .= "<div class='form-group'>";
																if ($subtipo_temp[$p]['IDSUBTIPO']==1 || $subtipo_temp[$p]['IDSUBTIPO']==3 || $subtipo_temp[$p]['IDSUBTIPO']==5 || $subtipo_temp[$p]['IDSUBTIPO']==7 || $subtipo_temp[$p]['IDSUBTIPO']==9 || $subtipo_temp[$p]['IDSUBTIPO']==11 || $subtipo_temp[$p]['IDSUBTIPO']==13 || $subtipo_temp[$p]['IDSUBTIPO']==15 || $subtipo_temp[$p]['IDSUBTIPO']==17 || $subtipo_temp[$p]['IDSUBTIPO']==19) 
																{
																	$html2 .= "<input type='text' class='form-control' name='".$items_temp[$o]['IDITEM']."_".$subtipo_temp[$p]['IDSUBTIPO']."'  id='".$items_temp[$o]['IDITEM']."_".$subtipo_temp[$p]['IDSUBTIPO']."' readonly>";
																}else
																{
																	$html2 .= "<input type='text' class='form-control' name='".$items_temp[$o]['IDITEM']."_".$subtipo_temp[$p]['IDSUBTIPO']."'  id='".$items_temp[$o]['IDITEM']."_".$subtipo_temp[$p]['IDSUBTIPO']."'>";
																}
																$html2 .= "</div>";
														$html2 .= "</td>";
													}
												}	
												$html2 .= "</tr>";
											}
										}
										$html2 .= "</tr>";
									$html2 .= "</table>";

								/*	$html2 .= "<div class='panel-body'>";
									$html2 .= "HOLA";
									$html2 .= "</div>";*/
									$html2 .= "<div class='table-responsive'>";
								  		$html2 .= "<table class='table table-bordered' style='text-align: left;'>";
								  		$html2 .= "</table>";		
								  	$html2 .= "</div>";
								$html2 .= "</div>";
								if ($i==12) 
								{
									$html2 .= "<div class='row'>";
									$html2 .= "<div class ='col-md-4 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-12'>";
										$html2 .= "<button class='btn btn-primary'>Guardar</button>&nbsp;&nbsp;&nbsp;";
										$html2 .= "<button type='button' class='btn btn-danger' id='exportarReporteBS'>Imprimir</button>&nbsp;&nbsp;&nbsp;";
										$html2 .= "<button type='button' class='btn btn-success' id='vistaPrevia'>Vista Previa</button>";
									$html2 .= "</div>";
								$html2 .= "</div>";
								}
							  	
								$html2 .= "</div>";
							}
				$html2.="</div>";
				$html2.="<div name='tipo2' id='tipo2' class='tipo2'>";

						$html2.="<div class='small col-md-12'>";
							$html2.="<ul class='nav nav-tabs'>";
								$html2.="<li class='active col-md-2'><a href='#pagina8' data-toggle='tab'>N° DE UNIDADES SOLICITADAS Y DESPACHADAS SEGÚN SOLICITUD TRANSFUSIONAL</a></li>";
								$html2.="<li class='col-md-2'><a href='#pagina9' data-toggle='tab'>CAUSAS DE ELIMINACIÓN DE UNIDADES DE SANGRE TOTAL Y PAQUETES GLOBULARES</a></li>";
							$html2.="</ul>";
						$html2.="</div>";	
						$html2 .= "<div class='row  tab-content'>";
							$cab_temp = $this->_modelobancoSangre->ListarBancoSangreCabM();
							for ($i=10; $i < 14; $i=$i+2)
							{
								$tipo_temp = $this->_modelobancoSangre->ListarBancoSangreTipoM($cab_temp[$i+1]['IDCABECERA']);
								if ($i==10) {$html2 .= "<div class='col-md-10 col-md-offset-1 col-sm-12 col-xs-12 small tab-pane fade in active' id='pagina8'>";}
								if ($i==12) {$html2 .= "<div class='col-md-10 col-md-offset-1 col-sm-12 col-xs-12 small tab-pane fade in' id='pagina9'>";}
								$html2.="</br>";	
								$html2 .= "<div class='panel panel-default small table-responsive '>";
									$html2 .= "<table class='table table-bordered table-condensed' style='text-align: left;'>";
										$html2 .= "<tr class='info'>";
											if($cab_temp[$i]['IDCABECERA']==13)
											{
												$html2 .= "<th rowspan='3'  style='vertical-align:middle;text-align:center;'>";
												$html2 .= $cab_temp[$i]['NOMBRE'];
												$html2 .= "</th>";
												$html2 .= "<th colspan='8' style='vertical-align:middle;text-align:center' width='10%'>";
												$html2 .= $cab_temp[$i+1]['NOMBRE'];
												$html2 .= "</th>";
											}else{
												$html2 .= 	"<th rowspan='2'  style='vertical-align:middle;text-align:center;'>";
												$html2 .= $cab_temp[$i]['NOMBRE'];
												$html2 .= "</th>";
												$html2 .= "<th colspan='".count($tipo_temp)."' style='vertical-align:middle;text-align:center' width='50%'>";
												$html2 .= $cab_temp[$i+1]['NOMBRE'];
												$html2 .= "</th>";
											}
										$html2 .= "</tr>";
										$html2 .= "<tr class='info'>";
											for ($j=0; $j < count($tipo_temp); $j++) { 
												if (count($tipo_temp)==10||$cab_temp[$i]['IDCABECERA']==13) {$html2 .= "<td colspan='2' style='vertical-align:middle;text-align:center;'><b>";}else{$html2 .= "<td style='vertical-align:middle;text-align:center;'><b>";}		
												$html2 .= $tipo_temp[$j]['NOMBRE'];
												$html2 .= "</b></td>";
											}
												
										$html2 .= "</tr>";
										if (count($tipo_temp)==10||$cab_temp[$i]['IDCABECERA']==13) 
										{
											$html2 .= "<tr class='info' style='vertical-align:middle;text-align:center;'>";
											for ($k=0; $k < count($tipo_temp); $k++) 
											{
												$subtipo_temp = $this->_modelobancoSangre->ListarBancoSangreSubTipoM($tipo_temp[$k]['IDTIPO']);
												for ($l=0; $l < count($subtipo_temp); $l++) 
												{
													$html2 .= "<td><b>";
													$html2 .= $subtipo_temp[$l]['NOMBRE'];
													$html2 .= "</b></td>";		
												}
											}
											$html2 .= "</tr>";
										}
										$items_temp = $this->_modelobancoSangre->ListarBancoSangreItemsM($cab_temp[$i+1]['IDCABECERA']);
										if($cab_temp[$i]['IDCABECERA']==13)
										{
											for ($s=0; $s < count($items_temp); $s++)
											{
												$html2 .= "<td style='vertical-align:middle;text-align:center;' width='10%;''>";
													$html2 .= $items_temp[$s]['IDITEM'].'.'.$items_temp[$s]['NOMBRE'];
												$html2 .= "</td>";
												for ($t=0; $t < count($tipo_temp); $t++) 
												{
													$subtipo_temp = $this->_modelobancoSangre->ListarBancoSangreSubTipoM($tipo_temp[$t]['IDTIPO']);
													for ($u=0; $u < count($subtipo_temp); $u++) 
													{
														$html2 .= "<td>";
																$html2 .= "<div class='form-group'>";
																	$html2 .= "<input type='text' class='form-control' name='".$items_temp[$s]['IDITEM']."_".$subtipo_temp[$u]['IDSUBTIPO']."_2'  id='".$items_temp[$s]['IDITEM']."_".$subtipo_temp[$u]['IDSUBTIPO']."_2'>";
																$html2 .= "</div>";
														$html2 .= "</td>";
														}
												}	
												$html2 .= "</tr>";
											}
										}elseif (count($tipo_temp)!=10) {
											for ($m=0; $m < count($items_temp); $m++)
											{
												$html2 .= "<td style='vertical-align:middle;text-align:center;' width='50%'>";
													$html2 .= $items_temp[$m]['IDITEM'].'. '.$items_temp[$m]['NOMBRE'];
												$html2 .= "</td>";
												for ($n=0; $n < count($tipo_temp); $n++) 
												{ 
													$html2 .= "<td style='vertical-align:middle;text-align:center;' size='1'>";
														$html2 .= "<div class='form-group'>";
																	$html2 .= "<input type='text' class='form-control' id='".$items_temp[$m]['IDITEM']."_".$tipo_temp[$n]['IDTIPO']."_2' name='".$items_temp[$m]['IDITEM']."_".$tipo_temp[$n]['IDTIPO']."_2'>";
														$html2 .= "</div>";
													$html2 .= "</td>";	
												} 	
												$html2 .= "</tr>";
											}
										}
										$html2 .= "</tr>";
									$html2 .= "</table>";

								/*	$html2 .= "<div class='panel-body'>";
									$html2 .= "HOLA";
									$html2 .= "</div>";*/
									$html2 .= "<div class='table-responsive'>";
								  		$html2 .= "<table class='table table-bordered' style='text-align: left;'>";
								  		$html2 .= "</table>";		
								  	$html2 .= "</div>";
								$html2 .= "</div>";
								if ($i==12) 
								{
									$html2 .= "<div class='row'>";
									$html2 .= "<div class ='col-md-4 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-12'>";
										$html2 .= "<button class='btn btn-primary'>Guardar</button>&nbsp;&nbsp;&nbsp;";
										$html2 .= "<button type='button' class='btn btn-danger' id='exportarReporteBS1'>Imprimir</button>&nbsp;&nbsp;&nbsp;";
										$html2 .= "<button type='button' class='btn btn-success' id='vistaPrevia1'>Vista Previa</button>";
									$html2 .= "</div>";
								$html2 .= "</div>";
								}
							  	
								$html2 .= "</div>";
							}
				$html2.="</div>";
			$html2 .= "</div>";
			$html2 .= "</div>";
			$html2 .= "</form>";

		
			$this->_vista->cuerpoBS = $html2;


			$this->_vista->breadcrumb = $this->breadcrumbVista('Informes','Banco de Sangre');
			$this->_vista->tituloGeneral = "Banco de Sangre";
			$this->_vista->construirVista('informes','bancoSangre');
		}
		
		//UNIDADES ALMCAENADAS FUNCIONES
		public function UnidadesAlmacenadas()
		{
			Sesion::accesos('logueado');

			$SangreTipo = $this->_modelobancoSangre->ListarBancoSangreTipoSangreM();

			$html.="<div class='panel panel-default small table-responsive'>";
				$html.="<table class='table table-bordered table-condensed' style='text-align: left;'>";
					$html.="<tr class='info'>";
					for($i=0;$i<count($SangreTipo);$i++)
					{
						$html.="<th style='vertical-align:middle;text-align:center;'>";
							$html.=$SangreTipo[$i]['TIPO'];
						$html.="</th>";
					}
					$html.="</tr>";
					$html.="<tr>";
					for($i=0;$i<count($SangreTipo);$i++)
					{
						$html.="<td>";
							$html.="<input type='text' class='form-control' id='".$SangreTipo[$i]['ID']."' name='".$SangreTipo[$i]['ID']."'>";
						$html.="</td>";
					}
					$html.="</tr>";
				$html.="</table>";
			$html.="</div>";

			$this->_vista->cuerpoUA = $html;

			$this->_vista->breadcrumb = $this->breadcrumbVista('Informes','Unidades Almacenadas');
			$this->_vista->tituloGeneral = "Unidades Almacenadas";
			$this->_vista->construirVista('informes','UnidadesAlmacenadas');		
		}

		public function generarUnidadesAlmacenadas()
		{
			$idEstablecimiento1		= $this->obtenerDatosCadena('buscarID');
			$idEstablecimiento2		= $this->obtenerDatosCadena('pruebaID');
			$fecha 					= $this->obtenerDatosCadena('fecha1');
			$hora 					= $this->obtenerDatosCadena('hora1');
			$sector 				= $this->obtenerDatosCadena('sector');
			$hemocomponente 	    = $this->obtenerDatosCadena('hemocomponente');
			$Omas					= $this->obtenerDatosCadena('1');
			$Omenos					= $this->obtenerDatosCadena('2');
			$Amas  					= $this->obtenerDatosCadena('3');
			$Amenos 				= $this->obtenerDatosCadena('4');
			$Bmas    				= $this->obtenerDatosCadena('5');
			$Bmenos 				= $this->obtenerDatosCadena('6');
			$ABmas 					= $this->obtenerDatosCadena('7');	
			$ABmenos 				= $this->obtenerDatosCadena('8');
			

			if($idEstablecimiento1!=null)
			{
				$repetido = $this->_modelobancoSangre->UnidadesAlmacenadasBuscarM($idEstablecimiento1,$fecha,$hemocomponente);	
				if(count($repetido)==0){
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarCabecerabM($idEstablecimiento1,$fecha,$hora,$sector,$hemocomponente);
					//INGRESAR DETALLES
					$idunidalm = $this->_modelobancoSangre->UnidadesAlmacenadasBuscarM($idEstablecimiento1,$fecha,$hemocomponente);	
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarDetallebM($idunidalm[0]['idUnidAlmDoc'],$Omas,1);
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarDetallebM($idunidalm[0]['idUnidAlmDoc'],$Omenos,2);
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarDetallebM($idunidalm[0]['idUnidAlmDoc'],$Amas,3);
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarDetallebM($idunidalm[0]['idUnidAlmDoc'],$Amenos,4);
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarDetallebM($idunidalm[0]['idUnidAlmDoc'],$Bmas,5);
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarDetallebM($idunidalm[0]['idUnidAlmDoc'],$Bmenos,6);
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarDetallebM($idunidalm[0]['idUnidAlmDoc'],$ABmas,7);
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarDetallebM($idunidalm[0]['idUnidAlmDoc'],$ABmenos,8);

					echo json_encode('Guardado con Exito');	
				}
				else
				{
					echo json_encode('Ya se ingreso reporte para el dia de hoy en este establecimiento');								
				}
			}
			elseif($idEstablecimiento2!=null)
			{
				$repetido = $this->_modelobancoSangre->UnidadesAlmacenadasBuscarM($idEstablecimiento2,$fecha,$hemocomponente);	
				if(count($repetido)==0){
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarCabecerabM($idEstablecimiento2,$fecha,$hora,$sector,$hemocomponente);
					//INGRESAR DETALLES
					$idunidalm = $this->_modelobancoSangre->UnidadesAlmacenadasBuscarM($idEstablecimiento2,$fecha,$hemocomponente);	
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarDetallebM($idunidalm[0]['idUnidAlmDoc'],$Omas,1);
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarDetallebM($idunidalm[0]['idUnidAlmDoc'],$Omenos,2);
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarDetallebM($idunidalm[0]['idUnidAlmDoc'],$Amas,3);
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarDetallebM($idunidalm[0]['idUnidAlmDoc'],$Amenos,4);
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarDetallebM($idunidalm[0]['idUnidAlmDoc'],$Bmas,5);
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarDetallebM($idunidalm[0]['idUnidAlmDoc'],$Bmenos,6);
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarDetallebM($idunidalm[0]['idUnidAlmDoc'],$ABmas,7);
					$this->_modelobancoSangre->UnidadesAlmacenadasInsertarDetallebM($idunidalm[0]['idUnidAlmDoc'],$ABmenos,8);

					echo json_encode('Guardado con Exito');	
				}
				else
				{
					echo json_encode('Ya se ingreso reporte para el dia de hoy en este establecimiento');								
				}
			}
		}

		public function crearOpcionesHemocomponente()
		{
			$hemocomponente = $this->_modelobancoSangre->ListarBancoSangreHemocomponenteM();

			$html = "<option  value='5'><center>-- HEMOCOMPONENTE --</center></option>";
			
			for ($i=0; $i < count($hemocomponente); $i++) { 
				$html .= "<option value='" . $hemocomponente[$i]['ID'] . "'>" . $hemocomponente[$i]['HEMO'] . "</option>";
			}

			echo json_encode($html);
		}
		
		public function BusquedaDeInstitucion()
		{
			$respuesta = $this->_modelobancoSangre->BuscarInstitucionxNombre($parametro = $_GET['term']);
			for ($i=0; $i < count($respuesta); $i++) { 
				$piscinas[$i] = array(
						'idestablecimiento' 	=> $respuesta[$i]['IDRENAES'],
						'Nombre' 				=> $respuesta[$i]['NOMBRE'],
						'Direccion' 			=> $respuesta[$i]['DIRECCION'],
						'Distrito' 				=> $respuesta[$i]['DISTRITO'],
						'Responsable' 	        => $respuesta[$i]['RESPONSABLE'],
						'Telefono'				=> $respuesta[$i]['TELEFONO'],
						'Disa'					=> $respuesta[$i]['DISA'],
						'udrm'					=> $respuesta[$i]['UDRM'],
						'Correo'				=> $respuesta[$i]['CORREO'],
						'Hemoterapia'			=> $respuesta[$i]['HEMOTERAPIA'],
						'Sector'				=> $respuesta[$i]['SECTOR'],
						'Usuario'               => $respuesta[$i]['USUARIO']
					);	
			}

			echo json_encode($piscinas);
		}

		public function BusquedaDeInstitucionxId()
		{
			$respuesta = $this->_modelobancoSangre->BuscarInstitucionxIdRenaes($parametro = $_GET['term']);
			for ($i=0; $i < count($respuesta); $i++) { 
				$piscinas[$i] = array(
						'idestablecimiento' 	=> $respuesta[$i]['IDRENAES'],
						'Nombre' 				=> $respuesta[$i]['NOMBRE'],
						'Direccion' 			=> $respuesta[$i]['DIRECCION'],
						'Distrito' 				=> $respuesta[$i]['DISTRITO'],
						'Responsable' 	        => $respuesta[$i]['RESPONSABLE'],
						'Telefono'				=> $respuesta[$i]['TELEFONO'],
						'Disa'					=> $respuesta[$i]['DISA'],
						'udrm'					=> $respuesta[$i]['UDRM'],
						'Correo'				=> $respuesta[$i]['CORREO'],
						'Hemoterapia'			=> $respuesta[$i]['HEMOTERAPIA'],
						'Sector'				=> $respuesta[$i]['SECTOR']
					);	
			}

			echo json_encode($piscinas);
		}

		public function GenerarInformeBS($renaes,$anio,$mes)
		{
			$listar = $this->_modelobancoSangre->BancoSangreBuscarReporteM($renaes,$anio,$mes);
			if($listar==NULL){
				$this->_vista->mensajeAlerta = "Reporte aun no ingresado!!";
				$this->banSangre();
			}else{
			$cabecera = $this->_modelobancoSangre->ListarBancoSangreCabM();
			$tipo1 = $this->_modelobancoSangre->ListarBancoSangreTipoM(2);
			$tipo2 = $this->_modelobancoSangre->ListarBancoSangreTipoM(4);
			$tipo3 = $this->_modelobancoSangre->ListarBancoSangreTipoM(6);
			$tipo4 = $this->_modelobancoSangre->ListarBancoSangreTipoM(8);
			$tipo5 = $this->_modelobancoSangre->ListarBancoSangreTipoM(10);
			$tipo6 = $this->_modelobancoSangre->ListarBancoSangreTipoM(12);
			$tipo7 = $this->_modelobancoSangre->ListarBancoSangreTipoM(14);
			$item1 = $this->_modelobancoSangre->ListarBancoSangreItemsM(2);
			$item2 = $this->_modelobancoSangre->ListarBancoSangreItemsM(4);
			$item3 = $this->_modelobancoSangre->ListarBancoSangreItemsM(6);
			$item4 = $this->_modelobancoSangre->ListarBancoSangreItemsM(8);
			$item5 = $this->_modelobancoSangre->ListarBancoSangreItemsM(10);
			$item6 = $this->_modelobancoSangre->ListarBancoSangreItemsM(12);
			$item7 = $this->_modelobancoSangre->ListarBancoSangreItemsM(14);
			$subtipo1 = $this ->_modelobancoSangre->ListarBancoSangreSubTipoxCabM(6);
			$subtipo2 = $this ->_modelobancoSangre->ListarBancoSangreSubTipoxCabM(14);
			$tot4 = $this->_modelobancoSangre->ListarBancoSangreTotales4($renaes,$anio,$mes);
			$tot8 = $this->_modelobancoSangre->ListarBancoSangreTotales8($renaes,$anio,$mes);

			$this->_pdfDisa->ReporteInformeBS($cabecera,$tipo1,$tipo2,$tipo3,$tipo4,$tipo5,$tipo6,$tipo7,$item1,$item2,$item3,$item4,$item5,$item6,$item7,$listar,$subtipo1,$subtipo2,$tot4,$tot8);
		}}

		public function GenerarVistaPreviaBS($hemo,$a201_1,$a201_2,$a201_3,$a201_4,$a202_1,$a202_2,$a202_3,$a202_4,$a203_1,$a203_2,$a203_3,$a203_4,$a204_1,$a204_2,$a204_3,$a204_4,$a301_5,$a301_6,$a301_7,$a301_8,$a302_5,$a302_6,$a302_7,$a302_8,$a303_5,$a303_6,$a303_7,$a303_8,$a401_1,$a401_2,$a401_3,$a401_4,$a401_5,$a401_6,$a401_7,$a401_8,$a401_9,$a401_10,$a401_11,$a401_12,$a401_13,$a401_14,$a401_15,$a401_16,$a401_17,$a401_18,$a401_19,$a401_20,$a402_1,$a402_2,$a402_3,$a402_4,$a402_5,$a402_6,$a402_7,$a402_8,$a402_9,$a402_10,$a402_11,$a402_12,$a402_13,$a402_14,$a402_15,$a402_16,$a402_17,$a402_18,$a402_19,$a402_20,$a403_1,$a403_2,$a403_3,$a403_4,$a403_5,$a403_6,$a403_7,$a403_8,$a403_9,$a403_10,$a403_11,$a403_12,$a403_13,$a403_14,$a403_15,$a403_16,$a403_17,$a403_18,$a403_19,$a403_20,$a404_1,$a404_2,$a404_3,$a404_4,$a404_5,$a404_6,$a404_7,$a404_8,$a404_9,$a404_10,$a404_11,$a404_12,$a404_13,$a404_14,$a404_15,$a404_16,$a404_17,$a404_18,$a404_19,$a404_20,$a501_23,$a501_24,$a501_25,$a501_26,$a502_23,$a502_24,$a502_25,$a502_26,$a503_23,$a503_24,$a503_25,$a503_26,$a601_33,$a601_34,$a601_35,$a601_36,$a601_37,$a601_38,$a601_39,$a602_33,$a602_34,$a602_35,$a602_36,$a602_37,$a602_38,$a602_39,$a603_33,$a603_34,$a603_35,$a603_36,$a603_37,$a603_38,$a603_39,$a604_33,$a604_34,$a604_35,$a604_36,$a604_37,$a604_38,$a604_39,$a605_33,$a605_34,$a605_35,$a605_36,$a605_37,$a605_38,$a605_39,$a606_33,$a606_34,$a606_35,$a606_36,$a606_37,$a606_38,$a606_39,$a607_33,$a607_34,$a607_35,$a607_36,$a607_37,$a607_38,$a607_39,$a608_33,$a608_34,$a608_35,$a608_36,$a608_37,$a608_38,$a608_39,$a609_33,$a609_34,$a609_35,$a609_36,$a609_37,$a609_38,$a609_39,$a610_33,$a610_34,$a610_35,$a610_36,$a610_37,$a610_38,$a610_39,$a701_40,$a701_41,$a701_42,$a701_43,$a701_44,$a701_45,$a701_46,$a702_40,$a702_41,$a702_42,$a702_43,$a702_44,$a702_45,$a702_46,$a703_40,$a703_41,$a703_42,$a703_43,$a703_44,$a703_45,$a703_46,$a704_40,$a704_41,$a704_42,$a704_43,$a704_44,$a704_45,$a704_46,$a705_40,$a705_41,$a705_42,$a705_43,$a705_44,$a705_45,$a705_46,$a706_40,$a706_41,$a706_42,$a706_43,$a706_44,$a706_45,$a706_46,$a801_21,$a801_22,$a801_23,$a801_24,$a801_25,$a801_26,$a801_27,$a801_28,$a802_21,$a802_22,$a802_23,$a802_24,$a802_25,$a802_26,$a802_27,$a802_28,$a803_21,$a803_22,$a803_23,$a803_24,$a803_25,$a803_26,$a803_27,$a803_28,$a804_21,$a804_22,$a804_23,$a804_24,$a804_25,$a804_26,$a804_27,$a804_28,$a805_21,$a805_22,$a805_23,$a805_24,$a805_25,$a805_26,$a805_27,$a805_28,$a701_40_2,$a701_41_2,$a701_42_2,$a701_43_2,$a701_44_2,$a701_45_2,$a701_46_2,$a702_40_2,$a702_41_2,$a702_42_2,$a702_43_2,$a702_44_2,$a702_45_2,$a702_46_2,$a703_40_2,$a703_41_2,$a703_42_2,$a703_43_2,$a703_44_2,$a703_45_2,$a703_46_2,$a704_40_2,$a704_41_2,$a704_42_2,$a704_43_2,$a704_44_2,$a704_45_2,$a704_46_2,$a705_40_2,$a705_41_2,$a705_42_2,$a705_43_2,$a705_44_2,$a705_45_2,$a705_46_2,$a706_40_2,$a706_41_2,$a706_42_2,$a706_43_2,$a706_44_2,$a706_45_2,$a706_46_2,$a801_21_2,$a801_22_2,$a801_23_2,$a801_24_2,$a801_25_2,$a801_26_2,$a801_27_2,$a801_28_2,$a802_21_2,$a802_22_2,$a802_23_2,$a802_24_2,$a802_25_2,$a802_26_2,$a802_27_2,$a802_28_2,$a803_21_2,$a803_22_2,$a803_23_2,$a803_24_2,$a803_25_2,$a803_26_2,$a803_27_2,$a803_28_2,$a804_21_2,$a804_22_2,$a804_23_2,$a804_24_2,$a804_25_2,$a804_26_2,$a804_27_2,$a804_28_2,$a805_21_2,$a805_22_2,$a805_23_2,$a805_24_2,$a805_25_2,$a805_26_2,$a805_27_2,$a805_28_2,$establecimiento,$mes,$anio)
		{
			//$hemot = $hemo;
			
			$cabecera = $this->_modelobancoSangre->ListarBancoSangreCabM();
			$tipo1 = $this->_modelobancoSangre->ListarBancoSangreTipoM(2);
			$tipo2 = $this->_modelobancoSangre->ListarBancoSangreTipoM(4);
			$tipo3 = $this->_modelobancoSangre->ListarBancoSangreTipoM(6);
			$tipo4 = $this->_modelobancoSangre->ListarBancoSangreTipoM(8);
			$tipo5 = $this->_modelobancoSangre->ListarBancoSangreTipoM(10);
			$tipo6 = $this->_modelobancoSangre->ListarBancoSangreTipoM(12);
			$tipo7 = $this->_modelobancoSangre->ListarBancoSangreTipoM(14);
			$item1 = $this->_modelobancoSangre->ListarBancoSangreItemsM(2);
			$item2 = $this->_modelobancoSangre->ListarBancoSangreItemsM(4);
			$item3 = $this->_modelobancoSangre->ListarBancoSangreItemsM(6);
			$item4 = $this->_modelobancoSangre->ListarBancoSangreItemsM(8);
			$item5 = $this->_modelobancoSangre->ListarBancoSangreItemsM(10);
			$item6 = $this->_modelobancoSangre->ListarBancoSangreItemsM(12);
			$item7 = $this->_modelobancoSangre->ListarBancoSangreItemsM(14);
			$subtipo1 = $this ->_modelobancoSangre->ListarBancoSangreSubTipoxCabM(6);
			$subtipo2 = $this ->_modelobancoSangre->ListarBancoSangreSubTipoxCabM(14);

			$this->_pdfDisa->VistaPreviaBS($cabecera,$tipo1,$tipo2,$tipo3,$tipo4,$tipo5,$tipo6,$tipo7,$item1,$item2,$item3,$item4,$item5,$item6,$item7,$subtipo1,$subtipo2,$hemo,$a201_1,$a201_2,$a201_3,$a201_4,$a202_1,$a202_2,$a202_3,$a202_4,$a203_1,$a203_2,$a203_3,$a203_4,$a204_1,$a204_2,$a204_3,$a204_4,$a301_5,$a301_6,$a301_7,$a301_8,$a302_5,$a302_6,$a302_7,$a302_8,$a303_5,$a303_6,$a303_7,$a303_8,$a401_1,$a401_2,$a401_3,$a401_4,$a401_5,$a401_6,$a401_7,$a401_8,$a401_9,$a401_10,$a401_11,$a401_12,$a401_13,$a401_14,$a401_15,$a401_16,$a401_17,$a401_18,$a401_19,$a401_20,$a402_1,$a402_2,$a402_3,$a402_4,$a402_5,$a402_6,$a402_7,$a402_8,$a402_9,$a402_10,$a402_11,$a402_12,$a402_13,$a402_14,$a402_15,$a402_16,$a402_17,$a402_18,$a402_19,$a402_20,$a403_1,$a403_2,$a403_3,$a403_4,$a403_5,$a403_6,$a403_7,$a403_8,$a403_9,$a403_10,$a403_11,$a403_12,$a403_13,$a403_14,$a403_15,$a403_16,$a403_17,$a403_18,$a403_19,$a403_20,$a404_1,$a404_2,$a404_3,$a404_4,$a404_5,$a404_6,$a404_7,$a404_8,$a404_9,$a404_10,$a404_11,$a404_12,$a404_13,$a404_14,$a404_15,$a404_16,$a404_17,$a404_18,$a404_19,$a404_20,$a501_23,$a501_24,$a501_25,$a501_26,$a502_23,$a502_24,$a502_25,$a502_26,$a503_23,$a503_24,$a503_25,$a503_26,$a601_33,$a601_34,$a601_35,$a601_36,$a601_37,$a601_38,$a601_39,$a602_33,$a602_34,$a602_35,$a602_36,$a602_37,$a602_38,$a602_39,$a603_33,$a603_34,$a603_35,$a603_36,$a603_37,$a603_38,$a603_39,$a604_33,$a604_34,$a604_35,$a604_36,$a604_37,$a604_38,$a604_39,$a605_33,$a605_34,$a605_35,$a605_36,$a605_37,$a605_38,$a605_39,$a606_33,$a606_34,$a606_35,$a606_36,$a606_37,$a606_38,$a606_39,$a607_33,$a607_34,$a607_35,$a607_36,$a607_37,$a607_38,$a607_39,$a608_33,$a608_34,$a608_35,$a608_36,$a608_37,$a608_38,$a608_39,$a609_33,$a609_34,$a609_35,$a609_36,$a609_37,$a609_38,$a609_39,$a610_33,$a610_34,$a610_35,$a610_36,$a610_37,$a610_38,$a610_39,$a701_40,$a701_41,$a701_42,$a701_43,$a701_44,$a701_45,$a701_46,$a702_40,$a702_41,$a702_42,$a702_43,$a702_44,$a702_45,$a702_46,$a703_40,$a703_41,$a703_42,$a703_43,$a703_44,$a703_45,$a703_46,$a704_40,$a704_41,$a704_42,$a704_43,$a704_44,$a704_45,$a704_46,$a705_40,$a705_41,$a705_42,$a705_43,$a705_44,$a705_45,$a705_46,$a706_40,$a706_41,$a706_42,$a706_43,$a706_44,$a706_45,$a706_46,$a801_21,$a801_22,$a801_23,$a801_24,$a801_25,$a801_26,$a801_27,$a801_28,$a802_21,$a802_22,$a802_23,$a802_24,$a802_25,$a802_26,$a802_27,$a802_28,$a803_21,$a803_22,$a803_23,$a803_24,$a803_25,$a803_26,$a803_27,$a803_28,$a804_21,$a804_22,$a804_23,$a804_24,$a804_25,$a804_26,$a804_27,$a804_28,$a805_21,$a805_22,$a805_23,$a805_24,$a805_25,$a805_26,$a805_27,$a805_28,$a701_40_2,$a701_41_2,$a701_42_2,$a701_43_2,$a701_44_2,$a701_45_2,$a701_46_2,$a702_40_2,$a702_41_2,$a702_42_2,$a702_43_2,$a702_44_2,$a702_45_2,$a702_46_2,$a703_40_2,$a703_41_2,$a703_42_2,$a703_43_2,$a703_44_2,$a703_45_2,$a703_46_2,$a704_40_2,$a704_41_2,$a704_42_2,$a704_43_2,$a704_44_2,$a704_45_2,$a704_46_2,$a705_40_2,$a705_41_2,$a705_42_2,$a705_43_2,$a705_44_2,$a705_45_2,$a705_46_2,$a706_40_2,$a706_41_2,$a706_42_2,$a706_43_2,$a706_44_2,$a706_45_2,$a706_46_2,$a801_21_2,$a801_22_2,$a801_23_2,$a801_24_2,$a801_25_2,$a801_26_2,$a801_27_2,$a801_28_2,$a802_21_2,$a802_22_2,$a802_23_2,$a802_24_2,$a802_25_2,$a802_26_2,$a802_27_2,$a802_28_2,$a803_21_2,$a803_22_2,$a803_23_2,$a803_24_2,$a803_25_2,$a803_26_2,$a803_27_2,$a803_28_2,$a804_21_2,$a804_22_2,$a804_23_2,$a804_24_2,$a804_25_2,$a804_26_2,$a804_27_2,$a804_28_2,$a805_21_2,$a805_22_2,$a805_23_2,$a805_24_2,$a805_25_2,$a805_26_2,$a805_27_2,$a805_28_2,$establecimiento,$mes,$anio);
		}

		/**
		* anemia
		**/
		public function anemia() {
			Sesion::accesos ( 'logueado' );
			$this->_vista->ficha = $this->generarFicha();
			$this->_vista->tiposParentescos = $this->_libreriaUtilitario->ConvertiraOpcionesSelect($this->_modeloUtilitario->obtenerTiposParentesco());
			$this->_vista->breadcrumb = $this->breadcrumbVista ( 'Informes', 'Anemia' );
			$this->_vista->tituloGeneral = "Anemia";
			$this->_vista->construirVista ( 'informes', 'anemia' );
		}

		private function generarFicha()
		{
			$cabeceras = $this->_modeloAnemia->ListarCabecerasEvaluacion();
			$html = null;

			for ($i=0; $i < count($cabeceras); $i++) { 
				$html .= "<div class='panel panel-default'>";
					$html .= "<div class='panel-heading'>" . $cabeceras [$i] ['CABECERA'] . "</div>";
					$html .= "<div class='panel-body'>";
					$html .= "</div>";
					$html .= "<div class='table-responsive'>";
				    	$html .= "<table class='table table-bordered' style='text-align: left;'>";

				    	#preguntas
				    	$indicePreguntas = 0;
				    	$preguntas = $this->_modeloAnemia->ListarPreguntasEvaluacion($cabeceras [$i] ['IDCABECERA']);
				    	for ($j=0; $j < count($preguntas); $j++) { 
				    		$indicePreguntas = $indicePreguntas + 1;
				    		$html .= "<tr>";
				    			$html .= "<td class='text-center'>" . $indicePreguntas . ".-</td>";
				    			$html .= "<td colspan='3'><b>" . $preguntas[$j]['PREGUNTA'] ."</b></td>";
				    		$html .= "</tr>";

				    		#opciones
				    		$indiceOpciones = 0;
				    		$opciones = $this->_modeloAnemia->ListarOpcionesEvaluacion($cabeceras [$i] ['IDCABECERA'],$preguntas[$j]['IDPREGUNTA']);
				    		for ($h=0; $h < count($opciones); $h++) { 
				    		$html .= "<tr>";
				    			$html .= "<td class='text-center'></td>";
				    			$html .= "<td>" . $opciones[$h]['OPCION'] ."</td>";
				    			if ($opciones[$h]['LLENADO'] == 1) {
				    				$html .= "<td class='text-center'><input type='radio' name='" . $opciones[$h]['NAME'] . "' id='" . $opciones[$h]['VALUE'] . "a' /></td>";
				    				$html .= "<td style='padding: 0 !important;'><input type='text' id='" . $opciones[$h]['VALUE'] . "' name='" . $opciones[$h]['NAME'] . "a' class='form-control input-sm' style='margin:0px !important; border: none;' disabled/><input type='hidden' id='" . $opciones[$h]['VALUE'] . "b' /></td>";
				    			}
				    			if ($opciones[$h]['CHEKBOX'] == 1) {
				    				$html .= "<td class='text-center'><input type='checkbox' name='" . $opciones[$h]['NAME'] . "[]' value='" . $opciones[$h]['VALUE'] . "' /></td>";
				    				$html .= "<td></td>";
				    			}
				    			if ($opciones[$h]['LLENADO'] == 0 && $opciones[$h]['CHEKBOX'] == 0) {
				    			
				    				$html .= "<td class='text-center'><input type='radio' name='" . $opciones[$h]['NAME'] . "' value='" . $opciones[$h]['VALUE'] . "' id=''/></td>";	
				    				$html .= "<td></td>";
				    			}
				    			
				    		$html .= "</tr>";
				    		}
				    	}
				    	$html .= "</table>";
				    $html .= "</div>";
				$html .= "</div>";
			}

			return $html;
		}

		public function buscarNumeroVisitas()
		{
			$anio = date('Y');
			$dni = $this->obtenerDatosCadena('dniPaciente');
			$respuesta = $this->_modeloAnemia->ListarNumVisitasxDNI($dni,$anio);
			echo json_encode($respuesta[0]['NVISITA']);
		}

		public function registrarAnemia()
		{
			#datos cabecera
			$dniPaciente 			= $this->obtenerDatosCadena('dniPaciente');
			$paternoPaciente 		= $this->obtenerDatosCadena('paternoPaciente');
			$maternoPaciente 		= $this->obtenerDatosCadena('maternoPaciente');
			$nombresPaciente 		= $this->obtenerDatosCadena('nombresPaciente');
			$fechaNaciPaciente 		= $this->obtenerDatosCadena('fechaNaciPaciente');
			$domicilioPaciente 		= $this->obtenerDatosCadena('domicilioPaciente');
			$dniResponsable 		= $this->obtenerDatosCadena('dniResponsable');
			$paternoResponsable 	= $this->obtenerDatosCadena('paternoResponsable');
			$maternoResponsable 	= $this->obtenerDatosCadena('maternoResponsable');
			$nombresResponsable 	= $this->obtenerDatosCadena('nombresResponsable');
			$fechaNaciResponsable 	= $this->obtenerDatosCadena('fechaNaciResponsable');
			$parentescoResponsable 	= $this->obtenerDatosNumero('parentescoResponsable');
			$idEstablecimiento 		= $this->obtenerDatosCadena('idEstablecimiento');
			$historiaClinica 		= $this->obtenerDatosNumero('historiaClinica');
			$diagHemo 				= $this->obtenerDatosCadena('diagHemo');
			$anemiaCa 				= $this->obtenerDatosCadena('anemiaCa');
			$numDosis 				= $this->obtenerDatosNumero('numDosis');
			$fechaRegistro 			= date('Y-m-d');
			$fechaIniciSuplMicro 	= $this->obtenerDatosCadena('fechaIniciSuplMicro');
			$numVisitas 			= $this->obtenerDatosNumero('numVisitas');
			$observaciones 			= $this->obtenerDatosCadena('observaciones');
			$idEmpleado 			= Sesion::get ( 'idusuario' );
			$hora 					= date('h:i:s');

			$numVisitas = $numVisitas + 1;
			if ($numVisitas < 10) {
				$numVisitas = '0' . $numVisitas;
			}

			$idEvaluacion = $dniPaciente . date('Y') . $numVisitas;
			//echo $idEvaluacion;exit();


			$respuestaCabecera = $this->_modeloAnemia->InsertarCabeceraEvaluacion($idEvaluacion,$dniPaciente,$historiaClinica,$paternoPaciente,$maternoPaciente,$nombresPaciente,$diagHemo,$anemiaCa,$fechaIniciSuplMicro,$numDosis,$fechaNaciPaciente,$dniResponsable,$paternoResponsable,$maternoResponsable,$nombresResponsable,$fechaNaciResponsable,$parentescoResponsable,$idEmpleado,$idEstablecimiento,$fechaRegistro,$hora,$numVisitas,$observaciones,$domicilioPaciente);

			if ($respuestaCabecera == 'M_1') {
				#codigos			
				$codigo_patch = $this->_modeloAnemia->ListarCodigoPatch();

				for ($i=0; $i < count($codigo_patch); $i++) { 
					if($codigo_patch[$i]['checkbox'] == 1) 
					{
						foreach ($_POST[$codigo_patch[$i]['CODIGO_P']] as $checkbox) {
							$respuestaDetalle = $this->_modeloAnemia->InsertarDetalleEvaluacion($idEvaluacion, $checkbox , 1);
						}
						//echo $this->obtenerDatosCadena($codigo_patch[$i]['CODIGO_P']);
					}
					else
					{
						$traba = $this->obtenerDatosCadena($codigo_patch[$i]['CODIGO_P'] . "a");
						if ($traba != "") {
							$respuestaDetalle = $this->_modeloAnemia->InsertarDetalleEvaluacion($idEvaluacion,$this->obtenerDatosCadena($codigo_patch[$i]['CODIGO_P']),$this->obtenerDatosCadena($codigo_patch[$i]['CODIGO_P'] . "a"));
						}
						else
						{
							$respuestaDetalle = $this->_modeloAnemia->InsertarDetalleEvaluacion($idEvaluacion,$this->obtenerDatosCadena($codigo_patch[$i]['CODIGO_P']),1);	
						}
					}
				}
				echo json_encode('Ficha registrada con exito');				
			}	
			else
				{
					echo json_encode('Error intentelo nuevamente 1');
				}		
		}

		public function FichaAnemiaPDF()
		{
			$this->_pdfDisa->AnemiaFormato();
		}

		public function ReporteGestantes($dni,$nvisita)
		{
			$info = $this->_modeloAnemia->anemiaGestantesPuerperasBuscarxDni($dni,$nvisita);
			$cab  = $this->_modeloAnemia->ListarCabecerasEvaluacionGestantesPuerperas();
			$preg = $this->_modeloAnemia->ListarPreguntasEvaluacionGestantesPuerperasInforme();
			$pregr = $this->_modeloAnemia->ListarPreguntasRelacionadasEvaluacionGestantesPuerperasInforme();
			$opc  =	$this->_modeloAnemia->ListarOpcionesInforme();
			$det  = $this->_modeloAnemia->ListarAnemiaGestantesPuerperasDetalleInforme($dni,$nvisita);
			
			$this->_pdfDisa->anemiaGestantesPuerperasFicha($info,$cab,$preg,$pregr,$opc,$det);
		}
		
	}
 ?>