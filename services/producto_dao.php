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

    public function insertar(Producto $producto)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL InsertarProducto('" . $producto->cod_categoria . "','" . $producto->nombre . "','" . $producto->descripcion . "','" . $producto->precio . "','" . $producto->stock . "')";

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
        $sql = "CALL BuscarProducto('" . $codigo . "')";
        $resultado = $conexion->query($sql);

        while ($row = $resultado->fetch_assoc()) {
            $producto = new Producto;
            $producto->codigo = $row['cod_producto'];
            $producto->nombre = $row['nombre'];
            $producto->descripcion = $row['descripcion'];
            $producto->cod_categoria = $row['cod_categoria'];
            $producto->categoria = $row['nom_categoria'];
            $producto->precio = $row['precio'];
            $producto->stock = $row['stock'];
            $producto->estado = $row['estado'];
        }

        $resultado->free_result();
        $conexion->next_result();
        $conexion->close();
        return $producto;
    }

    public function modificar(Producto $producto)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL ModificarProducto('" . $producto->codigo . "','" . $producto->cod_categoria . "','" . $producto->nombre . "','" . $producto->descripcion . "','" . $producto->precio . "','" . $producto->stock . "','" . $producto->estado . "')";

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
        $sql = "CALL EliminarProducto('" . $codigo . "')";

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
        $sql = 'CALL ListarProductos';
        $resultado = mysqli_query($conexion, $sql);
        $array = array();

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