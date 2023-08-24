<?php 

require_once "connect.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $rating = $_POST["rating"];
    $opinion = $_POST["opinion"];
    $restaurante_id = $_POST["restaurantId"];
    $idUsuario = null;
    //Get IdUsuario
    $correo = $_SESSION["correo"];
    $conn = Conecta();
    $query = "SELECT idUsuario FROM usuario WHERE correo = '$correo'";
    $result = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($result);
    $row = mysqli_stmt_get_result($result);
    $idUsuario = mysqli_fetch_assoc($row)["idUsuario"];

    // Insert opinion into the 'opiniones' table
    $sql = "INSERT INTO opiniones (restaurante_id, calification, opinion, idUsuario) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("idsi", $restaurante_id, $rating, $opinion, $idUsuario);
    
    if ($stmt->execute()) {
        // Opinion inserted successfully
        echo "Opinion added successfully!";
        header("Location: ../homePage.php?");
    } else {
        // Error occurred while inserting opinion
        echo "Error: " . $stmt->error;
    }
}



?>