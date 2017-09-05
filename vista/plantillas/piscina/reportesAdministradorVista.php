
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUhytGn6hio0_x8Zj_7Bnz7VMcLRWLn00"></script> 
<div style="float: left; max-width: 85%; min-width: 80%; margin-left: 1%;padding: 1%;text-align: center;">
	
	<div class="row">
		<div class="col-xs-12">
			<?php echo $this->breadcrumb; ?>
			<!-- aqui definir el contenido de la vista -->
				<h3>
					<?php echo $this->tituloGeneral;?>
				</h3>
				<div style="text-align: right;">
					<button class="btn btn-default btn-sm" style="position: absolute;border:none;" id="ocultarMT"><i class="fa fa-caret-up" aria-hidden="true"></i></button>
				</div>
				<hr>

				<div class="row" id="menuTrabajado">
					
					<div class="col-md-4" style="text-align: left;">
						<table style="width: 100%;">
							<tr>
								<td>
									<div class="radio">
										<label><input type="radio" name="optOpciones" value="21">Provinicia</label>	
									</div>
								</td>
								<td>
									<select name="" id="select_provinicias" class="form-control" style="width: 100%;">
										
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<div class="radio">
						  				<label><input type="radio" name="optOpciones" id="rbtnDistrito" value="23">Distrito</label>			
									</div>
								</td>
								<td>
									<select name="" id="select_distritos" class="form-control" style="width: 100%;">
										
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<div class="radio ">
						  				<label><input type="radio" name="optOpciones" value="22">Calificacion</label>			
									</div>
								</td>
								<td>
									<select name="" id="select_calificacion" class="form-control" style="width: 100%;">
										<option value="0"></option>
										<option value="s">Saludable</option>
										<option value="n">No saludable</option>
									</select>
								</td>
							</tr>
						</table>

						
						
						
					</div>
					<div class="col-md-2">
						<label><mark>Ubicaci&oacute;n: <?php echo $this->ubicacion;?></mark></label><br>
						<button type="button" class="btn btn-danger" data-toggle="modal" href='#modalPDF' style="width: 70%;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;PDF</button><br><br>
						<button type="button" class="btn btn-primary" data-toggle="modal" href='#modalIngresoPiscina' style="width: 70%;"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Agregar Piscina</button>
					</div>

					<div class="col-md-6">
						<div id="container" style="min-width: 250px; height: 250px; margin: 0 auto"></div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default" style="text-align: left;">
							
							<div class="table-responsive">
								<table class="table table-bordered table-hover" id="resultadoPiscinas">
									<thead>
										<tr>
											<th class="active text-center">#</th>
											<th class="active">Nombre</th>
											<th class="active">Direcci&oacute;n</th>
											<th class="active">Departamento</th>
											<th class="active">Provinicia</th>
											<th class="active">Distrito</th>
											<th class="active">Calificaci&oacute;n</th>
											<th class="active text-center">Operaciones</th>
										</tr>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</div>
						</div>
						<div id="paginado_v">
							
						</div>
					</div>			
				</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modalPDF">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Reportes Administraci&oacute;n</h4>
			</div>
			<div class="modal-body">
				<label for="">Por: </label>
				<div class="radio ">
					<label><input type="radio" name="tipoReporte" value="32">Departamento</label>			
				</div>
				<div class="radio ">
					<label><input type="radio" name="tipoReporte" value="31">Calificacion</label>			
				</div>
			</div>
			<div class="modal-footer" style="text-align: center;">
				<button type="button" class="btn btn-danger" id="exportarReportePiscina" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;Generar Reporte</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modalIngresoPiscina">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Ingreso de Nueva Piscina</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="formularioRegistroPiscina">
				<table style="width: 100%;border-collapse: separate;border-spacing: 5px;">
					<tr>
						<td>
							<label>Nombre:</label>
						</td>
						<td>
							<input type="text" class="form-control" name="nueva_piscina_nombre" required> 
						</td>
					</tr>
					<tr>
						<td>
							<label>Direcci&oacute;n:</label>
						</td>
						<td>
							<input type="text" class="form-control" name="nueva_piscina_direccion">
						</td>
					</tr>
					<tr>
						<td>
							<label>Departamento:</label>
						</td>
						<td>
							<select name="nueva_piscina_departamento" id="derivadoFiltro1" class="form-control">
								
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>Provinicia:</label>
						</td>
						<td>
							<select name="nueva_piscina_provincia" id="derivadoFiltro2" class="form-control">
								
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>Distrito:</label>
						</td>
						<td>
							<select name="nueva_piscina_distrito" id="derivadoFiltro3" class="form-control">
								
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>Latitud: </label>
						</td>
						<td>
							<input type="text" class="form-control" name="nueva_piscina_latitud">
						</td>
					</tr>
					<tr>
						<td>
							<label>Longitud:</label>
						</td>
						<td>
							<input type="text" class="form-control" name="nueva_piscina_longitud">
						</td>
					</tr>
				</table>
			</div>
			<div class="modal-footer" style="text-align: center;">
				<button type="submit" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i>&nbsp;Guardar</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalModificacionPiscina">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modificaci&oacute;n de Piscina</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="formularioModificarPiscina">
				<table style="width: 100%;border-collapse: separate;border-spacing: 5px;">
					<tr>
						<td>
							<label>Nombre:</label>
						</td>
						<td>
							<input type="hidden" name="modificar_codigo_piscina">
							<input type="text" class="form-control" name="modificar_piscina_nombre">
						</td>
					</tr>
					<tr>
						<td>
							<label>Direcci&oacute;n:</label>
						</td>
						<td>
							<input type="text" class="form-control" name="modificar_piscina_direccion">
						</td>
					</tr>
					<tr>
						<td>
							<label>Departamento:</label>
						</td>
						<td>
							<select name="modificar_piscina_departamento" id="derivadoFiltro11" class="form-control">
								
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>Provinicia:</label>
						</td>
						<td>
							<select name="modificar_piscina_provincia" id="derivadoFiltro21" class="form-control">
								
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>Distrito:</label>
						</td>
						<td>
							<select name="modificar_piscina_distrito" id="derivadoFiltro31" class="form-control">
								
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>Latitud: </label>
						</td>
						<td>
							<input type="text" class="form-control" name="modificar_piscina_latitud">
						</td>
					</tr>
					<tr>
						<td>
							<label>Longitud:</label>
						</td>
						<td>
							<input type="text" class="form-control" name="modificar_piscina_longitud">
						</td>
					</tr>
				</table>
			</div>
			<div class="modal-footer" style="text-align: center;">
				<button type="submit" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i>&nbsp;Guardar</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalGeografico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="nombrePiscinaModal"></h4>
      </div>
      <div class="modal-body">
        	<div id="map" style="width: 100%;height: 500px;"></div>
      </div>
      
    </div>
  </div>
</div>

<script>
	$(document).ready(function() {

		$.ajax({
			url: '<?php echo BASE_URL . 'piscina/listarProviniciasPiscinaAdministrador/'; ?>',
			type: 'POST',
			dataType: 'json',
			data: {},
			success: function(data)
			{
				$("#select_provinicias").append(data);
			}
		});

		$.ajax({
			url: '<?php echo BASE_URL . 'ubigeo/crearOpcionesDepartamentos/'; ?>',
			type: 'POST',
			dataType: 'json',
			data: {},
			success: function(data)
			{
				$("#derivadoFiltro1").append(data);
				$("#derivadoFiltro11").append(data);
			}
		});

		

		function DesabilitarTodo()
		{
			$("#select_provinicias").attr('disabled', true);
			$("#select_distritos").attr('disabled', true);
			$("#select_calificacion").attr('disabled', true);
			$("#rbtnDistrito").attr('disabled', true);
			$.ajax({
			url: '<?php echo BASE_URL . 'piscina/ListarPiscinasxDptoPaginada/'; ?>',
			type: 'POST',
			dataType: 'json',
			data: {
				dEmpezar: 0,
				dMostrar:10
			},
			success: function(data)
			{
				$("#resultadoPiscinas > tbody").empty();
				$("#resultadoPiscinas > tbody").append(data.html);
				$("#paginado_v").html(data.paginado);
			}
		});
		}

		DesabilitarTodo();

		$("input[type='radio'][name='optOpciones']").change(function(event) {
			if ($(this).val() == 21) {
				DesabilitarTodo();
				$("#select_provinicias").attr('disabled', false);
				$("#rbtnDistrito").attr('disabled', false);
				return false;
			}
			if ($(this).val() == 22) {
				DesabilitarTodo();
				$("#select_calificacion").attr('disabled', false);
				return false;
			}
			if ($(this).val() == 23) {
				
				$("#select_calificacion").attr('disabled', true);
				$("#select_distritos").attr('disabled', false);
				return false;
			}
		});

		$("#select_provinicias").change(function(event) {
			var prov = $("#select_provinicias").val();
			$.ajax({
				url: '<?php echo BASE_URL . 'piscina/listarDistritosPiscinaAdministrador/'; ?>' + prov,
				type: 'POST',
				dataType: 'json',
				data: {},
				success: function(data)
				{
					$("#select_distritos").html(null);
					$("#select_distritos").html(data);
				}
			});
		});

		$("#derivadoFiltro1").change(function(event) {
			var dpto = $("#derivadoFiltro1").val();	

			$.ajax({
					url: '<?php echo BASE_URL . 'ubigeo/crearOpcionesProvincia/'; ?>' + dpto,
					type: 'POST',
					dataType: 'json',
					data: {},
					success: function(data)
					{
						$("#derivadoFiltro2").html(data);
					}
				});
				
			
			return false;
		});

		$("#derivadoFiltro2").change(function(event) {
			var dpto = $("#derivadoFiltro1").val();	
			var prov = $("#derivadoFiltro2").val();	
			$.ajax({
					url: '<?php echo BASE_URL . 'ubigeo/crearOpcionesDistritos/'; ?>' + dpto + '/' + prov,
					type: 'POST',
					dataType: 'json',
					data: {},
					success: function(data)
					{
						$("#derivadoFiltro3").html(data);
					}
				});
				$("#derivadoFiltro3").fadeIn(400);
				return false;
		});

		$("#derivadoFiltro11").change(function(event) {
			var dpto = $("#derivadoFiltro11").val();	

			$.ajax({
					url: '<?php echo BASE_URL . 'ubigeo/crearOpcionesProvincia/'; ?>' + dpto,
					type: 'POST',
					dataType: 'json',
					data: {},
					success: function(data)
					{
						$("#derivadoFiltro21").html(data);
					}
				});
				
			
			return false;
		});

		$("#derivadoFiltro21").change(function(event) {
			var dpto = $("#derivadoFiltro11").val();	
			var prov = $("#derivadoFiltro21").val();	
			$.ajax({
					url: '<?php echo BASE_URL . 'ubigeo/crearOpcionesDistritos/'; ?>' + dpto + '/' + prov,
					type: 'POST',
					dataType: 'json',
					data: {},
					success: function(data)
					{
						$("#derivadoFiltro31").html(data);
					}
				});
				$("#derivadoFiltro31").fadeIn(400);
				return false;
		});

		$("#formularioRegistroPiscina").submit(function(event) {
			$.ajax({
				url: '<?php echo BASE_URL . 'piscina/registroPiscina'?>',
				type: 'POST',
				dataType: 'json',
				data: $(this).serialize(),
				success: function(data){
					$("#modalIngresoPiscina").modal('hide');
					mostrarAlertaDeInformacion(data);
					LimpiarElementos();
					DesabilitarTodo();
				}	
			});
			return false;
		});

		$("#formularioModificarPiscina").submit(function(event) {
			$.ajax({
				url: '<?php echo BASE_URL . 'piscina/ActualizarPiscinas'?>',
				type: 'POST',
				dataType: 'json',
				data: $(this).serialize(),
				success: function(data){
					$("#modalModificacionPiscina").modal('hide');
					mostrarAlertaDeInformacion(data);
					LimpiarElementos();
					DesabilitarTodo();
				}	
			});

			return false;
		});

		$("#paginado_v").on('click', '#paginacionxDpto', function(event) {
			


			$.ajax({
				url: '<?php echo BASE_URL . 'piscina/ListarPiscinasxDptoPaginada/'; ?>',
				type: 'POST',
				dataType: 'json',
				data: {
					dEmpezar:$(this).attr('data-rel') ,
					dMostrar:10
				},
				success:function(data)
				{
					$("#resultadoPiscinas > tbody").empty();
					$("#resultadoPiscinas > tbody").append(data.html);
					$("#paginado_v").html(data.paginado);
				}
			});
		});

		$("#paginado_v").on('click', '#paginacionxCalificacionxDepartamento', function(event) {
			var val_califica = $("#select_calificacion").val();
			$.ajax({
				url: '<?php echo BASE_URL . 'piscina/ListarPiscinasxCalificacionxDepartamento/'; ?>',
				type: 'POST',
				dataType: 'json',
				data: {
					dEmpezar: $(this).attr('data-rel'),
					dMostrar:10,
					calificacion: val_califica
				},
				success: function(data)
				{
					$("#resultadoPiscinas > tbody").empty();
					$("#resultadoPiscinas > tbody").append(data.html);
					$("#paginado_v").html(data.paginado);
				}
			});
		
		});

		$("#select_calificacion").change(function(event) {
			var val_califica = $("#select_calificacion").val();
			$.ajax({
				url: '<?php echo BASE_URL . 'piscina/ListarPiscinasxCalificacionxDepartamento/'; ?>',
				type: 'POST',
				dataType: 'json',
				data: {
					dEmpezar: 0,
					dMostrar:10,
					calificacion: val_califica
				},
				success: function(data)
				{
					$("#resultadoPiscinas > tbody").empty();
					$("#resultadoPiscinas > tbody").append(data.html);
					$("#paginado_v").html(data.paginado);
				}
			});
		});

		$("#select_distritos").change(function(event) {
			var distrito = $("#select_distritos").val();
			var provincia = $("#select_provinicias").val();

			$.ajax({
				url: '<?php echo BASE_URL . 'piscina/ListarrPiscinasxUbigeo'; ?>',
				type: 'POST',
				dataType: 'json',
				data: {
					dEmpezar: 0,
					dMostrar:10,
					ubigeo: provincia+distrito
				},
				success: function(data)
				{
					$("#resultadoPiscinas > tbody").empty();
					$("#resultadoPiscinas > tbody").append(data.html);
					$("#paginado_v").html(data.paginado);
				}
			});
		});



$("#ocultarMT").click(function(event) {
	$("#menuTrabajado").each(function() {
        displaying = $(this).css("display");
        if(displaying == "block") {
          $(this).fadeOut('300',function() {
           $(this).css("display","none");
          });
        } else {
          $(this).fadeIn('400',function() {
            $(this).css("display","block");
          });
        }
      });
});

		/*editar piscinas*/
		$("#resultadoPiscinas").on('click', '#editPiscina', function(event) {
			$.ajax({
				url: '<?php echo BASE_URL . "piscina/MostrarDatosdePiscinasxCodigo"?>',
				type: 'POST',
				dataType: 'json',
				data: {codigo: $(this).attr('data-rel')},
				success: function(data)
				{
					$("input[name=modificar_codigo_piscina]").val(data.CODIGO);
					$("input[name=modificar_piscina_nombre]").val(data.NOMBRE);
					$("input[name=modificar_piscina_direccion]").val(data.DIRECCION);
					$("input[name=modificar_piscina_latitud]").val(data.LATITUD);
					$("input[name=modificar_piscina_longitud]").val(data.LONGITUD);
					$("#derivadoFiltro21").html(null);
					$("#derivadoFiltro21").html(data.PROVINICIAS);
					$("#derivadoFiltro31").html(null);
					$("#derivadoFiltro31").html(data.DISTRITOS);

					$('select[name=modificar_piscina_departamento] option[value="' + data.CODIGODPTO + '"]').attr('selected', 'selected');
					$('select[name=modificar_piscina_provincia] option[value="' + data.CODIGOPROV + '"]').attr('selected', 'selected');
					$('select[name=modificar_piscina_distrito] option[value="' + data.CODIGODSTR + '"]').attr('selected', 'selected');
				}
			});
			$("#modalModificacionPiscina").modal('show');
			return false;
		});

		/*elimiar piscinas*/
		$("#resultadoPiscinas").on('click', '#deltPiscina', function(event) {
			$.ajax({
				url: '<?php echo BASE_URL . "piscina/EliminarPiscinas"?>',
				type: 'POST',
				dataType: 'json',
				data: {codigo: $(this).attr('data-rel')},
				success: function(data)
				{
					mostrarAlertaDeInformacion(data);
					DesabilitarTodo();
				}
			});
			
		});


		$("#exportarReportePiscina").click(function(event) {
			var tipo = $('input[name=tipoReporte]:checked').val();
			
			window.open('<?php echo BASE_URL . "piscina/GenerarReportePiscina"?>' + '/' + tipo, '_blank');			
		});

		   $("#resultadoPiscinas").on('click', '#ubicacionPiscina', function(event) {
   			
   			// $("#nombrePiscinaModal").text($(this).attr('data-rel'));
   			// 
   			// initialize();
   			// $("#modalGeografico").modal('show');

   			$.ajax({
   				url: '<?php echo BASE_URL . "piscina/generarInformacionGeografica/"?>' + $(this).attr('data-rel'),
   				type: 'POST',
   				dataType: 'json',
   				data: {},
   				success: function(data)
   				{
   					var nombre = data.nombre;
   					var latitud = data.latitud;
   					var longitud = data.longitud;
   					initialize(nombre,latitud,longitud);
   					$("#nombrePiscinaModal").text(nombre);
   					$("#modalGeografico").modal('show');
   				}
   			});
   			
   			return false;
   		});

   			var map;        
            
			

			function initialize(nombre,latitud,longitud) {
				var myCenter =new google.maps.LatLng(latitud, longitud);
				var marker = new google.maps.Marker({
			    position:myCenter
			});
			  var mapProp = {
			      center:myCenter,
			      zoom: 16,
			      draggable: true,
			      scrollwheel: true,
			      mapTypeId:google.maps.MapTypeId.ROADMAP
			  };
			  
			  map=new google.maps.Map(document.getElementById("map"),mapProp);
			  marker.setMap(map);
			    
			  google.maps.event.addListener(marker, 'click', function() {
			      
			    infowindow.setContent(contentString);
			    infowindow.open(map, marker);
			    
			  }); 
			};
			google.maps.event.addDomListener(window, 'load', initialize);

			google.maps.event.addDomListener(window, "resize", resizingMap());

			$('#modalGeografico').on('show.bs.modal', function() {
			   //Must wait until the render of the modal appear, thats why we use the resizeMap and NOT resizingMap!! ;-)
			   resizeMap();
			})

			function resizeMap() {
			   if(typeof map =="undefined") return;
			   setTimeout( function(){resizingMap();} , 400);
			}

			function resizingMap() {
			   if(typeof map =="undefined") return;
			   var center = map.getCenter();
			   google.maps.event.trigger(map, "resize");
			   map.setCenter(center); 
			}

	});
</script>

<script type="text/javascript" src="<?php echo BASE_URL .  'libreria/Highcharts/js/highcharts.js';?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL .  'libreria/Highcharts/js/modules/data.js';?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL .  'libreria/Highcharts/js/modules/drilldown.js';?>"></script>

<script>
	$(document).ready(function() {
		

	    function GenerarGrafico()
	    {
	    	$.ajax({
	    		url: '<?php echo BASE_URL . 'piscina/SumarListaCalificacion'?>',
	    		type: 'POST',
	    		dataType: 'json',
	    		data: {},
	    		success: function(data)
	    		{
	    			$('#container').highcharts({
				        chart: {
				            type: 'column'
				        },
				        title: {
				            text: 'Piscinas'
				        },
				        subtitle: {
				            text: 'Departamento <?php echo $this->ubicacion;?>'
				        },
				        xAxis: {
				            type: 'category'
				        },
				        yAxis: {
				            title: {
				                text: 'Total Piscinas: ' + data.total
				            }

				        },
				        legend: {
				            enabled: false
				        },
				        plotOptions: {
				            series: {
				                borderWidth: 0,
				                dataLabels: {
				                    enabled: true,
				                    format: '{point.y:.1f}%'
				                }
				            }
				        },

				        tooltip: {
				            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
				            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
				        },

				        series: [{
				            name: 'Calificaciones',
				            colorByPoint: true,
				            data: [{
				                name: 'Saludables',
				                y: data.saludable,
				                drilldown: 'Microsoft Internet Explorer'
				            }, {
				                name: 'No Saludables',
				                y: data.nosaludable,
				                drilldown: 'Opera'
				            }, {
				                name: 'Sin Calificar',
				                y: data.entramite,
				                drilldown: null
				            }]
				        }],
				        credits: {
                    		text: 'OITE / ÁREA DE DESARROLLO DE SISTEMAS'
                		}
				    });
	    		}
	    	});
	    	return false;
	    }

	    GenerarGrafico();
	});
</script>				