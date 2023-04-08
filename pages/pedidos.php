<!DOCTYPE html>
<html lang="es">

<?php $tittle = "Pedidos"; ?>
<?php $src = "../" ?>
<?php include '../components/_head.php' ?>
<?php $srcPage = "" ?>

<body>
    <style>
        .dataTables_length {
            left: 0;
        }
    </style>
    <div class="container-scroller">
        <?php include '../components/_sidebar.php'; ?>
        <div class="container-fluid page-body-wrapper">
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
                                        <?php for ($i = 1; $i < 12; $i++) { ?>
                                            <tr class="text-light">
                                                <td>
                                                    <?php echo $i ?>
                                                </td>
                                                <td>
                                                    <?php echo $i * 10000 ?>
                                                </td>
                                                <td>Direct
                                                    <?php echo $i ?>
                                                </td>
                                                <td>
                                                    <?php echo $i * 2 ?>
                                                </td>
                                                <td>
                                                    <?php echo "S/ " . $i * 15.8 ?>
                                                </td>
                                                <td>06/04/2023</td>
                                                <td><label class="badge badge-pill badge-success">Completado</label></td>
                                                <td class="p-0">
                                                    <div class="btn btn-inverse-warning">
                                                        <i class="fa-solid fa-pen m-0 my-2"></i>
                                                    </div>
                                                    <div class="btn btn-inverse-primary mx-1">
                                                        <i class="fa-solid fa-gear m-0 my-2"></i>
                                                    </div>
                                                    <div class="btn btn-inverse-danger">
                                                        <i class="fa-solid fa-file-pdf m-0 my-2"></i>
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
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/misc.js"></script>
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
    <script src="../assets/js/datatables.js"></script>
</body>

</html>