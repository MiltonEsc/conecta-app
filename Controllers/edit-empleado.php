<?php header('Content-Type: text/html; charset=UTF-8');?>
<?php
ob_start()
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/conexion/sessiones.php"; ?>
<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Views/pages/head.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Views/pages/sidebar.php'); ?>
<!--<head>-->
<div class="main-panel">

    <?php include($_SERVER['DOCUMENT_ROOT'] . "/conexion/db.php"); ?>
    <?php
    setlocale(LC_TIME, "spanish");
    $fechaActual = strftime("%d de %B de %Y");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM personas WHERE id = $id";
        $update_persona = $mysqli->query($query);
        if (mysqli_num_rows($update_persona) == 1) {
            $row_update = mysqli_fetch_array($update_persona);
            $id = $row_update['id'];
            $nombres = utf8_decode($row_update['nombres']);
            $correo = utf8_decode($row_update['correo']);
            $nac = utf8_decode($row_update['fecha_nacimiento']);
            $cargo = utf8_decode($row_update['cargo']);
            $departamento = utf8_decode($row_update['departamento']);
            $exten = utf8_decode($row_update['exten']);
            $ingreso = utf8_decode($row_update['fecha_ingreso']);
        }

        if (isset($_POST['update-empleado'])) {
            $id = $_GET['id'];
            $nombres = $_POST['nombres'];
            $correo = $_POST['correo'];
            $nac = $_POST['nac'];
            $cargo = $_POST['cargo'];
            $departamento = $_POST['departamento'];
            $exten = $_POST['exten'];
            $fecha_ingreso = $_POST['fecha-ingreso'];

            $query = "UPDATE personas set nombres = '$nombres', cargo = '$cargo', exten = '$exten', fecha_nacimiento = '$nac', correo = '$correo', departamento = '$departamento', fecha_ingreso = '$fecha_ingreso' WHERE id = $id";
            mysqli_query($mysqli, $query);
            header("Refresh:0");
        }

        $foto_ruta = '../Archivos' . '/contenedor' . $id . '.png';
    }
    ?>
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Actualizar Empleado</h4>
                    <p class="card-category">Complete el Registro para Actualizar un Empleado.
                        </br> El cargo en la Empresa debe ser maximo de 48 caracteres.
                        </br>las iniciales de cada nombre y apellidos debe ser en MAYUSCULAS.</p>
                </div>
                <div class="card-body">
                    <form action="edit-empleado.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nombres</label>
                                    <input type="text" name="nombres" value="<?php echo utf8_encode($nombres); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Correo</label>
                                    <input type="email" name="correo" value="<?php echo utf8_encode($correo); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">Fecha de Nacimiento</label>
                                    <input type="date" name="nac" value="<?php echo $nac; ?>" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Cargo en la Empresa: maximo 48 caracteres</label>
                                    <input type="text" name="cargo" value="<?php echo utf8_encode($cargo); ?>" maxlength="48" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Extencion</label>
                                    <input type="text" name="exten" value="<?php echo $exten; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Departamento</label>
                                    <input type="text" name="departamento" value="<?php echo utf8_encode($departamento); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="">Fecha de ingreso</label>
                                    <input type="date" name="fecha-ingreso" value="<?php echo $ingreso; ?>" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button name="update-empleado" class="btn btn-warning pull-right">Actualizar Datos</button>
                                </div>
                            </div>
                            <hr />
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">¡Informacion Importante!</h4>
                                <h5>La plantilla de abajo(véase. Imagen #2) es solo una plantilla de previsualizacion, porque para capturar la foto se necesita que este visible. la verdadera plantilla que se envia por correo es la de arriba (véase. Imagen #1)si ve que la plantilla 1 aparece en blanco por favor presione el boton Actualizar Foto, una vez que vea que ya se cargo la imagen puede proceder a enviarla)</h5>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <img src="<?php echo $foto_ruta ?>" alt="" id="myImg" srcset="" style="width:100%;max-width:300px">
                                    <p>Imagen #1</p>
                                </div>
                            </div>
                            <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                                <img class="modal-content" id="img01">
                                <div id="caption"></div>
                            </div>
                        </div>

                        <button id="btnCapturar" type="button" class="btn btn-danger">Actualizar foto</button>
                        <!-- <div class="clearfix"></div> -->
                    </form>
                </div>
            </div>
            <?php foreach ($update_persona as $ListarDatos) :
                $d = $ListarDatos['fecha_nacimiento'];
                // $fecha = strftime("%d de %B", strtotime($d));
            ?>
                <div id="contenedor<?php echo $ListarDatos['id'] ?>" class="contenedor" style="width: 850px; height:500px; margin:0 auto;">
                    <img id="fondo" src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Views/img/Plantilla_Cumpleanios2025.png" style="width: 850px; height:500px; z-index: -3; position: absolute;" alt="" srcset="">
                    <div style="padding-top: 132px; margin-left: 42px; width: 340px; height: 474px;">
                    <center>
                        <div class="foto">
                            <img src="<?php echo '/fotos-perfil/' . $ListarDatos['foto'] ?>" width="157" height="157" style="text-align: center; margin:0 auto;" alt="" srcset="">

                        </div>
                        </center>
                        <h4 style="text-align: center;  margin: 16px 0px 0px 0px; font-family: 'termina', sans-serif; font-weight: 800; font-size: 14px; color: #F36E5A ">
                            <?php echo $ListarDatos['nombres']; ?></h4>
                        </center>

                        <center>
                            <p style="text-align: center; font-family: 'termina', sans-serif; margin: 0; line-height: 15px; font-size: 12px; color:#5D4244;">
                                <strong><?php echo $ListarDatos['cargo']; ?></strong>
                            </p>
                        </center>
                        <center>
                            <p style="text-align: center; font-family: 'termina', sans-serif; margin: 0; font-size: 10px; color:#5D4244 ;">
                                <strong>Dpto: <?php echo $ListarDatos['departamento']; ?></strong>
                            </p>
                        </center>
                        <center>
                            <p style="text-align: center; margin: 0; font-family: 'Exo', sans-serif; font-size: small; color:black; font-weight: 400;">
                                <strong></strong>
                            </p>
                        </center>
                    </div>
                </div>
                <p class="text-center">Imagen #2</p>
        </div>
    <?php endforeach; ?>


    <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>../libraries/jquery-3.4.1.min.js"></script>
    <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>../libraries/html2canvas.min.js"></script>
    <script src="../script.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#btnCapturar').click(function() {
                var cont = '<?php echo $ListarDatos['id'] ?>';

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
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        modal.onclick = function() {
            modal.style.display = "none";
        }

        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    </div>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/Views/pages/navbar.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/Views/pages/footer.php'); ?>

</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Views/pages/customizer.php'); ?>