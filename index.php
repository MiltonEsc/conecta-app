<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link  rel="icon"   href="Views/assets/img/favicon.png" type="image/png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARTELERA DE NOVEDADES PERSONAL | Superbrix</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="<?php $_SERVER['DOCUMENT_ROOT'];?>/Views/assets/css/login-styles.css" rel="stylesheet" />
</head>
<body style="overflow-y:hidden; width:100%;">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">

      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="Views/assets/img/undraw_Team_spirit_re_yl1v.svg" class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <div class="text-center" style="margin-botton: 30px;">
            <h4>SUPERBRIX - CARTELERA DE NOVEDADES PERSONAL</h4>
        </div>
        
        <?php if ($_GET['m1'] == 'err'){ ?> 
            <div class="alert alert-danger">
              <strong>Error!</strong> usuario o clave invalida.
            </div>
        <?php }else if($_GET['m1'] == 'ok') { ?>
            <div class="alert alert-success">
              <strong>Bienvenido!</strong> Usuario y clave correctos.
            </div>
        <?php } ?>
        
        <form method="POST" action="Controllers/validar-login.php">
          <!-- Email input -->
          <div class="form-outline">
            <input type="text" name="usuario" id="floatingInput" class="form-control form-control-lg" />
            <label class="form-label" for="form1Example13">Usuario</label>
          </div>

          <!-- Password input -->
          <div class="form-outline">
            <input type="password" name="password" id="floatingPassword" class="form-control form-control-lg" />
            <label class="form-label" for="form1Example23">Contraseña</label>
          </div>
          <!-- Submit button -->
          <button type="submit" name="enviar" class="btn btn-primary btn-lg btn-block">Iniciar Sesion</button>
        </form>
      </div>
    </div>
  </div>
  
  <footer class="text-center text-white fixed-bottom" style="background-color: #FF5500;">
  <!-- Grid container -->
  <div class="container p-4"></div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: #2F2E41;">
    2022 Copyright:
    <a class="text-white" href="https://superbrix.com/">SuperBrix SA</a>
  </div>
  <!-- Copyright -->
</footer>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    
    
</script>
</body>
</html>