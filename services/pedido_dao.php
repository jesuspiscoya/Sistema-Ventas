<?php
require 'conexion.php';
require '../model/pedido.php';

class PedidoDao
{
    private $conexion;

    public function __construct()
    {
        $obj = new Conexion;
        $this->conexion = $obj->getConexion();
    }

    public function listar()
    {
        $sql = 'SELECT p.cod_pedido,ps.nombre,p.cantidad,p.total,p.fecha,p.estado FROM pedido p INNER JOIN cliente c INNER JOIN persona ps ON p.cod_cliente = c.cod_cliente AND c.cod_persona = ps.cod_persona';
        $array = array();
        $resultado = mysqli_query($this->conexion, $sql);

        while ($row = mysqli_fetch_assoc($resultado)) {
            $pedido = new Pedido;
            $pedido->codigo = $row['cod_pedido'];
            $pedido->cliente = $row['nombre'];
            $pedido->cantidad = $row['cantidad'];
            $pedido->total = $row['total'];
            $pedido->fecha = $row['fecha'];
            $pedido->estado = $row['estado'];
            $array[] = $pedido;
        }
        return $array;
    }
}
?>


