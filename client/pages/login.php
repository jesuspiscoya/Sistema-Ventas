<?php
$src = "../";
require '../services/cliente_dao.php';
$clienteDao = new ClienteDao;

$mensaje = '';
if (!isset($_SESSION)) {
    session_start();
}

if (!empty($_SESSION['cid'])) {
    header('location: ../../');
} else {
    if (!empty($_POST)) {
        $respuesta = $clienteDao->validar($_POST['correo'], $_POST['password']);
        if (!empty($respuesta)) {
            $_SESSION['cid'] = $respuesta->codigo;
            $_SESSION['cliente'] = $respuesta->nombre;
            $_SESSION['estado'] = $respuesta->estado;
            header('location: ../../');
        } else {
            $mensaje = 'Correo o contraseña inválida.';
            session_destroy();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<?php $tittle = 'Login'; ?>
<?php $srcPage = '' ?>
<?php $inicio = '../../' ?>
<?php require '../components/_head.php' ?>

<body>
    <?php require '../components/_navbar.php'; ?>
    <main>
        <div class="container-login d-flex">
            <div class="d-flex justify-content-center w-100"
                style='background: url("../assets/img/signin.svg"); background-repeat: no-repeat; background-size: 100% 100%;'>
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 d-flex align-items-center justify-content-center"
                    style="margin-top: 70px; margin-bottom: 59.8px;">
                    <div class="bg-dark shadow rounded p-4 p-lg-5 w-100 mx-4 mx-xl-5">
                        <div class="text-center text-md-center mb-4 mt-md-0">
                            <h3 class="mb-0">Iniciar Sesión</h3>
                        </div>
                        <form action="" method="post" class="mt-4">
                            <div class="form-group">
                                <label>Correo</label>
                                <input type="email" name="correo" class="form-control p_input"
                                    placeholder="Ingrese su correo" required>
                            </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" name="password" class="form-control p_input"
                                    placeholder="Ingrese su contraseña" required>
                            </div>
                            <div class="mt-4 text-center">
                                <span class="text-danger">
                                    <?php echo $mensaje ?>
                                </span>
                            </div>
                            <button type="submit" name="ingresar" class="wrap-login-form-btn text-center py-2">
                                <div class="login-form-bgbtn"></div>
                                <span class="h5 text-white text-uppercase">Ingresar</span>
                            </button>
                        </form>
                        <div class="d-flex justify-content-center mt-4">
                            <span class="fw-normal text-center">
                                ¿No tienes una cuenta?
                                <a href="register.php">Registrarse</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require '../components/_footer.php'; ?>
</body>

</html>