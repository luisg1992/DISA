<script  type="text/javascript">
	$(document).ready(function() {
		$("nav").hide();
	});
</script>
<div class="row">
	<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12" style="text-align: center;margin-top: 10%;">
		<img src="<?php if($this->imagen) echo $this->imagen; ?>" alt="" style="width: 70%;"><hr>
		
		<?php if (!Sesion::get('logueado')):?>

			<?php if ($this->code == null): ?>
				<i class="fa fa-arrow-left" aria-hidden="true"></i> <a href="javascript:window.history.back();">Volver atrás</a>&nbsp;&nbsp; | &nbsp;&nbsp;
			<?php endif ?>
			
			<i class="fa fa-sign-in" aria-hidden="true"></i> <a href="<?php echo BASE_URL;?>"> Iniciar Sesi&oacute;n</a>
		<?php endif; ?>	
		
		
	</div>
</div>
