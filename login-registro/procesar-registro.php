<?php
require_once '../DAL/conexion.php';
echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css%22%3E';
echo '<div class="container mt-5">';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $correo = $_POST["correo"];
  $contra = $_POST["contra"];

  $connection = Conecta();

  // Verificar la conexión
  if (!$connection) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
  }

  // Preparar la consulta para insertar al usuario en la base de datos
  $query = "INSERT INTO usuario (username, correo, contra) VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($connection, $query);

  // Vincular los parámetros con los valores reales
  mysqli_stmt_bind_param($stmt, "sss", $username, $correo, $contra);

  // Ejecutar la consulta
  if (mysqli_stmt_execute($stmt)) {
    echo '<div class="alert alert-success" role="alert">Usuario agregado exitosamente.</div>';
    header("refresh:2; url=../inicioSesion.php");
  } else {
    echo '<div class="alert alert-danger" role="alert">Error al agregar al usuario' . mysqli_error($connection) . '</div>';
    header("refresh:2; url=../registrarse.php");
  }

  // Cerrar la conexión
  mysqli_close($connection);
}
?>