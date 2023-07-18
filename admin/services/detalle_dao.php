<?php
require_once 'conexion.php';
require_once $src . 'model/detalle.php';
require_once $src . 'model/producto.php';

class DetalleDao
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion;
    }

    public function insertar(Detalle $detalle)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL InsertarDetalle2('" . $detalle->pedido . "','" . $detalle->producto . "','" . $detalle->cantidad . "','" . $detalle->monto . "')";

        try {
            $conexion->query($sql);
            $conexion->close();
            return true;
        } catch (\Throwable $th) {
            $conexion->close();
            return false;
        }
    }

    public function buscar(int $codigo)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL BuscarDetalle('" . $codigo . "')";
        $resultado = $conexion->query($sql);
        $array = array();

        while ($row = $resultado->fetch_assoc()) {
            $producto = new Producto;
            $detalle = new Detalle;
            $detalle->codigo = $row['cod_deta_pedido'];
            $producto->codigo = $row['cod_producto'];
            $producto->imagen = base64_encode($row['imagen']);
            $producto->nombre = $row['nombre'];
            $producto->precio = $row['precio'];
            $detalle->cantidad = $row['cantidad'];
            $detalle->monto = $row['monto'];
            $arrayDetalle['producto'] = $producto;
            $arrayDetalle['detalle'] = $detalle;
            $array[] = $arrayDetalle;
        }

        $resultado->free_result();
        $conexion->next_result();
        $conexion->close();
        return $array;
    }

    public function modificar(Detalle $detalle)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL ModificarDetalle('" . $detalle->codigo . "','" . $detalle->cantidad . "','" . $detalle->monto . "','" . $detalle->pedido . "')";

        try {
            $conexion->query($sql);
            $conexion->close();
            return true;
        } catch (\Throwable $th) {
            $conexion->close();
            return false;
        }
    }

    public function eliminar(int $codigo)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL EliminarDetalle('" . $codigo . "')";

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