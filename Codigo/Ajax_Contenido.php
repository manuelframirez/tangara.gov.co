<?php
	include_once('../BaseDatos/conexion.php');
	include_once Config::$home_bin.Config::$ds.'db'.Config::$ds.'active_table.php';
	$con = App::$base;
	$sql='';
	$Tipo=$_POST['Tipo'];
	if($Tipo=='Cauca')
	{
		$sql='SELECT `Acerca_cauca` as "acerca" FROM `contenido` where  `id_contenido`=1';
	}
	else
	{
		$sql='SELECT `Acerca_Tangara` as "acerca" FROM `contenido` where `id_contenido`=1';
	}
	$res = $con->dosql($sql, array());
    $Acerca='';
    if (!$res -> EOF) 
    {
		$Acerca=$res->fields;
		$res->MoveNext();
	}
	echo utf8_encode($Acerca['acerca']);
?>