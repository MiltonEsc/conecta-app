<?php

     if(isset($_POST['enviar'])){
        
        include('../conexion/db.php');
        
        $usuarios = $_POST['usuario'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM usuarios WHERE usuario='$usuarios'  AND password='$password'";
        $sentencia = $mysqli->query($sql);
        
        $resultado = mysqli_fetch_assoc($sentencia);
        // print_r($resultado);
        
        
        if(mysqli_num_rows($sentencia) >= 1){
            session_start();
            $_SESSION['usuario']=$resultado;
            // print_r( $resultado);
            $nombres = $resultado['usuario'];
            $_SESSION['nombres'] = $nombres;
            //  echo $_SESSION['nombres'];
            
            header("Location:../home.php?m1=ok");
            
        }else{
            
            header("Location: https://autoemail.superbrix.com/index.php?m1=err");

        }
    }

?>