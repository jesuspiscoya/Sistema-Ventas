<?php
require 'conexion.php';
require '../model/cliente.php';

class ClienteDao
{
    private $conexion;

    public function __construct()
    {
        $obj = new Conexion;
        $this->conexion = $obj->getConexion();
    }

    public function listar()
    {
        $sql = 'SELECT c.cod_cliente, p.nombre, p.correo, p.dni, p.telefono, p.direccion, p.estado FROM persona p INNER JOIN cliente c ON c.cod_persona=p.cod_persona';
        $array = array();
        $resultado = mysqli_query($this->conexion, $sql);

        while ($row = mysqli_fetch_assoc($resultado)) {
            $cliente = new Cliente;
            $cliente->codigo = $row['cod_cliente'];
            $cliente->nombre = $row['nombre'];
            $cliente->correo = $row['correo'];
            $cliente->dni = $row['dni'];
            $cliente->telefono = $row['telefono'];
            $cliente->direccion = $row['direccion'];
            $cliente->estado = $row['estado'];
            $array[] = $cliente;
        }
        return $array;
    }
}
?>