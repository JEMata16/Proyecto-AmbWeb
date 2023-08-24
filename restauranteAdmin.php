<?php require_once "templates/head.php";
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
                    <a href="#" class="nav-link link-secondary">Administración</a>
                </div>
            </div>
        </nav>
    </header>

    <?php
    require_once "DAL/get_rest_admin.php";
    if (!empty($restaurant['image'])) {
        $imageData = base64_encode($restaurant['image']);
        $imageSrc = "data:image/jpeg;base64,$imageData";
    } else {
        $imageSrc = "img/default-image.jpg";
    }
    ?>

    <main>
        <div class="info-restaurante">
            <img src="<?php echo $imageSrc ?>" alt="Imagen restaurante">
            <section class="spacer-homePage">
                <div class="iconos-rest pos-icon">
                    <a href="DAL/delete_restaurant.php?id=<?= $restaurant['id'] ?>"><i class="iconos-rest fa-solid fa-trash fa-lg"></i></a> |
                    <a href="editarRestaurante.php?id=<?= $restaurant['id'] ?>"><i class="iconos-rest fa-solid fa-pen-to-square fa-lg"></i></a>
                </div>
                <h2 id="<?php echo $restaurant['id'] ?>"><?php echo $restaurant['name']; ?></h2>
                <div class="rating" id="rating-restaurante">
                    <p class=""><strong>Calificación:</strong>
                        <?php echo $restaurant['calification']; ?>
                    </p>
                </div>
                <p><strong>Ubicación:</strong>
                    <?php echo $province['nombre'] ?>
                </p>
                <div>
                    <h3>Comidas</h3>
                    <p class=""><strong>Tipo de comida:</strong>
                        <?php echo $restaurant['food_type']; ?>
                    </p>
                </div>
            </section>
        </div>

        <?php require_once "DAL/opiniones_admin.php"; ?>


        <section class="container" id="highestRanking">
            <h2>Opiniones</h2>
            <div>
                <?php foreach ($opinions as $opinion) : ?>
                    <div class="op-usuario row">
                        <h5>
                            <?php getUsername($opinion) ?>
                        </h5>
                        <div class="ratingOpinion" id="rating-cliente">
                            <p class="">Calificación:
                                <?php echo $opinion['calification']; ?>
                            </p>
                        </div>
                    </div>
                    <p class="bg-light rounded-pill p-3"><?php echo $opinion['opinion'] ?><a href="DAL/borrarOp_Admin.php?id=<?= $opinion['id'] ?>"><i class="icon-delete fa-solid fa-trash"></i></a></p>
            </div>
        <?php endforeach; ?>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>
            &copy; 2017-2020 Company, Inc. &middot; <a href="#">Privacy</a> &middot;
            <a href="#">Terms</a>
        </p>
    </footer>

    <script src="scriptAdmin.js"></script>
</body>

</html>