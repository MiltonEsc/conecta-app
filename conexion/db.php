<?php
	//session_start();
    $mysqli = new mysqli("127.0.0.1", "cmwhcnhg", "jsM093wby5Tib231d*" , "cmwhcnhg_cumpleanos");
    
    if ($mysqli->connect_errno) {
        echo "<h1>Lo sentimos, este sitio web está experimentando problemas.</h1>";
        // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
        exit;
    }

?>