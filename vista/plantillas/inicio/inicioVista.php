<!-- estructura basica para la creacion de vista -->

<div style="float: left; max-width: 85%; min-width: 80%; margin-left: 1%;padding: 1%;text-align: center;">
	<div class="row">
		<div class="col-xs-12">
		
			<div class="row" style="text-align: left;">
				<div class="col-md-4">
					<div class="panel panel-default">
  						<div class="panel-body">
    						<h3>Conectado desde:</h3>
    						<hr style="margin: 10px 0px !important;">
    						<i class="fa fa-desktop fa-3x pull-left"></i>
    						<?php 
    							echo "Máquina: " . gethostname() . "<br>";
    							echo "Fecha de hoy: " . date('d/m/y') . "<br>";
								echo $_SERVER['REMOTE_ADDR'];
    						 ?>
 	 					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

