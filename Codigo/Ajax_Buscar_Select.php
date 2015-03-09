<?php
include_once './ClassVisual.php';
include_once './Datos.php';
include_once './FiltrosSelects.php';
$Selects = new Datos();
$Ver = new Visual();
$filtro=new FiltrosSelects();
$Tipo = $_POST['Tipo']; #Si es Dimension, Tematica o Indicador
$id = $_POST['ID']; #el id de la dimension, Tematica o Indicador
$sql = '';
$id_tipo = '';
$Buscar = '';
switch ($Tipo) {
    case 'Dimension': 
        $id_tipo = $filtro->id_Tipo($id);
        $Buscar = $Selects->VerDimensiones($id_tipo);
        break;
    case 'Tematica':
        $id_tipo = $filtro->Tematica( $id);
        $id_dimension = $id_tipo['id_dimension'];
        $id_value = $id_tipo['id_tematica'];
        $Buscar = $Selects->VerTematicas($id_dimension, $id_value);
        break;
    case 'Indicadores':
        $id_tipo = $filtro->Indicadores($id);
        $id_tematica = $id_tipo['id_tematica'];
        $id_value = $id_tipo['id_indicadores'];
        $Buscar = $Selects->VerIndicadores($id_tematica, $id_value);
        break;
}
echo $Buscar;