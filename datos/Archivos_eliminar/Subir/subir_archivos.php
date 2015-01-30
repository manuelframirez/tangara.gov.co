<html lang="es">
<head>
<meta charset="UTF-8">
<title>Guardar Multiples Archivos</title>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<LINK REL=StyleSheet HREF="css/Admin.css" TYPE="text/css" MEDIA=screen>
<script src="Subir.js"></script>
<style type="text/css">
body
{
	font-size: 16px;
	text-align: center;
	width: 500px;
	margin: 0 auto;
}
.mensage
{
	border:dashed 1px #2A2365;
	background-color:#5B4CD8;
	color: #FFF;
	padding: 10px;
	text-align: left;
	margin: 10px auto;
	display: none;	
}
</style>
</head>
<body class="scFormPage">
 <h1>Subir archivos</h1>
		<!-- Formulario para subir los archivos -->
			<div class="mensage"></div>      
            <table class="scFormBorder">
				<tr>
					<td>Municipio</td>
					<td><?php
						@session_destroy();
						$directorio = opendir('../../calitativa/'); 
						echo '<select name="dir" id="ruta" onchange="LaRuta()">';
						echo '<option>Seleccione</option>';
						while ($archivo = readdir($directorio))
						{
							if (!is_dir($archivo)&&$archivo!='ico.png')
							{
								echo '<option value="'.$archivo.'">'.$archivo. '</option>';
							}
						}
						echo '</select>';
			?></td>
				</tr>
                <tr>
                    <td>Archivo</td>
                    <td><input type="file"  multiple="multiple" id="archivos"></td><!-- Este es nuestro campo input File-->
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><button id="enviar">Cargar archivos</button></td>
                </tr>    
            </table>
</body>
</html>