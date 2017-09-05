<link href="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.min.css';?>" rel="stylesheet">
<link href="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.theme.min.css';?>" rel="stylesheet">
    <script type="text/javascript">
    	

    </script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUhytGn6hio0_x8Zj_7Bnz7VMcLRWLn00"></script> 

	
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
					<div class="col-md-3" id="filtroBusquedaReportesPiscinas">
						<label for=""> Filtrar</label>
						<br>
						<select name="" id="tipoFlitro" class="form-control">
							<option value="">Seleccione</option>
							<option value="1">Departamentos</option>
							<option value="2">Calificacion</option>
						</select>
						<select name="" id="derivadoFiltro1" class="form-control" style="margin-top: 1%;">
							<option value="">--Seleccione--</option>
						</select>
						<select name="" id="derivadoFiltro2" class="form-control" style="margin-top: 1%;">
							<option value="">Seleccione</option>
						</select>
						<select name="" id="derivadoFiltro3" class="form-control" style="margin-top: 1%;">
							<option value="">Seleccione</option>
						</select>
						<hr>
						<label for="">Buscar</label>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Piscinas" id="buscarPiscinas" aria-describedby="sizing-addon2" style="border-right: none;">
							<span class="input-group-addon" id="sizing-addon2">				  	
						  		<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						  	</span>
						</div>
						<hr>
						<a class="btn btn-primary" href="<?php echo BASE_URL . 'piscina' . DS .  'reportesPiscinas';?>">Limpiar <i class="fa fa-refresh" aria-hidden="true"></i></a>
						
						<div style="text-align: center;margin-top: 5%;">
							<img src="<?php echo $rutasDisenio['img'] . 'piscinas' . DS ;?>veranoSaludable.png"  style="width: 50%;">
						</div>
					</div>

					<?php if($this->listaPiscina): ?>
						<?php echo $this->listaPiscina; ?>
					<?php else: ?>
						<?php echo "No existen Piscinas Registradas" ?>
					<?php endif; ?>
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
<script type="text/javascript" src="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.min.js';?>"></script> 
<script type="text/javascript">
	$(document).ready(function() {
		$("#derivadoFiltro1").hide();
		$("#derivadoFiltro2").hide();
		$("#derivadoFiltro3").hide();

		//primer filtro

		$("#tipoFlitro").change(function(event) {
			$("#derivadoFiltro1").fadeIn(400);

			if ($("#tipoFlitro").val() == 2) {
				$("#derivadoFiltro2").hide( "slow" );
				$("#derivadoFiltro3").hide( "slow" );
				$("#derivadoFiltro1").html(null);
				$("#derivadoFiltro1").append('<option value="sc">Seleccion</option>');
				$("#derivadoFiltro1").append('<option value="s">Saludable</option>');
				$("#derivadoFiltro1").append('<option value="ns">No saludable</option>');
				return false;
			}

			if ($("#tipoFlitro").val() == 1) {
				$("#derivadoFiltro1").html(null);
				$("#derivadoFiltro1").append('<option>Seleccion</option>');
				$.ajax({
					url: '<?php echo BASE_URL . 'ubigeo/crearOpcionesDepartamentos'; ?>',
					type: 'POST',
					dataType: 'json',
					data: {},
					success: function(data)
					{
						$("#derivadoFiltro1").html(data);
					}
				});
				
				return false;
			}
		});

		//segundo filtro
		$("#derivadoFiltro1").change(function(event) {
			var dpto = $("#derivadoFiltro1").val();	

			if (dpto == 's' || dpto == 'ns' || dpto == 'sc') {
				window.location.href = '<?php echo BASE_URL . 'piscina/reportesPiscinasxCalificacion/'?>' + dpto;
			}			
			else{
				
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
				$("#derivadoFiltro2").fadeIn(400);
			}
			
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

		$("#derivadoFiltro3").change(function(event) {
			var dpto = $("#derivadoFiltro1").val();	
			var prov = $("#derivadoFiltro2").val();
			var dist = $("#derivadoFiltro3").val();

			var ubigeo = dpto + prov + dist;

			window.location.href = '<?php echo BASE_URL . 'piscina/reportesPiscinasxUbigeo/'?>' + ubigeo;
		});

		$("#buscarPiscinas").autocomplete({
		   	minLength: 2,
		   	source: "<?php echo BASE_URL . 'piscina/BusquedaDePiscinas';?>",
			focus: function( event, ui ) {
        		$("#buscarPiscinas").val( ui.item.Nombre );
        		return false;
      		},
      		select: function( event, ui ) {
      			window.location.href = "<?php echo BASE_URL . 'piscina/reportesPiscinasxIdPiscina/';?>" + ui.item.idpiscina;
				return false;
      		}

	    })
	    .autocomplete( "instance" )._renderItem = function( ul, item ) {
   			return $( "<li>" )
       		.append( "<div>" + item.Nombre + "</div>" )
       		.appendTo( ul );
   		};

   		$("#piscinasListaGeneralReportes").on('click', '#mapsG', function(event) {
   			
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