<?php 
require_once "connect.php";
echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
echo '<div class="container mt-5">';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $opinion_id = $_POST["opinion_id"];
        $username = $_POST["username"];
        $user_id = $_POST["user_id"];
    
        // Include or require any necessary files here
        
        // Call the eliminarOpinion function with the collected data
        eliminarOpinion($opinion_id, $username, $user_id);
        
        // Redirect or provide any response as needed
        header("Location: ../homePage.php?"); // Redirect to another page after the operation
        exit();
    }
    
    
    
    
    function eliminarOpinion($idOpinion, $username, $idUsuario){
        
        session_start();
        $activeUserMail = $_SESSION['correo'];
        $conn = Conecta();
    
        $query = "SELECT correo FROM usuario WHERE idUsuario = $idUsuario";
        $result = mysqli_query($conn,$query);
        $bd_username = mysqli_fetch_assoc($result);
    
        if($bd_username['correo'] != $activeUserMail){
            echo '<div class="alert alert-success" role="alert">No puede borrar opiniones de otros usuarios.</div>';
        }else{
            $query = "DELETE FROM opiniones where id= $idOpinion";
            mysqli_execute_query($conn,$query);
        }
        Desconecta($conn);
    
    
    }
?>