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
				<hr>

				<div class="row" style="margin-top: 3%;">
					<div class="col-md-4 col-sm-8 col-xs-12 col-md-offset-4 col-sm-offset-2">
						<form id="formularioAcCon">
						<table style="width: 100%;text-align: left;border-collapse: separate;border-spacing: 5px;">
							<tr>
								<input type="hidden" name="empleado_id" value="<?php echo $this->idEmpleado;?>">
								<td>Institución:</td>
							</tr>
							<tr>
								<td>
									<input type="text" class="form-control" placeholder="Institucion" id="buscarInstitucion" name="buscarInstitucion" aria-describedby="sizing-addon2" autofocus  required>
								</td>
							</tr>
							<tr>
								<td>
									Codigo Renaes:
								</td>
							</tr>
							<tr>
								<td>
									<input type="text" class="form-control" placeholder="Codigo Renaes" id="buscarRenaes" name="buscarRenaes" aria-describedby="sizing-addon2"> 
								</td>
								
							</tr>
							<tr>
								<td><span id="mensaje1" style="color:red"></span></td>
							</tr>
							<tr>
								<td>
									Hemoterapia:
								</td>
							</tr>
							<tr>
								<td>
									<select name="hemoterapiach" id="hemoterapiach" class="form-control">
										<option value="">-- CENTRO HEMORERAPIA --</option>	
									</select>
								</td>
							</tr>
							<tr>
								<td>
									Sector:
								</td>
							</tr>
							<tr>
								<td>
									<select name="sectorch" id="sectorch" class="form-control" style="margin-top: 1%;">
										<option value="">--SECTOR--</option>
									</select>
								</td>
							</tr>
						</table>
						
						<button class="btn btn-primary" style="margin-top: 1%;" id="boton" type="submit">Guardar</button></form>
					</div>
				</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.min.js';?>"></script> 
<script>
	$(document).ready(function() {

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
	            $("input[name='usuario']").val(ui.item.Usuario);

	        return false;
	          }

	      })
	      .autocomplete( "instance" )._renderItem = function( ul, item ) {
	        return $( "<li>" )
	          .append( "<div>" + item.Nombre + "</div>" )
	          .appendTo( ul );
	      };

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

	    $("#hemoterapia").append('');
					$.ajax({
						url: '<?php echo BASE_URL . 'reportes/crearOpcionesHemoterapia'; ?>',
						type: 'POST',
						dataType: 'json',
						data: {},
						success: function(data)
						{
							//$("#hemoterapia").html(data);
							$("#hemoterapiach").html(data);
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
						//$("#sector").html(data);
						$("#sectorch").html(data);
					}
				});

		$("#formularioAcCon").submit(function(event) {
				
			$.ajax({
				url: '<?php echo BASE_URL . "usuario/agregarReporteBancoSangre";?>',
				type: 'POST',
				dataType: 'json',
				data: $(this).serialize(),
				success: function(data){
					switch(data.it){
						case 'M_1':
							$("#antigua_v").css('border', '1px solid red');
							$("#mensaje1").fadeIn('slow').text(data.mensaje);
							break;
						case 'M_2':
							$("#pn").css('border', '1px solid green');
							$("#npn").css('border', '1px solid green');
							$("#mensaje2").fadeIn('slow').text(data.mensaje);
							break;
						case 'M_3':
							mostrarAlertaDeInformacion(data.mensaje);
							break;
						case 'M_4':
							mostrarAlertaDeInformacion(data.mensaje);
							break;	
						case 'M_5':
							$("#pn").css('border', '1px solid green');
							$("#mensaje3").fadeIn('slow').text(data.mensaje);
							break;	
					}
				}
			});
			return false;
		});

		

	});
</script>
