<?php
require 'conexion.php';
require '../model/usuario.php';

class UsuarioDao
{
    private $conexion;

    public function __construct()
    {
        $obj = new Conexion;
        $this->conexion = $obj->getConexion();
    }

    public function insertar(Usuario $usuario)
    {
        $sql = "CALL InsertarUsuario('" . $usuario->dni . "','" . $usuario->nombre . "','" . $usuario->correo . "','" . $usuario->telefono . "','" . $usuario->direccion . "','" . $usuario->usuario . "','" . $usuario->password . "')";
        try {
            $this->conexion->query($sql);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function modificar(Usuario $usuario)
    {
        $sql = "CALL ModificarUsuario('" . $usuario->codigo . "','" . $usuario->dni . "','" . $usuario->nombre . "','" . $usuario->correo . "','" . $usuario->telefono . "','" . $usuario->direccion . "','" . $usuario->usuario . "','" . $usuario->password . "')";
        try {
            $this->conexion->query($sql);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function listar()
    {
        $array = array();
        $sql = 'CALL ListarUsuarios';
        $resultado = $this->conexion->query($sql);

        while ($row = $resultado->fetch_assoc()) {
            $usuario = new Usuario;
            $usuario->codigo = $row['cod_usuario'];
            $usuario->nombre = $row['nombre'];
            $usuario->correo = $row['correo'];
            $usuario->dni = $row['dni'];
            $usuario->telefono = $row['telefono'];
            $usuario->direccion = $row['direccion'];
            $usuario->estado = $row['estado'];
            $array[] = $usuario;
        }
        return $array;
    }
}
?>