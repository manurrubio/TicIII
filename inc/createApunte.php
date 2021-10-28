<?php include("inc/db.php")?>
<?php

        $nombre = $_POST['nombre'];
        $materia = $_POST['materia'];
        $descripcion = $_POST['descripcion'];
        $apunte = $_POST['apunte'];
       
        $user= $_SESSION['user'];
        $query = "SELECT * from usuarios where ci = $user limit 1";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        
        
    
    
?>