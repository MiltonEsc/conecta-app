<?php
    // permite hacer cambios y testear sin necesidad de enviar correos
	 // cuanto esta en TRUE ningun correo podra ser enviado.
	define("DEMO", FALSE);
	// incluimos la conexion a la base de datos
	include ("conexion/db.php");
	// comsultas simples la primera trae quienes cumplen a√±os hoy y la otra me selecciona todos los campos de tabla
	$cons_fecha = "SELECT * FROM personas WHERE DATE_FORMAT(fecha_nacimiento, '%m-%d') = DATE_FORMAT(now(),'%m-%d') AND estado = 1";           
	$cons_correo = "SELECT * FROM personas WHERE estado = 1";		
	$resultado_cons_correo = $mysqli->query($cons_correo);
	$resultado_cons_fecha = $mysqli->query($cons_fecha); 

	// cabeceras del correo
	$nombre_remitente = "Comunicaciones SuperBrix";
	$email_from = "practicantetic@superbrix.com";
	$email_headers = "From: " . $nombre_remitente . " <" . $email_from . ">\r\n";
	$email_headers .= "MIME-Version: 1.0\r\n";
	$email_headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	//este while recorre la pantilla
	while ($datos = $resultado_cons_fecha->fetch_assoc()){
		$id = $datos['id'];
		$nombres[] = $datos['nombres'];
		$ruta = "https://autoemail.superbrix.com/Archivos/contenedor";
		$ruta_completa = $ruta.$id;
		$etiqueta[] = '<img src="[TEMPLATE]" alt="plantilla" height="100%" width="720" srcset="">';
		$etiqueta = str_replace('[TEMPLATE]' , $ruta_completa.'.png', $etiqueta);
		$email_subject = '=?UTF-8?B?' . base64_encode('è¢¬La familia SuperBrix felicita a ' . implode(", ", $nombres) . ' en su cumpleaè´–os!');	
// 		$email_subject = utf8_decode('La familia SuperBrix felicita a ' . implode(", ", $nombres). ' en su cumpleaè´–os' );
		$cadena = implode('</br></br>', $etiqueta);
	}
	

// 	//este while envia el correo a multiples destinatarios
// 	while ($persona = $resultado_cons_correo->fetch_assoc()) {
// 		$to[] = $persona['correo'];
//     	$sent_to = implode(",", $to);
//   	}
        $mail_to = "comunicacion_sb@superbrix.com"; 
	
	
	if(!empty($resultado_cons_fecha) and mysqli_num_rows($resultado_cons_fecha) > 0){
	    if (DEMO)
	die("<hr /><center>Esto es un demo de la plantilla HTML. El correo no fue enviado. </center>");	
	//comprobamos el envio de correo
    	if (mail($mail_to, $email_subject, $cadena, $email_headers) ){
    		echo '<hr /><center>Exitoo! Tu Correo ha sido enviado a '. $mail_to .'</center>';
    	}
	}else{
	    echo '<h1>Consulta vacia</h1>';
	}

?>