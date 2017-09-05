<?php 
	class ubigeoModelo extends Modelo
	{
		public function __construct()
		{
			parent::__construct();
		}

		/*validar usuarios*/
		public function ListarDepartamentos()
		{
			$consultaSql = "EXEC LISTARDEPARTAMENTOS";
			$parametros  = NULL;
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function BuscarDepartamentoxCodigo($idDepartamento)
		{
			$consultaSql = "EXEC BuscarDepartamentoxCodigo :idDepartamento";
			$parametros  = array(':idDepartamento' => $idDepartamento);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ListarProvinciasxDepartamento($idDepartamento)
		{
			$consultaSql = "EXEC LISTARPROVINCIAXIDDEPARTAMENTO :idDepartamento";
			$parametros  = array(':idDepartamento' => $idDepartamento);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function ListarDistritosxProvinciaxDepartamento($idDepartamento,$idProvincia)
		{
			$consultaSql = "EXEC LISTARPROVINCIAXIDDEPARTAMENTOXIDPROVINCIA :idDepartamento, :idProvincia";
			$parametros  = array(
								':idDepartamento' => $idDepartamento,
								':idProvincia' 	  => $idProvincia);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}
	}
 ?>