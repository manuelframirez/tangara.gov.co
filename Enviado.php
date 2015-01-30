<?php
$EmailDestino='milo9022@hotmail.com';
$Nombre=$_POST['contact-name'];
$Email=$_POST['contact-email'];
$Asunto=$_POST['contact-subject'];
$Mensaje=$_POST['contact-message'];
$Tipo=$_POST['contact-button'];
$Mensaje='<h1>'.$Nombre.'</h1> ha enviado el siguiente mensaje de tipo '.$Tipo.'.<br>'.$Mensaje.'<br><br><br>Responder al correo: "'.$Email.'"';
$cabeceras  = 'MIME-Version: 1.0' . "\r\n".'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$SiEnvio=mail($EmailDestino,$Asunto,$Mensaje,$cabeceras);
if(SiEnvio)
{
	echo utf8_encode('<h1 align="center">Se envi&#242; su '.$Tipo.' con &#233;xito.</h1>');
	header('refresh:2; url=contactenos.html');
}

?>