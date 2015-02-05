<?php
include_once './datos/sec/Usuarios.php';
header('Content-Type: text/html; charset=UTF-8');
$Usuario= new Usuarios();
$Usuario->CerrarSession();