<?php
include_once('../BaseDatos/conexion.php');
$con = new conexion();
$id=$_POST['id'];
$id_municipio=$_POST['id_municipio'];
$sql="SELECT `Nombre` FROM `indicadores` WHERE `indicadores`.`id_indicadores` = '$id'";
$Indicador=$con->TablaDatos($sql);
$sql="SELECT `municipio`.`nombreMunicipio` FROM `municipio` WHERE `municipio`.`idmunicipio` = '".$id_municipio."'";
$Municipio=$con->TablaDatos($sql);
echo $Indicador[0][0].';Municipio de '.$Municipio[0][0];
?>