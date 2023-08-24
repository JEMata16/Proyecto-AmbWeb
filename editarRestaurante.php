<?php require_once "./templates/head.php";
?>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">WhereToGo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>
    <?php
    require "DAL/conexion.php";
    $conexion = Conecta();

    $id = $_GET['id'];
    $bd = "SELECT * FROM restaurants WHERE id='$id'";
    $query = mysqli_query($conexion, $bd);
    $row = mysqli_fetch_array($query);
    ?>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Restaurante</h1>
        <form action="DAL/edit_restaurant.php" method="POST">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <div class="form-group">
                <label for="name">Nombre del Restaurante</label>
                <input type="text" class="form-control" name="name" value="<?= $row['name'] ?>">
            </div>
            <div class="form-group">
                <label for="calification">Calificación</label>
                <input type="number" class="form-control" name="calification" min="1" max="5" step="0.1" value="<?= $row['calification'] ?>">
            </div>
            <div class="form-group">
                <label for="food_type">Tipo de Comida</label>
                <input type="text" class="form-control" name="food_type" value="<?= $row['food_type'] ?>">
            </div>
            <div class="form-group">
                <label for="province_id">Provincia</label>
                <select class="form-control" name="province_id" value="<?= $row['province_id'] ?>">
                    <option value="1">San José</option>
                    <option value="2">Alajuela</option>
                    <option value="3">Cartago</option>
                    <option value="4">Heredia</option>
                    <option value="5">Guanacaste</option>
                    <option value="6">Puntarenas</option>
                    <option value="7">Limón</option>
                </select>
            </div>
            <div class="btn-editar">
                <input type="submit" class="btn-agregar" value="Confirmar cambio">
            </div>
        </form>
    </div>
</body>