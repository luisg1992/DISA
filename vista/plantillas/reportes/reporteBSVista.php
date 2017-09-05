	<link href="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.min.css';?>" rel="stylesheet">
	<link href="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.theme.min.css';?>" rel="stylesheet">

		
	<div style="float: left; max-width: 85%; min-width: 80%; margin-left: 1%;padding: 1%;text-align: center;">
		
		<div class="row">
			<div class="col-xs-12">
				<?php echo $this->breadcrumb; ?>
				<!-- aqui definir el contenido de la vista -->
					<h3>
						<?php echo $this->tituloGeneral;?>
					</h3>
					<div class="row" style="text-align: left;">
						<div class="col-md-3" id="filtroBusquedaReportesBSPersonal"  style="border-right: 2px groove #696969;">
							<label for="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHECKLIST PERSONAL</label>
							<br>
							<input type="text" name="NombreInstitucion" id="NombreInstitucion"	class="form-control" readonly>
							<input type="hidden" name="renaesInstitucion" id="renaesInstitucion"	class="form-control" >
							</br>
							<input type="number" class="form-control" placeholder="Año" name="anio" id="anio" value=<?php echo date('Y'); ?>></input>
							<hr>
							<a class="btn btn-info" href="<?php echo BASE_URL . 'reportes' . DS .  'reporteBS';?>">Limpiar <i class="fa fa-refresh" aria-hidden="true"></i></a>
							<button type="button" class="btn btn-danger" id="exportarReporteBSIndividual" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;Generar Reporte</button>
							
							<div style="text-align: center;margin-top: 5%;">
								<img src="<?php echo $rutasDisenio['img'] . 'reportes' . DS ;?>pronahebas.png"  style="width: 50%;">
							</div>
						</div>
						<div class="col-md-3" id="filtroBusquedaReportesBS">
							<label for="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;CHECKLIST</label>
							<br>
							<select name="" id="hemoterapia" class="form-control">
								<option value="">-- CENTRO HEMORERAPIA --</option>
								
							</select>
							<select name="" id="sector" class="form-control" style="margin-top: 1%;">
								<option value="">--SECTOR--</option>
							</select>
							</br>
							<input type="number" class="form-control" placeholder="Año" name="anio" id="anio" value=<?php echo date('Y'); ?>></input>
							<hr>
							<a class="btn btn-info" href="<?php echo BASE_URL . 'reportes' . DS .  'reporteBS';?>">Limpiar <i class="fa fa-refresh" aria-hidden="true"></i></a>
							<button type="button" class="btn btn-danger" id="exportarReporteBS" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;Generar Reporte</button>
							
							<div style="text-align: center;margin-top: 5%;">
								<img src="<?php echo $rutasDisenio['img'] . 'reportes' . DS ;?>pronahebas.png"  style="width: 50%;">
							</div>
						</div>
						
						<div class="col-md-4" id="filtroBusquedaReportesTiempo" style="border-left: 2px groove #696969;">
							<label for=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REPORTES CRONOLOGICOS</label>
							<br>
						<!-- 	<select name="" id="hemoterapia" class="form-control">
								<option value="">-- CENTRO HEMORERAPIA --</option>
								
							</select>
							<select name="" id="sector" class="form-control" style="margin-top: 1%;">
								<option value="">--SECTOR--</option>
							</select> -->
							<select name="" id="cronologia" class="form-control" style="margin-top: 1%;">
								<option value="0">--CRONOLOGIA--</option>
								<option value="1">Mensual</option>
								<option value="2">Bimestral</option>
								<option value="3">Trimestral</option>
								<option value="4">Semestral</option>
								<option value="5">Anual</option>
							</select>
							<select name="" id="mensual" class="form-control" style="margin-top: 1%;">
								<option value="">--MENSUAL--</option>
								<option value="1">Enero</option>
								<option value="2">Febrero</option>
								<option value="3">Marzo</option>
								<option value="4">Abril</option>
								<option value="5">Mayo</option>
								<option value="6">Junio</option>
								<option value="7">Julio</option>
								<option value="8">Agosto</option>
								<option value="9">Setiembre</option>
								<option value="10">Octubre</option>
								<option value="11">Noviembre</option>
								<option value="12">Diciembre</option>
							</select>
							<select name="" id="bimestral" class="form-control" style="margin-top: 1%;">
								<option value="">--BIMESTRAL--</option>
								<option value="1">1er Bimestre</option>
								<option value="2">2do Bimestres</option>
								<option value="3">3er Bimestre</option>
								<option value="4">4to Bimestre</option>
								<option value="5">5er Bimestre</option>
								<option value="6">6to Bimestre</option>
							</select>
							<select name="" id="trimestral" class="form-control" style="margin-top: 1%;">
								<option value="">--TRIMESTRAL--</option>
								<option value="1">1er Trimestre</option>
								<option value="2">2do Trimestre</option>
								<option value="3">3er Trimestre</option>
								<option value="4">4to Trimestre</option>
							</select>
							<select name="" id="semestral" class="form-control" style="margin-top: 1%;">
								<option value="">--SEMESTRAL--</option>
								<option value="1">1er Semestre</option>
								<option value="2">2do Semestre</option>
							</select>

							</br>
							<select name="" id="hemoterapiatipo" class="form-control">
								<option value="">-- CENTRO HEMORERAPIA --</option>
								
							</select>

							</br>
							<input type="number" class="form-control" placeholder="Año" name="aniocro" id="aniocro" value=<?php echo date('Y'); ?>></input>
							<br>
							<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 1%;">
					            <div class="ui-widget">
					                <label>NOMBRE INSTITUCION</label>
					                <div class="input-group">
					                 <input type="text" class="form-control" placeholder="Institucion" id="buscarInstitucion" name="buscarInstitucion" aria-describedby="sizing-addon2" style="" e="border-right: none;" autofocus  required>
					                 <span class="input-group-addon" id="sizing-addon2">           
					                     <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					                 </span>
					                </div> 
					            </div>
					        </div>
							<div class="col-md-5 col-sm-12 col-xs-12" style="margin-bottom: 1%;">
					            <div class="ui-widget">
					              <div class="input-group">
					                <input type="text" class="form-control" placeholder="Codigo Renaes" id="buscarRenaes" name="buscarRenaes" aria-describedby="sizing-addon2" style="border-right: none;" autofocus required>
					                <span class="input-group-addon" id="sizing-addon2">           
					                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					                  </span>
					                </div>
					                <br> 
					            </div>
					            <input type="text" id="idEstablecimientoGrabar" name="idEstablecimientoGrabar" hidden>
					        </div>
					          <br>

							<hr>
							<a class="btn btn-info" href="<?php echo BASE_URL . 'reportes' . DS .  'reporteBS';?>">Limpiar <i class="fa fa-refresh" aria-hidden="true"></i></a>
							<button type="button" class="btn btn-danger" id="exportarReporteTiemposBS" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;Generar Reporte</button>
							<div style="text-align: center;margin-top: 5%;">
								<img src="<?php echo $rutasDisenio['img'] . 'reportes' . DS ;?>pronahebas.png"  style="width: 50%;">
							</div>
						</div>
						<div class="col-md-3" id="filtroBusquedaReportesBSChecklist" style="border-left: 2px groove #696969;">
							<label for="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;CHECKLIST TOTAL</label>
							<br>
							<select name="" id="hemoterapiach" class="form-control">
								<option value="">-- CENTRO HEMORERAPIA --</option>
								
							</select>
							<select name="" id="sectorch" class="form-control" style="margin-top: 1%;">
								<option value="">--SECTOR--</option>
							</select>
							</br>
							<input type="number" class="form-control" placeholder="Año" name="anioch" id="anioch" value=<?php echo date('Y'); ?>></input>
							<hr>
							<a class="btn btn-info" href="<?php echo BASE_URL . 'reportes' . DS .  'reporteBSCh';?>">Limpiar <i class="fa fa-refresh" aria-hidden="true"></i></a>
							<button type="button" class="btn btn-danger" id="exportarReporteBSCh" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;Generar Reporte</button>
							
							<div style="text-align: center;margin-top: 5%;">
								<img src="<?php echo $rutasDisenio['img'] . 'reportes' . DS ;?>pronahebas.png"  style="width: 50%;">
							</div>
						</div>

					</div>
					<hr>
			</div>	
		</div>
	</div>


	<script type="text/javascript" src="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.min.js';?>"></script> 
	<script type="text/javascript">
		$(document).ready(function() {
			$("#filtroBusquedaReportesBSPersonal").hide();
			$("#filtroBusquedaReportesBS").hide();

				$.ajax({
		      url: '<?php echo BASE_URL . 'reportes/BuscarRenaes/';?>',
		      type: 'POST',
		      dataType: 'json',
		      data: {},
		      success: function(data)
		      {
		        if(data.NOMBRE==null){
		           $("#filtroBusquedaReportesBSPersonal").hide();
		        }
		        else{
		        	$("#filtroBusquedaReportesBSPersonal").show();
		        	//$("#filtroBusquedaReportesBS").hide();
					$("#filtroBusquedaReportesTiempo").hide();
					$("#filtroBusquedaReportesBSChecklist").hide();
		        }
		        $("#NombreInstitucion").val(data.NOMBRE);
		        $("#renaesInstitucion").val(data.ID);
		        return false;
		      }
		    });

			$("#buscarRenaes").autocomplete({
	        minLength: 2,
	        source: "<?php echo BASE_URL . 'informes/BusquedaDeInstitucionxId';?>",
	      focus: function( event, ui ) {
	            $("#buscarRenaes").val( ui.item.idestablecimiento );
	            
	            return false;
	          },
	          select: function( event, ui ) {
	            $("input[name='idEstablecimientoGrabar']").val(ui.item.idestablecimiento);
	            $("#buscarInstitucion").val(ui.item.Nombre);
	     

	        return false;
	          }

	      })
	      .autocomplete( "instance" )._renderItem = function( ul, item ) {
	        return $( "<li>" )
	          .append( "<div>" + item.idestablecimiento + "</div>" )
	          .appendTo( ul );
	      };

	     $("#buscarInstitucion").autocomplete({
	        minLength: 2,
	        source: "<?php echo BASE_URL . 'informes/BusquedaDeInstitucion';?>",
	      focus: function( event, ui ) {
	            $("#buscarInstitucion").val( ui.item.Nombre );
	            return false;
	          },
	          select: function( event, ui ) {
	            $("input[name='idEstablecimientoGrabar']").val(ui.item.idestablecimiento);
	            $("input[name='buscarRenaes']").val(ui.item.idestablecimiento);
	        return false;
	          }

	      })
	      .autocomplete( "instance" )._renderItem = function( ul, item ) {
	        return $( "<li>" )
	          .append( "<div>" + item.Nombre + "</div>" )
	          .appendTo( ul );
	      };

			$("#hemoterapia").append('');
					$.ajax({
						url: '<?php echo BASE_URL . 'reportes/crearOpcionesHemoterapia'; ?>',
						type: 'POST',
						dataType: 'json',
						data: {},
						success: function(data)
						{
							$("#hemoterapia").html(data);
							$("#hemoterapiach").html(data);
							$("#hemoterapiatipo").html(data);
						}
					});

			$("#sector").append('');
					$.ajax({
						url: '<?php echo BASE_URL . 'reportes/crearOpcionesSector'; ?>',
						type: 'POST',
						dataType: 'json',
						data: {},
						success: function(data)
						{
							$("#sector").html(data);
							$("#sectorch").html(data);
						}
					});

	   		$("#exportarReporteBS").click(function(event) {
				//var tipo = $('input[name=tipoReporte]:checked').val();
				var hemoterapia = $( "#hemoterapia" ).val();
				var sector = $( "#sector" ).val();
				var anio = $( "#anio" ).val();

				//alert(hemoterapia+' '+sector+' '+anio)
				window.open('<?php echo BASE_URL . "reportes/GenerarReporteBS"?>' + '/' + hemoterapia + '/' + sector + '/' + anio, '_blank');			
			});

			$("#exportarReporteBSCh").click(function(event) {
				//var tipo = $('input[name=tipoReporte]:checked').val();
				var hemoterapia = $( "#hemoterapiach" ).val();
				var sector = $( "#sectorch" ).val();
				var anio = $( "#anioch" ).val();

				//alert(hemoterapia+' '+sector+' '+anio)
				window.open('<?php echo BASE_URL . "reportes/GenerarReporteBSCh"?>' + '/' + hemoterapia + '/' + sector + '/' + anio, '_blank');			
			});

			$("#exportarReporteBSIndividual").click(function(event){

				var anio = $( "#anio" ).val();
				var rena = $("#renaesInstitucion").val();

				window.open('<?php echo BASE_URL . "reportes/GenerarReporteBSIndividual"?>' + '/' + anio + '/' + rena, '_blank');			
			});

			$("#mensual").hide();
			$("#bimestral").hide();
			$("#trimestral").hide();
			$("#semestral").hide();
			//primer filtro

			$("#cronologia").change(function(event) {
				//$("#derivadoFiltro1").fadeIn(400);

				if ($("#cronologia").val() == 1) {
					$("#bimestral").hide();
					$("#trimestral").hide();
					$("#semestral").hide();
					$("#mensual").fadeIn(400);
					return false;
				}

				if ($("#cronologia").val() == 2) {
					$("#mensual").hide();
					$("#trimestral").hide();
					$("#semestral").hide();
					$("#bimestral").fadeIn(400);
					return false;
				}

				if ($("#cronologia").val() == 3) {
					$("#mensual").hide();
					$("#bimestral").hide();
					$("#semestral").hide();
					$("#trimestral").fadeIn(400);
					return false;
				}

				if ($("#cronologia").val() == 4) {
					$("#mensual").hide();
					$("#bimestral").hide();
					$("#trimestral").hide();
					$("#semestral").fadeIn(400);
					return false;
				}

				if ($("#cronologia").val() == 5) {
					$("#mensual").hide();
					$("#bimestral").hide();
					$("#trimestral").hide();
					$("#semestral").hide();
					return false;
				}
			});

			$("#exportarReporteTiemposBS").click(function(event) {
				var cronologia = $("#cronologia").val();
				var mes = $("#mensual").val();
				var bimestre = $("#bimestral").val();
				var trimestre = $("#trimestral").val();
				var semestre = $("#semestral").val(); 
				var anio = $("#aniocro").val();
				var renaes = $( "#idEstablecimientoGrabar").val();
				var hemo = $("#hemoterapiatipo").val();

				if(renaes==0 || renaes==null){renaes="00";}
				if(cronologia==0)
				{
					alert('DEBE INGRESAR UN CICLO CRONOLOGICO');
				}
				if(cronologia==1)
				{
					if(mes==0)
					{
						alert('DEBE INGRESAR UN MES');exit();
					}
					window.open('<?php echo BASE_URL . "reportes/GenerarReporteBSMensual"?>' + '/' + mes + '/' + anio + '/' + renaes + '/' + hemo, '_blank');
				}
				if(cronologia==2)
				{
					if(bimestre==0)
					{
						alert('DEBE INGRESAR UN BIMESTRE');exit();
					}
					window.open('<?php echo BASE_URL . "reportes/GenerarReporteBSBimestral"?>' + '/' + bimestre + '/' + anio + '/' + renaes + '/' + hemo, '_blank');
				}
				if(cronologia==3)
				{
					if(trimestre==0)
					{
						alert('DEBE INGRESAR UN TRIMESTRE');exit();
					}
					window.open('<?php echo BASE_URL . "reportes/GenerarReporteBSTrimestral"?>' + '/' + trimestre + '/' + anio + '/' + renaes + '/' + hemo, '_blank');
				}
				if(cronologia==4)
				{
					if(semestre==0)
					{
						alert('DEBE INGRESAR UN SEMESTRE');exit();
					}
					window.open('<?php echo BASE_URL . "reportes/GenerarReporteBSSemestral"?>' + '/' + semestre + '/' + anio + '/' + renaes + '/' + hemo, '_blank');
				}
				if(cronologia==5)
				{
					window.open('<?php echo BASE_URL . "reportes/GenerarReporteBSAnual"?>' + '/' + anio  + '/' + renaes + '/' + hemo, '_blank');
				}
			});

		});
	</script>