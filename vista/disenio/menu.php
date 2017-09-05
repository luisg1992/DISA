
	<nav class="navbar navbar-default sidebar" role="navigation">
	    	<div class="container-fluid">
		    	<div class="navbar-header">
		      		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
		      		</button>      
		   	 	</div>
	    		<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
	      			<ul class="nav navbar-nav">
	        			<li style="padding: 15% 10%;" id="datosusuarioVista">
	        				
	        				
	        				<?php 
	        					$datos = Sesion::get('datosUsuario');
	        					if ($datos['imagen'] == "") {
	        						$imagen = 'default_user.png';
	        					}
	        					else{
	        						$imagen = $datos['imagen'];
	        					}
	        					echo "<img src='" . BASE_USU_IMG . DS . $imagen . "' width='60'  style='float:left;margin-right:10%;' >";
	        					echo "<div style='text-align:right;'><small>Bienvenido: </small><br>";
	        					echo "<small style='font-size:11px;'><mark>" . $datos['nombre'] . "</mark><br>";
	        					echo "<strong>" . $datos['perfil']. "</strong></small></div>";
	        				?>
	        			</li>
	        			<!-- menu segun el rol del usuario -->
						<?php if(Sesion::get('menu')): ?>
							<?php echo Sesion::get('menu'); ?>
						<?php endif; ?>
	        			         
						<li><a href="<?php echo BASE_URL . 'inicio/cerrar';?>">Cerrar Sesi&oacute;n<i style="font-size:16px;" class="fa fa-sign-out fa-pull-right" aria-hidden="true"></i></a></li>
	      			</ul>
	    		</div>
	  		</div>
	</nav>		