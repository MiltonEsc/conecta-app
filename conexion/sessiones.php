<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location:http://autoemail.superbrix.com/index.php');
}

?>