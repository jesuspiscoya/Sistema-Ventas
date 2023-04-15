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

    public function listar()
    {
        $sql = 'SELECT u.cod_usuario, p.nombre, p.correo, p.dni, p.telefono, p.direccion, p.estado FROM persona p INNER JOIN usuario u ON u.cod_persona=p.cod_persona';
        $array = array();
        $resultado = mysqli_query($this->conexion, $sql);

        while ($row = mysqli_fetch_assoc($resultado)) {
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