<?php
	class reportesModelo extends Modelo
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function ReportesBsChecklistMesxAnio($hemoterapia,$sector,$anio)
		{
			$consultaSql = "exec ReportesBsChecklistMesxAnio  :hemoterapia, :sector, :anio";
			$parametros  = array(':hemoterapia' => $hemoterapia,
								 ':sector'	    => $sector,
								 ':anio'		=> $anio);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}
			
		public function ReporteBSxMesAnio($hemoterapia,$sector,$anio)
		{
			$consultaSql = "exec ReportesBSxMesAnio :hemoterapia, :sector, :anio";
			$parametros  = array(':hemoterapia' => $hemoterapia,
								 ':sector'	    => $sector,
								 ':anio'		=> $anio);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ReporteBSxMesAnioId($anio,$rena)
		{
			$consultaSql = "exec ReportesBSxMesAnioId :anio, :rena";
			$parametros  = array(':anio' =>        $anio,
								 ':rena'	    => $rena);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ReportesBSChecklistPorcentaje($anio)
		{
			$consultaSql = "exec ReportesBSChecklistPorcentaje :anio";
			$parametros  = array(':anio'		=> $anio);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ReportesBSChecklistTotales($anio)
		{
			$consultaSql = "exec ReportesBSChecklistTotales :anio";
			$parametros  = array(':anio'		=> $anio);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ReportesBSSumatoriaMensual($anio,$mes,$renaes,$hemo)
		{
			$consultaSql = "exec ReportesBSMensual :anio, :mes, :renaes, :hemo";
			$parametros  = array(':anio'		=> $anio,
								 ':mes'			=> $mes,
								 ':renaes'		=> $renaes,
								 ':hemo' 		=> $hemo);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ReportesBSSumatoriaBimestral($anio,$bimestre,$renaes,$hemo)
		{
			$consultaSql = "exec ReportesBSBimestral :anio, :bimestre, :renaes, :hemo";
			$parametros  = array(':anio'		=> $anio,
								 ':bimestre'	=> $bimestre,
								 ':renaes'		=> $renaes,
								 ':hemo' 		=> $hemo);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ReportesBSSumatoriaTrimestral($anio,$trimestre,$renaes,$hemo)
		{
			$consultaSql = "exec ReportesBSTrimestral :anio, :trimestre, :renaes, :hemo";
			$parametros  = array(':anio'		=> $anio,
								 ':trimestre'	=> $trimestre,
								 ':renaes'		=> $renaes,
								 ':hemo' 		=> $hemo);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ReportesBSSumatoriaSemestral($anio,$semestre,$renaes,$hemo)
		{
			$consultaSql = "exec ReportesBSSemestral :anio, :semestre, :renaes, :hemo";
			$parametros  = array(':anio'		=> $anio,
								 ':semestre'	=> $semestre,
								 ':renaes'		=> $renaes,
								 ':hemo' 		=> $hemo);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ReportesBSSumatoriaAnual($anio,$renaes,$hemo)
		{
			$consultaSql = "exec ReportesBSAnual :anio, :renaes, :hemo";
			$parametros  = array(':anio'		=> $anio,
								 ':renaes'		=> $renaes,
								 ':hemo' 		=> $hemo);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ReportesAnemiaListarInformes($dni)
		{
			$consultaSql = "exec ReportesAnemiaListarInformes :dni";
			$parametros  = array(':dni' 	=> $dni);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function listarAnemia()
		{
			$consultaSql = "exec ReportesAnemiaListarAnemia";
			$parametros  = null;
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

	}

 ?>