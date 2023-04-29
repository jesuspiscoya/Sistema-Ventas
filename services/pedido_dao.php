<?php
require_once 'conexion.php';
require $src . 'model/pedido.php';

class PedidoDao
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion;
    }

    public function listar()
    {
        $conexion = $this->conexion->getConexion();
        $sql = 'SELECT p.cod_pedido,ps.nombre,p.cantidad,p.total,p.fecha,p.estado FROM pedido p INNER JOIN cliente c INNER JOIN persona ps ON p.cod_cliente = c.cod_cliente AND c.cod_persona = ps.cod_persona';
        $array = array();
        $resultado = $conexion->query($sql);

        while ($row = $resultado->fetch_assoc()) {
            $pedido = new Pedido;
            $pedido->codigo = $row['cod_pedido'];
            $pedido->cliente = $row['nombre'];
            $pedido->cantidad = $row['cantidad'];
            $pedido->total = $row['total'];
            $pedido->fecha = $row['fecha'];
            $pedido->estado = $row['estado'];
            $array[] = $pedido;
        }
        $resultado->free_result();
        $conexion->next_result();
        $conexion->close();
        return $array;
    }
}
?>