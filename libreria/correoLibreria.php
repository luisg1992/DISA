<?php 
/**
* @author Rodolfo Esteban Crisanto Rosas
*/

require(ROOT . 'libreria' . DS . 'PHPMailer' . DS . 'class.phpmailer.php');
require(ROOT . 'libreria' . DS . 'PHPMailer' . DS . 'class.smtp.php');


class correoLibreria extends PHPMailer
{
	private $_host			= 'smtp.gmail.com';
	private $_usuario		= 'desadisalm@gmail.com';
	private $_contrasenia 	= 'd354rr0ll0@oite';
	private $_puerto 		= 587;
	private $_mail;

	public function __construct()
	{
		$this->_mail = new PHPMailer;
		$this->_mail->isSMTP();                                      
		$this->_mail->Host = $this->_host; 
		$this->_mail->SMTPAuth = true;                               
		$this->_mail->Username = $this->_usuario;                 
		$this->_mail->Password = $this->_contrasenia;                           
		$this->_mail->SMTPSecure = 'tls';                            
		$this->_mail->Port = $this->_puerto; 
	}

	public function enviarCorreoSimple($asunto,$arrayDestinatarios,$mensaje,$arrayArchivosAdjuntos = false)
	{
		
		$this->_mail->From = 'desadisalm@gmail.com';
		$this->_mail->FromName = 'Oficina de Informatica y Telecomunicaciones - OITE';
		$this->_mail->Subject = $asunto;

		/* uno o mas destinatarios */
		/**
		* estructura:
		* correo : nombres correo
		* nombreUsuario : nombre del usuario
		**/
		for ($i=0; $i < count($arrayDestinatarios); $i++) { 
			$this->_mail->addAddress($arrayDestinatarios[$i]['correo'], $arrayDestinatarios[$i]['nombreUsuario']);
		}

		# si se agregan archivos adjuntos
		if ($arrayArchivosAdjuntos) {
			for ($i=0; $i < count($arrayArchivosAdjuntos); $i++) { 
				$this->_mail->addAttachment($arrayArchivosAdjuntos[$i]['url']);	
			}			
		}

		$this->_mail->Body = $mensaje;
		$this->_mail->isHTML(True);
		$this->_mail->setLanguage('es');

		if(!$this->_mail->send()) {
			//echo 'El mensaje no pudo ser enviado.';
		    //echo 'Mailer Error: ' . $this->_mail->ErrorInfo;
		    return "M_0";
		} else {
		    return "M_1";
		}
	}
}
 ?>