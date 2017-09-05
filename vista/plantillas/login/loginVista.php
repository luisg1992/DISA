<?php if ($this->fondo): ?>
	<style type="text/css">
		body{
			background-image: url("<?php echo BASE_URL . 'publico/img/background/doc.jpg';?>");
			background-position: center center;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
	</style>
<?php endif ?>
<script  type="text/javascript">
	$(document).ready(function() {
		$("nav").hide();
		return false;
	});
</script>
<?php if($this->mensajeAlerta): ?>
	<script type="text/javascript">
		$(document).ready(function() {
			mostrarAlertaDeInformacion('<?php echo $this->mensajeAlerta;?>');
			return false;
		});
	</script>
<?php endif; ?>
<div class="row">
	<div class="col-xs-11 col-sm-8 col-md-3 col-centered" style="text-align: center;margin-top: 7%;">
		<h2><?php echo INSTITUCION;?></h2>
		<div class="panel panel-default"  style="padding: 5%;margin-top: 8%;margin-bottom: 12%;">
			<br>
			<small style="color: #999;">Ingrese sus datos</small><br><br>
		  	<div class="panel-body" style="text-align: right;">
				<form action="<?php echo BASE_URL . 'inicio/login'?>" method="post">
		    	<div class="input-group">
		    		<input type="text" class="form-control input-lg" placeholder="Usuario" aria-describedby="sizing-addon2" style="border-right: none;width: 100%;background:none" name="usuarioLogin" value="<?php echo $this->usuarioTemporar;?>" autofocus>
				  		<span class="input-group-addon" id="sizing-addon2">				  	
				  			<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				  		</span>				  
				</div>
		    	<br>
				<div class="input-group">
		    		<input type="password" class="form-control input-lg" placeholder="Contraseña" aria-describedby="sizing-addon2" style="border-right: none;width: 100%;background:none" name="passwordLogin">
				  		<span class="input-group-addon" id="sizing-addon2">				  	
				  			<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
				  		</span>				  
				</div>
				<br>
		    	<button type="submit" class="btn btn-primary">Ingresar</button>
		    	</form>
		  	</div>
		  	<br>
		  	<?php if ($this->mensaje):?>
		  		<span style="color:red;">
		  			<?php echo $this->mensaje; ?>
		  		</span>
		  	<?php endif; ?>
		</div>

		<small style="color:#333;">Oficina de Estad&iacute;stica e Inform&aacute;tica - OITE <br> Copyright <i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date('Y'); ?></small>
	</div>
</div>
<script>
	$(document).ready(function() {
		
	});
</script>