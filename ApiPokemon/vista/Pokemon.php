<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo "<script>alert('No tiene permiso para acceder a esta pagina')</script>";
    die();
} else {
    $usuario = $_SESSION['usuario'];
    $nombre = $_SESSION['nombreUsu'];
}
?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Api pokemon</title>
        <link rel="stylesheet" href="../estilos_pokemon.css"> 
    </head>    
    <body>
        <h1>Bienvenido(a) <?php echo " " . $nombre?></h1>
        <div class="container" id="cont_main">
            <div class="Container-grupo-poke" id="Container-grupo-poke">
            </div>
        </div>
        <div class="cont_unPokemon" id="cont_unPokemon">
            <button class="btn_atras" id="btnAtras">View all pokemons</button>
        </div>
        <script src="../js/Pokeapi.js"></script>
    </body>
</html>
