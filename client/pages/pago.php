<!DOCTYPE html>
<html lang="es">

<?php $tittle = 'Pago'; ?>
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
                <h2 class="text-center">Selecciona tu Medio de Pago</h2>
                <div class="mb-sm-5 mb-md-4 mx-auto mt-5" style="margin-bottom: 60px;">
                    <div class="cliente font-weight-bold mt-md-2 mb-2">Cliente:
                        Jesus Piscoya
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Efectivo
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                            checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Tarjeta de débito/crédito
                        </label>
                    </div>
                </div>
                <div class="container d-flex justify-content-center mx-auto pb-4 pb-sm-2 pb-md-0 px-2 mt-5"
                    style="margin-bottom: 62px;">
                    <div class="col-12 col-sm-8 col-md-6 col-xl-4 mb-2">
                        <a href="../../"
                            class="btn btn-success btn-block py-3 text-uppercase font-weight-bold">ACEPTAR</a>
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