<!DOCTYPE html>
<html lang="es">

<?php $tittle = 'CompuCenter'; ?>
<?php $src = 'client/' ?>
<?php $inicio = '' ?>
<?php require 'client/components/_head.php' ?>
<?php require 'client/services/producto_dao.php' ?>
<?php $productoDao = new ProductoDao ?>

<!-- <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/popper.min.js"></script>
</head> -->

<body>
    <?php require 'client/components/_navbar.php'; ?>
    <main>
        <div class="pricing-header my-4 pt-5 text-center">
            <h2 class="mt-4">Lista de Productos</h2>
            <p class="lead">Selecciona uno de nuestros productos y accede a un descuento</p>
        </div>
        <div class="content-wrapper" id="lista-productos">
            <div class="mb-3 text-center row">
                <?php $array = $productoDao->listar();
                for ($i = 0; $i < count($array); $i++) { ?>
                    <div class="grid-margin col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-bold">
                                    <?php echo $array[$i]->nombre ?>
                                </h4>
                            </div>
                            <div class="card-body">
                                <img src="data:image/jpg;base64,<?php echo base64_encode($array[$i]->imagen) ?>"
                                    class="card-img-top" alt="Imagen producto">
                                <h1 class="card-title pricing-card-title precio">S/.
                                    <span>
                                        <?php echo $array[$i]->precio ?>
                                    </span>
                                </h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <?php echo $array[$i]->descripcion ?>
                                    <!-- ${producto.detalles
                                .map(
                                (ele) => `
                                <li>${ele}</li>
                                `
                                )
                                .join("")} -->
                                </ul>
                                <a href="" class="btn btn-block btn-primary agregar-carrito"
                                    data-id="<?php echo $array[$i]->codigo ?>">Comprar</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
    </main>
    <?php require 'client/components/_footer.php'; ?>

    <script src="client/js/carrito.js"></script>
    <script src="client/js/pedido.js"></script>
</body>

</html>