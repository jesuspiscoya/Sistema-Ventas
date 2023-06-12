<!DOCTYPE html>
<html lang="es">

<?php $tittle = 'CompuCenter'; ?>
<?php $src = 'client/' ?>
<?php $srcPage = 'client/pages/' ?>
<?php $inicio = '' ?>
<?php require 'client/components/_head.php' ?>
<?php require 'client/services/producto_dao.php' ?>
<?php require 'client/components/_validar_session.php' ?>
<?php $productoDao = new ProductoDao ?>

<body>
    <?php require 'client/components/_navbar.php'; ?>
    <main>
        <?php if (!empty($mensaje)) { ?>
            <div class="d-flex position-absolute w-100 justify-content-center" style="margin-top: 60px;">
                <div class="alert alert-<?php echo $alert ?> alert-dismissible fade show d-flex justify-content-between w-50"
                    role="alert">
                    <span class="">
                        <?php echo $mensaje ?>
                    </span>
                    <div class="btn p-0" data-bs-dismiss="alert" aria-label="Close">
                        <i class="fa-solid fa-xmark text-<?php echo $alert ?> m-0 h3"></i>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="my-4 pt-5 text-center">
            <h2 class="mt-4">Lista de Productos</h2>
            <p class="lead">Selecciona uno de nuestros productos y accede a un descuento</p>
        </div>
        <div class="content-wrapper">
            <div class="mb-3 text-center row px-lg-5">
                <?php $array = $productoDao->listar();
                for ($i = 0; $i < count($array); $i++) {
                    if ($array[$i]->estado) { ?>
                        <div class="grid-margin col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header">
                                    <h4 class="mt-2 font-weight-bold">
                                        <?php echo $array[$i]->nombre ?>
                                    </h4>
                                </div>
                                <div class="card-body pt-0">
                                    <img src="data:image/jpg;base64,<?php echo base64_encode($array[$i]->imagen) ?>"
                                        class="card-img-top" alt="Imagen producto">
                                    <h1 class="h2 text-success my-3">S/.
                                        <?php echo $array[$i]->precio ?>
                                    </h1>
                                    <ul>
                                        <?php echo $array[$i]->descripcion ?>
                                        <!-- ${producto.detalles
                                        .map(
                                        (ele) => `
                                        <li>${ele}</li>
                                        `
                                        )
                                        .join("")} -->
                                    </ul>
                                    <button class="btn btn-block btn-primary"
                                        onclick="agregarProducto(<?php echo $array[$i]->codigo ?>)">Agregar</button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
    </main>
    <?php require 'client/components/_footer.php'; ?>

    <script src="client/js/carrito.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", leerLocalStorage());
    </script>
</body>

</html>