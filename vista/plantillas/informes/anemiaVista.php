<link
	href="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.min.css';?>"
	rel="stylesheet">
<link
	href="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.theme.min.css';?>"
	rel="stylesheet">
<link href="<?php echo BASE_URL . 'libreria' . DS . 'datapicker' . DS . 'datepicker.css';?>" 	rel="stylesheet">
<script src="<?php echo BASE_URL . 'libreria' . DS . 'datapicker' . DS . 'bootstrap-datepicker.js'?>"></script>
<style>
	#tabla_cabecera{
		margin-left:15%;
		width: 70%;
		border-collapse: separate; 
		border-spacing: 0px;
		border: 1px solid #e5e5e5;
	}

	#tabla_cabecera td {
		border-right: 1px solid #e5e5e5;
		border-bottom: 1px solid #e5e5e5;

	}
	
	#tabla_cabecera input[type='text'], select
	{
		border: none;
		text-align: center;
	}

	.cabecera {
		background: #f5f5f5;
		padding: 3px;

	}
</style>
<div style="float: left; max-width: 85%; min-width: 80%; margin-left: 1%;padding: 1%;text-align: center;">

	<div class="row">
		<div class="col-xs-12">
			<?php echo $this->breadcrumb; ?>
			<!-- aqui definir el contenido de la vista -->
			<h3>
				<?php echo $this->tituloGeneral;?>
			</h3>
			<hr>
			<div class="row" >
				<div class="col-md-12 col-sm-12 col-xs-12" >
					<div id="primera">
					<form action="post" id="formularioRegistroAnemia">
						<table id="tabla_cabecera">
							<tr>
								<td colspan="4" class="cabecera"><b>Datos del Paciente</b></td>
							</tr>
							<tr>
								<td class="cabecera">DNI</td>
								<td class="cabecera">A. Paterno</td>
								<td class="cabecera">A. Materno</td>
								<td class="cabecera">Nombres</td>
							</tr>
							<tr>
								<td>
									<div class="input-group">
								    	<input type="text" class="form-control input-sm" name="dniPaciente" id="dniPacienteBuscar">
								    	<span class="input-group-btn">
								       		<button class="btn btn-default" type="button" id="buscarDniPaciente"><i class="fa fa-search" aria-hidden="true"></i></button>
								    	</span>
									</div>
								</td>
								<td>
									<input type="text" class="form-control input-sm" name="paternoPaciente">
								</td>
								<td>
									<input type="text" class="form-control input-sm" name="maternoPaciente"> 
								</td>
								<td>
									<input type="text" class="form-control input-sm" name="nombresPaciente">
								</td>
							</tr>
							<tr>
								<td class="cabecera">Fecha de Nacimiento</td>
								<td class="cabecera">Edad</td>
								<td class="cabecera">Domicilio</td>
								<td class="cabecera"></td>
							</tr>
							<tr>
								<td>
									<input type="text" class="form-control input-sm" id="fechaNacimiento" name="fechaNaciPaciente">
								</td>
								<td>
									<input type="text" class="form-control input-sm" id="edadPaciente">
								</td>
								<td>
									<input type="text" class="form-control input-sm" name="domicilioPaciente">
								</td>
								<td></td>
							</tr>
							<tr>
								<td colspan="4" class="cabecera"><b>Datos del Responsable</b></td>
							</tr>
							<tr>
								<td class="cabecera">DNI</td>
								<td class="cabecera">A. Paterno</td>
								<td class="cabecera">A. Materno</td>
								<td class="cabecera">Nombres</td>
							</tr>
							<tr>
								<td>
									<div class="input-group">
								    	<input type="text" class="form-control input-sm" name="dniResponsable">
								    	<span class="input-group-btn">
								       		<button class="btn btn-default" type="button" id="buscarDniPaciente"><i class="fa fa-search" aria-hidden="true"></i></button>
								    	</span>
									</div>									
								</td>
								<td>
									<input type="text" class="form-control input-sm" name="paternoResponsable">
								</td>
								<td>
									<input type="text" class="form-control input-sm" name="maternoResponsable">
								</td>
								<td>
									<input type="text" class="form-control input-sm" name="nombresResponsable">
								</td>
							</tr>
							<tr>
								<td class="cabecera">Fecha de Nacimiento</td>
								<td class="cabecera">Edad</td>
								<td class="cabecera">Parentesco</td>
								<td class="cabecera"></td>
							</tr>
							<tr>
								<td>
									<input type="text" class="form-control input-sm" id="fechaNacimiento1" name="fechaNaciResponsable">
								</td>
								<td>
									<input type="text" class="form-control input-sm" id="edadResponsable">
								</td>
								<td>
									<select class="form-control input-sm" name="parentescoResponsable">
										<?php
											echo $this->tiposParentescos;
										?>
									</select>
								</td>
								<td></td>
							</tr>
							<tr>
								<td colspan="4" class="cabecera"><b>Datos M&eacute;dicos</b></td>
							</tr>
							<tr>
								<td class="cabecera">Establecimiento de Salud</td>
								<td class="cabecera">N° H.C.</td>
								<td class="cabecera">Diagn&oacute;stico de Hemoglobina</td>
								<td class="cabecera">Anemia</td>
							</tr>
							<tr>
								<td>
									<div class="ui-widget">
										<input type="text" class="form-control input-sm" id="buscarEstablecimiento">
										<input type="hidden" name="idEstablecimiento">
									</div>
								</td>
								<td>
									<input type="text" class="form-control input-sm" name="historiaClinica">
								</td>
								<td>
									<input type="text" class="form-control input-sm" name="diagHemo">
								</td>
								<td style="text-align: center;">
									<input type="radio" name="anemiaCa" value="1" placeholder="" id="anemiaSi"><label for="anemiaSi">&nbsp;Si</label>&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="anemiaCa" value="0" placeholder="" id="anemiaNo"><label for="anemiaNo">&nbsp;No</label>
								</td>
							</tr>
							<tr>
								<td class="cabecera">N&uacute;mero de D&oacute;sis</td>
								<td class="cabecera">Fecha Visita</td>
								<td class="cabecera">Fecha Inicio Toma de Suplemento - Micronutriente</td>
								<td class="cabecera">N° Visita</td>
							</tr>
							<tr>
								<td>
									<input type="text" class="form-control input-sm" name="numDosis">
								</td>
								<td>
									<input type="text" class="form-control input-sm" value="<?php echo date('Y-m-d');?>" disabled name="fechaRegistro">
								</td>
								<td>
									<input type="text" class="form-control input-sm" name="fechaIniciSuplMicro" id="fecha3">
								</td>
								<td>
									<input type="text" class="form-control input-sm" disabled name="numVisitasw">
									<input type="hidden" name="numVisitas">
								</td>
							</tr>
						</table>
						<br>
						<button type="button" class="btn btn-primary btn-lg" id="comenzar_prueba">Comenzar Evaluaci&oacute;n <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></button>
					</div>
					<div id="segunda">
						<?php 
							echo $this->ficha;
						 ?>
						<textarea class="form-control" rows="5" name="observaciones" placeholder="Observaciones y Recomendaciones"></textarea>
						<button class="btn btn-primary" type="button" style="margin-top: 1%;" id="btnRegresar"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>&nbsp;Regresar</button>&nbsp;
						<button class="btn btn-primary" type="submit" style="margin-top: 1%;"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Guardar</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="mensajeAlerta">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-bell-o" aria-hidden="true"></i>&nbsp;DISA Lima Metropolitana
			</div>
			<div class="modal-body">
				<div id="mensajeModalResultado"></div>
			</div>
			<div class="modal-footer">
				<button type="button" id="AceptarMensajeAlerta" class="btn btn-primary"onclick="$('#mensajeAlerta').modal('hide');">Aceptar</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$("#fechaNacimiento").datepicker();
		$("#fechaNacimiento1").datepicker();
		$("#fecha3").datepicker();
		$("#segunda").hide();

		$("#comenzar_prueba").click(function(event) {
			$("#primera").hide();
			$("#segunda").fadeIn(400);
		});

		$("#btnRegresar").click(function(event) {
			$("#segunda").hide();
			$("#primera").fadeIn(400);
		});

		$("input[type='radio']").change(function(event) {
			$("input[type='radio']").each(function(index) {
   				if ($(this).is(':checked') == true) {
   					if($(this).attr('id').substr(6,1) == 'a')
   					{
   						$("#"+$(this).attr('id').substr(0,6)).attr('disabled', false);
   						$("#"+$(this).attr('id').substr(0,6)+'b').attr('name', $(this).attr('name')).val($(this).attr('id').substr(0,6));
   						
   					}
   					else
   					{
   						$("input[type='text'][name='" + $(this).attr('name') + "a']").attr('disabled', true);
   						$("input[type='hidden'][name='" + $(this).attr('name') + "']").removeAttr('name');   						
   					}
   				}
   			});
		});

		$("#formularioRegistroAnemia").submit(function(event) {
			$.ajax({
				url: '<?php echo BASE_URL . 'informes/registrarAnemia'?>',
				type: 'POST',
				dataType: 'json',
				data: $(this).serialize(),
				success: function(data)
				{
					$("#mensajeModalResultado").html(data);
					$("#mensajeAlerta").modal('show');
				}
			});
			return false;						
		});

		$("#fechaNacimiento").datepicker().on('changeDate', function (ev) {
    		var fecha = $("#fechaNacimiento").val();
    		var fecha = fecha.split("-");
    		var anio = parseInt(fecha[0]);
    		var mess = parseInt(fecha[1]);
    		var dia = parseInt(fecha[2]);

    		fecha_hoy = new Date();
			ahora_ano = fecha_hoy.getYear();
			ahora_mes = fecha_hoy.getMonth();
			ahora_dia = fecha_hoy.getDate();
			edad = (ahora_ano + 1900) - anio;
			    
			    if ( ahora_mes < (mess - 1)){
			      edad--;
			    }
			    if (((mess - 1) == ahora_mes) && (ahora_dia < dia)){ 
			      edad--;
			    }
			    if (edad > 1900){
			        edad -= 1900;
			    }
			 
			    $("#edadPaciente").val(edad);
		});

		$("#fechaNacimiento1").datepicker().on('changeDate', function (ev) {
    		var fecha = $("#fechaNacimiento1").val();
    		var fecha = fecha.split("-");
    		var anio = parseInt(fecha[0]);
    		var mess = parseInt(fecha[1]);
    		var dia = parseInt(fecha[2]);

    		fecha_hoy = new Date();
			ahora_ano = fecha_hoy.getYear();
			ahora_mes = fecha_hoy.getMonth();
			ahora_dia = fecha_hoy.getDate();
			edad = (ahora_ano + 1900) - anio;
			    
			    if ( ahora_mes < (mess - 1)){
			      edad--;
			    }
			    if (((mess - 1) == ahora_mes) && (ahora_dia < dia)){ 
			      edad--;
			    }
			    if (edad > 1900){
			        edad -= 1900;
			    }
			 
			    $("#edadResponsable").val(edad);
		});

		$("#buscarEstablecimiento").autocomplete({
		   	minLength: 2,
		   	source: "<?php echo BASE_URL . 'informes/BusquedaDeInstitucion';?>",
			focus: function( event, ui ) {
        		$("#buscarEstablecimiento").val( ui.item.Nombre );
        		return false;
      		},
      		select: function( event, ui ) {
      			$("input[name='idEstablecimiento']").val(ui.item.idestablecimiento);
				return false;
      		}

	    })
	    .autocomplete( "instance" )._renderItem = function( ul, item ) {
   			return $( "<li>" )
       		.append( "<div>" + item.Nombre + "</div>" )
       		.appendTo( ul );
   		};

   		$("#buscarDniPaciente").click(function(event) {
			$.ajax({
				url: '<?php echo BASE_URL . 'informes/buscarNumeroVisitas'?>',
				type: 'POST',
				dataType: 'json',
				data: {
					dniPaciente: $("#dniPacienteBuscar").val()
				},
				success: function(data)
				{
					if (data == null) {
						data = 0;
					}
					$("input[name='numVisitas']").val(data);
					$("input[name='numVisitasw']").val(parseInt(data) + parseInt(1));
				}
			});
			return false;
		});

   		$("#AceptarMensajeAlerta").click(function(event) {
   			window.location.href = "<?php echo BASE_URL . 'informes/anemia'; ?>"
   		});
	
	});
</script>
<script type="text/javascript"
	src="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.min.js';?>"></script>