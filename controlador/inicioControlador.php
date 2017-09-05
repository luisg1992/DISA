	<?php
	class inicioControlador extends Controlador
	{
		private $_modeloUsuarios;

		public function __construct()
		{
			parent::__construct();
			$this->_modeloUsuarios = $this->obtenerModelo('usuarios');
		}

		public function index()
		{
			Sesion::accesos('logueado');
			$this->_vista->construirVista('inicio','inicio');
		}

		public function cerrar()
		{
			Sesion::destruirSesion();
			$this->redireccionar();
		}

		public function login()
		{
			
			if ($this->obtenerDatosCadena('usuarioLogin') == null || empty($this->obtenerDatosCadena('usuarioLogin'))) {
				$this->_vista->mensaje = "* Debe ingresar un usuario";
				$this->_vista->fondo = true;
				$this->_vista->construirVista('login','login');
				exit();
			}

			if ($this->obtenerDatosCadena('passwordLogin') == null || empty($this->obtenerDatosCadena('passwordLogin'))) {
				$this->_vista->usuarioTemporar = $this->obtenerDatosCadena('usuarioLogin');
				$this->_vista->mensaje = "* Debe ingresar una contraseña";
				$this->_vista->fondo = true;
				$this->_vista->construirVista('login','login');
				exit();
			}

			$usuarioLogin 	= $this->obtenerDatosCadena('usuarioLogin');
			$passwordLogin	= $this->obtenerDatosCadena('passwordLogin');



			$valida1 = $this->_modeloUsuarios->validarExitensiaUsuario($usuarioLogin);
			

			if (count($valida1) > 0) {
				#si existe el nombre de usuario registrado

				#encriptar clave
				$passwordLogin = md5($passwordLogin);

				

				$valida2 = $this->_modeloUsuarios->validarDatosUsuario($usuarioLogin,$passwordLogin);

				if (count($valida2) > 0) {
					# si los datos son correctos, iniciar sesion
					
					#iniciando variables de sesion
					Sesion::set('logueado', true);
					Sesion::set('idusuario', $valida2[0]['idEmpleado']);
					Sesion::set('tiempo', time());

					#definiendo menu 
					$idEmpleado =  $valida2[0]['idEmpleado'];
					$menu = $this->ConstruirMenu($idEmpleado);
					Sesion::set('menu', $menu);

					#definiendo datos de usuario
					$nombre = $valida2[0]['NOMBRES'] . " " .$valida2[0]['PATERNO'] . " " . $valida2[0]['MATERNO']; 
					$perfil = $valida2[0]['PERFIL'];
					$imagen = $valida2[0]['IMAGENP'];
					$datos_usuario = array(
							'nombre'	=> $nombre,
							'perfil'	=> $perfil,
							'imagen'	=> $imagen
						);
					Sesion::set('datosUsuario',$datos_usuario);
					$this->redireccionar('inicio');
					exit();
				}
				else{
					#si la contrseña ha fallado
					$this->_vista->usuarioTemporar = $this->obtenerDatosCadena('usuarioLogin');
					$this->_vista->mensajeAlerta = "Contraseña Incorrecta, Intentenlo nuevamente";
					$this->_vista->fondo = true;
					$this->_vista->construirVista('login','login');
				}
			}

			else{
				$this->_vista->mensajeAlerta = "Usuario no registrado en el sistema.";
				$this->_vista->fondo = true;
				$this->_vista->construirVista('login','login');
			}
		}

		private function ConstruirMenu($idEmpleado)
		{
			$html = null;

			$menu_temporal = $this->_modeloUsuarios->ListarPermisosxId($idEmpleado);
			for ($i=0; $i < count($menu_temporal); $i++) { 
				$grupo[$i] = array(
								'id'	 => $menu_temporal[$i]['IDGRUPO'],
								'nombre' => $menu_temporal[$i]['GRUPO'],
								'clave'	 => $menu_temporal[$i]['CLAVE GRUPO'],
								'icono'  => $menu_temporal[$i]['ICONO GRUPO']
								);

				$item[$i] = array(
								'idg'	 => $menu_temporal[$i]['IDGRUPO'],
								'item'	 => $menu_temporal[$i]['ITEM'],
								'clave'	 => $menu_temporal[$i]['CLAVE ITEM']
								);
			}
			$grupo = $this->array_unique2($grupo);
			
			for ($i=0; $i < count($grupo); $i++) { 
				$html .= "<li class='dropdown'>";
					$html .= "<a href='' class='dropdown-toggle' data-toggle='dropdown'>".$grupo[$i]['nombre']."<span class='caret'></span><i style='font-size:16px;' class='fa fa-".$grupo[$i]['icono']." fa-pull-right' aria-hidden='true'></i></a>";
					$html .= "<ul class='dropdown-menu forAnimate' role='menu'>";
				
				for ($j=0; $j < count($item); $j++) { 
					
					$href = BASE_URL . $grupo[$i]['clave'] . DS . $item[$j]['clave'];

					if ($grupo[$i]['id'] == $item[$j]['idg']) {
						$html .= "<li><a href='" . $href . "'>" . $item[$j]['item'] . "</a></li>";
					}
				}

					$html .= "</ul></li>";
			}

			return $html;
		}

		
	

	}
 ?>