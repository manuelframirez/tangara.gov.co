<!DOCTYPE html>
<?php
include_once './datos/sec/CloseSession.php';
?>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta description="LOGIN SISTEMA DE iNFORMACION SOCIOECONOMICO DEL CAUCA."/>
        <title>Login Tangara</title>
        <meta name="viewport" content="width=device-width,initial-scale=1, maximun-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link rel="shortcut icon" href="images/favicon.ico">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/jquery-latest.min.js"></script>
        <script src="js/responsiveslides.min.js"></script>
        <script src="js/Validate.js"></script>
        <script>
            $(function () {
                // Slideshow 1
                $("#slider1").responsiveSlides({
                    maxwidth: 2880,
                    speed: 4000,
                    timeout: 5000,
                    random: true
                });
            });
        </script>	

    </head>
    <body>
        <div id="wrapper">
            <div id="slideshow-wrap" class="wrapper">

                <ul class="rslides" id="slider1">
                    <li><img src="images/login/banner-1.jpg"></li>
                    <li><img src="images/login/banner-2.jpg"></li>
                    <li><img src="images/login/banner-3.jpg"></li>
                    <li><img src="images/login/banner-4.jpg"></li>
                </ul>
            </div>
            <!--End Slider -->

            <div id="login-wrap">
                <div id="login">
                    <header>
                        <figure><a href="index.html"><img src="images/login-tangara.jpg" title="www.tangara.com"></a></figure>
                    </header>
                    <form id="login_form" method="post" action="#">				
                        <label id="username">Usuario</label>			
                        <input id="usuario" type="text" tabindex="1" name="var_user" placeholder="Usuario">
                        <label>Contrase&ntilde;a</label>			
                        <input id="clave" type="password" tabindex="2" name="var_pass" placeholder="Contrase&ntilde;a">
                        <input id="submit" name="ingresar" type="submit" value="Ingresar" style="width: 100px; height: 35px; background-color: #a1d500; border: 0px; margin-bottom: 28px;">
                    </form>
                    <div id="Error"></div>
                    <div id="registro">
                        <ul>
                            <li><a id="restorepassword" href="#">¿No puedes acceder a tu cuenta?</a></li>
                            <!--<li><label>¿No dispones de una cuenta?</label></li>
                            <li><a id="signup" href="#">Reg&iacute;strate ahora</a></li>-->
                        </ul>				
                    </div>
                </div>					
            </div>
            <!-- end login -->	
        </div>
    </body>
</html>