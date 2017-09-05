<?php

	class DigesaConexion extends PDO
	{
		#conexion sqlserver con PDO
		public function __construct()
		{
			#accediendo al archivo donde se encuentran los parametros de configuracion
			$archivo = ROOT . 'nucleo' . DS . 'parametrosDB' . DS . 'configuracionDigesa.ini';
			if (!$ajustes = parse_ini_file($archivo, true)) throw new exception ('No se puede abrir el archivo de configuracion' . $archivo . '.');
		        #$controlador = $ajustes["basedatos"]["adaptador"];
		        $servidor    = $ajustes["basedatos"]["host"];
		        $puerto      = $ajustes["basedatos"]["puerto"];
		        $basedatos   = $ajustes["basedatos"]["bd"];

	        #conectandose a la base de datos
	        try {
	            parent::__construct(
	            	"sqlsrv:Server=$servidor,1433;Database=$basedatos",
	                $ajustes['basedatos']['usuario'],
	                $ajustes['basedatos']['contrasenia']

	            );
	        }
	        catch(PDOException $e) {
	            echo "Error en la conexión: ".$e->getMessage();
	        }
		}
	}

 ?>