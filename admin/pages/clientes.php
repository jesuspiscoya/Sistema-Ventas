<!DOCTYPE html>
<html lang="es">

<?php $tittle = "Clientes"; ?>
<?php $src = '../' ?>
<?php $srcPage = '' ?>
<?php require '../components/_head.php' ?>
<?php require '../services/cliente_dao.php' ?>
<?php require '../components/_validar_session.php' ?>
<?php $clienteDao = new ClienteDao ?>

<body>
    <style>
        .dataTables_length {
            left: 0;
        }
    </style>
    <div class="container-scroller">
        <?php require '../components/_sidebar.php'; ?>
        <div class="container-fluid page-body-wrapper mr-0">
            <?php require '../components/_navbar.php'; ?>
            <div class="main-panel">
                <div class="content-wrapper pt-4 pb-0">
                    <!-- Modals de botones -->
                    <?php include '../components/modificar_cliente.php' ?>
                    <?php include '../components/eliminar_cliente.php' ?>
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
                            <h3 class="card-title position-absolute mb-3">Clientes</h3>
                            <div class="table-responsive">
                                <table class="table table-hover w-100 pt-5 pt-md-1" id="dataTableUsuarios">
                                    <thead class="thead-dark">
                                        <tr class="text-uppercase">
                                            <th style="width: 15px;">#</th>
                                            <th style="width: 60px;">código</th>
                                            <th>nombre completo</th>
                                            <th>correo</th>
                                            <th style="width: 50px;">dni</th>
                                            <th style="width: 80px;">teléfono</th>
                                            <th>dirección</th>
                                            <th style="width: 60px;">acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $array = $clienteDao->listar();
                                        for ($i = 0; $i < count($array); $i++) { ?>
                                            <tr class="text-light">
                                                <td>
                                                    <?php echo $i + 1 ?>
                                                </td>
                                                <td>
                                                    <?php echo $array[$i]->codigo ?>
                                                </td>
                                                <td>
                                                    <?php echo $array[$i]->nombre ?>
                                                </td>
                                                <td>
                                                    <?php echo $array[$i]->correo ?>
                                                </td>
                                                <td>
                                                    <?php echo $array[$i]->dni ?>
                                                </td>
                                                <td>
                                                    <?php echo $array[$i]->telefono ?>
                                                </td>
                                                <td>
                                                    <?php echo $array[$i]->direccion ?>
                                                </td>
                                                <td class="py-2">
                                                    <button class="btn btn-inverse-primary mx-1" data-bs-toggle="modal"
                                                        data-bs-target="#modificar"
                                                        onclick="modificarCliente(<?php echo $array[$i]->codigo ?>)">
                                                        <i class="fa-solid fa-pen m-0 my-1"></i>
                                                    </button>
                                                    <button class="btn btn-inverse-danger" data-bs-toggle="modal"
                                                        data-bs-target="#eliminar"
                                                        onclick="eliminarCliente(<?php echo $array[$i]->codigo ?>)">
                                                        <i class="fa-solid fa-trash-can m-0 my-1"></i>
                                                    </button>
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