<?php include $_SERVER['DOCUMENT_ROOT']."/conexion/sessiones.php";?>
<?php include $_SERVER['DOCUMENT_ROOT']."/conexion/db.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/head.php";?>
<?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/sidebar.php";?>
<div class="main-panel ">
      <!-- Navbar -->
      <?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/navbar.php"?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title ">Tabla de Empleados Inactivos</h4>
                  <p class="card-category">Muestra una lista de todos los Empleados Inactivos del sistema, puede volver a activarlo dando clic en el boton naranja que aparece a la derecha del usuario</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="data-usuarios">
                        
                      <thead class=" text-warning text-center">
                        <th>
                          ID
                        </th>
                        <th>
                          Nombres
                        </th>
                        <th>
                          Fec.Nac
                        </th>
                        <th>
                          Cargo
                        </th>
                        <th>
                          Departamento
                        </th>
                        <th>
                        Exten
                        </th>
                        <th>
                          Correo
                        </th>
                        <th>
                          Acciones
                        </th>
                      </thead>
                      <tbody>
                          <?php
                          $show_persona = "SELECT * FROM personas WHERE estado = 0";
                          $result_personas = mysqli_query($mysqli, $show_persona);
                          while ($row = mysqli_fetch_array($result_personas)) { ?>
                            <tr>
                              <td class="text-center"><?= $row['id'] ?></td>
                              <td class="text-center"><?php echo utf8_encode($row['nombres'])?></td>
                              <td class="text-center"><?php echo $row['fecha_nacimiento']?></td>
                              <td class="text-center"><?php echo $row['cargo']?></td>
                              <td class="text-center"><?php echo $row['departamento']?></td>
                              <td class="text-center"><?php echo $row['exten']?></td>
                              <td class="text-center"><?php echo $row['correo']?></td>
                              <td class="text-center">
                                <a class="btn btn-warning  btn-fab btn-fab-mini btn-round" href="<?php $_SERVER['DOCUMENT_ROOT']?>/Controllers/activar-empleado.php?id=<?php echo $row['id'] ?>">
                                <i class="material-icons">visibility</i>
                                </a>
                                <a class="btn btn-danger btn-fab btn-fab-mini btn-round" href="<?php $_SERVER['DOCUMENT_ROOT']?>/Controllers/eliminar-empleado.php?id=<?php echo $row['id'] ?>">
                                <i class="material-icons">delete</i>
                                </a>
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
<?php include($_SERVER['DOCUMENT_ROOT']."/Views/pages/footer.php")?>
<?php include($_SERVER['DOCUMENT_ROOT']."/Views/pages/customizer.php")?>
