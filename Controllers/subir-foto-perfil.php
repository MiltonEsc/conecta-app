<?php
ob_start()
?>
<?php include $_SERVER['DOCUMENT_ROOT']."/conexion/sessiones.php";?>
<?php include $_SERVER['DOCUMENT_ROOT']."/conexion/db.php"; ?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/Views/pages/head.php');?>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/Views/pages/sidebar.php');?>

<div class="main-panel ">
    <!-- Navbar -->
    
    <!-- End Navbar -->
    <?php
       $id = $_GET['id'];
       $datos_empleado = "SELECT * FROM personas WHERE id = '$id'";
       $resultado_datos_empleado = $mysqli->query($datos_empleado);
       echo $datos_empleados;
    //Si se quiere subir una imagen
    if (isset($_POST['update1'])) {
     
    //Recogemos el archivo enviado por el formulario
    $archivo = $_FILES['file1']['name'];
    //Si el archivo contiene algo y es diferente de vacio
    if (isset($archivo) && $archivo != "") {
        //Obtenemos algunos datos necesarios sobre el archivo
        $tipo = $_FILES['file1']['type'];
        $tamano = $_FILES['file1']['size'];
        $temp = $_FILES['file1']['tmp_name'];
        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 6000000))) {
            echo'<script type="text/javascript">
    alert("error al cargar la foto verifique la extencion y el tamaño de la foto")
    </script>';
        }
        else {
            //Si la imagen es correcta en tamaño y tipo
            //Se intenta subir al servidor
            if (move_uploaded_file($temp,'../fotos-perfil/'.$archivo)) {

                //Mostramos el mensaje de que se ha subido co éxito
                echo $sentencia_img="UPDATE personas SET foto='$archivo' WHERE id=$id";
                if (mysqli_query($mysqli, $sentencia_img)) {
                    header("Refresh:0");
                  } else {
                    echo "Error updating record: " . mysqli_error($mysqli);
                  }
                //Mostramos la imagen subida
            }
            else {
            //Si no se ha podido subir la imagen, mostramos un mensaje de error
            echo '<script type="text/javascript">
            alert("Ocurrió algún error al subir el fichero. No pudo guardarse.")
            </script>';
            }
        }
    }
    }
    ?>
   
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">FOTOS DE PERFIL</h4>
                    <p class="card-category">La extensión o el tamaño de las fotos debe ser correcta. Solo se permiten archivos .gif, .jpg, .png. y de 600 kb como máximo.</p>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" action="subir-foto-perfil.php?id=<?php echo $_GET['id']; ?>"
                        method="post">
                        <input type="hidden" name="id" value="">
                        <input type="file" name="file1" id="file1">
                        <button type="submit" name="update1" class="btn btn-warning pull-right">Subir Foto</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
            <?php if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                  <?= $_SESSION['message'] ?>
                  <button type="button" data-bs-dismiss="alert" aria-label="Close" class="btn btn-white btn-fab btn-fab-mini btn-round pull-right d-flex align-items-center" >
                    <i class=" material-icons">close</i>
                  </button>
                </div>
              <?php session_unset(); } ?>
            <div class="card">
                <?php foreach ($resultado_datos_empleado as $datos) : ?>
                <div class="card-header">
                    <h4 class="card-title"><?php echo $datos['nombres'] ?></h4>
                    <p class="category">ID: <?php echo $datos['id'] ?> Departamento: <?php echo utf8_encode($datos['departamento']) ?></p>
                </div>
                <div class="card-body">
                    <img height='100' width='100' src='../fotos-perfil/<?php echo utf8_encode($datos['foto']) ?>'>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php include ($_SERVER['DOCUMENT_ROOT'].'/Views/pages/navbar.php');?>
    <?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/footer.php"?>
    <!--fin del wrapper-->
    <?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/customizer.php"?>