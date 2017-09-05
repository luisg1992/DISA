<?php
	class digesaConsultasLibreria extends DigesaConexion
	{
		public function __construct()
		{
			parent::__construct();
		}


		#ingresar registros a la base de datos
		public function InsertarRegistro($consultaSql,$parametros = array())
		{
			$resultados = $this->prepare($consultaSql);
			$rows = $resultados->execute($parametros);

			if ($rows == 1) {
				return "M_1";
			}
			$resultados = null;
			$rows = null;
		}

		#eliminar registros de la base de datos
		public function EliminarRegistro($consultaSql,$parametros = array())
		{
			$resultados = $this->prepare($consultaSql);
			$rows = $resultados->execute($parametros);

			if ($rows > 0) {
				return "M_1";
			}
			$resultados = null;
			$rows = null;
		}

		#actualizar registros de la base de datos
		public function ActualizarRegistro($consultaSql,$parametros = array())
		{
			$resultados = $this->prepare($consultaSql);
			$rows = $resultados->execute($parametros);

			if ($rows > 0) {
				return "M_1";
			}
			$resultados = null;
			$rows = null;
		}

		#consulta general con retorno de data
		public function ConsultaGeneral($consultaSql,$parametros)
		{
			
			$resultados = $this->prepare($consultaSql);
			$rows = $resultados->execute($parametros);
			while ($rows = $resultados->fetch(PDO::FETCH_UNIQUE))
			{
				$respuesta[] = $rows;
			}
			$resultados = null;
			$rows = null;
			return $respuesta;
		}

	}


 ?>