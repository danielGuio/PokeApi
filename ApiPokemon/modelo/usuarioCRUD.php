<?php

include_once '../config/Coneccion.php';

class usuarioCRUD extends Coneccion{
    
    var $conn;
    var $consulta;
    var $nombreUsuario;
    var $usuario;
    var $clave;
    
        
      public function insertarUsuario(Usuario $objUsuario) {
        $bandera = false;
        $conn = $this->conectar();
        $this->nombreUsuario = $objUsuario->getNombreUsu();
        $this->usuario = $objUsuario->getUsuario();
        $this->clave = $objUsuario->getClave();
        $consulta = "insert into usuario(nombreUsuario, usuario, clave)values(?,?,?)";

        $pre = mysqli_prepare($conn, $consulta);
        $pre->bind_param("sss", $this->nombreUsuario,  $this->usuario, $this->clave);
        try{
        $pre->execute();
        $bandera = true;
        }catch (Exception $e){
            echo 'error al insertar un usuario en la base de datos: ' . $e->getMessage()." Codigo de error: ".
            mysqli_errno($conn);
        }
        return $bandera;
    }
    
    
        public function buscarUsuarioLogin($usuario, $clave){
            $conn = $this->conectar();
            $consulta = "select * from usuario where usuario = ? and clave = ?";

            $sentencia = $conn->stmt_init();
            if(!$sentencia->prepare($consulta)){
                print "fallo la preparacion de la consulta traer Usuario";
            }
            else{
                $sentencia->bind_param("ss", $usuario, $clave);
                $sentencia->execute();
                $resultado = $sentencia->get_result();    
                $fila = $resultado->fetch_array(MYSQLI_NUM); 
                if($fila==null){
                    $objUsuario = new Usuario(0, 0, 0);
                }else{
                    $objUsuario = new Usuario($fila[1], $fila[2], $fila[3]);
                }
            }           
            return $objUsuario;
    }
    
     public function buscarUsuarioUser($usuario){
            $conn = $this->conectar();
            $consulta = "select * from usuario where usuario = ?";

            $sentencia = $conn->stmt_init();
            if(!$sentencia->prepare($consulta)){
                print "fallo la preparacion de la consulta traer Usuario";
            }
            else{
                $sentencia->bind_param("s", $usuario);
                $sentencia->execute();
                $resultado = $sentencia->get_result();    
                $fila = $resultado->fetch_array(MYSQLI_NUM); 
                if($fila==null){
                    $objUsuario = new Usuario(0, 0, 0);
                }else{
                    $objUsuario = new Usuario($fila[0], $fila[1], $fila[2]);
                }
            }           
            return $objUsuario;
    }
}