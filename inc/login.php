<?php 
include("db.php");

//verifico lo que me mandaron en el post
if(isset($_POST['login'])){
    //guardo en variables lo que recibo por post
    $ciInput = $_POST['ci'];
    $passwordInput = $_POST['password'];

    if( !empty($ciInput) ||  !empty($passwordInput)){

        $query = "SELECT * from usuarios where ci = $ciInput limit 1";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)==0){
            echo "No hay nadie registrado con esa cédula de identidad, por favor regístrese.";
        }else if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $ci= $row['ci'];
            $password = $row['password'];

            if($password!=$passwordInput){
                echo "La contraseña es incorrecta";
            }else{
                $nombre= $row['nombre'];
                //hago el inicio de sesión
                $_SESSION['user']= $ci;
                //para cerrar sesión: unset($_SESSION['user']);
                header("Location: ../profile.php");
                echo "HOLA  $nombre !!!!!!! BIENVENID@";
            }
        }
    }
}

?>