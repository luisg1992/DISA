	<?php
	class ubigeoControlador extends Controlador
	{
		private $_modeloUbigeo;

		public function __construct()
		{
			$this->_modeloUbigeo = $this->obtenerModelo('ubigeo');
			parent::__construct();
			
		}

		public function index()
		{
			
		}

		public function crearOpcionesDistritos($dpto,$prov)		
		{
			$distritos_tmp = $this->_modeloUbigeo->ListarDistritosxProvinciaxDepartamento($dpto,$prov);

			$html = "<option>--Distrito--</option>";
			
			for ($i=0; $i < count($distritos_tmp); $i++) { 
				$html .= "<option value='" . $distritos_tmp[$i]['IDDISTRITO'] . "'>" . $distritos_tmp[$i]['DISTRITO'] . "</option>";
			}

			echo json_encode($html);
		}

		public function crearOpcionesDepartamentos()		
		{
			$departamento_tmp = $this->_modeloUbigeo->ListarDepartamentos();

			$html = "<option>--Departamento--</option>";
			
			for ($i=0; $i < count($departamento_tmp); $i++) { 
				$html .= "<option value='" . $departamento_tmp[$i]['IDDEPARTAMENTO'] . "'>" . $departamento_tmp[$i]['DEPARTAMENTO'] . "</option>";
			}

			echo json_encode($html);
		}

		public function crearOpcionesProvincia($dpto)		
		{
			$departamento_tmp = $this->_modeloUbigeo->ListarProvinciasxDepartamento($dpto);

			$html = "<option>--Provincia--</option>";
			
			for ($i=0; $i < count($departamento_tmp); $i++) { 
				$html .= "<option value='" . $departamento_tmp[$i]['IDPROVINCIA'] . "'>" . $departamento_tmp[$i]['PROVINCIA'] . "</option>";
			}

			echo json_encode($html);
		}
		

	}
 ?>