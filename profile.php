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
                            $carrera=$row['carrera'];
                            ?>
                    <div class="col-md-4 mt-1">
                        <div class="card text-center sidebar">
                            <div class="card-body">

                                <?php 
                                $foto= $row['foto_perfil'];
                                $ruta = "inc/". $foto ;
                                ?>

                                <img src="<?php echo $ruta ?>" class="rounded-circle" width="250"/>
                                <div class="mt-3">
                                    <h3><?php echo $row['nombre']?> <?php echo $row['apellido']?></h3>
                                    <a href="index.php">Inicio</a>
                                    <a href="inc/editProfile.php">Editar Perfil</a>
                                    <a href="">Support</a>
                                    <a href="createApunte.html">Crear Apunte</a>
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
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Fecha de nacimiento</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        <?php 
                                        $dt = new DateTime($row['f_nac']);
                                        echo $dt->format('d-m-Y');
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Carrera</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        <?php if($row['carrera']=="ing_ind"){
                                            $print= "Ingeniería Industrial - ".$row['facultad'];
                                            echo $print;
                                        }else if($row['carrera']=="ing_t"){
                                            $print= "Ingeniería Telemática - ".$row['facultad'];
                                            echo $print;
                                        }else if($row['carrera']=="ing_c"){
                                            $print= "Ingeniería Civil - ".$row['facultad'];
                                            echo $print;
                                        }else if($row['carrera']=="ing_inf"){
                                            $print= "Ingeniería Informatica - ".$row['facultad'];
                                            echo $print;
                                        }
                                                               
                                        ?>
                                        
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Descripcion</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        <?php echo $row['descripcion']?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card mb-mb content">
                            <h1 class="m-3">Mis apuntes</h1>
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
                                    <div class="col-md-3">    </div>
                                </div>       <div class="row">
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
                                    <div class="col-md-3">    </div>
                                </div>       

                        <div class="card mb-mb content">
                            <h1 class="m-3">Mis amigos</h1>
                            <div class ="card-body">
                            <?php 
                            $user= $_SESSION['user'];

                            $query1 = "SELECT * from usuarios where ci = $user limit 1";
                            $result1 = mysqli_query($conn, $query1);
                            $row1 = mysqli_fetch_array($result1);
                            $carrera= $row1['carrera']; 
                            $query = "SELECT * from usuarios where carrera= '$carrera' and ci!='$user'";
                            $result = mysqli_query($conn, $query);
                            if($result){
                                while($row = mysqli_fetch_array($result)){
                                    ?>
                                <div class="row">
                                    <div class="col-md-3">
                                    <?php 
                                        $foto= $row['foto_perfil'];
                                        $c_amig=$row['ci'];
                                        $ruta = "inc/". $foto ;
                                    ?>
                                         <img src="<?php echo $ruta ?>" class="rounded-circle friend-pic" width="100"/>
                                    </div>
                                    <div class="col-md-3">
                                        <h5><?php echo $row['nombre']?> <?php echo $row['apellido']?></h5>
                                    </div>
                                    <div class="col-md text-secondary">
                                        <?php echo $row['descripcion']?>
                                    </div>
                                    <div class="col-md text-secondary">
                                        ci: <?php echo $row['ci']?>
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
                                        <div class="col-md-3">    </div>
                                </div>                     
                                    <?php
                                }
                            }
                            ?>
                            </div>   
                            
                        </div>
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