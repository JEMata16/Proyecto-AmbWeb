<?php
// processRestaurant.php

require_once "connect.php";

echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
echo '<div class="container mt-5">';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $calification = $_POST["calification"];
  $food_type = $_POST["food_type"];
  $province_id = $_POST["province_id"];

  if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
    $image = file_get_contents($_FILES["image"]["tmp_name"]);
  } else {
    $image = null;
  }
  $connection = Conecta();

  // Verificar la conexión
  if (!$connection) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
  }

  // Preparar la consulta para insertar el restaurante en la base de datos
  $query = "INSERT INTO restaurants (name, calification, food_type, province_id, image) VALUES (?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($connection, $query);

  // Vincular los parámetros con los valores reales
  mysqli_stmt_bind_param($stmt, "sdsis", $name, $calification, $food_type, $province_id, $image);

  // Ejecutar la consulta
  if (mysqli_stmt_execute($stmt)) {
    echo '<div class="alert alert-success" role="alert">Restaurante agregado exitosamente.</div>';
    header("refresh:3; url=../inicioAdmin.php");
  } else {
    echo '<div class="alert alert-danger" role="alert">Error al agregar el restaurante: ' . mysqli_error($connection) . '</div>';
    header("refresh:3; url=../inicioAdmin.php");
  }

  // Cerrar la conexión
  mysqli_close($connection);
}

echo '</div>';
?>
