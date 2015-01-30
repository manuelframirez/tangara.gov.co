<?php
        include_once('./graficar.php');
	$graficar = new graficar();
	$id_indicador=$_POST['id'];
	$id_municipio=$_POST['id_municipio'];
	$graficar->Municipio_Set("$id_municipio");
	$graficar->Indicador_Set("$id_indicador");
	$resultado=$graficar->ValoresCategorias();
        $Res=array();
        foreach($resultado as $temp)
        {
            $Res[]=$temp[0];
        }
        echo json_encode($Res);
?>