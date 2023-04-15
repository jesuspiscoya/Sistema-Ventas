<?php
class Conexion
{
    private $conexion;
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'bd_compucenter';

    public function getConexion()
    {
        $conexion = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);

        if (!$conexion)
            return false;
        else
            return $conexion;
    }
}



?>