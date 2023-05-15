<!DOCTYPE html>
<html lang="es">

<?php $tittle = 'Carrito'; ?>
<?php $src = '../' ?>
<?php $inicio = '../../' ?>
<?php require '../components/_head.php' ?>

<!-- <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="js/popper.min.js"></script>
</head> -->

<body>
    <?php require '../components/_navbar.php'; ?>
    <main>
        <div class="container">
            <div class="row my-5 py-5">
                <div class="col">
                    <h2 class="d-flex justify-content-center mb-3">Realizar Compra</h2>
                    <form id="procesar-pago">
                        <div class="form-group row">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Cliente :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="cliente"
                                    placeholder="Ingresa nombre cliente" name="destinatario">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-12 col-md-2 col-form-label h2">Correo :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="correo" placeholder="Ingresa tu correo"
                                    name="cc_to">
                            </div>
                        </div>
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
                            <img id="cargando" src="../assets/img/cargando.gif" width="220">
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