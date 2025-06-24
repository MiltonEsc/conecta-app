<?php
ob_start()
?>
<?php include $_SERVER['DOCUMENT_ROOT']."/conexion/db.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/head.php";?>
<!--<head>-->
<?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/sidebar.php";?>
<div class="main-panel ">
<!-- Navbar -->
<?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/navbar.php"?>
<!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <?php foreach (glob("Archivos/*.png") as $filename) : ?>
                <div class="col-md-4">
                    <div class="card-body">
                        <img height="400" width="400" src="<?php echo $filename ?>" alt="">
                    </div>
                </div>
                <?php endforeach; ?>  
            </div>
        </div>
<?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/footer.php"?>
    </div>
</div>
<!--fin del wrapper-->
<?php include $_SERVER['DOCUMENT_ROOT']."/Views/pages/customizer.php"?>