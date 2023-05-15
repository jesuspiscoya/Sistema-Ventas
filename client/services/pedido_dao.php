<?php
require_once 'conexion.php';
require '../model/pedido.php';

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
        $sql = 'CALL ListarPedidos';
        $resultado = $conexion->query($sql);
        $array = array();

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