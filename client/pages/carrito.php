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
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Sub Total</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="lista-pedido"></tbody>
                            <!-- <tr>
                                    <th colspan="4" class="text-right text-white">SUB TOTAL :</th>
                                    <th>
                                        <p id="subtotal" class="my-auto text-white"></p>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-right text-white">IGV :</th>
                                    <th>
                                        <p id="igv" class="my-auto text-white"></p>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-right text-success">TOTAL :</th>
                                    <th>
                                        <p id="total" class="my-auto text-success"></p>
                                    </th>
                                </tr> -->
                        </table>
                        <div class="d-flex justify-content-center ml-auto w-50 mr-4 pr-5 mt-3">
                            <div class="d-flex flex-column align-items-end mr-5">
                                <p class="font-weight-bold text-white">SUBTOTAL :</p>
                                <p class="font-weight-bold text-white">IGV :</p>
                                <p class="font-weight-bold text-success">TOTAL :</p>
                            </div>
                            <div class="d-flex flex-column align-items-start">
                                <p id="subtotal" class="font-weight-bold text-white"></p>
                                <p id="igv" class="font-weight-bold text-white"></p>
                                <p id="total" class="font-weight-bold text-success"></p>
                            </div>
                        </div>
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
                            <button class="btn btn-success btn-block py-3" onclick="realizarPedido()">Realizar pedido</button>
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