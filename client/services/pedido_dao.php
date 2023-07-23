<?php
require_once 'conexion.php';
require $src . 'model/pedido.php';
require $src . 'model/cliente.php';

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

    public function buscar()
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL BuscarUltimoPedido";
        $resultado = $conexion->query($sql);

        if ($row = $resultado->fetch_assoc()) {
            $cliente = new Cliente;
            $cliente->codigo = $row['cod_pedido'];
            $cliente->nombre = $row['nombre'];
            $cliente->telefono = $row['telefono'];
            $cliente->direccion = $row['direccion'];
            $cliente->correo = $row['correo'];
            $cliente->estado = $row['fecha'];
            $cliente->dni = $row['total'];
        }

        $resultado->free_result();
        $conexion->next_result();
        $conexion->close();
        return $cliente;
    }
}
?>