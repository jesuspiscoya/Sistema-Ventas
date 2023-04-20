<?php
require 'conexion.php';
require '../model/usuario.php';

class UsuarioDao
{
    private $conexion;

    public function __construct()
    {
        $obj = new Conexion;
        $this->conexion = $obj->getConexion();
    }

    public function validar(string $user, string $pass)
    {
        $usuario = mysqli_real_escape_string($this->conexion, $user);
        $password = mysqli_real_escape_string($this->conexion, $pass);
        $sql = "CALL ValidarLogin('" . $usuario . "','" . $password . "')";
        $resultado = $this->conexion->query($sql);

        if ($row = $resultado->fetch_assoc()) {
            $usuario = new Usuario;
            $usuario->codigo = $row['cod_usuario'];
            $usuario->nombre = $row['nombre'];
            $usuario->estado = $row['estado'];
            return $usuario;
        } else {
            return null;
        }
    }

    public function insertar(Usuario $usuario)
    {
        $sql = "CALL InsertarUsuario('" . $usuario->nombre . "','" . $usuario->correo . "','" . $usuario->dni . "','" . $usuario->telefono . "','" . $usuario->direccion . "','" . $usuario->usuario . "','" . $usuario->password . "')";
        try {
            $this->conexion->query($sql);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function insertarPermiso(int $permiso, int $codigo)
    {
        $sql = "CALL InsertarPermiso('" . $permiso . "','" . $codigo . "')";
        try {
            $this->conexion->query($sql);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function buscar(int $codigo)
    {
        $sql = "CALL BuscarUsuario('" . $codigo . "')";
        $resultado = $this->conexion->query($sql);

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
        return $usuario;
    }

    public function buscarPermisos(int $codigo)
    {
        $sql = "CALL BuscarPermiso('" . $codigo . "')";
        $resultado = $this->conexion->query($sql);

        $permiso = array();
        while ($row = $resultado->fetch_assoc()) {
            $permiso[] = $row['cod_permiso'];
        }
        $array = $permiso;
        return $array;
    }

    public function modificar(Usuario $usuario)
    {
        $sql = "CALL ModificarUsuario('" . $usuario->codigo . "','" . $usuario->nombre . "','" . $usuario->correo . "','" . $usuario->dni . "','" . $usuario->telefono . "','" . $usuario->direccion . "')";
        try {
            $this->conexion->query($sql);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function modificarPassword(int $codigo, string $oldPassword, string $newPassword)
    {
        $sql = "CALL ModificarPasswordUsuario('" . $codigo . "','" . $newPassword . "')";
        try {
            $this->conexion->query($sql);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function eliminar(int $codigo)
    {
        $sql = "CALL EliminarUsuario('" . $codigo . "')";
        try {
            $this->conexion->query($sql);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function eliminarPermiso(int $permiso, int $codigo)
    {
        $sql = "CALL EliminarPermiso('" . $permiso . "','" . $codigo . "')";
        try {
            $this->conexion->query($sql);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function listar()
    {
        $sql = 'CALL ListarUsuarios';
        $resultado = $this->conexion->query($sql);

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
        return $array;
    }
}
?>