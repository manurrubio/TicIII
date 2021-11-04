

<?php 

include("db.php");

//verifico lo que me mandaron en el post
if(isset($_POST['save'])){
    //guardo en variables lo que recibo por post
    $nombre = $_POST['nombre'];
    $materia = $_POST['materia'];
    $descripcion = $_POST['descripcion'];


    

    //en caso de que dos archivos tengan igual nombre, los guardo como nombre+ fecha
    if($_FILES['archivo']){
        $nombre_base = basename($_FILES['archivo']['name']);
        $nombre_final = date("d-m-y"). "-". date("H-i-s"). "-" . $nombre_base;
        $ruta = "apuntes/" . $nombre_final;
        
        //verifico que se movió el archivo
        // if($subirarchivo){
        //     $insertar = .....n pongo '$ruta'
        // }
    }

    $user= $_SESSION['user'];
    $query = "SELECT * from usuarios where ci = $user limit 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $ci_estudiante=$row['ci'];
    echo($ci_estudiante);
               
    //para verificar que tenga el dato suficiente/ que se haya guardado el archivo en la ruta indicada
    if(!empty($nombre) || !empty($materia) || !empty($descripcion) ||  !empty($descripcion) ||!empty($_FILES['apunte']) ){

            
            //tomo mi identificador --> ci   

        $INSERT = "INSERT INTO apuntes (ci_estudiante,nombre,materia,archivo,descripcion)values(?,?,?,?,?)";
    //defino un identificador para hacer funcionar las cosas

        $stmt = $conn->prepare($INSERT);
        $stmt ->bind_param("issss",$ci_estudiante,$nombre,$materia,$ruta,$descripcion);
        $stmt ->execute();
        //guardo mi archivo subido en la carpeta archivo
        $subirarchivo = move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
        //inicio la sesión del usuario registrado y lo mando al perfil, en un principio no hay user
        echo "APUNTE GUARDADO";
        header("Location: ../index.html");

        $stmt->close();
        
    }else{
        echo "todos los datos son obligatorios";
        die();
    }
    //redirecciona al index
    
}

?>