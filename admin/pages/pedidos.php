<!DOCTYPE html>
<html lang="es">

<?php $tittle = 'Pedidos'; ?>
<?php $src = '../' ?>
<?php $srcPage = '' ?>
<?php require '../components/_head.php' ?>
<?php require '../services/pedido_dao.php' ?>
<?php require '../components/_validar_session.php' ?>
<?php $pedidoDao = new PedidoDao ?>

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
    <?php require '../components/_footer.php'; ?>
</body>

</html>