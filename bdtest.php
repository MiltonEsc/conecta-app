<?php
    include 'conexion/db.php';
    
    $showtables= mysqli_query($mysqli, "show tables");
     while($table = mysqli_fetch_array($showtables)) { 
      echo($table[0] . "<br>");  
     }
     

$results = mysqli_query($mysqli,'SHOW COLUMNS FROM personas FROM cmwhcnhg_cumpleanos;');

while($row = mysqli_fetch_array($results)) {
	print_r($row);
	echo '<br />';
}