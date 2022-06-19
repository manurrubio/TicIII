<?php 

include("db.php");

//verifico lo que me mandaron en el post
if(isset($_POST['register'])){
    //guardo en variables lo que recibo por post
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $ci = $_POST['ci'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    //en caso de que dos archivos tengan igual nombre, los guardo como nombre+ fecha

    
    //para verificar que tenga el dato suficiente/ que se haya guardado el archivo en la ruta indicada
    if(!empty($nombre) || !empty($apellido) || !empty($ci) || !empty($password) || !empty($password2) ){
        if($password!=$password2){
            echo "Contraseñas diferentes";
        }else{    
            //tomo mi identificador --> ci   
            $SELECT = "SELECT ci from usuarios where ci = ? limit 1";
            $INSERT = "INSERT INTO usuarios (ci,nombre,apellido,password)values(?,?,?,?)";
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
                $stmt ->bind_param("isss",$ci,$nombre,$apellido,$password);
                $stmt ->execute();
  
               
                echo "REGISTRO COMPLETADO";
                header("Location: ../index.php");
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