<?php
include_once('../BaseDatos/conexion.php');
include_once Config::$home_bin . Config::$ds . 'db' . Config::$ds . 'active_table.php';
$con = App::$base;

$id=$_POST['id'];
$id_municipio=$_POST['id_municipio'];
$i = atable::Make('indicadores');
$i->load("`id_indicadores` = '$id'");
$indicador= $i->nombre;
$M = atable::Make('municipio');
$M->load("`idmunicipio` = '$id_municipio'");
$Municipio= $M->nombremunicipio;

echo json_encode(array($indicador,'Municipio de '.$Municipio));
?>