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

    public function insertar(Pedido $pedido)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL InsertarPedido('" . $pedido->cliente . "','" . $pedido->cantidad . "','" . $pedido->total . "')";

        try {
            $conexion->query($sql);
            $conexion->close();
            return true;
        } catch (\Throwable $th) {
            $conexion->close();
            return false;
        }
    }
}
?>