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
								<td>Nombre de Usuario:</td>
							</tr>
							<tr>
								<td>
									<input type="text" name="" id="" class="form-control" value="<?php echo $this->nombreUsuario;?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									Contraseña actual:
								</td>
							</tr>
							<tr>
								<td><input type="password" name="antigua_contra" id="antigua_v" class="form-control" required></td>
								
							</tr>
							<tr>
								<td><span id="mensaje1" style="color:red"></span></td>
							</tr>
							<tr>
								<td>
									Nueva Contraseña:
								</td>
							</tr>
							<tr>
								<td><input type="password" name="nueva_contra" id="pn" class="form-control" required></td>
							</tr>
							<tr>
								<td><span id="mensaje3" style="color:green"></span></td>
							</tr>
							<tr>
								<td>
									Repita la contraseña:
								</td>
							</tr>
							<tr>
								<td>
									<input type="password" name="repite_contra" id="npn" class="form-control" required>
								</td>
							</tr>
							<tr>
								<td><span id="mensaje2" style="color:green"></span></td>
							</tr>
						</table>
						
						<button class="btn btn-primary" style="margin-top: 1%;" type="submit">Guardar</button></form>
					</div>
				</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#pn').tooltip({'trigger':'focus', 'title': 'La nueva contraseña debe tener entre 4 a 8 caracteres', 'placement': 'right'});

		$("#formularioAcCon").submit(function(event) {
			
			$.ajax({
				url: '<?php echo BASE_URL . "usuario/actualizaContrasenia";?>',
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