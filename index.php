<?php include("inc/db.php")?>
<!DOCTYPE html>
<html lang= "es">
    <head>
        <meta charset="UTF-8">
        <meta name= "viewport" content="width=device-width, initial-scale=1.0">
        <title>Menú principal</title>
        <link rel="stylesheet" href="css/index.css">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,248;0,300;0,400;1,300;1,400&display=swap" rel="stylesheet">
    </head>
    <body>
        <header class="header" id="inicio">
            <img src="img/bx-menu.svg" alt="" class="menu">
             <nav class="menu-navegacion">
                 <a href="#inicio">Inicio</a>
                 <a href="#servicio">Servicio</a>
                 <a href="#galería">Galería</a>
                 <a href="#sobreNosotros">Sobre Nosotros</a>
                 <a href="#contacto">Contacto</a>
                 <?php 
                 if(!isset($_SESSION['user'])){
                     ?>
                     <a href="login.html">Iniciar Sesión</a>
                     <a href="register.html">Registrarse</a>
                     <?php 
                 }else{
                    ?>
                    <a href="profile.php">Mi perfil</a>
                    <a href="cerrarSesion.php">Cerrar Sesión</a>
                    <?php
                 }
                 ?>
                 
             </nav>
            <div class="contenedor head">
                <h1 class="titulo">Apointes</h1>
                <p class="copy">¡Bienevido! Accede a tus apuntes y a los de tus amigos de manera fácil y simple</p>
            </div>
        </header>
        <main>
            <section class="contenedor" id="servicio">
                <h2 class="subtitulo">Nuestro servicio</h2>
                <div class="contenedor-servicio">
                    <img src="img/Knowledge.svg" alt="">
                    <div class="checklist-servicio">
                        <div class="service">
                            <h3 class="n-service"><span class="number">1</span>Registrate</h3>
                            <p>En la barra de tareas de la esquina suprior izquierda ve a la opción registrar para poder emprender tu camino con nosotros!</p>
                        </div>
                        <div class="service">
                            <h3 class="n-service"><span class="number">2</span>Subí tus apuntes</h3>
                            <p>Compartí con tus compañeros todo el conocimiento que tengas y así recibirás lo mismo de su parte!</p>
                        </div>
                        <div class="service">
                            <h3 class="n-service"><span class="number">3</span>Estudiá</h3>
                            <p>Ahora , con tantos apuntes, no vas a poder parar de estudiar!</p>
                        </div>
                        <div class="service">
                            <h3 class="n-service"><span class="number">4</span>¡Recibite!</h3>
                            <p>No importa cuanto tiempo te lleve, la perseverancia y los apuntos son lo imortante!</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="gallery" id="galería">    
                <div class="contenedor">
                    <h2 class="subtitulo">Galería</h2>
                    <div class="contenedor-galeria">
                        <img src="img/teacher.jpeg" alt="" class="img-galeria">
                        <img src="img/university.jpg" alt="" class="img-galeria">
                        <img src="img/patio.jpeg" alt="" class="img-galeria">
                        <img src="img/yale.jpeg" alt="" class="img-galeria">
                        <img src="img/gorros.jpeg" alt="" class="img-galeria">
                        <img src="img/clase.jpeg" alt="" class="img-galeria">
                    </div>   
                </div>
            </section>
            <!--si aprieto mi imagen la abre-->
            <section class="imagen-light">
                <img src="img/bx-x.svg" alt="" class="close">
                <img src="img/adrien-olichon-z8XO8BfqpYc-unsplash.jpg" alt="" class="agregar-imagen">
            </section> 
            <section class="contenedor" id="sobreNosotros">
                <h2 class="subtitulo">Sobre nosotros:</h2>
                <section class="nosotros">
                    <div class="cont-nosotros">
                        <img src="img/nosotros.svg" alt="">
                        <h3 class="n-nosotros">Historia</h3>
                    </div>
                    <div class="cont-nosotros">
                        <img src="img/Fefo.jpeg" alt="">
                        <h3 class="n-nosotros">Federico Castiglioni</h3>
                    </div>
                    <div class="cont-nosotros">
                        <img src="img/manu.jpg" alt="">
                        <h3 class="n-nosotros">Manuela Rubio</h3>
                    </div>
                </section>
            </section>
        </main>
        <footer id="contacto">
            <div class="contenedor footer-content">
                <div class="contact-us">
                    <h2 class="brand">Los pibes</h2>
                    <p>no sabemos sana</p>
                </div>
                <div class="social-media">
                    <a href="https://twitter.com/ApuntesTiciii" class="social-media-icon">
                        <i class='bx bxl-twitter' ></i>
                    </a>
                    <a href="https://www.instagram.com/apuntestic3/" class="social-media-icon">
                        <i class='bx bxl-instagram-alt' ></i>
                    </a>
                    <a href="./" class="social-media-icon">
                        <i class='bx bxl-discord-alt' ></i>
                    </a>
                </div>
            </div>
            <div class="line"></div>
        </footer>
        
        <script src="js/menu.js"></script>
        <script src="js/lightbox.js"></script>
    </body>
</html>
