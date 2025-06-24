<?php
    include($_SERVER['DOCUMENT_ROOT']."/conexion/db.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "UPDATE personas SET estado = 1 WHERE id = $id";
        $result = $mysqli->query($query);
        if (!$result) {
            die("query Failed");
        }
        $_SESSION['message'] = 'Persona Activada Correctamente!';
        $_SESSION['message_type'] = 'warning';

        header('Location:/home.php');
    }
