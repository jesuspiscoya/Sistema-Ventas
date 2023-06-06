<!-- Modal -->
<div class="modal fade" id="permisos" tabindex="-1" aria-labelledby="permisosLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header card flex-row">
                <h3 class="mb-0">Modificar Permisos</h3>
                <div class="btn btn-inverse-danger btn-rounded" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark m-0 h4"></i>
                </div>
            </div>
            <form action="" method="post">
                <div class="modal-body card">
                    <input type="hidden" id="cod_permiso" name="cod_permiso">
                    <div class="form-group mb-0">
                        <label>Permisos</label>
                        <div class="row">
                            <div class="form-group col mb-0">
                                <div class="d-flex flex-column flex-sm-row">
                                    <label class="switch">
                                        <input type="checkbox" id="usuarios" name="usuarios" class="input-switch"
                                            value="1">
                                        <span class="slider round"></span>
                                    </label>
                                    <span>Usuarios</span>
                                </div>
                            </div>
                            <div class="form-group col mb-0">
                                <div class="d-flex flex-column flex-sm-row align-items-center">
                                    <label class="switch">
                                        <input type="checkbox" id="clientes" name="clientes" class="input-switch"
                                            value="2">
                                        <span class="slider round"></span>
                                    </label>
                                    <span>Clientes</span>
                                </div>
                            </div>
                            <div class="form-group col mb-0">
                                <div class="d-flex flex-column flex-sm-row align-items-end">
                                    <label class="switch">
                                        <input type="checkbox" id="productos" name="productos" class="input-switch"
                                            value="3">
                                        <span class="slider round"></span>
                                    </label>
                                    <span>Productos</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" name="permisos" class="btn btn-inverse-primary btn-rounded px-4 py-2">
                        <i class="fa-solid fa-user-shield my-1"></i>Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['permisos'])) {
    if (isset($_POST['usuarios'])) {
        $respuesta = $usuarioDao->insertarPermiso($_POST['usuarios'], $_POST['cod_permiso']);
    } else {
        $respuesta = $usuarioDao->eliminarPermiso(1, $_POST['cod_permiso']);
    }
    if (isset($_POST['clientes'])) {
        $respuesta = $usuarioDao->insertarPermiso($_POST['clientes'], $_POST['cod_permiso']);
    } else {
        $respuesta = $usuarioDao->eliminarPermiso(2, $_POST['cod_permiso']);
    }
    if (isset($_POST['productos'])) {
        $respuesta = $usuarioDao->insertarPermiso($_POST['productos'], $_POST['cod_permiso']);
    } else {
        $respuesta = $usuarioDao->eliminarPermiso(3, $_POST['cod_permiso']);
    }

    if ($respuesta) {
        $mensaje = 'Permisos actualizados con éxito.';
        $alert = 'success';
    } else {
        $mensaje = 'Error al actualizar permisos.';
        $alert = 'danger';
    }
}
?>