<!DOCTYPE html>
<html lang="es">

<?php $tittle = "Usuarios"; ?>
<?php $src = "../" ?>
<?php include '../components/_head.php' ?>
<?php $srcPage = "" ?>

<body>
    <div class="container-scroller">
        <?php include '../components/_sidebar.php'; ?>
        <div class="container-fluid page-body-wrapper">
            <?php include '../components/_navbar.php'; ?>
            <div class="main-panel">
                <div class="content-wrapper pt-4 pb-0">
                    <div class="card border-0 mb-4">
                        <div class="card-body">
                            <h3 class="card-title position-absolute mb-3">Usuarios</h3>
                            <div class="table-responsive">
                                <table class="table table-hover w-100 pt-5 pt-md-1" id="dataTableUsuarios">
                                    <thead class="thead-dark">
                                        <tr class="text-uppercase">
                                            <th style="width: 15px;">#</th>
                                            <th style="width: 60px;">código</th>
                                            <th>nombre completo</th>
                                            <th>correo</th>
                                            <th style="width: 90px;">fech. nac.</th>
                                            <th style="width: 50px;">dni</th>
                                            <th style="width: 80px;">teléfono</th>
                                            <th>dirección</th>
                                            <th style="width: 80px;">acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 1; $i < 25; $i++) { ?>
                                            <tr class="text-light">
                                                <td>
                                                    <?php echo $i ?>
                                                </td>
                                                <td>
                                                    <?php echo $i * 10000 ?>
                                                </td>
                                                <td>
                                                    <?php echo "Nombre " . $i . " Apellido " . $i ?>
                                                </td>
                                                <td>
                                                    <?php echo "correo" . $i . "@gmail.com" ?>
                                                </td>
                                                <td>03/05/2001</td>
                                                <td>
                                                    <?php echo $i * 1000000 ?>
                                                </td>
                                                <td>
                                                    <?php echo "99999999" . $i ?>
                                                </td>
                                                <td>
                                                    <?php echo "Av. Dirección" . $i ?>
                                                </td>
                                                <td class="py-2">
                                                <div class="btn btn-inverse-warning">
                                                        <i class="fa-solid fa-pen m-0 my-2"></i>
                                                    </div>
                                                    <div class="btn btn-inverse-primary mx-1">
                                                        <i class="fa-solid fa-gear m-0 my-2"></i>
                                                    </div>
                                                    <div class="btn btn-inverse-danger">
                                                        <i class="fa-solid fa-trash-can m-0 my-2"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="position-absolute button-add">
                                    <button type="button" class="btn btn-inverse-primary btn-rounded px-3">
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