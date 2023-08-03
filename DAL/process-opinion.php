<?php 

require_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $rating = $_POST["rating"];
    $opinion = $_POST["opinion"];
    $restaurante_id = $_POST["restaurantId"]; 

    // Insert opinion into the 'opiniones' table
    $conn = Conecta();
    $sql = "INSERT INTO opiniones (restaurante_id, calification, opinion) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("idd", $restaurante_id, $rating, $opinion);
    
    if ($stmt->execute()) {
        // Opinion inserted successfully
        echo "Opinion added successfully!";
    } else {
        // Error occurred while inserting opinion
        echo "Error: " . $stmt->error;
    }
}



?>