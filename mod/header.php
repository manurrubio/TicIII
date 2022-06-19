

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perfil sticky</title>
    <link rel="stylesheet" href="css/profileStyle.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-4.0.0-dist/css/bootstrap.min.css">
</head>


<header>
        <a href="index.php" class="logo">BIX</a>
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./AllApuntes.php">Archivos</a></li>
            <li><a href="./createApunte.html">Subir archivo</a></li>
            <li><a href="./profile.php">Mi Perfil</a></li>
            <li><a href="./cerrarSesion.php">Cerrar Sesión</a></li>

        </ul>
    </header>
    <body>
    <script type="text/javascript">
    window.addEventListener("scroll",function(){
        var header=document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY >0);
    })</script>
