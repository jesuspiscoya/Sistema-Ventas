<?php
$src = '../';
require '../services/producto_dao.php';
$productoDao = new ProductoDao;

if (isset($_POST['agregar'])) {
    session_start();
    $array = $_SESSION['carrito'];
    $producto = $productoDao->buscar($_POST['agregar']);
    $array[] = $producto;
    $_SESSION['carrito'] = $array;
    echo json_encode($producto);
}
?>