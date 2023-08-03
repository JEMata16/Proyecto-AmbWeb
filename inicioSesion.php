<?php require_once "templates/head.php" ?>

<body class="body-login">
    <div class="container-login">
        <h3 class="titulo-login">Iniciar sesión</h3>
        <form action="login-registro/procesar-login.php" method="POST" class="formulario">
            <div class="login">
                <label for="correo">Correo electrónico</label>
            </div>
            <div class="login">
                <input type="text" id="correo" name="correo" required>
            </div>
            <div class="login">
                <label for="contra">Contraseña</label>
            </div>
            <div class="login">
                <input type="text" id="contra" name="contra" required>
            </div>
            <div class="btn-login">
                <button class="btn-agregar" type="submit">Iniciar Sesión</button>
            </div>
            <a href="registrarse.php" class="nav-link link-secondary">Registrarse</a>
        </form>
    </div>
</body>