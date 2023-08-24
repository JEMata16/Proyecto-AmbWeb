<?php require_once "templates/head.php";

?>

<body class="body-login">
    <div class="container-login">
        <div class="img-login">
            <img width="300px" src="img/wheretogo.png" alt="">
        </div>
        <h3 class="titulo-login">Iniciar sesión</h3>
        <?php
        require "DAL/conexion.php";
        require "login-registro/procesar-registro.php";
        ?>
        <form action="" method="POST" class="formulario">
            <div class="login">
                <label for="correo">Correo electrónico</label>
            </div>
            <div class="login">
                <input type="text" id="correo" name="correo" placeholder="Digite su correo electrónico">
                <i class="icon fa-solid fa-envelope fa-lg"></i>
            </div>
            <div class="login">
                <label for="contra">Contraseña</label>
            </div>
            <div class="login">
                <input type="password" id="contra" name="contra" placeholder="Digite su contraseña">
                <i class="icon fa-solid fa-lock fa-lg"></i>
            </div>
            <div class="btn-login">
                <input name="btn-ingreso" class="btn-agregar" type="submit" value="Iniciar Sesión">
            </div>
            <a href="registrarse.php" class="nav-link link-light">Registrarse</a>
        </form>
    </div>
</body>