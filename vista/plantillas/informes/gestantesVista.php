<link
	href="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.min.css';?>"
	rel="stylesheet">
<link
	href="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.theme.min.css';?>"
	rel="stylesheet">
<link href="<?php echo BASE_URL . 'libreria' . DS . 'datapicker' . DS . 'datepicker.css';?>" 	rel="stylesheet">
<script src="<?php echo BASE_URL . 'libreria' . DS . 'datapicker' . DS . 'bootstrap-datepicker.js'?>"></script>
<style>

	#tabla input[type='text'], select
	{		
		text-align: center;
		-webkit-appearance: none;
		border: 1px solid #d9d9d9;
    	border-top: 1px solid #c0c0c0;
   		border-radius: 1px;
	}

	td{
		text-align : left;
	}	

</style>
<div style="float: left; max-width: 85%; min-width: 80%; margin-left: 1%;padding: 1%;text-align: center;">
	<div class="row">
		<div class="col-xs-12">
			<?php echo $this->breadcrumb; ?>			
			<h3>
			<?php echo $this->tituloGeneral;?>
			</h3>				
		</div>
	</div>
	<hr>
	<form action="post" id="formularioRegistroAnemiaGestantesPuerperas">
	<div id="primera">
				<div class="row">
		<div class="col-md-1"></div>	
		<div class="col-md-10">
			<div class="table-responsive">          
  				<table class="table table-bordered" id="tabla">
  					<thead>
				      	<tr>
				        	<th colspan="2" class="active" style="text-align: center !important;">DATOS GENERALES</th>
				     	</tr>
				    </thead>
  					<tbody>  						
  						<tr>
							<td style="width: 40%;">DNI</td>
							<td>
								<input class="form-control input-sm" name="dniPaciente" id="dniPacienteBuscar" type="text">
							</td>
						</tr>
						<tr>
							<td>N° Historia Clinica</td>
							<td><input class="form-control input-sm" name="nhistoriaclinica" id="nhc" type="text"></td>
						</tr>
						<tr>
							<td>Apellido Paterno</td>	
							<td><input class="form-control input-sm" name="apellidopaternoM" type="text" disabled>
							<input name="apellidopaterno" type="hidden"></td>
						</tr>
						<tr>
							<td>Apellido Materno</td>	
							<td><input class="form-control input-sm" name="apellidomaternoM" type="text" disabled>
							<input name="apellidomaterno" type="hidden"></td>				
						</tr>
						<tr>
							<td>Nombres</td>
							<td colspan=""><input class="form-control input-sm" name="nombresM" type="text" disabled>
							<input name="nombres" type="hidden"></td>		
						</tr>
						<tr>
							<td>Edad</td>	
							<td><input class="form-control input-sm" name="edadM" id="ed" type="text" disabled>
							<input name="edad" id="ed" type="hidden"></td>
						</tr>
						<tr>
							<td>Teléfono Fijo</td>	
							<td><input class="form-control input-sm" name="telefono" id="telf" type="text"></td>	
						</tr>
						<tr>
							<td>Celular</td>	
							<td><input class="form-control input-sm" name="celular" id="cel" type="text"></td>	
						</tr>
						<tr>
							<td>Dirección</td>	
							<td colspan="3"><input class="form-control input-sm" name="direccionM" type="text" disabled>
							<input name="direccion" type="hidden"></td>								
						</tr>
						<tr>
							<td>Dirección Actual</td>	
							<td colspan="3"><input class="form-control input-sm" name="direccionactual" type="text"></td>								
						</tr>
						</tbody>
  				</table>
  			</div>
		</div>
		<div class="col-md-1"></div>
		</div>
		<div class="row">
  		<div class="col-md-1"></div>
  		<div class="col-md-10">
  			<div class="table-responsive">  
	  			<table class="table table-bordered" id="tabla">
	  				<thead>
				      	<tr>
				        	<th colspan="2" class="active" style="text-align: center !important;">DATOS MÉDICOS</th>
				     	</tr>
				    </thead>
	  				<tbody>	  						
						<tr>
							<td style="width: 40%;">Tipo</td>
							<!--<td > 
								<select class="form-control" name="tipogop" id="tipopaciente">
									<option value="G">Gestante</option>
									<option value="P">Puérpera</option>
								</select>-->
							</td>
							<td style="text-align: center !important;">
								<input name="tipogop" value="G" placeholder="" id="tipog" type="radio"><label for="tipogopgestante">&nbsp;Gestante</label>&nbsp;&nbsp;&nbsp;&nbsp;
								<input name="tipogop" value="P" placeholder="" id="tipop" type="radio"><label for="tipogoppuerpera">&nbsp;Puerpera</label>
							</td>
						</tr>
						<tr>
							<td>Semana Gestacional</td>
							<td><input class="form-control input-sm" name="semanagestacional" id="semanag" type="text"></td>	
						</tr>							
						<tr>
							<td>Anemia</td>
							<td style="text-align: center !important;">
								<input name="anemiaCa" value="1" placeholder="" id="anemiaSi" type="radio"><label for="anemiaSi">&nbsp;Si</label>&nbsp;&nbsp;&nbsp;&nbsp;
								<input name="anemiaCa" value="0" placeholder="" id="anemiaNo" type="radio"><label for="anemiaNo">&nbsp;No</label>
							</td>
						</tr>
						<tr>
							<td>Resultado de Hemoglobina</td>
							<td><input class="form-control input-sm" name="diagHemo" id="diah" type="text"></td>								
						</tr>
						<tr>
							<td>Fecha ultimo resultado hemoglobina</td>
							<td ><input class="form-control input-sm" name="fechadosajehemoglobina" id="fecha1" type="text"></td>
						</tr>
						<tr>
							<td>Fecha inic. toma de suplementos</td>
							<td><input class="form-control input-sm" name="fechaIniciSuplMicro" id="fecha2" type="text"></td>	
						</tr>
						<tr>
							<td>Fecha Visita</td>
							<td><input class="form-control input-sm" value="<?php echo date('d-m-Y');?>" disabled="" name="fechaRegistro" type="text"></td>
						</tr>
						<tr>
							<td>N° Visita</td>
							<td>
								<input class="form-control input-sm" disabled="" id="nv" name="numVisitas" type="text">
								<input name="numVisitash" type="hidden">
								<input name="01080102" type="hidden">
							</td>
							</tr>
						</tbody>
	  			</table>
			</div>
		</div>
		<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<button type="button" class="btn btn-primary btn-lg" id="comenzar_prueba">Comenzar Evaluación <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
	<div id="segunda">
		<?php 
			echo $this->fichagestantespuerperas;
		?>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<button class="btn btn-warning" type="button" style="margin-top: 1%;" id="btnRegresar"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>&nbsp;Regresar</button>&nbsp;
				<button class="btn btn-primary" type="submit" style="margin-top: 1%;"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Guardar</button>
			</div>
		</div>
	</div>
	</form>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="mensajeAlerta">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-bell-o" aria-hidden="true"></i>&nbsp;DISA Lima Metropolitana
			</div>
			<div class="modal-body">
				<div id="mensajeAlertaModalResultado"></div>
			</div>
			<div class="modal-footer">
				<button type="button" id="AceptarMensajeAlerta" class="btn btn-primary" onclick="$('#mensajeAlerta').modal('hide');">Aceptar</button>
				<button type="button" id="ImprimirMensajeAlerta" class="btn btn-danger" onclick="$('#mensajeAlerta').modal('hide');">Imprimir</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.min.js';?>"></script>
<script>
	$(document).ready(function() {
		$("#fecha1").datepicker();
		$("#fecha2").datepicker();
		$("#segunda").hide();

		$("#dniPacienteBuscar").attr('maxlength','8');
		$("#nhc").attr('maxlength','10');
		$("#ed").attr('maxlength','3');
		$("#telf, #cel").attr('maxlength','15');
		$("#semanag, #01080001 , #01080101").attr('maxlength','2');
		$("#diah").attr('maxlength','5');

		$('#dniPacienteBuscar, #nhc, #semanag, #01080001, #01080101, #ed').keypress(function (e) {    		
     		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
              	return false;
    		}
   		});

    	$('#diah').bind('keypress', function (e) {
        	return (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46) ? false : true;
    	});

		$("#comenzar_prueba").click(function(event) {
			$("#primera").hide();
			window.scrollTo(0,0)
			$("#segunda").fadeIn(500);
		});

		$("#btnRegresar").click(function(event) {
			$("#segunda").hide();
			window.scrollTo(0,0)
			$("#primera").fadeIn(500);
		});			

		$("#ImprimirMensajeAlerta").click(function(event) {
			var dni = $("#dniPacienteBuscar").val();
			var nvisita = $("input[name='numVisitas']").val();

			window.open('<?php echo BASE_URL . "informes/ReporteGestantes"?>' + '/' + dni + '/' + nvisita, '_blank');
		});

		$("#dniPacienteBuscar").change(function(event) {
			$.ajax({
				url: '<?php echo BASE_URL . 'fichadomiciliaria/buscarNumeroVisitasGestantesPuerperas'?>',
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
					$("input[name='numVisitash']").val(data);
					$("input[name='numVisitas']").val(parseInt(data) + parseInt(1));
				}
			});

			$.ajax({
				url: '<?php echo BASE_URL . "webServicesReniecDisa/validarDNI/"; ?>' + $("#dniPacienteBuscar").val() +'/2022SAREAL1011',
				type: 'POST',
				dataType: 'json',
				data: {	},
				beforeSend: function(data) {
					$("input[name='apellidopaternoM']").val('Cargando...');
					$("input[name='apellidomaternoM']").val('Cargando...');
					$("input[name='nombresM']").val('Cargando...');
					$("input[name='direccionM']").val('Cargando...');
                    $("input[name='edadM']").val('Cargando...');
                },
                
				success: function(data)
				{
					if (data != null) {
						$("input[name='apellidopaterno']").val(data.paterno);
						$("input[name='apellidomaterno']").val(data.materno);
						$("input[name='nombres']").val(data.nombres);
						$("input[name='direccion']").val(data.direccion + " - " + data.distrito);
						$("input[name='apellidopaternoM']").val(data.paterno).attr('disabled',true);
						$("input[name='apellidomaternoM']").val(data.materno).attr('disabled',true);
						$("input[name='nombresM']").val(data.nombres).attr('disabled',true);
						$("input[name='direccionM']").val(data.direccion + " - " + data.distrito).attr('disabled',true);

						/*calculo edad*/
						
			    		var anio = parseInt(data.anio);
			    		var mess = parseInt(data.mes);
			    		var dia = parseInt(data.dia);

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
						$("input[name='edad']").val(edad);
						$("input[name='edadM']").val(edad).attr('disabled',true);
					}
					else
					{
						mostrarAlertaDeInformacion('DNI Invalido');
					}
				}
			});
			return false;
		});

		/*$("#anemiaSi").click(function(event) {
    		$("#diah").prop('disabled', false).val('');
    	});

    	$("#anemiaNo").click(function(event) {
    		$("#diah").prop('disabled', true).val('');	
    	});*/
		

		$("#tipop").click(function(event) {
			
			$("#semanag").prop('disabled', true).val('');
			
		});

		$("#tipog").click(function(event) {
			
			$("#semanag").prop('disabled', false).val('');
			$("#semanag").focus();
			
		});

		$("input[type='radio']").change(function(event) {
			$("input[type='radio']").each(function(index) {
   				if ($(this).is(':checked') == true) {
   					if($(this).attr('id').substr(8,1) == 'a')
   					{
   						$("#"+$(this).attr('id').substr(0,8)).attr('disabled', false);
   						$("#"+$(this).attr('id').substr(0,8)+'b').attr('name', $(this).attr('name')).val($(this).attr('id').substr(0,8));
   						
   					}
   					else
   					{
   						$("input[type='text'][name='" + $(this).attr('name') + "a']").attr('disabled', true).val('');
   						$("input[type='hidden'][name='" + $(this).attr('name') + "']").removeAttr('name');   						
   					}
   				}
   			});

		});	

		$("input:radio[name='010200']").click(function(){
    		if(this.value=='01020002'){
    			$('input[name="010201[]"]').prop('disabled', true).removeAttr('checked')

				$("#01020201").prop('disabled', true).val('');    			

    			$('input[name="010300"]').attr('disabled', 'disabled').prop('checked', false); 

    			$('input[name="010400"][value="01040001"]').focus();
    			    			 			
    		}
    		if(this.value=='01020001'){
    			$('input[name="010201[]"]').prop('disabled', false);

    			$("#01020201").prop('disabled', false);

    			$('input[name="010300"]').removeAttr("disabled");

    		}
		});		

		$("#01070501").prop('disabled', true).val('');	

		$("input:radio[name='010700']").click(function(){
    		if(this.value=='01070002'){

    			$('input[name="010701"]').attr('disabled', 'disabled').prop('checked', false);

    			$("#01070104").prop('disabled', true).val('');

    			$("#01070201").prop('disabled', true).val('');    			 

    			$('input[name="010703"]').attr('disabled', 'disabled').prop('checked', false);    			 

    			$('input[name="010704"]').attr('disabled', 'disabled').prop('checked', false);

    			$("#01070401").prop('disabled', true).val('');

    			$("#01070402a").prop('disabled', true).prop('checked', true);

    			$("#01070501").prop('disabled', false).focus();

    			$("#01070401a").prop('disabled', true);
    			
    		}

    		if(this.value=='01070001'){

    			$('#01070401a').prop('disabled', false);

    			$('input[name="010701"]').removeAttr("disabled");

    			$("#01070201").prop('disabled', false);

    			$('input[name="010703"]').removeAttr("disabled");

    			$('input[name="010704"]').removeAttr("disabled");    		

    			$("#01070401").prop('disabled', true).val('');
    			
    			$("#01070501").prop('disabled', true).val('');

    			  				    			
    		}
		});		
		
		$("#01080102").prop('disabled', true);	

		$('#01080101, #01080001').change(function(event) {

        	var ntcm = $('#01080001').val();
			var ndcm = $('#01080101').val();
			var resultado = (ntcm/ndcm)*100;

			if(ntcm!='' && ndcm!=''){
				if(resultado >= 75){
					$("#01080102").val("Resultado: "+resultado.toFixed(2)+"% (Adherencia adecuada)").css({'color':'black','background-color':'#dff0d8'});
					$("input[name='01080102']").val(resultado+'%');
				}
				else{				
				   	$("#01080102").val("Resultado: "+resultado.toFixed(2)+"% (Adherencia inadecuada)").css({'color':'black','background-color':'#f2dede'});
				   	$("input[name='01080102']").val(resultado+'%');			   	
				}  
			}      	
    	});

    	$('#dniPacienteBuscar').change(function(event) {
  			if($('#dniPacienteBuscar').val().length != 8){
   			mostrarAlertaDeInformacion('Ingrese un número de DNI valido.');
				$("#segunda").hide();
				window.scrollTo(0,0)
				$("#primera").fadeIn(500);								
				$('#dniPacienteBuscar').focus();
				return false;
			}
   		});	

    	$('#formularioRegistroAnemiaGestantesPuerperas').keydown(function(event){
    		if(event.keyCode == 13) {
     			event.preventDefault();
      			return false;
    		}
  		});	

		$("#formularioRegistroAnemiaGestantesPuerperas").submit(function(event) {

			if($('#dniPacienteBuscar').val().length != 8){
				mostrarAlertaDeInformacion('Ingrese un número de DNI valido.');
				$("#segunda").hide();
				window.scrollTo(0,0)
				$("#primera").fadeIn(500);
				$('#dniPacienteBuscar').focus();
				return false;	
			}

			if($('#nhc').val().length < 1){
				mostrarAlertaDeInformacion('Ingrese un número de Historia Clinica.');
				$("#segunda").hide();
				window.scrollTo(0,0)
				$("#primera").fadeIn(500);
				$('#nhc').focus();
				return false;	
			}			

			if ($("input[name='010100']:checked").length<1) {
				mostrarAlertaDeInformacion('1.- ¿Qué tipo de preparaciones come?');
				$('input[name="010100"][value="01010001"]').focus();return false;
      		}
      		
      		if($('#01010004').val().length < 1 && $('#01010004').is(':enabled')){
				mostrarAlertaDeInformacion('1.1.- ¿Qué tipo de preparaciones come? Otros.(Especificar)');
				$('#01010004').focus();
				return false;	
			}			

      		if ($("input[name='010200']:checked").length<1) {
				mostrarAlertaDeInformacion('2.- ¿En los últimos tres días comió alimentos como: hígado, bazo, sangrecita, huevo, pescado c/día?');
				$('input[name="010200"][value="01020001"]').focus();return false;
      		} 

			var validarcb = $('input:checkbox').is(':checked');

			if(validarcb==false && $("input[name='010201[]']").is(':enabled')){
				mostrarAlertaDeInformacion('2.1.- Seleccione al menos una opción');
				$('input[name="010201[]"][value="01020101"]').focus();
				return false;	
			}						

			if($('#01020201').val().length < 1 && $('#01020201').is(':enabled')){
				mostrarAlertaDeInformacion('2.2.- ¿Cuánto comió? (Utilizar cucharadas como referencia)');
				$('#01020201').focus();
				return false;	
			}

			if ($("input[name='010300']:checked").length<1 && $("input[name='010300']").is(':enabled')) {
				mostrarAlertaDeInformacion('3.- Usted come:');
				$('input[name="010300"][value="01030001"]').focus();return false;
      		}

      		if ($("input[name='010400']:checked").length<1) {
				mostrarAlertaDeInformacion('4.- ¿Que cantidad come?');
				$('input[name="010400"][value="01040001"]').focus();return false;
      		}  

      		if($('#01040004').val().length < 1 && $('#01040004').is(':enabled')){
				mostrarAlertaDeInformacion('4.- ¿Que cantidad come? Otros.(Especificar)');
				$('#01040004').focus();
				return false;	
			}   			

      		if ($("input[name='010500']:checked").length<1) {
				mostrarAlertaDeInformacion('5.- ¿En los últimos 3 días comió verduras?');
				$('input[name="010500"][value="01050001"]').focus();return false;
      		}

      		if ($("input[name='010501']:checked").length<1) {
				mostrarAlertaDeInformacion('5.1.- ¿En los últimos 3 días comió frutas?');
				$('input[name="010501"][value="01050101"]').focus();return false;
      		}

      		if ($("input[name='010600']:checked").length<1) {
				mostrarAlertaDeInformacion('6.- ¿Esta última semana comió alguna menestra?');
				$('input[name="010600"][value="01060001"]').focus();return false;
      		}

      		if ($("input[name='010700']:checked").length<1) {
				mostrarAlertaDeInformacion('7.- ¿Toma suplementos (vitaminas)?');
				$('input[name="010700"][value="01070001"]').focus();return false;
      		}      		

      		if ($("input[name='010701']:checked").length<1 && $("input[name='010701']").is(':enabled')) {
				mostrarAlertaDeInformacion('7.1.- ¿Toma suplementos (vitaminas)? Que toma?');
				$('input[name="010701"][value="01070101"]').focus();return false;
      		}

      		if($('#01070104').val().length < 1 && $('#01070104').is(':enabled')){
				mostrarAlertaDeInformacion('7.1.- Que toma? Otros.(Especificar)');
				$('#01070104').focus();
				return false;	
			}

      		if($('#01070201').val().length < 1 && $('#01070201').is(':enabled')){
				mostrarAlertaDeInformacion('7.2.- ¿Toma suplementos (vitaminas)? ¿Cuanto toma y cada cuanto toma?');
				$('#01070201').focus();
				return false;	
			}
			if ($("input[name='010703']:checked").length<1 && $("input[name='010703']").is(':enabled')) {
				mostrarAlertaDeInformacion('7.3.- ¿Toma suplementos (vitaminas)? ¿En qué momento del día toma el suplemento?');
				$('input[name="010703"][value="01070301"]').focus();return false;
      		}

      		if ($("input[name='010704']:checked").length<1 && $("input[name='010704']").is(':enabled')) {
				mostrarAlertaDeInformacion('7.4.- ¿Toma suplementos (vitaminas)? ¿Ha tenido algún malestar luego de tomar el suplemento?');
				$('input[name="010704"][value="01070401"]').focus();return false;
      		}
      		 
      		if ($("#01070401").val().length<1 && $("#01070401").is(':enabled')) {
				mostrarAlertaDeInformacion('7.4.- ¿Toma suplementos (vitaminas)? ¿Ha tenido algún malestar luego de tomar el suplemento? Si ¿Cuales?');
				$('#01070401').focus();return false;
      		}

      		if ($("#01070501").val().length<1 && $("#01070501").is(':enabled')) {
				mostrarAlertaDeInformacion('7.5.- ¿Porque no toma?');
				$('#01070501').focus();return false;
      		}

			if($('#01080001').val().length < 1){
				mostrarAlertaDeInformacion('8.- ¿Numero de tabletas consumidas al mes?');
				$('#01080001').focus();
				return false;	
			}
			if($('#01080101').val().length < 1){
				mostrarAlertaDeInformacion('8.1.- ¿Numero de tabletas que debió consumir?');
				$('#01080101').focus();
				return false;	
			}
			if ($("input[name='010900']:checked").length<1) {
				mostrarAlertaDeInformacion('9.- Asistió a sesión demostrativa de preparación de alimentos?');
				$('input[name="010900"][value="01090001"]').focus();return false;
      		}
						    
			$.ajax({
				url: '<?php echo BASE_URL . 'fichadomiciliaria/registrarAnemiaGestantesPuerperas'?>',
				type: 'POST',
				dataType: 'json',
				data: $(this).serialize(),
				success: function(data)
				{		
					$("#mensajeAlertaModalResultado").html(data.Mensaje);	
					$("#mensajeAlerta").modal('show');
				}
			});
			return false;						
		});

		$("#AceptarMensajeAlerta").click(function(event) {
   			window.location.href = "<?php echo BASE_URL . 'fichadomiciliaria/InformeGestantes'; ?>"
   		});
	});
</script>
