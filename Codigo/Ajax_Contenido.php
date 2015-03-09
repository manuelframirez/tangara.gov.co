<?php
include_once('../BaseDatos/conexion.php');
include_once Config::$home_bin . Config::$ds . 'db' . Config::$ds . 'active_table.php';
$con = App::$base;
$Tipo = $_POST['Contenido'];
$t = atable::Make('contenidos');
$t->load("`Titulo` = '$Tipo'");
echo $t->contenido;
