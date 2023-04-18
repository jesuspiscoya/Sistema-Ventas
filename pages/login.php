<?php
require '../services/conexion.php';
$alert = '';
session_start();
$obj = new Conexion;
$conexion = $obj->getConexion();
if (!empty($_SESSION['active'])) {
    header('location: ../');
} else {
    if (!empty($_POST)) {
        if (empty($_POST['usuario']) || empty($_POST['password'])) {
            $alert = 'Ingrese su usuario y su clave';
        } else {
            $user = mysqli_real_escape_string($conexion, $_POST['usuario']);
            $pass = sha1(mysqli_real_escape_string($conexion, $_POST['password']));

            $query = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario = '" . $user . "' AND password ='" . $pass . "'");
            mysqli_close($conexion);
            $result = mysqli_num_rows($query);

            if ($result > 0) {
                $data = mysqli_fetch_array($query);
                $_SESSION['active'] = true;
                $_SESSION['idUser'] = $data['cod_usuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['user'] = $data['usuario'];

                header('location: ../index.php');
            } else {
                $alert = 'El usuario o la clave son incorrectos';
                session_destroy();
            }
        }
    }
}
?>

<!doctype html>
<html>

<head>
    <link rel="shortcut icon" href="#" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">

    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">

</head>

<body>
    <div class="container-login">
        <div class="wrap-login">
            <form class="login-form validate-form" id="formLogin" action="" method="post">
                <span class="login-form-title">LOGIN</span>
                <div class="wrap-input100" data-validate="Usuario incorrecto">
                    <input class="input100" type="text" id="usuario" name="usuario" placeholder="Usuario">
                    <span class="focus-efecto"></span>
                </div>
                <div class="wrap-input100" data-validate="Password incorrecto">
                    <input class="input100" type="password" id="password" name="password" placeholder="Password">
                    <span class="focus-efecto"></span>
                </div>
                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <button type="submit" name="submit" class="login-form-btn">CONECTAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>