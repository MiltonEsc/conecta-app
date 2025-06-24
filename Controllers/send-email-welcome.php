<?php
include ("../conexion/db.php");
$id = $_GET['id'];

// comsultas simples la primera trae quienes cumplen a単os hoy y la otra me selecciona todos los campos de tabla
$cons_welcome = "SELECT * FROM personas WHERE id = $id and estado = 1";
$cons_correo = "SELECT correo FROM personas WHERE estado = 1";

$resultado_cons_correo = $mysqli->query($cons_correo);
$resultado_cons_welcome = $mysqli->query($cons_welcome);


while ($datos = $resultado_cons_welcome->fetch_assoc()){
    $id = $datos['id'];
	$nombres[] = $datos['nombres'];
	
	
	$ruta = "http://autoemail.superbrix.com/bienvenida/bienvenida";
    $ruta_completa = $ruta.$id;
    
    $etiqueta[] = '<img src="[TEMPLATE]" alt="plantilla" height="100%" width="720" srcset="">';
    $etiqueta = str_replace('[TEMPLATE]' , $ruta_completa.'.png', $etiqueta);
    $cadena = implode($datos['nombres'], $etiqueta);   		
	//Asunto del email
    $subject = utf8_decode('La familia SuperBrix le da la Bienvenida a ' . implode(", ", $nombres));
    
}
//Recipiente
$to = 'comunicacion_sb@superbrix.com';


$email_from = "Cartelera de Novedades Personal <novedades_superbrix@superbrix.com>";
        	$email_headers = "From: ".$email_from."\r\nReply-To: ".$email_from."\r\n";
        	$email_headers .= "MIME-Version: 1.0\r\n";
        	$email_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";



// //Contenido del Email
$htmlContent = $cadena;

//Encabezado para información del remitente
$headers = "De: $fromName"." <".$from.">";

//Enviar EMail
$mail = @mail($to, $subject, $htmlContent, $email_headers); 

//Estado de envío de correo electrónico
echo $mail?"<h1>Correo enviado.</h1>":"<h1>El envío de correo falló.</h1>";