<html>
    <head>
        <meta charset="utf-8">
        <title>prueba de webservices</title>
    </head>
    <body>
        <?php
        require_once('../Soap/lib/nusoap.php');
        $URL = 'http://localhost/tangara.gov.co/soap/index.php?WSDL';
        $client = new nusoap_client($URL); //conexion
        $err = $client->getError(); //valida
        if ($err)
        {
            echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
        }
        $param = array('id_indicador'=>2,'Municipio'=>1);
        $Function = 'DatosTangara';
        $result = $client->call($Function, $param); //Llamar metodo
        if ($client->fault) 
        {
            echo '<h2>Fault</h2><pre>';
            print_r($result);
            echo '</pre>';
        }
        else 
        {
            $err = $client->getError(); //Llamar error
            if ($err) 
            {
                echo '<h2>Error</h2><pre>' . $err . '</pre>';
            } 
            else 
            {
                echo '<h2>Formato JSON </h2><br/>';
                print_r(($result));
                echo '<h2>Formato JSON decode</h2><pre/>';
                print_r(json_decode($result));
                echo '</pre>';
            }
        }
        ?>
    </body>
</html>