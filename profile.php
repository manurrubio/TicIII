<?php include("inc/db.php")?>
<?php include("mod/header.php")?>


    <section class="banner">
       <br><br><br><br><br><br>
        <div class="container">
            <div class="main">
                <div class="row">
                            <!--selecciono el usuario de $_SESSION-->
                            <?php 
                            $_SESSION['comentario']=$_SESSION['user'];
                            $user= $_SESSION['user'];
                            $query = "SELECT * from usuarios where ci = $user limit 1";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_array($result);
                            
                            ?>
                    <div class="col-md-4 mt-1">
                        <div class="card text-center sidebar">
                            <div class="card-body">



                                
                                <div class="mt-3">
                                    <h3><?php echo $row['nombre']?> <?php echo $row['apellido']?></h3>
                                    <a href="index.php">Inicio</a>
                                   
                                    
                                    <a href="createApunte.html">Subir archivo</a>
                                    <a href="cerrarSesion.php">Cerrar Sesión</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 mt-1">
                        <div class="card mb-3 content">
                            <h1 class ="m-3 pt-3">About</h1>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Nombre</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        <?php echo $row['nombre']?> <?php echo $row['apellido']?>
                                    </div>
                                </div>
                             
                                

                        </div>
                        <div class="card mb-mb content">
                            <h1 class="m-3">Mis archivos</h1>
                            <div class ="card-body">
                            <?php 
                            $user= $_SESSION['user'];
                            $query = "SELECT * from apuntes where ci_estudiante = $user";
                            $result = mysqli_query($conn, $query);
                            if($result){
                                while($row = mysqli_fetch_array($result)){
                                    ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5><?php echo $row['nombre']?></h5>
                                    </div>
                                    <div class="col-md text-secondary">
                                    <?php echo $row['descripcion']?>
                                    </div>
                                    <div class="col-md text-secondary">
                                    <?php echo $row['materia']?>
                                    </div>
                                    <div class="col-md text-secondary">
                                    <?php 
                                $archivo= $row['archivo'];
                                $ruta = "inc/". $archivo ;
                                ?>
                                        <a href="<?php echo $ruta ?>">Abrir apunte</a>
                                    </div>

                                    </div>                            
                                    <?php
                                }
                            }
                            ?>
                            </div>   
                            
                        </div>
                        <div class="row">
                                    <div class="col-md-3">    </div>
                                </div>   <div class="row">
                                    <div class="col-md-3">    </div>
                                </div><div class="row">
                                    <div class="col-md-3">    </div>
                                </div><div class="row">
                                    <div class="col-md-3">    </div>
                                </div><div class="row">
                                    <div class="col-md-3">    </div>
                                </div><div class="row">
                                    <div class="col-md-3">    </div>
                                </div><div class="row">
                                    <div class="col-md-3">    </div>
                                </div><div class="row">
                                   


                    </div>
                </div>
            </div>
    </section>
    <script type="text/javascript">
    window.addEventListener("scroll",function(){
        var header=document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY >0);
    })</script>


</body>
</html>