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

       $foto_ruta = '../despedida'.'/despedida'.$id.'.png';
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
                    <form action="send-email-goodbye.php?id=<?php echo $_GET['id']; ?>" method="POST" id="formulario">
                        <div class="row">
                            <hr/>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <img src="<?php echo $foto_ruta?>" alt="" id="myImg" srcset="" style="width:100%;max-width:300px">
                                </div>
                            </div>
                            <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                                <img class="modal-content" id="img01">
                                <div id="caption"></div>
                            </div>
                        </div>
                       
                        <button id="btnCapturar" type="button" class="btn btn-danger">Actualizar foto</button>
                        <button name="send-welcome" onclick="valida_envia()" class="btn btn-warning pull-right">Enviar-Despedida</button>
                        <!-- <div class="clearfix"></div> -->
                    </form>
                </div>
            </div>
            <?php foreach ($update_persona as $ListarDatos) : 
            $d = $ListarDatos['fecha_nacimiento'];
            $fecha = strftime("%d de %B", strtotime($d));
            ?>
            
            <div id="despedida<?php echo $ListarDatos['id']?>" class="bienvenida" style="width: 800px; height:600px; margin:0 auto;">
                <img id="fondo" src="<?php $_SERVER['DOCUMENT_ROOT']?>/Views/img/PlantillaDespedida.png" style="width: 800px; height:600px; z-index: -3; position: absolute;">
                <div style="padding-top: 60px; margin: auto; width: 340px; height: 474px;">
                    <h4 style="text-align: center; margin-bottom: 2px; cursive;  font-size: 20px; color: #b45f06"></h4>

                    <h4 style="text-align: center; margin-top: 58px; font-size: 15px; font-family: 'Exo', sans-serif; color: black;"></h4>
                    <div class="foto">
                        <center><img
                                src="<?php echo '/fotos-perfil/'.$ListarDatos['foto']?>"
                                width="140" height="140" style="text-align: center; margin: 58px 0px 10px auto;" alt="" srcset="">
                        </center>
                    </div>
                    <center>
                        <h4
                            style="text-align: center; margin: 4px 0px 0px 0px; font-family: 'Courgette', cursive; font-weight: bold; font-size: 19px; color: #b45f06">
                            <?php echo $ListarDatos['nombres']; ?></h4>
                    </center>

                    <center>
                        <p style="text-align: center; font-family: 'Exo', sans-serif; margin: 0; font-size: 15px; color:black;">
                            <strong><?php echo $ListarDatos['cargo']; ?></strong>
                        </p>
                    </center>
                    <center>
                        <p style="text-align: center; font-family: 'Exo', sans-serif; margin: 0; font-size: 15px; color:black;">
                            <strong>Dpto: <?php echo $ListarDatos['departamento']; ?></strong>
                        </p>
                    </center
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        
        <script src="<?php $_SERVER['DOCUMENT_ROOT']?>../libraries/jquery-3.4.1.min.js"></script>
        <script src="<?php $_SERVER['DOCUMENT_ROOT']?>../libraries/html2canvas.min.js"></script>
        <script src="../script.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $('#btnCapturar').click(function() {
                var cont = '<?php echo $ListarDatos['id']?>';

                for (let i = 1; i <= cont; i++) {

                    tomarImagenDespedida('despedida' + i, 'despedida' + i);
                    
                }
               
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
        
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
        
        
        function valida_envia(){
            x = document.getElementById("myImg").naturalHeight;
            
                if(x === 0){
                     $('#formulario').submit(function(event) {
                        event.preventDefault();
                    });
                    Swal.fire(
                      'Oops...',
                      'Por favor tienes que Actualizar la foto primero.',
                      'error'
                    )
                }else{
                    Swal.fire(
                      'Mensaje Enviado con exito',
                      'success'
                    )
                    
                }
          }
          
        </script>
    </div>
    <?php include ($_SERVER['DOCUMENT_ROOT'].'/Views/pages/navbar.php');?>
    <?php include ($_SERVER['DOCUMENT_ROOT'].'/Views/pages/footer.php');?>
</div>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/Views/pages/customizer.php');?>