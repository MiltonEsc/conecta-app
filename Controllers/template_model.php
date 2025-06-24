<?php header('Content-Type: text/html; charset=UTF-8');?>
<?php include $_SERVER['DOCUMENT_ROOT']."/conexion/sessiones.php";?>
<?php include $_SERVER['DOCUMENT_ROOT']."/conexion/db.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/head.php";?>
<!--<head>-->
<?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/sidebar.php";?>
<div class="main-panel">
    <!-- Navbar -->
    <?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/navbar.php"?>
    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <?php
$cons_todos_resultado = "SELECT * FROM personas WHERE estado = 1 ORDER BY date_format( fecha_nacimiento,'%m %d' )";           	
$resultado_todos = $mysqli->query($cons_todos_resultado);
setlocale(LC_TIME, "spanish");
$fechaActual = strftime("%d de %B de %Y");
$cons_ultimo_reg = "SELECT * FROM personas WHERE estado = 1 ORDER BY id DESC LIMIT 1";
$resultado_cons_ultimo_reg = $mysqli->query($cons_ultimo_reg);
$esto = mysqli_fetch_assoc($resultado_todos);

foreach ($resultado_todos as $val) {
  $id = $val['id'];
  $id_array[] = $id;
  
}

  $cadena = implode('-', $id_array);
$cont = 1;
 ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Template</title>
                <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,700;1,300&display=swap"
                    rel="stylesheet">
            </head>

            <body style="margin: 0px; padding: 0px;">
                <div class="card">
                    <div class="card-body  z-index-1">
                        <h4>Toma una captura de todos los usuarios activos</h4>
                        <button id="btnCapturar" type="button" class="btn btn-danger">capturar todas las fotos</button>
                    </div>
                </div>
                <div id="imagenes">
                    <?php foreach ($resultado_todos as $ListarDatos) : ?>
                    <?php setlocale(LC_TIME, "spanish");
                    $cargo = $ListarDatos['cargo'];
                    $d = $ListarDatos['fecha_nacimiento'];
                    // $fecha = strftime("%d de %B", strtotime($d));
                    ?>
                    <?php $ListarDatos['id'] ?>

                    <div id="contenedor<?php echo $ListarDatos['id']?>" class="contenedor"
                        style="width: 850px; height:500px; margin:0 auto;">
                        <img id="fondo"
                            src="<?php $_SERVER['DOCUMENT_ROOT']?>/Views/img/Plantilla_Cumpleanios2025.png"
                            style="width: 850px; height:500px; z-index: -3; position: absolute;" alt="" srcset="">
                        <div style="padding-top: 130px; margin-left: 42px; width: 340px; height: 474px;">
                            <h4
                                style="text-align: center; margin-bottom: 2px; cursive;  font-size: 20px; color: #b45f06">
                            </h4>

                            <div class="foto">
                                <center><img
                                        src="<?php echo '/fotos-perfil/'.$ListarDatos['foto']?>"
                                        width="157" height="157" style="text-align: center; margin:0 auto;" alt=""
                                        srcset=""></center>
                            </div>
                            </center>
                        <h4 style="text-align: center;  margin: 10px 0px 0px 0px; font-family: 'termina', sans-serif; font-weight: 800; font-size: 14px; color: #F36E5A ">
                            <?php echo utf8_decode($ListarDatos['nombres']); ?></h4>
                        </center>

                            <center>
                            <p style="text-align: center; font-family: 'termina', sans-serif; margin: 0; line-height: 15px;  font-size: 12px; color:#5D4244;">
                                <strong><?php echo utf8_decode($ListarDatos['cargo']); ?></strong>
                            </p>
                        </center>
                            <center>
                            <p style="text-align: center; font-family: 'termina', sans-serif; margin: 0; font-size: 10px; color:#5D4244 ;">
                                <strong>Dpto: <?php echo utf8_decode($ListarDatos['departamento']); ?></strong>
                            </p>
                        </center>
                        </div>
                    </div>
                    <br>

                    <?php
          $cont++;      
          endforeach; ?>
                </div>

        </div>
        <script src="<?php $_SERVER['DOCUMENT_ROOT']?>../libraries/jquery-3.4.1.min.js"></script>
        <script src="<?php $_SERVER['DOCUMENT_ROOT']?>../libraries/html2canvas.min.js"></script>
        <script src="../script.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $('#btnCapturar').click(function() {
                var cont = '<?php echo $ListarDatos['id']?>';
                alert(cont);

                for (let i = 1; i <= cont; i++) {

                    tomarImagenPorSeccion('contenedor' + i, 'contenedor' + i);
                }
            });

            $('#OcultarImg').click(function() {
                $("#imagenes").css("display", "none");
                $("#padre").css("display", "none");

            });
            $('#MostrarImg').click(function() {
                $("#imagenes").css("display", "block");
                $("#padre").css("display", "block");

            });
        })
        </script>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/footer.php"?>
    <?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/customizer.php"?>