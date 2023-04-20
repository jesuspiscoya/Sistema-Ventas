<!DOCTYPE html>
<html lang="es">

<?php $tittle = "Pedidos"; ?>
<?php $src = "../" ?>
<?php require '../components/_head.php' ?>
<?php $srcPage = "" ?>
<?php require '../services/pedido_dao.php' ?>
<?php require '../components/_validar_session.php' ?>

<body>
    <style>
        .dataTables_length {
            left: 0;
        }
    </style>
    <div class="container-scroller">
        <?php include '../components/_sidebar.php'; ?>
        <div class="container-fluid page-body-wrapper mr-0">
            <?php include '../components/_navbar.php'; ?>
            <div class="main-panel">
                <div class="content-wrapper pt-4 pb-0">
                    <div class="card border-0 mb-4">
                        <div class="card-body">
                            <h3 class="card-title position-absolute mb-3">Pedidos</h3>
                            <div class="table-responsive">
                                <table class="table table-hover w-100 pt-5 pt-md-1" id="dataTablePedidos">
                                    <thead class="thead-dark">
                                        <tr class="text-uppercase">
                                            <th style="width: 15px;">#</th>
                                            <th style="width: 70px;">código</th>
                                            <th>cliente</th>
                                            <th style="width: 90px;">cantidad</th>
                                            <th style="width: 75px;">total</th>
                                            <th style="width: 90px;">fecha</th>
                                            <th style="width: 110px;">estado</th>
                                            <th style="width: 150px;">acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $pedidoDao = new PedidoDao();
                                        $array = $pedidoDao->listar();
                                        for ($i = 0; $i < count($array); $i++) { ?>
                                            <tr class="text-light">
                                                <td>
                                                    <?php echo $i + 1 ?>
                                                </td>
                                                <td>
                                                    <?php echo $array[$i]->codigo ?>
                                                </td>
                                                <td>
                                                    <?php echo $array[$i]->cliente ?>
                                                </td>
                                                <td>
                                                    <?php echo $array[$i]->cantidad ?>
                                                </td>
                                                <td>
                                                    <?php echo "S/ " . $array[$i]->total ?>
                                                </td>
                                                <td>
                                                    <?php echo $array[$i]->fecha ?>
                                                </td>
                                                <td>
                                                    <?php $estado;
                                                    if ($array[$i]->estado == 1)
                                                        $estado = 'Disponible';
                                                    else
                                                        $estado = 'No disponible'; ?>
                                                    <label class="badge badge-pill badge-success">
                                                        <?php echo $estado ?>
                                                    </label>
                                                </td>
                                                <td class="p-0">
                                                    <div class="btn btn-inverse-warning">
                                                        <i class="fa-solid fa-pen m-0 my-1"></i>
                                                    </div>
                                                    <div class="btn btn-inverse-primary mx-1">
                                                        <i class="fa-solid fa-gear m-0 my-1"></i>
                                                    </div>
                                                    <div class="btn btn-inverse-danger">
                                                        <i class="fa-solid fa-file-pdf m-0 my-1"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Custom Bootstrap 5 Js -->
    <script src="../assets/libraries/js/vendor.bundle.base.js"></script>
    <script src="js/hoverable-collapse.js"></script>
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
    <!-- Custom Pedidos Js -->
    <script src="../js/datatables.js"></script>
</body>

</html>