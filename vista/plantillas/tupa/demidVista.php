<style>
	table{
		width: 70%;margin:1% 0% 2% 5%;
	}
	td{
		padding: 5px;
		border-bottom: 1px solid #ddd;
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

				<div class="row" style="text-align: left;">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-md-3 col-sm-4 col-xs-12">
								<mark>Formato Unico de Tramite Documentario: </mark>
							</div>
							<div class="col-md-3 col-sm-2 col-xs-12" style="margin-top: 1%;">
								<a type="button" class="btn btn-primary" href="<?php echo BASE_URL . 'tupa/descargarFormatoTupa/Acta.pdf';?>"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Descargar Formato</a>
							</div>
							<div class="col-md-3 col-sm-5 col-xs-12" style="margin-top: 1%;">
								<form enctype="multipart/form-data" method="POST" id="formCargaSolicitud">
								    <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
								    <input type="hidden" name="MAX_FILE_SIZE" value="240000" />
								    <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
								    <input name="solicitud_enviar" type="file" /><button type="button" class="btn btn-primary" style="margin-top: 2px;" id="enviarSolicitudad"><i class="fa fa-upload" aria-hidden="true"></i></button>
								</form>							  	
							</div>
						</div>					
						
					</div>
				</div>
				<hr>
				<div class="row" style="text-align: left;">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="radio">
  							<label><input type="radio" name="tipoProcedimiento" value="1"><b>Autorizaci&oacute;n Sanitaria de Oficinas Farmaceuticas y Farmacia de los Establecimientos de Salud:<br>A) De funcionamiento<br>B) Por Traslado<br>C) Por reinicio</b></label>
  							<div id="documentosProc1">
								<table>
									<tr>
										<td>Informe de la Fuente de Agua del sistema de abastecimiento (fisico-quimica, bacteriologico y parasitologico expedido por un laboratorio acreditado)</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Memoria descriptiva del sistema de abastecimiento del agua para consumo humano</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Comprobante de Pago de Derecho de Tramite</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio">		
  							<label><input type="radio" name="tipoProcedimiento" value="2"><b>Autorizaci&oacute; Sanitaria de Ampliaci&oacute;n o Modificaci&oacute;n de la Informaci&oacute;n, declarada respecto a &aacute;reas de oficinas Farmac&eacute;uticas, Farmacias de los Establecimietnos de Salud y Botiquines</b></label>
  							<div id="documentosProc2">
								<table>
									<tr>
										<td>Informe de la Fuente de Agua del sistema de abastecimiento (fisico-quimica, bacteriologico y parasitologico expedido por un laboratorio acreditado)</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Memoria descriptiva del sistema de abastecimiento del agua para consumo humano</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Comprobante de Pago de Derecho de Tramite</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio disabled">
  							<label><input type="radio" name="tipoProcedimiento" value="3"><b>Autorizacion Sanitaria de la informacion declarada por las Oficinas Farmaceuticas, Farmacias de los Establecimientos de Salud y Botiquines</b></label>
  							<div id="documentosProc3">
								<table>
									<tr>
										<td>Informe de la Fuente de Agua del sistema de abastecimiento (fisico-quimica, bacteriologico y parasitologico expedido por un laboratorio acreditado)</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Memoria descriptiva del sistema de abastecimiento del agua para consumo humano</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Comprobante de Pago de Derecho de Tramite</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio">		
  							<label><input type="radio" name="tipoProcedimiento" value="4"><b>Cierre Definitivo de Botica, Farmacia, Farmacias de Establecimientos de salud y botiquin</b></label>
  							<div id="documentosProc4">
								<table>
									<tr>
										<td>Informe de la Fuente de Agua del sistema de abastecimiento (fisico-quimica, bacteriologico y parasitologico expedido por un laboratorio acreditado)</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Memoria descriptiva del sistema de abastecimiento del agua para consumo humano</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Comprobante de Pago de Derecho de Tramite</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio">		
  							<label><input type="radio" name="tipoProcedimiento" value="5"><b>Cierre Temporal de Botica, Farmacia, Farmacias de Establecimientos de salud y botiquin</b></label>
  							<div id="documentosProc5">
								<table>
									<tr>
										<td>Informe de la Fuente de Agua del sistema de abastecimiento (fisico-quimica, bacteriologico y parasitologico expedido por un laboratorio acreditado)</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Memoria descriptiva del sistema de abastecimiento del agua para consumo humano</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Comprobante de Pago de Derecho de Tramite</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio">		
  							<label><input type="radio" name="tipoProcedimiento" value="6"><b>Autorizacion Sanitaria de Funcionamiento o Traslado de Botiquin</b></label>
  							<div id="documentosProc6">
								<table>
									<tr>
										<td>Informe de la Fuente de Agua del sistema de abastecimiento (fisico-quimica, bacteriologico y parasitologico expedido por un laboratorio acreditado)</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Memoria descriptiva del sistema de abastecimiento del agua para consumo humano</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Comprobante de Pago de Derecho de Tramite</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio">		
  							<label><input type="radio" name="tipoProcedimiento" value="7"><b>Autorizacion Sanitaria de Nueva Direccion Tecnica</b></label>
  							<div id="documentosProc7">
								<table>
									<tr>
										<td>Informe de la Fuente de Agua del sistema de abastecimiento (fisico-quimica, bacteriologico y parasitologico expedido por un laboratorio acreditado)</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Memoria descriptiva del sistema de abastecimiento del agua para consumo humano</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Comprobante de Pago de Derecho de Tramite</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio">		
  							<label><input type="radio" name="tipoProcedimiento" value="8"><b>Autorizacion Sanitaria de Renuncia de Direccion Tecnica de las Oficinas Farmaceuticas y Farmacia de los Establecimientos de Salud y Botiquines</b></label>
  							<div id="documentosProc8">
								<table>
									<tr>
										<td>Informe de la Fuente de Agua del sistema de abastecimiento (fisico-quimica, bacteriologico y parasitologico expedido por un laboratorio acreditado)</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Memoria descriptiva del sistema de abastecimiento del agua para consumo humano</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Comprobante de Pago de Derecho de Tramite</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio">		
  							<label><input type="radio" name="tipoProcedimiento" value="9"><b>Visacion de Libro Oficial de Control de Estupefacientes y/o Control de Psicotropicos</b></label>
  							<div id="documentosProc9">
								<table>
									<tr>
										<td>Informe de la Fuente de Agua del sistema de abastecimiento (fisico-quimica, bacteriologico y parasitologico expedido por un laboratorio acreditado)</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Memoria descriptiva del sistema de abastecimiento del agua para consumo humano</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Comprobante de Pago de Derecho de Tramite</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
								</table>
							</div>
						</div>	
						<div class="radio">		
  							<label><input type="radio" name="tipoProcedimiento" value="10"><b>Certificacion o renovacion de Buenas Practicas de<br>A) Oficina Farmaceutica<br>B) Farmacia de los Esteblecimientos de Salud<br>C) Botiquin</b></label>
  							<div id="documentosProc10">
								<table>
									<tr>
										<td>Informe de la Fuente de Agua del sistema de abastecimiento (fisico-quimica, bacteriologico y parasitologico expedido por un laboratorio acreditado)</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Memoria descriptiva del sistema de abastecimiento del agua para consumo humano</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Comprobante de Pago de Derecho de Tramite</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		
		mostrarAlertaDeInformacion('Para generar una solicitud debe adjuntar todos los documentos solicitados.');
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