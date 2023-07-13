<?php
$src = '../';
require '../services/producto_dao.php';
$productoDao = new ProductoDao;

if (isset($_POST['producto'])) {
    $producto = $productoDao->buscar($_POST['producto']);
    echo json_encode($producto);
}
?>