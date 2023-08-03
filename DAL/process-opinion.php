<?php 

require_once "DAL/connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $rating = $_POST["rating"];
    $opinion = $_POST["opinion"];
    $restaurante_id = $_POST["restaurante_id"]; // Assuming you have a hidden input with restaurante_id

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