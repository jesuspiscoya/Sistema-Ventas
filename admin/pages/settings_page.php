<!DOCTYPE html>
<html lang="es">

<?php $tittle = "Cuenta" ?>
<?php $src = '../' ?>
<?php $srcPage = '' ?>
<?php require '../components/_head.php' ?>
<?php require '../services/usuario_dao.php' ?>
<?php require '../components/_validar_session.php' ?>
<?php $usuarioDao = new UsuarioDao ?>
<?php
if (isset($_POST['guardar'])) {
    $usuario = new Usuario;
    $usuario->codigo = $_SESSION['uid'];
    $usuario->nombre = $_POST['nombre'];
    $usuario->correo = $_POST['correo'];
    $usuario->telefono = $_POST['telefono'];
    $usuario->direccion = $_POST['direccion'];

    $respuesta = $usuarioDao->modificar($usuario);

    if ($respuesta) {
        $mensaje = 'Datos actualizados con éxito.';
        $alert = 'success';
    } else {
        $mensaje = 'Error al actualizar datos.';
        $alert = 'danger';
    }
}
$usuario = $usuarioDao->buscar($_SESSION['uid']);
?>

<body>
    <div class="container-scroller">
        <?php include '../components/_sidebar.php'; ?>
        <div class="container-fluid page-body-wrapper mr-0">
            <?php include '../components/_navbar.php'; ?>
            <div class="main-panel">
                <div class="content-wrapper pt-4 pb-5">
                    <?php if (!empty($mensaje)) { ?>
                        <div class="alert alert-<?php echo $alert ?> alert-dismissible fade show d-flex justify-content-between"
                            role="alert">
                            <span class="">
                                <?php echo $mensaje ?>
                            </span>
                            <div class="btn p-0" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa-solid fa-xmark text-<?php echo $alert ?> m-0 h3"></i>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row pb-3 h-100">
                        <div class="col-md-5 d-flex mb-4 mb-md-0">
                            <div class="card card-profile">
                                <img src="../assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                                <div class="row justify-content-center">
                                    <div class="col-4 col-lg-4 order-lg-2">
                                        <div class="mt-n4 mt-sm-n5 mt-md-n4 mt-lg-n6 mt-xl-n5 mb-4 mb-lg-0">
                                            <img src="../assets/img/homer.png" alt="Image profile"
                                                class="rounded-circle img-fluid border border-2 border-white">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="text-center mt-4">
                                        <h5>
                                            <?php echo $usuario->nombre ?>
                                        </h5>
                                        <h6>
                                            Usuario Administrador
                                        </h6>
                                        <h6 class="mt-4">
                                            <?php echo 'DNI -' . $usuario->dni ?>
                                        </h6>
                                        <div>
                                            <?php echo $usuario->correo ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 d-flex mb-3 mb-sm-0">
                            <div class="card">
                                <form action="" method="post">
                                    <div class="card-header pb-0">
                                        <div class="d-flex align-items-center">
                                            <h3 class="card-title mb-3">Configuración</h3>
                                            <button type="submit" name="guardar"
                                                class="btn btn-inverse-primary btn-rounded px-4 py-2 ml-auto mb-3">
                                                <label class="h6 m-0">Guardar</label>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body row">
                                        <div class="form-group col-12">
                                            <label>Nombre completo</label>
                                            <input type="text" name="nombre" class="form-control p_input"
                                                value="<?php echo $usuario->nombre ?>" required>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Correo</label>
                                            <input type="email" name="correo" class="form-control p_input"
                                                value="<?php echo $usuario->correo ?>" required>
                                        </div>
                                        <div class="form-group col-12 col-sm-6">
                                            <label>DNI</label>
                                            <input type="text" class="form-control p_input"
                                                value="<?php echo $usuario->dni ?>" disabled>
                                        </div>
                                        <div class="form-group col-12 col-sm-6">
                                            <label>Teléfono</label>
                                            <input type="tel" name="telefono" class="form-control p_input"
                                                value="<?php echo $usuario->telefono ?>" required maxlength="9">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Dirección</label>
                                            <input type="text" name="direccion" class="form-control p_input"
                                                value="<?php echo $usuario->direccion ?>" required>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require '../components/_footer.php'; ?>
</body>

</html>