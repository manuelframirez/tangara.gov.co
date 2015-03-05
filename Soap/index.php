<?php
include_once '../Codigo/WebServices.php';
require_once "lib/nusoap.php";
function DimensionesTematicasCategorias()
{
    $Datos = new WebServices();
    $Res = $Datos->DimensionesTematicasCategorias();
    return json_encode($Res);
}
function DatosTangara($id_indicador,$Municipio)
{
    $Datos = new WebServices();
    return json_encode($Datos->Datos($id_indicador, $Municipio));
}
function Municipios()
{
    $Datos = new WebServices();
    $Res = $Datos->Municipios();
    return json_encode($Res);
}
function json() {
    $indicador = array('Dimension' => array('cod' => '1', 'Nombre' => 'Económica'), 'Tematica' => array('cod' => '1', 'Nombre' => 'Agricultura ganaderia y pesca'), 'Municipio' => array('cod' => '1', 'Nombre' => 'Cauca'), 'Indicador' => array('cod' => '1', 'Nombre' => 'Explotacion bovina'), 'Cabcera' => 'Informacion', 'Fuente' => 'Fuente: Secretaria de Desarrollo Agropecuario y Fomento Economico - Consolidado pecuario EVA Cauca.');
    $X = array('categoria' => array('cod' => '1', 'Nombre' => '2008'), 'Variables' => array(array('cod' => '1', 'Nombre' => 'Produccion de leche'), array('cod' => '1', 'Nombre' => 'precio promedio')), 'valor' => '800');
    $Y = array('categoria' => array('cod' => '2', 'Nombre' => '2009'), 'Variables' => array(array('cod' => '1', 'Nombre' => 'Produccion de leche'), array('cod' => '1', 'Nombre' => 'precio promedio')), 'valor' => null);
    $Registros = array($X, $Y);
    $Z = array($indicador, $Registros);
    return json_encode($Z);
}

$server = new soap_server();
$server->register('DatosTangara');
$server->register('DimensionesTematicasCategorias');
$server->register('Municipios');
@$server->service($HTTP_RAW_POST_DATA);
?>