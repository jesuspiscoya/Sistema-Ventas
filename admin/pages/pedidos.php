<!DOCTYPE html>
<html lang="es">

<?php $tittle = 'Pedidos'; ?>
<?php $src = '../' ?>
<?php $srcPage = '' ?>
<?php require '../components/_head.php' ?>
<?php require '../services/pedido_dao.php' ?>
<?php require '../services/producto_dao.php' ?>
<?php require '../components/_validar_session.php' ?>
<?php $pedidoDao = new PedidoDao ?>
<?php $productoDao = new ProductoDao ?>

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
                    <!-- Modals de botones -->
                    <?php include '../components/modificar_pedido.php' ?>
                    <?php include '../components/estado_pedido.php' ?>
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
                    <div class="alert alert-dismissible fade show d-none justify-content-between" role="alert">
                        <span id="label"></span>
                        <div class="btn p-0" data-bs-dismiss="alert" aria-label="Close">
                            <i id="close" class="fa-solid fa-xmark m-0 h3"></i>
                        </div>
                    </div>
                    <div class="card border-0 mb-4">
                        <div class="card-body">
                            <h3 class="card-title position-absolute mb-3">Pedidos</h3>
                            <div class="table-responsive">
                                <table class="table table-hover w-100 pt-5 pt-md-1" id="dataTablePedidos">
                                    <thead class="thead-dark">
                                        <tr class="text-uppercase">
                                            <th style="width: 15px;">#</th>
                                            <th style="width: 60px;">código</th>
                                            <th>cliente</th>
                                            <th style="width: 80px;">cantidad</th>
                                            <th style="width: 75px;">total</th>
                                            <th style="width: 150px;">fecha</th>
                                            <th style="width: 100px;">estado</th>
                                            <th style="width: 125px;">acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $array = $pedidoDao->listar();
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
                                                    <?php
                                                    if ($array[$i]->estado == 0) {
                                                        $estado = 'Pendiente';
                                                        $color = 'warning';
                                                    } else if ($array[$i]->estado == 1) {
                                                        $estado = 'Confirmado';
                                                        $color = 'success';
                                                    } else {
                                                        $estado = 'Cancelado';
                                                        $color = 'danger';
                                                    }
                                                    ?>
                                                    <label class="badge badge-pill badge-<?php echo $color ?>">
                                                        <?php echo $estado ?>
                                                    </label>
                                                </td>
                                                <td class="p-0">
                                                    <button class="btn btn-inverse-warning" data-bs-toggle="modal"
                                                        data-bs-target="#modificar"
                                                        onclick="modificarPedido(<?php echo $array[$i]->codigo ?>)">
                                                        <i class="fa-solid fa-pen m-0 my-1"></i>
                                                    </button>
                                                    <button class="btn btn-inverse-primary mx-1" data-bs-toggle="modal"
                                                        data-bs-target="#estado"
                                                        onclick="estadoPedido(<?php echo $array[$i]->codigo ?>)">
                                                        <i class="fa-solid fa-gear m-0 my-1"></i>
                                                    </button>
                                                    <a href="../components/boleta.php?codigo=<?php echo $array[$i]->codigo ?>"
                                                        target="_blank" class="btn btn-inverse-danger">
                                                        <i class="fa-solid fa-file-pdf m-0 my-1"></i>
                                                    </a>
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
    <?php require '../components/_footer.php'; ?>
</body>

</html>