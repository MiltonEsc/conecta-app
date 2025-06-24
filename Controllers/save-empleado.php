<?php
ob_start();

    include($_SERVER['DOCUMENT_ROOT']."/conexion/db.php");
    if (isset($_POST['save-empleado'])) {
        $id = 
        $nombres = $_POST['nombres'];
        $correo = $_POST['correo'];
        $nac = $_POST['nac'];
        $cargo = $_POST['cargo'];
        $exten = $_POST['exten'];
        $foto = $_POST['foto'];
        $departamento = $_POST['departamento'];
        $fecha_ingreso = $_POST['fecha-ingreso'];
        $query = "INSERT INTO personas (nombres, correo, fecha_nacimiento, cargo, exten, foto, departamento,fecha_ingreso) VALUES ('$nombres', '$correo','$nac', '$cargo','$exten','$foto','$departamento','$fecha_ingreso' )";
        $result = $mysqli->query($query);
        if (!$result) {
            echo "Error:";
        }else {

            $_SESSION['message'] = 'Persona registrada correctamente!';
            $_SESSION['message_type'] = 'success';

            header("Location:../home.php");
        }

        
    }

ob_end_flush();
?>
