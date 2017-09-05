<style>
	table{
		width: 70%;margin:1% 0% 2% 5%;
	}
	td{
		padding: 5px;
		border-bottom: 1px solid #ddd;
	}
	.tabla_formato_solicitud{
		margin: 0px;
		width: 100%;
		text-align: left;
	}

	.tabla_formato_solicitud td {
		padding: 5px;
		border-bottom: none;
	}
</style>

<!-- estructura basica para la creacion de vista -->

<div style="float: left; max-width: 85%; min-width: 80%; margin-left: 1%;padding: 2%;text-align: center;">
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
								<button class="btn btn-primary" data-toggle="modal" data-target="#modalFormato"><i class="fa fa-keyboard-o" aria-hidden="true"></i>&nbsp;Registro de Solicitud</button>
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
  							<label><input type="radio" name="tipoProcedimiento" value="1"><b>Registro de Sistemas de Abastecimiento de Agua</b></label>
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
  							<label><input type="radio" name="tipoProcedimiento" value="2"><b>Registro de Fuentes de Agua para Consumo Humano</b></label>
  							<div id="documentosProc2">
								<table>
									<tr>
										<td>Licencia de uso de agua, emitida por el sector correspondiente.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Estudio de factibilidad de fuentes de agua, otorgado por una universiodad y/o experiencia acreditada.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Analisis de la Caracterizaci&oacute;n de la calidad f&iacute;sica, qu&iacute;mica, microbiol&oacute;gica y parasit&oacute;logica, emitidos por un laboratorio acreditado.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Comprobante de Pago por Derecho de Tr&aacute;mite.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio disabled">
  							<label><input type="radio" name="tipoProcedimiento" value="3"><b>Autorizacion Sanitaria de Estaciones de Surtidores y Proveedores mediante Camiones Cisterna u otros medios en Condiciones Especiales de Distribucion de Agua</b></label>
  							<div id="documentosProc3">
								<table>
									<tr>
										<td>Analisis de calidad Microbiologica y Parasitologica del Agua, emitido por un laboratorio acreditado (Para camiones cisterna)</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Copia de Tarjeta de propiedad del Camion Cisterna.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Copia del Certificado de Desinfeccion del Sistema de ALmacenamiento de Agua del Camion Cisterna.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Comprobante de Pago por Derecho de Tramite.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Croquis de Ubicacion del establecimiento del Provvedor.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Memoria Descriptiva del Sistema de Abastecimiento de Agua (Minimo debe tener dos tipos de componentes, tratamiento y cantidad de agua suministrada), otorgado por una universidad y/o experiencia acreditada.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Copia de Licencia de Uso de la Fuente de Agua, otrogado por el Sector Correspondiente.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Libro de Registro de Camiones Cisterna a los que abastece, visado por la Direccion Ejecutiva de Salud Ambiental - DESA.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Copia del Certificado de Desinfeccion del Sistema de Almacenamiento de Agua.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Comprobante de Pago por Derecho de Tramite.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio">		
  							<label><input type="radio" name="tipoProcedimiento" value="4"><b>Certificacion de Habilitacion de Cementerios</b></label>
  							<div id="documentosProc4">
								<table>
									<tr>
										<td>Copia de la Escritura Publica de la Constitucion de Empresa y del Estatuto, inscrita em los Registros Publicos.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Copia del titulo de propiedad del terreno o cotnrato de opcion de compra, con firmas legalizadas y a nombre de la persona juridica promotora.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Plano de la ubicacion geografica en escala 1:5000.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Copia del plano de distribucion.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Copia de Resolucion Directoral que aprueba el Estudio de Impacto Ambiental (EIA) otrogado por la Direccion General de Salud Ambiental (DIGESA) que incluya el EIA aprobado.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Documento de aprobacion de la ubicacion geografica, otrogado por la Municipalidad Provincial correspondiente.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Copia del certificado de inexistencia de restos arqueologicos otorgado por el Ministerio de Cultura (MC).</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Copia de la Licencia de Funcionamiento Municipal.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio">		
  							<label><input type="radio" name="tipoProcedimiento" value="5"><b>Certificacion de Habitacion de Crematorios</b></label>
  							<div id="documentosProc5">
								<table>
									<tr>
										<td>Copia de la Escritura Publica de la Constitucion de Empresa y del Estatuto, inscrita en los registros Publicos.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Copia del titulo de propiedad del terreno o contrato de opcion de compra, con firmas legalizadas y a nombre de la persona juridica promotora.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Copia de plano de distribucion y especificaciones tecnicas que incluyan la distribucion de planta y corte de elevaciones</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Copia de Resoluciones Directoral que aprueba el Estuio de Impacto Ambiental (EIA) otrogado por la Direccion General de Salud Ambiental (DIGESA) que incluya el Estudio de Impacto Ambiental (EIA) aprobado.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Documento de aprobacion de la ubicacion geografica, otrogado por la Municipalidad Porvincial correspondiente.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio">		
  							<label><input type="radio" name="tipoProcedimiento" value="6"><b>Autorizacion Sanitaria para el Funcionamiento</b></label>
  							<div id="documentosProc6">
								<table>
									<tr>
										<td>Copia de Licencia de Construccion expedida por la Municipalidad Distritial correspondiente.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Copia de Licencia de Funcionamiento Municipal.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Comprobante de Pago pro Derecho de Tramite.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio">		
  							<label><input type="radio" name="tipoProcedimiento" value="7"><b>Inspeccion Tecnica por Inicio de Actividades de Empresas de Saneamiento Ambiental</b></label>
  							<div id="documentosProc7">
								<table>
									<tr>
										<td>Copia de la Escritura Publica de Constitucion de Empresa</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Memoria Descriptiva de Procedimientos</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Comprobante de pago por Derecho de Tramite</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio">		
  							<label><input type="radio" name="tipoProcedimiento" value="8"><b>certificacion de Aprobacion Sanitaria de Proyectos de Piscinas Publicas y privadas de Uso Colectivo</b></label>
  							<div id="documentosProc8">
								<table>
									<tr>
										<td>Memoria Descriptiva</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Copia del Plano de Ubicacion y Arquitectura.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="radio">		
  							<label><input type="radio" name="tipoProcedimiento" value="9"><b>Autorizacion sanitaria o Renovacion de Autorizacion Sanitaria para:<br>A) Clinicas Veneterinaras, centrs de Experimentacion deonde se realizan investigaciones de Canes. <br>B) Establecimientos de Crianza, Atencion, Comercializacion y Albergue de Canes</b></label>
  							<div id="documentosProc9">
								<table>
									<tr>
										<td>Proggrama de higiene y saneamiento del establecimiento.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Programa de bioseguridad para la prevencion de enfermedades transmisibles, refrendado por el Medico Veterinario Jefe.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Licencia de Construccion y Licencia de Funcionamiento.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Copia del Titulo Profesional y del Diploma de Colegiatura del Medico Veterinario Jefe.</td>
										<td><button class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Subir</button></td>
									</tr>
									<tr>
										<td>Comprobante de Pago por Derecho de Tramite.</td>
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

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modalFormato">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">
					<img src="<?php echo $rutasDisenio['img'];?>logos/disa.jpg" alt="">
				</h4>
			</div>
			<div class="modal-body" style="text-align: center;">
				<form method="POST" id="formularioRegistroSolicitud" action="<?php echo BASE_URL . 'tupa/GenerarSolicitudDesa'; ?>">
				<table class="tabla_formato_solicitud">
					<tr>
						<th colspan="2">I. INFORMACION GENERAL</th>
					</tr>
					<tr>
						<td>14. NOMBRES Y APELLIDOS (Si es Persona Natural):</td>
						<td>
							<input type="text" class="form-control" style="width: 100%;" name="solicitud_formato_personaNatural">
						</td>
					</tr>
					<tr>
						<td>15. NOMBRE DE LA EMPRESA O RAZON SOCIAL (Si es Persona Natural):</td>
						<td><input type="text" class="form-control" style="width: 100%;" name="solicitud_formato_personaJuridica"></td>
					</tr>
					<tr>
						<td>16. NOMBRE DEL REPRESENTATE LEGAL:</td>
						<td><input type="text" class="form-control" style="width: 100%;" name="solicitud_formato_representateLegal"></td>
					</tr>
					<tr>
						<td>18. N° DE REGISTRO UNICO DEL CONTRIBUYENTE(RUC):</td>
						<td>
							<input type="text" class="form-control" style="width: 100%;" name="solicitud_formato_ruc">
						</td>
					</tr>
					<tr>
						<td>19. DOMICILIO FISCAL</td>
						<td><input type="text" class="form-control" style="width: 100%;" name="solicitud_formato_domicilioFiscal"></td>
					</tr>
					<tr>
						<th colspan="2">DEL DIRECTOR TECNICO (En el caso de las empresas de saneamiento):</th>
					</tr>
					<tr>
						<td>NOMBRES Y APELLIDOS: </td>
						<td><input type="text" class="form-control" style="width: 100%;" name="solicitud_formato_nombreDirector"></td>
					</tr>
					<tr>
						<td>C.P.I. : </td>
						<td><input type="text" class="form-control" style="width: 100%;" name="solicitud_formato_cpiDirector"></td>
					</tr>
					
					<tr>
						<th colspan="2">V. DATOS DE NOTIFICACION:</th>
					</tr>
					<tr>
						<td>DIRECCION</td>
						<td><input type="text" class="form-control" style="width: 100%;" name="solicitud_formato_direccion"></td>
					</tr>
					<tr>
						<td>TELEFONO FIJO/CELULAR</td>
						<td><input type="text" class="form-control" style="width: 100%;" name="solicitud_formato_relefono"></td>
					</tr>
					<tr>
						<td>CORREO ELECTRONICO</td>
						<td><input type="text" class="form-control" style="width: 100%;" name="solicitud_formato_correo"></td>
					</tr>
				</table>
				<br>
				<h4><b>DECLARO BAJO JURAMENTO QUE LA INFORMACION QUE HE PROPORCIONADO, ES VERAZ Y ASUMO LAS RESPONSABILIDADES Y CONSECUENCiAS LEGALES QUE ELLO PRODUZCA.</b></h4>
				
			</div>
			<div class="modal-footer" style="text-align: center;">
				<button type="submit" class="btn btn-primary" formtarget="_blank">Generar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</form>
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