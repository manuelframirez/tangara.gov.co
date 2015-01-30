<html>
    <head>
    <head>
        <meta charset="utf-8">

        <link rel="StyleSheet" media="screen" href="css/Admin.css" type="text/css" >

        <link rel="stylesheet" media="screen" href="css/handsontable.css">
        <link rel="stylesheet" media="screen" href="http://handsontable.com/demo/css/samples.css?20140331">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/handsontable.full.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/function2.js"></script>
        <script type="text/javascript" src="js/Funciones.js"></script>

        <title>guardar datos</title>
    </head>
    <body class="scFormPage">
    <center><input type="button" value="pegar de excel" OnClick="PegarExcel()" ></center>
    <?php
    include_once './codigos/indicadores.php';
    include_once './codigos/ClassVisual.php';
    $Visual = new Visual();
    $Values = new indicadores();

    $Id_Indicador = $_GET['Id_Indicador'];
    if ($Id_Indicador != '0' && $_GET['Municipio'] != '0') {
        $Categorias = $Values->CategoriasIndicadores($Id_Indicador);
        $Variables = $Values->VariablesIndicadores($Id_Indicador);

        $encabezado = $Values->OrganizarDatos($Categorias, 'Datos', 'Indicador\\Categorias', 'X');
        $Variable = $Values->OrganizarDatos($Variables, 'NombresVariables', '', 'Y');
        $Datos = $Values->ArrayGuardarDatos($encabezado, $Variable);
        $Tabla = $Visual->Tabla($Datos, $encabezado, '', 'scFormBorder', '1');
        ?>
        <form action="guardar.php" method="Post">

            <?php
            echo '<input type="hidden" name="Municipio" value="' . $_GET['Municipio'] . '">';
            echo '<input type="hidden" id="id_filas" name="filas" value="' . count($Variable) . '">';
            echo '<input type="hidden" id="id_colum" name="Columnas" value="' . count($encabezado) . '">';

            echo '<center>' . ($Tabla) . '<center>';
            ?>
            <input type="submit" value="Guardar">
        </form>
    <?php
    } else {
        echo '<h1 align="center">Debe seleccionar ambos campos</h1>';
    }
    ?>


    <div height= "350px" width= "900px" title="Pegar desde excel" class="class_loading" id="loading">
        <div class="handsontable" id="example1"></div>
        <sub>*Los valores decimales deben expresarse con puntos(.)</sub>
    </div>
</body>
</html>
