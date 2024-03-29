<?php
require_once 'conexion.php';
require_once $src . 'model/producto.php';

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
        $sql = "CALL InsertarProducto('" . $producto->cod_categoria . "','" . $producto->nombre . "','" . $producto->descripcion . "','" . $producto->precio . "','" . $producto->stock . "','" . $producto->imagen . "')";

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

        if ($row = $resultado->fetch_assoc()) {
            $producto = new Producto;
            $producto->codigo = $row['cod_producto'];
            $producto->nombre = $row['nombre'];
            $producto->descripcion = $row['descripcion'];
            $producto->cod_categoria = $row['cod_categoria'];
            $producto->categoria = $row['nom_categoria'];
            $producto->precio = $row['precio'];
            $producto->stock = $row['stock'];
            $producto->estado = $row['estado'];
            $producto->imagen = base64_encode($row['imagen']);
        }

        $resultado->free_result();
        $conexion->next_result();
        $conexion->close();
        return $producto;
    }

    public function buscarImagen(int $codigo)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL BuscarProducto('" . $codigo . "')";
        $resultado = $conexion->query($sql);
        $row = $resultado->fetch_assoc();
        $resultado->free_result();
        $conexion->next_result();
        $conexion->close();
        return addslashes($row['imagen']);
    }

    public function modificar(Producto $producto)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL ModificarProducto('" . $producto->codigo . "','" . $producto->cod_categoria . "','" . $producto->nombre . "','" . $producto->descripcion . "','" . $producto->precio . "','" . $producto->stock . "','" . $producto->imagen . "','" . $producto->estado . "')";

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
        $sql = "CALL ListarProductos";
        $resultado = $conexion->query($sql);
        ;
        $array = array();

        while ($row = $resultado->fetch_assoc()) {
            $producto = new Producto;
            $producto->codigo = $row['cod_producto'];
            $producto->nombre = $row['nombre'];
            $producto->descripcion = $row['descripcion'];
            $producto->precio = $row['precio'];
            $producto->stock = $row['stock'];
            $producto->estado = $row['estado'];
            $producto->categoria = $row['nom_categoria'];
            $producto->imagen = base64_encode($row['imagen']);
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
        $sql = "CALL ListarCategorias";
        $resultado = $conexion->query($sql);
        ;

        while ($row = $resultado->fetch_assoc()) {
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