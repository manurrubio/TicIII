<?php include("inc/db.php")?>
<?php include("mod/header.php")?>

<?php unset($_SESSION['user']);?>

<h1>sesion cerrada</h1>
<a href="index.php">ir a menu</a>
<?php header("Location: index.php");
//SE CIERRA SESIÓN, NO ES UNA PANTALLA QUE SE VEA
?>

