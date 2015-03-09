<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta description="INFORMES SISTEMA DE iNFORMACION SOCIOECONOMICO DEL CAUCA."/>
        <title>Gráficos</title>
        <meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" href="css/unsemantic-grid-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="images/favicon.ico">
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
        <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>	
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/maps/modules/map.js"></script>          
        <script src="http://code.highcharts.com/maps/highmaps.js"></script>
        <script type="text/javascript" src="./js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="./js/highcharts.js"></script>
        <script type="text/javascript" src="./js/exporting.js"></script>
        <script type="text/javascript" src="./js/graficador.js"></script>
        <script type="text/javascript" src="./js/graficar.js"></script>

    </head>
    <body>
        <div id="wrapper">
            <div id="header-wrap" class="wrapper">
                <header class="grid-container grid-parent" id="header" role="banner">
                    <div id="logo" class="grid-25 mobile-grid-40"><a href="index.html"><img src="images/logo.jpg"></a></div>
                    <div id="titulo" class="grid-15 mobile-grid-25"><a href="index.html"><img src="images/titulo.png"></a></div>
                    <div id="clima" class="grid-20 mobile-grid-30 hide-on-mobile">
                        <img src="images/logo/escudocauca.png" height="auto" width="100"/>
                    </div>
                </header>
            </div>
            <!-- end header -->

            <div id="main-menu-wrap" class="wrapper">
                <div id="menu-bar" class="grid-container grid-parent" >
                    <nav role="navigation" id="main-menu" class="grid-100 mobile-grid-100 grid-parent">
                        <ul id="ulnav" class="nav nav-justified">
                            <li><a href="index.html">inicio&nbsp;</a></li>
                            <li><a href="acercadelcauca.html">acerca del Cauca</a></li>
                            <li><a href="acerca.html">acerca de t&aacute;ngara&nbsp;</a></li>
                            <li class="active"><a href="estadisticas.php">estad&iacute;sticas&nbsp;</a></li>
                            <li><a href="informes.html">informes&nbsp;</a></li>
                            <li><a id="login" href="login.php">funcionarios&nbsp;</a></li>
                        </ul>
                    </nav>
                    <!--nav-->
                </div>
            </div>
            <!--main menu -->

            <div id="content-wrap" class="wrapper">
                <div id="content" class="">
                     <!--Graficos-->
                    <?php
                    echo '<input type="hidden" id="id_select_indicador" name="id_indicador" value="' . $_GET['id_indicador'] . '">' . "\n";
                    echo '<input type="hidden" id="id_municipios" name="id_municipio" value="' . $_GET['id_municipio'] . '">' . "\n";
                    ?><br><br/><p>Tipo de Gr&aacute;fico
                    <select id="TipoGrafica" onchange="GraficarlosDatos();">
                        <option value="spline">Curvas</option>
                        <option value="line">L&Iacute;neas</option>
                        <option value="column">Columnas</option>
                        <option value="bar">Barras</option>
                    </select>
                    </p>
                    <script>
                        window.onload = GraficarlosDatos();
                    </script> 
                    <div id="container_graficos" style="min-width: 100%; height: 100%; padding: 1, 1, 1, 1 "></div>
                </div>
            </div>
            <div id="menu-footer-wrap" class="wrapper">
                <div id="footer-menu-bar" class="grid-container grid-parent">
                    <nav role="navigation" id="footer-menu" class="grid-100 mobile-grid-100 grid-parent">
                        <ul id="ulnav" class="grid-100 inline">
                            <li class="grid-15 mobile-grid-100"><a href="index.html">inicio&nbsp;</a></li>
                            <li class="grid-20 mobile-grid-100"><a href="acercadelcauca.html">acerca del Cauca</a></li>
                            <li class="grid-20 mobile-grid-100"><a href="acerca.html">acerca de t&aacute;ngara&nbsp;</a></li>
                            <li class="grid-15 mobile-grid-100"><a class="active" href="estadisticas.php">estad&iacute;sticas&nbsp;</a></li>
                            <li class="grid-15 mobile-grid-100"><a href="informes.html">informes&nbsp;</a></li>
                            <li class="grid-15 mobile-grid-100"><a href="contactenos.html">cont&aacute;ctenos&nbsp;</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div id="footer-wrap" class="wrapper">
                <div id="copy" class="grid-container">
                    <div id="info" class="grid-50 mobile-grid-100 grid-parent">
                        <ul>
                            <li><a href="">Teléfono: (057+2) 8244515</a></li>
                            <li><a href="">Fax: (057+2) 8242973</a></li>
                            <li><a href="">Correo electrónico: tangara@cauca.gov.co</a></li>
                            <li><a href="">Dirección: Calle 4 - Carrera 7 esquina - 5 piso - Popayán - Cauca</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--footer-->

            <div id="vive-footer-wrap" style=" background-color: #E0D6C6; background-image: url(images/footer.png); background-repeat: no-repeat; background-position: center;">

         <div id="footer2-wrap" style="background-color: #E0D6C6; background-image: url(images/bgfooter.png);">
                <div class="patro">
                    <a href="http://www.cauca.gov.co/"><img src="images/logo/logogob.png" class="gob"></a>
                    <a href="http://www.cauca.gov.co/"><img src="images/logo/marcarc.png" class="cto"></a>
                    <a href="http://www.uniautonoma.edu.co/"><img alt="Escudo Corporación Universitaria Autonoma del Cauca" src="images/logo/uniautonoma2.png" class="uni"></a>
                </div>    
                <div class="ejecutor">  
                    <p>Apoyado por:</p>
                    <a href="http://parquesoftpopayan.com/index.php/cauca-vive-digital"><img src="images/logo/logocvd.png" class="cvd"></a>
                    <a href="http://parquesoftpopayan.com/index.php/cauca-vive-digital"><img src="images/logo/parque.png" class="creatic"></a>
                    <a href="http://www.kcumendigital.com"><img src="images/logo/kcumen.png" alt="Kcumen Digital"></a>
                </div>                       
            </div><!--.vive-footer-->
       
            </div><!--/#vive-footer-wrap -->

        </div>
    </body>
</html>