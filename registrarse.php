<?php
require_once "templates/head.php";
?>

<body class="body-registro">
    <div class="container-registro">
        <div class="left-half"></div>
        <div class="right-half">
            
            <p>¿Ya tienes cuenta?<a href="inicioSesion.php" class="link-secondary"><strong> Iniciar sesión</strong></a></p>
            <h2>Registrarse</h2>
            <form action="login-registro/procesar-registro.php" method="POST" class="formulario">
                <label for="username">Nombre de usuario</label>
                <input type="text" id="username" name="username" required>
                <label for="correo">Correo electrónico</label>
                <input type="text" id="correo" name="correo">
                <label for="contra">Contraseña</label>
                <input type="text" id="contra" name="contra" required>
                <div class="btn-registro">
                    <button class="btn-agregar" type="submit">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</body>