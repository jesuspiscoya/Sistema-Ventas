<!-- Modal -->
<div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="eliminarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header card flex-row">
                <h3 class="mb-0">Eliminar Producto</h3>
                <div class="btn btn-inverse-danger btn-rounded" data-bs-toggle="modal" data-bs-target="#modificar"
                    data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark m-0 h4"></i>
                </div>
            </div>
            <div class="modal-body card text-danger">
                <label id="mensaje"></label>
            </div>
            <div class="modal-footer justify-content-center">
                <button class="btn btn-inverse-primary btn-rounded px-4 py-2" data-bs-toggle="modal"
                    data-bs-target="#modificar" data-bs-dismiss="modal">
                    <i class="fa-solid fa-rotate-left my-1"></i>Cancelar
                </button>
                <button id="eliminar_detalle" class="btn btn-inverse-danger btn-rounded px-4 py-2"
                    data-bs-toggle="modal" data-bs-target="#modificar" data-bs-dismiss="modal">
                    <i class="fa-solid fa-user-xmark my-1"></i>Eliminar
                </button>
            </div>
        </div>
    </div>
</div>