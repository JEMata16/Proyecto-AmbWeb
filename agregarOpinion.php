<?php require_once "templates/header.php" ?>
<?php require_once "DAL/get_restaurant.php" ?>

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

    <div class="op-container">
        <aside>
            <div>
                <img src="<?php echo $imageSrc ?>" alt="">
                <section>
                    <h2 id="<?php echo $restaurant['id']; ?>"><?php echo $restaurant['name']; ?></h2>
                    <p class="">Calificación:
                        <?php echo $restaurant['calification']; ?>
                    </p>
                    <p><?php echo $province['nombre'] ?></p>
                    <div>
                        <h3>Comidas</h3>
                        <p><?php echo $restaurant['food_type']; ?></p>
                    </div>
                </section>
            </div>
        </aside>
        <?php
        if (isset($_GET['restauranteId'])) {
            $restaurantId = $_GET['restauranteId'];
        }
        ?>
        <section class="op-form-container" id="highestRanking">
            <form action="DAL/process-opinion.php" method="POST">
                <h2>Cuéntenos, ¿cuál fue su experiencia en el restaurante?</h2>
                <input type="hidden" name="restaurantId" value="<?php echo $restaurant['id']; ?>">
                <fieldset>
                    <legend>¿Cómo valora la experiencia?</legend>
                    <div class="ratingForm">
                        <input type="radio" id="star1-1" name="rating" value="1" />
                        <label for="star1-1"></label>
                        <input type="radio" id="star2-1" name="rating" value="2" />
                        <label for="star2-1"></label>
                        <input type="radio" id="star3-1" name="rating" value="3" />
                        <label for="star3-1"></label>
                        <input type="radio" id="star4-1" name="rating" value="4" />
                        <label for="star4-1"></label>
                        <input type="radio" id="star5-1" name="rating" value="5" />
                        <label for="star5-1"></label>
                    </div>
                </fieldset>
                <label for="opinion">Escriba su opinión (Opcional)</label>
                <textarea class="form-control" id="opinion" name="opinion" rows="4"></textarea>
                <div class="d-grid gap-2 col-4 mt-2 mx-auto">
                    <button type="submit" class="btn btn-outline-secondary rounded-pill">Agregar Opinión</button>
                </div>
            </form>
        </section>
    </div>


    <!-- FOOTER -->
    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>
            &copy; 2017-2020 Company, Inc. &middot; <a href="#">Privacy</a> &middot;
            <a href="#">Terms</a>
        </p>
    </footer>
</body>