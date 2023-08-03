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
                    <p class="">Food Type:
                        <?php echo $restaurant['food_type']; ?>
                    </p>
                </div>
            </section>
        </div>

        <?php require_once "DAL/get_opinions.php"; ?>


        <section class="container" id="highestRanking">
            <h2>Opiniones</h2>
            <button class="btn-agregar"><a href="agregarOpCliente.html" style="color:white">Agregar opinión</a></button>
            <div>
                <?php foreach ($opinions as $opinion): ?>
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
                    <p class="bg-light rounded-pill p-3"><?php echo $opinion['opinion'] ?></p>
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
</body>

</html>