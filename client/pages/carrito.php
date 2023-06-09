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
                    <h2 class="text-center mb-4">Realizar Compra</h2>
                    <form id="procesar-pago">
                        <div id="carrito" class="form-group table-responsive">
                            <table class="form-group table" id="lista-compra">
                                <thead>
                                    <tr>
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tr>
                                    <th colspan="4" scope="col" class="text-right text-white">SUB TOTAL :</th>
                                    <th scope="col">
                                        <p id="subtotal" class="my-auto text-white"></p>
                                    </th>
                                    <th scope="col"></th>
                                </tr>
                                <tr>
                                    <th colspan="4" scope="col" class="text-right text-white">IGV :</th>
                                    <th scope="col">
                                        <p id="igv" class="my-auto text-white"></p>
                                    </th>
                                    <th scope="col"></th>
                                </tr>
                                <tr>
                                    <th colspan="4" scope="col" class="text-right text-success">TOTAL :</th>
                                    <th scope="col">
                                        <p id="total" class="my-auto text-success"></p>
                                    </th>
                                    <th scope="col"></th>
                                </tr>
                            </table>
                        </div>
                        <div class="row justify-content-center" id="loaders">
                            <div class="cargando">
                                <div class="pelotas"></div>
                                <div class="pelotas"></div>
                                <div class="pelotas"></div>
                                <span class="texto-cargando font-weight-bold">Cargando...</span>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="col-12 col-md-4 mb-2">
                                <a href="../../" class="btn btn-info btn-block py-3">Seguir comprando</a>
                            </div>
                            <div class="col-12 col-md-4">
                                <input type="submit" class="btn btn-success btn-block py-3" id="procesar-compra"
                                    value="Realizar compra">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php require '../components/_footer.php'; ?>
    <script src="../js/carrito.js"></script>
    <script src="../js/compra.js"></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2.3.2/dist/email.min.js"></script>
</body>

</html>