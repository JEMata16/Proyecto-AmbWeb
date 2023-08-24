<?php 
require_once "DAL/connect.php";

$conexion = Conecta();

try{
    $sql = "SELECT * FROM opiniones";
    $resultado = mysqli_query($conexion, $sql);
    $opinions = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

}catch(\Throwable $th){
    echo $th;
}finally {
    Desconecta($conexion);
}


function getUsername($opinion){
    $conexion = Conecta();
    $user_id = $opinion['idUsuario'];
    $query = "SELECT u.username FROM usuario u LEFT JOIN opiniones o ON u.idUsuario = o.idUsuario WHERE u.idUsuario = $user_id";
    $result = mysqli_query($conexion, $query);
    
    if ($result) {
        $username = mysqli_fetch_assoc($result);
        echo $username['username']; // Imprime el nombre de usuario
    } else {
        echo "Error al consultar el nombre de usuario.";
    }
    
    Desconecta($conexion);
}

?>