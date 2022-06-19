<?php include("inc/db.php")?>
<!DOCTYPE html>
<html lang= "es">
    <head>
        <meta charset="UTF-8">
        <meta name= "viewport" content="width=device-width, initial-scale=1.0">
        <title>Menú principal</title>
        <link rel="stylesheet" href="css/loginStyle.css">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,248;0,300;0,400;1,300;1,400&display=swap" rel="stylesheet">
    </head>
    <body>
       
           
             <div class="box">

                 <?php 
                 if(!isset($_SESSION['user'])){
                     ?>
                     <a style= "background-color: #4a9869da; color: white; padding: 15px 20px; border-radius:20px; " href="login.html">Iniciar Sesión</a>
                     <br>
                     <br>
                     <br>
                     <a style= "background-color:  #4a9869da; color: white; padding: 15px 20px; border-radius:20px; " href="register.html">Registrarse</a>
                     <?php 
                 }else{
                    ?>
                    
                    <a style= "background-color:  #4a9869da; color: white; padding: 15px 20px; border-radius:20px; " href="cerrarSesion.php">Cerrar Sesión</a>
                    <a style= "background-color:  #4a9869da; color: white; padding: 15px 20px; border-radius:20px; " href="profile.php">Perfil</a>
                    <?php
                 }
                 ?>
                 
             </div>
     


        
        <script src="js/menu.js"></script>
        <script src="js/lightbox.js"></script>
    </body>
</html>
