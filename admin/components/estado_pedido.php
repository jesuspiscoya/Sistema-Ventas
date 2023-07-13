<!-- Modal -->
<div class="modal fade" id="estado" tabindex="-1" aria-labelledby="estadoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header card flex-row align-items-center">
                <h4 id="titulo_estado" class="mb-0"></h4>
                <div class="btn btn-inverse-danger btn-rounded" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark m-0 h4"></i>
                </div>
            </div>
            <form action="" method="post">
                <div class="modal-footer justify-content-center">
                    <input type="hidden" id="cod_pedido" name="cod_pedido">
                    <div class="row">
                        <div class="form-group d-flex flex-column align-items-center my-3 mr-5">
                            <button type="submit" name="confirmar"
                                class="btn btn-inverse-success p-3 d-flex flex-column" value="1">
                                <i class="fa-regular fa-circle-check m-0 h1"></i>
                                <span class="mt-2">Confirmar</span>
                            </button>
                        </div>
                        <div class="form-group d-flex flex-column align-items-center my-3 ml-5">
                            <button type="submit" name="cancelar" class="btn btn-inverse-danger p-3 d-flex flex-column"
                                value="2">
                                <i class="fa-solid fa-ban m-0 h1"></i>
                                <span class="mt-2">Cancelar</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['confirmar']) || isset($_POST['cancelar'])) {
    $pedido = new Pedido;
    $pedido->codigo = $_POST['cod_pedido'];
    isset($_POST['confirmar']) ? $pedido->estado = $_POST['confirmar'] : $pedido->estado = $_POST['cancelar'];

    $respuesta = $pedidoDao->modificarEstado($pedido);

    if ($respuesta) {
        $mensaje = 'Pedido actualizado con éxito.';
        $alert = 'success';
    } else {
        $mensaje = 'Error al actualizar pedido.';
        $alert = 'danger';
    }
}
?>