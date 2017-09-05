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
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#pagina1" data-toggle='tab'>Pestaña 1</a></li>
					  <li><a href="#pagina2" data-toggle='tab'>Pestaña 2</a></li>
					  <li><a href="#pagina3" data-toggle='tab'>Pestaña 3</a></li>
					</ul>
					<div class='row  tab-content'>
						<div class='col-md-10 col-md-offset-1 col-sm-12 col-xs-12 small tab-pane fade in active' id='pagina1'>
							<div class="row">
							<br><br>
								<!--<div class="col-md-2 col-sm-12 col-xs-12" style="margin-bottom: 1%;">
						            <div class="input-group">
								    	<input type="text" class="form-control input-md" name="dniPaciente" id="dniPacienteBuscar" placeholder="DNI">
								    	<span class="input-group-btn">
								       		<button class="btn btn-default" type="button" id="buscarDniPaciente"><i class="fa fa-search" aria-hidden="true"></i></button>
								    	</span>
									</div>
						        </div>-->
							</div>
							<div class="row">
								<div class="col-md-12">
									<div id="container" style="min-width: 250px; height: 600px; margin: 0 auto"></div>
								</div>
							</div>
						</div>
						<div class='col-md-10 col-md-offset-1 col-sm-12 col-xs-12 small tab-pane fade in' id='pagina2'>
							<div class="row">
							<br><br>
								<div class="col-md-2 col-sm-12 col-xs-12" style="margin-bottom: 1%;">
						           <div class="input-group">
								    	<input type="text" class="form-control input-md" name="dniPacienteLista" id="dniPacienteBuscarLista" placeholder="DNI">
								    	<span class="input-group-btn">
								       		<button class="btn btn-default" type="button" id="buscarDniPacienteLista"><i class="fa fa-search" aria-hidden="true"></i></button>
								    	</span>
									</div>
						        </div>
							</div>
							<div class="row">
							<div class="col-md-12 tabla">
								<div class="panel panel-default" style="text-align: left;">
									
									<div class="table-responsive">
										<table class="table table-bordered table-hover" id="resultadoGestantes">
											<thead>
												<tr>
													<th class="active text-center">VISITA N°</th>
													<th class="active">DNI</th>
													<th class="active">PACIENTE</th>
													<th class="active">ENCARGADO (A)</th>
													<th class="active">OPERACIONES</th>
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
							<div class="row">
								
							</div>
						</div>
						<div class='col-md-10 col-md-offset-1 col-sm-12 col-xs-12 small tab-pane fade in' id='pagina3'>
							PROBANDO3
						</div>
					</div>

				</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo BASE_URL .  'libreria/Highcharts/js/highcharts.js';?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL .  'libreria/Highcharts/js/modules/data.js';?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL .  'libreria/Highcharts/js/modules/drilldown.js';?>"></script>

<script>
	$(document).ready(function() {

	    function GenerarGrafico()
	    {
	    	$.ajax({
	    		url: '<?php echo BASE_URL . 'reportes/SumarListaAnemia'?>',
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
				            text: 'Gestantes y Puerperas'
				        },
				        subtitle: {
				            text: 'TEXTO <?php echo $this->ubicacion;?>'
				        },
				        xAxis: {
				            type: 'category'
				        },
				        yAxis: {
				            title: {
				                text: 'Total TEXTO: ' + data.total
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
				                name: 'Visita N° 1',
				                y: data.visita1,
				                drilldown: 'Microsoft Internet Explorer'
				            }, {
				                name: 'Visita N° 2',
				                y: data.visita2,
				                drilldown: 'Opera'
				            }, {
				                name: 'Visita N° 3',
				                y: data.visita3,
				                drilldown: 'Opera'
				            }, {
				                name: 'Visita N° 4',
				                y: data.visita4,
				                drilldown: 'Opera'
				            }, {
				                name: 'Visita N° 5',
				                y: data.visita5,
				                drilldown: 'Opera'
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

	    function DesabilitarTodo()
		{
			$(".tabla").hide();
		}
		DesabilitarTodo();

		$("#dniPacienteBuscarLista").change(function() {
			var dni = $("#dniPacienteBuscarLista").val();
			//alert(dni);
			$.ajax({
				url: '<?php echo BASE_URL . 'reportes/ListarVisitasGestantes'; ?>',
				type: 'POST',
				dataType: 'json',
				data: {
					dni: dni
				},
				success: function(data)
				{
					$("#resultadoGestantes > tbody").empty();
					$("#resultadoGestantes > tbody").append(data.html);
				}
			});
			$(".tabla").fadeIn();
		});
	});

	$("#resultadoGestantes").on('click', '#reporteGestante', function(event) {
			var dni = $(this).attr('data-rel1');
			var nvisita = $(this).attr('data-rel');
			window.open('<?php echo BASE_URL . "informes/ReporteGestantes"?>' + '/' + dni + '/' + nvisita, '_blank');
		});
</script>				