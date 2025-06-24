<?php
    require "goodbye-empleado.php";
    // permite hacer cambios y testear sin necesidad de enviar correos
	 // cuanto esta en TRUE ningun correo podra ser enviado.
	define("DEMO", false);
	// incluimos la conexion a la base de datos
	include ("../conexion/db.php");
	// comsultas simples la primera trae quienes cumplen a単os hoy y la otra me selecciona todos los campos de tabla
	if(isset($_GET['id'])){
	    
	    $id = $_GET['id'];
	    $cons_welcome = "SELECT * FROM personas WHERE id = $id and estado = 1";
	    $cons_correo = "SELECT correo FROM personas WHERE estado = 1";		
    	$resultado_cons_correo = $mysqli->query($cons_correo);
    	$resultado_cons_welcome = $mysqli->query($cons_welcome);
    	
    	if (mysqli_num_rows($resultado_cons_welcome) >= 1) {
    	    
	    	// cabeceras del correo
        	$email_from = "Cartelera de Novedades Personal <novedades_superbrix@superbrix.com>";
        	$email_headers = "From: ".$email_from."\r\nReply-To: ".$email_from."\r\n";
        	$email_headers .= "MIME-Version: 1.0\r\n";
        	$email_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        	//este while recorre la pantilla
    	   
    	    while ($datos = $resultado_cons_welcome->fetch_assoc()){
        		$id = $datos['id'];
        		$nombres[] = $datos['nombres'];
        		$ruta = "http://autoemail.superbrix.com/despedida/despedida";
        		$ruta_completa = $ruta.$id;
        		$etiqueta[] = '<img src="[TEMPLATE]" alt="plantilla" height="100%" width="720" srcset="">';
        		$etiqueta = str_replace('[TEMPLATE]' , $ruta_completa.'.png', $etiqueta);
        			
        		$email_subject = utf8_decode('La familia SuperBrix se despide de ' . implode(", ", $nombres));
        		$cadena = implode($datos['nombres'], $etiqueta);
        	}
    	    
    	}
    	
    	$sent_to = "comunicacion_sb@superbrix.com";
    	
    	if(isset($_POST['send-welcome'])){
	    	if(!empty($resultado_cons_welcome) and mysqli_num_rows($resultado_cons_correo) > 0){
        	    if (DEMO)
        	die("<hr /><center>Esto es un demo de la plantilla HTML. El correo no fue enviado. </center>");	
        	//comprobamos el envio de correo
            	if (mail($sent_to, $email_subject, $cadena, $email_headers) ){
            		echo '<hr /><center>Exitoo! Tu Correo ha sido enviado a '.$sent_to .'</center>';
            	}
        	}else{
        	    echo '<h1>Consulta vacia</h1>';
        	}
    	}
	}
	       



?>