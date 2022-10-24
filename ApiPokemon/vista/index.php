<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Api pokemon usuario</title>
        <link rel="stylesheet" href="../estilos_pokemon.css"> 
    </head>
    <?php
    ?>
    <div class="container">
        <div class="container-login">
            <div class="cont-imagenlogo">
                <img src="../img/pokebola.jfif" alt="Imagen pokebola"/>
            </div>
            <img src="../img/Login_sf.png" alt="Imagen login" id="imagenlogin">
            <h2>Iniciar sesion</h2>
            <div class="Container-form">
                <form name="form-login" method="POST" id="form-login" class="formulario">
                    <div class="group-label-input">
                        <input type="text" name="usuariologin" id="usuariologin" placeholder="Ingrese su usuario" class="input-form" autocomplete="off" pattern="[A-Za-z0-9_.-@]{1,25}" required>
                    </div>
                    <div class="group-label-input">
                        <input type="password" name="clavelogin" id="clavelogin" placeholder="Ingrese su contraseña" class="input-form" autocomplete="off" pattern="[A-Za-z0-9_-]{1,15}" required>
                    </div>
                    <p id="error-login" class="error-login" >Usuario y/o contraseña incorrectos<p>
                        <input type="submit" name="btnlogin" value="Iniciar Sesion" class="btn_form" id="btn-ingreso">
                        <input type="submit" name="btnregistrar" value="Registrarse" class="btn_form btn-registrarse" id="btn-registrarse">
                </form>
            </div>
        </div>
    </div>
    <script src="../js/ValidarLogin.js"></script>
</body>
</html>
