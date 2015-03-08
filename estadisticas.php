<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta description="ESTID&Iacute;STICAS SISTEMA DE iNFORMACION SOCIOECONOMICO DEL CAUCA."/>
        <title>Estad&iacute;sticas</title>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximun-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" href="css/unsemantic-grid-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="images/favicon.ico">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="js/graficador.js"></script>
        <script type="text/javascript" src="js/graficar.js"></script>
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/Selects.js"></script>
        <script src="js/jquery.min.js"></script>
        <link rel="stylesheet" href="css/jquery-ui.css">
        <script src="js/jquery-ui.js"></script>
        <script src="js/menu.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <div id="header-wrap" class="wrapper">
                <header class="grid-container grid-parent" id="header" role="banner">
                    <div id="logo" class="grid-25 mobile-grid-40"><a href="index.html"><img src="images/logo.jpg"></a></div>
                    <div id="titulo" class="grid-15 mobile-grid-25"><a href="index.html"><img src="images/titulo.png"></a></div>
                    <div id="clima" class="grid-20 mobile-grid-30 hide-on-mobile"><img alt="Escudo Gobernaciòn del Cauca" src="images/logo/caucaescudo.png" height="auto"/>
                    </div>
                </header>
            </div>
            <!-- end header -->

            <div id="main-menu-wrap" class="wrapper">
                <div id="menu-bar" class="grid-container grid-parent">
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
                <div id="content" class="grid-container">

                    <div id="sidebar-left" class="grid-20 mobile-grid-100 grid-parent">

                        <div id ="menu-categorias" class="grid-100 mobile-grid-100 grid-parent hide-on-mobile">
                            <h2>Categor&iacute;as</h2>	
                            <?php
                                include_once './Codigo/menu.php';
                                $Menu = new ListadoMenu();
                                echo $Menu->menu();
                            ?>
                        </div>
                        <!--end menu categorias -->		
                    </div><!--end sidebar-left-->

                    <div id="sidebar-right" class="grid-80 mobile-grid-100">

                        <!--container filters -->
                        <div id="filters-mapa-wrap" class="grid-100 mobile-grid-100 grid-parent">
                            <div id="filters-mapa" class="grid-100 mobile-grid-100 parent">
                                <ul class="grid-100 grid-parent">							
                                    <li class="grid-20 mobile-grid-100 parent">
                                        <label class="grid-100 mobile-grid-50">Categoría</label>

                                        <span class="grid-60 mobile-grid-50" id="id_Dimension">
                                        </span>
                                    </li>	
                                    <li class="grid-20 mobile-grid-100 parent">
                                        <label class="grid-100 mobile-grid-50">Temática</label>
                                        <span class="grid-60 mobile-grid-50" id="id_select_tematica">
                                            <select style="width:100%">
                                            </select>
                                        </span>
                                    </li>
                                    <li class="grid-20 mobile-grid-100 parent">
                                        <label class="grid-100 mobile-grid-50">Indicador</label>
                                        <span class="grid-60 mobile-grid-50" name="select_indicador" id="id_select_indicador">
                                            <select style="width:100%">
                                            </select>
                                        </span>				
                                    </li>
                                    <li class="grid-15 mobile-grid-100 parent">
                                        <label class="grid-100 mobile-grid-50">Municipio</label>
                                        <span class="grid-60 mobile-grid-50" id="id_municipios">
                                        </span>
                                    </li>
                                    <li class="">
                                        <label class="grid-100 mobile-grid-100">&nbsp;</label>
                                        <input class="" type="button" OnClick="Buscar()" VALUE="Buscar"/>
                                        <input class="" id="BotonGraficar" name="submit" type="submit" onclick="VerGrafica()" value="Graficar" /> 
                                    </li>
                                </ul>	
                            </div>
                            <!--menu map filters-->
                        </div>
                        <!--end menu-mapa-wrap-->

                        <iframe id="Cuadrado" width="100%" height="400px" src=""></iframe>
                    </div><!--end sidebar-right-->

                </div><!--End content -->		

            </div>
            <!--End content wrap -->	


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
                    <a href="http://www.totemsconsulting.com/kc"><img src="images/logo/totems.png" class="class-totems" alt="Totems Consulting"></a>
                </div>                       
            </div>
            <!--/#footer2-wrap -->

        </div>
    </body>
</html>