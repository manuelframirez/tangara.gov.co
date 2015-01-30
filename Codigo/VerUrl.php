<?php
include_once('../BaseDatos/conexion.php');
$con = new conexion();
$id=$_POST['id_indicador'];
$sql="SELECT 
  max(`variables`.`Nivel`) AS `n0`,
  max(`variables1`.`Nivel`) AS `n1`,
  max(`variables2`.`Nivel`) AS `n2`
FROM
  `datos`
  LEFT OUTER JOIN `variables` ON (`datos`.`id_variable` = `variables`.`id_variable`)
  LEFT OUTER JOIN `variables` `variables1` ON (`variables`.`id_padre` = `variables1`.`id_variable`)
  LEFT OUTER JOIN `variables` `variables2` ON (`variables1`.`id_padre` = `variables2`.`id_variable`)
WHERE
  `variables2`.`id_indicador` = $id OR 
  `variables1`.`id_indicador` = $id OR 
  `variables`.`id_indicador` = $id";
  $res=$con->TablaDatos($sql);
  $MasNivel=max($res[0]);
  $url='';
switch ($MasNivel) 
{
    case '1':
      $url='./datos/grid_datos_1/';#tabla de un nivel
    break;
    case '2':
      $url='./datos/grid_datos_2/';
    break;
    case '3':
      $url='./datos/grid_datos_3/';
    break;
    default: 
      $url='./error.html/';
    break;

}
echo $url;
?>