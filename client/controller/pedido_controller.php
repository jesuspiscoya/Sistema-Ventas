<?php
$src = '../';
require '../services/pedido_dao.php';
require '../services/detalle_dao.php';

if (isset($_POST['pedido'])) {
    session_start();
    $pedidoDao = new PedidoDao;
    $detalleDao = new DetalleDao;
    $pedido = new Pedido;
    $pedido->cliente = $_SESSION['cid'];
    $pedido->cantidad = $_POST['cantidad'];
    $pedido->total = $_POST['total'];
    $respuesta = $pedidoDao->insertar($pedido);

    if ($respuesta) {
        foreach ($_POST['detalle'] as $key => $value) {
            $detalle = new Detalle;
            $detalle->producto = $value['codigo'];
            $detalle->cantidad = $value['cantidad'];
            $detalle->monto = $value['cantidad'] * $value['precio'];
            $respuesta = $detalleDao->insertar($detalle);
        }
    }

    echo json_encode($respuesta);
}
?>