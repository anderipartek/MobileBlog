<?php
// incluimos la librería
require_once ('config.php');
require_once (CORREO_ELECTRONICO_LIBRERIA);
require_once (MODELO_USER);


class CorreoElectronico {
	
	// Atributos privados
	private $phpMailer = null;
	private $port = 465;
	private $host = "smtp.gmail.com";
	private $mail_user = 'mobileblog2015@gmail.com';
	private $mail_pass = '2015mb15';
	private $appName = 'MobileBlog App';
	private $type_smtp = 'ssl';
	private $destinatarios = null;
	private $nombre = "";
	
	// Constructor
	function CorreoElectronico($debug = false) {
		// crear un objeto de la libreria PHPMailer
		$this->phpMailer = new PHPMailer ();
		// indico a la clase que use SMTP
		$this->phpMailer->IsSMTP ();
		// permite modo debug para ver mensajes de las cosas que van ocurriendo
		if ($debug) {
			$this->phpMailer->SMTPDebug = 2;
		}
		// Debo de hacer autenticación SMTP
		$this->phpMailer->SMTPAuth = true;
		$this->phpMailer->SMTPSecure = $this->type_smtp;
		
		// indico el servidor de Gmail para SMTP
		$this->phpMailer->Host = $this->host;
		// indico el puerto que usa Gmail
		$this->phpMailer->Port = $this->port;
		
		// indico un usuario / clave de un usuario de gmail
		$this->phpMailer->Username = $this->mail_user;
		$this->phpMailer->Password = $this->mail_pass;
		
		// indicar desde donde enviamos
		$this->phpMailer->SetFrom ( $this->mail_user, $this->appName );
		// indicar remitente
		$this->phpMailer->AddReplyTo ( $this->mail_user, $this->appName );
	}
	
	// Metodos
	function mandarMail($address, $nombre, $subject = "MobileBlog") {
		// Asunto
		$this->phpMailer->Subject = $subject;
		
		// Cuerpo del mensaje
		$plantilla = file_get_contents ( PLANTILLA_USER );
		$contenido = str_replace ( "{usuario}", $nombre, $plantilla );
		$url = WEBROOT . "core/validarControlador.php?usr=" . $nombre;
		$contenido = str_replace ( "{url}", $url, $contenido );
		$this->phpMailer->MsgHTML ( $contenido );
		
		// indico destinatario
		$this->phpMailer->AddAddress ( $address, $nombre );
		
		if (! $this->phpMailer->Send ()) {
			echo "Error al enviar: " . $this->phpMailer->ErrorInfo;
		} else {
			echo "Mensaje enviado!";
		}
	}
	function notificarArticulo($subject = "MobileBlog", $titulo) {
		// Asunto
		$this->phpMailer->Subject = $subject;
		
		// Cuerpo del mensaje
		$plantilla = file_get_contents ( PLANTILLA_ARTICULO );
		$url = WEBROOT;
		$contenido = str_replace ( "{url}", $url, $plantilla );
		$contenido = str_replace ( "{titulo}", $titulo, $plantilla );		
		$this->phpMailer->MsgHTML ( $contenido );
		$destinatarios = getUsuariosMail ();
		
		foreach ( $destinatarios as $usuario ) {
			$nombre = $usuario ['nombre'];
			$address = $usuario ['email'];
			
			// indico destinatario
			$this->phpMailer->AddAddress ( $address, $nombre );
		}
		
		if (! $this->phpMailer->Send ()) {
			echo "Error al enviar: " . $this->phpMailer->ErrorInfo;
		} else {
			echo "Mensaje enviado!";
		}
	}
	
	// Getters y setters
	function setAsunto($asunto) {
		$this->phpMailer->Subject = $asunto;
	}
	function setNombre($nombre) {
		$this->nombre = $nombre;
	}
	function getNombre() {
		return $this->destinatarios;
	}
	function getDestinatario() {
		return $this->destinatarios;
	}
	function setCuerpo($cuerpo) {
		$this->phpMailer->msgHTML ( $cuerpo );
	}
	
}