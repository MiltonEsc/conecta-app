<?php
session_start();
session_destroy();

$index = $_SERVER['DOCUMENT_ROOT']."../index.php";
header("Location: ../index.php");
exit();