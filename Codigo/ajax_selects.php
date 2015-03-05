<?php
include_once('Datos.php');
$id='';
$Select='';
$Res = new Datos();
$Opc=$_POST['Tipo'];
if(isset($_POST['ID']))
{$id=$_POST['ID'];}
switch ($Opc)
{
    case 'Tematica': $Select=$Res->VerTematicas($id); break;
    case 'Indicadores':$Select=$Res->VerIndicadores($id); break;
	case 'Dimension':$Select=$Res->VerDimensiones();break;
    	case 'Municipios':
		if(is_null($id) || $id=='')
		{
			$id='-1';
		}
		$Select=$Res->VerMunicipios($id);
	break;
}
echo $Select;
?>