<!DOCTYPE html>
<html lang="es">

<?php $tittle = 'Productos'; ?>
<?php $src = '../' ?>
<?php $srcPage = '' ?>
<?php require '../components/_head.php' ?>
<?php require '../services/producto_dao.php' ?>
<?php require '../components/_validar_session.php' ?>
<?php $productoDao = new ProductoDao ?>

<body>
    <div class="container-scroller">
        <?php include '../components/_sidebar.php'; ?>
        <div class="container-fluid page-body-wrapper mr-0">
            <?php include '../components/_navbar.php'; ?>
            <div class="main-panel">
                <div class="content-wrapper pt-4 pb-0">
                    <!-- Modals de botones -->
                    <?php include '../components/registrar_producto.php' ?>
                    <?php include '../components/modificar_producto.php' ?>
                    <?php include '../components/eliminar_producto.php' ?>
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
                    <div class="card border-0 mb-4">
                        <div class="card-body">
                            <h3 class="card-title position-absolute mb-3">Productos</h3>
                            <div class="table-responsive">
                                <table class="table table-hover w-100 pt-5 pt-md-1" id="dataTableProductos">
                                    <thead class="thead-dark">
                                        <tr class="text-uppercase">
                                            <th style="width: 10px;">#</th>
                                            <th style="width: 50px;">código</th>
                                            <th style="width: 140px;">categoria</th>
                                            <th>producto</th>
                                            <th style="width: 70px;">precio</th>
                                            <th style="width: 60px;">stock</th>
                                            <th style="width: 100px;">estado</th>
                                            <th style="width: 70px;">acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $array = $productoDao->listar();
                                        for ($i = 0; $i < count($array); $i++) { ?>
                                            <tr class="text-light">
                                                <td>
                                                    <?php echo $i + 1 ?>
                                                </td>
                                                <td>
                                                    <?php echo $array[$i]->codigo ?>
                                                </td>
                                                <td>
                                                    <?php echo $array[$i]->categoria ?>
                                                </td>
                                                <td>
                                                    <img src="data:image/jpg;base64,<?php echo base64_encode($array[$i]->imagen) ?>" alt="Imagen producto" sizes="" srcset="" class="mr-2">
                                                    <?php echo $array[$i]->nombre ?>
                                                </td>
                                                <td>S/
                                                    <?php echo $array[$i]->precio ?>
                                                </td>
                                                <td>
                                                    <?php echo $array[$i]->stock ?>
                                                </td>
                                                <td>
                                                    <?php $estado;
                                                    if ($array[$i]->estado == 1) {
                                                        $estado = 'Disponible';
                                                        $color = 'success';
                                                    } else {
                                                        $estado = 'No disponible';
                                                        $color = 'danger';
                                                    } ?>
                                                    <label class="badge badge-pill badge-<?php echo $color ?>">
                                                        <?php echo $estado ?>
                                                    </label>
                                                </td>
                                                <td class="p-0">
                                                    <button class="btn btn-inverse-primary mx-1" data-bs-toggle="modal"
                                                        data-bs-target="#modificar"
                                                        onclick="modificarProducto(<?php echo $array[$i]->codigo ?>)">
                                                        <i class="fa-solid fa-pen m-0 my-1"></i>
                                                    </button>
                                                    <button class="btn btn-inverse-danger" data-bs-toggle="modal"
                                                        data-bs-target="#eliminar"
                                                        onclick="eliminarProducto(<?php echo $array[$i]->codigo ?>)">
                                                        <i class="fa-solid fa-trash-can m-0 my-1"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="position-absolute button-add">
                                    <button type="button" class="btn btn-inverse-primary btn-rounded px-3"
                                        data-bs-toggle="modal" data-bs-target="#registrar">
                                        <i class="fa-solid fa-circle-plus text-center my-1"></i>Agregar
                                    </button>
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