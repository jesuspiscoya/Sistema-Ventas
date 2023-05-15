<!-- Modal -->
<div class="modal fade" id="modificar" tabindex="-1" aria-labelledby="modificarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header card flex-row">
                <h3 class="mb-0">Modificar Usuario</h3>
                <div class="btn btn-inverse-danger btn-rounded" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark m-0 h4"></i>
                </div>
            </div>
            <form action="" method="post">
                <div class="modal-body card">
                    <input type="hidden" id="cod_modificar" name="codigo" class="form-control p_input">
                    <div class="form-group">
                        <label>Nombre completo</label>
                        <input type="text" id="nombre" name="nombre" class="form-control p_input" required>
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" id="correo" name="correo" class="form-control p_input" required>
                    </div>
                    <div class="row">
                        <input type="hidden" id="dni" name="dni" required>
                        <div class="form-group col-12 col-sm-6">
                            <label>DNI</label>
                            <input type="text" id="dni2" class="form-control p_input" disabled>
                        </div>
                        <div class="form-group col-12 col-sm-6">
                            <label>Teléfono</label>
                            <input type="tel" id="telefono" name="telefono" class="form-control p_input" required
                                maxlength="9">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" id="direccion" name="direccion" class="form-control p_input" required>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-sm-6">
                            <label for="old_password">Contraseña actual</label>
                            <input type="password" id="old_password" name="old_password" class="form-control p_input">
                        </div>
                        <div class="form-group col-12 col-sm-6">
                            <label for="new_password">Nueva contraseña</label>
                            <input type="password" id="new_password" name="new_password" class="form-control p_input">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" name="actualizar" class="btn btn-inverse-primary btn-rounded px-4 py-2">
                        <i class="fa-solid fa-user-pen my-1"></i>Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['actualizar'])) {
    $usuario = new Usuario;
    $usuario->codigo = $_POST['codigo'];
    $usuario->nombre = $_POST['nombre'];
    $usuario->correo = $_POST['correo'];
    $usuario->dni = $_POST['dni'];
    $usuario->telefono = $_POST['telefono'];
    $usuario->direccion = $_POST['direccion'];
    // $usuario->password = $_POST['password'];

    $respuesta = $usuarioDao->modificar($usuario);

    if ($respuesta) {
        $mensaje = 'Usuario actualizado con éxito.';
        $alert = 'success';
    } else {
        $mensaje = 'Error al actualizar usuario.';
        $alert = 'danger';
    }
}
?>