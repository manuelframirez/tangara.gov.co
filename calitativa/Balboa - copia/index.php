<html>
	<head>
	</head>
	<body align="center">
	<h1>Escoja el municipio<h1>
		<?php
		$directorio = opendir('../../calitativa/'); 

			echo '<form action="Ver.php" method="get">';
			echo '<select name="dir">';
			while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
			{
				if (!is_dir($archivo)&&$archivo!='ico.png')//verificamos si es o no un directorio
				{
					echo '<option value="'.$archivo.'">'.$archivo. '</option>';
				}
			}
			echo '</select><br><input type="submit" value="buscar">
		</form>';
		?>
	</body>
</html>