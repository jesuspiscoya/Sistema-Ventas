<?php
$src = '../';
require '../services/pedido_dao.php';
require '../services/detalle_dao.php';
$pedidoDao = new PedidoDao;
$detalleDao = new DetalleDao;

if (isset($_POST['pedido'])) {
    $pedido = $pedidoDao->buscar($_POST['pedido']);
    echo json_encode($pedido);
}

if (isset($_POST['detalle'])) {
    $detalle = $detalleDao->buscar($_POST['detalle']);
    echo json_encode($detalle);
}

if (isset($_POST['modificar'])) {
    $detalle = new Detalle;
    $detalle->codigo = $_POST['modificar'];
    $detalle->cantidad = $_POST['cantidad'];
    $detalle->monto = $_POST['monto'];
    $detalle->pedido = $_POST['total'];
    $respuesta = $detalleDao->modificar($detalle);
    echo json_encode($respuesta);
}

if (isset($_POST['eliminar'])) {
    $detalle = $detalleDao->eliminar($_POST['eliminar']);
    echo json_encode($detalle);
}

if (isset($_POST['insertar'])) {
    $detalle = new Detalle;
    $detalle->pedido = $_POST['insertar'];
    $detalle->producto = $_POST['producto'];
    $detalle->cantidad = $_POST['cantidad'];
    $detalle->monto = $_POST['monto'];
    $respuesta = $detalleDao->insertar($detalle);
    echo json_encode($respuesta);
}

if (isset($_POST['actualizar'])) {
    $pedido = new Pedido;
    $pedido->codigo = $_POST['actualizar'];
    $pedido->cantidad = $_POST['cantidad'];
    $pedido->total = $_POST['total'];
    $respuesta = $pedidoDao->modificar($pedido);
    echo json_encode($respuesta);
}
?>