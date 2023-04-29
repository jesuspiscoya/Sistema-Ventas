<?php
$src = '../';
require '../services/cliente_dao.php';
$clienteDao = new ClienteDao;

if (isset($_POST['modificar'])) {
    $cliente = $clienteDao->buscar($_POST['modificar']);
    echo json_encode($cliente);
}
if (isset($_POST['eliminar'])) {
    $cliente = $clienteDao->buscar($_POST['eliminar']);
    echo json_encode($cliente);
}
?>