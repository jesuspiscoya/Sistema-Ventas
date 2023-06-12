<!DOCTYPE html>
<html lang="es">

<?php $tittle = 'Carrito'; ?>
<?php $src = '../' ?>
<?php $srcPage = '' ?>
<?php $inicio = '../../' ?>
<?php require '../components/_head.php' ?>
<?php require '../components/_validar_session.php' ?>

<body>
    <?php require '../components/_navbar.php'; ?>
    <main>
        <div class="container">
            <div class="row my-5 py-5">
                <div class="col">
                    <h2 class="text-center mb-4">Realizar Pedido</h2>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr class="text-uppercase">
                                    <th style="width: 100px;">Imagen</th>
                                    <th>Nombre</th>
                                    <th style="width: 120px;">Precio</th>
                                    <th style="width: 170px;">Cantidad</th>
                                    <th style="width: 140px;">Sub Total</th>
                                    <th style="width: 70px;">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="lista-pedido"></tbody>
                            <tr>
                                <th colspan="4" class="text-right text-white border-0">SUB TOTAL :</th>
                                <th class="border-0">
                                    <p id="subtotal" class="my-auto text-white"></p>
                                </th>
                                <th class="border-0"></th>
                            </tr>
                            <tr>
                                <th colspan="4" class="text-right text-white border-0">IGV :</th>
                                <th class="border-0">
                                    <p id="igv" class="my-auto text-white"></p>
                                </th>
                                <th class="border-0"></th>
                            </tr>
                            <tr>
                                <th colspan="4" class="text-right text-success border-0">TOTAL :</th>
                                <th class="border-0">
                                    <p id="total" class="my-auto text-success"></p>
                                </th>
                                <th class="border-0"></th>
                            </tr>
                        </table>
                    </div>
                    <div class="row justify-content-center" id="loaders">
                        <div class="cargando" id="cargando">
                            <div class="pelotas"></div>
                            <div class="pelotas"></div>
                            <div class="pelotas"></div>
                            <span class="texto-cargando font-weight-bold">Cargando...</span>
                        </div>
                    </div>
                    <div class="row justify-content-between mt-2 mt-md-4">
                        <div class="col-12 col-md-4 mb-2">
                            <a href="../../" class="btn btn-info btn-block py-3">Seguir navegando</a>
                        </div>
                        <div class="col-12 col-md-4">
                            <button class="btn btn-success btn-block py-3" onclick="realizarPedido()">Realizar
                                pedido</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require '../components/_footer.php'; ?>

    <script src="../js/carrito.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', leerLocalStoragePedido());
        calcularTotal();
    </script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2.3.2/dist/email.min.js"></script>
</body>

</html>