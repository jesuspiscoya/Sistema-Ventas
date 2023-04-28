<!DOCTYPE html>
<html lang="es">

<?php $tittle = "Productos"; ?>
<?php $src = "../" ?>
<?php require '../components/_head.php' ?>
<?php $srcPage = "" ?>
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
                                            <th style="width: 15px;">#</th>
                                            <th style="width: 60px;">código</th>
                                            <th style="width: 180px;">categoria</th>
                                            <th>producto</th>
                                            <th style="width: 70px;">precio</th>
                                            <th style="width: 60px;">stock</th>
                                            <th style="width: 100px;">estado</th>
                                            <th style="width: 80px;">acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $productoDao = new ProductoDao();
                                        $array = $productoDao->listar();
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
                                                    <button class="btn btn-inverse-warning mx-1" data-bs-toggle="modal"
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
    <!-- Custom Bootstrap 5 Js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script src="../assets/libraries/js/vendor.bundle.base.js"></script>
    <script src="../js/hoverable-collapse.js"></script>
    <script src="../js/off-canvas.js"></script>
    <script src="../js/misc.js"></script>
    <!-- Plugins Datatables Js -->
    <script src="../assets/libraries/datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="../assets/libraries/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="../assets/libraries/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <!-- Datatables Js -->
    <script src="../assets/libraries/datatables/DataTables-1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="../assets/libraries/datatables/DataTables-1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <!-- Datatables Buttons Js -->
    <script src="../assets/libraries/datatables/Buttons-2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="../assets/libraries/datatables/Buttons-2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="../assets/libraries/datatables/Buttons-2.3.6/js/buttons.html5.min.js"></script>
    <script src="../assets/libraries/datatables/Buttons-2.3.6/js/buttons.print.min.js"></script>
    <!-- Custom Datatables Js -->
    <script src="../js/datatables.js"></script>
    <script src="../js/ajax-backend.js"></script>
</body>

</html>