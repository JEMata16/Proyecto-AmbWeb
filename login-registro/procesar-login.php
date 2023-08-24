<?php

require_once './funciones.php';
require_once '../DAL/conexion.php';

?>

<?php
$conexion = Conecta();

$correo = recogePost("correo");
$contra = $_POST["contra"];

$correoOk = false;
$contra = false;

$errores = []; 
echo $correo;
if ($correo === ""){
    $errores[] = "Lo sentimos, no indicó un correo electrónico válido";
} else {
    $correoOk = true;
}
echo $contra;
echo $_POST["contra"];
if ($contra === ""){
    $errores[] = "Lo sentimos, no indicó una contraseña válida";
} else {
    $contraOk = true;
}

session_start();
$resultado = $conexion->query("SELECT idUsuario from usuario where correo = '$correo' and contra = '$contra'");

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    $_SESSION["correo"] = $correo;
    header("Location: ../homePage.php?idUsuario=$correo");
    exit;
}

if ($correoOk && $contraOk && $_SERVER["REQUEST_METHOD"] === "POST"){
    $correo = $_POST["correo"];
    $contra = $_POST["contra"];

    $resultado = $conexion->query("SELECT idUsuario from usuario where correo = '$correo' and contra = '$contra'");
    $usuario = $conexion->query("SELECT username from usuario where correo = '$correo' and contra = '$contra'");

    if ($resultado->num_rows === 1) {
        $_SESSION["loggedin"] = true;
        $_SESSION["correo"] = $correo;
        header("Location: ../homePage.php");
        exit;
    } else {
        echo "Lo sentimos, el correo o contraseña digitados son incorrectos";
    }
}
?>