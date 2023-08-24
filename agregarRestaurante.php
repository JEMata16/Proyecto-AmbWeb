<?php require_once "./templates/head.php";
?>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">WhereToGo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <h1 class="mb-4">Agregar Restaurante</h1>
        <form action="DAL/add_restaurant.php" method="post" enctype="multipart/form-data" class="">
            <div class="form-group">
                <label for="name">Nombre del Restaurante</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="calification">Calificación</label>
                <input type="number" class="form-control" name="calification" min="1" max="5" step="0.1" required>
            </div>
            <div class="form-group">
                <label for="food_type">Tipo de Comida</label>
                <input type="text" class="form-control" name="food_type" required>
            </div>
            <div class="form-group">
                <label for="province_id">Provincia</label>
                <select class="form-control" name="province_id" required>
                    <option value="1">San José</option>
                    <option value="2">Alajuela</option>
                    <option value="3">Cartago</option>
                    <option value="4">Heredia</option>
                    <option value="5">Guanacaste</option>
                    <option value="6">Puntarenas</option>
                    <option value="7">Limón</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label class="form-label" for="image">Imagen</label>
                <input type="file" class="form-control" name="image" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Agregar Restaurante</button>
        </form>
    </div>
</body>