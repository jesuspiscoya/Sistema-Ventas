<?php
require 'conexion.php';
require '../model/producto.php';

class ProductoDao
{
    private $conexion;

    public function __construct()
    {
        $obj = new Conexion;
        $this->conexion = $obj->getConexion();
    }

    public function listar()
    {
        $sql = 'SELECT p.cod_producto,p.nombre,p.precio,p.stock,p.estado,c.nom_categoria FROM producto p INNER JOIN categoria c ON p.cod_categoria = c.cod_categoria;';
        $array = array();
        $resultado = mysqli_query($this->conexion, $sql);

        while ($row = mysqli_fetch_assoc($resultado)) {
            $producto = new Producto;
            $producto->codigo = $row['cod_producto'];
            $producto->nombre = $row['nombre'];
            $producto->precio = $row['precio'];
            $producto->stock = $row['stock'];
            $producto->estado = $row['estado'];
            $producto->categoria = $row['nom_categoria'];
            $array[] = $producto;
        }
        return $array;
    }
}
?>