<!-- Modal -->
<div class="modal fade" id="modificar" tabindex="-1" aria-labelledby="modificarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header card flex-row">
                <h3 class="mb-0">Modificar Producto</h3>
                <div class="btn btn-inverse-danger btn-rounded" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark m-0 h4"></i>
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body card">
                    <input type="hidden" id="cod_producto" name="cod_producto">
                    <div class="form-group">
                        <label>Producto</label>
                        <input type="text" id="nombre" name="nombre" class="form-control p_input" required>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-control p_input" rows="4"
                            required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Categoría</label>
                        <input type="hidden" id="cod_categoria" name="cod_categoria">
                        <div class="dropdown d-flex">
                            <button class="col btn btn-outline-primary dropdown-toggle py-2" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" id="labelModificarCategoria">Seleccione...
                            </button>
                            <div class="dropdown-menu" aria-labelledby="categoria" id="dropdownModificarCategoria">
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
                            <input type="tel" id="precio" name="precio" class="form-control p_input" required
                                maxlength="7">
                        </div>
                        <div class="form-group col-12 col-sm-6">
                            <label>Stock</label>
                            <input type="tel" id="stock" name="stock" class="form-control p_input" required
                                maxlength="4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>File upload</label>
                        <input type="hidden" id="bd_imagen" name="bd_imagen">
                        <input type="file" name="imagen" class="file-upload-default" accept="image/*">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control" placeholder="Upload Image" disabled>
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group mb-1">
                        <label>Estado</label>
                        <div class="d-flex flex-column justify-content-center flex-sm-row mt-2">
                            <label class="my-auto">No disponible</label>
                            <label class="switch ml-2">
                                <input type="checkbox" id="estado" name="estado" class="input-switch" value="1">
                                <span class="slider round"></span>
                            </label>
                            <label class="my-auto">Disponible</label>
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
    $producto = new producto;
    $producto->codigo = $_POST['cod_producto'];
    $producto->nombre = $_POST['nombre'];
    $producto->descripcion = $_POST['descripcion'];
    $producto->cod_categoria = $_POST['cod_categoria'];
    $producto->precio = $_POST['precio'];
    $producto->stock = $_POST['stock'];
    if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
        $producto->imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    } else {
        $producto->imagen = $productoDao->buscarImagen($_POST['cod_producto']);
    }

    isset($_POST['estado']) ? $producto->estado = $_POST['estado'] : $producto->estado = 0;

    $respuesta = $productoDao->modificar($producto);

    if ($respuesta) {
        $mensaje = 'Producto actualizado con éxito.';
        $alert = 'success';
    } else {
        $mensaje = 'Error al actualizar producto.';
        $alert = 'danger';
    }
}
?>