<?php
require_once 'conexion.php';
require '../model/cliente.php';

class ClienteDao
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion;
    }

    public function validar(string $email, string $pass)
    {
        $conexion = $this->conexion->getConexion();
        $correo = $conexion->real_escape_string($email);
        $password = $conexion->real_escape_string($pass);
        $sql = "CALL ValidarLoginCliente('" . $correo . "','" . $password . "')";
        $resultado = $conexion->query($sql);

        if ($row = $resultado->fetch_assoc()) {
            $cliente = new Cliente;
            $cliente->codigo = $row['cod_cliente'];
            $cliente->nombre = $row['nombre'];
            $cliente->estado = $row['estado'];
            $resultado->free_result();
            $conexion->next_result();
            $conexion->close();
            return $cliente;
        } else {
            $resultado->free_result();
            $conexion->next_result();
            $conexion->close();
            return null;
        }
    }

    public function insertar(Cliente $cliente)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL InsertarCliente('" . $cliente->nombre . "','" . $cliente->correo . "','" . $cliente->dni . "','" . $cliente->telefono . "','" . $cliente->direccion . "','" . $cliente->password . "')";

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
        $sql = "CALL BuscarCliente('" . $codigo . "')";
        $resultado = $conexion->query($sql);

        while ($row = $resultado->fetch_assoc()) {
            $cliente = new Cliente;
            $cliente->codigo = $row['cod_cliente'];
            $cliente->nombre = $row['nombre'];
            $cliente->correo = $row['correo'];
            $cliente->dni = $row['dni'];
            $cliente->telefono = $row['telefono'];
            $cliente->direccion = $row['direccion'];
            $cliente->estado = $row['estado'];
            $cliente->password = $row['password'];
        }

        $resultado->free_result();
        $conexion->next_result();
        $conexion->close();
        return $cliente;
    }

    public function modificar(Cliente $cliente)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL ModificarCliente('" . $cliente->codigo . "','" . $cliente->nombre . "','" . $cliente->correo . "','" . $cliente->dni . "','" . $cliente->telefono . "','" . $cliente->direccion . "','" . $cliente->estado . "')";

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
        $sql = "CALL EliminarCliente('" . $codigo . "')";

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
        $sql = 'CALL ListarClientes';
        $resultado = $conexion->query($sql);
        $array = array();

        while ($row = $resultado->fetch_assoc()) {
            $cliente = new Cliente;
            $cliente->codigo = $row['cod_cliente'];
            $cliente->nombre = $row['nombre'];
            $cliente->correo = $row['correo'];
            $cliente->dni = $row['dni'];
            $cliente->telefono = $row['telefono'];
            $cliente->direccion = $row['direccion'];
            $cliente->estado = $row['estado'];
            $array[] = $cliente;
        }

        $resultado->free_result();
        $conexion->next_result();
        $conexion->close();
        return $array;
    }
}
?>