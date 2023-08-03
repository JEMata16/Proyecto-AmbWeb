<?php 
require_once "DAL/connect.php";

$conexion = Conecta();

try{
    $_GET['restauranteId'];
        $restaurante_id = mysqli_real_escape_string($conexion,$_GET['restauranteId']);
        $query = "SELECT * FROM opiniones WHERE restaurante_Id = $restaurante_id";
        $result = mysqli_query($conexion, $query);
        $opinions = mysqli_fetch_all($result, MYSQLI_ASSOC);

}catch(\Throwable $th){
    echo $th;
}finally {
    Desconecta($conexion);
}


function getUsername($opinion){

    $conexion = Conecta();
    $user_id = $opinion['idUsuario'];
    $query = "SELECT u.username FROM usuario u LEFT JOIN opiniones o ON u.idUsuario  = $user_id WHERE u.idUsuario  = $user_id";
    $result = mysqli_query($conexion, $query);
    $username = mysqli_fetch_assoc($result);
    echo $username['username'];
    Desconecta($conexion);
}
?>