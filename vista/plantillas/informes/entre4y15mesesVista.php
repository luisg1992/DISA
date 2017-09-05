<link
	href="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.min.css';?>"
	rel="stylesheet">
<link
	href="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.theme.min.css';?>"
	rel="stylesheet">
<link href="<?php echo BASE_URL . 'libreria' . DS . 'datapicker' . DS . 'datepicker.css';?>" rel="stylesheet">
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
	<form action="post" id="formularioRegistroFVDEntre4y15Meses">
	<div id="cabeceraevaluacion">	
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
							<td><input class="form-control input-sm" name="dnininio" id="dnininioJQ" type="text"></td>
						</tr>
						<tr>
							<td>Seguro Integral de Salud</td>
							<td><input class="form-control input-sm" name="sis" id="sisJQ" type="text" disabled="" placeholder="No tiene SIS"></td>
						</tr>
						<tr>
							<td>N° Historia Clínica</td>
							<td><input class="form-control input-sm" name="numerohistoriaclinica" id="numerohistoriaclinicaJQ" type="text"></td>
						</tr>
						<tr>
							<td>Apellido Paterno</td>	
							<td><input class="form-control input-sm" name="apellidopaternoninio" type="text"></td>
						</tr>
						<tr>
							<td>Apellido Materno</td>	
							<td><input class="form-control input-sm" name="apellidomaternoninio" type="text"></td>				
						</tr>
						<tr>
							<td>Nombres</td>
							<td colspan=""><input class="form-control input-sm" name="nombresninio" type="text"></td>		
						</tr>
						<tr>
							<td>Fecha Nacimiento</td>	
							<td><input class="form-control input-sm" name="fechanacimiento" id="fechanacimientoJQ" type="text"></td>	
						</tr>
						<tr>
						<td>Sexo</td>
						<td style="text-align: center !important;">
								<input name="sexo" value="M"  id="generom" type="radio"><label for="generom">&nbsp;Masculino</label>&nbsp;&nbsp;&nbsp;&nbsp;
								<input name="sexo" value="F"id="generof" type="radio"><label for="generof">&nbsp;Femenino</label>
							</td>
						<tr>
							<td>Peso al Nacer (kg.)</td>
							<td><input class="form-control input-sm" name="peso" id="pesoJQ" type="text"></td>	
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
							<input class="form-control input-sm" name="dniMadre" id="dniMadreJQ" type="text">
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
							<td>Telefono</td>
							<td><input class="form-control input-sm" name="telefono" id="telefonoJQ" type="text"></td>
						</tr>
						<tr>
							<td>Celular</td>
							<td><input class="form-control input-sm" name="celular" id="celularJQ" type="text"></td>
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
							<td>Peso CRED</td>
							<td><input class="form-control input-sm" name="pesocred" id="pesocredJQ" type="text"></td>
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
							<td ><input class="form-control input-sm" name="fechadosajehemoglobina" id="fechadosaje" type="text"></td>
						</tr>
						<tr>
							<td>Fecha Visita</td>
							<td>
								<input class="form-control input-sm" value="<?php echo date('d-m-Y');?>" disabled="" name="fechaRegistro" type="text">
							</td>
						</tr>
						<tr>
							<td>N° Visita</td>
							<td>
								<input class="form-control input-sm" disabled="" name="numVisitas" type="text">
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
	<div id="evaluacion">
		<?php 
			echo $this->fichaentre4y15meses;
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

		$("#fechanacimientoJQ, #fechadosaje").datepicker();
		$("#evaluacion").hide();

		$("#dnininioJQ, #dniMadreJQ").attr('maxlength','8');
		$("#numerohistoriaclinicaJQ").attr('maxlength','10');
		$("#edadgJQ").attr('maxlength','2');
		$("#telefonoJQ, #celularJQ").attr('maxlength','15');
		$("#pesoJQ, #pesocredJQ").attr('maxlength','5');
		$("#diagHemo").attr('maxlength','4');

		$("#comenzar_prueba").click(function(event) {
			$("#cabeceraevaluacion").hide();
			window.scrollTo(0,0)
			$("#evaluacion").fadeIn(500);
		});

		$("#btnRegresar").click(function(event) {
			$("#evaluacion").hide();
			window.scrollTo(0,0)
			$("#cabeceraevaluacion").fadeIn(500);
		});		

		$("#dnininioJQ").change(function(event) {
			//sisJQ			
			$.ajax({
				url: '<?php echo BASE_URL . 'fichadomiciliaria/anemiaEntre4y15MesesBuscarNumeroVisitas'?>',
				type: 'POST',
				dataType: 'json',
				data: {
					dni: $("#dnininioJQ").val()
				},
				success: function(data)
				{
					if (data == null) {
						data = 0;
					}
					if(data == 0){
						complemento = ' (5 meses)';
					}
					if(data == 1){
						complemento = ' (7 meses)';						
					}
					if(data == 2){
						complemento = ' (9 meses)';
					}
					if(data == 3){
						complemento = ' (12 meses)';
					}
					if(data == 4){
						complemento = ' (15 meses)';
					}
					$("input[name='numVisitas']").val(parseInt(data) + parseInt(1) + " Visita" + complemento);
					$("input[name='numVisitash']").val(data);					
				}
			});
			return false;
		});		

		//integer
		$("#dnininioJQ, #numerohistoriaclinicaJQ, #edadgJQ").keypress(function (e) {    		
     		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
              	return false;
    		}
   		});

		//float
   		$('#pesocredJQ, #pesoJQ').bind('keypress', function (e) {
        	return (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46) ? false : true;
    	});

   		

    	$("#pesoJQ").change(function(event) {

			var pesonacer = parseFloat($('#pesoJQ').val());

			if(pesonacer > 5){
				mostrarAlertaDeInformacion('Ingrese un número valido. (Máximo 5kg.)');
				$('#pesoJQ').val('').focus();
				return false;
			}
		});

		$("#edadgJQ").change(function(event) {			

			if($("#edadgJQ").val() > 40){
				mostrarAlertaDeInformacion('Ingrese un número valido. (Máximo 40 semanas.)');
				$('#edadgJQ').val('').focus();
				return false;
			}
		});

    	$("#pesocredJQ").prop('disabled', true);

		$("input:radio[name='controlcred']").click(function(){
			if(this.value=='0'){	
				$("#pesocredJQ").prop('disabled', true).val('');
			}
			if(this.value=='1'){	
				$("#pesocredJQ").prop('disabled', false);
				$('#pesocredJQ').focus();
			}
		});

		$("input:radio[name='010300']").click(function(){
			if(this.value=='01030001'){
				$("#01030101").prop('disabled', false);
				$("#01030101").focus(); 
			}
			if(this.value=='01030002'){
				$("#01030101").prop('disabled', true).val(''); 
			}
		});

		$("input:radio[name='010800']").click(function(){
			if(this.value=='01080001'){
				$('input[name="010801"]').removeAttr('disabled');
				$("#01080201").prop('disabled', false);
				$('input[name="010803"]').removeAttr('disabled'); 
				$("#01080401").prop('disabled', true).val('');
			}
			if(this.value=='01080002'){
				$('input[name="010801"]').attr('disabled', 'disabled').prop('checked', false);
				$("#01080201").prop('disabled', true).val('');	
				$('input[name="010803"]').attr('disabled', 'disabled').prop('checked', false);  
				$("#01080401").prop('disabled', false).focus(); 
				$("#01080303").prop('disabled', true).val('');	 			
			}
		});

		$("input:radio[name='010801']").click(function(){
			if(this.value=='01080104'){
				$('input[name="010803"]').attr('disabled', 'disabled').prop('checked', false);
				$("#01080201").prop('disabled', true);
				$("#01080303").prop('disabled', true);
				$("#01080401").prop('disabled', true);							
			}
			if(this.value!='01080104'){
				$('input[name="010803"]').removeAttr('disabled');
				$("#01080201").prop('disabled',false);						 			
			}
		});

		$('#formularioRegistroFVDEntre4y15Meses').keydown(function(event){
    		if(event.keyCode == 13) {
     			event.preventDefault();
      			return false;
    		}
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

		$('#dniMadreJQ').change(function(event) {
			if($('#dniMadreJQ').val().length != 8){	
   			mostrarAlertaDeInformacion('Ingrese un número de DNI de la Madre valido.');
				$("#evaluacion").hide();
				window.scrollTo(0,0)
				$("#cabeceraevaluacion").fadeIn(500);								
				$('#dniMadreJQ').focus();
				return false;
			}
   		});

   		$('#dnininioJQ').change(function(event) {
   			if($('#dnininioJQ').val().length != 8){	
   				mostrarAlertaDeInformacion('Ingrese un número de DNI del niño(a) valido.');
				$("#evaluacion").hide();
				window.scrollTo(0,0)
				$("#cabeceraevaluacion").fadeIn(500);								
				$('#dnininioJQ').focus();
				return false;
			}
   		});



		$("#formularioRegistroFVDEntre4y15Meses").submit(function(event) {

			if($('#dnininioJQ').val().length < 1){
				mostrarAlertaDeInformacion('Ingrese el número de DNI del niño(a).');
				$("#evaluacion").hide();
				window.scrollTo(0,0)
				$("#cabeceraevaluacion").fadeIn(500);
				$('#dnininioJQ').focus();
				return false;	
			}

			if($('#dniMadreJQ').val().length < 1){
				mostrarAlertaDeInformacion('Ingrese el número de DNI de la madre.');
				$("#evaluacion").hide();
				window.scrollTo(0,0)
				$("#cabeceraevaluacion").fadeIn(500);
				$('#dniMadreJQ').focus();
				return false;	
			}	


			if($('#numerohistoriaclinicaJQ').val().length < 1){
				mostrarAlertaDeInformacion('Ingrese un número de Historia Clinica.');
				$("#evaluacion").hide();
				window.scrollTo(0,0)
				$("#cabeceraevaluacion").fadeIn(500);
				$('#numerohistoriaclinicaJQ').focus();
				return false;	
			}
		

			if($('#pesoJQ').val().length < 1){
				mostrarAlertaDeInformacion('Ingrese peso al nacer del niño(a).');
				$("#evaluacion").hide();
				window.scrollTo(0,0)
				$("#cabeceraevaluacion").fadeIn(500);
				$('#pesoJQ').focus();
				return false;	
			}

			if ($("input[name='010100']:checked").length<1) {
				mostrarAlertaDeInformacion('1.- ¿Está dando de lactar a su niño(a)?');
				$('input[name="010100"][value="01010001"]').focus();return false;
      		}

      		if ($("input[name='010101']:checked").length<1) {
				mostrarAlertaDeInformacion('1.1 -¿Además de su leche le ha dado otra leche?');
				$('input[name="010101"][value="01010101"]').focus();return false;
      		}

      		if ($("input[name='010102']:checked").length<1) {
				mostrarAlertaDeInformacion('1.2.- ¿Le ha dado aguita, mate, hierbas, te, caldo, otros?');
				$('input[name="010102"][value="01010201"]').focus();return false;
      		}

      		//OTROS
      		if ($("#01010203").val().length<1 && $("#01010203").is(':enabled')){
				mostrarAlertaDeInformacion('1.2.- ¿Le ha dado aguita, mate, hierbas, te, caldo, otros? Otros (Especificar).');
				$("#01010203").focus();return false;
      		}

      		if ($("input[name='010200']:checked").length<1) {
				mostrarAlertaDeInformacion('2.- ¿Qué le esta dando de comer?');
				$('input[name="010200"][value="01020001"]').focus();return false;
      		}

      		if ($("input[name='010201']:checked").length<1) {
				mostrarAlertaDeInformacion('2.1.- ¿Le pone aceite o mantequilla a la comida del niño(a)?');
				$('input[name="010201"][value="01020101"]').focus();return false;
      		}
      		
      		

      		if ($("input[name='010300']:checked").length<1) {
				mostrarAlertaDeInformacion('3.- ¿En los últimos tres días comió alimentos como: hígado, bazo, sangrecita, huevo, pescado c/día? ');
				$('input[name="010300"][value="01030001"]').focus();return false;
      		}

      		if($('#01030101').val().length < 1 && $('#01030101').is(':enabled')){
				mostrarAlertaDeInformacion('3.1.- Ayer que alimento de origen animal le dio, ¿Cuánto le dio? (Utilizar cucharadas como referencia)');
				$('#01030101').focus();
				return false;	
			}

      		if ($("input[name='010400']:checked").length<1) {
				mostrarAlertaDeInformacion('4.- Cuantas veces le da de comer cada día: 2 a 3 v/día (6 a 8m), 3 comidas + 1 refrigerio (9 a 11m), 3 comidas + 2 refrigerios ( > 1 año)');
				$('input[name="010400"][value="01040001"]').focus();return false;
      		}      		

      		if ($("input[name='010600']:checked").length<1) {
				mostrarAlertaDeInformacion('6.- ¿En los últimos tres días le dio verduras?');
				$('input[name="010600"][value="01060001"]').focus();return false;
      		}

      		if ($("input[name='010601']:checked").length<1) {
				mostrarAlertaDeInformacion('6.1.- ¿En los últimos tres días le dio frutas?');
				$('input[name="010601"][value="01060101"]').focus();return false;
      		}

      		if ($("input[name='010700']:checked").length<1) {
				mostrarAlertaDeInformacion('7.- ¿Esta última semana le dió habas, frijoles , lentejas a su niño(a)?');
				$('input[name="010700"][value="01070001"]').focus();return false;
      		}

      		if ($("input[name='010800']:checked").length<1) {
				mostrarAlertaDeInformacion('8.- ¿Le da suplemento de hierro y/o micronutriente MMN?');
				$('input[name="010800"][value="01080001"]').focus();return false;
      		}

      		if ($("input[name='010801']:checked").length<1 && $("input[name='010801']").is(':enabled')) {
				mostrarAlertaDeInformacion('8.1.- Muéstreme lo que le da:');
				$('input[name="010801"][value="01080101"]').focus();return false;
      		}

      		if($('#01080201').val().length < 1 && $('#01080201').is(':enabled')){
				mostrarAlertaDeInformacion('8.2.- ¿Cuánto le da y cada cuanto le da?');
				$('#01080201').focus();
				return false;	
			}

      		if ($("input[name='010803']:checked").length<1 && $("input[name='010803']").is(':enabled')) {
				mostrarAlertaDeInformacion('8.3.- Si respondió las preguntas 8, 8.1 y 8.2, ¿Con qué se lo da?');
				$('input[name="010803"][value="01080301"]').focus();return false;
      		} 
      		 
      		if($('#01080303').val().length < 1 && $('#01080303').is(':enabled')){
				mostrarAlertaDeInformacion('8.3.- Si respondió las preguntas 8, 8.1 y 8.2, ¿Con qué se lo da? Otros (Especificar).');
				$('#01080303').focus();
				return false;	
			}      		

			if($('#01080401').val().length < 1 && $('#01080401').is(':enabled')){
				mostrarAlertaDeInformacion('8.4.- ¿Por qué no le da?');
				$('#01080401').focus();
				return false;	
			}    		
      		
      		if ($("input[name='011100']:checked").length<1) {
				mostrarAlertaDeInformacion('11.- Cuando su niño(a) esta enfermo le da de comer:');
				$('input[name="011100"][value="01110001"]').focus();return false;
      		}

      		if ($("input[name='011200']:checked").length<1) {
				mostrarAlertaDeInformacion('12.- Su familia lo ayuda le apoya con la alimentación de su hijo(a)');
				$('input[name="011200"][value="01120001"]').focus();return false;
      		}

      		if ($("input[name='011300']:checked").length<1) {
				mostrarAlertaDeInformacion('13.- ¿Está creciendo bien?');
				$('input[name="011300"][value="01130001"]').focus();return false;
      		}	

      		if ($("input[name='011400']:checked").length<1) {
				mostrarAlertaDeInformacion('14.- Asistió a sesión demostrativa de preparación de alimentos?');
				$('input[name="011400"][value="01140001"]').focus();return false;
      		}			

			$.ajax({
				url: '<?php echo BASE_URL . 'fichadomiciliaria/anemiaEntre4y15MesesRegistrar'?>',
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
   			window.location.href = "<?php echo BASE_URL . 'fichadomiciliaria/fvdEntre4y15Meses'; ?>"
   		});
	});
</script>