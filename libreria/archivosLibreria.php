<?php 
	class archivosLibreria extends Libreria
	{
		
		private $_extension;
		private $_nombre;
		private $_rutaArchivos;

		public function __construct()
		{
			parent::__construct();
			$this->_rutaArchivos = BASE_ARCHIVOS;
		}

		private function validandoTipoArchivo()
		{
			
			$extensiones = array('pdf','xls','ppt','ppts','docx','doc','xlsx');
			$tmp = explode('.', $this->_nombre);
			$this->_extension = end($tmp);

			$valido = false;
			for ($i=0; $i < count($extensiones); $i++) { 
				if($extensiones[$i] == $this->_extension)
				{
					$valido = true;
				}
				
			}

			return $valido;
		}

		private function validarExistencia($rutaArchivo)
		{
			$existe = false;
			if (file_exists($rutaArchivo)) 
			{
				$existe = true;
			}				
			return $existe;
		}

		private function generarMime($rutaArchivo)
		{
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$mime = finfo_file($finfo, $rutaArchivo);

			return $mime;
		}


		public function descargarFormatos($nombreArchivo)
		{
			$this->_nombre = $nombreArchivo;
			$respuesta = $this->validandoTipoArchivo();
			if ($respuesta) {
				#si la extension es valida para descargar
				#verficar la existencia del archivo
				$rutaFormato = $this->_rutaArchivos . DS . 'formatos' . DS . $this->_nombre;
				if ($this->validarExistencia($rutaFormato)) {
					
					header('Content-Transfer-Encoding: binary');   
					 //enviar headers de nombre de archivo y MIME type.
				    header('Content-Type: ' . mime_content_type($rutaFormato) );
				    header('Content-Disposition: attachment; filename=' . basename($rutaFormato) );
				    //especificar tamaño del archivo
				    header("Content-Length: " . filesize($rutaFormato));
				    header('Pragma: no-cache');
				    //quitar timeout de php
				    set_time_limit(0);
				    //abrir archivo para lectura
				    $archivo = fopen($rutaFormato,"r");
				    while(!feof($archivo)){
				        //si tengo un valor correcto en $KBsec, entonces limito la descarga. 
				        if( $KBsec != -1 && $KBsec > 1 ){
				            //imprimir contenido del archivo cada $KBsec kilobytes
				            print(fread($archivo, 1024 * $KBsec ));
				            //tardar 1 segundo
				            sleep(1);
				        }
				        else{
				            //imprimir contenido del archivo cada 1KB (kilobyte)
				            print(fread($archivo, 1024 ));
				        }
				        //decirle a apache que ya puede enviarlo
				        ob_flush();
				        flush();
				    }
				    //cerrar el puntero al archivo
				    fclose($archivo);
						}		
			}
			else
			{
				echo 'extension invalida';
			}
		}

		public function subirArchivos($archivo,$rutaCom)
		{
			$nombreArchivo = $_FILES['solicitud_enviar']['name'];
			$tempArchivo   = $_FILES['solicitud_enviar']['tmp_name'];
			$tamaArchivo   = $_FILES['solicitud_enviar']['size'];
			$tipoArchivo   = $_FILES['solicitud_enviar']['type'];

			if ($tamaArchivo == 0) {
				$mensaje = 'No se ha seleccionado ningun archivo';
			}

			else{
				$this->_nombre = $nombreArchivo;
				$respuesta = $this->validandoTipoArchivo();

				if($respuesta)
				{
					#renombrar el archivo con la estrutura
					#codigo generado por la base de datos | codigo de usuairo
					$rutaSubida = $this->_rutaArchivos . DS . $rutaCom . $this->_nombre;
					
					if (move_uploaded_file($tempArchivo, $rutaSubida)) {
							$mensaje = "Archivo subido con exito";
						}	
					else
					{
						$mensaje = "Error al subir.";
					}
				}
				else{
					$mensaje = 'Archivo invalido';
				}
			}
			
			return $mensaje;			
		}

	}
 ?>