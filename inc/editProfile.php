<?php
include("db.php");
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $query= "SELECT * FROM usuarios WHERE ci = $user limit 1";
    $result= mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        $nombre= $row['nombre'];
        $apellido = $row['apellido'];
        $f_nac= $row['f_nac'];
        $carrera= $row['carrera'];
        $facultad = $row['facultad'];
        $foto_perfil= $row['foto_perfil'];
        $password=$row['password'];
        $password_validate= $password;
        $descripcion=$row['descripcion'];
    }

    if(isset($_POST['update'])){
        $user = $_SESSION['user'];
        $carrera= $_POST['carrera'];
        $foto_perfil= $_POST['foto_perfil'];
        $password=$_POST['password'];
        $password2=$_POST['password2'];
        $descripcion=$_POST['descripcion'];
        
        if($password2==$password_validate){
            if(isset($foto_perfil)){
                $query = "UPDATE usuarios set carrera= '$carrera', descripcion = '$descripcion', foto_perfil= '$foto_perfil', password= '$password' WHERE ci = $user";
            }else{
                $query = "UPDATE usuarios set carrera= '$carrera', descripcion = '$descripcion', password= '$password' WHERE ci = $user";

            }

            mysqli_query($conn, $query);

            
        }else{
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en" and dir="Itr">
    <head>
        <meta charset="utf-8">
        <title>Interactive Login Format</title>
        <!-- <link rel="stylesheet" href="css/resStyle.css"> -->
        <link rel="stylesheet" href="../css/loginStyle.css">
        <script src="login2.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">


    </head>
    <header>
        <h1 class="logo">
            Apuntes
        </h1>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../login.html">Iniciar Sesión</a></li>
            <li><a href="#">"    "</a></li>
        </ul>
        
    </header>
            

    <body>
        <form class="box" action="editProfile.php?ci=<?php echo $_GET['ci'];?>" method="POST" enctype="multipart/form-data">
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <h1>
                Editar perfil
            </h1>
            <input type="text" name="nombre" value="<?php echo $nombre;?>" id="name" readonly>
            <input type="text" name="apellido" value="<?php echo $apellido;?>" id="name" readonly>
            <input type="text" name="ci" value="<?php echo $user;?>" id="ci" readonly>
            <input type="date" name="f_nac" value="<?php echo $f_nac;?>" readonly>
            <select name="carrera" required>
                <option selected value="<?php echo $carrera;?>">
                <?php if($carrera=="ing_t"){
                    ?>Ingeniería Telematica <?php
                }else if($carrera== "ing_c"){
                    ?>Ingeniería Civil <?php
                }else if($carrera== "ing_ind"){
                    ?>Ingeniería Industrial <?php
                }else if($carrera== "ing_inf"){
                    ?>Ingeniería en Informática <?php
                }
                ?>    
                </option>
                <option value ="ing_t">Ingeniería Telematica</option>
                <option value ="ing_c">Ingeniería Civil</option>
                <option value ="ing_ind">Ingeniería Industrial</option>
                <option value ="ing_inf">Ingeniería en Informática</option>
            </select> 
            <select name="universidad" required>
                <option selected value ="$facultad">UM</option>
                <option value ="UM">UM</option>
            </select> 
            <!--ES EDITABLE, MODELAR EN BDD QUE PASA SI NO ELIGE CAMBIARLO!-->
            <input type="file" name="f_perfil" class="form_file">
            <input type="text" name="descripcion" value="<?php echo $descripcion;?>" id="descripcion">
            <input type="password" name="password" value="<?php echo $password;?>" id="password">
            <input type="password" name="password2" placeholder="Contraseña actual" id="repeat-password" required>
            
            
            <button type="btn btn-succes" name="update"> Actualizar perfil </button>
        </form>
    </body>
</html>