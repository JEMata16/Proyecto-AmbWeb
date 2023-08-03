<?php

function Conecta() {
    $server = "localhost:3307";
    $user = "root";
    $password = "";
    $dataBase = "restaurante";
    $conexion = mysqli_connect($server, $user, $password, $dataBase);

    if(!$conexion){
        echo "Lo sentimos, ocurrió un error al establecer la conexión: " . mysqli_connect_error();
    }

    return $conexion;
}

function Desconecta($conexion) {
    mysqli_close($conexion);
}