<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta description="ESTID&Iacute;STICAS SISTEMA DE iNFORMACION SOCIOECONOMICO DEL CAUCA."/>
        <title>Estad&iacute;sticas</title>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximun-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <!--[if lt IE 9]>
  <script src="js/html5.js"></script>
<![endif]-->
        <!--[if (gt IE 8) | (IEMobile)]><!-->
        <link rel="stylesheet" href="css/unsemantic-grid-responsive.css" />

        <!--<![endif]-->
        <!--[if (lt IE 9) & (!IEMobile)]>
          <link rel="stylesheet" href="css/ie.css" />
        <![endif]-->
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
                            <li><a id="login" href="login.html">funcionarios&nbsp;</a></li>
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

                            class patients_show_list {

                                private $html = '';
                                private $dimensions;

                                function menu() {

                                    $dimensiones_html = "";

                                    // Conectando, seleccionando la base de datos
                                    $link = mysql_connect('localhost', 'root', '') or die('No se pudo conectar: ' . mysql_error());
                                    mysql_select_db('gobernacion') or die('No se pudo seleccionar la base de datos');
                                    $query = 'SELECT * FROM dimension ORDER BY `Descripcion`';
                                    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                                    $dimensiones_html .= '<ul class="grid-100 grid-parent">';
                                    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                        $tematica_html = "";

                                        $li_a_dimension = new li_a($row["id_dimension"], $row["Descripcion"], '', '#');
                                        $query_tematica = 'SELECT * FROM tematica WHERE fk_Dimension = ' . $row["id_dimension"] . ' ORDER BY `Descripcion`';
                                        $result_tematica = mysql_query($query_tematica) or die('Consulta fallida: ' . mysql_error());

                                        $tematica_html .= '<ul class="submenu">';

                                        while ($row_tematica = mysql_fetch_array($result_tematica, MYSQL_ASSOC)) {
                                            $indicadores_html = "";
                                            $li_a_tematica = new li_a($row_tematica["id_tematica"], $row_tematica["Descripcion"], '', '#', 'desp');
                                            /* indicadores */
                                            $query_indicadores = 'SELECT * FROM indicadores WHERE fk_tematica = ' . $row_tematica["id_tematica"] . ' ORDER BY `Nombre`';
                                            $result_indicadores = mysql_query($query_indicadores) or die('Consulta fallida: ' . mysql_error());
                                            $indicadores_html .= '<ul class="submenu2">';
                                            while ($row_indicadores = mysql_fetch_array($result_indicadores, MYSQL_ASSOC)) {
                                                $li_a_indicadores = new li_a($row_indicadores["id_indicadores"], $row_indicadores["Nombre"], 'javascript:Filtrar(' . $row_indicadores["id_indicadores"] . ')', '');
                                                $indicadores_html .= $li_a_indicadores->generate();
                                            }
                                            $indicadores_html .= "\n</ul>\n";
                                            $li_a_tematica->aditional_code = $indicadores_html;
                                            $tematica_html .= $li_a_tematica->generate();
                                        }
                                        $tematica_html .= "\n</ul>\n";
                                        $li_a_dimension->aditional_code = $tematica_html;
                                        $dimensiones_html .= $li_a_dimension->generate();
                                    }
                                    $dimensiones_html .= "\n</ul>\n";
                                    return $dimensiones_html;
                                }

                            }

                            class li_a {

                                private $html = '';
                                private $id;
                                private $title;
                                private $link;
                                private $aditional_code;
                                private $ClassLI;

                                public function __construct($id, $title, $link, $aditional_code, $classLI = '') {
                                    $this->id = $id;
                                    $this->title = $title;
                                    $this->link = $link;
                                    $this->aditional_code = $aditional_code;
                                    $this->ClassLI = $classLI;
                                }

                                public function generate() {
                                    if ($this->ClassLI != '') {
                                        $this->ClassLI = ' class="' . $this->ClassLI . '"';
                                    }
                                    $this->html .= "
                            <li$this->ClassLI>
                            <a id=\"{$this->id}\" href=\"{$this->link}\">{$this->title}</a>

                            {$this->aditional_code}
                            </li>";
                                    return $this->html;
                                }

                                public function __set($var, $value) {
                                    $temp = strtolower($var);
                                    if (property_exists('li_a', $temp)) {
                                        $this->$temp = $value;
                                    } else {
                                        echo $var . " does not exist.";
                                    }
                                }

                            }

                            $patients_show_list = new patients_show_list();
                            echo utf8_encode($patients_show_list->menu());
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