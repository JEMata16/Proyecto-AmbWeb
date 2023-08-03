<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ;
} else {
    echo "Please log in first to see this page.";
}

require_once "templates/header.php";
?>

<main>
        <!-- Open Highest Ranking -->
        <section id="highestRanking">
            <h2 class="spacer-homePage">
                Los restaurantes con las calificaciones más altas
            </h2>
            <div class="spacer-homePage auto-flex">
                <div class="">
                    <img class="img-container" src="img/Carousel/jason-leung-poI7DelFiVA-unsplash.jpg" alt="" />
                    <h4>Nombre restaurante</h4>
                    <div class="rating">
                        <input type="radio" id="star1" name="rating" value="1" />
                        <label for="star1"></label>
                        <input type="radio" id="star2" name="rating" value="2" />
                        <label for="star2"></label>
                        <input type="radio" id="star3" name="rating" value="3" />
                        <label for="star3"></label>
                        <input type="radio" id="star4" name="rating" value="4" />
                        <label for="star4"></label>
                        <input type="radio" id="star5" name="rating" value="5" />
                        <label for="star5"></label>
                    </div>
                    <p id="localzRestaurante">Heredia, San Rafael</p>
                </div> <!--1 restaurant-->
                <div class="">
                    <img class="img-container" src="img/Carousel/jason-leung-poI7DelFiVA-unsplash.jpg" alt="" />
                    <h4>Nombre restaurante</h4>
                    <div class="rating">
                        <input type="radio" id="star1" name="rating" value="1" />
                        <label for="star1"></label>
                        <input type="radio" id="star2" name="rating" value="2" />
                        <label for="star2"></label>
                        <input type="radio" id="star3" name="rating" value="3" />
                        <label for="star3"></label>
                        <input type="radio" id="star4" name="rating" value="4" />
                        <label for="star4"></label>
                        <input type="radio" id="star5" name="rating" value="5" />
                        <label for="star5"></label>
                    </div>
                    <p id="localzRestaurante">San José, San Pedro</p>
                </div> <!--2 restaurant-->
            </div>
        </section>
        <?php
        require_once "DAL/connect.php";
        require_once "DAL/get_restaurants.php";
        ?>

        <section id="byProvince">
            <h2> Restaurantes en la provincia de <?php echo $province['nombre'] ?></h2>
            <div class="row">
                <?php foreach ($restaurants as $restaurant):
                    if (!empty($restaurant['image'])) {
                        $imageData = base64_encode($restaurant['image']);
                        $imageSrc = "data:image/jpeg;base64,$imageData";
                    } else {
                        $imageSrc = "img/default-image.jpg";
                    }
                    ?>
                    <div class="col-md-4 mb-4">
                        <div class="card" data-restaurant-id = "<?php echo $restaurant['id'] ?>">
                            <img class="card-img-top" src="<?php echo $imageSrc ?>"
                                alt="<?php echo $restaurant['name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $restaurant['name']; ?>
                                </h5>
                                <p class="card-text">Calificación:
                                    <?php echo $restaurant['calification']; ?>
                                </p>
                                <p class="card-text">Food Type:
                                    <?php echo $restaurant['food_type']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <script src="script.js"></script>
    </main>