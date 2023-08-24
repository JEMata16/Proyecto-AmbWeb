<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    htmlspecialchars($_SESSION['correo']);
} else {
    echo "Please log in first to see this page.";
}

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
                            <p class="card-text">Food Type:
                                <?php echo $restaurant['food_type']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        </section>
        
        <!-- Close Highest Ranking -->
        <section id="byProvince">
            <h2 class="spacer-homePage">Restaurantes registrados por provincia</h2>
            <div class="reel ml-2">
            <div class="province" data-province-id="1">
                    <img class="img-container" src="img/HomePage/Provincias/san-jose.jpg" alt="San José" />
                    <h4>San José</h4>
                </div>
                <div class="province" data-province-id="2">
                    <img class="img-container" src="img/HomePage/Provincias/alajuela.jpg" alt="Alajuela" />
                    <h4>Alajuela</h4>
                </div>
                <div class="province" data-province-id="4">
                    <img class="img-container" src="img/HomePage/Provincias/heredia.jpg" alt="Heredia" />
                    <h4>Heredia</h4>
                </div>
                <div class="province" data-province-id="3">
                    <img class="img-container" src="img/HomePage/Provincias/cartago.jpg" alt="Cartago" />
                    <h4>Cartago</h4>
                </div>
                <div class="province" data-province-id="6">
                    <img class="img-container" src="img/HomePage/Provincias/puntarenas.jpg" alt="Puntarenas" />
                    <h4>Puntarenas</h4>
                </div>
                <div class="province" data-province-id="5">
                    <img class="img-container" src="img/HomePage/Provincias/guanacaste.webp" alt="Guanacaste" />
                    <h4>Guanacaste</h4>
                </div>
                <div class="province" data-province-id="7">
                    <img class="img-container" src="img/HomePage/Provincias/limon.jpg" alt="Limón" />
                    <h4>Limón</h4>
                </div>

            </div>
        </section>
    </main>
    <script src="script.js"></script>
</body>
</html>