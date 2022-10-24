<?php
require_once '../modelo/Usuario.php';
require_once '../modelo/usuarioCRUD.php';

$nombreusuarioform = $_POST['nombreusuario'];
$usuarioform = $_POST['usuario'];
$claveform = $_POST['clave'];

if ($nombreusuarioform == "" || $usuarioform == "" || $claveform == "" ) {
    echo json_encode('Campos vacios');
} else {
    $objcrudUsuario = new usuarioCRUD();
    $objUsuario = $objcrudUsuario->buscarUsuarioUser($usuarioform);
    if($objUsuario->getNombreUsu()==0){
        $objcrudUsuario = new usuarioCRUD();
        $bandera = false;
        $bandera = registrousu($nombreusuarioform, $usuarioform, $claveform, $objcrudUsuario);
        session_start();
        $_SESSION['nombreUsu'] = $nombreusuarioform;
        $_SESSION['usuario'] = $usuarioform;
         echo json_encode("usuario creado");
    }else{
        echo json_encode('Usuario existente');
    }
}

function registrousu($nombre, $usuario, $clave, usuarioCRUD $objcrudUsuario) {
    $bandera = false; 
    $objUsuario = new Usuario($nombre, $usuario, $clave);
    $bandera = $objcrudUsuario->insertarUsuario($objUsuario);
    return $bandera;
}



