<?php
	include_once('./graficar.php');
	$graficar = new graficar();
	$id_indicador=$_POST['id_indicador'];
	$id_municipio=$_POST['id_municipio'];
	$Grilla_Datos=Array();
	$Categorias=Array();
	$graficar->Municipio_Set("$id_municipio");
	$graficar->Indicador_Set("$id_indicador");
	$resultado=$graficar->VerValores();
    echo json_encode($resultado);
?>