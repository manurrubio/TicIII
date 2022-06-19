<?php 

session_start();

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "tic3";
//genero la conexion a la bdd
$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
//$conn = mysqli_connect("localhost:3308" , "root" , "", "database_name");
//verifico si hay una conexión fiel o no
if(mysqli_connect_error()){
    die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
//compruebo conexion
/*if(isset($conn)){
    echo 'DB is connected';
}*/
?>
