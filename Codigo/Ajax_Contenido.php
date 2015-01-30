<?php

	include_once('../BaseDatos/conexion.php');
	$con = new conexion();
	$sql='';
	$Tipo=$_POST['Tipo'];
	if($Tipo=='Cauca')
	{
		$sql='SELECT `Acerca_cauca` FROM `contenido` where  `id_contenido`=1';
	}
	else
	{
		$sql='SELECT `Acerca_Tangara` FROM `contenido` where `id_contenido`=1';
	}
	$Datos = $con->TablaDatos($sql);
	echo $Datos[0][0];
?>