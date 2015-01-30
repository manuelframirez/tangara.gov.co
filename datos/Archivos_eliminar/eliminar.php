<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
		<?php
		$Eliminados=$_POST['archivo'];
		$Ruta='../../calitativa/';
		foreach($Eliminados as $el)
		{
			$el=$Ruta.$el;
			unlink($el);
		}
		header ('Location: ./index.php');
		?>
	</body>
</html>