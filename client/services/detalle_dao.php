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

    public function insertar(Detalle $detalle)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL InsertarDetalle('" . $detalle->producto . "','" . $detalle->cantidad . "','" . $detalle->monto . "')";

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