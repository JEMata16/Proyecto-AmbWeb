<?php require_once "./templates/head.php";

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
                    <a href="inicioSesion.php" class="nav-link link-secondary">Administración</a>
                </div>
            </div>
        </nav>
    </header>

    <main>

    <?php
        require_once "DAL/connect.php";
        require_once "DAL/get_rests_adm.php";
        ?>
        <section id="highestRanking">
            <h2 class="spacer-homePage">
                Restaurantes
            </h2><a class="btn-plus" href="agregarRestaurante.php"><i class="fa-solid fa-circle-plus fa-lg"></i></a>
            <a href="restaurantesAdmin.php" class="spacer-homePage">Ver todos</a>
            <div class="spacer-homePage auto-flex">
                
        </section>
        <section id="highestRanking">
            <div class="Opiniones">
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
                            <p class="bg-light rounded-pill p-3"><?php echo $opinion['opinion'] ?> <a href="DAL/borrarOp_Admin.php?id=<?= $opinion['id'] ?>"><i class="icon-delete fa-solid fa-trash"></i></a></p>
                    </div>
                <?php endforeach; ?>
                </section>
            </div>
        </section>

    </main>
    <script src="script.js"></script>
</body>

</html>