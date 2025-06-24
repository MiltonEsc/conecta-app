<?php include $_SERVER['DOCUMENT_ROOT']."/conexion/sessiones.php";?>
<nav class="navbar navbar-expand-lg navbar-absolute fixed-top">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="<?php $_SERVER['DOCUMENT_ROOT'];?>index.php">INICIO</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        <h4 style="margin: 0;"><?php echo $_SESSION['nombres']?></h4>
        <ul class="navbar-nav">      
          <li class="nav-item dropdown">
            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons md-36">person</i>
              <p class="d-lg-none d-md-block">
                CUENTA DE USUARIO
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
              <a class="dropdown-item" href="#">Perfil</a>
              <a class="dropdown-item" href="#">Configuracion</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../../Controllers/cerrar-session.php">Cerrar Sesion</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
</nav>