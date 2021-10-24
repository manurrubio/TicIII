<?php 

include("db.php");

//verifico lo que me mandaron en el post
if(isset($_POST['register'])){
    //guardo en variables lo que recibo por post
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $ci = $_POST['ci'];
    $f_nac = $_POST['f_nac'];
    $carrera = $_POST['carrera'];
    $universidad = $_POST['universidad'];
    $descripcion = $_POST['descripcion'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    //en caso de que dos archivos tengan igual nombre, los guardo como nombre+ fecha
    if($_FILES['f_perfil']){
        $nombre_base = basename($_FILES['f_perfil']['name']);
        $nombre_final = date("d-m-y"). "-". date("H-i-s"). "-" . $nombre_base;
        $ruta = "archivos/" . $nombre_final;
        
        //verifico que se movió el archivo
        // if($subirarchivo){
        //     $insertar = .....n pongo '$ruta'
        // }
    }
    
    //para verificar que tenga el dato suficiente/ que se haya guardado el archivo en la ruta indicada
    if(!empty($nombre) || !empty($apellido) || !empty($ci) || !empty($f_nac) || !empty($carrera) || !empty($universidad) || !empty($descripcion) || !empty($password) || !empty($password2) ){
        if($password!=$password2){
            echo "Contraseñas diferentes";
        }else{    
            //tomo mi identificador --> ci   
            $SELECT = "SELECT ci from usuarios where ci = ? limit 1";
            $INSERT = "INSERT INTO usuarios (ci,nombre,apellido,f_nac,carrera,facultad,foto_perfil,password,descripcion)values(?,?,?,?,?,?,?,?,?)";
            //defino un identificador para hacer funcionar las cosas
            $stmt = $conn->prepare($SELECT);
            $stmt ->bind_param("i", $ci);
            $stmt ->execute(); //se ejecuta sentencia en bdd
            $stmt ->bind_result($ci);
            $stmt ->store_result(); // transfiere el conjunto de resultados de la ultima consulta
            $rnum = $stmt->num_rows; // devuelve el numero de filas del select
            if($rnum == 0){ //si no hay nadie con el numero!!
                $stmt ->close();
                $stmt = $conn->prepare($INSERT);
                $stmt ->bind_param("issssssss",$ci,$nombre,$apellido,$f_nac,$carrera,$universidad,$ruta,$password,$descripcion);
                $stmt ->execute();
                //guardo mi archivo subido en la carpeta archivo
                $subirarchivo = move_uploaded_file($_FILES["f_perfil"]["tmp_name"], $ruta);
                //inicio la sesión del usuario registrado y lo mando al perfil, en un principio no hay user
                echo "REGISTRO COMPLETADO";
                header("Location: ../index.html");
            }else{
                echo "Ya alguien registrado con esa cédula de identidad";
            }
            $stmt->close();
        }
    }else{
        echo "todos los datos son obligatorios";
        die();
    }
    //redirecciona al index
    
}

?>