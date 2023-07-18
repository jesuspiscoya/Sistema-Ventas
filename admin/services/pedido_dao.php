<?php
require_once 'conexion.php';
require_once $src . 'model/pedido.php';
require_once $src . 'model/cliente.php';

class PedidoDao
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion;
    }

    public function buscar(int $codigo)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL BuscarPedido('" . $codigo . "')";
        $resultado = $conexion->query($sql);

        if ($row = $resultado->fetch_assoc()) {
            $pedido = new Pedido;
            $pedido->cliente = $row['nombre'];
            $pedido->fecha = $row['fecha'];
            $pedido->cantidad = $row['cantidad'];
            $pedido->total = $row['total'];
        }

        $resultado->free_result();
        $conexion->next_result();
        $conexion->close();
        return $pedido;
    }

    public function buscarPdf(int $codigo)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL BuscarPedidoPdf('" . $codigo . "')";
        $resultado = $conexion->query($sql);

        if ($row = $resultado->fetch_assoc()) {
            $cliente = new Cliente;
            $cliente->nombre = $row['nombre'];
            $cliente->telefono = $row['telefono'];
            $cliente->direccion = $row['direccion'];
            $cliente->correo = $row['correo'];
            $cliente->codigo = $row['fecha'];
            $cliente->dni = $row['total'];
        }

        $resultado->free_result();
        $conexion->next_result();
        $conexion->close();
        return $cliente;
    }

    public function buscarEstado(int $codigo)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL BuscarEstadoPedido('" . $codigo . "')";
        $resultado = $conexion->query($sql);
        $row = $resultado->fetch_assoc();
        $resultado->free_result();
        $conexion->next_result();
        $conexion->close();
        return $row['estado'];
    }

    public function modificar(Pedido $pedido)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL ModificarPedido('" . $pedido->codigo . "','" . $pedido->cantidad . "','" . $pedido->total . "')";

        try {
            $conexion->query($sql);
            $conexion->close();
            return true;
        } catch (\Throwable $th) {
            $conexion->close();
            return false;
        }
    }

    public function modificarEstado(Pedido $pedido)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL ModificarEstadoPedido('" . $pedido->codigo . "','" . $pedido->estado . "')";

        try {
            $conexion->query($sql);
            $conexion->close();
            return true;
        } catch (\Throwable $th) {
            $conexion->close();
            return false;
        }
    }

    public function listar()
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL ListarPedidos";
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