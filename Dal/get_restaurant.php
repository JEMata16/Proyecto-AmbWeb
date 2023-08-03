<?php
require_once "connect.php";

try{
    $conexion = Conecta();
    if(isset($_GET['restauranteId'])) {
        

        $restaurante_id = mysqli_real_escape_string($conexion,$_GET['restauranteId']);

        // Los datos de acuerdo a los restaurantes
        $query = "SELECT * FROM restaurants WHERE id = $restaurante_id";
        $result = mysqli_query($conexion, $query);
        $restaurant = mysqli_fetch_assoc($result);

        
        // El nombre de la provincia de acuerdo a al restaurante
        $restaurant_province = $restaurant['province_id'];
        $query = "SELECT nombre FROM provincias WHERE id = $restaurant_province";
        $result = mysqli_query($conexion, $query);
        $province = mysqli_fetch_assoc($result);

    }else {
        echo "No se encontró el restaurante";
      }
}catch(\Throwable $th){
    echo $th;
}finally {
    Desconecta($conexion);
}
?>