<?php
header('Content-Type: text/html; charset=UTF-8');
include_once 'Usuarios.php';
$Usuario= new Usuarios();
$Usuario->UsuarioActivo('Administrador');
?>