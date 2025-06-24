<?php
ob_start()
?>
<?php include $_SERVER['DOCUMENT_ROOT']."/conexion/sessiones.php";?>
<?php include $_SERVER['DOCUMENT_ROOT']."/conexion/db.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/head.php";?>
<!--<head>-->
<?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/sidebar.php";?>

<div class="main-panel ">
    <!-- Navbar -->
    <?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/navbar.php"?>
    <!-- End Navbar -->
    <?php

    $datos_empleado = "SELECT * FROM personas WHERE estado = 1";
    $resultado_datos_empleado = $mysqli->query($datos_empleado);
    $arrayPHP = mysqli_fetch_array($resultado_datos_empleado);
    ?>
    <div class="content">
        <div class="container-fluid">
            <h4>Buscador por Nombre</h4>
                <form action="" method="get">
                  <div class="input-group no-border">
                    <input type="text" class="form-control" name="busqueda" placeholder="Buscar...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon" name="enviar">
                      <i class="material-icons">search</i>
                      <div class="ripple-container"></div>
                    </button>
                  </div>
                </form>
            <?php 
            if(isset($_GET['enviar'])){
                $busqueda = $_GET['busqueda'];
                $consulta_busqueda = "SELECT * FROM personas WHERE nombres LIKE '%$busqueda%' AND estado = 1";
                $consulta_busqueda_resultado = $mysqli->query($consulta_busqueda);
 
            }else{
                $consulta_busqueda = "SELECT * FROM personas WHERE estado = 1";
                $consulta_busqueda_resultado = $mysqli->query($consulta_busqueda);
            }
            ?>
            <div class="row">
                <?php foreach ($consulta_busqueda_resultado as $datos) : ?>
                <div class="col-md-3">
                    <div class="card" id="resultado" style="width: 300px; max-width: 300px;">
                            <div class="card-header">
                                <h4 class="card-title"><?php echo utf8_encode($datos['nombres']) ?></h4>
                                <p class="category">ID: <?php echo $datos['id'] ?> Ruta: <?php echo utf8_decode($datos['foto']) ?></p>
                            </div>
                            <div class="card-body">
                                <img style="height: 100%; width: 100%;" src="../fotos-perfil/<?php echo $datos['foto'] ?>">
                                <a class="btn btn-primary btn-fab btn-fab-mini btn-round" id="btnCapturar"
                                    href="subir-foto-perfil.php?id=<?php echo $datos['id'] ?>">
                                    <i class="material-icons">edit</i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>  
                </div>
            </div>
        </div>
        <?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/footer.php"?>
    </div>
    
</div>
<!--fin del wrapper-->
<?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/customizer.php"?>