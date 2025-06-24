<?php
   
    // permite hacer cambios y testear sin necesidad de enviar correos cuanto esta en TRUE ningun correo podra ser enviado.
	define("DEMO", false);
	// incluimos la conexion a la base de datos
	include ("../conexion/db.php");
	// comsultas simples la primera trae quienes cumplen a単os hoy y la otra me selecciona todos los campos de tabla
	if(isset($_GET['id'])){
	    
	    $id = $_GET['id'];
	    $cons_welcome = "SELECT * FROM personas WHERE id = $id and estado = 1";
	    $cons_correo_x_id = "SELECT correo FROM personas WHERE estado = 1 and id = $id";
	    
    	$resultado_cons_welcome = $mysqli->query($cons_welcome);
    	$resultado_correo_x_id = $mysqli->query($cons_correo_x_id);
    	if (mysqli_num_rows($resultado_cons_welcome) >= 1) {
    	    
	    	// cabeceras del correo
        	$email_from = "Cartelera de Novedades Personal <novedades_superbrix@superbrix.com>";
        	$email_headers = "From: ".$email_from."\r\nReply-To: ".$email_from."\r\n";
        	$email_headers .= "MIME-Version: 1.0\r\n";
        	$email_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        	//este while recorre la pantilla
        	
    	   $email_subject_form = utf8_decode('Datos personales empleados SuperBrix');
    	    while ($datos = $resultado_cons_welcome->fetch_assoc()){
        		$id = $datos['id'];
        		$nombres[] = $datos['nombres'];
        		
        		$etiqueta_form = utf8_decode(' <br></div><br><br><div dir="ltr"><div style="font-family:arial,helvetica,sans-serif"><div><span style="color:rgb(0,0,0)">Buenas tardes estimado colaborador,</span><br></div><div style="font-family:Arial,Helvetica,sans-serif"><div class="gmail_quote"><div dir="ltr"><div style="font-family:arial,helvetica,sans-serif"><font color="#000000"><br></font></div><div style="font-family:arial,helvetica,sans-serif"><font color="#000000">Con el objetivo de mantener la base de datos del personal de SuperBrix actualizada agradecemos diligenciar el siguiente formulario:</font></div><div style="font-family:arial,helvetica,sans-serif"><br></div><div style="color:rgb(80,0,80);font-family:arial,helvetica,sans-serif"><div><a href="https://forms.gle/YxMhn7e9Du5ZUKTWA" target="_blank"><b><font size="4">Formulario : Datos personales empleados SuperBrix</font></b></a><br></div></div><div style="color:rgb(80,0,80);font-family:arial,helvetica,sans-serif"><br></div><div style="color:rgb(80,0,80);font-family:arial,helvetica,sans-serif"><b><font color="#000000"><br></font></b></div></div></div></div><i>Si <span class="gmail_default">usted ya </span>diligenció el formulario omití<span class="gmail_default">a</span><span class="gmail_default"></span><span class="gmail_default"></span> este correo.</i><div style="font-family:Arial,Helvetica,sans-serif"><br></div><div style="font-family:Arial,Helvetica,sans-serif"><p style="margin-bottom:16pt"><span style="color:rgb(148,8,23)"><img src="https://docs.google.com/uc?export=download&amp;id=1pvQvbl0s3CD4flL0ENU12PPKlSEP5au0&amp;revid=0B6kg8Ed-ThXhL05TdlViTUZDZE91SkVlOUUveW51THBGd2prPQ" width="96" height="19"></span><b style="font-size:12.8px"> </b><span style="font-size:12.8px;color:rgb(255,153,0)">〉</span><b><span style="font-size:12.8px">Comunicaciones SuperBrix</span><span style="font-size:12.8px"><font color="#000000"> </font></span></b><span style="font-size:12.8px"> </span><font color="#ff9900" style="font-size:12.8px">〉</font><span style="font-size:12.8px"> </span><font color="#0000ff" style="font-size:12.8px"><a href="http://www.superbrix.com/" target="_blank">www.superbrix.com</a></font></p><p style="margin-bottom:16pt"><img src="https://docs.google.com/uc?export=download&amp;id=1bM9kL0cCtJJjribIk-m9pa28KkuTbOBP&amp;revid=0B6kg8Ed-ThXhRUtNcU9hSnNEenZDNzBycGJ0MWV5R0ZxV2VBPQ" width="200" height="93"><br></p><p><i><span lang="ES-CO" style="font-size:10pt;font-family:Arial,sans-serif;color:rgb(106,168,79)">Comprométete con el medio ambiente, imprime solo lo necesario.</span></i><span lang="ES-CO" style="font-size:9.5pt"></span></p><p><i><span lang="ES-CO" style="font-size:10pt;font-family:Arial,sans-serif">**Mensaje Confidencial**</span></i><span lang="ES-CO" style="font-size:9.5pt"></span></p><p><span lang="ES-CO" style="font-size:9.5pt"> </span></p><p><i><span lang="ES-CO" style="font-size:10pt;font-family:Arial,sans-serif">Este mensaje es confidencial y está dirigido únicamente a su destinatario.  Por lo tanto, la información contenida en el mismo no podrá ser usada, copiada o difundida. Si Usted no es el destinatario de este mensaje por favor devuélvalo al remitente y borre el mensaje.</span></i><span lang="ES-CO" style="font-size:9.5pt"></span></p><p><span lang="ES-CO" style="font-size:9.5pt"> </span></p><p><i><span lang="EN-US" style="font-size:10pt;font-family:Arial,sans-serif">Gracias</span></i><span lang="EN-US" style="font-size:9.5pt"></span></p><p><span lang="EN-US" style="font-size:9.5pt"> </span></p><p><i><span lang="EN-US" style="font-size:10pt;font-family:Arial,sans-serif;color:rgb(106,168,79)">Please consider the environment before printing this e-mail</span></i><span lang="EN-US" style="font-size:9.5pt"></span></p><p><i><span lang="EN-US" style="font-size:10pt;font-family:Arial,sans-serif">**Confidential Notice**</span></i><span lang="EN-US" style="font-size:9.5pt"></span></p><p><span lang="EN-US" style="font-size:9.5pt"> </span></p><p><i><span lang="EN-US" style="font-size:10pt;font-family:Arial,sans-serif">This message (including any attachments) is intended only for the use of the individual or entity to which it is addressed and may contain information that is non-public, proprietary, privileged, confidential, and exempt from disclosure under applicable law or may constitute as attorney work product. If you are not the intended recipient, you are hereby notified that any use, dissemination, distribution, or copying of this communication is strictly prohibited. If you have received this communication in error, notify us immediately by telephone and (I) destroy this message if a facsimile or (II) delete this message immediately if this is an electronic communication&quot;</span></i><span lang="EN-US" style="font-size:9.5pt"></span></p><p><span lang="EN-US" style="font-size:9.5pt"> </span></p><div style="font-family:arial,helvetica,sans-serif"><i style="font-family:Arial,Helvetica,sans-serif"><span lang="EN-US" style="font-size:10pt;font-family:Arial,sans-serif"> </span></i><i style="font-family:Arial,Helvetica,sans-serif"><span lang="ES-CO" style="font-size:10pt;font-family:Arial,sans-serif">Thanks </span></i></div></div><br></div></div>
</div></div>
');
        	}
    	    
    	}

    	
		if (mysqli_num_rows($resultado_correo_x_id) >= 1) {
    	    //este while envia el correo a un  unico destinatario
        	while ($correo_x_id = $resultado_correo_x_id->fetch_assoc()) {
        		$to_me[] = $correo_x_id['correo'];
            	$send_to_me = implode(",", $to_me);
          	}
    	}
    	
    	if(isset($_POST['send-welcome'])){
	    	if(!empty($resultado_cons_welcome)){
        	    if (DEMO)
        	die("<hr /><center>Esto es un demo de la plantilla HTML. El correo no fue enviado. </center>");	
        	//comprobamos el envio de correo

            	if (mail($send_to_me, $email_subject_form, $etiqueta_form, $email_headers)){
            		echo '<hr /><center>Exitoo! Tu Correo ha sido enviado a '.$send_to_me .'</center>';
            	}
        	}else{
        	    echo '<h1>Consulta vacia</h1>';
        	}
    	}
	}
	       



?>