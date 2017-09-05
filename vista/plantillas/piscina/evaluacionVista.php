<link href="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.min.css';?>" rel="stylesheet">
<link href="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.theme.min.css';?>" rel="stylesheet">
<style>
	#itemsEval{
		width: 100%;
		margin:1% 0% 0% 0%;
	}
	#itemsEval td{
		padding: 5px;
		border-right: 1px solid #ddd;
	}
	.fijo{
		position: fixed;
		width: 17% !important;
		left: 19.5%;
		top:0;
		z-index: 10;
		background-color: white;
		-webkit-box-shadow: 0px 1px 10px 1px rgba(0,0,0,0.19);
		-moz-box-shadow: 0px 1px 10px 1px rgba(0,0,0,0.19);
		box-shadow: 0px 1px 10px 1px rgba(0,0,0,0.19);
	}
</style>


<?php if($this->mensajeAlerta): ?>
	<script type="text/javascript">
		$(document).ready(function() {
			mostrarAlertaDeInformacion('<?php echo $this->mensajeAlerta; ?> ' + '<br>' + '<?php echo "Piscina Registrada: " . $this->NombrePiscina; ?>' + '<br>'+ '<?php echo "Calificación: " . $this->calificacion; ?>');
			return false;
		});
	</script>
<?php endif; ?>
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

				<div class="row">
					<div class="col-md-5 col-md-offset-1 col-sm-12 col-xs-12" style="margin-bottom: 1%;">
						<div class="ui-widget">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Piscinas" id="buscarPiscinas" aria-describedby="sizing-addon2" style="border-right: none;" autofocus>
								<span class="input-group-addon" id="sizing-addon2">				  	
						  			<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						  		</span>
						  	</div>
						</div>
						<div style="text-align: left;width: 50%;" id="ContadorItems">
							<table id="itemsEval">
								<tr>
									<td><mark>TOTAL ITEMS:</mark></td>
									<td style="text-align: center;">12</td>
									<td style="text-align: center;"><i class="fa fa-dot-circle-o" aria-hidden="true"></i></td>
								</tr>
								<tr>
									<td><mark>BUENAS:</mark></td>
									<td style="text-align: center;" id="buenasEval">0</td>
									<td style="text-align: center;"><img src="<?php echo $rutasDisenio['img']?>piscinas/cig.png" alt="" width="30"></td>
								</tr>
								<tr>
									<td><mark>MALAS:</mark></td>
									<td style="text-align: center;" id="malasEval">0</td>
									<td style="text-align: center;"><img src="<?php echo $rutasDisenio['img']?>piscinas/rig.png" alt="" width="25"></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-md-5 col-sm-12 col-xs-12">
						<div class="panel panel-default">
						  	<div class="panel-body">
						    	<table style="text-align: left; width: 100%;">
						    		<tr>
						    			<td>
						    				<label for="">Nombre: </label>
						    			</td>
						    			<td>
						    				<mark id="nombreRP"></mark>
						    			</td>
						    		</tr>
						    		<tr>
						    			<td>
						    				<label for="">Direccion: </label>
						    			</td>
						    			<td>
						    				<span id="direccionRP"></span>
						    			</td>
						    		</tr>
						    		<tr>
						    			<td>
						    				<label for="">Distrito: </label>
						    			</td>
						    			<td>
						    				<span id="DistritoRP"></span>
						    			</td>
						    		</tr>
						    	</table>
						  	</div>
						</div>
					</div>
				</div>
				
				<hr>

				<!-- tablas -->				

				<?php echo $this->cuerpoEvaluacion;?>

			<!-- fin del contenido -->
		</div>
	</div>
</div>



<!-- js -->
<script type="text/javascript" src="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.min.js';?>"></script> 

<script type="text/javascript">
	$(document).ready(function() {
		$("#buscarPiscinas").autocomplete({
		   	minLength: 2,
		   	source: "<?php echo BASE_URL . 'piscina/BusquedaDePiscinasAdminUbigeo';?>",
			focus: function( event, ui ) {
        		$("#buscarPiscinas").val( ui.item.Nombre );
        		return false;
      		},
      		select: function( event, ui ) {
      			$("input[name='idPiscinaGrabar']").val(ui.item.idpiscina);
      			$("input[name='NombrePiscinaGrabar']").val(ui.item.Nombre);
      			$("#nombreRP").text(ui.item.Nombre);//css('background-color', '#00FFFF');
				$("#direccionRP").text(ui.item.Direccion);
				$("#DistritoRP").text(ui.item.Distrito);
				return false;
      		}

	    })
	    .autocomplete( "instance" )._renderItem = function( ul, item ) {
   			return $( "<li>" )
       		.append( "<div>" + item.Nombre + "</div>" )
       		.appendTo( ul );
   		};

   		$("input[type='radio']").change(function(event) {
   			var r = 0;
   			var x = 0;
   			$("input[type='radio']").each(function(index) {
   				//alert($(this).is(':checked') + " - " + $(this).attr('id'));

   				

   				if ($(this).is(':checked') == true) {
   					if ($(this).attr('id') == 1) {
   						r = r + 1;
   					}
   					if ($(this).attr('id') == 0) {
   						x = x + 1;
   					}
   				}


   			});

   			$("#buenasEval").text(r);
			$("#malasEval").text(x);
   			return false;
   		});

   		$(window).scroll(function()
            {
                if ($(this).scrollTop() > 200){
					 $('#ContadorItems').addClass("fijo").fadeIn();
					 
				}
                else {
					$('#ContadorItems').removeClass("fijo");
					
				}
            });
	});
</script>