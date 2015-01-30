<html>
<head>
 <meta charset=utf-8 />
 <LINK REL=StyleSheet HREF="css/Admin.css" TYPE="text/css" MEDIA=screen>
<title>Registro completo</title>
</head>
<body class="scFormPage">
<?php
include_once './codigos/indicadores.php';
$InsertarDatos= new indicadores();
$Categoria=$_POST['Datos'];
$Variables=$_POST['NombresVariables'];
$Valores=$_POST['NameValores'];
$Municipio=$_POST['Municipio'];
$Insertar=array();
$cate=array();
$vari=array();
foreach($Categoria as $Temp)
{
    $cate[]=$Temp;
}
foreach($Variables as $Temp)
{
    $vari[]=$Temp;
}
echo '<table border="1">';
for($i=0;$i<count($cate);$i++)
{
    for($j=0;$j<count($vari);$j++)
    {
        if($Valores[$j][$i]!='-null')
        {
            if($Valores[$j][$i]=='')
            {
                $Valores[$j][$i]="NULL";
            }else{
            $Valores[$j][$i]='"'.$Valores[$j][$i].'"';
            }$Temp=array(
                'Categoria'=>$cate[$i],
                'Variable'=>$vari[$j],
                'Valor'=>$Valores[$j][$i],
                'Municipio'=>$Municipio);
            $Insertar[]=$Temp;
        }
    }
}
echo '<h1 align="center">';
$InsertarDatos->InsertarDatos($Insertar);
echo '</h1>';
?>
</body>
</html>