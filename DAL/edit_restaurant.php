<?php
echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css%22%3E';
echo '<div class="container mt-5">';

require "conexion.php";
$conexion = Conecta();

$id=$_POST['id'];
$name=$_POST['name'];
$calification=$_POST['calification'];
$province_id=$_POST['province_id'];
$food_type=$_POST['food_type'];

$bd = "UPDATE restaurants SET name='$name', calification='$calification', province_id='$province_id', food_type='$food_type' WHERE id='$id'";
$query = mysqli_query($conexion, $bd);

if($query){
    echo '<div class="alert alert-success" role="alert">El cambio se ha ejecutado correctamente</div>';
    header("refresh:2; url=../restaurantesAdmin.php");
} else {
    echo '<div class="alert alert-danger" role="alert">Se produjo un error al realizar el cambio</div>';
    header("refresh:2; url=../restaurantesAdmin.php");
}

?>