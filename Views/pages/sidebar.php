<div class="wrapper ">
    <div class="sidebar" data-color="orange" data-background-color="black" data-image="azure">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="<?php $_SERVER['DOCUMENT_ROOT'];?>/home.php" class="simple-text logo-normal">
          SuperBrix S.A
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/home.php">
              <i class="material-icons">dashboard</i>
              <p>INICIO</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/Controllers/template_model.php">
              <i class="material-icons">person</i>
              <p>PLANTILLAS</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/Controllers/galeria.php">
              <i class="material-icons">camera</i>
              <p>FOTOS DE PERFIL</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/Controllers/usuarios_inactivos.php">
              <i class="material-icons">visibility</i>
              <p>USUARIOS INACTIVOS</p>
            </a>
          </li>
          <li class="nav-item" style="display: none;">
            <a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/send_email_html.php">
              <i class="material-icons">language</i>
              <p>ENVIAR CORREO</p>
            </a>
          </li>
         <li class="nav-item active-pro active">
            <a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT'];?>bdtest.php">
              <i class="material-icons">email</i>
              <p>ENVIAR CORREO</p>
            </a>
          </li>
          <!--<li class="nav-item active-pro ">
            <a class="nav-link" href="#">
              <img src="<?php $_SERVER['DOCUMENT_ROOT']?>/Views/img/tic.png" style="height: 60px; wight: 60px">
            </a>
          </li>-->
        </ul>
     </div>
</div>