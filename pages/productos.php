<!DOCTYPE html>
<html lang="es">

<?php $tittle = "Productos"; ?>
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
                            <h3 class="card-title position-absolute mb-3">Productos</h3>
                            <div class="table-responsive">
                                <table class="table table-hover w-100 pt-5 pt-md-1" id="dataTableProductos">
                                    <thead class="thead-dark">
                                        <tr class="text-uppercase">
                                            <th style="width: 15px;">#</th>
                                            <th style="width: 70px;">código</th>
                                            <th>prodcuto</th>
                                            <th style="width: 80px;">precio</th>
                                            <th style="width: 80px;">stock</th>
                                            <th style="width: 100px;">estado</th>
                                            <th style="width: 160px;">acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 1; $i < 18; $i++) { ?>
                                            <tr class="text-light">
                                                <td>
                                                    <?php echo $i ?>
                                                </td>
                                                <td>
                                                    <?php echo $i * 10000 ?>
                                                </td>
                                                <td>Prodcuto
                                                    <?php echo $i ?>
                                                </td>
                                                <td>S/
                                                    <?php echo $i * 3.95 ?>
                                                </td>
                                                <td>
                                                    <?php echo $i * 5 ?>
                                                </td>
                                                <td><label class="badge badge-pill badge-success">Disponible</label></td>
                                                <td class="p-0">
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
    <!-- Custom Datatables Js -->
    <script src="../assets/js/datatables.js"></script>
</body>

</html>