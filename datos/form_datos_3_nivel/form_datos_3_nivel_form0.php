<?php
class form_datos_3_nivel_form extends form_datos_3_nivel_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - datos"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - datos"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
 </SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
<?php
include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
?>

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_datos_3_nivel_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_binicio_off = "<?php echo $this->arr_buttons['binicio_off']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bavanca_off = "<?php echo $this->arr_buttons['bavanca_off']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bretorna_off = "<?php echo $this->arr_buttons['bretorna_off']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_bfinal_off  = "<?php echo $this->arr_buttons['bfinal_off']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
?>
 if ('S' == str_ret)
 {
  $("#sc_b_ini_" + str_pos).show();
  $("#sc_b_ret_" + str_pos).show();
  $("#sc_b_ini_off_" + str_pos).hide().prop("disabled", false);
  $("#sc_b_ret_off_" + str_pos).hide().prop("disabled", false);
  $("#gbl_sc_b_ini_" + str_pos).show();
  $("#gbl_sc_b_ret_" + str_pos).show();
  $("#gbl_sc_b_ini_off_" + str_pos).hide();
  $("#gbl_sc_b_ret_off_" + str_pos).hide();
 }
 else
 {
  $("#sc_b_ini_" + str_pos).hide();
  $("#sc_b_ret_" + str_pos).hide();
  $("#sc_b_ini_off_" + str_pos).prop("disabled", true).show();
  $("#sc_b_ret_off_" + str_pos).prop("disabled", true).show();
  $("#gbl_sc_b_ini_" + str_pos).hide();
  $("#gbl_sc_b_ret_" + str_pos).hide();
  $("#gbl_sc_b_ini_off_" + str_pos).show();
  $("#gbl_sc_b_ret_off_" + str_pos).show();
 }
 if ('S' == str_ava)
 {
  $("#sc_b_fim_" + str_pos).show();
  $("#sc_b_avc_" + str_pos).show();
  $("#sc_b_fim_off_" + str_pos).hide().prop("disabled", false);
  $("#sc_b_avc_off_" + str_pos).hide().prop("disabled", false);
  $("#gbl_sc_b_fim_" + str_pos).show();
  $("#gbl_sc_b_avc_" + str_pos).show();
  $("#gbl_sc_b_fim_off_" + str_pos).hide();
  $("#gbl_sc_b_avc_off_" + str_pos).hide();
 }
 else
 {
  $("#sc_b_fim_" + str_pos).hide();
  $("#sc_b_avc_" + str_pos).hide();
  $("#sc_b_fim_off_" + str_pos).prop("disabled", true).show();
  $("#sc_b_avc_off_" + str_pos).prop("disabled", true).show();
  $("#gbl_sc_b_fim_" + str_pos).hide();
  $("#gbl_sc_b_avc_" + str_pos).hide();
  $("#gbl_sc_b_fim_off_" + str_pos).show();
  $("#gbl_sc_b_avc_off_" + str_pos).show();
 }
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
<?php

include_once('form_datos_3_nivel_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).load(function() {
   });
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_datos_3_nivel_js0.php");
?>
<script type="text/javascript" src="<?php echo str_replace("{str_idioma}", $this->Ini->str_lang, "../_lib/js/tab_erro_{str_idioma}.js"); ?>"> 
</script> 
<script type="text/javascript"> 
  sc_quant_excl = <?php echo count($sc_check_excl); ?>; 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
 </script>
<form name="F1" method="post" 
               action="./" 
               target="_self"> 
<input type=hidden name="nm_form_submit" value="1">
<input type=hidden name="nmgp_idioma_novo" value="">
<input type=hidden name="nmgp_schema_f" value="">
<input type=hidden name="nmgp_url_saida" value="">
<input type=hidden name="nmgp_opcao" value="">
<input type=hidden name="nmgp_ancora" value="">
<input type=hidden name="nmgp_num_form" value="<?php  echo NM_encode_input($nmgp_num_form); ?>">
<input type=hidden name="nmgp_parms" value="">
<input type=hidden name="script_case_init" value="<?php  echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type=hidden name="script_case_session" value="<?php  echo NM_encode_input(session_id()); ?>"> 
<?php
$int_iframe_padding = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['run_iframe']) ? 0 : "0px";
?>
<?php
$_SESSION['scriptcase']['error_span_title']['form_datos_3_nivel'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_datos_3_nivel'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute" id="id_error_display_table_frame">
<table class="scFormErrorTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<table id="main_table_form"  align="center" cellpadding="<?php echo $int_iframe_padding; ?>" cellspacing=0 class="scFormBorder" >
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['mostra_cab'] != "N"))
  {
?>
<tr><td>
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFormHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - datos"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - datos"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php echo date($this->dateDefaultFormat()); ?></span></td>
        </tr>
    </table>		 
 </div>
</div>
</td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "do_ajax_form_datos_3_nivel_add_new_line(); return false;", "do_ajax_form_datos_3_nivel_add_new_line(); return false;", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir');", "nm_atualiza ('incluir');", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0"><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>
<?php
$orderColName = '';
$orderColOrient = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) { $Col_span = " colspan=2"; }
    if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if ((!isset($this->nmgp_cmp_hidden['id_datos_']) || $this->nmgp_cmp_hidden['id_datos_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['id_datos_'])) {
          $this->nm_new_label['id_datos_'] = "Id Datos"; } ?>

    <TD class="scFormLabelOddMult" id="hidden_field_label_id_datos_" style=";<?php echo $sStyleHidden_id_datos_; ?>" > <?php echo $this->nm_new_label['id_datos_'] ?> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['valor_']) && $this->nmgp_cmp_hidden['valor_'] == 'off') { $sStyleHidden_valor_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['valor_']) || $this->nmgp_cmp_hidden['valor_'] == 'on') {
      if (!isset($this->nm_new_label['valor_'])) {
          $this->nm_new_label['valor_'] = "Valor"; } ?>

    <TD class="scFormLabelOddMult" id="hidden_field_label_valor_" style=";<?php echo $sStyleHidden_valor_; ?>" > <?php echo $this->nm_new_label['valor_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_categoria_']) && $this->nmgp_cmp_hidden['id_categoria_'] == 'off') { $sStyleHidden_id_categoria_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_categoria_']) || $this->nmgp_cmp_hidden['id_categoria_'] == 'on') {
      if (!isset($this->nm_new_label['id_categoria_'])) {
          $this->nm_new_label['id_categoria_'] = "Categoria"; } ?>

    <TD class="scFormLabelOddMult" id="hidden_field_label_id_categoria_" style=";<?php echo $sStyleHidden_id_categoria_; ?>" > <?php echo $this->nm_new_label['id_categoria_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_municipio_']) && $this->nmgp_cmp_hidden['id_municipio_'] == 'off') { $sStyleHidden_id_municipio_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_municipio_']) || $this->nmgp_cmp_hidden['id_municipio_'] == 'on') {
      if (!isset($this->nm_new_label['id_municipio_'])) {
          $this->nm_new_label['id_municipio_'] = "Municipio"; } ?>

    <TD class="scFormLabelOddMult" id="hidden_field_label_id_municipio_" style=";<?php echo $sStyleHidden_id_municipio_; ?>" > <?php echo $this->nm_new_label['id_municipio_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sub_variable3_']) && $this->nmgp_cmp_hidden['sub_variable3_'] == 'off') { $sStyleHidden_sub_variable3_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sub_variable3_']) || $this->nmgp_cmp_hidden['sub_variable3_'] == 'on') {
      if (!isset($this->nm_new_label['sub_variable3_'])) {
          $this->nm_new_label['sub_variable3_'] = "Sub variable"; } ?>

    <TD class="scFormLabelOddMult" id="hidden_field_label_sub_variable3_" style=";<?php echo $sStyleHidden_sub_variable3_; ?>" > <?php echo $this->nm_new_label['sub_variable3_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_0_']) && $this->nmgp_cmp_hidden['sc_field_0_'] == 'off') { $sStyleHidden_sc_field_0_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_0_']) || $this->nmgp_cmp_hidden['sc_field_0_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_0_'])) {
          $this->nm_new_label['sc_field_0_'] = "sub variable"; } ?>

    <TD class="scFormLabelOddMult" id="hidden_field_label_sc_field_0_" style=";<?php echo $sStyleHidden_sc_field_0_; ?>" > <?php echo $this->nm_new_label['sc_field_0_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['id_variable_']) && $this->nmgp_cmp_hidden['id_variable_'] == 'off') { $sStyleHidden_id_variable_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['id_variable_']) || $this->nmgp_cmp_hidden['id_variable_'] == 'on') {
      if (!isset($this->nm_new_label['id_variable_'])) {
          $this->nm_new_label['id_variable_'] = "Variable"; } ?>

    <TD class="scFormLabelOddMult" id="hidden_field_label_id_variable_" style=";<?php echo $sStyleHidden_id_variable_; ?>" > <?php echo $this->nm_new_label['id_variable_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_datos_3_nivel);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_datos_3_nivel = $this->form_vert_form_datos_3_nivel;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_datos_3_nivel))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_datos_']))
           {
               $this->nmgp_cmp_readonly['id_datos_'] = 'on';
           }
   foreach ($this->form_vert_form_datos_3_nivel as $sc_seq_vert => $sc_lixo)
   {
       $this->tipo_dato_ = $this->form_vert_form_datos_3_nivel[$sc_seq_vert]['tipo_dato_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['id_datos_'] = true;
           $this->nmgp_cmp_readonly['valor_'] = true;
           $this->nmgp_cmp_readonly['id_categoria_'] = true;
           $this->nmgp_cmp_readonly['id_municipio_'] = true;
           $this->nmgp_cmp_readonly['sub_variable3_'] = true;
           $this->nmgp_cmp_readonly['sc_field_0_'] = true;
           $this->nmgp_cmp_readonly['id_variable_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['id_datos_']) || $this->nmgp_cmp_readonly['id_datos_'] != "on") {$this->nmgp_cmp_readonly['id_datos_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['valor_']) || $this->nmgp_cmp_readonly['valor_'] != "on") {$this->nmgp_cmp_readonly['valor_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_categoria_']) || $this->nmgp_cmp_readonly['id_categoria_'] != "on") {$this->nmgp_cmp_readonly['id_categoria_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_municipio_']) || $this->nmgp_cmp_readonly['id_municipio_'] != "on") {$this->nmgp_cmp_readonly['id_municipio_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sub_variable3_']) || $this->nmgp_cmp_readonly['sub_variable3_'] != "on") {$this->nmgp_cmp_readonly['sub_variable3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_0_']) || $this->nmgp_cmp_readonly['sc_field_0_'] != "on") {$this->nmgp_cmp_readonly['sc_field_0_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_variable_']) || $this->nmgp_cmp_readonly['id_variable_'] != "on") {$this->nmgp_cmp_readonly['id_variable_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->id_datos_ = $this->form_vert_form_datos_3_nivel[$sc_seq_vert]['id_datos_']; 
       $id_datos_ = $this->id_datos_; 
       $sStyleHidden_id_datos_ = '';
       if (isset($sCheckRead_id_datos_))
       {
           unset($sCheckRead_id_datos_);
       }
       if (isset($this->nmgp_cmp_readonly['id_datos_']))
       {
           $sCheckRead_id_datos_ = $this->nmgp_cmp_readonly['id_datos_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_datos_']) && $this->nmgp_cmp_hidden['id_datos_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_datos_']);
           $sStyleHidden_id_datos_ = 'display: none;';
       }
       $bTestReadOnly_id_datos_ = true;
       $sStyleReadLab_id_datos_ = 'display: none;';
       $sStyleReadInp_id_datos_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_datos_"]) &&  $this->nmgp_cmp_readonly["id_datos_"] == "on"))
       {
           $bTestReadOnly_id_datos_ = false;
           unset($this->nmgp_cmp_readonly['id_datos_']);
           $sStyleReadLab_id_datos_ = '';
           $sStyleReadInp_id_datos_ = 'display: none;';
       }
       $this->valor_ = $this->form_vert_form_datos_3_nivel[$sc_seq_vert]['valor_']; 
       $valor_ = $this->valor_; 
       $sStyleHidden_valor_ = '';
       if (isset($sCheckRead_valor_))
       {
           unset($sCheckRead_valor_);
       }
       if (isset($this->nmgp_cmp_readonly['valor_']))
       {
           $sCheckRead_valor_ = $this->nmgp_cmp_readonly['valor_'];
       }
       if (isset($this->nmgp_cmp_hidden['valor_']) && $this->nmgp_cmp_hidden['valor_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['valor_']);
           $sStyleHidden_valor_ = 'display: none;';
       }
       $bTestReadOnly_valor_ = true;
       $sStyleReadLab_valor_ = 'display: none;';
       $sStyleReadInp_valor_ = '';
       if (isset($this->nmgp_cmp_readonly['valor_']) && $this->nmgp_cmp_readonly['valor_'] == 'on')
       {
           $bTestReadOnly_valor_ = false;
           unset($this->nmgp_cmp_readonly['valor_']);
           $sStyleReadLab_valor_ = '';
           $sStyleReadInp_valor_ = 'display: none;';
       }
       $this->id_categoria_ = $this->form_vert_form_datos_3_nivel[$sc_seq_vert]['id_categoria_']; 
       $id_categoria_ = $this->id_categoria_; 
       $sStyleHidden_id_categoria_ = '';
       if (isset($sCheckRead_id_categoria_))
       {
           unset($sCheckRead_id_categoria_);
       }
       if (isset($this->nmgp_cmp_readonly['id_categoria_']))
       {
           $sCheckRead_id_categoria_ = $this->nmgp_cmp_readonly['id_categoria_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_categoria_']) && $this->nmgp_cmp_hidden['id_categoria_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_categoria_']);
           $sStyleHidden_id_categoria_ = 'display: none;';
       }
       $bTestReadOnly_id_categoria_ = true;
       $sStyleReadLab_id_categoria_ = 'display: none;';
       $sStyleReadInp_id_categoria_ = '';
       if (isset($this->nmgp_cmp_readonly['id_categoria_']) && $this->nmgp_cmp_readonly['id_categoria_'] == 'on')
       {
           $bTestReadOnly_id_categoria_ = false;
           unset($this->nmgp_cmp_readonly['id_categoria_']);
           $sStyleReadLab_id_categoria_ = '';
           $sStyleReadInp_id_categoria_ = 'display: none;';
       }
       $this->id_municipio_ = $this->form_vert_form_datos_3_nivel[$sc_seq_vert]['id_municipio_']; 
       $id_municipio_ = $this->id_municipio_; 
       $sStyleHidden_id_municipio_ = '';
       if (isset($sCheckRead_id_municipio_))
       {
           unset($sCheckRead_id_municipio_);
       }
       if (isset($this->nmgp_cmp_readonly['id_municipio_']))
       {
           $sCheckRead_id_municipio_ = $this->nmgp_cmp_readonly['id_municipio_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_municipio_']) && $this->nmgp_cmp_hidden['id_municipio_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_municipio_']);
           $sStyleHidden_id_municipio_ = 'display: none;';
       }
       $bTestReadOnly_id_municipio_ = true;
       $sStyleReadLab_id_municipio_ = 'display: none;';
       $sStyleReadInp_id_municipio_ = '';
       if (isset($this->nmgp_cmp_readonly['id_municipio_']) && $this->nmgp_cmp_readonly['id_municipio_'] == 'on')
       {
           $bTestReadOnly_id_municipio_ = false;
           unset($this->nmgp_cmp_readonly['id_municipio_']);
           $sStyleReadLab_id_municipio_ = '';
           $sStyleReadInp_id_municipio_ = 'display: none;';
       }
       $this->sub_variable3_ = $this->form_vert_form_datos_3_nivel[$sc_seq_vert]['sub_variable3_']; 
       $sub_variable3_ = $this->sub_variable3_; 
       $sStyleHidden_sub_variable3_ = '';
       if (isset($sCheckRead_sub_variable3_))
       {
           unset($sCheckRead_sub_variable3_);
       }
       if (isset($this->nmgp_cmp_readonly['sub_variable3_']))
       {
           $sCheckRead_sub_variable3_ = $this->nmgp_cmp_readonly['sub_variable3_'];
       }
       if (isset($this->nmgp_cmp_hidden['sub_variable3_']) && $this->nmgp_cmp_hidden['sub_variable3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sub_variable3_']);
           $sStyleHidden_sub_variable3_ = 'display: none;';
       }
       $bTestReadOnly_sub_variable3_ = true;
       $sStyleReadLab_sub_variable3_ = 'display: none;';
       $sStyleReadInp_sub_variable3_ = '';
       if (isset($this->nmgp_cmp_readonly['sub_variable3_']) && $this->nmgp_cmp_readonly['sub_variable3_'] == 'on')
       {
           $bTestReadOnly_sub_variable3_ = false;
           unset($this->nmgp_cmp_readonly['sub_variable3_']);
           $sStyleReadLab_sub_variable3_ = '';
           $sStyleReadInp_sub_variable3_ = 'display: none;';
       }
       $this->sc_field_0_ = $this->form_vert_form_datos_3_nivel[$sc_seq_vert]['sc_field_0_']; 
       $sc_field_0_ = $this->sc_field_0_; 
       $sStyleHidden_sc_field_0_ = '';
       if (isset($sCheckRead_sc_field_0_))
       {
           unset($sCheckRead_sc_field_0_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_0_']))
       {
           $sCheckRead_sc_field_0_ = $this->nmgp_cmp_readonly['sc_field_0_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_0_']) && $this->nmgp_cmp_hidden['sc_field_0_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_0_']);
           $sStyleHidden_sc_field_0_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_0_ = true;
       $sStyleReadLab_sc_field_0_ = 'display: none;';
       $sStyleReadInp_sc_field_0_ = '';
       if (isset($this->nmgp_cmp_readonly['sc_field_0_']) && $this->nmgp_cmp_readonly['sc_field_0_'] == 'on')
       {
           $bTestReadOnly_sc_field_0_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_0_']);
           $sStyleReadLab_sc_field_0_ = '';
           $sStyleReadInp_sc_field_0_ = 'display: none;';
       }
       $this->id_variable_ = $this->form_vert_form_datos_3_nivel[$sc_seq_vert]['id_variable_']; 
       $id_variable_ = $this->id_variable_; 
       $sStyleHidden_id_variable_ = '';
       if (isset($sCheckRead_id_variable_))
       {
           unset($sCheckRead_id_variable_);
       }
       if (isset($this->nmgp_cmp_readonly['id_variable_']))
       {
           $sCheckRead_id_variable_ = $this->nmgp_cmp_readonly['id_variable_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_variable_']) && $this->nmgp_cmp_hidden['id_variable_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_variable_']);
           $sStyleHidden_id_variable_ = 'display: none;';
       }
       $bTestReadOnly_id_variable_ = true;
       $sStyleReadLab_id_variable_ = 'display: none;';
       $sStyleReadInp_id_variable_ = '';
       if (isset($this->nmgp_cmp_readonly['id_variable_']) && $this->nmgp_cmp_readonly['id_variable_'] == 'on')
       {
           $bTestReadOnly_id_variable_ = false;
           unset($this->nmgp_cmp_readonly['id_variable_']);
           $sStyleReadLab_id_variable_ = '';
           $sStyleReadInp_id_variable_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>" > <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) {?>
    <TD class="scFormDataOddMult" > 
<input type=checkbox name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }"> </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type=checkbox name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl)) { echo " checked";} ?>> </TD>
   <?php }?>
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_botoes['delete'] == "on" && $this->nmgp_opcao != "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_botoes['update'] == "on" && $this->nmgp_opcao != "novo") {
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_datos_3_nivel_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_datos_3_nivel_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_datos_3_nivel_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_datos_3_nivel_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_datos_3_nivel_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_datos_3_nivel_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['id_datos_']) && $this->nmgp_cmp_hidden['id_datos_'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="id_datos_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($id_datos_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOddMult" id="hidden_field_data_id_datos_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_datos_; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult" style=";;vertical-align: top;padding: 0px"><span id="id_read_on_id_datos_<?php echo $sc_seq_vert ?>" style=";<?php echo $sStyleReadLab_id_datos_; ?>"><?php echo NM_encode_input($this->id_datos_); ?></span><span id="id_read_off_id_datos_<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_id_datos_; ?>"><input type=hidden id="id_sc_field_id_datos_<?php echo $sc_seq_vert ?>" name="id_datos_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($id_datos_) . "\">"?><span id="id_ajax_label_id_datos_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($id_datos_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_datos_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_datos_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['valor_']) && $this->nmgp_cmp_hidden['valor_'] == 'off') { $sc_hidden_yes++;  ?>
<input type=hidden name="valor_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($valor_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult" id="hidden_field_data_valor_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_valor_; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_valor_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valor_"]) &&  $this->nmgp_cmp_readonly["valor_"] == "on") { 

 ?>
<input type=hidden name="valor_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($valor_) . "\">" . $valor_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_valor_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-valor_<?php echo $sc_seq_vert ?>" style=";<?php echo $sStyleReadLab_valor_; ?>"><?php echo NM_encode_input($this->valor_); ?></span><span id="id_read_off_valor_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valor_; ?>">
 <input class="sc-js-input scFormObjectOddMult" style="text-align:right;" id="id_sc_field_valor_<?php echo $sc_seq_vert ?>" type=text name="valor_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($valor_) ?>"
 size=15 alt="{datatype: 'integer', maxLength: 15, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valor_']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_categoria_']) && $this->nmgp_cmp_hidden['id_categoria_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_categoria_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($this->id_categoria_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult" id="hidden_field_data_id_categoria_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_categoria_; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_categoria_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_categoria_"]) &&  $this->nmgp_cmp_readonly["id_categoria_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_'] = array(); 
    }

   $old_value_id_datos_ = $this->id_datos_;
   $old_value_valor_ = $this->valor_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_datos_ = $this->id_datos_;
   $unformatted_value_valor_ = $this->valor_;

   $nm_comando = "SELECT 
  `categoria`.`id_categoria`,
  `categoria`.`Nombre`
FROM
  `indicadores`
  INNER JOIN `tipo_categoria` ON (`indicadores`.`fk_tipo_categoria` = `tipo_categoria`.`id_tipo_categoria`)
  INNER JOIN `categoria` ON (`tipo_categoria`.`id_tipo_categoria` = `categoria`.`fk_tipo_categoria`)
WHERE
  `indicadores`.`id_indicadores` = '" . $_SESSION['var_id_indicador'] . "'";

   $this->id_datos_ = $old_value_id_datos_;
   $this->valor_ = $old_value_valor_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $id_categoria__look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_categoria__1))
          {
              foreach ($this->id_categoria__1 as $tmp_id_categoria_)
              {
                  if (trim($tmp_id_categoria_) === trim($cadaselect[1])) { $id_categoria__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_categoria_) === trim($cadaselect[1])) { $id_categoria__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type=hidden name="id_categoria_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($id_categoria_) . "\">" . $id_categoria__look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_'] = array(); 
    }

   $old_value_id_datos_ = $this->id_datos_;
   $old_value_valor_ = $this->valor_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_datos_ = $this->id_datos_;
   $unformatted_value_valor_ = $this->valor_;

   $nm_comando = "SELECT 
  `categoria`.`id_categoria`,
  `categoria`.`Nombre`
FROM
  `indicadores`
  INNER JOIN `tipo_categoria` ON (`indicadores`.`fk_tipo_categoria` = `tipo_categoria`.`id_tipo_categoria`)
  INNER JOIN `categoria` ON (`tipo_categoria`.`id_tipo_categoria` = `categoria`.`fk_tipo_categoria`)
WHERE
  `indicadores`.`id_indicadores` = '" . $_SESSION['var_id_indicador'] . "'";

   $this->id_datos_ = $old_value_id_datos_;
   $this->valor_ = $old_value_valor_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_categoria_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todo = explode("?@?", $nmgp_def_dados) ; 
   $x = 0; 
   $id_categoria__look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_categoria__1))
          {
              foreach ($this->id_categoria__1 as $tmp_id_categoria_)
              {
                  if (trim($tmp_id_categoria_) === trim($cadaselect[1])) { $id_categoria__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_categoria_) === trim($cadaselect[1])) { $id_categoria__look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_id_categoria_" . $sc_seq_vert . "\" style=\";" .  $sStyleReadLab_id_categoria_ . "\">" . NM_encode_input($id_categoria__look) . "</span><span id=\"id_read_off_id_categoria_" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_id_categoria_ . "\">";
   echo " <span id=\"idAjaxSelect_id_categoria_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult\" style=\";\" id=\"id_sc_field_id_categoria_" . $sc_seq_vert . "\" name=\"id_categoria_" . $sc_seq_vert . "\" size=1>" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_categoria_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_categoria_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_categoria_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_categoria_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_municipio_']) && $this->nmgp_cmp_hidden['id_municipio_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_municipio_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($this->id_municipio_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult" id="hidden_field_data_id_municipio_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_municipio_; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_municipio_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_municipio_"]) &&  $this->nmgp_cmp_readonly["id_municipio_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_'] = array(); 
    }

   $old_value_id_datos_ = $this->id_datos_;
   $old_value_valor_ = $this->valor_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_datos_ = $this->id_datos_;
   $unformatted_value_valor_ = $this->valor_;

   $nm_comando = "SELECT idmunicipio, nombreMunicipio 
FROM municipio 
where idmunicipio='" . $_SESSION['var_id_municipio'] . "'
ORDER BY nombreMunicipio";

   $this->id_datos_ = $old_value_id_datos_;
   $this->valor_ = $old_value_valor_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $id_municipio__look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_municipio__1))
          {
              foreach ($this->id_municipio__1 as $tmp_id_municipio_)
              {
                  if (trim($tmp_id_municipio_) === trim($cadaselect[1])) { $id_municipio__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_municipio_) === trim($cadaselect[1])) { $id_municipio__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type=hidden name="id_municipio_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($id_municipio_) . "\">" . $id_municipio__look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_'] = array(); 
    }

   $old_value_id_datos_ = $this->id_datos_;
   $old_value_valor_ = $this->valor_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_datos_ = $this->id_datos_;
   $unformatted_value_valor_ = $this->valor_;

   $nm_comando = "SELECT idmunicipio, nombreMunicipio 
FROM municipio 
where idmunicipio='" . $_SESSION['var_id_municipio'] . "'
ORDER BY nombreMunicipio";

   $this->id_datos_ = $old_value_id_datos_;
   $this->valor_ = $old_value_valor_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_municipio_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todo = explode("?@?", $nmgp_def_dados) ; 
   $x = 0; 
   $id_municipio__look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_municipio__1))
          {
              foreach ($this->id_municipio__1 as $tmp_id_municipio_)
              {
                  if (trim($tmp_id_municipio_) === trim($cadaselect[1])) { $id_municipio__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_municipio_) === trim($cadaselect[1])) { $id_municipio__look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_id_municipio_" . $sc_seq_vert . "\" style=\";" .  $sStyleReadLab_id_municipio_ . "\">" . NM_encode_input($id_municipio__look) . "</span><span id=\"id_read_off_id_municipio_" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_id_municipio_ . "\">";
   echo " <span id=\"idAjaxSelect_id_municipio_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult\" style=\";\" id=\"id_sc_field_id_municipio_" . $sc_seq_vert . "\" name=\"id_municipio_" . $sc_seq_vert . "\" size=1>" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_municipio_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_municipio_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_municipio_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_municipio_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sub_variable3_']) && $this->nmgp_cmp_hidden['sub_variable3_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sub_variable3_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($this->sub_variable3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult" id="hidden_field_data_sub_variable3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sub_variable3_; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sub_variable3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sub_variable3_"]) &&  $this->nmgp_cmp_readonly["sub_variable3_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_'] = array(); 
    }

   $old_value_id_datos_ = $this->id_datos_;
   $old_value_valor_ = $this->valor_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_datos_ = $this->id_datos_;
   $unformatted_value_valor_ = $this->valor_;

   $nm_comando = "SELECT id_variable, descripcion 
FROM variables 
where id_indicador='" . $_SESSION['var_id_indicador'] . "'
ORDER BY descripcion";

   $this->id_datos_ = $old_value_id_datos_;
   $this->valor_ = $old_value_valor_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $sub_variable3__look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sub_variable3__1))
          {
              foreach ($this->sub_variable3__1 as $tmp_sub_variable3_)
              {
                  if (trim($tmp_sub_variable3_) === trim($cadaselect[1])) { $sub_variable3__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sub_variable3_) === trim($cadaselect[1])) { $sub_variable3__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type=hidden name="sub_variable3_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($sub_variable3_) . "\">" . $sub_variable3__look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_'] = array(); 
    }

   $old_value_id_datos_ = $this->id_datos_;
   $old_value_valor_ = $this->valor_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_datos_ = $this->id_datos_;
   $unformatted_value_valor_ = $this->valor_;

   $nm_comando = "SELECT id_variable, descripcion 
FROM variables 
where id_indicador='" . $_SESSION['var_id_indicador'] . "'
ORDER BY descripcion";

   $this->id_datos_ = $old_value_id_datos_;
   $this->valor_ = $old_value_valor_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todo = explode("?@?", $nmgp_def_dados) ; 
   $x = 0; 
   $sub_variable3__look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sub_variable3__1))
          {
              foreach ($this->sub_variable3__1 as $tmp_sub_variable3_)
              {
                  if (trim($tmp_sub_variable3_) === trim($cadaselect[1])) { $sub_variable3__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sub_variable3_) === trim($cadaselect[1])) { $sub_variable3__look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_sub_variable3_" . $sc_seq_vert . "\" style=\";" .  $sStyleReadLab_sub_variable3_ . "\">" . NM_encode_input($sub_variable3__look) . "</span><span id=\"id_read_off_sub_variable3_" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_sub_variable3_ . "\">";
   echo " <span id=\"idAjaxSelect_sub_variable3_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult\" style=\";\" id=\"id_sc_field_sub_variable3_" . $sc_seq_vert . "\" name=\"sub_variable3_" . $sc_seq_vert . "\" size=1>" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sub_variable3_'][] = ''; 
   echo "  <option value=\"\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->sub_variable3_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->sub_variable3_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sub_variable3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sub_variable3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_0_']) && $this->nmgp_cmp_hidden['sc_field_0_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sc_field_0_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($this->sc_field_0_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult" id="hidden_field_data_sc_field_0_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_0_; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_0_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_0_"]) &&  $this->nmgp_cmp_readonly["sc_field_0_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_'] = array(); 
    }

   $old_value_id_datos_ = $this->id_datos_;
   $old_value_valor_ = $this->valor_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_datos_ = $this->id_datos_;
   $unformatted_value_valor_ = $this->valor_;

   $nm_comando = "SELECT id_variable, descripcion
FROM variables 
where id_padre='$this->sub_variable3_'
ORDER BY descripcion";

   $this->id_datos_ = $old_value_id_datos_;
   $this->valor_ = $old_value_valor_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $sc_field_0__look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sc_field_0__1))
          {
              foreach ($this->sc_field_0__1 as $tmp_sc_field_0_)
              {
                  if (trim($tmp_sc_field_0_) === trim($cadaselect[1])) { $sc_field_0__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sc_field_0_) === trim($cadaselect[1])) { $sc_field_0__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type=hidden name="sc_field_0_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($sc_field_0_) . "\">" . $sc_field_0__look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_'] = array(); 
    }

   $old_value_id_datos_ = $this->id_datos_;
   $old_value_valor_ = $this->valor_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_datos_ = $this->id_datos_;
   $unformatted_value_valor_ = $this->valor_;

   $nm_comando = "SELECT id_variable, descripcion
FROM variables 
where id_padre='$this->sub_variable3_'
ORDER BY descripcion";

   $this->id_datos_ = $old_value_id_datos_;
   $this->valor_ = $old_value_valor_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todo = explode("?@?", $nmgp_def_dados) ; 
   $x = 0; 
   $sc_field_0__look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sc_field_0__1))
          {
              foreach ($this->sc_field_0__1 as $tmp_sc_field_0_)
              {
                  if (trim($tmp_sc_field_0_) === trim($cadaselect[1])) { $sc_field_0__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sc_field_0_) === trim($cadaselect[1])) { $sc_field_0__look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_sc_field_0_" . $sc_seq_vert . "\" style=\";" .  $sStyleReadLab_sc_field_0_ . "\">" . NM_encode_input($sc_field_0__look) . "</span><span id=\"id_read_off_sc_field_0_" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_sc_field_0_ . "\">";
   echo " <span id=\"idAjaxSelect_sc_field_0_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult\" style=\";\" id=\"id_sc_field_sc_field_0_" . $sc_seq_vert . "\" name=\"sc_field_0_" . $sc_seq_vert . "\" size=1>" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_sc_field_0_'][] = ''; 
   echo "  <option value=\"\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->sc_field_0_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->sc_field_0_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_0_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_0_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_variable_']) && $this->nmgp_cmp_hidden['id_variable_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_variable_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($this->id_variable_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult" id="hidden_field_data_id_variable_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_variable_; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_variable_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_variable_"]) &&  $this->nmgp_cmp_readonly["id_variable_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_'] = array(); 
    }

   $old_value_id_datos_ = $this->id_datos_;
   $old_value_valor_ = $this->valor_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_datos_ = $this->id_datos_;
   $unformatted_value_valor_ = $this->valor_;

   $nm_comando = "SELECT id_variable, descripcion
FROM variables 
where id_padre='$this->sc_field_0_'
ORDER BY descripcion";

   $this->id_datos_ = $old_value_id_datos_;
   $this->valor_ = $old_value_valor_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $id_variable__look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_variable__1))
          {
              foreach ($this->id_variable__1 as $tmp_id_variable_)
              {
                  if (trim($tmp_id_variable_) === trim($cadaselect[1])) { $id_variable__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_variable_) === trim($cadaselect[1])) { $id_variable__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type=hidden name="id_variable_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($id_variable_) . "\">" . $id_variable__look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_'] = array(); 
    }

   $old_value_id_datos_ = $this->id_datos_;
   $old_value_valor_ = $this->valor_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_datos_ = $this->id_datos_;
   $unformatted_value_valor_ = $this->valor_;

   $nm_comando = "SELECT id_variable, descripcion
FROM variables 
where id_padre='$this->sc_field_0_'
ORDER BY descripcion";

   $this->id_datos_ = $old_value_id_datos_;
   $this->valor_ = $old_value_valor_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todo = explode("?@?", $nmgp_def_dados) ; 
   $x = 0; 
   $id_variable__look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_variable__1))
          {
              foreach ($this->id_variable__1 as $tmp_id_variable_)
              {
                  if (trim($tmp_id_variable_) === trim($cadaselect[1])) { $id_variable__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_variable_) === trim($cadaselect[1])) { $id_variable__look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_id_variable_" . $sc_seq_vert . "\" style=\";" .  $sStyleReadLab_id_variable_ . "\">" . NM_encode_input($id_variable__look) . "</span><span id=\"id_read_off_id_variable_" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_id_variable_ . "\">";
   echo " <span id=\"idAjaxSelect_id_variable_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult\" style=\";\" id=\"id_sc_field_id_variable_" . $sc_seq_vert . "\" name=\"id_variable_" . $sc_seq_vert . "\" size=1>" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['Lookup_id_variable_'][] = ''; 
   echo "  <option value=\"\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_variable_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_variable_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_variable_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_variable_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_id_datos_))
       {
           $this->nmgp_cmp_readonly['id_datos_'] = $sCheckRead_id_datos_;
       }
       if ('display: none;' == $sStyleHidden_id_datos_)
       {
           $this->nmgp_cmp_hidden['id_datos_'] = 'off';
       }
       if (isset($sCheckRead_valor_))
       {
           $this->nmgp_cmp_readonly['valor_'] = $sCheckRead_valor_;
       }
       if ('display: none;' == $sStyleHidden_valor_)
       {
           $this->nmgp_cmp_hidden['valor_'] = 'off';
       }
       if (isset($sCheckRead_id_categoria_))
       {
           $this->nmgp_cmp_readonly['id_categoria_'] = $sCheckRead_id_categoria_;
       }
       if ('display: none;' == $sStyleHidden_id_categoria_)
       {
           $this->nmgp_cmp_hidden['id_categoria_'] = 'off';
       }
       if (isset($sCheckRead_id_municipio_))
       {
           $this->nmgp_cmp_readonly['id_municipio_'] = $sCheckRead_id_municipio_;
       }
       if ('display: none;' == $sStyleHidden_id_municipio_)
       {
           $this->nmgp_cmp_hidden['id_municipio_'] = 'off';
       }
       if (isset($sCheckRead_sub_variable3_))
       {
           $this->nmgp_cmp_readonly['sub_variable3_'] = $sCheckRead_sub_variable3_;
       }
       if ('display: none;' == $sStyleHidden_sub_variable3_)
       {
           $this->nmgp_cmp_hidden['sub_variable3_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_0_))
       {
           $this->nmgp_cmp_readonly['sc_field_0_'] = $sCheckRead_sc_field_0_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_0_)
       {
           $this->nmgp_cmp_hidden['sc_field_0_'] = 'off';
       }
       if (isset($sCheckRead_id_variable_))
       {
           $this->nmgp_cmp_readonly['id_variable_'] = $sCheckRead_id_variable_;
       }
       if ('display: none;' == $sStyleHidden_id_variable_)
       {
           $this->nmgp_cmp_hidden['id_variable_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_datos_3_nivel = $guarda_form_vert_form_datos_3_nivel;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div> 
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type=hidden name="sc_contr_vert" value="<?php echo NM_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; text-align: center; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr>
<tr><td class="scFormPageText">
<span class="scFormRequiredOddColorMult">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
<script> 
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
</script> 
<div id="new_line_dummy" style="display: none">
</div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
   </td></tr></table>
<script>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_datos_3_nivel");
 parent.scAjaxDetailHeight("form_datos_3_nivel", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailHeight("form_datos_3_nivel", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
?>
<script type="text/javascript">
_scAjaxShowMessage(scMsgDefTitle, "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_3_nivel']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
</body> 
</html> 
<?php 
 } 
} 
?> 
