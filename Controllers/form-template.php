<?php
ob_start();
include ($_SERVER['DOCUMENT_ROOT']."/conexion/db.php");
include $_SERVER['DOCUMENT_ROOT']."/conexion/sessiones.php";
include ($_SERVER['DOCUMENT_ROOT'].'/Views/pages/head.php');
include ($_SERVER['DOCUMENT_ROOT'].'/Views/pages/sidebar.php');
?>
<!--<head>-->
<div class="main-panel">
<?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM personas WHERE id = $id";
        $update_persona = $mysqli->query($query);

       $foto_ruta = '../bienvenida'.'/bienvenida'.$id.'.png';
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
                    <form action="send-email-form.php?id=<?php echo $_GET['id']; ?>" method="POST" id="formulario">
                        <div class="row">
                            <hr/>
                            <div class="col-md-12">
                               
                            </div>
                            <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                                <img class="modal-content" id="img01">
                                <div id="caption"></div>
                            </div>
                        </div>
                       
                        <button name="send-welcome" onclick="enviar()" class="btn btn-warning pull-left">Enviar-formulario</button>
                        <!-- <div class="clearfix"></div> -->
                    </form>
                </div>
            </div>
        
        
        <script src="<?php $_SERVER['DOCUMENT_ROOT']?>../libraries/jquery-3.4.1.min.js"></script>
        <script src="<?php $_SERVER['DOCUMENT_ROOT']?>../libraries/html2canvas.min.js"></script>
        <script src="../script.js"></script>
        <script type="text/javascript">
        
        function enviar(){
            Swal.fire(
              'Mensaje Enviado con exito',
              'Carlelera de novedades',
              'success'
            )
          }
          
        </script>
    </div>
    <?php include ($_SERVER['DOCUMENT_ROOT'].'/Views/pages/navbar.php');?>
    <?php include ($_SERVER['DOCUMENT_ROOT'].'/Views/pages/footer.php');?>
</div>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/Views/pages/customizer.php');?>