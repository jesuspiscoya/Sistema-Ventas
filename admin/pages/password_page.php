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
if (isset($_POST['actualizar'])) {
    $usuario = new Usuario;
    $respuesta = $usuarioDao->modificarPassword($_SESSION['uid'], $_POST['old_password'], $_POST['new_password']);

    if ($respuesta) {
        $mensaje = 'Contraseña actualizada con éxito.';
        $alert = 'success';
    } else {
        $mensaje = 'Contraseña inválida, intente nuevamente.';
        $alert = 'danger';
    }
}
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
                        <div class="col-12 col-sm-10 col-md-8 col-xl-6 mx-auto d-flex mb-3 mb-md-0">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h3 class="card-title mb-0">Modificar Contraseña</h3>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="text-center">
                                        <img src="../assets/img/homer.png" alt="Image profile"
                                            class="rounded-circle img-fluid border border-2 border-white w-25 mb-4">
                                        <h5>
                                            <?php echo $_SESSION['nombre'] ?>
                                        </h5>
                                        <h6>
                                            Usuario Administrador
                                        </h6>
                                    </div>
                                    <form action="" method="post">
                                        <div class="card-body row">
                                            <div class="form-group col-12">
                                                <label>Contraseña actual</label>
                                                <input type="password" name="old_password" class="form-control p_input"
                                                    required>
                                            </div>
                                            <div class="form-group col-12">
                                                <label>Nueva contraseña</label>
                                                <input type="password" name="new_password" class="form-control p_input"
                                                    required>
                                            </div>
                                            <button type="submit" name="actualizar"
                                                class="btn btn-inverse-primary btn-rounded px-4 py-2 mt-3 mx-auto">
                                                <label class="h5 m-0">Actualizar</label>
                                            </button>
                                        </div>
                                    </form>
                                </div>
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