<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Api pokemon registrar</title>
        <link rel="stylesheet" href="../estilos_pokemon.css"> 
    </head>
    <?php
    ?>
    <div class="container">
        <div class="container-login">
            <div class="cont-imagenlogo">
                <img src="../img/pokebola.jfif" alt="Imagen pokebola"/>
            </div>
            <h2>Registrarse</h2>
            <div class="Container-form">
                <form name="form-registro" method="POST" id="form-registro" class="formulario">
                    <div class="group-label-input">
                        <input type="text" name="nombreusuario" id="nombreusuario" placeholder="Ingrese su nombre" class="input-form" autocomplete="off" pattern="[A-Za-z0-9_.-@]{1,25}" required>
                    </div>
                    <div class="group-label-input">
                        <input type="text" name="usuario" id="usuario" placeholder="Ingrese su usuario" class="input-form" autocomplete="off" pattern="[A-Za-z0-9_.-@]{1,25}" required>
                    </div>
                    <div class="group-label-input">
                        <input type="password" name="clave" id="clave" placeholder="Ingrese su contraseña" class="input-form" autocomplete="off" pattern="[A-Za-z0-9_-]{1,15}" required>
                    </div>
                    <p id="error-Usuario-regis" class="error-login" >Usuario Existente<p>
                        <input type="submit" name="btnRegistrarUsu" value="registrarse" class="btn_form" id="btn-registro">
                </form>
            </div>
        </div>
    </div>
    <script src="../js/ValidarFormRegistro.js"></script>
</body>
</html>
