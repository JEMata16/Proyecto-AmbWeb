<?php
require_once "connect.php";

try{
    $conexion = Conecta();
    if(isset($_GET['provinceId'])) {
        

        $province_id = mysqli_real_escape_string($conexion,$_GET['provinceId']);

        // Los datos de acuerdo a los restaurantes
        $query = "SELECT * FROM restaurants WHERE province_id = $province_id";
        $result = mysqli_query($conexion, $query);
        $restaurants = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // El nombre de la provincia de acuerdo a al restaurante
        $query = "SELECT nombre FROM provincias WHERE id = $province_id";
        $result = mysqli_query($conexion, $query);
        $province = mysqli_fetch_assoc($result);

    }else {
        $query = "SELECT * FROM restaurants";
        $result = mysqli_query($conexion, $query);
        $restaurants = mysqli_fetch_all($result, MYSQLI_ASSOC);
      }
}catch(\Throwable $th){

}finally {
    Desconecta($conexion);
}
?>