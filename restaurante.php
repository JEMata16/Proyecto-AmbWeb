<?php session_start();
require_once "templates/header.php" ?>

<body>

    <?php
    require_once "DAL/get_restaurant.php";
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
            <section>
                <h2 id="<?php echo $restaurant['id'] ?>"><?php echo $restaurant['name']; ?></h2>
                <div class="rating" id="rating-restaurante">
                    <p class="">Calificación:
                        <?php echo $restaurant['calification']; ?>
                    </p>
                </div>
                <p>
                    <?php echo $province['nombre'] ?>
                </p>
                <div>
                    <h3>Comidas</h3>
                    <p class="">Tipo de comida:
                        <?php echo $restaurant['food_type']; ?>
                    </p>
                </div>
            </section>
        </div>

        <?php require_once "DAL/get_opinions.php"; ?>


        <section class="container" id="highestRanking">
            <h2>Opiniones</h2>
            <button class="btn-agregar"><a href="agregarOpinion.php?restauranteId=<?php echo $restaurant['id']; ?>"
                    style="color:white">Agregar opinión</a></button>
            <div>
                <?php foreach ($opinions as $opinion): ?>
                    <div class="op-usuario row">
                        <h5>
                            <?php getUsername($opinion) ?>

                        </h5>
                        <div class="ratingOpinion column" id="rating-cliente">
                            <form method="post" action="DAL/deleteOpinion.php">
                                <input type="hidden" name="opinion_id" value="<?php echo $opinion['id']; ?>">
                                <input type="hidden" name="username" value="<?php echo getUsername($opinion); ?>">
                                <input type="hidden" name="user_id" value="<?php echo $opinion['idUsuario']; ?>">
                                <button type="submit" class="fa fa-trash button m-2"></button>
                               
                            </form>
                            <p class="">Calificación:
                                    <?php echo $opinion['calification']; ?>
                            </p>
                        </div>
                    </div>
                    <p class="bg-light rounded-pill p-3">
                        <?php echo $opinion['opinion'] ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="container">
        <p class="float-right"><a href="#">Volver arriba</a></p>
        <p>
            &copy; 2017-2020 Company, Inc. &middot; <a href="#">Privacy</a> &middot;
            <a href="#">Terms</a>
        </p>
    </footer>

    <script src="script.js"></script>
</body>

</html>