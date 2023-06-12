<?php
require '../services/cliente_dao.php';
$clienteDao = new ClienteDao;

if (!isset($_SESSION)) {
    session_start();
}

if (!empty($_SESSION['uid'])) {
    header('location: ../../');
} else {
    if (!empty($_POST)) {
        $cliente = new Cliente;
        $cliente->nombre = $_POST['nombre'];
        $cliente->correo = $_POST['correo'];
        $cliente->dni = $_POST['dni'];
        $cliente->telefono = $_POST['telefono'];
        $cliente->direccion = $_POST['direccion'];
        $cliente->password = $_POST['password'];
        $respuesta = $clienteDao->insertar($cliente);

        if ($respuesta) {
            $res = $clienteDao->validar($_POST['correo'], $_POST['password']);
            if (!empty($res)) {

                $_SESSION['uid'] = $res->codigo;
                $_SESSION['nombre'] = $res->nombre;
                $_SESSION['estado'] = $res->estado;
                header('location: ../../');
            }
            $_SESSION['registro'] = true;
            header('location: ../../');
        } else {
            $mensaje = 'Error al resgistrar usuario.';
            $alert = 'danger';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<?php $tittle = 'Registro'; ?>
<?php $src = '../' ?>
<?php $srcPage = '' ?>
<?php $inicio = '../../' ?>
<?php require '../components/_head.php' ?>

<body>
    <?php require '../components/_navbar.php'; ?>
    <main>
        <div class="container-login d-flex">
            <div class="d-flex justify-content-center w-100"
                style='background: url("../assets/img/signin.svg"); background-repeat: no-repeat; background-size: 100% 100%;'>
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 py-4 d-flex flex-column align-items-center justify-content-center"
                    style="margin-top: 70px; margin-bottom: 59.8px;">
                    <?php if (!empty($mensaje)) { ?>
                        <div class="alert alert-<?php echo $alert ?> alert-dismissible fade show d-flex justify-content-between w-100"
                            role="alert">
                            <span class="">
                                <?php echo $mensaje ?>
                            </span>
                            <div class="btn p-0" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa-solid fa-xmark text-<?php echo $alert ?> m-0 h3"></i>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="bg-dark shadow rounded p-4 p-lg-5 w-100 mx-4 mx-xl-5">
                        <div class="text-center text-md-center mb-4 mt-md-0">
                            <h3 class="mb-0">Nuevo Registro</h3>
                        </div>
                        <form action="" method="post" class="mt-4">
                            <div class="form-group">
                                <label>Nombre completo</label>
                                <input type="text" name="nombre" class="form-control p_input"
                                    placeholder="Ingrese su nombre" required>
                            </div>
                            <div class="form-group">
                                <label>Correo</label>
                                <input type="email" name="correo" class="form-control p_input"
                                    placeholder="Ingrese su correo" required>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-sm-6">
                                    <label>DNI</label>
                                    <input type="text" name="dni" class="form-control p_input"
                                        placeholder="Ingrese su DNI" required maxlength="8"
                                        onkeypress="return soloNumeros(event)">
                                </div>
                                <div class="form-group col-12 col-sm-6">
                                    <label>Teléfono</label>
                                    <input type="tel" name="telefono" class="form-control p_input"
                                        placeholder="Ingrese su teléfono" required maxlength="9"
                                        onkeypress="return soloNumeros(event)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" name="direccion" class="form-control p_input"
                                    placeholder="Ingrese su dirección" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control p_input"
                                    placeholder="Ingrese su contraseña" required>
                            </div>
                            <div class="form-group">
                                <label>Confirmar password</label>
                                <input type="password" name="password" class="form-control p_input"
                                    placeholder="Repita su contraseña" required>
                            </div>
                            <div class="form-group">
                                <div class="mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember" required>
                                        <label class="form-check-label fw-normal mb-0" for="remember">
                                            Acepto los <a href="#">términos y condiciones</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="registrar" class="wrap-login-form-btn text-center py-2">
                                <div class="login-form-bgbtn"></div>
                                <span class="h4 text-white text-uppercase">registrar</span>
                            </button>
                        </form>
                        <div class="d-flex justify-content-center mt-4">
                            <span class="fw-normal">
                                ¿Ya tienes una cuenta?
                                <a href="login.php">Inicia Sesión</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require '../components/_footer.php'; ?>

    <script>
        function soloNumeros(e) {
            var key = window.Event ? e.which : e.keyCode
            return (key == 46 || key >= 48 && key <= 57)
        }
    </script>
</body>

</html>