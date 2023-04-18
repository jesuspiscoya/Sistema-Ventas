<?php
require '../services/usuario_dao.php';

$usuarioDao = new UsuarioDao;
if (isset($_POST['modificar'])) {
    $usuario = $usuarioDao->buscar($_POST['modificar']);
    echo json_encode($usuario);
}
if (isset($_POST['permisos'])) {
    $permisos = $usuarioDao->buscarPermisos($_POST['permisos']);
    echo json_encode($permisos);
}
if (isset($_POST['eliminar'])) {
    $eliminar = $usuarioDao->buscar($_POST['eliminar']);
    echo json_encode($eliminar);
}
?>