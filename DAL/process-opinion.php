<?php 

require_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $rating = $_POST["rating"];
    $opinion = $_POST["opinion"];
    $restaurante_id = $_POST["restaurantId"]; 
    $idUsuario = 1;
    // Insert opinion into the 'opiniones' table
    $conn = Conecta();
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