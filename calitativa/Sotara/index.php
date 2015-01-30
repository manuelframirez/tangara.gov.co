<html>
    <head>
        <title></title>
    </head>
    <body background="fondo.png"> 
        <div class="header"></div>
        <div class="scroll"></div>
        <ul id="navigation">
            <?php
            $directorio = opendir(".");
            while ($archivo = readdir($directorio)) 
            {
                if (($archivo != '.' && $archivo != '..') && ($archivo != 'index.php'))
                {
                    echo "<a href='$archivo' download=''><img src='../ico.png'>" . $archivo. "</a><br />";
                }
            }
            ?>
        </ul>
    </body>
</html>