<?php
session_start();
require_once "templates/header.php";
?>
<?php
require_once "DAL/connect.php";
require_once "DAL/get_restaurants.php";
usort($restaurants, function($a, $b) {
    return $b['calification'] - $a['calification'];
});
$topRestaurants = array_slice($restaurants, 0, 2);
?>
<main>
    <!-- Open Highest Ranking -->
    <section id="highestRanking">
            <h2 class="spacer-homePage">
                Los restaurantes con las calificaciones más altas
            </h2>
            <div class="row">
            <?php foreach ($topRestaurants as $restaurant):
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


    <section id="byProvince">
        <h2> Restaurantes en la provincia de
            <?php echo $province['nombre'] ?>
        </h2>
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
                    <div class="card" data-restaurant-id="<?php echo $restaurant['id'] ?>">
                        <img class="card-img-top" src="<?php echo $imageSrc ?>" alt="<?php echo $restaurant['name']; ?>">
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