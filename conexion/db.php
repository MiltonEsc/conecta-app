<?php
	//session_start();
    $mysqli = new mysqli("localhost", "root", "" , "novedades_sb");
    
    if ($mysqli->connect_errno) {
        echo "<h1>Lo sentimos, este sitio web está experimentando problemas.</h1>";
        // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
        exit;
    }

?>