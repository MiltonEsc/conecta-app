<?php 
header('Content-Type: text/html; charset=UTF-8');
?>
<?php include $_SERVER['DOCUMENT_ROOT']."/conexion/db.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/conexion/sessiones.php";?>
<?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/head.php";?>
<?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/sidebar.php";?>
    <div class="main-panel ">
      <!-- Navbar -->
      <?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/navbar.php"?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
            <?php if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                  <?= $_SESSION['message'] ?>
                  <button type="button" data-bs-dismiss="alert" aria-label="Close" class="btn btn-white btn-fab btn-fab-mini btn-round pull-right d-flex align-items-center" >
                    <!--<i class=" material-icons">close</i>-->
                  </button>
                </div>
              <?php session_unset(); } ?>
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">REGISTRA UNA NUEVA PERSONA</h4>
                  <p class="card-category">Complete el formulario para Agregar una nueva Persona. Recomendacion, Trate que el nombre de la persona tenga la primera letra en mayuscula por ejemplo:</br>Jose Luis Cuevas Garrindo.</p>
                </div>
                <div class="card-body">
                  <form action="Controllers/save-empleado.php" method="post">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombre Completo de la persona</label>
                            <input type="text" name="nombres" class="form-control" id="gg" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Correo</label>
                          <input type="email" name="correo" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="">Fecha de Nacimiento</label>
                          <input type="date" name="nac" class="form-control" placeholder="" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Cargo en la Empresa</label>
                          <input type="text" name="cargo" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Extencion / Celular</label>
                          <input type="text" name="exten" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Departamento</label>
                          <input type="text" name="departamento" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="">Fecha de ingreso</label>
                          <input type="date" id="fecha-ingreso" name="fecha-ingreso" class="form-control" placeholder="" required>
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="save-empleado"  data-toggle="popover" title="Agregar un nuevo usuario a la base de datos" data-content="And here's some amazing content. It's very engaging. Right?" class="btn btn-warning pull-right">Agregar Persona</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                  <div class="card-header card-header-danger">
                      <h4 class="card-title">Activar el envio de Correos manual</h4>
                      <p class="category"></p>
                  </div>
                  <div class="card-body">
                      <h4 class="">Envia un correo a todos los usuarios activos solo si alguien cumple a&ntilde;os hoy</h4>
                      <button onclick="return ConfirmEnvioMasivo()" class="btn btn-primary btn-round btn-sm">
                        <i class="material-icons">celebration</i> Enviar correos de cumplea&ntilde;os
                        </button>
                        </br>
                        <h4 class="">Envia un correo de bienvenida a todos los usuarios activos solo si hay alguien nuevo</h4>
                        <button onclick="return ConfirmEnvioBienvenida()" class="btn btn-primary btn-round btn-sm">
                        <i class="material-icons">emoji_people</i> Enviar correos de Bienvenida
                        </button>
                      </br>
                      </br>
                      </br>
                      </br>
                  </div>
                  <div class="card-header card-header-warning">
                      <h4 class="">cumplea&ntilde;os en los proximos 10 dias:</h4>
                      <p class="category"></p>
                  </div>
                  <div class="card-body">
            
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="font-size: 15px;">Nombre</th>
                                <th style="font-size: 15px;" class="text-right">Fecha de nacimiento</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                          $show_persona = "SELECT * 
FROM personas 
WHERE 
    (DATE_FORMAT(fecha_nacimiento,'%m %d') = DATE_FORMAT(CURDATE(),'%m %d') 
     OR TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) < TIMESTAMPDIFF(YEAR, fecha_nacimiento, ADDDATE(CURDATE(), 15))) 
    AND estado = 1 
ORDER BY date_format(fecha_nacimiento,'%m %d')";
                          $result_personas = mysqli_query($mysqli, $show_persona);
                          while ($row2 = mysqli_fetch_array($result_personas)) { ?>
                        <tr>
                            <td style="font-size: 15px;"><?php echo $row2['nombres']?></td>
                            <td style="font-size: 15px;" class="text-right"><?php echo $row2['fecha_nacimiento']?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                  </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title ">TABLA DE EMPLEADOS</h4>
                  <p class="card-category">Esta tabla muestra la lista de todos los Empleados Registrados en la Aplicacion. <br>Importante la aplicacion no elimina ningun usuario, solo lo inactiva. puede volver a activarlo en el menu de la derecha </p>
                </div>
                <div class="card-body">
                    <table border="0" cellspacing="5" cellpadding="5">
                        <tbody><tr>
                            <td class="bmd-label-floating">Fecha Desde:</td>
                            <td><input type="text" id="min" class="form-control" name="min"></td>
                        </tr>
                        <tr>
                            <td class="bmd-label-floating">Fecha Hasta:</td>
                            <td><input type="text" id="max" class="form-control" name="max"></td>
                        </tr>
                    </tbody>
            </table>
                  <div class="table-responsive" style="min-height: 400px">
                    <table class="table" id="data-usuarios">
                        
                      <thead class=" text-warning text-center">
                        <th>
                          #
                        </th>
                        <th>
                          Nombres
                        </th>
                        <th>
                          Fec.Nac
                        </th>
                        <th>
                          cargo:
                        </th>
                        <th>
                        Exten:
                        </th>
                        <th>
                          Correo:
                        </th>
                        <th>
                          Depto:
                        </th>
                        <th>
                          Fecha-ingreso:
                        </th>
                        <th>
                          Acciones
                        </th>
                      </thead>
                      <tbody>
                          <?php
                          $show_persona = "SELECT * FROM personas WHERE estado = 1 ORDER BY date_format( fecha_nacimiento,'%m %d' )";
                          $result_personas = mysqli_query($mysqli, $show_persona);
                          $contador=1;
                          while ($row = mysqli_fetch_array($result_personas)) { ?>
                            <tr>
                              <td class="text-center"><?php echo $contador++ ?></td>
                              <td class="text-center"><?php echo ($row['nombres'])?></td>
                              <td class="text-center" style="width: 88.4062px;"><?php echo $row['fecha_nacimiento']?></td>
                              <td class="text-center"><?php echo ($row['cargo'])?></td>
                              <td class="text-center"><?php echo $row['exten']?></td>
                              <td class="text-center"><?php echo $row['correo']?></td>
                              <td class="text-center"><?php echo ($row['departamento'])?></td>
                              <td class="text-center"><?php echo $row['fecha_ingreso']?></td>
                              <td class="text-center">
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">Acciones</button>
                                    
                                      <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php $_SERVER['DOCUMENT_ROOT']?>/Controllers/edit-empleado.php?id=<?php echo $row['id'] ?>">Editar usuario</a></li>
                                        <li><a  onclick="window.location.href='Controllers/subir-foto-perfil.php?id=<?php echo $row['id'] ?>'">Foto Perfil</a></li>
                                        <li><a href="<?php $_SERVER['DOCUMENT_ROOT']?>/Controllers/edit-empleado.php?id=<?php echo $row['id'] ?>">Cumplea&ntilde;o del empleado</a></li>
                                        <li><a id="delete1" href="Controllers/welcome-empleado.php?id=<?php echo $row['id'] ?>">Bienvenida de usuario</a></li>
                                        <li class="divider"></li>
                                        <li><a id="delete2" href="Controllers/goodbye-empleado.php?id=<?php echo $row['id'] ?>">Despedida de usuario</a></li>
                                        <li><a id="delete" onclick="return ConfirmDelete()" href="Controllers/delete-empleado.php?id=<?php echo $row['id'] ?>">Desactivar usuario</a></li>
                                        <li><a id="delete3" href="Controllers/form-template.php?id=<?php echo $row['id'] ?>">Formulario de usuario</a></li>
                                      </ul>
                                    </div>
                                <!--<a class="btn btn-info  btn-fab btn-fab-mini btn-round" href="<?php $_SERVER['DOCUMENT_ROOT']?>/Controllers/edit-empleado.php?id=<?php echo $row['id'] ?>">-->
                                <!--<i class="material-icons">edit</i>-->
                                <!--</a>-->
                                <!--<a id="delete" onclick="return ConfirmDelete()" class="btn btn-danger btn-fab btn-fab-mini btn-round"href="Controllers/delete-empleado.php?id=<?php echo $row['id'] ?>">-->
                                <!--<i class="material-icons">remove_moderator</i>-->
                                <!--</a>-->
                                <!--<a id="delete1" class="btn btn-warning btn-fab btn-fab-mini btn-round"href="Controllers/welcome-empleado.php?id=<?php echo $row['id'] ?>">-->
                                <!--<i class="material-icons">accessibility_new</i>-->
                                <!--<a id="delete2" class="btn btn-warning btn-fab btn-fab-mini btn-round"href="Controllers/goodbye-empleado.php?id=<?php echo $row['id'] ?>">-->
                                <!--<i class="material-icons">logout</i>-->
                                <!--</a>-->
                                <!--<a class="btn btn-warning btn-fab btn-fab-mini btn-round" onclick="window.location.href='Controllers/subir-foto-perfil.php?id=<?php echo $row['id'] ?>'" >-->
                                <!--<i class="material-icons">portrait</i>-->
                                <!--</a>-->
                              </td>
                          </tr>
                          <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div><!--fin de la tabla-->
      </div>
    </div>
</div>
<script type="text/javascript">
    
  function ConfirmDelete(){
    var respuesta = confirm("¿estas seguro que deseas inhabilitar el usuario? esto solo lo inhabilita mas no lo borra");
    if (respuesta == true) {
      return true;
    }else {
      return false;
    }
  }
function ConfirmEnvioMasivo(){
    var respuesta = confirm("¿estas seguro que deseas enviar el correo a todos los usuarios activos?");
    if (respuesta == true) {
      window.location.href="send_email_html.php";
    }else {
      return false;
    }
};
function ConfirmEnvioBienvenida(){
        var respuesta = confirm("¿estas seguro que deseas enviar un correo de bienvenida a todos los usuarios activos?");
        if (respuesta == true) {
           window.open("../../send-auto-email-welcome.php");
           window.open("../../send-auto-form-info-personal.php");
        }else {
          return false;
        }
           
        
}
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});

</script>
      <?php include($_SERVER['DOCUMENT_ROOT']."/Views/pages/footer.php")?>
    </div>
  </div><!--fin del wrapper-->
  <?php include($_SERVER['DOCUMENT_ROOT']."/Views/pages/customizer.php")?>