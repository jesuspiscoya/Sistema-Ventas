<?php
$src = "../";
require '../services/usuario_dao.php';
$usuarioDao = new UsuarioDao;

$mensaje = '';
if (!isset($_SESSION)) {
    session_start();
}

if (!empty($_SESSION['uid'])) {
    header('location: ../');
} else {
    if (!empty($_POST)) {
        $respuesta = $usuarioDao->validar($_POST['usuario'], $_POST['password']);
        if (!empty($respuesta)) {
            $_SESSION['uid'] = $respuesta->codigo;
            $_SESSION['usuario'] = $respuesta->nombre;
            $_SESSION['estado'] = $respuesta->estado;

            $_SESSION['usuarios'] = false;
            $_SESSION['clientes'] = false;
            $_SESSION['productos'] = false;
            $_SESSION['pedidos'] = false;
            $respuesta = $usuarioDao->validarPermisos($_SESSION['uid']);

            foreach ($respuesta as $key => $value) {
                switch ($value) {
                    case 1:
                        $_SESSION['usuarios'] = true;
                        break;
                    case 2:
                        $_SESSION['clientes'] = true;
                        break;
                    case 3:
                        $_SESSION['productos'] = true;
                        break;
                    case 4:
                        $_SESSION['pedidos'] = true;
                        break;
                }
            }

            header('location: ../');
        } else {
            $mensaje = 'Usuario o password incorrecto.';
            session_destroy();
        }
    }
}
?>

<!doctype html>
<html>

<?php $tittle = 'Login' ?>
<?php include '../components/_head.php' ?>

<body>
    <div class="container-login">
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="row w-100 m-0">
                    <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                        <div class="card col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto">
                            <div class="card-body p4">
                                <h3 class="card-title text-center mb-4">Iniciar Sesión</h3>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="usuario">Usuario</label>
                                        <div class="wrap-input100">
                                            <input class="input100" type="text" id="usuario" name="usuario"
                                                placeholder="Ingrese su usuario" required>
                                            <span class="focus-efecto"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="wrap-input100">
                                            <input class="input100" type="password" id="password" name="password"
                                                placeholder="Ingrese su password" required>
                                            <span class="focus-efecto"></span>
                                        </div>
                                    </div>
                                    <div class="container-login-form-btn">
                                        <div class="wrap-login-form-btn w-50 mx-auto">
                                            <div class="login-form-bgbtn"></div>
                                            <button type="submit" name="submit" class="login-form-btn">Ingresar</button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <span class="text-danger">
                                            <?php echo $mensaje ?>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>