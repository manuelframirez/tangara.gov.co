<html>
    <head>
        <LINK REL=StyleSheet HREF="css/Admin.css" TYPE="text/css" MEDIA=screen>
        <title>Indicador</title>
    </head>
    <body class="scFormPage">
        <form action="Generador.php" method="get">
            <?php
            include_once './../../BaseDatos/conexion.php';
            include_once './codigos/ClassVisual.php';
            $con = new conexion();
            $Visual= new Visual();
            $sql="SELECT `id_indicadores`, `Nombre`  FROM `indicadores` ORDER BY `Nombre`";
            $Res=$con->TablaDatos($sql);
            $VerIndicadores= $Visual->Select($Res, 'Id_Indicador', '','','','','scFormObjectOddMult');
            echo $Ver;
            echo '<br/>';
            $sql="SELECT `idmunicipio`, `nombreMunicipio` FROM `municipio` ORDER BY `nombreMunicipio`";
            $Res=$con->TablaDatos($sql);
            $VerMunicipios = $Visual->Select($Res, 'Municipio', '','','','','scFormObjectOddMult');
			$encabezado=array('Indicador y municipio');
			$Datos[]=array($VerMunicipios);
			$Datos[]=array($VerIndicadores);
			$Datos[]=array('<input type="submit" value="Enviar"/>');
			$Res=$Visual->Tabla($Datos,$encabezado,'tabla','scFormBorder','1');
            echo $Res;
            ?>
        </form>
    </body>
</html>