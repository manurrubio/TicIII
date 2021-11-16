<?php 

include("db.php");

//verifico lo que me mandaron en el post
if(isset($_POST['enviar'])){
    if (!$_SESSION['user']){
        header("Location: /TICIII/login.html");
        exit;
    }
    //guardo en variables lo que recibo por post
    $comentario = $_POST['comentario'];
    $amigo = $_POST['amigo'];

    $user= $_SESSION['user'];
    $query = "SELECT * from usuarios where ci = $user limit 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $ci_estudiante=$row['ci'];
    echo($ci_estudiante);
               
    //para verificar que tenga el dato suficiente/ que se haya guardado el archivo en la ruta indicada
    if(!empty($comentario) || !empty($amigo) ){

            
            //tomo mi identificador --> ci   

        $INSERT = "INSERT INTO muro (ci_muro,ci_comentario,comentario)values(?,?,?)";
    //defino un identificador para hacer funcionar las cosas

        $stmt = $conn->prepare($INSERT);
        $stmt ->bind_param("iis",$amigo,$user,$comentario);
        $stmt ->execute();
        echo "Comentario subido";
        header("Location: ../index.php");

        $stmt->close();
        
    }else{
        echo "No fue posible subir su comentario";
        die();
    }
    //redirecciona al index
    
}

?>