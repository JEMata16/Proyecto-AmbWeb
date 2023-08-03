<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    htmlspecialchars($_SESSION['correo']);
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