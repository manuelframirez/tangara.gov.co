archivos a descomprimir<br/>
<form action="descomprimir.php" method="POST">
    <?php
    if($_POST)
    {
		$Nombre=$_POST['Nombre'];
		echo 'Descomprimiendo '.$Nombre."\n<br>";
		sleep(1);
        $unzip = shell_exec("unzip $Nombre");    
		echo 'Descomprimido';
    }
    else
    {
        $handle = opendir("./");
        echo '<select name="Nombre">' . "\n";
        while ($archivo = readdir($handle)) 
        {
            $Datos = (explode('.', $archivo));
            $T = count($Datos)-1;
            $Type = $Datos[$T];
            if ($Type == 'zip' || $Type == 'ZIP') 
            {
               echo '<option value="' . $archivo . '">' . $archivo . '</option>' . "\n";
            }
			
        }
        echo '</select>'."\n<br/>";
        closedir($handle);
		echo '<input type="submit" value="Descomprimir">';
    }
    ?>
    
</form>