<?php
require_once 'conexion.php';
require $src . 'model/usuario.php';

class UsuarioDao
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion;
    }

    // Corregir
    public function validar(string $user, string $pass)
    {
        $conexion = $this->conexion->getConexion();
        $usuario = $conexion->real_escape_string($user);
        $password = $conexion->real_escape_string($pass);
        $sql = "CALL ValidarLogin('" . $usuario . "','" . $password . "')";
        $resultado = $conexion->query($sql);

        if ($row = $resultado->fetch_assoc()) {
            $usuario = new Usuario;
            $usuario->codigo = $row['cod_usuario'];
            $usuario->nombre = $row['nombre'];
            $usuario->estado = $row['estado'];
            $resultado->free_result();
            $conexion->next_result();
            $conexion->close();
            return $usuario;
        } else {
            $resultado->free_result();
            $conexion->next_result();
            $conexion->close();
            return null;
        }
    }

    public function insertar(Usuario $usuario)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL RegistrarUsuario('" . $usuario->nombre . "','" . $usuario->correo . "','" . $usuario->dni . "','" . $usuario->telefono . "','" . $usuario->direccion . "','" . $usuario->usuario . "','" . $usuario->password . "')";

        try {
            $conexion->query($sql);
            $conexion->close();
            return true;
        } catch (\Throwable $th) {
            $conexion->close();
            return false;
        }
    }

    public function insertarPermiso(int $permiso, int $codigo)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL InsertarPermiso('" . $permiso . "','" . $codigo . "')";

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
        $sql = "CALL BuscarUsuario('" . $codigo . "')";
        $resultado = $conexion->query($sql);

        while ($row = $resultado->fetch_assoc()) {
            $usuario = new Usuario;
            $usuario->codigo = $row['cod_usuario'];
            $usuario->nombre = $row['nombre'];
            $usuario->correo = $row['correo'];
            $usuario->dni = $row['dni'];
            $usuario->telefono = $row['telefono'];
            $usuario->direccion = $row['direccion'];
            $usuario->estado = $row['estado'];
            $usuario->password = $row['password'];
        }

        $resultado->free_result();
        $conexion->next_result();
        $conexion->close();
        return $usuario;
    }

    // Corregir
    public function buscarPermisos(int $codigo)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL BuscarPermiso('" . $codigo . "')";
        $resultado = $conexion->query($sql);
        $permiso = array();

        while ($row = $resultado->fetch_assoc()) {
            $permiso[] = $row['cod_permiso'];
        }

        $array = $permiso;
        $resultado->free_result();
        $conexion->next_result();
        $conexion->close();
        return $array;
    }

    public function modificar(Usuario $usuario)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL ModificarUsuario('" . $usuario->codigo . "','" . $usuario->nombre . "','" . $usuario->correo . "','" . $usuario->dni . "','" . $usuario->telefono . "','" . $usuario->direccion . "')";

        try {
            $conexion->query($sql);
            $conexion->close();
            return true;
        } catch (\Throwable $th) {
            $conexion->close();
            return false;
        }
    }

    public function modificarPassword(int $codigo, string $oldPassword, string $newPassword)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL ModificarPasswordUsuario('" . $codigo . "','" . $newPassword . "')";

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
        $sql = "CALL EliminarUsuario('" . $codigo . "')";

        try {
            $conexion->query($sql);
            $conexion->close();
            return true;
        } catch (\Throwable $th) {
            $conexion->close();
            return false;
        }
    }

    public function eliminarPermiso(int $permiso, int $codigo)
    {
        $conexion = $this->conexion->getConexion();
        $sql = "CALL EliminarPermiso('" . $permiso . "','" . $codigo . "')";

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
        $sql = "CALL ListarUsuarios";
        $resultado = $conexion->query($sql);

        while ($row = $resultado->fetch_assoc()) {
            $usuario = new Usuario;
            $usuario->codigo = $row['cod_usuario'];
            $usuario->nombre = $row['nombre'];
            $usuario->correo = $row['correo'];
            $usuario->dni = $row['dni'];
            $usuario->telefono = $row['telefono'];
            $usuario->direccion = $row['direccion'];
            $usuario->estado = $row['estado'];
            $array[] = $usuario;
        }

        $resultado->free_result();
        $conexion->next_result();
        $conexion->close();
        return $array;
    }
}
?>