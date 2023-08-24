<?php
require_once "templates/head.php";
?>

<body class="body-registro">
    <div class="container-registro">
        <div class="left-half"></div>
        <div class="right-half">
            
            <p>¿Ya tienes cuenta?<a href="inicioSesion.php" class="link-secondary link-inicio"><strong> Iniciar sesión</strong></a></p>
            <h2>Registrarse</h2>
            <?php
            require "DAL/conexion.php";
            require "login-registro/procesar-registro.php";
            ?>
            <form action="" method="POST" class="formulario">
                <label for="username">Nombre de usuario</label>
                <input type="text" id="username" name="username" required>
                <label for="correo">Correo electrónico</label>
                <input type="text" id="correo" name="correo">
                <label for="contra">Contraseña</label>
                <input type="text" id="contra" name="contra" required>
                <div class="btn-registro">
                    <input name="registro" class="btn-agregar" type="submit" value="Registrarse">
                </div>
            </form>
        </div>
    </div>
</body>