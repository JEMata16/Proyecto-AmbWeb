<?php

echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css%22%3E';
echo '<div class="container mt-5">';

$conexion = Conecta();

if(!empty($_POST["registro"])){
  if(empty($_POST["username"]) or empty($_POST["correo"]) or empty($_POST["contra"])){
    echo '<div class="alert alert-danger">Estimado usuario, debe completar todos los campos que se le muestran</div>';
  } else {
    $username=$_POST["username"];
    $correo=$_POST["correo"];
    $contra=$_POST["contra"];
    $contra=password_hash($contra, PASSWORD_DEFAULT);
    $bd=$conexion->query("INSERT into usuario(username, correo, contra) values ('$username','$correo','$contra')");

    if($bd==1){
      echo '<div class="alert alert-success">Usuario agregado exitosamente. Ya puede iniciar su sesión</div>';
      header("refresh:3; url=./inicioSesion.php");
    } else{
      echo '<div class="alert alert-danger">Estimado usuario, se produjo un error al realizar el registro</div>';
    }
  } 
}

if (!empty($_POST["btn-ingreso"])) {
  if (empty($_POST["correo"]) or empty($_POST["contra"])) {
      echo '<div class="alert alert-danger">Estimado usuario, debe completar todos los campos que se le muestran</div>';
  } else {
      $correo = $_POST["correo"];
      $contra = $_POST["contra"];
      $bd = "SELECT * FROM usuario where correo='$correo'";
      $resultado = mysqli_query($conexion, $bd);
      session_start();
      $_SESSION["correo"]=$correo;

      if (mysqli_num_rows($resultado) > 0) {
          while ($columna = mysqli_fetch_array($resultado)) {
              if (password_verify($contra, $columna['contra']) && $columna['idCargo'] != 2 || $columna['idCargo'] != null) {
                  header("location: ./inicioAdmin.php");
              } elseif (password_verify($contra, $columna['contra']) && $columna['idCargo'] == 2 || $columna['idCargo'] == null) {
                  header("location: ./homePage.php");
              } else {
                  echo '<div class="alert alert-danger">Estimado usuario, los datos digitados no corresponden a ninguna persona registrada</div>';
              }
          }
      } else {
          echo '<div class="alert alert-danger">Estimado usuario, se produjo un error al realizar el inicio de sesión</div>';
      }
  }
}
?>