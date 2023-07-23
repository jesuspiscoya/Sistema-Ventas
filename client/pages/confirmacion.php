<!DOCTYPE html>
<html lang="es">

<?php $tittle = 'Confirmación'; ?>
<?php $src = '../' ?>
<?php $srcPage = '' ?>
<?php $inicio = '../../' ?>
<?php require '../components/_head.php' ?>
<?php require '../components/_validar_session.php' ?>

<body>
    <?php require '../components/_navbar.php'; ?>
    <main>
        <div class="container">
            <div class="d-flex flex-column my-5 py-5">
                <h2 class="text-center">¡Pedido Confirmado!</h2>
                <span class="text-center mb-3 mb-md-4 text-warning">Su pedido se ha procesado correctamente, gracias por
                    comprar en CompuCenter.</span>
                <div class="table-responsive mb-sm-5 mb-md-4" style="margin-bottom: 60px;">
                    <div class="d-flex justify-content-between mb-2 p-1">
                        <div class="cliente font-weight-bold mt-md-2 mb-2">Cliente:
                            <?php echo $nombre ?>
                        </div>
                        <a href="../components/boleta.php" target="_blank" class="btn btn-inverse-danger px-3 py-2 my-auto">
                            <i class="fa-solid fa-file-pdf mr-2"></i>Boleta
                        </a>
                    </div>
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr class="text-uppercase">
                                <th style="width: 50px;">#</th>
                                <th>Nombre</th>
                                <th style="width: 120px;">Precio</th>
                                <th style="width: 50px;">Cantidad</th>
                                <th style="width: 140px;">Monto</th>
                            </tr>
                        </thead>
                        <tbody id="lista-pedido"></tbody>
                    </table>
                </div>
                <div class="container d-flex justify-content-center position-fixed fixed-bottom mx-auto pb-4 pb-sm-2 pb-md-0 px-2"
                    style="margin-bottom: 62px;">
                    <div class="col-12 col-sm-8 col-md-6 col-xl-4 mb-2">
                        <a href="../../"
                            class="btn btn-success btn-block py-3 text-uppercase font-weight-bold">REGRESAR</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <?php require '../components/_footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', leerPedidoConfirmado());
    </script>
</body>

</html>