<?php
include_once'../BaseDatos/conexion.php';
include_once './ClassVisual.php';
include_once './Datos.php';
function Indicadores($sql)
{
    $con = new conexion();
    $Res=$con->TablaDatos($sql);
    return $Res[0];
}
function Tematica($sql)
{
    $con = new conexion();
    $Res=$con->TablaDatos($sql);
    return $Res[0];
}
function id_Tipo($sql)
{
    $con = new conexion();
    $Res=$con->TablaDatos($sql);
    return $Res[0][0];
}
$Selects = new Datos();
$Ver= new Visual();
$Tipo=$_POST['Tipo'];#Si es Dimension, Tematica o Indicador
$id=$_POST['ID'];#el id de la dimension, Tematica o Indicador
$sql='';
$id_tipo='';
$Buscar='';
switch ($Tipo)
{
    case 'Dimension': $sql='SELECT `dimension`.`id_dimension`
                        FROM `indicadores`
                        INNER JOIN `tematica` ON (`indicadores`.`fk_tematica` = `tematica`.`id_tematica`)
                        INNER JOIN `dimension` ON (`tematica`.`fk_Dimension` = `dimension`.`id_dimension`)
                        WHERE `indicadores`.`id_indicadores` = "'.$id.'"';
        $id_tipo =  id_Tipo($sql);
        $Buscar=$Selects->VerDimensiones($id_tipo);
    break;
    case 'Tematica':$sql='SELECT `tematica`.`id_tematica`, `dimension`.`id_dimension`
                          FROM `indicadores`
                          INNER JOIN `tematica` ON (`indicadores`.`fk_tematica` = `tematica`.`id_tematica`)
                          INNER JOIN `dimension` ON (`tematica`.`fk_Dimension` = `dimension`.`id_dimension`)
                          WHERE `indicadores`.`id_indicadores` = "'.$id.'"';
        $id_tipo = Tematica($sql);
        $id_dimension=$id_tipo['id_dimension']; 
        $id_value=$id_tipo['id_tematica'];
        $Buscar=$Selects->VerTematicas($id_dimension, $id_value);
    break;
    case 'Indicadores':$sql='SELECT  `tematica`.`id_tematica`, `dimension`.`id_dimension`, `indicadores`.`id_indicadores`
                          FROM `indicadores`
                            INNER JOIN `tematica` ON (`indicadores`.`fk_tematica` = `tematica`.`id_tematica`)
                            INNER JOIN `dimension` ON (`tematica`.`fk_Dimension` = `dimension`.`id_dimension`)
                          WHERE `indicadores`.`id_indicadores` = "'.$id.'"';
        $id_tipo = Indicadores($sql);
        $id_tematica=$id_tipo['id_tematica'];
        $id_value=$id_tipo['id_indicadores'];
        $Buscar=$Selects->VerIndicadores($id_tematica, $id_value);
    break;
}
echo $Buscar;