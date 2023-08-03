<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Directorio de restaurantes" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Home</title>

    <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/carousel/" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>

    <!-- Styles -->
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="homePage.html">WhereToGo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                    <div class="form-group has-search d-flex">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control rounded-pill" placeholder="Search" />
                    </div>
                    <a href="inicioSesion.html" class="nav-link link-secondary">Iniciar Sesion</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
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
    </main>

    <script src="script.js"></script>
</body>

</html>