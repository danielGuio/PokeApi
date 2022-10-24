<?php

require_once '../modelo/Usuario.php';
require_once '../modelo/usuarioCRUD.php';

$usuarioform = $_POST['usuariologin'];
$claveform = $_POST['clavelogin'];

if ($usuarioform == "" || $claveform == "") {
    echo json_encode('Campos vacios');
} else {
    $objcrudUsuario = new usuarioCRUD();
    $objUsuario = $objcrudUsuario->buscarUsuarioLogin($usuarioform, $claveform);
    loginuser($objUsuario);
}

function loginuser(Usuario $objUsuario) {
    if ($objUsuario->getNombreUsu() != 0) {     
        $nombreUsuario = $objUsuario->getNombreUsu();
        $usuario = $objUsuario->getUsuario();
        $clave = $objUsuario->getClave();

        session_start();
        $_SESSION['nombreUsu'] = $nombreUsuario;
        $_SESSION['usuario'] = $usuario;
        echo json_encode($objUsuario->getUsuario());
    } else {
        echo json_encode("Objeto nulo");
    }
}
