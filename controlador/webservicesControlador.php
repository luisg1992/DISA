<?php 
	/**
	* Autor: Crisanto Rosas Rodolfo
	* Institucion: DISA
	* Fecha de Creacion: 27/01/2016
	*/
	class webservicesControlador extends Controlador
	{
		private $_modeloUbigeo;
		private $_modeloPiscina;

		public function __construct()
		{
			parent::__construct();
			$this->_modeloUbigeo 	= $this->obtenerModelo('ubigeo');
			$this->_modeloPiscina 	= $this->obtenerModelo('piscina');
		}

		public function UbigeoDepartamentos()
		{
			$departamentos_temporal = $this->_modeloUbigeo->ListarDepartamentos();
			for ($i=0; $i < count($departamentos_temporal); $i++) { 
				$departamento[] = array(
					'id' 			=> $departamentos_temporal[$i]['IDDEPARTAMENTO'],
					'Departamento' 	=> $departamentos_temporal[$i]['DEPARTAMENTO']
					);

			}

			echo json_encode($departamento, JSON_UNESCAPED_UNICODE);
			exit();
		}

		public function UbigeoProvincias($idDepartamento)
		{
			

			$provincias_temporal = $this->_modeloUbigeo->ListarProvinciasxDepartamento($idDepartamento);
			for ($i=0; $i < count($provincias_temporal); $i++) { 
				if ($provincias_temporal[$i]['IDPROVINCIA'] != " ") {
					$provincia[] = array(
						'id' 			=> $provincias_temporal[$i]['IDPROVINCIA'],
						'Provincia' 	=> $provincias_temporal[$i]['PROVINCIA']
					);
				}
			}

			echo json_encode($provincia, JSON_UNESCAPED_UNICODE);
			exit();
		}

		public function UbigeoDistritos($idDepartamento,$idProvincia)
		{
			

			$distritos_temporal = $this->_modeloUbigeo->ListarDistritosxProvinciaxDepartamento($idDepartamento,$idProvincia);
			for ($i=0; $i < count($distritos_temporal); $i++) { 
				if ($distritos_temporal[$i]['IDDISTRITO'] != " ") {
					$distrito[] = array(
						'id' 			=> $distritos_temporal[$i]['IDDISTRITO'],
						'Distrito' 		=> $distritos_temporal[$i]['DISTRITO']
					);
				}
			}

			echo json_encode($distrito, JSON_UNESCAPED_UNICODE);
			exit();
		}

		public function PiscinasxDepartamento($idDepartamento,$calificacion)
		{
			$piscinas_temporal = $this->_modeloPiscina->MobilListarPiscinasDepartamento($idDepartamento,$calificacion);
			for ($i=0; $i < count($piscinas_temporal); $i++) { 
				$piscina[] = array(
					'codigo' 		=> $piscinas_temporal[$i]['CODIGO'],
					'nombre' 		=> $piscinas_temporal[$i]['NOMBRE'],
					'direccion' 	=> $piscinas_temporal[$i]['DIRECCION'],
					'uDepartamento' => $piscinas_temporal[$i]['CODDEPARTAMENTO'],
					'Departamento' 	=> $piscinas_temporal[$i]['DEPARTAMENTO'],
					'uProvincia' 	=> $piscinas_temporal[$i]['CODPROVINCIA'],
					'Provincia' 	=> $piscinas_temporal[$i]['PROVINCIA'],
					'uDistrito' 	=> $piscinas_temporal[$i]['CODIDSTRITO'],
					'Distrito' 		=> $piscinas_temporal[$i]['DISTRITO'],
					'calificacion' 	=> $piscinas_temporal[$i]['CALIFICACION'],
					'fecha' 		=> $piscinas_temporal[$i]['FECHA'],
					'latitud' 		=> $piscinas_temporal[$i]['LATITUD'],
					'longitud' 		=> $piscinas_temporal[$i]['LONGITUD']
					);
			}
			echo json_encode($piscina, JSON_UNESCAPED_UNICODE);
			exit();
		}

		public function PiscinasxProvincia($idDepartamento,$idProvincia,$calificacion)
		{
			$piscinas_temporal = $this->_modeloPiscina->MobilListarPiscinasProvincia($idDepartamento,$idProvincia,$calificacion);
			for ($i=0; $i < count($piscinas_temporal); $i++) { 
				$piscina[] = array(
					'codigo' 		=> $piscinas_temporal[$i]['CODIGO'],
					'nombre' 		=> $piscinas_temporal[$i]['NOMBRE'],
					'direccion' 	=> $piscinas_temporal[$i]['DIRECCION'],
					'uDepartamento' => $piscinas_temporal[$i]['CODDEPARTAMENTO'],
					'Departamento' 	=> $piscinas_temporal[$i]['DEPARTAMENTO'],
					'uProvincia' 	=> $piscinas_temporal[$i]['CODPROVINCIA'],
					'Provincia' 	=> $piscinas_temporal[$i]['PROVINCIA'],
					'uDistrito' 	=> $piscinas_temporal[$i]['CODIDSTRITO'],
					'Distrito' 		=> $piscinas_temporal[$i]['DISTRITO'],
					'calificacion' 	=> $piscinas_temporal[$i]['CALIFICACION'],
					'fecha' 		=> $piscinas_temporal[$i]['FECHA'],
					'latitud' 		=> $piscinas_temporal[$i]['LATITUD'],
					'longitud' 		=> $piscinas_temporal[$i]['LONGITUD']
					);
			}
			echo json_encode($piscina, JSON_UNESCAPED_UNICODE);
			exit();
		}

		public function PiscinasxDistrito($ubige,$calificacion)
		{
			$piscinas_temporal = $this->_modeloPiscina->MobilListarPiscinasDistrito($ubige,$calificacion);
			for ($i=0; $i < count($piscinas_temporal); $i++) { 
				$piscina[] = array(
					'codigo' 		=> $piscinas_temporal[$i]['CODIGO'],
					'nombre' 		=> $piscinas_temporal[$i]['NOMBRE'],
					'direccion' 	=> $piscinas_temporal[$i]['DIRECCION'],
					'uDepartamento' => $piscinas_temporal[$i]['CODDEPARTAMENTO'],
					'Departamento' 	=> $piscinas_temporal[$i]['DEPARTAMENTO'],
					'uProvincia' 	=> $piscinas_temporal[$i]['CODPROVINCIA'],
					'Provincia' 	=> $piscinas_temporal[$i]['PROVINCIA'],
					'uDistrito' 	=> $piscinas_temporal[$i]['CODIDSTRITO'],
					'Distrito' 		=> $piscinas_temporal[$i]['DISTRITO'],
					'calificacion' 	=> $piscinas_temporal[$i]['CALIFICACION'],
					'fecha' 		=> $piscinas_temporal[$i]['FECHA'],
					'latitud' 		=> $piscinas_temporal[$i]['LATITUD'],
					'longitud' 		=> $piscinas_temporal[$i]['LONGITUD']
					);
			}
			echo json_encode($piscina, JSON_UNESCAPED_UNICODE);
			exit();
		}
	}
 ?>