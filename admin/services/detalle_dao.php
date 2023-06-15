<?php
require_once 'conexion.php';
require $src . 'model/detalle.php';

class DetalleDao
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion;
    }

    public function insertarDetalle(Detalle $detalle)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL InsertarDetalle('" . $detalle->pedido . "','" . $detalle->producto . "','" . $detalle->cantidad . "','" . $detalle->monto . "')";

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