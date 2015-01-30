<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
		</title>
		<LINK REL=StyleSheet HREF="css/Admin.css" TYPE="text/css" MEDIA=screen>
	</head>
	<body class="scFormPage">
		<h1>Escoja los archivos que desea eliminar</h1>
		<form action="eliminar.php" method="post">
	<?php
	$Ruta='./../../calitativa/'.$_GET['dir'];
	$directorio = opendir($Ruta); 
	$list = '		<table class="scFormBorder">'."\n";
	while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
	{
		if (!is_dir($archivo)&&$archivo!='ico.png'&&$archivo!='index.php')//verificamos si es o no un directorio
		{
			$list .= '				<tr>'."\n";
			$list .= '					<td><input type="checkbox" name="archivo[]" value="'.$_GET['dir'].'/'.$archivo.'"></td>'."\n";
			$list .= '					<td>'.$archivo.'</td>'."\n";
			$list .= '				</tr>'."\n";
		}
		
	}
	$list .= '			</table>'."\n";
	echo $list;
	?>
			<input value="Eliminar" type="submit">
		</form>
	</body>
</html>