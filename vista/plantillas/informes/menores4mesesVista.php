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
		-webkit-appearance: none;
		border: 1px solid #d9d9d9;
    	border-top: 1px solid #c0c0c0;
   		border-radius: 1px;
		text-align: center;			
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
	<form action="post" id="formularioRegistroAnemiaMenores4Meses">
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
							<td>Seguro Integral de Salud</td>
							<td><input class="form-control input-sm" name="sis" id="sisJQ" type="text" disabled="" placeholder="No tiene SIS"></td>
						</tr>
						<tr>
							<td>N° Historia Clinica</td>
							<td><input class="form-control input-sm" name="nhistoriaclinica" id="nhc" type="text"></td>
						</tr>
						<tr>
							<td>Apellido Paterno</td>	
							<td><input class="form-control input-sm" name="apellidopaternopaciente" type="text"></td>
						</tr>
						<tr>
							<td>Apellido Materno</td>	
							<td><input class="form-control input-sm" name="apellidomaternopaciente" type="text"></td>				
						</tr>
						<tr>
							<td>Nombres</td>
							<td colspan=""><input class="form-control input-sm" name="nombrespaciente" type="text"></td>		
						</tr>
						<tr>
							<td>Fecha Nacimiento</td>	
							<td><input class="form-control input-sm" name="fechanacimiento" id="fecha1" type="text"></td>	
						</tr>
						<tr>
							<td>Sexo</td>
							 
							<td style="text-align: center !important;">
								<input name="sexo" value="M"  id="generom" type="radio"><label for="generom">&nbsp;Masculino</label>&nbsp;&nbsp;&nbsp;&nbsp;
								<input name="sexo" value="F"id="generof" type="radio"><label for="generof">&nbsp;Femenino</label>
							</td>
							<!---<select class="form-control" name="sexo" id="genero">
								<option value="M">Masculino</option>
								<option value="F">Femenino</option>
							</select>-->
						</tr>
						<tr>
							<td>Peso al Nacer (kg.)</td>
							<td><input class="form-control input-sm" name="peso" type="text" id="peson"></td>	
						</tr>
						<tr>
							<td>Edad gest. al nacer (semanas)</td>
							<td><input class="form-control input-sm" name="edag" id="edadgJQ" type="text"></td>	
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
				        	<th colspan="2" class="active" style="text-align: center !important;">DATOS DE LA MADRE</th>
				     	</tr>
				    </thead>
  					<tbody>
  						<tr>
  							<td style="width: 40%;">DNI</td>				
							<td>								
								<input class="form-control input-sm" name="dniMadre" id="dniMadreBuscar" type="text">
							</td>
						</tr>								
						<tr>
							<td>Apellido Paterno</td>	
							<td><input class="form-control input-sm" name="apellidopaternomadre" type="text"></td>
						</tr>
						<tr>
							<td>Apellido Materno</td>	
							<td><input class="form-control input-sm" name="apellidomaternomadre" type="text"></td>				
						</tr>
						<tr>
							<td>Nombres</td>
							<td colspan="3"><input class="form-control input-sm" name="nombresmadre" type="text"></td>		
						</tr>
						<tr>
							<td>Dirección</td>	
							<td colspan="3"><input class="form-control input-sm" name="direccion" type="text"></td>								
						</tr>
						<tr>
							<td>Telefono Fijo</td>
							<td><input class="form-control input-sm" name="telefono" id="telf" type="text"></td>
						</tr>
						<tr>
							<td>Celular</td>
							<td><input class="form-control input-sm" name="celular" id="telfc" type="text"></td>
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
							<td style="width: 40%;">Tiene Control CRED</td>
							<td style="text-align: center !important;">
								<input name="controlcred" value="1" placeholder="" id="controlcredsi" type="radio"><label for="controlcredsi">&nbsp;Si</label>&nbsp;&nbsp;&nbsp;&nbsp;
								<input name="controlcred" value="0" placeholder="" id="controlcredno" type="radio"><label for="controlcredno">&nbsp;No</label>
							</td>
						</tr>
						<tr>
							<td>Peso Control CRED</td>
							<td><input class="form-control input-sm" name="pesocred" id="pesoc" type="text"></td>								
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
							<td>Fecha último resultado hemoglobina</td>
							<td ><input class="form-control input-sm" name="fechadosajehemoglobina" id="fecha2" type="text"></td>
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
			echo $this->fichamenores4meses;
		?>
		<div class="row" style="margin-bottom: 1%;">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<textarea class="form-control" rows="5" name="compromiso" style="resize:none" placeholder="Compromiso de la Madre"></textarea>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<textarea class="form-control" rows="5" name="observaciones" style="resize:none" placeholder="Observaciones"></textarea>	
			</div>
		</div>
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
		$("#dniMadreBuscar").attr('maxlength','8');
		$("#nhc").attr('maxlength','10');
		$("#peson").attr('maxlength','5');
		$("#pesoc").attr('maxlength','5');
		$("#diagHemo").attr('maxlength','4');
		$("#telf").attr('maxlength','12');
		$("#telfc").attr('maxlength','15');
		$("#edadgJQ").attr('maxlength','2');

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

		$('#dniPacienteBuscar, #nhc, #edadgJQ').keypress(function (e) {    		
     		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
              	return false;
    		}
   		});

    	$('#peson, #pesoc').bind('keypress', function (e) {
        	return (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46) ? false : true;
    	});    	

		$("#peson").change(function(event) {
			var pesonacer = parseFloat($('#peson').val());
			if(pesonacer > 2.5 ){
				$('input[name="030100"]').attr('disabled', 'disabled').prop('checked', false);	
				$('input[name="030101"]').attr('disabled', 'disabled').prop('checked', false);	
				$('#03010201').prop('disabled', true);
			}
			else{
				$('input[name="030100"]').removeAttr('disabled');
				$('input[name="030101"]').removeAttr('disabled');
				$('#03010201').removeAttr('disabled');
			}
			if(pesonacer > 5){
				mostrarAlertaDeInformacion('Ingrese un número valido. (Máximo 5kg.)');
				$('#peson').val('').focus();
				return false;
			}
		});

		

		$("#dniPacienteBuscar").change(function(event) {				

			$.ajax({
				url: '<?php echo BASE_URL . 'fichadomiciliaria/anemiaMenores4MesesbuscarNumeroVisitas'?>',
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

					if(data == 0){
						compl = ' (48 horas)';
					}
					if(data == 1){
						compl = ' (1ra semana)';						
					}
					if(data == 2){
						compl = ' (2 semana)';
					}
					if(data == 3){
						compl = ' (3 meses)';
					}					
					
					$("input[name='numVisitash']").val(data);
					$("input[name='numVisitas']").val(parseInt(data) + parseInt(1) + " Visita" + compl);
				}
			});
			return false;
		});	

		$("#pesoc").prop('disabled', true);

		$("input:radio[name='controlcred']").click(function(){
			if(this.value=='0'){	
				$("#pesoc").prop('disabled', true).val('');
			}
			if(this.value=='1'){	
				$("#pesoc").prop('disabled', false);
				$('#pesoc').focus();
			}
		});	

		$("#02020101").prop('disabled', true);		

		$("input:radio[name='020200']").click(function(){
			if(this.value=='02020001'){	
				$("#02020101").prop('disabled', false).val('').focus();
			}
			if(this.value=='02020002'){	
				$("#02020101").prop('disabled', true).val('');
			}
		});

		$("#02030101").prop('disabled', true);

		$("input:radio[name='020300']").click(function(){
			if(this.value=='02030001'){	
				$("#02030101").prop('disabled', false).val('').focus();
			}
			if(this.value=='02030002'){	
				$("#02030101").prop('disabled', true).val('');
			}
		});	

		$("#02070101").prop('disabled', true);

		$("input:radio[name='020700']").click(function(){
			if(this.value=='02070002'){	
				$("#02070101").prop('disabled', true).val('');
			}
			if(this.value=='02070001'){	
				$("#02070101").prop('disabled', false);
				$('#02070101').focus();
			}
		});

		$("#02080001").prop('disabled', true);
    	$("#02080101").prop('disabled', true);

		$("input:radio[name='020100']").click(function(){
    		if(this.value=='02010002'){
    			$('input[name="020200"]').attr('disabled', 'disabled').prop('checked', false);
    			$('input[name="020300"]').attr('disabled', 'disabled').prop('checked', false);
    			$('input[name="020400"]').attr('disabled', 'disabled').prop('checked', false);
    			$('input[name="020500"]').attr('disabled', 'disabled').prop('checked', false);
    			$('input[name="020601"]').attr('disabled', 'disabled').prop('checked', false);
    			$('input[name="020700"]').attr('disabled', 'disabled').prop('checked', false);
    			$("#02020101").prop('disabled', true).val('');
    			$("#02030101").prop('disabled', true).val('');
    			$("#02070101").prop('disabled', true).val('');
    			$("#02080001").prop('disabled', false);
    			$("#02080101").prop('disabled', false);
    			$('#02080001').focus();  			
    		}
    		if(this.value=='02010001'){
    			$('input[name="020200"]').removeAttr("disabled");
    			$('input[name="020300"]').removeAttr("disabled");
    			$('input[name="020400"]').removeAttr("disabled");
    			$('input[name="020500"]').removeAttr("disabled");
    			$('input[name="020601"]').removeAttr("disabled");
    			$('input[name="020700"]').removeAttr("disabled");
    			//$("#02020101").prop('disabled', false);
    			//$("#02030101").prop('disabled', false);
    			//$("#02070101").prop('disabled', false);  
    			$("#02080001").prop('disabled', true).val('');
    			$("#02080101").prop('disabled', true).val('');
    		}
    	});	

    	$("#03010201").prop('disabled', true);
    	$("#03010301").prop('disabled', true);

    	$("input:radio[name='030100']").click(function(){	
    		if(this.value=='03010002'){
				$('input[name="030101"]').attr('disabled', 'disabled').prop('checked', false);
				$("#03010301").prop('disabled', false);
				$("#03010201").prop('disabled', true).val('');
				$("#03010301").focus();
    		}
    		if(this.value=='03010001'){
    			$('input[name="030101"]').removeAttr("disabled");
    			$("#03010301").prop('disabled', true).val('');
    			$("#03010201").prop('disabled', false);
    		}
    	});

    	$("input:radio[name='030101']").click(function(){
    		if(this.value=='03010103'){
    			$("#03010201").prop('disabled', true);
    		}
    		if(this.value!='03010103'){
    			$("#03010201").prop('disabled', false);
    		}

    	});

    	$('#formularioRegistroAnemiaMenores4Meses').keydown(function(event){
    		if(event.keyCode == 13) {
     			event.preventDefault();
      			return false;
    		}
  		});

  		$('#dniPacienteBuscar').change(function(event) {
  			if($('#dniPacienteBuscar').val().length != 8){
   			mostrarAlertaDeInformacion('Ingrese un número de DNI del niño(a) valido.');
				$("#segunda").hide();
				window.scrollTo(0,0)
				$("#primera").fadeIn(500);								
				$('#dniPacienteBuscar').focus();
				return false;
			}
   		});

   		$('#dniMadreBuscar').change(function(event) {

   			if($('#dniMadreBuscar').val().length != 8){
				mostrarAlertaDeInformacion('Ingrese un número de DNI de la Madre valido.');
				$("#segunda").hide();
				window.scrollTo(0,0)
				$("#primera").fadeIn(500);
				$('#dniMadreBuscar').focus();
				return false;	
			}
		});


		$("#formularioRegistroAnemiaMenores4Meses").submit(function(event) {			

			if($('#dniPacienteBuscar').val().length < 1){
				mostrarAlertaDeInformacion('Ingrese el número de DNI del niño(a).');
				$("#segunda").hide();
				window.scrollTo(0,0)
				$("#primera").fadeIn(500);
				$('#dniPacienteBuscar').focus();
				return false;	
			}

			if($('#dniMadreBuscar').val().length < 1){
				mostrarAlertaDeInformacion('Ingrese el número de DNI de la madre.');
				$("#segunda").hide();
				window.scrollTo(0,0)
				$("#primera").fadeIn(500);
				$('#dniMadreBuscar').focus();
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

			if($('#peson').val().length < 1){
				mostrarAlertaDeInformacion('Ingrese peso al nacer del niño(a).');
				$("#segunda").hide();
				window.scrollTo(0,0)
				$("#primera").fadeIn(500);
				$('#peson').focus();
				return false;	
			}						

			if ($("input[name='010100']:checked").length < 1) {				
      			mostrarAlertaDeInformacion('1.- BCG?');
      			$('input[name="010100"][value="01010001"]').focus();
      			return false;
      		}

      		if ($("input[name='010200']:checked").length < 1) {
      			mostrarAlertaDeInformacion('2.- HVB?');
      			$('input[name="010200"][value="01020001"]').focus();
      			return false;
      		}

      		if ($("input[name='020100']:checked").length < 1) {
      			mostrarAlertaDeInformacion('1.- ¿Está dando de lactar a su niño(a)?');
      			$('input[name="020100"][value="02010001"]').focus();
      			return false;
      		}    		
      		
      		if ($("input[name='020200']:checked").length<1 && $('input[name="020200"]').is(':enabled')) {
      			mostrarAlertaDeInformacion('2.- ¿Da de lactar de día?');
      			$('input[name="020200"][value="02020001"]').focus();
      			return false;
      		}

      		if($('#02020101').val().length < 1 && $("#02020101").is(':enabled')){
				mostrarAlertaDeInformacion('2.1.- ¿Da de lactar de día? ¿Cuantas veces?');
				$('#02020101').focus();
				return false;	
			}

			if ($("input[name='020300']:checked").length<1 && $('input[name="020300"]').is(':enabled')) {
      			mostrarAlertaDeInformacion('3.- ¿Da de lactar de noche? (Incluye madrugada)');
      			$('input[name="020300"][value="02030001"]').focus();
      			return false;
      		}

      		if($('#02030101').val().length < 1 && $("#02030101").is(':enabled')){
				mostrarAlertaDeInformacion('3.1.- ¿Da de lactar de noche? ¿Cuantas veces?');
				$('#02030101').focus();
				return false;	
			}

			if ($("input[name='020400']:checked").length < 1 && $('input[name="020400"]').is(':enabled')) {
      			mostrarAlertaDeInformacion('4.- ¿Además de su leche le da otra leche?');
      			$('input[name="020400"][value="02040001"]').focus();
      			return false;
      		}

      		if ($("input[name='020500']:checked").length < 1 && $('input[name="020500"]').is(':enabled')) {
      			mostrarAlertaDeInformacion('5.- ¿Le ha dado aguita, mate, hierbas, te o caldo?');
      			$('input[name="020500"][value="02050001"]').focus();
      			return false;
      		}

      		if ($("input[name='020601']:checked").length < 1 && $('input[name="020601"]').is(':enabled')) {
      			mostrarAlertaDeInformacion('6.1.- ¿El niño coge correctamente el pezón?');
      			$('input[name="020601"][value="02060101"]').focus();
      			return false;
      		}

      		if ($("input[name='020700']:checked").length < 1 && $('input[name="020700"]').is(':enabled')) {
      			mostrarAlertaDeInformacion('7.- ¿Tiene alguna dificultad para dar solo pecho a su niño(a)?');
      			$('input[name="020700"][value="02070001"]').focus();
      			return false;
      		}

      		if($('#02070101').val().length < 1 && $("#02070101").is(':enabled')){
				mostrarAlertaDeInformacion('7.1.- ¿Tiene alguna dificultad para dar solo pecho a su niño(a)? ¿Como cual(es)?');	
				$('#02070101').focus();
				return false;	
			}

			if($('#02080001').val().length < 1 && $('#02080001').is(':enabled')){
				mostrarAlertaDeInformacion('8.- ¿Por qué no le da lactancia materna?');
				$('#02080001').focus();
				return false;	
			}

			if($('#02080101').val().length < 1 && $('#02080101').is(':enabled')){
				mostrarAlertaDeInformacion('8.1.- ¿Qué le da en lugar de lactancia materna?');
				$('#02080101').focus();
				return false;	
			}

			if ($("input[name='030100']:checked").length < 1 && $('input[name="030100"]').is(':enabled')) {
      			mostrarAlertaDeInformacion('1.- ¿Le da suplemento de hierro?');
      			$('input[name="030100"][value="03010001"]').focus();
      			return false;
      		}
			
			if ($("input[name='030101']:checked").length < 1 && $('input[name="030101"]').is(':enabled')) {
      			mostrarAlertaDeInformacion('1.1.- ¿Le da suplemento de hierro? Muestreme lo que le da');
      			$('input[name="030101"][value="03010101"]').focus();
      			return false;
      		}

      		if($('#03010201').val().length < 1 && $("#03010201").is(':enabled')){
				mostrarAlertaDeInformacion('1.2.- ¿Tiene alguna dificultad para dar solo pecho a su niño(a)? ¿Cuánto le da y cada cuanto le da?');	
				$('#03010201').focus();
				return false;	
			} 		

			if($('#03010301').val().length < 1 && $("#03010301").is(':enabled')){
				mostrarAlertaDeInformacion('1.3.- Muestreme lo que le da: ¿Por qué no le da?')
				$('#03010301').focus();
				;return false;	
			}
						    
			$.ajax({
				url: '<?php echo BASE_URL . 'fichadomiciliaria/registraranemiaMenores4Meses'?>',
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
   			window.location.href = "<?php echo BASE_URL . 'fichadomiciliaria/informeMenores4Meses'; ?>"
   		});
	});
</script>