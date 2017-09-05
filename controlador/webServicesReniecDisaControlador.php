<?php 
/**
* 
*/

class webServicesReniecDisaControlador extends Controlador
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function validarDNI($dni,$clave)
	{	
		

		if (md5($clave) == md5('2022SAREAL1011')) {
			$fields_string = null;
			$url = 'http://wsminsa.minsa.gob.pe/WSRENIEC_DNI/SerDNI.asmx/GetReniec';
			$fields = array(
				'strDNIAuto' => false,
				'strDNICon' => $dni
			);
			
			foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
			rtrim($fields_string, '&');

			$ch = curl_init();

			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_VERBOSE, 1);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		    curl_setopt($ch, CURLOPT_POST, count($fields));
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
			

			$result = curl_exec($ch);	
			curl_close($ch);

			$datos[] =  null;
			$i = 0;
			$xml = simplexml_load_string($result);
			foreach ($xml->string as $nodo) {
				if ($nodo != ' ') {
					$datos[$i] = $nodo;
				}

				$i = $i + 1;
			}
			
			if ($datos[17][0] == 1) {$sexo = "Masculino";}	else  {	$sexo = "Femenino";	}

			$dia = substr($datos[18][0], -2);
			$mes = substr($datos[18][0], 4,-2);	
			$anio = substr($datos[18][0], 0,-4);
			
			$persona = array(
				'paterno' 		=> trim($datos[1][0]),
				'materno' 		=> trim($datos[2][0]),
				'nombres' 		=> trim($datos[3][0]),
				'nacionalidad' 	=> trim($datos[11][0]),
				'departamento' 	=> trim($datos[12][0]),
				'provincia' 	=> trim($datos[13][0]),
				'distrito' 		=> trim($datos[14][0]),
				'direccion' 	=> trim($datos[16][0]),
				'sexo' 			=> $sexo,
				'dia' 			=> $dia,
				'mes' 			=> $mes,
				'anio' 			=> $anio
				);
			
			echo json_encode($persona);
			exit();
		}
		else
		{
			echo json_encode('Acceso Invalido');
			exit();
		}
		
		
	}
}
 ?>