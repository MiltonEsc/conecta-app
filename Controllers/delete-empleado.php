<?php
    include($_SERVER['DOCUMENT_ROOT']."/conexion/db.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "UPDATE personas SET estado = 0 WHERE id = $id";
        $result = $mysqli->query($query);
        if (!$result) {
            die("query Failed");
        }
        $_SESSION['message'] = 'Persona Desactivada Correctamente!';
        $_SESSION['message_type'] = 'danger';

        header('Location:/home.php');
    }
