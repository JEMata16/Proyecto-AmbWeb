<?php
echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css%22%3E';
echo '<div class="container mt-5">';

require "conexion.php";
$conexion = Conecta();

$id=$_GET['id'];

$bd = "DELETE FROM restaurants WHERE id='$id'";
$query = mysqli_query($conexion, $bd);

if($query){
    echo '<div class="alert alert-success" role="alert">El restaurante se ha eliminado correctamente</div>';
    header("refresh:2; url=../restaurantesAdmin.php");
} else {
    echo '<div class="alert alert-danger" role="alert">Se produjo un error al eliminar el restaurante</div>';
    header("refresh:2; url=../restaurantesAdmin.php");
}