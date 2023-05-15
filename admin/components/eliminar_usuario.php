<!-- Modal -->
<div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="eliminarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header card flex-row">
                <h3 class="mb-0">Eliminar Usuario</h3>
                <div class="btn btn-inverse-danger btn-rounded" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark m-0 h4"></i>
                </div>
            </div>
            <form action="" method="post">
                <div class="modal-body card text-danger">
                    <input type="hidden" id="cod_eliminar" name="codigo" class="form-control p_input">
                    <label id="mensaje"></label>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-inverse-primary btn-rounded px-4 py-2" data-bs-dismiss="modal" aria-label="Close" onclick="return false">
                        <i class="fa-solid fa-rotate-left my-1"></i>Cancelar
                    </button>
                    <button type="submit" name="eliminar" class="btn btn-inverse-danger btn-rounded px-4 py-2">
                        <i class="fa-solid fa-user-xmark my-1"></i>Eliminar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['eliminar'])) {
    $respuesta = $usuarioDao->eliminar($_POST['codigo']);

    if ($respuesta) {
        $mensaje = 'Usuario eliminado con éxito.';
        $alert = 'success';
    } else {
        $mensaje = 'Error al eliminar usuario.';
        $alert = 'danger';
    }
}
?>