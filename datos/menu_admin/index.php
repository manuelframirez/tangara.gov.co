<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html DIR='LTR' style="height: 100%">
<head>
 <title>menu_admin</title>
 <META http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/Scriptcase7_BlueSky/Scriptcase7_BlueSky_btngrp.css?scp=02fc30a67c4e5fdf506c21f130a0cfff" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/Scriptcase7_BlueSky/Scriptcase7_BlueSky_menuH.css?scp=2faea829cb429a44d4be7093fac55e6f" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/Scriptcase7_BlueSky/Scriptcase7_BlueSky.css" /> 
<link rel="stylesheet" type="text/css" href="../_lib/css/_menuTheme/scriptcase_Android_Blue_hor.css?scp=dcbd908e1a952b76f2e1c40830c546f4" />
</head>
<body style="margin: 0px; height: 100%" scroll="no">
 
<script type="text/javascript" src="../datos/_lib/prod/third/jquery/js/jquery.js"></script>
<script>
$(document).ready(function() {
});
</script>
<table align="left" style="border-collapse: collapse; border-width: 0px; height: 100%; width: 100%">
  <tr class="scMenuHTableCssAlt">
      <td align="left" valign="top" class="scMenuLine" style="width:100%; height:30;padding: 0px;">
<div id="scScrollFix" style="height: 1px"></div>
<script type="text/javascript">
function fnScrollFix() {
 var txt = document.getElementById("scScrollFix").innerHTML;
 if ("&nbsp;" == txt) { txt = "&nbsp;&nbsp;"; } else { txt = "&nbsp;"; }
 document.getElementById("scScrollFix").innerHTML = txt;
 setTimeout("fnScrollFix()", 500);
}
setTimeout("fnScrollFix()", 500);
</script>
<?php 
$Ruta=array(1=>'"menu_admin_form_php.php?sc_item_menu=item_1&sc_apl_menu=',2=>'&sc_apl_link=../&sc_usa_grupo="');
?>
<ul id="css3menu1" class="topmenu">
  <li class="topmenu topfirst">
    <a href=<?php echo $Ruta[1].'Crear_Niveles'.$Ruta[2]; ?> id="item_1" title="" target="menu_admin_iframe">Crear indicadores</a>
  </li>
  <li class="topmenu">
    <a href=<?php echo $Ruta[1].'Ingresar_datos'.$Ruta[2];?> id="item_2" title="" target="menu_admin_iframe">Ingresar nuevos datos</a>
  </li>
  <li class="topmenu">
    <a href=<?php echo $Ruta[1].'Modificar_variable'.$Ruta[2] ?> id="item_3" title="" target="menu_admin_iframe">Modificar variables</a>
  </li>
  <li class="topmenu">
    <a href=<?php echo $Ruta[1].'form_categorias'.$Ruta[2] ?> id="item_4" title="" target="menu_admin_iframe">Categoria</a>
  </li>
  <li class="topmenu toplast">
    <a href=<?php echo $Ruta[1].'form_tipo_categoria'.$Ruta[2]; ?> id="item_5" title="" target="menu_admin_iframe">Tipo de categorias</a>
  </li>
   <li class="topmenu toplast">
    <a href=<?php echo $Ruta[1].'Archivos_eliminar'.$Ruta[2]; ?> id="item_6" title="" target="menu_admin_iframe">Eliminar Archivos</a>
  </li>
   <li class="topmenu toplast">
    <a href=<?php echo $Ruta[1].'Archivos_Subir'.$Ruta[2]; ?> id="item_6" title="" target="menu_admin_iframe">Subir Archivos</a>
  </li>
</ul>
    </td>
  </tr>
  <tr>
    <td style="border-width: 1px; height: 100%; padding: 0px">
      <iframe id="iframe_menu_admin" name="menu_admin_iframe" frameborder="0" class="scMenuIframe"  src="../Crear_Niveles/?nm_run_menu=1&nm_apl_menu=menu_admin&script_case_init=1&script_case_session=6oobvne185ak0bbraoiqfo2ij6" ></iframe>
    </td>
  </tr>
</table>
</body>
</html>
