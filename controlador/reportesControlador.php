	<?php
	class reportesControlador extends Controlador
	{
		private $_modeloReportes;
		private $_modelobancoSangre;
		private $_modeloUsuarios;
		private $_pdfDisa;

		public function __construct()
		{
			parent::__construct();	
			$this->_modeloReportes 	= $this->obtenerModelo('reportes');
			$this->_modelobancoSangre = $this->obtenerModelo('bancoSangre');
			$this->_modeloUsuarios 	= $this->obtenerModelo('usuarios');
			$this->_pdfDisa 		= $this->obtenerLibreria('pdfDisa');
		}

		public function index()
		{
			Sesion::accesos('logueado');
		
		}

		public function reporteBS()
		{

			Sesion::accesos('logueado');

			$this->_vista->breadcrumb = $this->breadcrumbVista('Tuberculosis','Reistro');
			//$this->_vista->listaPiscina = $piscinas;
			$this->_vista->tituloGeneral = "Reportes Banco Sangre";
			$this->_vista->construirVista('reportes','reporteBS');
		}

		public function crearOpcionesHemoterapia()		
		{
			$hemoterapia_tmp = $this->_modelobancoSangre->ListarBancoSangreHemoterapiaM();

			$html = "<option value='5'><center>-- CENTRO HEMOTERAPIA --</center></option>";
			
			for ($i=0; $i < count($hemoterapia_tmp); $i++) { 
				$html .= "<option value='" . $hemoterapia_tmp[$i]['IDHEMOTERAPIA'] . "'>" . $hemoterapia_tmp[$i]['NOMBRE'] . "</option>";
			}

			echo json_encode($html);
		}

		public function crearOpcionesSector()
		{
			$sector_tmp = $this->_modelobancoSangre->ListarBancoSangreSectorM();

			$html = "<option  value='5'><center>-- SECTOR --</center></option>";
			
			for ($i=0; $i < count($sector_tmp); $i++) { 
				$html .= "<option value='" . $sector_tmp[$i]['IDSECTOR'] . "'>" . $sector_tmp[$i]['NOMBRE'] . "</option>";
			}

			echo json_encode($html);
		}
		
		public function probando()
		{
			Sesion::accesos('logueado');

			$this->_vista->breadcrumb = $this->breadcrumbVista('Tuberculosis','Reistro');
			//$this->_vista->listaPiscina = $piscinas;
			$this->_vista->tituloGeneral = "Reportes Banco Sangre";
			$this->_vista->construirVista('reportes','reporteBS');
		}

		public function GenerarReporteBS($hemoterapia,$sector,$anio)
		{

			//$usuario = Sesion::get('idusuario');
			
			$listar 	= 	$this ->_modeloReportes->ReporteBSxMesAnio($hemoterapia,$sector,$anio);
			$porcentaje = 	$this ->_modeloReportes->ReportesBSChecklistPorcentaje($anio);
			$totales 	= 	$this ->_modeloReportes->ReportesBSChecklistTotales($anio);
			$this->_pdfDisa->ReporteBS($listar,$porcentaje,$totales);
		}

		public function GenerarReporteBSCh($hemoterapia,$sector,$anio)
		{

			//$usuario = Sesion::get('idusuario');
			
			$listar 	= 	$this ->_modeloReportes->ReportesBsChecklistMesxAnio($hemoterapia,$sector,$anio);
			$this->_pdfDisa->ReporteBSCh($listar);
		}

		public function GenerarReporteBSIndividual($anio,$rena)
		{
			
			$listar 	= 	$this ->_modeloReportes->ReporteBSxMesAnioId($anio,$rena);
			$listarsi  	= 	$this->_modelobancoSangre->BuscarRenaesxIdRenaes($rena);
			$this->_pdfDisa->ReporteBSIndividual($listar,$listarsi,$anio);
		}

		public function GenerarReporteBSMensual($mes,$anio,$renaes,$hemo)
		{
			$titulo1 = 'REPORTE MENSUAL';
			$listar = $this->_modeloReportes->ReportesBSSumatoriaMensual($anio,$mes,$renaes,$hemo);
			$datos = $this->_modelobancoSangre->BancoSangreBuscarReporteM($renaes,$anio,$mes);
			$cabecera = $this->_modelobancoSangre->ListarBancoSangreCabM();
			$tipo = $this->_modelobancoSangre->ListarBancoSangreTipo1M();
			$item = $this->_modelobancoSangre->ListarBancoSangreItems1M();
			$subtipo = $this->_modelobancoSangre->ListarBancoSangreSubTipo1M();
			if($mes==1){$mes='Enero';}elseif($mes==2){$mes='Febrero';}elseif($mes==3){$mes='Marzo';}elseif($mes==4){$mes='Abril';}elseif($mes==5){$mes='Mayo';}elseif($mes==6){$mes='Junio';}elseif($mes==7){$mes='Julio';}elseif($mes==8){$mes='Agosto';}elseif($mes==9){$mes='Setiembre';}elseif($mes==10){$mes='Octubre';}elseif($mes==11){$mes='Noviembre';}elseif($mes==12){$mes='Diciembre';}
			$titulo = 'MES: '.$mes;
			$this->_pdfDisa->ReporteBSCronologico($listar,$cabecera,$tipo,$item,$subtipo,$titulo,$anio,$titulo1,$datos);
		}

		public function GenerarReporteBSBimestral($bimestre,$anio,$renaes,$hemo)
		{
			if($bimestre==1){$titulo = '1er Bimestre';}elseif($bimestre==2){$titulo = '2do Bimestre';}elseif($bimestre==3){$titulo = '3er Bimestre';}elseif($bimestre==3){$titulo = '3er Bimestre';}elseif($bimestre==4){$titulo = '4to Bimestre';}elseif($bimestre==5){$titulo = '5to Bimestre';}elseif($bimestre==6){$titulo = '6to Bimestre';}
			$titulo1 = 'REPORTE BIMESTRAL';
			$listar = $this->_modeloReportes->ReportesBSSumatoriaBimestral($anio,$bimestre,$renaes,$hemo);
			$datos = $this->_modelobancoSangre->BancoSangreBuscarReporteM($renaes,$anio,13);
			$cabecera = $this->_modelobancoSangre->ListarBancoSangreCabM();
			$tipo = $this->_modelobancoSangre->ListarBancoSangreTipo1M();
			$item = $this->_modelobancoSangre->ListarBancoSangreItems1M();
			$subtipo = $this->_modelobancoSangre->ListarBancoSangreSubTipo1M();
			$this->_pdfDisa->ReporteBSCronologico($listar,$cabecera,$tipo,$item,$subtipo,$titulo,$anio,$titulo1,$datos);
		}

		public function GenerarReporteBSTrimestral($trimestre,$anio,$renaes,$hemo)
		{
			if($trimestre==1){$titulo = '1er trimestre';}elseif($trimestre==2){$titulo = '2do trimestre';}elseif($trimestre==3){$titulo = '3er trimestre';}elseif($trimestre==4){$titulo = '4to trimestre';}
			$titulo1 = 'REPORTE TRIMESTRAL';
			$listar = $this->_modeloReportes->ReportesBSSumatoriaTrimestral($anio,$trimestre,$renaes,$hemo);
			$datos = $this->_modelobancoSangre->BancoSangreBuscarReporteM($renaes,$anio,13);
			$cabecera = $this->_modelobancoSangre->ListarBancoSangreCabM();
			$tipo = $this->_modelobancoSangre->ListarBancoSangreTipo1M();
			$item = $this->_modelobancoSangre->ListarBancoSangreItems1M();
			$subtipo = $this->_modelobancoSangre->ListarBancoSangreSubTipo1M();
			$this->_pdfDisa->ReporteBSCronologico($listar,$cabecera,$tipo,$item,$subtipo,$titulo,$anio,$titulo1,$datos);
		}

		public function GenerarReporteBSSemestral($semestre,$anio,$renaes)
		{
			$titulo = 'SEMESTRE: '.$semestre;
			$titulo1 = 'REPORTE SEMESTRAL';
			$listar = $this->_modeloReportes->ReportesBSSumatoriaSemestral($anio,$semestre,$renaes);
			$datos = $this->_modelobancoSangre->BancoSangreBuscarReporteM($renaes,$anio,13);
			$cabecera = $this->_modelobancoSangre->ListarBancoSangreCabM();
			$tipo = $this->_modelobancoSangre->ListarBancoSangreTipo1M();
			$item = $this->_modelobancoSangre->ListarBancoSangreItems1M();
			$subtipo = $this->_modelobancoSangre->ListarBancoSangreSubTipo1M();
			$this->_pdfDisa->ReporteBSCronologico($listar,$cabecera,$tipo,$item,$subtipo,$titulo,$anio,$titulo1,$datos);
		}

		public function GenerarReporteBSAnual($anio,$renaes)
		{
			$titulo = 'AÑO: '.$anio;
			$titulo1 = 'REPORTE ANUAL';
			$listar = $this->_modeloReportes->ReportesBSSumatoriaAnual($anio,$renaes);
			$datos = $this->_modelobancoSangre->BancoSangreBuscarReporteM($renaes,$anio,13);
			$cabecera = $this->_modelobancoSangre->ListarBancoSangreCabM();
			$tipo = $this->_modelobancoSangre->ListarBancoSangreTipo1M();
			$item = $this->_modelobancoSangre->ListarBancoSangreItems1M();
			$subtipo = $this->_modelobancoSangre->ListarBancoSangreSubTipo1M();
			$this->_pdfDisa->ReporteBSCronologico($listar,$cabecera,$tipo,$item,$subtipo,$titulo,$anio,$titulo1,$datos);
		}

		/////////////////////////////////REPORTE ANEMIAAAAAA////////////////////

		public function reporteAne()
		{
			Sesion::accesos('logueado');

			$this->_vista->breadcrumb = $this->breadcrumbVista('Anemia','Repores');
			//$this->_vista->listaPiscina = $piscinas;
			$this->_vista->tituloGeneral = "Reportes Anemia";
			$this->_vista->construirVista('reportes','reporteAnemia');
		}

		public function ListarVisitasGestantes()
		{	
			$dni = $this->obtenerDatosCadena('dni');
			$lista = $this->_modeloReportes->ReportesAnemiaListarInformes($dni);
			for ($i=0; $i < count($lista); $i++) { 
				$html .= "<tr>";
					$html .= "<td>" . $lista[$i]['numVisita'] . "</td>";
					$html .= "<td>" . $lista[$i]['dniPaciente'] . "</td>";
					$html .= "<td>" . $lista[$i]['APPACIENTE'] .' '. $lista[$i]['AMPACIENTE'].' '.$lista[$i]['NPACIENTE']."</td>";
					$html .= "<td>" . $lista[$i]['APEMPLEADO'] .' '. $lista[$i]['AMEMPLEADO'].' '.$lista[$i]['NEMPLEADO']."</td>";		
					$html .= "<td>";
						$html .= "<a type='button' id='reporteGestante' data-rel='".$lista[$i]['numVisita']."' data-rel1='".$lista[$i]['dniPaciente']."' class='btn btn-danger'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a>&nbsp;";
					$html .= "</td>";			
				$html .= "</tr>";
			}

			echo json_encode(array('html'=>$html));
		}

		public function SumarListaAnemia()
		{
			#detectar ubigeo
			$v1=0;
			$v2=0;
			$v3=0;
			$v4=0;
			$v5=0;
			$respuesta = $this->_modeloReportes->listarAnemia();

			for ($i=0; $i < count($respuesta); $i++) { 

				switch ($respuesta[$i]['numVisita']) 
				{
					case '1':
						$v1=$v1 + 1;
						break;
					case '2':
						$v2=$v2 + 1;
						break;
					case '3':
						$v3=$v3 + 1;
						break;
					case '4':
						$v4=$v4 + 1;
						break;
					case '5':
						$v5=$v5 + 1;
						break;
				}
					
			}
			$total = $v1 + $v2 + $v3 + $v4 + $v5;
			
			$porcv1 = ($v1*100) / $total;
			$porcv2 = ($v2*100) / $total;
			$porcv3 = ($v3*100) / $total;
			$porcv4 = ($v4*100) / $total;
			$porcv5 = ($v5*100) / $total;

			$sumatoria = array(
				'visita1' 	=> round($porcv1,2) ,
				'visita2' 	=> round($porcv2,2) ,
				'visita3' 	=> round($porcv3,2) ,
				'visita4' 	=> round($porcv4,2) ,
				'visita5' 	=> round($porcv5,2) ,
				'total' 		=> $total
			);
			echo json_encode($sumatoria);
		}

		public function BuscarRenaes()
		{
			$temporal = $this->_modeloUsuarios->ListarEmpleadoxId(Sesion::get('idusuario'));
			$establecimiento = $this->_modelobancoSangre->BuscarRenaesxIdRenaes(substr($temporal[0]['dni'],0,8));
			//$temporal[0]['dni']
			$data = array('NOMBRE' => $establecimiento[0]['Establecimiento'],
						  'ID'	   => $establecimiento[0]['CodigoUnico']
						 /* 'TELEFONO'	   => $establecimiento[0]['TELEFONO'],
						  'DISA'	   => $establecimiento[0]['DISA'],
						  'CORREO'	   => $establecimiento[0]['CORREO'],
						  'HEMOTERAPIA'	   => $establecimiento[0]['HEMOTERAPIA'],
						  'SECTOR'	   => $establecimiento[0]['SECTOR'],
						  'UDRM'	   => $establecimiento[0]['UDRM'],
						  'RESPONSABLE' => $establecimiento[0]['RESPONSABLE'],*/
				);


			echo json_encode($data);
		}
		
	}
	?>