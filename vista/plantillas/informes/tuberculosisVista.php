<style>
	.tabla{
		width: 70%;margin:1% 0% 2% 5%;
	}
	.tede{
		padding: 5px;
		border-bottom: 1px solid #ddd;
	}

.onoffswitch4 {
    position: relative; width: 90px; margin-left: 100px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}

.onoffswitch4-checkbox {
    display: none;
}

.onoffswitch4-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #27A1CA; border-radius: 0px;
}

.onoffswitch4-inner {
    display: block; width: 200%; margin-left: -100%;
    -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
    -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
}

.onoffswitch4-inner:before, .onoffswitch4-inner:after {
    display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 26px;
    font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
    border: 2px solid transparent;
    background-clip: padding-box;
}

.onoffswitch4-inner:before {
    content: "Si";
    padding-left: 10px;
    background-color: #FFFFFF; color: #27A1CA;
}

.onoffswitch4-inner:after {
    content: "No";
    padding-right: 10px;
    background-color: #FFFFFF; color: #666666;
    text-align: right;
}

.onoffswitch4-switch {
    display: block; width: 25px; margin: 0px;
    background: #27A1CA;
    position: absolute; top: 0; bottom: 0; right: 65px;
    -moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
    -o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s; 
}

.onoffswitch4-checkbox:checked + .onoffswitch4-label .onoffswitch4-inner {
    margin-left: 0;
}

.onoffswitch4-checkbox:checked + .onoffswitch4-label .onoffswitch4-switch {
    right: 0px; 
}
</style>



<!-- estructura basica para la creacion de vista -->

<div style="float: left; max-width: 85%; min-width: 80%; margin-left: 1%;padding: 1%;text-align: center;">
	<div class="row">
		<div class="col-xs-12">
				<?php echo $this->breadcrumb; ?>
			<!-- aqui definir el contenido de la vista -->
				<h3>
					<?php echo $this->tituloGeneral;?>
				</h3>
				<hr>
				<div class='row'>

				
				<hr>
				<div class="panel panel-default">
				<div class='panel-heading'>Datos generales</div>
			  	<div class="panel-body">
			  	<div class='table-responsive'>
			  	<form method="post" id="formActualizar">
			    	<table style="width: 100%; border-collapse: separate;border-spacing: 1px;">
			    		<tr>
			    			<th colspan="5">Datos del Paciente</th>
			    		</tr>
			    		<tr>
			    			<td style="background: #f7f7f7;padding: 2px;">DNI</td>
			    			<td style="background: #f7f7f7;padding: 2px;">Nombre del Niño/Niña</td>
			    			<td style="background: #f7f7f7;padding: 2px;">Fecha de Nacimiento</td>
			    			<td style="background: #f7f7f7;padding: 2px;">Edad</td>
			    			<td style="background: #f7f7f7;padding: 2px;">Domicilo Actual</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				<input type="hidden" class="form-control" id="idCabecera" name="idCabecera">
			    				<input type="text" class="form-control input-sm" placeholder="Ingresar DNI" id="buscarDni" style="border-right: none;"  autofocus name="dni">
			    			</td>
			    			<td>
			    				<input type="text" class="form-control input-sm" id="nombreNino" style="border:none" name="nombre">
			    			</td>
			    			<td>
			    				<input type="text" class="form-control input-sm" id="fecNacimiento" style="border:none" name="fechaNac">
			    			</td>
			    			<td>
			    				<input type="text" class="form-control input-sm" id="edad" style="border:none">
			    			</td>
			    			<td>
			    				<input type="text" class="form-control input-sm" id="domicilio" style="border:none" name="domicilio">
			    			</td>
			    		</tr>
			    		<tr>
			    			<th colspan="5">Datos del Responsable</th>
			    		</tr>
			    		<tr>
			    			<td style="background: #f7f7f7;padding: 2px;">
			    				DNI del responsable
			    			</td>
			    			<td style="background: #f7f7f7;padding: 2px;">
			    				Nombre de persona responsable del niño(a)
			    			</td>
			    			<td style="background: #f7f7f7;padding: 2px;">
			    				fecha de nacimiento:
			    			</td>
			    			<td style="background: #f7f7f7;padding: 2px;">
			    				Edad
			    			</td>
			    			<td style="background: #f7f7f7;padding: 2px;">
			    				Parentesco con el niño(a)
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>
			    				<input type="text" class="form-control input-sm" id="buscarDniParentesco" style="border:none" name="dniRespon">
			    			</td>
			    			<td>
			    				<input type="text" class="form-control input-sm" id="nombResponsable" style="border:none" name="nombreRespon">
			    			</td>
			    			<td>
			    				<input type="text" class="form-control input-sm" id="fecNacimientoPariente" style="border:none" name="fechaNacRespon">
			    			</td>
			    			<td>
			    				<input type="text" class="form-control input-sm" id="edadPariente" style="border:none">
			    			</td>
			    			<td>
			    				<input type="text" class="form-control input-sm" id="parentesco" style="border:none" name="parentesco">
			    			</td>
			    		</tr>
			    		<tr>
			    			<th colspan="5">Datos Médicos</th>
			    			<tr>
			    				<td style="background: #f7f7f7;padding: 2px;">
			    					H.C. N°
			    				</td>
			    				<td style="background: #f7f7f7;padding: 2px;">
			    					Establecimiento de salud
			    				</td>
			    				<td style="background: #f7f7f7;padding: 2px;">
			    					Diagnóstico de hemoglobina
			    				</td>
			    				<td style="background: #f7f7f7;padding: 2px;">
			    					Anemia
			    				</td>
			    				<td style="background: #f7f7f7;padding: 2px;">
			    					Fecha de inicio de la toma del suplemento o micronutriente
			    				</td>
			    				
			    			</tr>
			    			<tr>
			    				<td>
			    					<input type="text" class="form-control input-sm" id="hnc" style="border:none" name="hnc">
			    				</td>
			    				<td>
			    					<input type="text" class="form-control input-sm" id="establecimiento" style="border:none" name="estableSalud">
			    				</td>
			    				<td>
			    					<input type="text" class="form-control input-sm" id="diagnostico" style="border:none" name="hemoglobina">
			    				</td>
			    				<td>
			    					<input type="text" class="form-control input-sm" id="anemiaEstado" style="border:none" name="anemia">
			    				</td>
			    				<td>
			    					<input type="text" class="form-control input-sm" id="fechaSuplemento" style="border:none" name="fechaIniSuple">
			    				</td>
			    				
			    			</tr>
			    		</tr>
			    	</table>   
			  		</form>
				  	</div>
				  	
				 </div>
				</div>
				
				</div> 
				
				
				<div class="row" style="text-align: left;margin-left: 300px;">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="radio">
  							<label><input type="radio" name="tipoProcedimiento" value="1"><b>Personas que presentan Tos y flemas por mas de 15 d&iacute;as</b></label>
  							<div id="documentosProc1">
								<table class="tabla">
									<tr>
										<td class="tede">Si Presenta Tos y expectoración - ¿Se realizó examen de esputo?</td>
										<td class="tede">
											<div class="onoffswitch4">
											    <input type="checkbox" name="PROBANDOTOS" class="onoffswitch4-checkbox" id="myonoffswitch1" checked>
											    <label class="onoffswitch4-label" for="myonoffswitch1">
											        <span class="onoffswitch4-inner"></span>
											        <span class="onoffswitch4-switch"></span>
    											</label>
    										</div>
    									</td>
									</tr>
									<tr>
										<td class="tede">Si la respuesta es <b>NO</b>, averiguar PORQUE?</td>
										<td class="tede"><input type="text" class="form-control" name=""></td>
									</tr>
									<tr>
										<td >Si la respuesta es Si Nombre del ESS donde dejó la muestra de esputo:</td>
										<td class="tede"><input type="text" class="form-control" name=""></td>
									</tr>
									<tr>
										<td class="tede">Fecha que dejó la muestra</td>
										<td class="tede"><input type="text" class="form-control" name=""></td>
									</tr>
									<tr>
										<td class="tede">Conoce el resultado?</td>
										<td class="tede">
											<div class="onoffswitch4">
											    <input type="checkbox" name="onoffswitch4" class="onoffswitch4-checkbox" id="myonoffswitch2" checked>
											    <label class="onoffswitch4-label" for="myonoffswitch2">
											        <span class="onoffswitch4-inner"></span>
											        <span class="onoffswitch4-switch"></span>
    											</label>
    										</div>
    									</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio">		
  							<label><input type="radio" name="tipoProcedimiento" value="2"><b>Persona Diagnosticado con TB*</b></label>
  							<div id="documentosProc2">
								<table class="tabla">
									<tr>
										<td class="tede">Si hay una persona diagnosticada con TB</td>
										<td class="tede">
											<div class="onoffswitch4">
											    <input type="checkbox" name="onoffswitch4" class="onoffswitch4-checkbox" id="myonoffswitch3" checked>
											    <label class="onoffswitch4-label" for="myonoffswitch3">
											        <span class="onoffswitch4-inner"></span>
											        <span class="onoffswitch4-switch"></span>
    											</label>
    										</div>
										</td>
									</tr>
									<tr>
										<td class="tede">Fecha de del diagnostico</td>
										<td class="tede"><input type="text" class="form-control" name=""></td>
									</tr>
									<tr>
										<td class="tede">Cuando inició su tratamiento?</td>
										<td class="tede"><input type="text" class="form-control" name=""></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio">
  							<label><input type="radio" name="tipoProcedimiento" value="3"><b>Persona que recibe tratamiento antituberculosis</b></label>
  							<div id="documentosProc3">
								<table class="tabla">
									<tr>
										<td class="tede">Acude diariamente a tomar tratamiento?</td>
										<td class="tede">
											<div class="onoffswitch4">
											    <input type="checkbox" name="onoffswitch4" class="onoffswitch4-checkbox" id="myonoffswitch4" checked>
											    <label class="onoffswitch4-label" for="myonoffswitch4">
											        <span class="onoffswitch4-inner"></span>
											        <span class="onoffswitch4-switch"></span>
    											</label>
    										</div>
										</td>
									</tr>
									<tr>
										<td class="tede">Si la respuesta es <b>NO, PORQUE?</b></td>
										<td class="tede"><input type="text" class="form-control" name=""></td>
									</tr>
									<tr>
										<td class="tede">Si la respuesta es SI, Nombre del EESS:</td>
										<td class="tede"><input type="text" class="form-control" name=""></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio">		
  							<label><input type="radio" name="tipoProcedimiento" value="4"><b>Abandonó Tratamiento antiTB*</b></label>
  							<div id="documentosProc4">
								<table class="tabla">
									<tr>
										<td class="tede">Abandonó Tratamiento antiTB</td>
										<td class="tede">
											<div class="onoffswitch4">
											    <input type="checkbox" name="onoffswitch4" class="onoffswitch4-checkbox" id="myonoffswitch4" checked>
											    <label class="onoffswitch4-label" for="myonoffswitch5">
											        <span class="onoffswitch4-inner"></span>
											        <span class="onoffswitch4-switch"></span>
    											</label>
    										</div>
										</td>
									</tr>
									<tr>
										<td class="tede">Si la respuesta es SI...¿Porque Abandonó tratamiento?</td>
										<td class="tede"><input type="text" class="form-control" name=""></td>
									</tr>
									<tr>
										<td class="tede">Nombre del EESS donde recibía tratamiento</td>
										<td class="tede"><input type="text" class="form-control" name=""></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio">		
  							<label><input type="radio" name="tipoProcedimiento" value="5"><b>Persona fallecido por TB en el ultimo año</b></label>
  							<div id="documentosProc5">
								<table class="tabla">
									<tr>
										<td class="tede">¿Sus contactos fueron examinados?</td>
										<td class="tede">
											<div class="onoffswitch4">
											    <input type="checkbox" name="onoffswitch4" class="onoffswitch4-checkbox" id="myonoffswitch6" checked>
											    <label class="onoffswitch4-label" for="myonoffswitch6">
											        <span class="onoffswitch4-inner"></span>
											        <span class="onoffswitch4-switch"></span>
    											</label>
    										</div>
										</td>
									</tr>
									<tr>
										<td class="tede">SI: Nombre del EESS</td>
										<td class="tede"><input type="text" class="form-control" name=""></td>
									</tr>
									<tr>
										<td class="tede">NO: Porque?</td>
										<td class="tede"><input type="text" class="form-control" name=""></td>
									</tr>
									<tr>
										<td class="tede">¿Alguien en su familia ha fallecido por TB en el ultimo año?</td>
										<td class="tede"><input type="text" class="form-control" name=""></td>
									</tr>
									<tr>
										<td class="tede">Han sido evaluados por el EESS  posterior al fallecimiento</td>
										<td class="tede"><input type="text" class="form-control" name=""></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="btn-toolbar" role="toolbar">
						  <div class="btn-group" style="margin-left: 220px;margin-top: 30px;">
						    <button type="button" class="btn btn-default btn-lg btn btn-primary">
						    <span class="glyphicon glyphicon-floppy-disk"></span> Guardar
						  </button>
						</div>
						</div>
					</div>
				</div>
		</div>
	</div>



<script type="text/javascript">
	$(document).ready(function() {
		
		//mostrarAlertaDeInformacion('Para generar una solicitud debe adjuntar todos los documentos solicitados.');
		function ocultarProcedimientos()
		{
			$("#documentosProc1").hide();
			$("#documentosProc2").hide();
			$("#documentosProc3").hide();
			$("#documentosProc4").hide();
			$("#documentosProc5").hide();
			$("#documentosProc6").hide();
			$("#documentosProc7").hide();
			$("#documentosProc8").hide();
			$("#documentosProc9").hide();
			$("#documentosProc10").hide();
		}

		ocultarProcedimientos();
		

		$("input:radio[name=tipoProcedimiento]").change(function(event) {
			ocultarProcedimientos();
			var id = $("input:radio[name=tipoProcedimiento]:checked").val();
			$("#documentosProc"+id).fadeIn(400);
			return false;
		});

		$("#enviarSolicitudad").click(function() {
			var formData = new FormData($("#formCargaSolicitud")[0]);
	        var message = ""; 
	        //hacemos la petición ajax  
	        $.ajax({
	            url: '<?php echo BASE_URL . 'tupa/SubirSolicitudDemid';?>',  
	            type: 'POST',
	            // Form data
	            //datos del formulario
	            data: formData,
	            //necesario para subir archivos via ajax
	            cache: false,
	            contentType: false,
	            processData: false,
	            //mientras enviamos el archivo
	            beforeSend: function(){
	                //message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
	                // showMessage(message)        
	            },
	            //una vez finalizado correctamente
	            success: function(data){
	               alert(data);
	               $("input[name=solicitud_enviar]").val('');
	            },
	            //si ha ocurrido un error
	            error: function(){
	                //message = $("<span class='error'>Ha ocurrido un error.</span>");
	                //showMessage(message);
	            }
        	});
        	return false;
		});

		
	});	
</script>