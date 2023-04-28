<!-- Modal -->
<div class="modal fade" id="registrar" tabindex="-1" aria-labelledby="registrarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header card flex-row">
                <h3 class="mb-0">Registrar Nuevo Producto</h3>
                <div class="btn btn-inverse-danger btn-rounded" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark m-0 h4"></i>
                </div>
            </div>
            <form action="" method="post">
                <div class="modal-body card">
                    <div class="form-group">
                        <label>Producto</label>
                        <input type="text" name="nombre" class="form-control p_input" required>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea name="descripcion" class="form-control p_input" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Categoría</label>
                        <input type="hidden" name="categoria" id="categoria">
                        <div class="dropdown d-flex">
                            <button class="col btn btn-outline-primary dropdown-toggle py-2" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" id="labelCategoria">Seleccione... </button>
                            <div class="dropdown-menu" aria-labelledby="categoria" id="dropdownCategoria">
                                <?php $array = $productoDao->categorias();
                                foreach ($array as $key => $value) { ?>
                                    <option class="dropdown-item" value="<?php echo $value->cod_categoria ?>"><?php echo $value->categoria ?>
                                    </option>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-sm-6">
                            <label>Precio</label>
                            <input type="text" name="precio" class="form-control p_input" required maxlength="7"
                                onkeypress="return soloNumeros(event)">
                        </div>
                        <div class="form-group col-12 col-sm-6">
                            <label>Stock</label>
                            <input type="text" name="stock" class="form-control p_input" required maxlength="4"
                                onkeypress="return soloNumeros(event)">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" name="registrar" class="btn btn-inverse-primary btn-rounded px-4 py-2">
                        <i class="fa-solid fa-tag my-1"></i>Registrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['registrar'])) {
    $producto = new Producto;
    $producto->nombre = $_POST['nombre'];
    $producto->descripcion = $_POST['descripcion'];
    $producto->precio = $_POST['precio'];
    $producto->stock = $_POST['stock'];
    $producto->categoria = $_POST['categoria'];
    $respuesta = $productoDao->insertar($producto);

    if ($respuesta) {
        $mensaje = 'Producto registrado con éxito.';
        $alert = 'success';
    } else {
        $mensaje = 'Error al resgistrar producto.';
        $alert = 'danger';
    }
}
?>