<!DOCTYPE html>
<html lang="es">

<?php $tittle = "Dashboard"; ?>
<?php $src = "" ?>
<?php include 'components/_head.php' ?>
<?php $srcPage = "pages/" ?>

<body>
    <div class="container-scroller">
        <?php include 'components/_sidebar.php'; ?>
        <div class="container-fluid page-body-wrapper">
            <?php include 'components/_navbar.php'; ?>
            <div class="main-panel">
                <div class="content-wrapper pt-4 pb-0">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8 d-flex flex-column justify-content-center">
                                            <h3>Usuarios</h3>
                                            <div class="d-flex align-items-center">
                                                <h3 class="mb-0">5</h3>
                                                <p class="text-success ml-2 mb-0 font-weight-medium">REGISTRADOS</p>
                                            </div>
                                        </div>
                                        <div class="col-4 d-flex justify-content-end align-items-center">
                                            <i class="fa-solid fa-user-group text-primary icon-lg"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8 d-flex flex-column justify-content-center">
                                            <h3>Clientes</h3>
                                            <div class="d-flex align-items-center">
                                                <h3 class="mb-0">10</h3>
                                                <p class="text-success ml-2 mb-0 font-weight-medium">REGISTRADOS</p>
                                            </div>
                                        </div>
                                        <div class="col-4 d-flex justify-content-end align-items-center">
                                            <i class="fa-solid fa-face-smile text-warning icon-lg"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8 d-flex flex-column justify-content-center">
                                            <h3>Productos</h3>
                                            <div class="d-flex align-items-center">
                                                <h3 class="mb-0">20</h3>
                                                <p class="text-success ml-2 mb-0 font-weight-medium">REGISTRADOS</p>
                                            </div>
                                        </div>
                                        <div class="col-4 d-flex justify-content-end align-items-center">
                                            <i class="fa-solid fa-tag text-info icon-lg"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8 d-flex flex-column justify-content-center">
                                            <h3>Pedidos</h3>
                                            <div class="d-flex align-items-center">
                                                <h3 class="mb-0">30</h3>
                                                <p class="text-success ml-2 mb-0 font-weight-medium">REGISTRADAS</p>
                                            </div>
                                        </div>
                                        <div class="col-4 d-flex justify-content-end align-items-center">
                                            <i class="fa-solid fa-receipt text-success icon-lg"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">productos más vendidos</h4>
                                    <canvas id="doughnutChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">total de ventas por mes</h4>
                                    <canvas id="areaChart" style="height:250px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include 'components/_footer.php'; ?>
            </div>
        </div>
    </div>
    <!-- Custom Bootstrap 5 Js -->
    <script src="assets/libraries/js/vendor.bundle.base.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- Custom Chart Js -->
    <script src="assets/libraries/chart.js/Chart.min.js"></script>
    <!-- Custom Dashboard Js -->
    <script src="assets/js/dashboard.js"></script>
</body>

</html>