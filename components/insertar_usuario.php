<!-- Modal -->
<div class="modal fade" id="insertar" tabindex="-1" aria-labelledby="insertarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header card flex-row">
                <h3 class="mb-0">Registrar Usuario</h3>
                <div class="btn btn-inverse-danger btn-rounded" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark m-0 h4"></i>
                </div>
            </div>
            <form action="" method="post">
                <div class="modal-body card">
                    <div class="form-group">
                        <label>Nombre completo</label>
                        <input type="text" name="nombre" class="form-control p_input" required>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-sm-6">
                            <label>DNI</label>
                            <input type="text" name="dni" class="form-control p_input" required maxlength="8">
                        </div>
                        <div class="form-group col-12 col-sm-6">
                            <label>Teléfono</label>
                            <input type="tel" name="telefono" class="form-control p_input" required maxlength="9">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" name="direccion" class="form-control p_input" required>
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" name="correo" class="form-control p_input" required>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-sm-6">
                            <label>Usuario</label>
                            <input type="text" name="usuario" class="form-control p_input" required>
                        </div>
                        <div class="form-group col-12 col-sm-6">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control p_input" required>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <label>Permisos</label>
                        <div class="row">
                            <div class="form-group col mb-0">
                                <div class="d-flex flex-column flex-sm-row">
                                    <label class="switch">
                                        <input class="input-switch" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                    <span>Usuarios</span>
                                </div>
                            </div>
                            <div class="form-group col mb-0">
                                <div class="d-flex flex-column flex-sm-row align-items-center">
                                    <label class="switch">
                                        <input class="input-switch" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                    <span>Clientes</span>
                                </div>
                            </div>
                            <div class="form-group col mb-0">
                                <div class="d-flex flex-column flex-sm-row align-items-end">
                                    <label class="switch">
                                        <input class="input-switch" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                    <span>Productos</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-inverse-primary btn-rounded px-4 py-2">
                        <i class="fa-solid fa-user-plus my-1"></i>Registrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (!empty($_POST)) {
    $usuario = new Usuario;
    $usuario->nombre = $_POST['nombre'];
    $usuario->dni = $_POST['dni'];
    $usuario->telefono = $_POST['telefono'];
    $usuario->direccion = $_POST['direccion'];
    $usuario->correo = $_POST['correo'];
    $usuario->usuario = $_POST['usuario'];
    $usuario->password = $_POST['password'];
    $respuesta = $usuarioDao->insertar($usuario);

    if ($respuesta) {
        $mensaje = 'Usuario registrado con éxito.';
        $alert = 'success';
    } else {
        $mensaje = 'Error al resgistrar usuario.';
        $alert = 'danger';
    }
}
?>
<?php if (!empty($mensaje)) { ?>
    <div class="alert alert-<?php echo $alert ?> alert-dismissible fade show d-flex justify-content-between" role="alert">
        <span class="">
            <?php echo $mensaje ?>
        </span>
        <div class="btn p-0" data-bs-dismiss="alert" aria-label="Close">
            <i class="fa-solid fa-xmark text-<?php echo $alert ?> m-0 h3"></i>
        </div>
    </div>
<?php } ?>