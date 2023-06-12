<?php
require_once 'conexion.php';
require $src . 'model/producto.php';

class ProductoDao
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion;
    }

    public function buscar(int $codigo)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL BuscarProducto('" . $codigo . "')";
        $resultado = $conexion->query($sql);

        while ($row = $resultado->fetch_assoc()) {
            $producto = new Producto;
            $producto->codigo = $row['cod_producto'];
            $producto->nombre = $row['nombre'];
            $producto->precio = $row['precio'];
            $producto->imagen = base64_encode($row['imagen']);
        }

        $resultado->free_result();
        $conexion->next_result();
        $conexion->close();
        return $producto;
    }

    public function listar()
    {
        $conexion = $this->conexion->getConexion();
        $sql = 'CALL ListarProductos';
        $resultado = mysqli_query($conexion, $sql);
        $array = array();

        while ($row = mysqli_fetch_assoc($resultado)) {
            $producto = new Producto;
            $producto->codigo = $row['cod_producto'];
            $producto->nombre = $row['nombre'];
            $producto->descripcion = $row['descripcion'];
            $producto->precio = $row['precio'];
            $producto->stock = $row['stock'];
            $producto->estado = $row['estado'];
            $producto->categoria = $row['nom_categoria'];
            $producto->imagen = $row['imagen'];
            $array[] = $producto;
        }

        $resultado->free_result();
        $conexion->next_result();
        $conexion->close();
        return $array;
    }

    public function categorias()
    {
        $conexion = $this->conexion->getConexion();
        $sql = 'CALL ListarCategorias';
        $resultado = mysqli_query($conexion, $sql);

        while ($row = mysqli_fetch_assoc($resultado)) {
            $producto = new Producto;
            $producto->cod_categoria = $row['cod_categoria'];
            $producto->categoria = $row['nom_categoria'];
            $array[] = $producto;
        }

        $resultado->free_result();
        $conexion->next_result();
        $conexion->close();
        return $array;
    }
}
?>