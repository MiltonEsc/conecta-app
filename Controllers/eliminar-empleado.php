<?php
    include($_SERVER['DOCUMENT_ROOT']."/conexion/db.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM personas  WHERE id = $id";
        $result = $mysqli->query($query);
        if (!$result) {
            die("query Failed");
        }
        $_SESSION['message'] = 'Persona Eliminad@ Correctamente!';
        $_SESSION['message_type'] = 'danger';

        header('Location:/home.php');
    }