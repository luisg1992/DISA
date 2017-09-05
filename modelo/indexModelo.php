<?php
	class indexModelo extends Modelo
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function obtenerCodigosModulosAccesos($nivel)
		{
			$consultaSql = "SELECT Accesos.Modulos FROM Accesos WHERE Accesos.Acceso = :nivel";
			$parametros  = array(':nivel' => $nivel);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}

		public function obtenerModulo($codigo)
		{
			$consultaSql = "SELECT Modulos.idModulos, Modulos.Modulo, Modulos.url
							FROM Modulos
							WHERE Modulos.idModulos = :codigo";
			$parametros  = array(':codigo' => $codigo);
			$respuesta   = $this->_consultas->ConsultaGeneral($consultaSql,$parametros);
			return $respuesta;
		}



		#fin de la clase
	}

 ?>