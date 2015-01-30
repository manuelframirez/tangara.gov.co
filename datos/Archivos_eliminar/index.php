<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<LINK REL=StyleSheet HREF="css/Admin.css" TYPE="text/css" MEDIA=screen>
	</head>
	<body class="scFormPage" border="1">
	<h1>Escoja el municipio<h1>
	<form action="Ver.php" method="get">
	<table class="scFormBorder" >
	<tr>
	<td>Municipios</td>
	<?php
	$directorio = opendir('../../calitativa/'); 
	echo '<td><select name="dir">';
	while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
	{
		if (!is_dir($archivo)&&$archivo!='ico.png')//verificamos si es o no un directorio
		{
			echo '<option value="'.$archivo.'">'.$archivo. '</option>';
		}
	}
	echo '</select><td>';
	?>
		<tr>
		</table>
		<input type="submit" value="buscar">
		</form>
	</body>
</html>