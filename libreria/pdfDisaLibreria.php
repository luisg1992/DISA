<?php 
	require(ROOT . 'libreria' . DS . 'fpdf' . DS . 'fpdf.php');

	/**
	* 
	*/
	class pdfDisaLibreria extends FPDF
	{
		private $_pdf;
		public $tipoFuente;

		public function __construct()
		{
			$this->tipoFuente = 'Helvetica';
			
		}

		public function CabeceraGeneral()
		{
			$this->_pdf = new FPDF();
			$this->_pdf->AddPage();
		    $this->_pdf->Image(IMAGEN_INSTITUCIONAL,7,4,60);
		    $this->_pdf->SetFont($this->tipoFuente,'',6);
		    $this->_pdf->Cell(150);
		    $this->_pdf->Cell(40,0,utf8_decode(TITULO),0,0,'R');
		    $this->_pdf->SetFont($this->tipoFuente,'B',5);
		    $this->_pdf->Cell(0,5,utf8_decode(SUBTITULO),0,0,'R');
		    $this->_pdf->Ln(10);
		}

		public function AnemiaFormato()
		{
			$this->CabeceraGeneral();
			$this->_pdf->SetFont($this->tipoFuente,'B',8);
			$this->_pdf->Cell(190,5,utf8_decode('FICHA DE MONITOREO DOMICILIARIO A NIÑOS MENORES DE 1 AÑO PARA LA PREVENCION Y CONTROL DE LA ANEMIA'),1,0,'C');
			$this->_pdf->ln(6);
			$this->_pdf->Output();
		}

		public function CabeceraDesa()
		{
		    $this->_pdf = new FPDF();
			$this->_pdf->AddPage();
		    $this->_pdf->Image(BASE_URL . 'publico' . DS . 'img' . DS . 'logos' . DS . 'digesa.jpg',10,8,60);
		    $this->_pdf->SetFont($this->tipoFuente,'B',10);
		    $this->_pdf->Cell(150);
		    $this->_pdf->Cell(40,10,utf8_decode('Formato Único de Trámite Documentario'),0,0,'R');
		    $this->_pdf->Ln(20);
		}

		public function FormatoTupaDesa($personaNatural,$personaJuridica,$representateLegal,$ruc,$domicilioFiscal,$nombreDirector,$cpiDirector,$direccion,$relefono,$correo)
		{	
			$this->CabeceraDesa();
			$this->_pdf->SetFont($this->tipoFuente,'B',10);
			$this->_pdf->Cell(40,5,utf8_decode('I. INFORMACIÓN GENERAL'));
			$this->_pdf->ln(6);
			$this->_pdf->SetFont($this->tipoFuente,'',8);
			$this->_pdf->Cell(70,5,utf8_decode('14. NOMBRES Y APELLIDOS: (Si es Persona Natural): '));
			$this->_pdf->Cell(40,5,utf8_decode($personaNatural));
			$this->_pdf->ln(6);
			$this->_pdf->Cell(100,5,utf8_decode('15. NOMBRE DE LA EMPRESA O RAZON SOCIAL: (Si es Persona juridica): '));
			$this->_pdf->Cell(40,5,utf8_decode($personaJuridica));
			$this->_pdf->ln(6);
			$this->_pdf->Cell(60,5,utf8_decode('16. NOMBRE DEL REPRESENTATE LEGAL: '));
			$this->_pdf->Cell(40,5,utf8_decode($representateLegal));
			$this->_pdf->ln(6);
			$this->_pdf->Cell(80,5,utf8_decode('18. N° DE REGISTRO UNICO DEL CONTRIBUYENTE(RUC):'));
			$this->_pdf->Cell(40,5,utf8_decode($ruc));
			$this->_pdf->ln(6);
			$this->_pdf->Cell(35,5,utf8_decode('19. DOMICILIO FISCAL'));
			$this->_pdf->Cell(40,5,utf8_decode($domicilioFiscal));
			$this->_pdf->ln(12);
			$this->_pdf->SetFont($this->tipoFuente,'B',10);
			$this->_pdf->Cell(40,5,utf8_decode('DEL DIRECTOR TECNICO (En el caso de las empresas de Saneamiento)'));
			$this->_pdf->ln(6);
			$this->_pdf->SetFont($this->tipoFuente,'',8);
			$this->_pdf->Cell(40,5,utf8_decode('20. NOMBRES Y APELLIDOS'));
			$this->_pdf->Cell(40,5,utf8_decode($nombreDirector));
			$this->_pdf->ln(6);
			$this->_pdf->Cell(40,5,utf8_decode('21. C.P.I. :'));
			$this->_pdf->Cell(40,5,utf8_decode($cpiDirector));
			$this->_pdf->ln(12);
			$this->_pdf->SetFont($this->tipoFuente,'B',10);
			$this->_pdf->Cell(40,5,utf8_decode('V. DATOS DE NOTIFICACION'));
			$this->_pdf->ln(6);
			$this->_pdf->SetFont($this->tipoFuente,'',8);
			$this->_pdf->Cell(40,5,utf8_decode('Dirección: '));
			$this->_pdf->Cell(40,5,utf8_decode($direccion));
			$this->_pdf->ln(6);
			$this->_pdf->Cell(40,5,utf8_decode('Telefono fijo/celular: '));
			$this->_pdf->Cell(40,5,utf8_decode($relefono));
			$this->_pdf->ln(6);
			$this->_pdf->Cell(40,5,utf8_decode('Correo Electrónico:'));
			$this->_pdf->Cell(40,5,utf8_decode($correo));
			$this->_pdf->ln(12);

			$this->_pdf->SetFont($this->tipoFuente,'B',9);
			$this->_pdf->Cell(190,5,utf8_decode('DECLARO BAJO JURAMENTO QUE LA INFORMACIÓN QUE HE PROPORCIONADO, ES VERAZ Y ASUMO'),0,0,'C');
			$this->_pdf->ln(6);
			$this->_pdf->Cell(190,5,utf8_decode('LAS RESPONSABILIDADES Y CONSECUENCIAS LEGALES QUE ELLO PRODUZCA'),0,0,'C');
			$this->_pdf->ln(30);

			$this->_pdf->SetFont($this->tipoFuente,'',8);
			$this->_pdf->Cell(100,5,utf8_decode('...........................................................................'),0,0,'L');
			$this->_pdf->Cell(90,5,utf8_decode('...........................................................'),0,0,'R');
			$this->_pdf->ln(6);

			$this->_pdf->SetFont($this->tipoFuente,'',7);
			$this->_pdf->Cell(100,5,utf8_decode('Firma del Propietario y/o Representate Legal'),0,0,'L');
			$this->_pdf->Cell(90,5,utf8_decode('Firma y Sello del Director Tecnico'),0,0,'R');
			$this->_pdf->ln(6);

			$this->_pdf->SetFont($this->tipoFuente,'B',7);
			$this->_pdf->Cell(100,5,utf8_decode('N° DNI: .............................................'),0,0,'L');
			$this->_pdf->Cell(90,5,utf8_decode('N° CPI: .............................................'),0,0,'R');
			$this->_pdf->ln(15);


			$this->_pdf->SetFont($this->tipoFuente,'',8);
			$this->_pdf->Cell(190,5,utf8_decode('Toda variación o cambio que se produzca durante el funcionamiento del establecimiento deberá ser comunicado a la Dirección Ejecutiva de Salud '));
			$this->_pdf->ln(4);
			$this->_pdf->Cell(190,5,utf8_decode('Salud Ambiental - DISA II Lima Sur conforme a lo establecido en la normatividad vigente.'),0,0,'L');
			$this->_pdf->ln(6);


			$this->_pdf->Output();
		}

		public function CabeceraDesa1()
		{
		    $this->_pdf = new FPDF('L','mm','A4');
			$this->_pdf->AddPage();
		    $this->_pdf->Image(BASE_URL . 'publico' . DS . 'img' . DS . 'logos' . DS . 'digesa.jpg',10,8,60);
		    $this->_pdf->SetFont($this->tipoFuente,'B',10);
		    $this->_pdf->Cell(150);
		    $this->_pdf->Cell(10,10,utf8_decode('REPORTE PISCINAS'),0,0,'R');
		    $this->_pdf->Ln(20);
		}

		public function ReportePiscina($piscinas)
		{	
			$this->CabeceraDesa1();
			$this->_pdf->SetFont($this->tipoFuente,'B',10);
			$this->_pdf->Cell(110,5,utf8_decode('Nombre'),1);
			$this->_pdf->Cell(70,5,utf8_decode('Dirección'),1);
			$this->_pdf->Cell(25,5,utf8_decode('Departamento'),1);
			$this->_pdf->Cell(25,5,utf8_decode('Calificación'),1);
			$this->_pdf->Cell(20,5,utf8_decode('Latitud'),1);
			$this->_pdf->Cell(20,5,utf8_decode('Longitud'),1);
			$this->_pdf->Ln(5);

			$this->_pdf->SetFont($this->tipoFuente,'',10);
			
			if($piscinas != NULL)	{ 
				foreach($piscinas as $item){ 
					
					$this->_pdf->SetFont($this->tipoFuente,'',8);
					$this->_pdf->Cell(110,5,utf8_decode($item["NOMBRE"]),0);
					$this->_pdf->Cell(70,5,utf8_decode($item["DIRECCION"]),0);
					$this->_pdf->Cell(25,5,utf8_decode($item["DEPARTAMENTO"]),0);
					$this->_pdf->Cell(25,5,utf8_decode($item["CALIFICACION"]),0);				
					$this->_pdf->Cell(20,5,utf8_decode($item["LATITUD"]),0);				
					$this->_pdf->Cell(20,5,utf8_decode($item["LONGITUD"]),0);				
					$this->_pdf->Ln(5);
					
				}

			}	

			$this->_pdf->Output();
		}

		public function ReporteInformeBS($cabecera,$tipo1,$tipo2,$tipo3,$tipo4,$tipo5,$tipo6,$tipo7,$item1,$item2,$item3,$item4,$item5,$item6,$item7,$listar,$subtipo1,$subtipo2,$tot4,$tot8)
		{
			$this->_pdf = new FPDF('L','mm','A4');
			$this->_pdf->AddPage();
			$this->_pdf->Image('publico'.DS.'img'.DS.'reportes'.DS.'pronahebas.png',15,5,18);
		    // Arial bold 15
		    $this->_pdf->SetFont('Arial','B',10);
		    // Título
		    $this->_pdf->Cell(277,5,utf8_decode('INFORME ESTADÍSTICO PERIÓDICO DE LA DIRECCIÓN DE SALUD'),0,0,'C');
		    $this->_pdf->Ln(5);
		    $this->_pdf->SetFont('Arial','B',8);
		    $this->_pdf->Cell(277,5,utf8_decode('PROGRAMA NACIONAL DE HEMOTERAPIA Y BANCOS DE SANGRE'),0,0,'C');
		    // Salto de línea
		    $this->_pdf->Ln(7);
			
			
			$this->_pdf->Cell(70,5,utf8_decode('101. Nombre de la Institución:'),0,0);
			$this->_pdf->Cell(70,5,utf8_decode($listar[0]["Establecimiento"]),0,0);
			$this->_pdf->Cell(70,5,utf8_decode('102. Centros de Hemoterapia por Tipo y Sector:'),0,0);
			$this->_pdf->Cell(70,5,'TIPO '.utf8_decode($listar[0]["idHemoterapia"]).'      '.utf8_decode($listar[0]["nombre"]),0,0);
			$this->_pdf->Ln(5);
			$this->_pdf->Cell(70,5,utf8_decode('103. Disa/Diresa a la que pertenece:'),0,0);
			$this->_pdf->Cell(70,5,utf8_decode($listar[0]["DISAS"]),0,0);
			$this->_pdf->Ln(5);
			$this->_pdf->Cell(70,5,utf8_decode('104. Periodo al que corresponde:'),0,0);
			$this->_pdf->Cell(70,5,utf8_decode($listar[0]["mes"])."-".utf8_decode($listar[0]["ANIO"]),0,0);
			$this->_pdf->Ln(5);
			$this->_pdf->Cell(70,5,utf8_decode('105. Nombre del Responsable del Informe:'),0,0);
			$this->_pdf->Cell(70,5,utf8_decode($listar[0]["jefeBanSang"]),0,0);
			$this->_pdf->Ln(7);
			$this->_pdf->Cell(7,5,'',0,0);
			$this->_pdf->Cell(63,5,utf8_decode('Codigo RENAES N°'),0,0);
			$this->_pdf->Cell(70,5,utf8_decode($listar[0]["idRenaes"]),0,0);
			$this->_pdf->Ln(5);
			$this->_pdf->Cell(70,5,utf8_decode('Fechas'),0,0);
			$this->_pdf->Ln(5);
			 $this->_pdf->SetFont('Arial','B',6);
			if($cabecera != NULL)
			{
				if($listar[0]['idHemoterapia']==2)
				{
					for ($i=0; $i <  count($cabecera); $i=$i+2)
					{
						if ($i==0) 
						{
							$this->_pdf->Cell(120,10,utf8_decode($cabecera[$i]["NOMBRE"]),1,0,'C');
							$this->_pdf->Cell(157,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(120,15,'',0,0,'C');
							for ($j=0; $j < count($tipo1); $j++)
							{
								$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($tipo1[$j]["NOMBRE"]),1,0,'C');
							} 
							$this->_pdf->Ln(5);
							for ($k=0; $k < count($item1); $k++)
							{
								$this->_pdf->Cell(120,5,utf8_decode($item1[$k]["IDITEM"]).". ".utf8_decode($item1[$k]["NOMBRE"]),1,0);
								for ($f=0; $f < count($listar); $f++)
								{
									if($listar[$f]['idItems']==$item1[$k]['IDITEM'])
									{
										for ($l=0; $l < 4; $l++) { 
											if($listar[$f]['idTIpo']==$l){
												$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($listar[$f]['cantidad']),1,0,'C');
											}
										}
										
									}
								}
								$this->_pdf->Ln(5);
							} $this->_pdf->Ln(5);
					
						}elseif($i==2){
							$this->_pdf->Cell(120,10,utf8_decode($cabecera[$i]["NOMBRE"]),1,0,'C');
							$this->_pdf->Cell(157,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(120,15,'',0,0,'C');
							for ($j=0; $j < count($tipo2); $j++)
							{
								$this->_pdf->Cell((157/count($tipo2)),5,utf8_decode($tipo2[$j]["NOMBRE"]),1,0,'C');
							} 
							$this->_pdf->Ln(5);
							for ($k=0; $k < count($item2); $k++)
							{
								$this->_pdf->Cell(120,5,utf8_decode($item2[$k]["IDITEM"]).". ".utf8_decode($item2[$k]["NOMBRE"]),1,0);
								for ($f=0; $f < count($listar); $f++)
								{
									if($listar[$f]['idItems']==$item2[$k]['IDITEM'])
									{
										for ($l=0; $l < 4; $l++) { 
											if($listar[$f]['idTIpo']==$l){
												$this->_pdf->Cell((157/count($tipo2)),5,utf8_decode($listar[$f]['cantidad']),1,0,'C');
											}
										}
										
									}
								}
								$this->_pdf->Ln(5);
							} $this->_pdf->Ln(5);

						
						}elseif($i==4){
							$this->_pdf->Cell(75,15,utf8_decode($cabecera[$i]["NOMBRE"]),1,0,'C');
							$this->_pdf->Cell(202,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(75,15,'',0,0,'C');
							for ($j=0; $j < count($tipo3); $j++)
							{
								$this->_pdf->Cell((202/count($tipo3)),5,utf8_decode($tipo3[$j]["NOMBRE"]),1,0,'C');
							} 
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(75,15,'',0,0,'C');
							for ($g=0; $g < count($subtipo1); $g++)
							{
								$this->_pdf->SetFont('Arial','B',5);
								$this->_pdf->Cell((202/count($tipo3)/2),5,utf8_decode($subtipo1[$g]["NOMBRE"]),1,0,'C');	
							}
							$this->_pdf->Ln(5);
							$this->_pdf->SetFont('Arial','B',6);
							for ($k=0; $k < count($item3); $k++)
							{
								$this->_pdf->Cell(75,5,utf8_decode($item3[$k]["IDITEM"]).". ".utf8_decode($item3[$k]["NOMBRE"]),1,0);
								for ($f=0; $f < count($listar); $f++)
								{
									if($listar[$f]['idItems']==$item3[$k]['IDITEM'])
									{
										for ($l=0; $l < 4; $l++) { 
											if($listar[$f]['idTIpo']==$l){

												$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($listar[$f]['cantidad']),1,0,'C');
											}
										}
										
									}
								}
								$this->_pdf->Ln(5);
							} 
							$this->_pdf->Cell(75,5,'405. TOTAL',1,0,'L');
							for($z=0;$z<count($tot4);$z++)
							{
								$this->_pdf->Cell((202/count($tipo3))/2,5,$tot4[$z][1],1,0,'C');
							}
							$this->_pdf->Ln(10);

						}elseif($i==6){
							$this->_pdf->Cell(120,10,utf8_decode($cabecera[$i]["NOMBRE"]),1,0,'C');
							$this->_pdf->Cell(157,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(120,15,'',0,0,'C');
							for ($j=0; $j < count($tipo4); $j++)
							{
								$this->_pdf->Cell((157/count($tipo4)),5,utf8_decode($tipo4[$j]["NOMBRE"]),1,0,'C');
							} 
							$this->_pdf->Ln(5);
							for ($k=0; $k < count($item4); $k++)
							{
								$this->_pdf->Cell(120,5,utf8_decode($item4[$k]["IDITEM"]).". ".utf8_decode($item4[$k]["NOMBRE"]),1,0);
								for ($f=0; $f < count($listar); $f++)
								{
									if($listar[$f]['idItems']==$item4[$k]['IDITEM'])
									{
										for ($l=0; $l < 4; $l++) { 
											if($listar[$f]['idTIpo']==$l){
												$this->_pdf->Cell((157/count($tipo4)),5,utf8_decode($listar[$f]['cantidad']),1,0,'C');
											}
										}
										
									}
								}
								$this->_pdf->Ln(5);
							} $this->_pdf->Ln(5);

						
						}elseif($i==8){
							$this->_pdf->Cell(60,10,utf8_decode($cabecera[$i]["NOMBRE"]),1,0,'C');
							$this->_pdf->Cell(217,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(60,15,'',0,0,'C');
							for ($j=0; $j < count($tipo5); $j++)
							{	$this->_pdf->SetFont('Arial','B',5);
								$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($tipo5[$j]["NOMBRE"]),1,0,'C');
								$this->_pdf->SetFont('Arial','B',6);
							} 
							$this->_pdf->Ln(5);
							for ($k=0; $k < count($item5); $k++)
							{
								$this->_pdf->Cell(60,5,utf8_decode($item5[$k]["IDITEM"]).". ".utf8_decode($item5[$k]["NOMBRE"]),1,0);
								for ($f=0; $f < count($listar); $f++)
								{
									if($listar[$f]['idItems']==$item5[$k]['IDITEM'])
									{
										for ($l=0; $l < 8	; $l++) { 
											if($listar[$f]['idTIpo']==$l){
												$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($listar[$f]['cantidad']),1,0,'C');
											}
										}
										
									}
								}
								$this->_pdf->Ln(5);
							} $this->_pdf->Ln(5);

						
						}elseif($i==10){
							$this->_pdf->Cell(93,10,utf8_decode($cabecera[$i]["NOMBRE"]),1,'C');

							$this->_pdf->Cell(184,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(93,15,'',0,0,'C');
							for ($j=0; $j < count($tipo6); $j++)
							{	$this->_pdf->SetFont('Arial','',5);
								$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($tipo6[$j]["NOMBRE"]),1,0,'C');
								$this->_pdf->SetFont('Arial','B',6);
							} 
							$this->_pdf->Ln(5);
							for ($k=0; $k < count($item6); $k++)
							{
								$this->_pdf->Cell(93,5,utf8_decode($item6[$k]["IDITEM"]).". ".utf8_decode($item6[$k]["NOMBRE"]),1,0);
								for ($f=0; $f < count($listar); $f++)
								{
									if($listar[$f]['idItems']==$item6[$k]['IDITEM'])
									{
										for ($l=0; $l < 8	; $l++) { 
											if($listar[$f]['idTIpo']==$l){
												$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($listar[$f]['cantidad']),1,0,'C');
											}
										}
										
									}
								}
								$this->_pdf->Ln(5);
							} $this->_pdf->Ln(5);

						
						}elseif($i==12){
							$this->_pdf->MultiCell(75,7.5,utf8_decode($cabecera[$i]["NOMBRE"]),1,'C');
							$this->_pdf->SetXY(85,120);
							$this->_pdf->Cell(202,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(75,15,'',0,0,'C');
							for ($j=0; $j < count($tipo7); $j++)
							{
								$this->_pdf->Cell((202/count($tipo7)),5,utf8_decode($tipo7[$j]["NOMBRE"]),1,0,'C');
							} 
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(75,15,'',0,0,'C');
							for ($g=0; $g < count($subtipo2); $g++)
							{
								$this->_pdf->SetFont('Arial','B',5);
								$this->_pdf->Cell((202/count($tipo7)/2),5,utf8_decode($subtipo2[$g]["NOMBRE"]),1,0,'C');	
							}
							$this->_pdf->Ln(5);
							$this->_pdf->SetFont('Arial','B',6);
							for ($k=0; $k < count($item7); $k++)
							{
								$this->_pdf->Cell(75,5,utf8_decode($item7[$k]["IDITEM"]).". ".utf8_decode($item7[$k]["NOMBRE"]),1,0);
								for ($f=0; $f < count($listar); $f++)
								{
									if($listar[$f]['idItems']==$item7[$k]['IDITEM'])
									{
										for ($l=0; $l < 4; $l++) { 
											if($listar[$f]['idTIpo']==$l){

												$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($listar[$f]['cantidad']),1,0,'C');
											}
										}
										
									}
								}
								$this->_pdf->Ln(5);
							}
							 $this->_pdf->Cell(75,5,'806. TOTAL',1,0,'C');
							 for($y=0;$y<count($tot8);$y++)
							 {
							 	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($tot8[$y][1]),1,0,'C');
							 }
							 $this->_pdf->Ln(5);
							

						}
					} 
				}
				elseif($listar[0]['idHemoterapia']==1)
				{
					for($i=0;$i<count($cabecera);$i=$i+2)
					{
						if($i==10)
						{
								$this->_pdf->Cell(93,10,utf8_decode($cabecera[$i]["NOMBRE"]),1,'C');

								$this->_pdf->Cell(184,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
								$this->_pdf->Ln(5);
								$this->_pdf->Cell(93,15,'',0,0,'C');
								for ($j=0; $j < count($tipo6); $j++)
								{	$this->_pdf->SetFont('Arial','',5);
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($tipo6[$j]["NOMBRE"]),1,0,'C');
									$this->_pdf->SetFont('Arial','B',6);
								} 
								$this->_pdf->Ln(5);
								for ($k=0; $k < count($item6); $k++)
								{
									$this->_pdf->Cell(93,5,utf8_decode($item6[$k]["IDITEM"]).". ".utf8_decode($item6[$k]["NOMBRE"]),1,0);
									for ($f=0; $f < count($listar); $f++)
									{
										if($listar[$f]['idItems']==$item6[$k]['IDITEM'])
										{
											for ($l=0; $l < 8	; $l++) { 
												if($listar[$f]['idTIpo']==$l){
													$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($listar[$f]['cantidad']),1,0,'C');
												}
											}
											
										}
									}
									$this->_pdf->Ln(5);
								} $this->_pdf->Ln(5);

							
							}elseif($i==12){
								$this->_pdf->MultiCell(75,7.5,utf8_decode($cabecera[$i]["NOMBRE"]),1,'C');
								$this->_pdf->SetXY(85,99);
								$this->_pdf->Cell(202,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
								$this->_pdf->Ln(5);
								$this->_pdf->Cell(75,15,'',0,0,'C');
								for ($j=0; $j < count($tipo7); $j++)
								{
									$this->_pdf->Cell((202/count($tipo7)),5,utf8_decode($tipo7[$j]["NOMBRE"]),1,0,'C');
								} 
								$this->_pdf->Ln(5);
								$this->_pdf->Cell(75,15,'',0,0,'C');
								for ($g=0; $g < count($subtipo2); $g++)
								{
									$this->_pdf->SetFont('Arial','B',5);
									$this->_pdf->Cell((202/count($tipo7)/2),5,utf8_decode($subtipo2[$g]["NOMBRE"]),1,0,'C');	
								}
								$this->_pdf->Ln(5);
								$this->_pdf->SetFont('Arial','B',6);
								for ($k=0; $k < count($item7); $k++)
								{
									$this->_pdf->Cell(75,5,utf8_decode($item7[$k]["IDITEM"]).". ".utf8_decode($item7[$k]["NOMBRE"]),1,0);
									for ($f=0; $f < count($listar); $f++)
									{
										if($listar[$f]['idItems']==$item7[$k]['IDITEM'])
										{
											for ($l=0; $l < 4; $l++) { 
												if($listar[$f]['idTIpo']==$l){

													$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($listar[$f]['cantidad']),1,0,'C');
												}
											}
											
										}
									}
									$this->_pdf->Ln(5);
								} 
								 $this->_pdf->Cell(75,5,'806. TOTAL',1,0,'C');
							 	for($y=0;$y<count($tot8);$y++)
							 	{
							 		$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($tot8[$y][1]),1,0,'C');
							 	}
								$this->_pdf->Ln(5);

							}
						}
					}
			}
			$this->_pdf->Ln(10);	
			$this->_pdf->Cell(187,5,utf8_decode(''),0,0,'R');
			$this->_pdf->Cell(80,5,utf8_decode('O'),'B',0,'C');
			$this->_pdf->Ln(5);	
			$this->_pdf->Cell(187,5,utf8_decode(''),0,0,'R');
			$this->_pdf->Cell(80,5,utf8_decode('Nombre, Firma y Sello del Responsable'),0,0,'C');
			$this->_pdf->Output();
			$this->_vista->mensajeAlerta = "Evaluación ingresa con Éxito!!";
			$this->banSangre();
		}

		public function ReporteBS($listar,$porcentaje,$totales)
		{

			//CONTAMOS LOS TOTALES
			$totaltipo1privado=0;
			for($i=0 ; $i < count($totales); $i++)
			{
				if($totales[$i][0]=='TIPO 1' && $totales[$i][1]=='PRIVADO')
				{
					$totaltipo1privado=$totaltipo1privado+1;
				}elseif($totales[$i][0]=='TIPO 1' && $totales[$i][1]=='MINSA')
				{
					$totaltipo1minsa=$totaltipo1minsa+1;
				}elseif($totales[$i][0]=='TIPO 1' && $totales[$i][1]=='ESSALUD')
				{
					$totaltipo1essalud=$totaltipo1essalud+1;
				}elseif($totales[$i][0]=='TIPO 1' && $totales[$i][1]=='FF.AA. / PNP')
				{
					$totaltipo1ffaa=$totaltipo1ffaa+1;
				}elseif($totales[$i][0]=='TIPO 2' && $totales[$i][1]=='PRIVADO')
				{
					$totaltipo2privado=$totaltipo2privado+1;
				}elseif($totales[$i][0]=='TIPO 2' && $totales[$i][1]=='MINSA')
				{
					$totaltipo2minsa=$totaltipo2minsa+1;
				}elseif($totales[$i][0]=='TIPO 2' && $totales[$i][1]=='ESSALUD')
				{
					$totaltipo2essalud=$totaltipo2essalud+1;
				}elseif($totales[$i][0]=='TIPO 2' && $totales[$i][1]=='FF.AA. / PNP')
				{
					$totaltipo2ffaa=$totaltipo2ffaa+1;
				}

				if($totales[$i][0]=='TIPO 1')
				{
					$totaltipo1=$totaltipo1+1;
				}
				if($totales[$i][0]=='TIPO 2')
				{
					$totaltipo2=$totaltipo2+1;
				}

			}

			//SUMAMOS LOS HEMOTERAPIA TIPO 1 POR MES Y DIVIDIMOS ENTRE TOTALES
			$sumtipo1enero=(($porcentaje[0][3]+$porcentaje[1][3]+$porcentaje[2][3]+$porcentaje[3][3])/$totaltipo1)*100;
			$sumtipo1febrero=(($porcentaje[8][3]+$porcentaje[9][3]+$porcentaje[10][3]+$porcentaje[11][3])/$totaltipo1)*100;
			$sumtipo1marzo=(($porcentaje[16][3]+$porcentaje[17][3]+$porcentaje[18][3]+$porcentaje[19][3])/$totaltipo1)*100;
			$sumtipo1abril=(($porcentaje[24][3]+$porcentaje[25][3]+$porcentaje[26][3]+$porcentaje[27][3])/$totaltipo1)*100;
			$sumtipo1mayo=(($porcentaje[32][3]+$porcentaje[33][3]+$porcentaje[34][3]+$porcentaje[35][3])/$totaltipo1)*100;
			$sumtipo1junio=(($porcentaje[40][3]+$porcentaje[41][3]+$porcentaje[42][3]+$porcentaje[43][3])/$totaltipo1)*100;
			$sumtipo1julio=(($porcentaje[48][3]+$porcentaje[49][3]+$porcentaje[50][3]+$porcentaje[51][3])/$totaltipo1)*100;
			$sumtipo1agosto=(($porcentaje[56][3]+$porcentaje[57][3]+$porcentaje[58][3]+$porcentaje[59][3])/$totaltipo1)*100;
			$sumtipo1setiembre=(($porcentaje[64][3]+$porcentaje[65][3]+$porcentaje[66][3]+$porcentaje[67][3])/$totaltipo1)*100;
			$sumtipo1ocutbre=(($porcentaje[72][3]+$porcentaje[73][3]+$porcentaje[74][3]+$porcentaje[75][3])/$totaltipo1)*100;
			$sumtipo1noviembre=(($porcentaje[80][3]+$porcentaje[81][3]+$porcentaje[82][3]+$porcentaje[83][3])/$totaltipo1)*100;
			$sumtipo1diciembre=(($porcentaje[88][3]+$porcentaje[89][3]+$porcentaje[90][3]+$porcentaje[91][3])/$totaltipo1)*100;

			//SUMAMOS LOS HEMOTERAPIA TIPO 2 POR MES
			$sumtipo2enero=(($porcentaje[4][3]+$porcentaje[5][3]+$porcentaje[6][3]+$porcentaje[7][3])/$totaltipo2)*100;
			$sumtipo2febrero=(($porcentaje[12][3]+$porcentaje[13][3]+$porcentaje[14][3]+$porcentaje[15][3])/$totaltipo2)*100;
			$sumtipo2marzo=(($porcentaje[20][3]+$porcentaje[21][3]+$porcentaje[22][3]+$porcentaje[23][3])/$totaltipo2)*100;
			$sumtipo2abril=(($porcentaje[28][3]+$porcentaje[29][3]+$porcentaje[30][3]+$porcentaje[31][3])/$totaltipo2)*100;
			$sumtipo2mayo=(($porcentaje[36][3]+$porcentaje[37][3]+$porcentaje[38][3]+$porcentaje[39][3])/$totaltipo2)*100;
			$sumtipo2junio=(($porcentaje[44][3]+$porcentaje[45][3]+$porcentaje[46][3]+$porcentaje[47][3])/$totaltipo2)*100;
			$sumtipo2julio=(($porcentaje[52][3]+$porcentaje[53][3]+$porcentaje[54][3]+$porcentaje[55][3])/$totaltipo2)*100;
			$sumtipo2agosto=(($porcentaje[60][3]+$porcentaje[62][3]+$porcentaje[64][3]+$porcentaje[65][3])/$totaltipo2)*100;
			$sumtipo2setiembre=(($porcentaje[68][3]+$porcentaje[69][3]+$porcentaje[70][3]+$porcentaje[71][3])/$totaltipo2)*100;
			$sumtipo2ocutbre=(($porcentaje[76][3]+$porcentaje[77][3]+$porcentaje[78][3]+$porcentaje[79][3])/$totaltipo2)*100;
			$sumtipo2noviembre=(($porcentaje[84][3]+$porcentaje[85][3]+$porcentaje[86][3]+$porcentaje[87][3])/$totaltipo2)*100;
			$sumtipo2diciembre=(($porcentaje[92][3]+$porcentaje[93][3]+$porcentaje[94][3]+$porcentaje[95][3])/$totaltipo2)*100;

			

			$this->_pdf = new FPDF('L','mm','A4');
			$this->_pdf->AddPage();
			$this->_pdf->SetFillColor(254,000,000);
			$this->_pdf->Image('publico'.DS.'img'.DS.'reportes'.DS.'pronahebascabecera.jpg',10,5,270);
			  // Arial bold 15
		    $this->_pdf->SetFont('Arial','',8);
		    // Título

		    $this->_pdf->Ln(24);
		    $this->_pdf->Cell(80,4,utf8_decode('ESTABLECIMIENTOS DE SALUD:'),1,0,'C');
		    $this->_pdf->Cell(14,4,utf8_decode('ENERO'),1,0,'C');
		    $this->_pdf->Cell(16,4,utf8_decode('FEBRERO'),1,0,'C');
		    $this->_pdf->Cell(14,4,utf8_decode('MARZO'),1,0,'C');
		    $this->_pdf->Cell(13,4,utf8_decode('ABRIL'),1,0,'C');
		    $this->_pdf->Cell(13,4,utf8_decode('MAYO'),1,0,'C');
		    $this->_pdf->Cell(13,4,utf8_decode('JUNIO'),1,0,'C');
		    $this->_pdf->Cell(13,4,utf8_decode('JULIO'),1,0,'C');
		    $this->_pdf->Cell(16,4,utf8_decode('AGOSTO'),1,0,'C');
		    $this->_pdf->Cell(19,4,utf8_decode('SETIEMBRE'),1,0,'C');
		    $this->_pdf->Cell(17,4,utf8_decode('OCUTBRE'),1,0,'C');
		    $this->_pdf->Cell(19,4,utf8_decode('NOVIEMBRE'),1,0,'C');
		    $this->_pdf->Cell(18,4,utf8_decode('DICIEMBRE'),1,0,'C');
		    $this->_pdf->Ln(4);
		    $this->_pdf->SetFont('Arial','B',7);
		  /*  $this->_pdf->Cell(40,5,utf8_decode('TIPO I'),1,0,'C');
		    $this->_pdf->Ln(5);
		    $this->_pdf->Cell(40,5,utf8_decode('Clinicas Privadas '),1,0,'C');*/
		    $contipo1=0;
		    $contipo2=0;
		    $contsect1=0;
		    $contsect2=0;
		    $contsect3=0;
		    $contsect4=0;

		    for ($i=0; $i <  count($listar); $i++)
			{
				

				if($listar[$i]['idHemoterapia']==1)
				{
					if($contipo1==0)
					{
						$this->_pdf->SetFillColor(255,204,204);
						$this->_pdf->Cell(80,5,utf8_decode('TIPO I'),1,0,'C',1);	
						$this->_pdf->Cell(14,5,round($sumtipo1enero,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(16,5,round($sumtipo1febrero,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(14,5,round($sumtipo1marzo,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo1abril,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo1mayo,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo1junio,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo1julio,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(16,5,round($sumtipo1agosto,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(19,5,round($sumtipo1setiembre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(17,5,round($sumtipo1ocutbre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(19,5,round($sumtipo1noviembre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(18,5,round($sumtipo1diciembre,1).'%',1,0,'C',1);	

						$this->_pdf->Ln(5);
						$this->_pdf->SetFillColor(254,000,000);
						$contipo1++;
					}
					if($listar[$i]['idSector']==3)
					{
						if($contsect3==0)
						{
							$this->_pdf->SetFont('Arial','B',7);
							$this->_pdf->SetFillColor(255,255,153);
							$this->_pdf->Cell(80,5,utf8_decode('Clinicas Privadas '),1,0,'C',1);
							$this->_pdf->Cell(14,5,round(((($porcentaje[0][3])/$totaltipo1privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,round(((($porcentaje[8][3])/$totaltipo1privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(14,5,round(((($porcentaje[16][3])/$totaltipo1privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[24][3])/$totaltipo1privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[32][3])/$totaltipo1privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[40][3])/$totaltipo1privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[48][3])/$totaltipo1privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,round(((($porcentaje[56][3])/$totaltipo1privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(19,5,round(((($porcentaje[64][3])/$totaltipo1privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(17,5,round(((($porcentaje[72][3])/$totaltipo1privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(19,5,round(((($porcentaje[80][3])/$totaltipo1privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(18,5,round(((($porcentaje[88][3])/$totaltipo1privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->SetFillColor(254,000,000);
							$this->_pdf->Ln(5);
							$contsect3++;
						}
						$this->_pdf->SetFont('Arial','',5);
						$this->_pdf->Cell(80,5,utf8_decode($listar[$i]['Establecimiento']),1,0,'L');
						if($listar[$i]['1']==0){$this->_pdf->Cell(14,5,'',1,C,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C'); }
						if($listar[$i]['2']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['3']==0){$this->_pdf->Cell(14,5,'',1,0,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['4']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['5']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['6']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['7']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['8']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['9']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['10']==0){$this->_pdf->Cell(17,5,'',1,0,'L',true);}else{$this->_pdf->Cell(17,5,'X',1,0,'C');}
						if($listar[$i]['11']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['12']==0){$this->_pdf->Cell(18,5,'',1,0,'L',true);}else{$this->_pdf->Cell(18,5,'X',1,0,'C');}
						$this->_pdf->Ln(5);
					}
				}
			}
			for ($i=0; $i <  count($listar); $i++)
			{
				

				if($listar[$i]['idHemoterapia']==1)
				{
					if($contipo1==0)
					{
						$this->_pdf->SetFillColor(255,204,204);
						$this->_pdf->Cell(80,5,utf8_decode('TIPO I'),1,0,'C',1);	
						$this->_pdf->Cell(14,5,round($sumtipo1enero,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(16,5,round($sumtipo1febrero,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(14,5,round($sumtipo1marzo,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo1abril,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo1mayo,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo1junio,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo1julio,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(16,5,round($sumtipo1agosto,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(19,5,round($sumtipo1setiembre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(17,5,round($sumtipo1ocutbre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(19,5,round($sumtipo1noviembre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(18,5,round($sumtipo1diciembre,1).'%',1,0,'C',1);	

						$this->_pdf->Ln(5);
						$this->_pdf->SetFillColor(254,000,000);
						$contipo1++;
					}
					if($listar[$i]['idSector']==1)
					{
						if($contsect1==0)
						{
							$this->_pdf->SetFont('Arial','B',7);
							$this->_pdf->SetFillColor(255,255,153);
							$this->_pdf->Cell(80,5,utf8_decode('Hospitales y/o Institutos-MINSA '),1,0,'C',1);
							$this->_pdf->Cell(14,5,((($porcentaje[1][3])/$totaltipo1minsa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,((($porcentaje[9][3])/$totaltipo1minsa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(14,5,((($porcentaje[17][3])/$totaltipo1minsa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,((($porcentaje[25][3])/$totaltipo1minsa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,((($porcentaje[33][3])/$totaltipo1minsa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,((($porcentaje[41][3])/$totaltipo1minsa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,((($porcentaje[49][3])/$totaltipo1minsa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,((($porcentaje[57][3])/$totaltipo1minsa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(19,5,((($porcentaje[65][3])/$totaltipo1minsa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(17,5,((($porcentaje[73][3])/$totaltipo1minsa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(19,5,((($porcentaje[81][3])/$totaltipo1minsa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(18,5,(((	$porcentaje[89][3])/$totaltipo1minsa)*100).'%'	,1,0,'C',1);
							$this->_pdf->Ln(5);
							$contsect1++;
							$this->_pdf->SetFillColor(254,000,000);
						}
						$this->_pdf->SetFont('Arial','',5);
						$this->_pdf->Cell(80,5,utf8_decode($listar[$i]['Establecimiento']),1,0,'L');
						if($listar[$i]['1']==0){$this->_pdf->Cell(14,5,'',1,C,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['2']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['3']==0){$this->_pdf->Cell(14,5,'',1,0,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['4']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['5']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['6']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['7']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['8']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['9']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['10']==0){$this->_pdf->Cell(17,5,'',1,0,'L',true);}else{$this->_pdf->Cell(17,5,'X',1,0,'C');}
						if($listar[$i]['11']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['12']==0){$this->_pdf->Cell(18,5,'',1,0,'L',true);}else{$this->_pdf->Cell(18,5,'X',1,0,'C');}
						$this->_pdf->Ln(5);
					}
				}
			}
			for ($i=0; $i <  count($listar); $i++)
			{
				

				if($listar[$i]['idHemoterapia']==1)
				{
					if($contipo1==0)
					{
						$this->_pdf->SetFillColor(255,204,204);
						$this->_pdf->Cell(80,5,utf8_decode('TIPO I'),1,0,'C',1);	
						$this->_pdf->Cell(14,5,round($sumtipo1enero,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(16,5,round($sumtipo1febrero,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(14,5,round($sumtipo1marzo,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo1abril,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo1mayo,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo1junio,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo1julio,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(16,5,round($sumtipo1agosto,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(19,5,round($sumtipo1setiembre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(17,5,round($sumtipo1ocutbre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(19,5,round($sumtipo1noviembre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(18,5,round($sumtipo1diciembre,1).'%',1,0,'C',1);	

						$this->_pdf->Ln(5);
						$this->_pdf->SetFillColor(254,000,000);
						$contipo1++;
					}
					if($listar[$i]['idSector']==2)
					{
						if($contsect2==0)
						{
							$this->_pdf->SetFont('Arial','B',7);
							$this->_pdf->SetFillColor(255,255,153);
							$this->_pdf->Cell(80,5,utf8_decode('Essalud'),1,0,'C',1);
							$this->_pdf->Cell(14,5,((($porcentaje[2][3])/$totaltipo1essalud)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,((($porcentaje[10][3])/$totaltipo1essalud)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(14,5,((($porcentaje[18][3])/$totaltipo1essalud)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,((($porcentaje[26][3])/$totaltipo1essalud)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,((($porcentaje[34][3])/$totaltipo1essalud)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,((($porcentaje[42][3])/$totaltipo1essalud)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,((($porcentaje[50][3])/$totaltipo1essalud)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,((($porcentaje[58][3])/$totaltipo1essalud)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(19,5,((($porcentaje[66][3])/$totaltipo1essalud)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(17,5,((($porcentaje[74][3])/$totaltipo1essalud)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(19,5,((($porcentaje[82][3])/$totaltipo1essalud)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(18,5,((($porcentaje[90][3])/$totaltipo1essalud)*100).'%',1,0,'C',1);
							$this->_pdf->Ln(5);
							$this->_pdf->SetFillColor(255,255,153);
							$contsect2++;
						}
						$this->_pdf->SetFont('Arial','',5);
						$this->_pdf->Cell(80,5,utf8_decode($listar[$i]['Establecimiento']),1,0,'L');
						if($listar[$i]['1']==0){$this->_pdf->Cell(14,5,'',1,C,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['2']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['3']==0){$this->_pdf->Cell(14,5,'',1,0,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['4']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['5']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['6']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['7']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['8']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['9']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['10']==0){$this->_pdf->Cell(17,5,'',1,0,'L',true);}else{$this->_pdf->Cell(17,5,'X',1,0,'C');}
						if($listar[$i]['11']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['12']==0){$this->_pdf->Cell(18,5,'',1,0,'L',true);}else{$this->_pdf->Cell(18,5,'X',1,0,'C');}
						$this->_pdf->Ln(5);
					}
				}
			}
			for ($i=0; $i <  count($listar); $i++)
			{
				

				if($listar[$i]['idHemoterapia']==1)
				{
					if($contipo1==0)
					{
						$this->_pdf->SetFillColor(255,204,204);
						$this->_pdf->Cell(80,5,utf8_decode('TIPO I'),1,0,'C',1);	
						$this->_pdf->Cell(14,5,round($sumtipo1enero,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(16,5,round($sumtipo1febrero,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(14,5,round($sumtipo1marzo,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo1abril,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo1mayo,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo1junio,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo1julio,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(16,5,round($sumtipo1agosto,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(19,5,round($sumtipo1setiembre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(17,5,round($sumtipo1ocutbre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(19,5,round($sumtipo1noviembre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(18,5,round($sumtipo1diciembre,1).'%',1,0,'C',1);		

						$this->_pdf->Ln(5);
						$this->_pdf->SetFillColor(254,000,000);
						$contipo1++;
					}
					if($listar[$i]['idSector']==4)
					{
						if($contsect4==0)
						{
							$this->_pdf->SetFont('Arial','B',7);
							$this->_pdf->SetFillColor(255,255,153);
							$this->_pdf->Cell(80,5,utf8_decode('FF.AA. / PNP '),1,0,'C',1);	
							$this->_pdf->Cell(14,5,((($porcentaje[3][3])/$totaltipo1ffaa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,((($porcentaje[11][3])/$totaltipo1ffaa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(14,5,((($porcentaje[19][3])/$totaltipo1ffaa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,((($porcentaje[27][3])/$totaltipo1ffaa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,((($porcentaje[35][3])/$totaltipo1ffaa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,((($porcentaje[43][3])/$totaltipo1ffaa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,((($porcentaje[51][3])/$totaltipo1ffaa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,((($porcentaje[59][3])/$totaltipo1ffaa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(19,5,((($porcentaje[67][3])/$totaltipo1ffaa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(17,5,((($porcentaje[75][3])/$totaltipo1ffaa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(19,5,((($porcentaje[83][3])/$totaltipo1ffaa)*100).'%',1,0,'C',1);
							$this->_pdf->Cell(18,5,((($porcentaje[91][3])/$totaltipo1ffaa)*100).'%',1,0,'C',1);
							$this->_pdf->Ln(5);
							$this->_pdf->SetFillColor(254,000,000);
							$contsect4++;
						}
						$this->_pdf->SetFont('Arial','',5);
						$this->_pdf->Cell(80,5,utf8_decode($listar[$i]['Establecimiento']),1,0,'L');
						if($listar[$i]['1']==0){$this->_pdf->Cell(14,5,'',1,C,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['2']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['3']==0){$this->_pdf->Cell(14,5,'',1,0,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['4']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['5']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['6']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['7']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['8']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['9']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['10']==0){$this->_pdf->Cell(17,5,'',1,0,'L',true);}else{$this->_pdf->Cell(17,5,'X',1,0,'C');}
						if($listar[$i]['11']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['12']==0){$this->_pdf->Cell(18,5,'',1,0,'L',true);}else{$this->_pdf->Cell(18,5,'X',1,0,'C');}
						$this->_pdf->Ln(5);
					}
				}
			}
			for ($i=0; $i <  count($listar); $i++)
			{
				

				if($listar[$i]['idHemoterapia']==2)
				{
					if($contipo2==0)
					{
						$this->_pdf->SetFillColor(255,204,204);
						$this->_pdf->SetFont('Arial','B',7);
						$this->_pdf->Cell(80,5,utf8_decode('TIPO II'),1,0,'C',1);
						$this->_pdf->Cell(14,5,round($sumtipo2enero,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(16,5,round($sumtipo2febrero,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(14,5,round($sumtipo2marzo,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo2abril,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo2mayo,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo2junio,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo2julio,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(16,5,round($sumtipo2agosto,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(19,5,round($sumtipo2setiembre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(17,5,round($sumtipo2ocutbre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(19,5,round($sumtipo2noviembre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(18,5,round($sumtipo2diciembre,1).'%',1,0,'C',1);	
						$this->_pdf->Ln(5);
						$this->_pdf->SetFillColor(254,000,000);
						$contipo2++;
					}
					if($listar[$i]['idSector']==3)
					{
						if($contsect3==1||$contsect3==0)
						{
							$this->_pdf->SetFont('Arial','B',7);
							$this->_pdf->SetFillColor(255,255,153);
							$this->_pdf->Cell(80,5,utf8_decode('Clinicas Privadas '),1,0,'C',1);
							$this->_pdf->Cell(14,5,round(((($porcentaje[4][3])/$totaltipo2privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,round(((($porcentaje[12][3])/$totaltipo2privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(14,5,round(((($porcentaje[20][3])/$totaltipo2privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[28][3])/$totaltipo2privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[36][3])/$totaltipo2privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[44][3])/$totaltipo2privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[52][3])/$totaltipo2privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,round(((($porcentaje[60][3])/$totaltipo2privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(19,5,round(((($porcentaje[68][3])/$totaltipo2privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(17,5,round(((($porcentaje[76][3])/$totaltipo2privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(19,5,round(((($porcentaje[84][3])/$totaltipo2privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(18,5,round(((($porcentaje[92][3])/$totaltipo2privado)*100),1).'%',1,0,'C',1);
							$this->_pdf->SetFillColor(255,000,000);
							$this->_pdf->Ln(5);
							$contsect3=$contsect3+2;
						}
						$this->_pdf->SetFont('Arial','',5);
						$this->_pdf->Cell(80,5,utf8_decode($listar[$i]['Establecimiento']),1,0,'L');
						if($listar[$i]['1']==0){$this->_pdf->Cell(14,5,'',1,C,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['2']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['3']==0){$this->_pdf->Cell(14,5,'',1,0,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['4']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['5']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['6']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['7']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['8']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['9']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['10']==0){$this->_pdf->Cell(17,5,'',1,0,'L',true);}else{$this->_pdf->Cell(17,5,'X',1,0,'C');}
						if($listar[$i]['11']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['12']==0){$this->_pdf->Cell(18,5,'',1,0,'L',true);}else{$this->_pdf->Cell(18,5,'X',1,0,'C');}
						$this->_pdf->Ln(5);
					}
				}
			}
			for ($i=0; $i <  count($listar); $i++)
			{
				

				if($listar[$i]['idHemoterapia']==2)
				{
					if($contipo2==0)
					{
						$this->_pdf->SetFillColor(255,204,204);
						$this->_pdf->SetFont('Arial','B',7);
						$this->_pdf->Cell(80,5,utf8_decode('TIPO II'),1,0,'C',1);
						$this->_pdf->Cell(14,5,round($sumtipo2enero,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(16,5,round($sumtipo2febrero,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(14,5,round($sumtipo2marzo,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo2abril,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo2mayo,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo2junio,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo2julio,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(16,5,round($sumtipo2agosto,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(19,5,round($sumtipo2setiembre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(17,5,round($sumtipo2ocutbre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(19,5,round($sumtipo2noviembre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(18,5,round($sumtipo2diciembre,1).'%',1,0,'C',1);	
						$this->_pdf->Ln(5);
						$this->_pdf->SetFillColor(254,000,000);
						$contipo2++;
					}
					if($listar[$i]['idSector']==1)
					{
						if($contsect1==1||$contsect1==0)
						{
							$this->_pdf->SetFont('Arial','B',7);
							$this->_pdf->SetFillColor(255,255,153);
							$this->_pdf->Cell(80,5,utf8_decode('Hospitales y/o Institutos-MINSA '),1,0,'C',1);
							$this->_pdf->Cell(14,5,round(((($porcentaje[5][3])/$totaltipo2minsa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,round(((($porcentaje[13][3])/$totaltipo2minsa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(14,5,round(((($porcentaje[21][3])/$totaltipo2minsa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[29][3])/$totaltipo2minsa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[37][3])/$totaltipo2minsa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[45][3])/$totaltipo2minsa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[53][3])/$totaltipo2minsa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,round(((($porcentaje[61][3])/$totaltipo2minsa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(19,5,round(((($porcentaje[69][3])/$totaltipo2minsa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(17,5,round(((($porcentaje[77][3])/$totaltipo2minsa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(19,5,round(((($porcentaje[85][3])/$totaltipo2minsa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(18,5,round(((($porcentaje[93][3])/$totaltipo2minsa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Ln(5);
							$contsect1=$contsect1+2;
							$this->_pdf->SetFillColor(255,000,000);
						}
						$this->_pdf->SetFont('Arial','',5);
						$this->_pdf->Cell(80,5,utf8_decode($listar[$i]['Establecimiento']),1,0,'L');
						if($listar[$i]['1']==0){$this->_pdf->Cell(14,5,'',1,C,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['2']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['3']==0){$this->_pdf->Cell(14,5,'',1,0,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['4']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['5']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['6']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['7']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['8']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['9']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['10']==0){$this->_pdf->Cell(17,5,'',1,0,'L',true);}else{$this->_pdf->Cell(17,5,'X',1,0,'C');}
						if($listar[$i]['11']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['12']==0){$this->_pdf->Cell(18,5,'',1,0,'L',true);}else{$this->_pdf->Cell(18,5,'X',1,0,'C');}
						$this->_pdf->Ln(5);
					}
				}
			}
			for ($i=0; $i <  count($listar); $i++)
			{
				

				if($listar[$i]['idHemoterapia']==2)
				{
					if($contipo2==0)
					{
						$this->_pdf->SetFillColor(255,204,204);
						$this->_pdf->SetFont('Arial','B',7);
						$this->_pdf->Cell(80,5,utf8_decode('TIPO II'),1,0,'C',1);
						$this->_pdf->Cell(14,5,round($sumtipo2enero,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(16,5,round($sumtipo2febrero,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(14,5,round($sumtipo2marzo,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo2abril,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo2mayo,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo2junio,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo2julio,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(16,5,round($sumtipo2agosto,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(19,5,round($sumtipo2setiembre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(17,5,round($sumtipo2ocutbre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(19,5,round($sumtipo2noviembre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(18,5,round($sumtipo2diciembre,1).'%',1,0,'C',1);	
						$this->_pdf->Ln(5);
						$this->_pdf->SetFillColor(254,000,000);
						$contipo2++;
					}
					if($listar[$i]['idSector']==2)
					{
						if($contsect2==1||$contsect2==0)
						{
							$this->_pdf->SetFont('Arial','B',7);
							$this->_pdf->SetFillColor(255,255,153);
							$this->_pdf->Cell(80,5,utf8_decode('Essalud'),1,0,'C',1);
							$this->_pdf->Cell(14,5,round(((($porcentaje[6][3])/$totaltipo2essalud)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,round(((($porcentaje[14][3])/$totaltipo2essalud)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(14,5,round(((($porcentaje[22][3])/$totaltipo2essalud)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[30][3])/$totaltipo2essalud)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[38][3])/$totaltipo2essalud)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[46][3])/$totaltipo2essalud)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[54][3])/$totaltipo2essalud)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,round(((($porcentaje[62][3])/$totaltipo2essalud)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(19,5,round(((($porcentaje[70][3])/$totaltipo2essalud)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(17,5,round(((($porcentaje[78][3])/$totaltipo2essalud)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(19,5,round(((($porcentaje[86][3])/$totaltipo2essalud)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(18,5,round(((($porcentaje[94][3])/$totaltipo2essalud)*100),1).'%',1,0,'C',1);
							$this->_pdf->Ln(5);
							$contsect2=$contsect2+2;
							$this->_pdf->SetFillColor(254,000,000);
						}
						$this->_pdf->SetFont('Arial','',5);
						$this->_pdf->Cell(80,5,utf8_decode($listar[$i]['Establecimiento']),1,0,'L');
						if($listar[$i]['1']==0){$this->_pdf->Cell(14,5,'',1,C,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['2']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['3']==0){$this->_pdf->Cell(14,5,'',1,0,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['4']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['5']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['6']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['7']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['8']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['9']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['10']==0){$this->_pdf->Cell(17,5,'',1,0,'L',true);}else{$this->_pdf->Cell(17,5,'X',1,0,'C');}
						if($listar[$i]['11']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['12']==0){$this->_pdf->Cell(18,5,'',1,0,'L',true);}else{$this->_pdf->Cell(18,5,'X',1,0,'C');}
						$this->_pdf->Ln(5);
					}
				}
			}
			for ($i=0; $i <  count($listar); $i++)
			{
				

				if($listar[$i]['idHemoterapia']==2)
				{
					if($contipo2==0)
					{
						$this->_pdf->SetFillColor(255,204,204);
						$this->_pdf->SetFont('Arial','B',7);
						$this->_pdf->Cell(80,5,utf8_decode('TIPO II'),1,0,'C',1);
						$this->_pdf->Cell(14,5,round($sumtipo2enero,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(16,5,round($sumtipo2febrero,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(14,5,round($sumtipo2marzo,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo2abril,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo2mayo,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo2junio,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(13,5,round($sumtipo2julio,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(16,5,round($sumtipo2agosto,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(19,5,round($sumtipo2setiembre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(17,5,round($sumtipo2ocutbre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(19,5,round($sumtipo2noviembre,1).'%',1,0,'C',1);	
						$this->_pdf->Cell(18,5,round($sumtipo2diciembre,1).'%',1,0,'C',1);		
						$this->_pdf->Ln(5);
						$this->_pdf->SetFillColor(254,000,000);
						$contipo2++;
					}
					if($listar[$i]['idSector']==4)
					{
						if($contsect4==1||$contsect4==0)
						{
							$this->_pdf->SetFont('Arial','B',7);
							$this->_pdf->SetFillColor(255,255,153);
							$this->_pdf->Cell(80,5,utf8_decode('FF.AA. / PNP '),1,0,'C',1);
							$this->_pdf->Cell(14,5,round(((($porcentaje[7][3])/$totaltipo2ffaa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,round(((($porcentaje[15][3])/$totaltipo2ffaa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(14,5,round(((($porcentaje[23][3])/$totaltipo2ffaa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[31][3])/$totaltipo2ffaa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[39][3])/$totaltipo2ffaa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[47][3])/$totaltipo2ffaa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(13,5,round(((($porcentaje[55][3])/$totaltipo2ffaa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,round(((($porcentaje[63][3])/$totaltipo2ffaa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(19,5,round(((($porcentaje[71][3])/$totaltipo2ffaa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(17,5,round(((($porcentaje[79][3])/$totaltipo2ffaa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(19,5,round(((($porcentaje[87][3])/$totaltipo2ffaa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Cell(18,5,round(((($porcentaje[95][3])/$totaltipo2ffaa)*100),1).'%',1,0,'C',1);
							$this->_pdf->Ln(5);
							$this->_pdf->SetFillColor(254,000,000);
							$contsect4=$contsect4+2;
						}
						$this->_pdf->SetFont('Arial','',5);
						$this->_pdf->Cell(80,5,utf8_decode($listar[$i]['Establecimiento']),1,0,'L');
						if($listar[$i]['1']==0){$this->_pdf->Cell(14,5,'',1,C,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['2']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['3']==0){$this->_pdf->Cell(14,5,'',1,0,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['4']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['5']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['6']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['7']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['8']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['9']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['10']==0){$this->_pdf->Cell(17,5,'',1,0,'L',true);}else{$this->_pdf->Cell(17,5,'X',1,0,'C');}
						if($listar[$i]['11']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['12']==0){$this->_pdf->Cell(18,5,'',1,0,'L',true);}else{$this->_pdf->Cell(18,5,'X',1,0,'C');}
						$this->_pdf->Ln(5);
					}
				}
			}

			$this->_pdf->Output();
			
		}

		public function ReporteBSCh($listar)
		{

			$totaltipo1privado=0;
			for($i=0; $i <  count($listar); $i++)
			{
				if($listar[$i]['idHemoterapia']=='1')
				{
					$totaltipo1=$totaltipo1+1;
					if($listar[$i]['idSector']=='1')
					{
						$totaltipo1minsa=$totaltipo1minsa+1;
						for($j=1;$j<=12;$j++)
						{
							$porcentajetipo1minsa[$j]=$porcentajetipo1minsa[$j]+$listar[$i][$j];
						}
					}elseif($listar[$i]['idSector']=='2')
					{
						$totaltipo1essalud=$totaltipo1essalud+1;
						for($j=1;$j<=12;$j++)
						{
							$porcentajetipo1essalud[$j]=$porcentajetipo1essalud[$j]+$listar[$i][$j];
						}
					}elseif($listar[$i]['idSector']=='3')
					{
						$totaltipo1privado=$totaltipo1privado+1;
						for($j=1;$j<=12;$j++)
						{
								$porcentajetipo1privado[$j]=$porcentajetipo1privado[$j]+$listar[$i][$j];
						}
					}elseif($listar[$i]['idSector']=='4')
					{
						$totaltipo1ffaa=$totaltipo1ffaa+1;
						for($j=1;$j<=12;$j++)
						{
							$porcentajetipo1ffaa[$j]=$porcentajetipo1ffaa[$j]+$listar[$i][$j];
						}
					}
				}
				elseif($listar[$i]['idHemoterapia']=='2')
				{
					$totaltipo2=$totaltipo2+1;
					if($listar[$i]['idSector']=='1')
					{
						$totaltipo2minsa=$totaltipo2minsa+1;
						for($j=1;$j<=12;$j++)
						{
							$porcentajetipo2minsa[$j]=$porcentajetipo2minsa[$j]+$listar[$i][$j];
						}
					}elseif($listar[$i]['idSector']=='2')
					{
						$totaltipo2essalud=$totaltipo2essalud+1;
						for($j=1;$j<=12;$j++)
						{
							$porcentajetipo2essalud[$j]=$porcentajetipo2essalud[$j]+$listar[$i][$j];
						}
					}elseif($listar[$i]['idSector']=='3')
					{
						$totaltipo2privado=$totaltipo2privado+1;
						for($j=1;$j<=12;$j++)
						{
							$porcentajetipo2privado[$j]=$porcentajetipo2privado[$j]+$listar[$i][$j];
						}
					}elseif($listar[$i]['idSector']=='4')
					{
						$totaltipo2ffaa=$totaltipo2ffaa+1;
						for($j=1;$j<=12;$j++)
						{
							$porcentajetipo2ffaa[$j]=$porcentajetipo2ffaa[$j]+$listar[$i][$j];
						}
					}
				}
			}

			for($k=1;$k<=12;$k++)
			{

				$cabtipo1[$k]=round((($porcentajetipo1minsa[$k]+$porcentajetipo1essalud[$k]+$porcentajetipo1privado[$k]+$porcentajetipo1ffaa[$k])/$totaltipo1)*100,2);
				$cabtipo2[$k]=round((($porcentajetipo2minsa[$k]+$porcentajetipo2essalud[$k]+$porcentajetipo2privado[$k]+$porcentajetipo2ffaa[$k])/$totaltipo2)*100,2);
				$cabtipo1minsa[$k]=round(($porcentajetipo1minsa[$k]/$totaltipo1minsa)*100,2);
				if($totaltipo1essalud!=0){$cabtipo1essalud[$k]=round(($porcentajetipo1essalud[$k]/$totaltipo1essalud)*100,2);}else{$cabtipo1essalud[$k]=0;}
				if($totaltipo1privado!=0){$cabtipo1privado[$k]=round(($porcentajetipo1privado[$k]/$totaltipo1privado)*100,2);}else{$cabtipo1privado[$k]=0;}
				if($totaltipo1ffaa!=0){$cabtipo1ffaa[$k]=round(($porcentajetipo1ffaa[$k]/$totaltipo1ffaa)*100,2);}else{$cabtipo1ffaa[$k]=0;}
				$cabtipo2minsa[$k]=round(($porcentajetipo2minsa[$k]/$totaltipo2minsa)*100,2);
				if($totaltipo2essalud!=0){$cabtipo2essalud[$k]=round(($porcentajetipo2essalud[$k]/$totaltipo2essalud)*100,2);}else{$cabtipo2essalud[$k]=0;}
				if($totaltipo2privado!=0){$cabtipo2privado[$k]=round(($porcentajetipo2privado[$k]/$totaltipo2privado)*100,2);}else{$cabtipo2privado[$k]=0;}
				if($totaltipo2ffaa!=0){$cabtipo2ffaa[$k]=round(($porcentajetipo2ffaa[$k]/$totaltipo2ffaa)*100,2);}else{$cabtipo2ffaa[$k]=0;}


			}

			$this->_pdf = new FPDF('L','mm','A4');
			$this->_pdf->AddPage();
			$this->_pdf->SetFillColor(254,000,000);
			$this->_pdf->Image('publico'.DS.'img'.DS.'reportes'.DS.'pronahebascabecera.jpg',10,5,270);
			  // Arial bold 15
		    $this->_pdf->SetFont('Arial','',8);
		    // Título

		    $this->_pdf->Ln(24);
		    $this->_pdf->Cell(80,4,utf8_decode('ESTABLECIMIENTOS DE SALUD:'),1,0,'C');
		    $this->_pdf->Cell(14,4,utf8_decode('ENERO'),1,0,'C');
		    $this->_pdf->Cell(16,4,utf8_decode('FEBRERO'),1,0,'C');
		    $this->_pdf->Cell(14,4,utf8_decode('MARZO'),1,0,'C');
		    $this->_pdf->Cell(13,4,utf8_decode('ABRIL'),1,0,'C');
		    $this->_pdf->Cell(13,4,utf8_decode('MAYO'),1,0,'C');
		    $this->_pdf->Cell(13,4,utf8_decode('JUNIO'),1,0,'C');
		    $this->_pdf->Cell(13,4,utf8_decode('JULIO'),1,0,'C');
		    $this->_pdf->Cell(16,4,utf8_decode('AGOSTO'),1,0,'C');
		    $this->_pdf->Cell(19,4,utf8_decode('SETIEMBRE'),1,0,'C');
		    $this->_pdf->Cell(17,4,utf8_decode('OCUTBRE'),1,0,'C');
		    $this->_pdf->Cell(19,4,utf8_decode('NOVIEMBRE'),1,0,'C');
		    $this->_pdf->Cell(18,4,utf8_decode('DICIEMBRE'),1,0,'C');
		    $this->_pdf->Ln(4);
		    $this->_pdf->SetFont('Arial','B',7);
		  /*  $this->_pdf->Cell(40,5,utf8_decode('TIPO I'),1,0,'C');
		    $this->_pdf->Ln(5);
		    $this->_pdf->Cell(40,5,utf8_decode('Clinicas Privadas '),1,0,'C');*/

		    $contipo1=0;
		    $contipo2=0;
		    $contsect1=0;
		    $contsect2=0;
		    $contsect3=0;
		    $contsect4=0;
		    //TIPO I  Y MINSA
			for ($i=0; $i <  count($listar); $i++)
			{
				if($listar[$i]['idHemoterapia']==1)
				{
					if($contipo1==0)
					{
						$this->_pdf->SetFillColor(255,204,204);
						$this->_pdf->Cell(80,5,utf8_decode('TIPO I'),1,0,'C',1);
						$this->_pdf->Cell(14,5,$cabtipo1[1].'%',1,0,'C',1);
						$this->_pdf->Cell(16,5,$cabtipo1[2].'%',1,0,'C',1);
					    $this->_pdf->Cell(14,5,$cabtipo1[3].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo1[4].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo1[5].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo1[6].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo1[7].'%',1,0,'C',1);
					    $this->_pdf->Cell(16,5,$cabtipo1[8].'%',1,0,'C',1);
					    $this->_pdf->Cell(19,5,$cabtipo1[9].'%',1,0,'C',1);
					    $this->_pdf->Cell(17,5,$cabtipo1[10].'%',1,0,'C',1);
					    $this->_pdf->Cell(19,5,$cabtipo1[11].'%',1,0,'C',1);
					    $this->_pdf->Cell(18,5,$cabtipo1[12].'%',1,0,'C',1);
						$this->_pdf->Ln(5);
						$this->_pdf->SetFillColor(254,000,000);
						$contipo1=$contipo1+1;
					}
					if($listar[$i]['idSector']==1)
					{
						if($contsect1==0)
						{
							$this->_pdf->SetFont('Arial','B',7);
							$this->_pdf->SetFillColor(255,255,153);
							$this->_pdf->Cell(80,5,utf8_decode('Hospitales y/o Institutos-MINSA'),1,0,'C',1);
							$this->_pdf->Cell(14,5,$cabtipo1minsa[1].'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,$cabtipo1minsa[2].'%',1,0,'C',1);
						    $this->_pdf->Cell(14,5,$cabtipo1minsa[3].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo1minsa[4].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo1minsa[5].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo1minsa[6].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo1minsa[7].'%',1,0,'C',1);
						    $this->_pdf->Cell(16,5,$cabtipo1minsa[8].'%',1,0,'C',1);
						    $this->_pdf->Cell(19,5,$cabtipo1minsa[9].'%',1,0,'C',1);
						    $this->_pdf->Cell(17,5,$cabtipo1minsa[10].'%',1,0,'C',1);
						    $this->_pdf->Cell(19,5,$cabtipo1minsa[11].'%',1,0,'C',1);
						    $this->_pdf->Cell(18,5,$cabtipo1minsa[12].'%',1,0,'C',1);
							$this->_pdf->Ln(5);
							$this->_pdf->SetFillColor(254,000,000);
							$contsect1=$contsect1+1;
						}
						$this->_pdf->SetFont('Arial','',5);
						$this->_pdf->Cell(80,5,utf8_decode($listar[$i]['Establecimiento']),1,0,'L');
						if($listar[$i]['1']==0){$this->_pdf->Cell(14,5,'',1,C,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['2']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['3']==0){$this->_pdf->Cell(14,5,'',1,0,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['4']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['5']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['6']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['7']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['8']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['9']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['10']==0){$this->_pdf->Cell(17,5,'',1,0,'L',true);}else{$this->_pdf->Cell(17,5,'X',1,0,'C');}
						if($listar[$i]['11']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['12']==0){$this->_pdf->Cell(18,5,'',1,0,'L',true);}else{$this->_pdf->Cell(18,5,'X',1,0,'C');}
						$this->_pdf->Ln(5); 	
					}	
				}
			}
			//TIPO I  Y ESSALUD
			for ($i=0; $i <  count($listar); $i++)
			{
				if($listar[$i]['idHemoterapia']==1)
				{
					if($contipo1==0)
					{
						$this->_pdf->SetFillColor(255,204,204);
						$this->_pdf->Cell(80,5,utf8_decode('TIPO I'),1,0,'C',1);
						$this->_pdf->Cell(14,5,$cabtipo1[1].'%',1,0,'C',1);
						$this->_pdf->Cell(16,5,$cabtipo1[2].'%',1,0,'C',1);
					    $this->_pdf->Cell(14,5,$cabtipo1[3].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo1[4].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo1[5].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo1[6].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo1[7].'%',1,0,'C',1);
					    $this->_pdf->Cell(16,5,$cabtipo1[8].'%',1,0,'C',1);
					    $this->_pdf->Cell(19,5,$cabtipo1[9].'%',1,0,'C',1);
					    $this->_pdf->Cell(17,5,$cabtipo1[10].'%',1,0,'C',1);
					    $this->_pdf->Cell(19,5,$cabtipo1[11].'%',1,0,'C',1);
					    $this->_pdf->Cell(18,5,$cabtipo1[12].'%',1,0,'C',1);
						$this->_pdf->Ln(5);
						$this->_pdf->SetFillColor(254,000,000);
						$contipo1=$contipo1+1;
					}
					if($listar[$i]['idSector']==2)
					{
						if($contsect2==0)
						{
							$this->_pdf->SetFont('Arial','B',7);
							$this->_pdf->SetFillColor(255,255,153);
							$this->_pdf->Cell(80,5,utf8_decode('ESSALUD'),1,0,'C',1);
							$this->_pdf->Cell(14,5,$cabtipo1essalud[1].'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,$cabtipo1essalud[2].'%',1,0,'C',1);
						    $this->_pdf->Cell(14,5,$cabtipo1essalud[3].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo1essalud[4].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo1essalud[5].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo1essalud[6].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo1essalud[7].'%',1,0,'C',1);
						    $this->_pdf->Cell(16,5,$cabtipo1essalud[8].'%',1,0,'C',1);
						    $this->_pdf->Cell(19,5,$cabtipo1essalud[9].'%',1,0,'C',1);
						    $this->_pdf->Cell(17,5,$cabtipo1essalud[10].'%',1,0,'C',1);
						    $this->_pdf->Cell(19,5,$cabtipo1essalud[11].'%',1,0,'C',1);
						    $this->_pdf->Cell(18,5,$cabtipo1essalud[12].'%',1,0,'C',1);
							$this->_pdf->Ln(5);
							$this->_pdf->SetFillColor(254,000,000);
							$contsect2=$contsect2+1;
						}
						$this->_pdf->SetFont('Arial','',5);
						$this->_pdf->Cell(80,5,utf8_decode($listar[$i]['Establecimiento']),1,0,'L');
						if($listar[$i]['1']==0){$this->_pdf->Cell(14,5,'',1,C,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['2']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['3']==0){$this->_pdf->Cell(14,5,'',1,0,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['4']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['5']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['6']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['7']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['8']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['9']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['10']==0){$this->_pdf->Cell(17,5,'',1,0,'L',true);}else{$this->_pdf->Cell(17,5,'X',1,0,'C');}
						if($listar[$i]['11']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['12']==0){$this->_pdf->Cell(18,5,'',1,0,'L',true);}else{$this->_pdf->Cell(18,5,'X',1,0,'C');}
						$this->_pdf->Ln(5); 	
					}	
				}
			}
			//TIPO I  Y PRIVADOS
			for ($i=0; $i <  count($listar); $i++)
			{
				if($listar[$i]['idHemoterapia']==1)
				{
					if($contipo1==0)
					{
						$this->_pdf->SetFillColor(255,204,204);
						$this->_pdf->Cell(80,5,utf8_decode('TIPO I'),1,0,'C',1);
						$this->_pdf->Cell(14,5,$cabtipo1[1].'%',1,0,'C',1);
						$this->_pdf->Cell(16,5,$cabtipo1[2].'%',1,0,'C',1);
					    $this->_pdf->Cell(14,5,$cabtipo1[3].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo1[4].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo1[5].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo1[6].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo1[7].'%',1,0,'C',1);
					    $this->_pdf->Cell(16,5,$cabtipo1[8].'%',1,0,'C',1);
					    $this->_pdf->Cell(19,5,$cabtipo1[9].'%',1,0,'C',1);
					    $this->_pdf->Cell(17,5,$cabtipo1[10].'%',1,0,'C',1);
					    $this->_pdf->Cell(19,5,$cabtipo1[11].'%',1,0,'C',1);
					    $this->_pdf->Cell(18,5,$cabtipo1[12].'%',1,0,'C',1);
						$this->_pdf->Ln(5);
						$this->_pdf->SetFillColor(254,000,000);
						$contipo1=$contipo1+1;
					}
					if($listar[$i]['idSector']==3)
					{
						if($contsect3==0)
						{
							$this->_pdf->SetFont('Arial','B',7);
							$this->_pdf->SetFillColor(255,255,153);
							$this->_pdf->Cell(80,5,utf8_decode('Clinicas Privadas '),1,0,'C',1);
							$this->_pdf->Cell(14,5,$cabtipo1privado[1].'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,$cabtipo1privado[2].'%',1,0,'C',1);
						    $this->_pdf->Cell(14,5,$cabtipo1privado[3].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo1privado[4].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo1privado[5].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo1privado[6].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo1privado[7].'%',1,0,'C',1);
						    $this->_pdf->Cell(16,5,$cabtipo1privado[8].'%',1,0,'C',1);
						    $this->_pdf->Cell(19,5,$cabtipo1privado[9].'%',1,0,'C',1);
						    $this->_pdf->Cell(17,5,$cabtipo1privado[10].'%',1,0,'C',1);
						    $this->_pdf->Cell(19,5,$cabtipo1privado[11].'%',1,0,'C',1);
						    $this->_pdf->Cell(18,5,$cabtipo1privado[12].'%',1,0,'C',1);
							$this->_pdf->Ln(5);
							$this->_pdf->SetFillColor(254,000,000);
							$contsect3=$contsect3+1;
						}
						$this->_pdf->SetFont('Arial','',5);
						$this->_pdf->Cell(80,5,utf8_decode($listar[$i]['Establecimiento']),1,0,'L');
						if($listar[$i]['1']==0){$this->_pdf->Cell(14,5,'',1,C,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['2']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['3']==0){$this->_pdf->Cell(14,5,'',1,0,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['4']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['5']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['6']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['7']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['8']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['9']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['10']==0){$this->_pdf->Cell(17,5,'',1,0,'L',true);}else{$this->_pdf->Cell(17,5,'X',1,0,'C');}
						if($listar[$i]['11']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['12']==0){$this->_pdf->Cell(18,5,'',1,0,'L',true);}else{$this->_pdf->Cell(18,5,'X',1,0,'C');}
						$this->_pdf->Ln(5); 	
					}	
				}
			}
			//TIPO I  Y FF.AA. / PNP
			for ($i=0; $i <  count($listar); $i++)
			{
				if($listar[$i]['idHemoterapia']==1)
				{
					if($contipo1==0)
					{
						$this->_pdf->SetFillColor(255,204,204);
						$this->_pdf->Cell(80,5,utf8_decode('TIPO I'),1,0,'C',1);
						$this->_pdf->Cell(14,5,$cabtipo1[1].'%',1,0,'C',1);
						$this->_pdf->Cell(16,5,$cabtipo1[2].'%',1,0,'C',1);
					    $this->_pdf->Cell(14,5,$cabtipo1[3].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo1[4].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo1[5].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo1[6].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo1[7].'%',1,0,'C',1);
					    $this->_pdf->Cell(16,5,$cabtipo1[8].'%',1,0,'C',1);
					    $this->_pdf->Cell(19,5,$cabtipo1[9].'%',1,0,'C',1);
					    $this->_pdf->Cell(17,5,$cabtipo1[10].'%',1,0,'C',1);
					    $this->_pdf->Cell(19,5,$cabtipo1[11].'%',1,0,'C',1);
					    $this->_pdf->Cell(18,5,$cabtipo1[12].'%',1,0,'C',1);
						$this->_pdf->Ln(5);
						$this->_pdf->SetFillColor(254,000,000);
						$contipo1=$contipo1+1;
					}
					if($listar[$i]['idSector']==4)
					{
						if($contsect4==0)
						{
							$this->_pdf->SetFont('Arial','B',7);
							$this->_pdf->SetFillColor(255,255,153);
							$this->_pdf->Cell(80,5,utf8_decode('FF.AA. / PNP'),1,0,'C',1);
							$this->_pdf->Cell(14,5,$cabtipo1ffaa[1].'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,$cabtipo1ffaa[2].'%',1,0,'C',1);
						    $this->_pdf->Cell(14,5,$cabtipo1ffaa[3].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo1ffaa[4].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo1ffaa[5].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo1ffaa[6].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo1ffaa[7].'%',1,0,'C',1);
						    $this->_pdf->Cell(16,5,$cabtipo1ffaa[8].'%',1,0,'C',1);
						    $this->_pdf->Cell(19,5,$cabtipo1ffaa[9].'%',1,0,'C',1);
						    $this->_pdf->Cell(17,5,$cabtipo1ffaa[10].'%',1,0,'C',1);
						    $this->_pdf->Cell(19,5,$cabtipo1ffaa[11].'%',1,0,'C',1);
						    $this->_pdf->Cell(18,5,$cabtipo1ffaa[12].'%',1,0,'C',1);
							$this->_pdf->Ln(5);
							$this->_pdf->SetFillColor(254,000,000);
							$contsect4=$contsect3+1;
						}
						$this->_pdf->SetFont('Arial','',5);
						$this->_pdf->Cell(80,5,utf8_decode($listar[$i]['Establecimiento']),1,0,'L');
						if($listar[$i]['1']==0){$this->_pdf->Cell(14,5,'',1,C,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['2']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['3']==0){$this->_pdf->Cell(14,5,'',1,0,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['4']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['5']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['6']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['7']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['8']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['9']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['10']==0){$this->_pdf->Cell(17,5,'',1,0,'L',true);}else{$this->_pdf->Cell(17,5,'X',1,0,'C');}
						if($listar[$i]['11']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['12']==0){$this->_pdf->Cell(18,5,'',1,0,'L',true);}else{$this->_pdf->Cell(18,5,'X',1,0,'C');}
						$this->_pdf->Ln(5); 	
					}	
				}
			}

			$contsect1=0;
		    $contsect2=0;
		    $contsect3=0;
		    $contsect4=0;
			for ($i=0; $i <  count($listar); $i++)
			{
				if($listar[$i]['idHemoterapia']==2)
				{
					if($contipo2==0)
					{
						$this->_pdf->SetFont('Arial','B',7);
						$this->_pdf->SetFillColor(255,204,204);
						$this->_pdf->Cell(80,5,utf8_decode('TIPO II'),1,0,'C',1);
						$this->_pdf->Cell(14,5,$cabtipo2[1].'%',1,0,'C',1);
						$this->_pdf->Cell(16,5,$cabtipo2[2].'%',1,0,'C',1);
					    $this->_pdf->Cell(14,5,$cabtipo2[3].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo2[4].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo2[5].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo2[6].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo2[7].'%',1,0,'C',1);
					    $this->_pdf->Cell(16,5,$cabtipo2[8].'%',1,0,'C',1);
					    $this->_pdf->Cell(19,5,$cabtipo2[9].'%',1,0,'C',1);
					    $this->_pdf->Cell(17,5,$cabtipo2[10].'%',1,0,'C',1);
					    $this->_pdf->Cell(19,5,$cabtipo2[11].'%',1,0,'C',1);
					    $this->_pdf->Cell(18,5,$cabtipo2[12].'%',1,0,'C',1);
						$this->_pdf->Ln(5);
						$this->_pdf->SetFillColor(254,000,000);
						$contipo2=$contipo2+1;
					}
					if($listar[$i]['idSector']==1)
					{
						if($contsect1==0)
						{
							$this->_pdf->SetFont('Arial','B',7);
							$this->_pdf->SetFillColor(255,255,153);
							$this->_pdf->Cell(80,5,utf8_decode('MINSA'),1,0,'C',1);
							$this->_pdf->Cell(14,5,$cabtipo2minsa[1].'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,$cabtipo2minsa[2].'%',1,0,'C',1);
						    $this->_pdf->Cell(14,5,$cabtipo2minsa[3].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo2minsa[4].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo2minsa[5].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo2minsa[6].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo2minsa[7].'%',1,0,'C',1);
						    $this->_pdf->Cell(16,5,$cabtipo2minsa[8].'%',1,0,'C',1);
						    $this->_pdf->Cell(19,5,$cabtipo2minsa[9].'%',1,0,'C',1);
						    $this->_pdf->Cell(17,5,$cabtipo2minsa[10].'%',1,0,'C',1);
						    $this->_pdf->Cell(19,5,$cabtipo2minsa[11].'%',1,0,'C',1);
						    $this->_pdf->Cell(18,5,$cabtipo2minsa[12].'%',1,0,'C',1);
							$this->_pdf->Ln(5);
							$this->_pdf->SetFillColor(254,000,000);
							$contsect1=$contsect1+1;
						}
						$this->_pdf->SetFont('Arial','',5);
						$this->_pdf->Cell(80,5,utf8_decode($listar[$i]['Establecimiento']),1,0,'L');
						if($listar[$i]['1']==0){$this->_pdf->Cell(14,5,'',1,C,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['2']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['3']==0){$this->_pdf->Cell(14,5,'',1,0,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['4']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['5']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['6']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['7']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['8']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['9']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['10']==0){$this->_pdf->Cell(17,5,'',1,0,'L',true);}else{$this->_pdf->Cell(17,5,'X',1,0,'C');}
						if($listar[$i]['11']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['12']==0){$this->_pdf->Cell(18,5,'',1,0,'L',true);}else{$this->_pdf->Cell(18,5,'X',1,0,'C');}
						$this->_pdf->Ln(5); 	
					}
					
				}
			}
			for ($i=0; $i <  count($listar); $i++)
			{
				if($listar[$i]['idHemoterapia']==2)
				{
					if($contipo2==0)
					{
						$this->_pdf->SetFillColor(255,204,204);
						$this->_pdf->Cell(80,5,utf8_decode('TIPO II'),1,0,'C',1);
						$this->_pdf->Cell(14,5,$cabtipo2[1].'%',1,0,'C',1);
						$this->_pdf->Cell(16,5,$cabtipo2[2].'%',1,0,'C',1);
					    $this->_pdf->Cell(14,5,$cabtipo2[3].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo2[4].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo2[5].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo2[6].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo2[7].'%',1,0,'C',1);
					    $this->_pdf->Cell(16,5,$cabtipo2[8].'%',1,0,'C',1);
					    $this->_pdf->Cell(19,5,$cabtipo2[9].'%',1,0,'C',1);
					    $this->_pdf->Cell(17,5,$cabtipo2[10].'%',1,0,'C',1);
					    $this->_pdf->Cell(19,5,$cabtipo2[11].'%',1,0,'C',1);	
					    $this->_pdf->Cell(18,5,$cabtipo2[12].'%',1,0,'C',1);
						$this->_pdf->Ln(5);
						$this->_pdf->SetFillColor(254,000,000);
						$contipo2=$contipo2+1;
					}
					if($listar[$i]['idSector']==2)
					{
						if($contsect2==0)
						{
							$this->_pdf->SetFont('Arial','B',7);
							$this->_pdf->SetFillColor(255,255,153);
							$this->_pdf->Cell(80,5,utf8_decode('ESSALUD'),1,0,'C',1);
							$this->_pdf->Cell(14,5,$cabtipo2essalud[1].'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,$cabtipo2essalud[2].'%',1,0,'C',1);
						    $this->_pdf->Cell(14,5,$cabtipo2essalud[3].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo2essalud[4].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo2essalud[5].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo2essalud[6].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo2essalud[7].'%',1,0,'C',1);
						    $this->_pdf->Cell(16,5,$cabtipo2essalud[8].'%',1,0,'C',1);
						    $this->_pdf->Cell(19,5,$cabtipo2essalud[9].'%',1,0,'C',1);
						    $this->_pdf->Cell(17,5,$cabtipo2essalud[10].'%',1,0,'C',1);
						    $this->_pdf->Cell(19,5,$cabtipo2essalud[11].'%',1,0,'C',1);
						    $this->_pdf->Cell(18,5,$cabtipo2essalud[12].'%',1,0,'C',1);
							$this->_pdf->Ln(5);
							$this->_pdf->SetFillColor(254,000,000);
							$contsect2=$contsect2+1;
						}
						$this->_pdf->SetFont('Arial','',5);
						$this->_pdf->Cell(80,5,utf8_decode($listar[$i]['Establecimiento']),1,0,'L');
						if($listar[$i]['1']==0){$this->_pdf->Cell(14,5,'',1,C,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['2']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['3']==0){$this->_pdf->Cell(14,5,'',1,0,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['4']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['5']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['6']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['7']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['8']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['9']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['10']==0){$this->_pdf->Cell(17,5,'',1,0,'L',true);}else{$this->_pdf->Cell(17,5,'X',1,0,'C');}
						if($listar[$i]['11']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['12']==0){$this->_pdf->Cell(18,5,'',1,0,'L',true);}else{$this->_pdf->Cell(18,5,'X',1,0,'C');}
						$this->_pdf->Ln(5); 	
					}
					
				}
			}
			for ($i=0; $i <  count($listar); $i++)
			{
				if($listar[$i]['idHemoterapia']==2)
				{
					if($contipo2==0)
					{
						$this->_pdf->SetFillColor(255,204,204);
						$this->_pdf->Cell(80,5,utf8_decode('TIPO II'),1,0,'C',1);
						$this->_pdf->Cell(14,5,$cabtipo2[1].'%',1,0,'C',1);
						$this->_pdf->Cell(16,5,$cabtipo2[2].'%',1,0,'C',1);
					    $this->_pdf->Cell(14,5,$cabtipo2[3].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo2[4].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo2[5].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo2[6].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo2[7].'%',1,0,'C',1);
					    $this->_pdf->Cell(16,5,$cabtipo2[8].'%',1,0,'C',1);
					    $this->_pdf->Cell(19,5,$cabtipo2[9].'%',1,0,'C',1);
					    $this->_pdf->Cell(17,5,$cabtipo2[10].'%',1,0,'C',1);
					    $this->_pdf->Cell(19,5,$cabtipo2[11].'%',1,0,'C',1);
					    $this->_pdf->Cell(18,5,$cabtipo2[12].'%',1,0,'C',1);
						$this->_pdf->Ln(5);
						$this->_pdf->SetFillColor(254,000,000);
						$contipo2=$contipo2+1;
					}
					if($listar[$i]['idSector']==3)
					{
						if($contsect3==0)
						{
							$this->_pdf->SetFont('Arial','B',7);
							$this->_pdf->SetFillColor(255,255,153);
							$this->_pdf->Cell(80,5,utf8_decode('Clinicas Privadas'),1,0,'C',1);
							$this->_pdf->Cell(14,5,$cabtipo2privado[1].'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,$cabtipo2privado[2].'%',1,0,'C',1);
						    $this->_pdf->Cell(14,5,$cabtipo2privado[3].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo2privado[4].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo2privado[5].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo2privado[6].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo2privado[7].'%',1,0,'C',1);
						    $this->_pdf->Cell(16,5,$cabtipo2privado[8].'%',1,0,'C',1);
						    $this->_pdf->Cell(19,5,$cabtipo2privado[9].'%',1,0,'C',1);
						    $this->_pdf->Cell(17,5,$cabtipo2privado[10].'%',1,0,'C',1);
						    $this->_pdf->Cell(19,5,$cabtipo2privado[11].'%',1,0,'C',1);
						    $this->_pdf->Cell(18,5,$cabtipo2privado[12].'%',1,0,'C',1);
							$this->_pdf->Ln(5);
							$this->_pdf->SetFillColor(254,000,000);
							$contsect3=$contsect3+1;
						}
						$this->_pdf->SetFont('Arial','',5);
						$this->_pdf->Cell(80,5,utf8_decode($listar[$i]['Establecimiento']),1,0,'L');
						if($listar[$i]['1']==0){$this->_pdf->Cell(14,5,'',1,C,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['2']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['3']==0){$this->_pdf->Cell(14,5,'',1,0,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['4']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['5']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['6']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['7']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['8']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['9']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['10']==0){$this->_pdf->Cell(17,5,'',1,0,'L',true);}else{$this->_pdf->Cell(17,5,'X',1,0,'C');}
						if($listar[$i]['11']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['12']==0){$this->_pdf->Cell(18,5,'',1,0,'L',true);}else{$this->_pdf->Cell(18,5,'X',1,0,'C');}
						$this->_pdf->Ln(5); 	
					}
					
				}
			}
			for ($i=0; $i <  count($listar); $i++)
			{
				if($listar[$i]['idHemoterapia']==2)
				{
					if($contipo2==0)
					{
						$this->_pdf->SetFillColor(255,204,204);
						$this->_pdf->Cell(80,5,utf8_decode('TIPO II'),1,0,'C',1);
						$this->_pdf->Cell(14,5,$cabtipo2[1].'%',1,0,'C',1);
						$this->_pdf->Cell(16,5,$cabtipo2[2].'%',1,0,'C',1);
					    $this->_pdf->Cell(14,5,$cabtipo2[3].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo2[4].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo2[5].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo2[6].'%',1,0,'C',1);
					    $this->_pdf->Cell(13,5,$cabtipo2[7].'%',1,0,'C',1);
					    $this->_pdf->Cell(16,5,$cabtipo2[8].'%',1,0,'C',1);
					    $this->_pdf->Cell(19,5,$cabtipo2[9].'%',1,0,'C',1);
					    $this->_pdf->Cell(17,5,$cabtipo2[10].'%',1,0,'C',1);
					    $this->_pdf->Cell(19,5,$cabtipo2[11].'%',1,0,'C',1);
					    $this->_pdf->Cell(18,5,$cabtipo2[12].'%',1,0,'C',1);
						$this->_pdf->Ln(5);
						$this->_pdf->SetFillColor(254,000,000);
						$contipo2=$contipo2+1;
					}
					if($listar[$i]['idSector']==4)
					{
						if($contsect4==0)
						{
							$this->_pdf->SetFont('Arial','B',7);
							$this->_pdf->SetFillColor(255,255,153);
							$this->_pdf->Cell(80,5,utf8_decode('FF.AA. / PNP'),1,0,'C',1);
							$this->_pdf->Cell(14,5,$cabtipo2ffaa[1].'%',1,0,'C',1);
							$this->_pdf->Cell(16,5,$cabtipo2ffaa[2].'%',1,0,'C',1);
						    $this->_pdf->Cell(14,5,$cabtipo2ffaa[3].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo2ffaa[4].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo2ffaa[5].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo2ffaa[6].'%',1,0,'C',1);
						    $this->_pdf->Cell(13,5,$cabtipo2ffaa[7].'%',1,0,'C',1);
						    $this->_pdf->Cell(16,5,$cabtipo2ffaa[8].'%',1,0,'C',1);
						    $this->_pdf->Cell(19,5,$cabtipo2ffaa[9].'%',1,0,'C',1);
						    $this->_pdf->Cell(17,5,$cabtipo2ffaa[10].'%',1,0,'C',1);
						    $this->_pdf->Cell(19,5,$cabtipo2ffaa[11].'%',1,0,'C',1);
						    $this->_pdf->Cell(18,5,$cabtipo2ffaa[12].'%',1,0,'C',1);
							$this->_pdf->Ln(5);
							$this->_pdf->SetFillColor(254,000,000);
							$contsect4=$contsect4+1;
						}
						$this->_pdf->SetFont('Arial','',5);
						$this->_pdf->Cell(80,5,utf8_decode($listar[$i]['Establecimiento']),1,0,'L');
						if($listar[$i]['1']==0){$this->_pdf->Cell(14,5,'',1,C,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['2']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['3']==0){$this->_pdf->Cell(14,5,'',1,0,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
						if($listar[$i]['4']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['5']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['6']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['7']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
						if($listar[$i]['8']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
						if($listar[$i]['9']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['10']==0){$this->_pdf->Cell(17,5,'',1,0,'L',true);}else{$this->_pdf->Cell(17,5,'X',1,0,'C');}
						if($listar[$i]['11']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
						if($listar[$i]['12']==0){$this->_pdf->Cell(18,5,'',1,0,'L',true);}else{$this->_pdf->Cell(18,5,'X',1,0,'C');}
						$this->_pdf->Ln(5); 	
					}
					
				}
			}

			$this->_pdf->Output();
			
		}

		public function ReporteBSIndividual($listar,$listarsi,$anio)
		{	
			$this->_pdf = new FPDF('L','mm','A4');
			$this->_pdf->AddPage();
			$this->_pdf->SetFillColor(254,000,000);
			$this->_pdf->Image('publico'.DS.'img'.DS.'reportes'.DS.'pronahebascabecera.jpg',10,5,270);
			  // Arial bold 15
		    $this->_pdf->SetFont('Arial','B',16);
		    // Título
		    $this->_pdf->Ln(28);
		    $this->_pdf->Cell(277,4,$anio,0,0,'C');
		    $this->_pdf->Ln(7);
		    $this->_pdf->SetFont('Arial','',8);
		    $this->_pdf->Cell(80,4,utf8_decode('ESTABLECIMIENTOS DE SALUD:'),1,0,'C');
		    $this->_pdf->Cell(14,4,utf8_decode('ENERO'),1,0,'C');
		    $this->_pdf->Cell(16,4,utf8_decode('FEBRERO'),1,0,'C');
		    $this->_pdf->Cell(14,4,utf8_decode('MARZO'),1,0,'C');
		    $this->_pdf->Cell(13,4,utf8_decode('ABRIL'),1,0,'C');
		    $this->_pdf->Cell(13,4,utf8_decode('MAYO'),1,0,'C');
		    $this->_pdf->Cell(13,4,utf8_decode('JUNIO'),1,0,'C');
		    $this->_pdf->Cell(13,4,utf8_decode('JULIO'),1,0,'C');
		    $this->_pdf->Cell(16,4,utf8_decode('AGOSTO'),1,0,'C');
		    $this->_pdf->Cell(19,4,utf8_decode('SETIEMBRE'),1,0,'C');
		    $this->_pdf->Cell(17,4,utf8_decode('OCUTBRE'),1,0,'C');
		    $this->_pdf->Cell(19,4,utf8_decode('NOVIEMBRE'),1,0,'C');
		    $this->_pdf->Cell(18,4,utf8_decode('DICIEMBRE'),1,0,'C');
		    $this->_pdf->Ln(4);

		    if(count($listar)<1){
		    	$this->_pdf->Cell(80,5,utf8_decode($listarsi[0]['Establecimiento']),1,0,'L');
		    	$this->_pdf->Cell(14,5,'',1,C,'L',true);
				$this->_pdf->Cell(16,5,'',1,0,'L',true);
				$this->_pdf->Cell(14,5,'',1,0,'L',true);
				$this->_pdf->Cell(13,5,'',1,0,'L',true);
				$this->_pdf->Cell(13,5,'',1,0,'L',true);
				$this->_pdf->Cell(13,5,'',1,0,'L',true);
				$this->_pdf->Cell(13,5,'',1,0,'L',true);
				$this->_pdf->Cell(16,5,'',1,0,'L',true);
				$this->_pdf->Cell(19,5,'',1,0,'L',true);
				$this->_pdf->Cell(17,5,'',1,0,'L',true);
				$this->_pdf->Cell(19,5,'',1,0,'L',true);
				$this->_pdf->Cell(18,5,'',1,0,'L',true);
				
			}else{
				$this->_pdf->Cell(80,5,utf8_decode($listar[0]['Establecimiento']),1,0,'L');
				if($listar[0]['1']==0){$this->_pdf->Cell(14,5,'',1,C,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
				if($listar[0]['2']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
				if($listar[0]['3']==0){$this->_pdf->Cell(14,5,'',1,0,'L',true);}else{$this->_pdf->Cell(14,5,'X',1,0,'C');}
				if($listar[0]['4']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
				if($listar[0]['5']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
				if($listar[0]['6']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
				if($listar[0]['7']==0){$this->_pdf->Cell(13,5,'',1,0,'L',true);}else{$this->_pdf->Cell(13,5,'X',1,0,'C');}
				if($listar[0]['8']==0){$this->_pdf->Cell(16,5,'',1,0,'L',true);}else{$this->_pdf->Cell(16,5,'X',1,0,'C');}
				if($listar[0]['9']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
				if($listar[0]['10']==0){$this->_pdf->Cell(17,5,'',1,0,'L',true);}else{$this->_pdf->Cell(17,5,'X',1,0,'C');}
				if($listar[0]['11']==0){$this->_pdf->Cell(19,5,'',1,0,'L',true);}else{$this->_pdf->Cell(19,5,'X',1,0,'C');}
				if($listar[0]['12']==0){$this->_pdf->Cell(18,5,'',1,0,'L',true);}else{$this->_pdf->Cell(18,5,'X',1,0,'C');}
			}

			$this->_pdf->Output();
		}

		public function ReporteBSCronologico($listar,$cabecera,$tipo,$item,$subtipo,$titulo,$anio,$titulo1,$datos)
		{
 			$this->_pdf = new FPDF('L','mm','A4');
			$this->_pdf->AddPage();
			$this->_pdf->Image('publico'.DS.'img'.DS.'reportes'.DS.'pronahebas.png',15,5,18);
		    // Arial bold 15
		    $this->_pdf->SetFont('Arial','B',7);
		    // Título
		    $this->_pdf->Cell(277,5,utf8_decode('INFORME ESTADÍSTICO PERIÓDICO DE LA DIRECCIÓN DE SALUD'),0,0,'C');
		    $this->_pdf->Ln(5);	
		    $this->_pdf->SetFont('Arial','B',6);
		    $this->_pdf->Cell(277,5,utf8_decode('PROGRAMA NACIONAL DE HEMOTERAPIA Y BANCOS DE SANGRE'),0,0,'C');
		    // Salto de línea
		    $this->_pdf->Ln(7);
		    $this->_pdf->SetFont('Arial','B',9);
		    $this->_pdf->Cell(277,5,utf8_decode($titulo1),0,0,'C');
		    $this->_pdf->Ln(7);
		     if(count($datos)>1){
		    $this->_pdf->SetFont('Arial','B',8);
		    $this->_pdf->Cell(30,5,utf8_decode("Nombre Institución:"),0,0,'L');
		    $this->_pdf->SetFont('Arial','',8);
		    $this->_pdf->Cell(95,5,utf8_decode($datos[0]["Establecimiento"]),0,0,'L');
		    $this->_pdf->SetFont('Arial','B',8);
		    $this->_pdf->Cell(15,5,utf8_decode("Teléfono:"),0,0,'L');
		    $this->_pdf->SetFont('Arial','',8);
		    $this->_pdf->Cell(30,5,utf8_decode($datos[0]["telefono"]),0,0,'L');
		    $this->_pdf->SetFont('Arial','B',8);
		    $this->_pdf->Cell(10,5,utf8_decode("Email:"),0,0,'L');
		    $this->_pdf->SetFont('Arial','',8);	
		    $this->_pdf->Cell(50,5,utf8_decode($datos[0]["email"]),0,0,'L');
		    $this->_pdf->Ln(5);
		    $this->_pdf->SetFont('Arial','B',8);	
		    $this->_pdf->Cell(30,5,utf8_decode("Cod. Renaes:"),0,0,'L');
			$this->_pdf->SetFont('Arial','',8);	
		    $this->_pdf->Cell(30,5,utf8_decode($datos[0]["idRenaes"]),0,0,'L');
		    $this->_pdf->SetFont('Arial','B',8);				
		    $this->_pdf->Cell(30,5,utf8_decode("DISA/DIRESA:"),0,0,'L');
			$this->_pdf->SetFont('Arial','',8);	
		    $this->_pdf->Cell(35,5,utf8_decode($datos[0]["DISAS"]),0,0,'L');
		    $this->_pdf->SetFont('Arial','B',8);
		    $this->_pdf->Cell(40,5,utf8_decode("Nombre de Responsable:"),0,0,'L');
		    $this->_pdf->SetFont('Arial','',8);	
		    $this->_pdf->Cell(70,5,utf8_decode($datos[0]["jefeBanSang"]),0,0,'L');
		     $this->_pdf->SetFont('Arial','B',9);
		    $this->_pdf->Ln(5);}
		    $this->_pdf->Cell(90,5,' ',0,0,'C');
		    $this->_pdf->Cell(30,5,utf8_decode($titulo),0,0,'C');
		    $this->_pdf->Cell(90,5,utf8_decode('AÑO: '.$anio),0,0,'C');
		    $this->_pdf->SetFont('Arial','B',6);
			$this->_pdf->Ln(5);
			for($i=0;$i<count($cabecera);$i=$i+2)
			{
				//DECLARAMOS VARIABLES PARA UNIFORMIZAR TAMAÑO DE CELDAS
				$tamcab=70;
				$tamsubcab=207;
				$tamtipo=51.75;
				//DECLARAMOS EXCEPCIONES EN TAMAÑO DE CABECERAS POR LARGO DE TEXTO
				if(strlen($cabecera[$i][1])>62){$tamcab=95;$tamsubcab=182;}
				//SEPARAMOS LOS QUE TIENEN SUBTIPO DE LOS QUE NO TIENEN PARA LOS TAMAÑOS DE CUADRO
				if($cabecera[$i+1]["IDCABECERA"]==6 || $cabecera[$i+1]["IDCABECERA"]==14)//TIENE SUBTIPO//TIENE SUBTIPO
				{
					//IMPRIMIMOS LAS CABECERAS
					$this->_pdf->Cell($tamcab,15,utf8_decode($cabecera[$i][1]),1,0,'C');
					$this->_pdf->Cell($tamsubcab,5,utf8_decode($cabecera[$i+1][1]),1,0,'C');
					$this->_pdf->Ln(5);
					$this->_pdf->Cell($tamcab,5,'',0,0,'C');
					//IMPRIMIMOS LOS TIPOS
					for($j=0;$j<count($tipo);$j++)
					{
						if($cabecera[$i+1][0]==$tipo[$j][3])
						{
							if($i==4)
							{
								$this->_pdf->Cell($tamsubcab/10,5,utf8_decode($tipo[$j][1]),1,0,'C');
							}else{
								$this->_pdf->Cell($tamsubcab/4,5,utf8_decode($tipo[$j][1]),1,0,'C');
							}
						}
					}
					$this->_pdf->Ln(5);
					$this->_pdf->Cell($tamcab,5,'',0,0,'C');
					for ($m=0; $m < count($subtipo); $m++) 
					{ 
						if($i==4)
						{
							if ($subtipo[$m][2]==$cabecera[$i+1][0]) 
							{
								$this->_pdf->SetFont('Arial','B',5);
								$this->_pdf->Cell($tamsubcab/20,5,utf8_decode($subtipo[$m][1]),1,0,'C');
								$this->_pdf->SetFont('Arial','B',6);
							}
						}else{
							if ($subtipo[$m][2]==$cabecera[$i+1][0]) 
							{
								$this->_pdf->Cell($tamsubcab/8,5,utf8_decode($subtipo[$m][1]),1,0,'C');
							}
						}
					}
					$this->_pdf->Ln(5);	
					for($k=0;$k<count($item);$k++)
					{
						if($item[$k][2]==$cabecera[$i+1][0])
						{
						$this->_pdf->Cell($tamcab,5,$item[$k][0].'. '.utf8_decode($item[$k][1]),1,0,'L	');
						for ($l=0; $l < count($listar); $l++) 
						{ 
							if ($cabecera[$i+1][0]==$listar[$l][3] && $item[$k][0]==$listar[$l][0]) {
								if ($i==4)// SI SON DE 400 QUE TIENEN MAS TIPOS POR TAMAÑOS 
								{
									$this->_pdf->Cell($tamsubcab/20,5,$listar[$l][4],1,0,'C');
								}else{
									$this->_pdf->Cell($tamsubcab/8,5,$listar[$l][4],1,0,'C');
								}
								
							}
							
						}
						$this->_pdf->Ln(5);
						}
					}
					
					$this->_pdf->Ln(10);	
				}else{// NO TIENE SUBTIPO
					$this->_pdf->Cell($tamcab,10,utf8_decode($cabecera[$i][1]),1,0,'C');
					$this->_pdf->Cell($tamsubcab,5,utf8_decode($cabecera[$i+1][1]),1,0,'C');
					$this->_pdf->Ln(5);
					$this->_pdf->Cell($tamcab,5,'',0,0,'C');
					//IMPRIMIMOS LOS TIPOS
					for($j=0;$j<count($tipo);$j++)
					{
						if($cabecera[$i+1][0]==$tipo[$j][3])
						{
							if($i==8||$i==10)// SI SON DE 400 Y 800 QUE TIENEN MAS TIPOS POR TAMAÑO
							{
								$this->_pdf->SetFont('Arial','B',4.5);
								$this->_pdf->Cell($tamsubcab/7,5,utf8_decode($tipo[$j][1]),1,0,'C');
								$this->_pdf->SetFont('Arial','B',6);
							}else{
								$this->_pdf->Cell($tamtipo,5,utf8_decode($tipo[$j][1]),1,0,'C');
							}
						}
					}
					$this->_pdf->Ln(5);
					for($k=0;$k<count($item);$k++)
					{
						if($item[$k][2]==$cabecera[$i+1][0])
						{
						$this->_pdf->Cell($tamcab,5,$item[$k][0].'. '.utf8_decode($item[$k][1]),1,0,'L	');
						for ($l=0; $l < count($listar); $l++) 
						{ 
							if ($cabecera[$i+1][0]==$listar[$l][3] && $item[$k][0]==$listar[$l][0]) {
								if ($i==8||$i==10)// SI SON DE 400 Y 800 QUE TIENEN MAS TIPOS POR TAMAÑOS 
								{
									$this->_pdf->Cell($tamsubcab/7,5,$listar[$l][4],1,0,'C');
								}else{
									$this->_pdf->Cell($tamtipo,5,$listar[$l][4],1,0,'C');
								}
								
							}
							
						}
						$this->_pdf->Ln(5);
						}
					}$this->_pdf->Ln(10);
				}
				
			}


			$this->_pdf->Output();
		}

		////////////////////////////////////////////////////ANEMIA (LUIS GONZALES)//////////////////////////////////////////////////////////////////////
		public function anemiaGestantesPuerperasFicha($info,$cab,$preg,$pregr,$opc,$det)
		{
			$this->_pdf = new FPDF();
			$this->_pdf->AddPage();
		    // Arial bold 15
		    $this->_pdf->SetFont('Arial','B',7);
		    //COLOCAMOS EL TITULO
		    
		    $this->_pdf->Cell(190,5,utf8_decode('FICHA DE VISITA DOMICILIARIA PARA LA PREVENCIÓN Y CONTROL DE LA ANEMIA: GESTANTES Y PUERPERAS'),0,0,'C');
		    $this->_pdf->Ln(5);
		    $this->_pdf->Cell(190,5,utf8_decode('DATOS GENERALES'),1,0,'L');
		    $this->_pdf->SetFont('Arial','',7);
		    $this->_pdf->Ln(5);
		    $this->_pdf->Cell(30,5,utf8_decode('N° de Historia Clinica'),1,0,'L');
		    $this->_pdf->Cell(65,5,utf8_decode($info[0][0]),1,0,'L');
		    $this->_pdf->Cell(30,5,utf8_decode('DNI'),1,0,'L');
		    $this->_pdf->Cell(65,5,utf8_decode($info[0][1]),1,0,'L');
		    $this->_pdf->Ln(5);
		    $this->_pdf->Cell(30,5,utf8_decode('Apellidos'),1,0,'L');
		    $this->_pdf->Cell(65,5,utf8_decode($info[0][2]),1,0,'L');
		    $this->_pdf->Cell(30,5,utf8_decode('Edad'),1,0,'L');
		    $this->_pdf->Cell(65,5,utf8_decode($info[0][8]),1,0,'L');
		    $this->_pdf->Ln(5);
		    $this->_pdf->Cell(30,5,utf8_decode('Nombres'),1,0,'L');
		    $this->_pdf->Cell(65,5,utf8_decode($info[0][12]),1,0,'L');
		    $this->_pdf->Cell(30,5,utf8_decode('Telefono'),1,0,'L');
		    $this->_pdf->Cell(65,5,utf8_decode($info[0][10]),1,0,'L');
		     $this->_pdf->Ln(5);
		    $this->_pdf->Cell(30,5,utf8_decode('Direccion'),1,0,'L');
		    $this->_pdf->Cell(160,5,utf8_decode($info[0][9]),1,0,'L');
		    $this->_pdf->Ln(7);

		    $this->_pdf->SetFont('Arial','B',7);
		    $this->_pdf->Cell(95,5,utf8_decode('VISITAS'),1,0,'L');
		    $this->_pdf->Cell(95,5,utf8_decode('Visita Nro: '.$info[0][11]),1,0,'C');
		     $this->_pdf->SetFont('Arial','',7);
		    $this->_pdf->Ln(5);	
		    $this->_pdf->Cell(95,5,utf8_decode('FECHA DE VISITA'),1,0,'L');
		    $this->_pdf->Cell(95,5,utf8_decode($info[0][3]),1,0,'C');
		    $this->_pdf->Ln(5);	
		    $this->_pdf->Cell(95,5,utf8_decode('Semana Gestacional'),1,0,'L');
		    $this->_pdf->Cell(95,5,utf8_decode($info[0][4]),1,0,'C');
		    $this->_pdf->Ln(5);
		    $this->_pdf->Cell(95,5,utf8_decode('Fecha dosaje Hemoglobina(ultimo control)'),1,0,'L');
		    $this->_pdf->Cell(95,5,utf8_decode($info[0][5]),1,0,'C');
		    $this->_pdf->Ln(5);	
		    $this->_pdf->Cell(95,5,utf8_decode('Anemia'),1,0,'L');
		    $this->_pdf->Cell(47.5,5,utf8_decode('SI'),1,0,'C');
		    $this->_pdf->Cell(47.5,5,utf8_decode('NO'),1,0,'C');
		    if($info[0][6]==1)
		    {
			    $this->_pdf->SetXY(132,63);
			    $this->_pdf->Cell(3,3,utf8_decode(''),1,0,'C',1);
			    $this->_pdf->Cell(44,3,utf8_decode(''),0,0,'C');
			    $this->_pdf->Cell(3,3,utf8_decode(''),1,0,'C');
			}else {
			    $this->_pdf->SetXY(132,63);
			    $this->_pdf->Cell(3,3,utf8_decode(''),1,0,'C');
			    $this->_pdf->Cell(44,3,utf8_decode(''),0,0,'C');
			    $this->_pdf->Cell(3,3,utf8_decode(''),1,0,'C',1);
			}
			$this->_pdf->Ln(4);	
			$this->_pdf->Cell(120,5,utf8_decode('Feha de inicio toma de suplemento'),1,0,'L');
			$this->_pdf->Cell(70,5,utf8_decode($info[0][7]),1,0,'C');
			$this->_pdf->Ln(5);	
			$this->_pdf->SetFont('Arial','B',7);
		   	for($i=0;$i<count($cab);$i++)
		   	{
		   		$this->_pdf->SetFont('Arial','B',7);
		   		$this->_pdf->Cell(190,5,utf8_decode($cab[$i][1]),1,0,'L');
		   		$this->_pdf->SetFont('Arial','',7);
		   		$this->_pdf->Ln(5);	
		   		for($j=0;$j<count($preg);$j++)
		   		{
		   			if($j==0)
		   			{
		   				$this->_pdf->Cell(5,5,utf8_decode($preg[$j][0]),1,'L');
		   				$this->_pdf->Cell(90,5,utf8_decode($preg[$j][1]),1,'L');
		   				for($l=0;$l<count($det);$l++)
		   				{
		   					if($det[$l][4]==01 && $det[$l][6]==$preg[$j][0] && $det[$l][8]==NULL)
		   					{
		   						if($det[$l][10]==04)
		   						{
		   							$this->_pdf->Cell(95,5,utf8_decode($det[$l][11]).' : '.utf8_decode($det[$l][2]),1,0,'C');
		   						}else{
		   							$this->_pdf->Cell(95,5,utf8_decode($det[$l][11]),1,0,'C');
		   						}
		   					}
		   				}
		   				$this->_pdf->Ln(5);	
		   			}
		   			if($j==1)
		   			{
		   				$this->_pdf->Cell(5,10,utf8_decode($preg[$j][0]),1,'L');
		   				$this->_pdf->MultiCell(90,5,utf8_decode($preg[$j][1]),1,'L');
		   				$this->_pdf->SetXY(105,82);
		   				$this->_pdf->Cell(47.5,10,'SI',1,0,'C');
		   				$this->_pdf->Cell(47.5,10,'NO',1,0,'C');
		   				for($l=0;$l<count($det);$l++)
		   				{
			   				if ($det[$l][4]==01 && $det[$l][6]==$preg[$j][0] && $det[$l][8]==NULL) 
			   				{

			   					if($det[$l][10]==01)
			   					{
			   						$this->_pdf->SetXY(132,85.5);
			   						$this->_pdf->Cell(3,3,'',1,0,'C',1);
			   						$this->_pdf->Cell(44,3,'',0,0,'C');
			   						$this->_pdf->Cell(3,3,'',1,0,'C');
			   						$opciones=1;
			   					}elseif($det[$l][10]==02)
			   					{
			   						$this->_pdf->SetXY(132,85.5);
			   						$this->_pdf->Cell(3,3,'',1,0,'C');
			   						$this->_pdf->Cell(44,3,'',0,0,'C');
			   						$this->_pdf->Cell(3,3,'',1,0,'C',1);
			   						$opciones=0;
			   					}
			   				}
			   			}
			   			$this->_pdf->Ln(6.5);
			   			$count1=0;
			   			for($k=0;$k<count($pregr);$k++)
			   			{
			   				if($pregr[$k][2]==01 && $pregr[$k][3]==02)
			   				{
			   					$this->_pdf->Cell(10,5,utf8_decode($pregr[$k][0]),1,0,'C');
		   						$this->_pdf->Cell(85,5,utf8_decode($pregr[$k][1]),1,'L');
		   						
		   						for($m=0;$m<count($opc);$m++)
		   						{
		   							if($opc[$m][6]==01 && $opc[$m][7]==02 && $opc[$m][8]==$pregr[$k][0] && $pregr[$k][0]==01)
		   							{	
		   								$this->_pdf->Cell(19,5,utf8_decode($opc[$m][3]),1,0,'C');	
		   							}
		   							if($opc[$m][6]==01 && $opc[$m][7]==02 && $opc[$m][8]==$pregr[$k][0] && $pregr[$k][0]==02)
		   							{	
		   								for($l=0;$l<count($det);$l++)
		   								{
		   									if ($det[$l][4]==01 && $det[$l][6]==02 && $det[$l][8]==02) 
		   									{
		   										$this->_pdf->Cell(95,5,utf8_decode($det[$l][2]).' cucharada(s)',1,0,'C');	
		   									}elseif($opciones==0 && $count1<1)
		   									{
		   										$this->_pdf->Cell(95,5,'PRUEBA',1,0,'C');	
		   										$count1++;
		   									}	
		   								}		
		   							}
		   						}
		   						$this->_pdf->Ln(5);
			   				}
			   				
			   			}
			   			for($l=0;$l<count($det);$l++)
						{
							if ($det[$l][4]==01 && $det[$l][6]==$preg[$j][0] && $det[$l][8]==01) 
							{
								if($det[$l][10]==01){$a=1;}
								if($det[$l][10]==02){$b=1;}
								if($det[$l][10]==03){$c=1;}
								if($det[$l][10]==04){$d=1;}
								if($det[$l][10]==05){$e=1;}
							}
						}
						$this->_pdf->SetXY(119.5,93);
			   			$this->_pdf->Cell(3,3,'',1,0,'C',$a);
			   			$this->_pdf->Cell(15,3,'',0,0,'C');
			   			$this->_pdf->Cell(3,3,'',1,0,'C',$b);
			   			$this->_pdf->Cell(18,3,'',0,0,'C');
			   			$this->_pdf->Cell(3,3,'',1,0,'C',$c);
			   			$this->_pdf->Cell(14.5,3,'',0,0,'C');
			   			$this->_pdf->Cell(3,3,'',1,0,'C',$d);
			   			$this->_pdf->Cell(17,3,'',0,0,'C');
			   			$this->_pdf->Cell(3,3,'',1,0,'C',$e);
			   			$this->_pdf->ln(9);
		   			}
		   			$count2=0;
		   			if($j==2)
		   			{	
		   				$this->_pdf->Cell(5,10,utf8_decode($preg[$j][0]),1,'L');
		   				$this->_pdf->MultiCell(90,5,utf8_decode($preg[$j][1]),1,'L');
		   				$this->_pdf->SetXY(105,102);
		   				$this->_pdf->Cell(47.5,10,'SI',1,0,'C');
		   				$this->_pdf->Cell(47.5,10,'NO',1,0,'C');
		   				$this->_pdf->Ln(5);	
		   				for($l=0;$l<count($det);$l++)
		   				{
			   				if ($det[$l][4]==01 && $det[$l][6]==$preg[$j][0] && $det[$l][8]==NULL) 
			   				{
			   					if($det[$l][10]==01)
			   					{
			   						$this->_pdf->SetXY(132,105);
			   						$this->_pdf->Cell(3,3,'',1,0,'C',1);
			   						$this->_pdf->Cell(44,3,'',0,0,'C');
			   						$this->_pdf->Cell(3,3,'',1,0,'C');
			   					}elseif($det[$l][10]==02)
			   					{
			   						$this->_pdf->SetXY(132,105);
			   						$this->_pdf->Cell(3,3,'',1,0,'C');
			   						$this->_pdf->Cell(44,3,'',0,0,'C');
			   						$this->_pdf->Cell(3,3,'',1,0,'C',1);
			   					}
			   				}elseif ($opciones==0 && $count2<1) {
			   					$this->_pdf->SetXY(132,105);
			   					$this->_pdf->Cell(3,3,'',1,0,'C');
			   					$this->_pdf->Cell(44,3,'',0,0,'C');
			   					$this->_pdf->Cell(3,3,'',1,0,'C');
			   					$count2++;
			   				}
			   			}
			   			$this->_pdf->Ln(7);
		   			}

		   			if($j==3)
		   			{
		   				$this->_pdf->Cell(5,5,utf8_decode($preg[$j][0]),1,'L');
		   				$this->_pdf->Cell(90,5,utf8_decode($preg[$j][1]),1,'L');
		   				for($l=0;$l<count($det);$l++)
		   				{
		   					if ($det[$l][4]==01 && $det[$l][6]==$preg[$j][0] && $det[$l][8]==NULL) 
		   					{
		   						if($det[$l][10]==04)
		   						{
		   							$this->_pdf->Cell(95,5,utf8_decode($det[$l][11]).': '.$det[$l][2],1,0,'C');		
		   						}else{
		   							$this->_pdf->Cell(95,5,utf8_decode($det[$l][11]),1,0,'C');		
		   						}
		   					}
		   				}
		   				$this->_pdf->Ln(5);
		   			}

		   			if($j==4)
		   			{
		   				$this->_pdf->Cell(5,5,utf8_decode($preg[$j][0]),1,'L');
		   				$this->_pdf->Cell(90,5,utf8_decode($preg[$j][1]),1,'L');
		   				$this->_pdf->Cell(47.5,5,'SI',1,0,'C');
		   				$this->_pdf->Cell(47.5,5,'NO',1,0,'C');
		   				for($l=0;$l<count($det);$l++)
		   				{
			   				if ($det[$l][4]==01 && $det[$l][6]==$preg[$j][0] && $det[$l][8]==NULL) 
			   				{
			   					if($det[$l][10]==01)
			   					{
			   						$this->_pdf->SetXY(132,118);
			   						$this->_pdf->Cell(3,3,'',1,0,'C',1);
			   						$this->_pdf->Cell(44,3,'',0,0,'C');
			   						$this->_pdf->Cell(3,3,'',1,0,'C');
			   					}elseif($det[$l][10]==02)
			   					{
			   						$this->_pdf->SetXY(132,118);
			   						$this->_pdf->Cell(3,3,'',1,0,'C');
			   						$this->_pdf->Cell(44,3,'',0,0,'C');
			   						$this->_pdf->Cell(3,3,'',1,0,'C',1);
			   					}
			   				}
			   			}
			   			$this->_pdf->Ln(4);
			   			for($k=0;$k<count($pregr);$k++)
			   			{
			   				if($pregr[$k][2]==01 && $pregr[$k][3]==05)
			   				{
			   					$this->_pdf->Cell(10,5,utf8_decode($pregr[$k][0]),1,0,'C');
		   						$this->_pdf->Cell(85,5,utf8_decode($pregr[$k][1]),1,'L');
		   						$this->_pdf->Cell(47.5,5,'SI',1,0,'C');
		   						$this->_pdf->Cell(47.5,5,'NO',1,0,'C');
		   						for($l=0;$l<count($det);$l++)
				   				{
					   				if ($det[$l][4]==01 && $det[$l][6]==$preg[$j][0] && $det[$l][8]==01) 
					   				{
					   					if($det[$l][10]==01)
					   					{
					   						$this->_pdf->SetXY(132,123);
					   						$this->_pdf->Cell(3,3,'',1,0,'C',1);
					   						$this->_pdf->Cell(44,3,'',0,0,'C');
					   						$this->_pdf->Cell(3,3,'',1,0,'C');
					   					}elseif($det[$l][10]==02)
					   					{
					   						$this->_pdf->SetXY(132,123);
					   						$this->_pdf->Cell(3,3,'',1,0,'C');
					   						$this->_pdf->Cell(44,3,'',0,0,'C');
					   						$this->_pdf->Cell(3,3,'',1,0,'C',1);
					   					}
					   				}
					   			}
			   				}
			   			}		
			   			$this->_pdf->Ln(4);
		   			}
		   			if($j==5)
		   			{
		   				$this->_pdf->Cell(5,5,utf8_decode($preg[$j][0]),1,'L');
		   				$this->_pdf->Cell(90,5,utf8_decode($preg[$j][1]),1,'L');
		   				$this->_pdf->Cell(47.5,5,'SI',1,0,'C');
		   				$this->_pdf->Cell(47.5,5,'NO',1,0,'C');
		   				for($l=0;$l<count($det);$l++)
		   				{
			   				if ($det[$l][4]==01 && $det[$l][6]==$preg[$j][0] && $det[$l][8]==NULL) 
			   				{
			   					if($det[$l][10]==01)
			   					{
			   						$this->_pdf->SetXY(132,128);
			   						$this->_pdf->Cell(3,3,'',1,0,'C',1);
			   						$this->_pdf->Cell(44,3,'',0,0,'C');
			   						$this->_pdf->Cell(3,3,'',1,0,'C');
			   					}elseif($det[$l][10]==02)
			   					{
			   						$this->_pdf->SetXY(132,128);
			   						$this->_pdf->Cell(3,3,'',1,0,'C');
			   						$this->_pdf->Cell(44,3,'',0,0,'C');
			   						$this->_pdf->Cell(3,3,'',1,0,'C',1);
			   					}
			   				}
			   			}
			   			$this->_pdf->Ln(4);
		   			}
		   			$descarte=0;
		   			if($j==6)
		   			{
		   				$this->_pdf->Cell(5,5,utf8_decode($preg[$j][0]),1,'L');
		   				$this->_pdf->Cell(90,5,utf8_decode($preg[$j][1]),1,'L');
		   				$this->_pdf->Cell(47.5,5,'SI',1,0,'C');
		   				$this->_pdf->Cell(47.5,5,'NO',1,0,'C');
		   				for($l=0;$l<count($det);$l++)
		   				{
			   				if ($det[$l][4]==01 && $det[$l][6]==$preg[$j][0] && $det[$l][8]==NULL) 
			   				{
			   					if($det[$l][10]==01)
			   					{
			   						$this->_pdf->SetXY(132,133);
			   						$this->_pdf->Cell(3,3,'',1,0,'C',1);
			   						$this->_pdf->Cell(44,3,'',0,0,'C');
			   						$this->_pdf->Cell(3,3,'',1,0,'C');
			   						$descarte=1;
			   					}elseif($det[$l][10]==02)
			   					{
			   						$this->_pdf->SetXY(132,133);
			   						$this->_pdf->Cell(3,3,'',1,0,'C');
			   						$this->_pdf->Cell(44,3,'',0,0,'C');
			   						$this->_pdf->Cell(3,3,'',1,0,'C',1);
			   					}
			   				}
			   			}
			   			$this->_pdf->Ln(4);
			   			for($k=0;$k<count($pregr);$k++)
			   			{
			   				if($pregr[$k][2]==01 && $pregr[$k][3]==$preg[$j][0])
			   				{
			   					$this->_pdf->Cell(10,5,utf8_decode($pregr[$k][0]),1,0,'C');
		   						$this->_pdf->Cell(85,5,utf8_decode($pregr[$k][1]),1,'L');
		   						for($l=0;$l<count($det);$l++)
				   				{
				   					if ($det[$l][4]==01 && $det[$l][6]==$preg[$j][0] && $det[$l][8]==$pregr[$k][0]) 
				   					{
				   						if($det[$l][8]==01)
				   						{
				   							if($det[$l][10]==04)
					   						{
					   							$this->_pdf->Cell(95,5,utf8_decode($det[$l][11]).': '.$det[$l][2],1,0,'C');		
					   						}else{
					   							$this->_pdf->Cell(95,5,utf8_decode($det[$l][11]),1,0,'C');		
					   						}

				   						}elseif($det[$l][8]==02)
				   						{				   							
					   						$this->_pdf->Cell(95,5,utf8_decode($det[$l][2]),1,0,'C');				
				   						}elseif($det[$l][8]==03)
				   						{
				   							$this->_pdf->Cell(95,5,utf8_decode($det[$l][11]),1,0,'C');
				   						}elseif($det[$l][8]==04)
				   						{
				   							if($det[$l][10]==01)
					   						{
					   							$this->_pdf->Cell(95,5,utf8_decode($det[$l][11]).': '.$det[$l][2],1,0,'C');		
					   						}else{
					   							$this->_pdf->Cell(95,5,utf8_decode($det[$l][11]),1,0,'C');

					   						}
				   						}	
				   					}
				   				}
				   				if($descarte==1 && $pregr[$k][0]==05)
				   				{
				   					$this->_pdf->Cell(95,5,' ',1,0,'C');	
				   				}
		   						$this->_pdf->Ln(5);
			   				}
			   			}
		   			}

		   			if($j==7)
		   			{
		   				$this->_pdf->Cell(5,5,utf8_decode($preg[$j][0]),1,'L');
		   				$this->_pdf->Cell(90,5,utf8_decode($preg[$j][1]),1,'L');
		   				for($l=0;$l<count($det);$l++)
				   		{
				   			if ($det[$l][4]==01 && $det[$l][6]==$preg[$j][0] && $det[$l][8]==$pregr[$k][0]) 
				   			{
				   				$this->_pdf->Cell(95,5,utf8_decode($det[$l][2]),1,0,'C');
				   			}
				   		}
				   		$this->_pdf->Ln(5);
				   		for($k=0;$k<count($pregr);$k++)
			   			{	
			   				if($pregr[$k][2]==01 && $pregr[$k][3]==$preg[$j][0])
			   				{
			   					$this->_pdf->Cell(10,5,utf8_decode($pregr[$k][0]),1,0,'C');
			   					$this->_pdf->Cell(85,5,utf8_decode($pregr[$k][1]),1,'L');
			   					for($l=0;$l<count($det);$l++)
						   		{
						   			if ($det[$l][4]==01 && $det[$l][6]==$preg[$j][0] && $det[$l][8]==$pregr[$k][0] && $det[$l][10]==01) 
						   			{
						   				$this->_pdf->Cell(95,5,utf8_decode($det[$l][2]),1,0,'C');
						   			}
						   		}
			   				}
			   			}$this->_pdf->Ln(5);
		   			}
		   			if($j==8)
		   			{
		   				$this->_pdf->Cell(5,5,utf8_decode($preg[$j][0]),1,'L');
		   				$this->_pdf->Cell(90,5,utf8_decode($preg[$j][1]),1,'L');
		   				$this->_pdf->Cell(47.5,5,'SI',1,0,'C');
		   				$this->_pdf->Cell(47.5,5,'NO',1,0,'C');
		   				for($l=0;$l<count($det);$l++)
		   				{
			   				if ($det[$l][4]==01 && $det[$l][6]==$preg[$j][0] && $det[$l][8]==NULL) 
			   				{
			   					if($det[$l][10]==01)
			   					{
			   						$this->_pdf->SetXY(132,173);
			   						$this->_pdf->Cell(3,3,'',1,0,'C',1);
			   						$this->_pdf->Cell(44,3,'',0,0,'C');
			   						$this->_pdf->Cell(3,3,'',1,0,'C');
			   					}elseif($det[$l][10]==02)
			   					{
			   						$this->_pdf->SetXY(132,173);
			   						$this->_pdf->Cell(3,3,'',1,0,'C');
			   						$this->_pdf->Cell(44,3,'',0,0,'C');
			   						$this->_pdf->Cell(3,3,'',1,0,'C',1);
			   					}
			   				}
			   			}
			   			$this->_pdf->Ln(4);
		   			}
		   		}
		   		$this->_pdf->Ln(8);
		   		$this->_pdf->SetFont('Arial','B',7);
		   		$this->_pdf->Cell(190,5,'FICHA DE VISITA DOICILIARIA PARA LA PREVENCION Y CONTROL DE LA ANEMIA: GESTAQNTES Y PUERPERAS	',0,0,'C');
		   		$this->_pdf->Ln(10);
		   		$this->_pdf->Cell(95,5,utf8_decode('VISITAS'),1,0,'L');
		   	 	$this->_pdf->Cell(95,5,utf8_decode('Visita Nro: '.$info[0][11]),1,0,'C');
		     	//$this->_pdf->SetFont('Arial','',7);
		    	$this->_pdf->Ln(5);	
		    	$this->_pdf->Cell(95,5,utf8_decode('FECHA DE VISITA'),1,0,'L');
		    	$this->_pdf->Cell(95,5,utf8_decode($info[0][3]),1,0,'C');
		    	$this->_pdf->Ln(5);	
		    	$this->_pdf->Cell(95,5,utf8_decode('Nombre del Perosnal de Salud que realizó la visita'),1,0,'L');
		    	$this->_pdf->Cell(95,5,utf8_decode($info[0][14]).' '.utf8_decode($info[0][15]).' '	.utf8_decode($info[0][16]),1,0,'C');
		   	}
		   	$modo="I";
		   	$nombre_archivo="Informe Gestantes";
		    $this->_pdf->Output($nombre_archivo,$modo);

		}

		public function VistaPreviaBS($cabecera,$tipo1,$tipo2,$tipo3,$tipo4,$tipo5,$tipo6,$tipo7,$item1,$item2,$item3,$item4,$item5,$item6,$item7,$subtipo1,$subtipo2,$hemo,$a201_1,$a201_2,$a201_3,$a201_4,$a202_1,$a202_2,$a202_3,$a202_4,$a203_1,$a203_2,$a203_3,$a203_4,$a204_1,$a204_2,$a204_3,$a204_4,$a301_5,$a301_6,$a301_7,$a301_8,$a302_5,$a302_6,$a302_7,$a302_8,$a303_5,$a303_6,$a303_7,$a303_8,$a401_1,$a401_2,$a401_3,$a401_4,$a401_5,$a401_6,$a401_7,$a401_8,$a401_9,$a401_10,$a401_11,$a401_12,$a401_13,$a401_14,$a401_15,$a401_16,$a401_17,$a401_18,$a401_19,$a401_20,$a402_1,$a402_2,$a402_3,$a402_4,$a402_5,$a402_6,$a402_7,$a402_8,$a402_9,$a402_10,$a402_11,$a402_12,$a402_13,$a402_14,$a402_15,$a402_16,$a402_17,$a402_18,$a402_19,$a402_20,$a403_1,$a403_2,$a403_3,$a403_4,$a403_5,$a403_6,$a403_7,$a403_8,$a403_9,$a403_10,$a403_11,$a403_12,$a403_13,$a403_14,$a403_15,$a403_16,$a403_17,$a403_18,$a403_19,$a403_20,$a404_1,$a404_2,$a404_3,$a404_4,$a404_5,$a404_6,$a404_7,$a404_8,$a404_9,$a404_10,$a404_11,$a404_12,$a404_13,$a404_14,$a404_15,$a404_16,$a404_17,$a404_18,$a404_19,$a404_20,$a501_23,$a501_24,$a501_25,$a501_26,$a502_23,$a502_24,$a502_25,$a502_26,$a503_23,$a503_24,$a503_25,$a503_26,$a601_33,$a601_34,$a601_35,$a601_36,$a601_37,$a601_38,$a601_39,$a602_33,$a602_34,$a602_35,$a602_36,$a602_37,$a602_38,$a602_39,$a603_33,$a603_34,$a603_35,$a603_36,$a603_37,$a603_38,$a603_39,$a604_33,$a604_34,$a604_35,$a604_36,$a604_37,$a604_38,$a604_39,$a605_33,$a605_34,$a605_35,$a605_36,$a605_37,$a605_38,$a605_39,$a606_33,$a606_34,$a606_35,$a606_36,$a606_37,$a606_38,$a606_39,$a607_33,$a607_34,$a607_35,$a607_36,$a607_37,$a607_38,$a607_39,$a608_33,$a608_34,$a608_35,$a608_36,$a608_37,$a608_38,$a608_39,$a609_33,$a609_34,$a609_35,$a609_36,$a609_37,$a609_38,$a609_39,$a610_33,$a610_34,$a610_35,$a610_36,$a610_37,$a610_38,$a610_39,$a701_40,$a701_41,$a701_42,$a701_43,$a701_44,$a701_45,$a701_46,$a702_40,$a702_41,$a702_42,$a702_43,$a702_44,$a702_45,$a702_46,$a703_40,$a703_41,$a703_42,$a703_43,$a703_44,$a703_45,$a703_46,$a704_40,$a704_41,$a704_42,$a704_43,$a704_44,$a704_45,$a704_46,$a705_40,$a705_41,$a705_42,$a705_43,$a705_44,$a705_45,$a705_46,$a706_40,$a706_41,$a706_42,$a706_43,$a706_44,$a706_45,$a706_46,$a801_21,$a801_22,$a801_23,$a801_24,$a801_25,$a801_26,$a801_27,$a801_28,$a802_21,$a802_22,$a802_23,$a802_24,$a802_25,$a802_26,$a802_27,$a802_28,$a803_21,$a803_22,$a803_23,$a803_24,$a803_25,$a803_26,$a803_27,$a803_28,$a804_21,$a804_22,$a804_23,$a804_24,$a804_25,$a804_26,$a804_27,$a804_28,$a805_21,$a805_22,$a805_23,$a805_24,$a805_25,$a805_26,$a805_2,$a805_28,$a701_40_2,$a701_41_2,$a701_42_2,$a701_43_2,$a701_44_2,$a701_45_2,$a701_46_2,$a702_40_2,$a702_41_2,$a702_42_2,$a702_43_2,$a702_44_2,$a702_45_2,$a702_46_2,$a703_40_2,$a703_41_2,$a703_42_2,$a703_43_2,$a703_44_2,$a703_45_2,$a703_46_2,$a704_40_2,$a704_41_2,$a704_42_2,$a704_43_2,$a704_44_2,$a704_45_2,$a704_46_2,$a705_40_2,$a705_41_2,$a705_42_2,$a705_43_2,$a705_44_2,$a705_45_2,$a705_46_2,$a706_40_2,$a706_41_2,$a706_42_2,$a706_43_2,$a706_44_2,$a706_45_2,$a706_46_2,$a801_21_2,$a801_22_2,$a801_23_2,$a801_24_2,$a801_25_2,$a801_26_2,$a801_27_2,$a801_28_2,$a802_21_2,$a802_22_2,$a802_23_2,$a802_24_2,$a802_25_2,$a802_26_2,$a802_27_2,$a802_28_2,$a803_21_2,$a803_22_2,$a803_23_2,$a803_24_2,$a803_25_2,$a803_26_2,$a803_27_2,$a803_28_2,$a804_21_2,$a804_22_2,$a804_23_2,$a804_24_2,$a804_25_2,$a804_26_2,$a804_27_2,$a804_28_2,$a805_21_2,$a805_22_2,$a805_23_2,$a805_24_2,$a805_25_2,$a805_26_2,$a805_27_2,$a805_28_2,$establecimiento,$mes,$anio)
		{
			$marc=0;
			$this->_pdf = new FPDF('L','mm','A4');
			$this->_pdf->AddPage();
			
			$this->_pdf->Image('publico'.DS.'img'.DS.'reportes'.DS.'pronahebas.png',15,5,18);
		    // Arial bold 15
		    $this->_pdf->SetFont('Arial','B',10);
		    //MARCA DE AGUA
		    $this->_pdf->SetY(65);
			$this->_pdf->SetTextColor(255,192,203);
			 $this->_pdf->SetFont('Arial','B',60);
			$this->_pdf->Cell(277,5,utf8_decode('PREVISUALIZACION'),0,0,'C');
			$this->_pdf->Ln(60);
			$this->_pdf->Cell(277,5,utf8_decode('SIN VALIDEZ'),0,0,'C');
			// Título
			$this->_pdf->SetxY(10,10);
			 $this->_pdf->SetFont('Arial','B',10);
			$this->_pdf->SetTextColor(0,0,0);
		    $this->_pdf->Cell(277,5,utf8_decode('INFORME ESTADÍSTICO PERIÓDICO DE LA DIRECCIÓN DE SALUD'),0,0,'C');
		    $this->_pdf->Ln(5);
		    $this->_pdf->SetFont('Arial','B',8);
		    $this->_pdf->Cell(277,5,utf8_decode('PROGRAMA NACIONAL DE HEMOTERAPIA Y BANCOS DE SANGRE'),0,0,'C');
		    // Salto de línea
		    $this->_pdf->Ln(7);
			
			
			$this->_pdf->Cell(70,5,utf8_decode('101. Nombre de la Institución:'),0,0);
			$this->_pdf->Cell(70,5,utf8_decode($establecimiento),0,0);
			$this->_pdf->Cell(70,5,utf8_decode('102. Centros de Hemoterapia por Tipo y Sector:'),0,0);
			$this->_pdf->Cell(70,5,'TIPO '.utf8_decode($listar[0]["idHemoterapia"]).'      '.utf8_decode($listar[0]["nombre"]),0,0);
			$this->_pdf->Ln(5);
			$this->_pdf->Ln(5);
			$this->_pdf->Cell(70,5,utf8_decode('104. Periodo al que corresponde:'),0,0);
			$this->_pdf->Cell(70,5,utf8_decode($mes)."-".utf8_decode($anio),0,0);
			$this->_pdf->Ln(5);
			$this->_pdf->Ln(7);
			$this->_pdf->Cell(7,5,'',0,0);
			$this->_pdf->Ln(5);
			$this->_pdf->Cell(70,5,utf8_decode('Fechas'),0,0);
			$this->_pdf->Ln(5);
			 $this->_pdf->SetFont('Arial','B',6);
			if($cabecera != NULL)
			{
				if($hemo==2)
				{
					for ($i=0; $i <  count($cabecera); $i=$i+2)
					{
						if ($i==0) 
						{
							$this->_pdf->Cell(120,10,utf8_decode($cabecera[$i]["NOMBRE"]),1,0,'C');
							$this->_pdf->Cell(157,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(120,15,'',0,0,'C');
							for ($j=0; $j < count($tipo1); $j++)
							{
								$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($tipo1[$j]["NOMBRE"]),1,0,'C');
							} 
							$this->_pdf->Ln(5);
							for ($k=0; $k < count($item1); $k++)
							{
								$this->_pdf->Cell(120,5,utf8_decode($item1[$k]["IDITEM"]).". ".utf8_decode($item1[$k]["NOMBRE"]),1,0);
								if($item1[$k]["IDITEM"]==201){
									$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($a201_1),1,0,'C');
									$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($a201_2),1,0,'C');
									$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($a201_3),1,0,'C');
									$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($a201_4),1,0,'C');
								}elseif($item1[$k]["IDITEM"]==202){
									$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($a202_1),1,0,'C');
									$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($a202_2),1,0,'C');
									$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($a202_3),1,0,'C');
									$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($a202_4),1,0,'C');
								}elseif($item1[$k]["IDITEM"]==203){
									$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($a203_1),1,0,'C');
									$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($a203_2),1,0,'C');
									$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($a203_3),1,0,'C');
									$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($a203_4),1,0,'C');
								}else{
									$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($a204_1),1,0,'C');
									$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($a204_2),1,0,'C');
									$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($a204_3),1,0,'C');
									$this->_pdf->Cell((157/count($tipo1)),5,utf8_decode($a204_4),1,0,'C');
								}
											
								$this->_pdf->Ln(5);
							} $this->_pdf->Ln(5);
					
						}elseif($i==2){
							$this->_pdf->Cell(120,10,utf8_decode($cabecera[$i]["NOMBRE"]),1,0,'C');
							$this->_pdf->Cell(157,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(120,15,'',0,0,'C');
							for ($j=0; $j < count($tipo2); $j++)
							{
								$this->_pdf->Cell((157/count($tipo2)),5,utf8_decode($tipo2[$j]["NOMBRE"]),1,0,'C');
							} 
							$this->_pdf->Ln(5);
							for ($k=0; $k < count($item2); $k++)
							{
								$this->_pdf->Cell(120,5,utf8_decode($item2[$k]["IDITEM"]).". ".utf8_decode($item2[$k]["NOMBRE"]),1,0);
								if($item2[$k]["IDITEM"]==301)
								{
									$this->_pdf->Cell((157/count($tipo2)),5,utf8_decode($a301_5),1,0,'C');
									$this->_pdf->Cell((157/count($tipo2)),5,utf8_decode($a301_6),1,0,'C');
									$this->_pdf->Cell((157/count($tipo2)),5,utf8_decode($a301_7),1,0,'C');
									$this->_pdf->Cell((157/count($tipo2)),5,utf8_decode($a301_8),1,0,'C');
								}elseif($item2[$k]["IDITEM"]==302)
								{
									$this->_pdf->Cell((157/count($tipo2)),5,utf8_decode($a302_5),1,0,'C');
									$this->_pdf->Cell((157/count($tipo2)),5,utf8_decode($a302_6),1,0,'C');
									$this->_pdf->Cell((157/count($tipo2)),5,utf8_decode($a302_7),1,0,'C');
									$this->_pdf->Cell((157/count($tipo2)),5,utf8_decode($a302_8),1,0,'C');
								}else{
									$this->_pdf->Cell((157/count($tipo2)),5,utf8_decode($a303_5),1,0,'C');
									$this->_pdf->Cell((157/count($tipo2)),5,utf8_decode($a303_6),1,0,'C');
									$this->_pdf->Cell((157/count($tipo2)),5,utf8_decode($a303_7),1,0,'C');
									$this->_pdf->Cell((157/count($tipo2)),5,utf8_decode($a303_8),1,0,'C');
								}
								$this->_pdf->Ln(5);
							} $this->_pdf->Ln(5);

						
						}elseif($i==4){
							$this->_pdf->Cell(75,15,utf8_decode($cabecera[$i]["NOMBRE"]),1,0,'C');
							$this->_pdf->Cell(202,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(75,15,'',0,0,'C');
							for ($j=0; $j < count($tipo3); $j++)
							{
								$this->_pdf->Cell((202/count($tipo3)),5,utf8_decode($tipo3[$j]["NOMBRE"]),1,0,'C');
							} 
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(75,15,'',0,0,'C');
							for ($g=0; $g < count($subtipo1); $g++)
							{
								$this->_pdf->SetFont('Arial','B',5);
								$this->_pdf->Cell((202/count($tipo3)/2),5,utf8_decode($subtipo1[$g]["NOMBRE"]),1,0,'C');	
							}
							$this->_pdf->Ln(5);
							$this->_pdf->SetFont('Arial','B',6);
							for ($k=0; $k < count($item3); $k++)
							{
								$this->_pdf->Cell(75,5,utf8_decode($item3[$k]["IDITEM"]).". ".utf8_decode($item3[$k]["NOMBRE"]),1,0);
								if($item3[$k]["IDITEM"]==401){
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_1),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_2),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_3),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_4),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_5),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_6),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_7),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_8),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_9),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_10),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_11),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_12),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_13),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_14),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_15),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_16),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_17),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_18),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_19),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a401_20),1,0,'C');
								}elseif($item3[$k]["IDITEM"]==402){
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_1),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_2),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_3),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_4),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_5),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_6),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_7),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_8),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_9),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_10),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_11),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_12),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_13),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_14),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_15),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_16),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_17),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_18),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_19),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a402_20),1,0,'C');
								}elseif($item3[$k]["IDITEM"]==403){
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_1),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_2),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_3),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_4),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_5),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_6),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_7),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_8),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_9),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_10),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_11),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_12),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_13),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_14),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_15),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_16),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_17),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_18),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_19),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a403_20),1,0,'C');
								}else{
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_1),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_2),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_3),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_4),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_5),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_6),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_7),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_8),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_9),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_10),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_11),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_12),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_13),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_14),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_15),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_16),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_17),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_18),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_19),1,0,'C');
									$this->_pdf->Cell((202/count($tipo3))/2,5,utf8_decode($a404_20),1,0,'C');
								}
								$this->_pdf->Ln(5);
							} 
							$this->_pdf->Cell(75,5,'405. TOTAL',1,0,'L');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_1+$a402_1+$a403_1+$a404_1,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_2+$a402_2+$a403_2+$a404_2,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_3+$a402_3+$a403_3+$a404_3,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_4+$a402_4+$a403_4+$a404_4,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_5+$a402_5+$a403_5+$a404_5,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_6+$a402_6+$a403_6+$a404_6,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_7+$a402_7+$a403_7+$a404_7,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_8+$a402_8+$a403_8+$a404_8,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_9+$a402_9+$a403_9+$a404_9,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_10+$a402_10+$a403_10+$a404_10,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_11+$a402_11+$a403_11+$a404_11,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_12+$a402_12+$a403_12+$a404_12,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_13+$a402_13+$a403_13+$a404_13,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_14+$a402_14+$a403_14+$a404_14,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_15+$a402_15+$a403_15+$a404_15,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_16+$a402_16+$a403_16+$a404_16,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_17+$a402_17+$a403_17+$a404_17,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_18+$a402_18+$a403_18+$a404_18,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_19+$a402_19+$a403_19+$a404_19,1,0,'C');
							$this->_pdf->Cell((202/count($tipo3))/2,5,$a401_20+$a402_20+$a403_20+$a404_20,1,0,'C');
							

							$this->_pdf->Ln(10);

						}elseif($i==6){
							$this->_pdf->Cell(120,10,utf8_decode($cabecera[$i]["NOMBRE"]),1,0,'C');
							$this->_pdf->Cell(157,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(120,15,'',0,0,'C');
							for ($j=0; $j < count($tipo4); $j++)
							{
								$this->_pdf->Cell((157/count($tipo4)),5,utf8_decode($tipo4[$j]["NOMBRE"]),1,0,'C');
							} 
							$this->_pdf->Ln(5);
							for ($k=0; $k < count($item4); $k++)
							{
								$this->_pdf->Cell(120,5,utf8_decode($item4[$k]["IDITEM"]).". ".utf8_decode($item4[$k]["NOMBRE"]),1,0);
								if($item4[$k]["IDITEM"]==501){
									$this->_pdf->Cell((157/count($tipo4)),5,utf8_decode($a501_23),1,0,'C');
									$this->_pdf->Cell((157/count($tipo4)),5,utf8_decode($a501_24),1,0,'C');
									$this->_pdf->Cell((157/count($tipo4)),5,utf8_decode($a501_25),1,0,'C');
									$this->_pdf->Cell((157/count($tipo4)),5,utf8_decode($a501_26),1,0,'C');
								}elseif($item4[$k]["IDITEM"]==502){
									$this->_pdf->Cell((157/count($tipo4)),5,utf8_decode($a502_23),1,0,'C');
									$this->_pdf->Cell((157/count($tipo4)),5,utf8_decode($a502_24),1,0,'C');
									$this->_pdf->Cell((157/count($tipo4)),5,utf8_decode($a502_25),1,0,'C');
									$this->_pdf->Cell((157/count($tipo4)),5,utf8_decode($a502_26),1,0,'C');
								}else{
									$this->_pdf->Cell((157/count($tipo4)),5,utf8_decode($a503_23),1,0,'C');
									$this->_pdf->Cell((157/count($tipo4)),5,utf8_decode($a503_24),1,0,'C');
									$this->_pdf->Cell((157/count($tipo4)),5,utf8_decode($a503_25),1,0,'C');
									$this->_pdf->Cell((157/count($tipo4)),5,utf8_decode($a503_26),1,0,'C');
								}
								$this->_pdf->Ln(5);
							} $this->_pdf->Ln(5);

						
						}elseif($i==8){
							if($marc==0){
								$this->_pdf->AddPage();
								 $this->_pdf->SetY(60);
								$this->_pdf->SetTextColor(255,192,203);
								 $this->_pdf->SetFont('Arial','B',60);
								$this->_pdf->Cell(277,5,utf8_decode('PREVISUALIZACION'),0,0,'C');
								$this->_pdf->Ln(60);
								$this->_pdf->Cell(277,5,utf8_decode('SIN VALIDEZ'),0,0,'C');
								$this->_pdf->SetxY(10,10);
								 $this->_pdf->SetFont('Arial','B',6);
								$this->_pdf->SetTextColor(0,0,0);
								$marc=$marc+1;
							}
							$this->_pdf->Cell(60,10,utf8_decode($cabecera[$i]["NOMBRE"]),1,0,'C');
							$this->_pdf->Cell(217,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(60,15,'',0,0,'C');
							for ($j=0; $j < count($tipo5); $j++)
							{	$this->_pdf->SetFont('Arial','B',5);
								$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($tipo5[$j]["NOMBRE"]),1,0,'C');
								$this->_pdf->SetFont('Arial','B',6);
							} 
							$this->_pdf->Ln(5);
							for ($k=0; $k < count($item5); $k++)
							{
								$this->_pdf->Cell(60,5,utf8_decode($item5[$k]["IDITEM"]).". ".utf8_decode($item5[$k]["NOMBRE"]),1,0);
								if($item5[$k]["IDITEM"]==601){
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a601_33),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a601_34),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a601_35),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a601_36),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a601_37),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a601_38),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a601_39),1,0,'C');
								}elseif($item5[$k]["IDITEM"]==602){
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a602_33),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a602_34),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a602_35),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a602_36),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a602_37),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a602_38),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a602_39),1,0,'C');
								}elseif($item5[$k]["IDITEM"]==603){
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a603_33),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a603_34),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a603_35),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a603_36),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a603_37),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a603_38),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a603_39),1,0,'C');
								}elseif($item5[$k]["IDITEM"]==604){
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a604_33),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a604_34),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a604_35),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a604_36),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a604_37),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a604_38),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a604_39),1,0,'C');
								}elseif($item5[$k]["IDITEM"]==605){
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a605_33),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a605_34),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a605_35),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a605_36),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a605_37),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a605_38),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a605_39),1,0,'C');
								}elseif($item5[$k]["IDITEM"]==606){
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a606_33),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a606_34),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a606_35),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a606_36),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a606_37),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a606_38),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a606_39),1,0,'C');
								}elseif($item5[$k]["IDITEM"]==607){
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a607_33),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a607_34),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a607_35),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a607_36),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a607_37),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a607_38),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a607_39),1,0,'C');
								}elseif($item5[$k]["IDITEM"]==608){
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a608_33),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a608_34),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a608_35),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a608_36),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a608_37),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a608_38),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a608_39),1,0,'C');
								}elseif($item5[$k]["IDITEM"]==609){
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a609_33),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a609_34),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a609_35),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a609_36),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a609_37),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a609_38),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a609_39),1,0,'C');
								}else{
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a610_33),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a610_34),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a610_35),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a610_36),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a610_37),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a610_38),1,0,'C');
									$this->_pdf->Cell((217/count($tipo5)),5,utf8_decode($a610_39),1,0,'C');
								}
								
								$this->_pdf->Ln(5);
							} $this->_pdf->Ln(5);

						
						}elseif($i==10){
							$this->_pdf->Cell(93,10,utf8_decode($cabecera[$i]["NOMBRE"]),1,'C');

							$this->_pdf->Cell(184,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(93,15,'',0,0,'C');
							for ($j=0; $j < count($tipo6); $j++)
							{	$this->_pdf->SetFont('Arial','',5);
								$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($tipo6[$j]["NOMBRE"]),1,0,'C');
								$this->_pdf->SetFont('Arial','B',6);
							} 
							$this->_pdf->Ln(5);
							for ($k=0; $k < count($item6); $k++)
							{
								$this->_pdf->Cell(93,5,utf8_decode($item6[$k]["IDITEM"]).". ".utf8_decode($item6[$k]["NOMBRE"]),1,0);
								if($item6[$k]["IDITEM"]==701){
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a701_40),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a701_41),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a701_42),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a701_43),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a701_44),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a701_45),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a701_46),1,0,'C');
								}elseif($item6[$k]["IDITEM"]==702){
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a702_40),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a702_41),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a702_42),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a702_43),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a702_44),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a702_45),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a702_46),1,0,'C');
								}elseif($item6[$k]["IDITEM"]==703){
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a703_40),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a703_41),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a703_42),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a703_43),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a703_44),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a703_45),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a703_46),1,0,'C');
								}elseif($item6[$k]["IDITEM"]==704){
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a704_40),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a704_41),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a704_42),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a704_43),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a704_44),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a704_45),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a704_46),1,0,'C');
								}elseif($item6[$k]["IDITEM"]==705){
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a705_40),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a705_41),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a705_42),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a705_43),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a705_44),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a705_45),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a705_46),1,0,'C');
								}else{
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a706_40),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a706_41),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a706_42),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a706_43),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a706_44),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a706_45),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a706_46),1,0,'C');
								}
								$this->_pdf->Ln(5);
							} $this->_pdf->Ln(5);

						
						}elseif($i==12){
							$this->_pdf->MultiCell(75,7.5,utf8_decode($cabecera[$i]["NOMBRE"]),1,'C');
							$this->_pdf->SetXY(85,120);
							$this->_pdf->Cell(202,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(75,15,'',0,0,'C');
							for ($j=0; $j < count($tipo7); $j++)
							{
								$this->_pdf->Cell((202/count($tipo7)),5,utf8_decode($tipo7[$j]["NOMBRE"]),1,0,'C');
							} 
							$this->_pdf->Ln(5);
							$this->_pdf->Cell(75,15,'',0,0,'C');
							for ($g=0; $g < count($subtipo2); $g++)
							{
								$this->_pdf->SetFont('Arial','B',5);
								$this->_pdf->Cell((202/count($tipo7)/2),5,utf8_decode($subtipo2[$g]["NOMBRE"]),1,0,'C');	
							}
							$this->_pdf->Ln(5);
							$this->_pdf->SetFont('Arial','B',6);
							for ($k=0; $k < count($item7); $k++)
							{
								$this->_pdf->Cell(75,5,utf8_decode($item7[$k]["IDITEM"]).". ".utf8_decode($item7[$k]["NOMBRE"]),1,0);
							    if($item7[$k]["IDITEM"]==801){
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a801_21),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a801_22),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a801_23),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a801_24),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a801_25),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a801_26),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a801_27),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a801_28),1,0,'C');
							    }elseif($item7[$k]["IDITEM"]==802){
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a802_21),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a802_22),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a802_23),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a802_24),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a802_25),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a802_26),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a802_27),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a802_28),1,0,'C');
							    }elseif($item7[$k]["IDITEM"]==803){
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a803_21),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a803_22),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a803_23),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a803_24),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a803_25),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a803_26),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a803_27),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a803_28),1,0,'C');
							    }elseif($item7[$k]["IDITEM"]==804){
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a804_21),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a804_22),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a804_23),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a804_24),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a804_25),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a804_26),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a804_27),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a804_28),1,0,'C');
							    }else{
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a805_21),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a805_22),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a805_23),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a805_24),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a805_25),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a805_26),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a805_27),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a805_28),1,0,'C');
							    }
								
								$this->_pdf->Ln(5);
							}
							 $this->_pdf->Cell(75,5,'806. TOTAL',1,0,'L');
							 $this->_pdf->Cell((202/count($tipo7))/2,5,$a801_21+$a802_21+$a803_21+$a804_21+$a805_21,1,0,'C');
							 $this->_pdf->Cell((202/count($tipo7))/2,5,$a801_22+$a802_22+$a803_22+$a804_22+$a805_22,1,0,'C');
							 $this->_pdf->Cell((202/count($tipo7))/2,5,$a801_23+$a802_23+$a803_23+$a804_23+$a805_23,1,0,'C');
							 $this->_pdf->Cell((202/count($tipo7))/2,5,$a801_24+$a802_24+$a803_24+$a804_24+$a805_24,1,0,'C');
							 $this->_pdf->Cell((202/count($tipo7))/2,5,$a801_25+$a802_25+$a803_25+$a804_25+$a805_25,1,0,'C');
							 $this->_pdf->Cell((202/count($tipo7))/2,5,$a801_26+$a802_26+$a803_26+$a804_26+$a805_26,1,0,'C');
							 $this->_pdf->Cell((202/count($tipo7))/2,5,$a801_27+$a802_27+$a803_27+$a804_27+$a805_27,1,0,'C');
							 $this->_pdf->Cell((202/count($tipo7))/2,5,$a801_28+$a802_28+$a803_28+$a804_28+$a805_28,1,0,'C');
							 
							 $this->_pdf->Ln(5);
							

						}
					} 
				}
				elseif($hemo==1)
				{
					for($i=0;$i<count($cabecera);$i=$i+2)
					{
						if($i==10)
						{
								$this->_pdf->Cell(93,10,utf8_decode($cabecera[$i]["NOMBRE"]),1,'C');

								$this->_pdf->Cell(184,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
								$this->_pdf->Ln(5);
								$this->_pdf->Cell(93,15,'',0,0,'C');
								for ($j=0; $j < count($tipo6); $j++)
								{	$this->_pdf->SetFont('Arial','',5);
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($tipo6[$j]["NOMBRE"]),1,0,'C');
									$this->_pdf->SetFont('Arial','B',6);
								} 
								$this->_pdf->Ln(5);
								for ($k=0; $k < count($item6); $k++)
								{
									$this->_pdf->Cell(93,5,utf8_decode($item6[$k]["IDITEM"]).". ".utf8_decode($item6[$k]["NOMBRE"]),1,0);
									if($item6[$k]["IDITEM"]==701){
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a701_40_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a701_41_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a701_42_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a701_43_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a701_44_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a701_45_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a701_46_2),1,0,'C');
								}elseif($item6[$k]["IDITEM"]==702){
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a702_40_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a702_41_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a702_42_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a702_43_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a702_44_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a702_45_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a702_46_2),1,0,'C');
								}elseif($item6[$k]["IDITEM"]==703){
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a703_40_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a703_41_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a703_42_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a703_43_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a703_44_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a703_45_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a703_46_2),1,0,'C');
								}elseif($item6[$k]["IDITEM"]==704){
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a704_40_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a704_41_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a704_42_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a704_43_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a704_44_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a704_45_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a704_46_2),1,0,'C');
								}elseif($item6[$k]["IDITEM"]==705){
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a705_40_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a705_41_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a705_42_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a705_43_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a705_44_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a705_45_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a705_46_2),1,0,'C');
								}else{
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a706_40_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a706_41_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a706_42_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a706_43_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a706_44_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a706_45_2),1,0,'C');
									$this->_pdf->Cell((184/count($tipo6)),5,utf8_decode($a706_46_2),1,0,'C');
								}
									$this->_pdf->Ln(5);
								} $this->_pdf->Ln(5);

							
							}elseif($i==12){
								$this->_pdf->MultiCell(75,7.5,utf8_decode($cabecera[$i]["NOMBRE"]),1,'C');
								$this->_pdf->SetXY(85,99);
								$this->_pdf->Cell(202,5,utf8_decode($cabecera[$i+1]["NOMBRE"]),1,0,'C');
								$this->_pdf->Ln(5);
								$this->_pdf->Cell(75,15,'',0,0,'C');
								for ($j=0; $j < count($tipo7); $j++)
								{
									$this->_pdf->Cell((202/count($tipo7)),5,utf8_decode($tipo7[$j]["NOMBRE"]),1,0,'C');
								} 
								$this->_pdf->Ln(5);
								$this->_pdf->Cell(75,15,'',0,0,'C');
								for ($g=0; $g < count($subtipo2); $g++)
								{
									$this->_pdf->SetFont('Arial','B',5);
									$this->_pdf->Cell((202/count($tipo7)/2),5,utf8_decode($subtipo2[$g]["NOMBRE"]),1,0,'C');	
								}
								$this->_pdf->Ln(5);
								$this->_pdf->SetFont('Arial','B',6);
								for ($k=0; $k < count($item7); $k++)
								{
									$this->_pdf->Cell(75,5,utf8_decode($item7[$k]["IDITEM"]).". ".utf8_decode($item7[$k]["NOMBRE"]),1,0);
									 if($item7[$k]["IDITEM"]==801){
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a801_21_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a801_22_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a801_23_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a801_24_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a801_25_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a801_26_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a801_27_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a801_28_2),1,0,'C');
							    }elseif($item7[$k]["IDITEM"]==802){
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a802_21_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a802_22_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a802_23_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a802_24_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a802_25_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a802_26_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a802_27_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a802_28_2),1,0,'C');
							    }elseif($item7[$k]["IDITEM"]==803){
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a803_21_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a803_22_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a803_23_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a803_24_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a803_25_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a803_26_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a803_27_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a803_28_2),1,0,'C');
							    }elseif($item7[$k]["IDITEM"]==804){
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a804_21_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a804_22_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a804_23_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a804_24_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a804_25_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a804_26_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a804_27_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a804_28_2),1,0,'C');
							    }else{
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a805_21_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a805_22_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a805_23_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a805_24_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a805_25_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a805_26_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a805_27_2),1,0,'C');
							    	$this->_pdf->Cell((202/count($tipo7))/2,5,utf8_decode($a805_28_2),1,0,'C');
							    }
									$this->_pdf->Ln(5);
								} 
								 $this->_pdf->Cell(75,5,'806. TOTAL',1,0,'C');
								 $this->_pdf->Cell((202/count($tipo7))/2,5,$a801_21_2+$a802_21_2+$a803_21_2+$a804_21_2+$a805_21_2,1,0,'C');
								 $this->_pdf->Cell((202/count($tipo7))/2,5,$a801_22_2+$a802_22_2+$a803_22_2+$a804_22_2+$a805_22_2,1,0,'C');
								 $this->_pdf->Cell((202/count($tipo7))/2,5,$a801_23_2+$a802_23_2+$a803_23_2+$a804_23_2+$a805_23_2,1,0,'C');
								 $this->_pdf->Cell((202/count($tipo7))/2,5,$a801_24_2+$a802_24_2+$a803_24_2+$a804_24_2+$a805_24_2,1,0,'C');
								 $this->_pdf->Cell((202/count($tipo7))/2,5,$a801_25_2+$a802_25_2+$a803_25_2+$a804_25_2+$a805_25_2,1,0,'C');
								 $this->_pdf->Cell((202/count($tipo7))/2,5,$a801_26_2+$a802_26_2+$a803_26_2+$a804_26_2+$a805_26_2,1,0,'C');
								 $this->_pdf->Cell((202/count($tipo7))/2,5,$a801_27_2+$a802_27_2+$a803_27_2+$a804_27_2+$a805_27_2,1,0,'C');
								 $this->_pdf->Cell((202/count($tipo7))/2,5,$a801_28_2+$a802_28_2+$a803_28_2+$a804_28_2+$a805_28_2,1,0,'C');

							}
						}
					}
			}
			$this->_pdf->Ln(10);	
			$this->_pdf->Cell(187,5,utf8_decode(''),0,0,'R');
			$this->_pdf->Cell(80,5,utf8_decode('O'),'B',0,'C');
			$this->_pdf->Ln(5);	
			$this->_pdf->Cell(187,5,utf8_decode(''),0,0,'R');
			$this->_pdf->Cell(80,5,utf8_decode('Nombre, Firma y Sello del Responsable'),0,0,'C');
			$this->_pdf->Output();
			$this->_vista->mensajeAlerta = "Evaluación ingresa con Éxito!!";
			$this->banSangre();
		}
	}
 ?>