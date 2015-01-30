<?php
session_start();
if(isset($_SESSION['url']))
{
	$Municipio=$_SESSION['url'];
	
	if($Municipio!='Seleccione')
	{
		
		$ruta = '../../calitativa/'.$Municipio.'/';
		$mensage = '';
		foreach ($_FILES as $key)
		{
			if($key['error'] == UPLOAD_ERR_OK )
			{
				$NombreOriginal = $key['name'];
				$temporal = $key['tmp_name'];
				$Destino = $ruta.$NombreOriginal;			
				move_uploaded_file($temporal, $Destino);
			}
			if ($key['error']=='')
			{
				$mensage .= '<strong>'.$NombreOriginal.'</strong> Subido correctamente. <br>';
			}
		}
	}
	else
	{
		$mensage = '<strong>Debe seleccionar un municipio para subir</strong>';
	}
}
else
{
	$mensage = '<strong>Debe seleccionar un municipio para subir</strong>';
}
echo $mensage;
?>