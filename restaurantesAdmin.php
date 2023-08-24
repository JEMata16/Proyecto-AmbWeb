<?php
require_once "templates/head.php";
?>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">WhereToGo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                    <div class="form-group has-search d-flex">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control rounded-pill" placeholder="Buscar" />
                    </div>
                    <a href="inicioAdmin.php" class="nav-link link-secondary">Administración</a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <?php
        require_once "DAL/connect.php";
        require_once "DAL/get_rests_adm.php";
        ?>

        <section id="byProvince">
            <h2 class="spacer-homePage">Todos los restaurantes registrados</h2>
            <div class="row">
                <?php foreach ($restaurants as $restaurant) :
                    if (!empty($restaurant['image'])) {
                        $imageData = base64_encode($restaurant['image']);
                        $imageSrc = "data:image/jpeg;base64,$imageData";
                    } else {
                        $imageSrc = "img/default-image.jpg";
                    }
                ?>
                    <div class="col-md-4 mb-4">
                        <div class="card" data-restaurant-id="<?php echo $restaurant['id'] ?>">
                            <img class="card-img-top" src="<?php echo $imageSrc ?>" alt="<?php echo $restaurant['name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $restaurant['name']; ?>
                                </h5>
                                <p class="card-text">Calificación:
                                    <?php echo $restaurant['calification']; ?>
                                </p>
                                <p class="card-text">Tipo de comida:
                                    <?php echo $restaurant['food_type']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <script src="scriptAdmin.js"></script>
    </main>
</body>