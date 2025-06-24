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
        
        <style>
		/*TIPOGRAFÍAS*/
		@import url('https://fonts.googleapis.com/css?family=Noto+Sans');
		/*INICIALIZACIÓN DE ESTILOS*/
		*{
			margin:0;
			padding:0;
			box-sizing:border-box;
		}

		body{background-color:#f6f6f6;}

		/*PERSONALIZACIÓN DE P.MANTENIMIENTO*/
		.mantenimiento{
			width:600px;
			height:400px;
			padding:32px;
			border:1px solid #000;
			border-radius:10px;
			margin-top:-200px;
			margin-left:-300px;
			background-color:#fff;
			position:fixed;
			top:50%;
			left:50%;
		}
		.mantenimiento h1, .mantenimiento h2, .mantenimiento p{
			font-family:"noto sans", sans-serif;
		}

		.mantenimiento h1{
			font-size:3em;
			text-align:center;
			padding:16px;
		}
		.mantenimiento h2{
			font-size:2em;
			font-style:italic;
		}
		.mantenimiento p{
			margin:16px 0;
			line-height:1.5em;
		}

	</style>
        
        <div class="mantenimiento">
		<h1>Página web en construcción</h1>
		<p>Lo sentimos, no hemos encontrado un mensaje más original para decirte que estamos trabajando en ello.</p>
		<h2>Web disponible en muy pronto</h2>
	</div>
        </div>
    </div>
<?php include($_SERVER['DOCUMENT_ROOT']."/Views/pages/footer.php")?>
  </div>
</div><!--fin del wrapper-->
<?php include($_SERVER['DOCUMENT_ROOT']."/Views/pages/customizer.php")?>