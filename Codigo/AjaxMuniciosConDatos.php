<?php
include_once '../BaseDatos/conexion.php';
include_once './ClassVisual.php';
$id_indicador=$_POST['Indicador'];
$con = new conexion();
$Ver = new Visual();
$sql='SELECT 
  `municipio`.`idmunicipio`,
  `municipio`.`nombreMunicipio`
FROM
  `datos`
  INNER JOIN `municipio` ON (`datos`.`id_municipio` = `municipio`.`idmunicipio`)
  LEFT OUTER JOIN `variables` ON (`datos`.`id_variable` = `variables`.`id_variable`)
  LEFT OUTER JOIN `indicadores` ON (`variables`.`id_indicador` = `indicadores`.`id_indicadores`)
WHERE
  `indicadores`.`id_indicadores` = "'.$id_indicador.'"
GROUP BY
  `municipio`.`idmunicipio`';
echo $Ver->Select($con->TablaDatos($sql), 'var_id_municipio', '','id_municipio','CargarGraficador()');
?>