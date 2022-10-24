<?php

class Usuario{
    private $nombreUsuario;
    private $usuario;
    private $clave;

function __construct($nombreUsuario, $usuario, $clave) {
    $this->nombreUsuario = $nombreUsuario;
    $this->usuario = $usuario;
    $this->clave = $clave;
}

function setNombreUsu ($nombreUsuario){
    $this->nombreUsuario = $nombreUsuario;
}

function getNombreUsu(){
    return $this->nombreUsuario;
}


function setUsuario ($usuario){
    $this->usuario = $usuario;
}

function getUsuario(){
    return $this->usuario;
}
function setClave ($clave){
    $this->clave = $clave;
}

function getClave(){
    return $this->clave;
}
}

