<?php include("inc/db.php")?>
<!DOCTYPE html>


<html lang="en" and dir="Itr">
    <head>
        <meta charset="utf-8">
        <title>Interactive Login Format</title>
        <!-- <link rel="stylesheet" href="css/resStyle.css"> -->
        <link rel="stylesheet" href="css/loginStyle.css">
        <script src="login2.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
</head>
    <header>
        <h1 class="logo">
            Crear comentario
        </h1>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="profile.php">Perfil</a></li>
            <li><a href="#">"    "</a></li>
        </ul>
    </header>

    <body>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        
        <form class="box" action="inc/comentario.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="comentario" placeholder="Comentario" id="comentario" required>
            
            <select name="amigo" required>
                <option selected hidden value="">Amigo</option>
                
                <?php 
                    $user=$_SESSION['user'];                    
                    $query1 = "SELECT * from usuarios where ci = $user limit 1";
                    $result1 = mysqli_query($conn, $query1);
                    $row1 = mysqli_fetch_array($result1);
                    $ci=$row1['ci'];
                    ?><option value ="user"><?php $ci?></option> <?php
                    $carrera= $row1['carrera']; 
                    
                    $query = "SELECT * from usuarios where carrera= '$carrera' and ci!='$user'";
                    $result = mysqli_query($conn, $query);
                    if($result){
                        
                        while($row = mysqli_fetch_array($result)){

                            ?><option value = "<?php echo $row['ci']?>"><?php echo $row['ci']?></option><?php
                        }
                    }
                ?>
            </select> 
            <input type="submit" name="enviar" value="Enviar" onclick="createComentario()">
        
            
        </form>   
        
    </body>
    
</html>