<?php 

session_start();

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ticiii";
//genero la conexion a la bdd
$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
//verifico si hay una conexión fiel o no
if(mysqli_connect_error()){
    die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
//compruebo conexion
/*if(isset($conn)){
    echo 'DB is connected';
}*/
?>
