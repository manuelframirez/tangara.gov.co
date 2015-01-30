<?php

class grid_indicadores_1_1_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $texto_tag;
   var $arquivo;
   var $tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function grid_indicadores_1_1_rtf()
   {
      $this->nm_data   = new nm_data("es");
      $this->texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->arquivo    = "sc_rtf";
      $this->arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->arquivo   .= "_grid_indicadores_1_1";
      $this->arquivo   .= ".rtf";
      $this->tit_doc    = "grid_indicadores_1_1.rtf";
   }

   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->dimension_id_dimension = $Busca_temp['dimension_id_dimension']; 
          $tmp_pos = strpos($this->dimension_id_dimension, "##@@");
          if ($tmp_pos !== false)
          {
              $this->dimension_id_dimension = substr($this->dimension_id_dimension, 0, $tmp_pos);
          }
          $this->dimension_id_dimension_2 = $Busca_temp['dimension_id_dimension_input_2']; 
          $this->dimension_descripcion = $Busca_temp['dimension_descripcion']; 
          $tmp_pos = strpos($this->dimension_descripcion, "##@@");
          if ($tmp_pos !== false)
          {
              $this->dimension_descripcion = substr($this->dimension_descripcion, 0, $tmp_pos);
          }
          $this->tematica_id_tematica = $Busca_temp['tematica_id_tematica']; 
          $tmp_pos = strpos($this->tematica_id_tematica, "##@@");
          if ($tmp_pos !== false)
          {
              $this->tematica_id_tematica = substr($this->tematica_id_tematica, 0, $tmp_pos);
          }
          $this->tematica_id_tematica_2 = $Busca_temp['tematica_id_tematica_input_2']; 
          $this->tematica_descripcion = $Busca_temp['tematica_descripcion']; 
          $tmp_pos = strpos($this->tematica_descripcion, "##@@");
          if ($tmp_pos !== false)
          {
              $this->tematica_descripcion = substr($this->tematica_descripcion, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['rtf_name']))
      {
          $this->arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['rtf_name'];
          $this->tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT `dimension`.`id_dimension` as dimension_id_dimension, `dimension`.`Descripcion` as dimension_descripcion, `tematica`.`id_tematica` as tematica_id_tematica, `tematica`.`Descripcion` as tematica_descripcion, `indicadores`.`id_indicadores` as indicadores_id_indicadores, `indicadores`.`Nombre` as indicadores_nombre, `variables`.`id_variable` as variables_id_variable, `variables`.`descripcion` as variables_descripcion from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT `dimension`.`id_dimension` as dimension_id_dimension, `dimension`.`Descripcion` as dimension_descripcion, `tematica`.`id_tematica` as tematica_id_tematica, `tematica`.`Descripcion` as tematica_descripcion, `indicadores`.`id_indicadores` as indicadores_id_indicadores, `indicadores`.`Nombre` as indicadores_nombre, `variables`.`id_variable` as variables_id_variable, `variables`.`descripcion` as variables_descripcion from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      $this->texto_tag .= "<table>\r\n";
      $this->texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['dimension_id_dimension'])) ? $this->New_label['dimension_id_dimension'] : "Id Dimension"; 
          if ($Cada_col == "dimension_id_dimension" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dimension_descripcion'])) ? $this->New_label['dimension_descripcion'] : "Descripcion"; 
          if ($Cada_col == "dimension_descripcion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tematica_id_tematica'])) ? $this->New_label['tematica_id_tematica'] : "Id Tematica"; 
          if ($Cada_col == "tematica_id_tematica" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tematica_descripcion'])) ? $this->New_label['tematica_descripcion'] : "Descripcion"; 
          if ($Cada_col == "tematica_descripcion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['indicadores_id_indicadores'])) ? $this->New_label['indicadores_id_indicadores'] : "Id Indicadores"; 
          if ($Cada_col == "indicadores_id_indicadores" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['indicadores_nombre'])) ? $this->New_label['indicadores_nombre'] : "Nombre"; 
          if ($Cada_col == "indicadores_nombre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['variables_id_variable'])) ? $this->New_label['variables_id_variable'] : "Id Variable"; 
          if ($Cada_col == "variables_id_variable" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['variables_descripcion'])) ? $this->New_label['variables_descripcion'] : "Descripcion"; 
          if ($Cada_col == "variables_descripcion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->texto_tag .= "</tr>\r\n";
      while (!$rs->EOF)
      {
         $this->texto_tag .= "<tr>\r\n";
         $this->dimension_id_dimension = $rs->fields[0] ;  
         $this->dimension_id_dimension = (string)$this->dimension_id_dimension;
         $this->dimension_descripcion = $rs->fields[1] ;  
         $this->tematica_id_tematica = $rs->fields[2] ;  
         $this->tematica_id_tematica = (string)$this->tematica_id_tematica;
         $this->tematica_descripcion = $rs->fields[3] ;  
         $this->indicadores_id_indicadores = $rs->fields[4] ;  
         $this->indicadores_id_indicadores = (string)$this->indicadores_id_indicadores;
         $this->indicadores_nombre = $rs->fields[5] ;  
         $this->variables_id_variable = $rs->fields[6] ;  
         $this->variables_id_variable = (string)$this->variables_id_variable;
         $this->variables_descripcion = $rs->fields[7] ;  
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->texto_tag .= "</table>\r\n";

      $rs->Close();
   }
   //----- dimension_id_dimension
   function NM_export_dimension_id_dimension()
   {
         nmgp_Form_Num_Val($this->dimension_id_dimension, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->dimension_id_dimension))
         {
             $this->dimension_id_dimension = mb_convert_encoding($this->dimension_id_dimension, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->dimension_id_dimension = str_replace('<', '&lt;', $this->dimension_id_dimension);
          $this->dimension_id_dimension = str_replace('>', '&gt;', $this->dimension_id_dimension);
         $this->texto_tag .= "<td>" . $this->dimension_id_dimension . "</td>\r\n";
   }
   //----- dimension_descripcion
   function NM_export_dimension_descripcion()
   {
         if (!NM_is_utf8($this->dimension_descripcion))
         {
             $this->dimension_descripcion = mb_convert_encoding($this->dimension_descripcion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->dimension_descripcion = str_replace('<', '&lt;', $this->dimension_descripcion);
          $this->dimension_descripcion = str_replace('>', '&gt;', $this->dimension_descripcion);
         $this->texto_tag .= "<td>" . $this->dimension_descripcion . "</td>\r\n";
   }
   //----- tematica_id_tematica
   function NM_export_tematica_id_tematica()
   {
         nmgp_Form_Num_Val($this->tematica_id_tematica, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->tematica_id_tematica))
         {
             $this->tematica_id_tematica = mb_convert_encoding($this->tematica_id_tematica, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->tematica_id_tematica = str_replace('<', '&lt;', $this->tematica_id_tematica);
          $this->tematica_id_tematica = str_replace('>', '&gt;', $this->tematica_id_tematica);
         $this->texto_tag .= "<td>" . $this->tematica_id_tematica . "</td>\r\n";
   }
   //----- tematica_descripcion
   function NM_export_tematica_descripcion()
   {
         if (!NM_is_utf8($this->tematica_descripcion))
         {
             $this->tematica_descripcion = mb_convert_encoding($this->tematica_descripcion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->tematica_descripcion = str_replace('<', '&lt;', $this->tematica_descripcion);
          $this->tematica_descripcion = str_replace('>', '&gt;', $this->tematica_descripcion);
         $this->texto_tag .= "<td>" . $this->tematica_descripcion . "</td>\r\n";
   }
   //----- indicadores_id_indicadores
   function NM_export_indicadores_id_indicadores()
   {
         nmgp_Form_Num_Val($this->indicadores_id_indicadores, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->indicadores_id_indicadores))
         {
             $this->indicadores_id_indicadores = mb_convert_encoding($this->indicadores_id_indicadores, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->indicadores_id_indicadores = str_replace('<', '&lt;', $this->indicadores_id_indicadores);
          $this->indicadores_id_indicadores = str_replace('>', '&gt;', $this->indicadores_id_indicadores);
         $this->texto_tag .= "<td>" . $this->indicadores_id_indicadores . "</td>\r\n";
   }
   //----- indicadores_nombre
   function NM_export_indicadores_nombre()
   {
         if (!NM_is_utf8($this->indicadores_nombre))
         {
             $this->indicadores_nombre = mb_convert_encoding($this->indicadores_nombre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->indicadores_nombre = str_replace('<', '&lt;', $this->indicadores_nombre);
          $this->indicadores_nombre = str_replace('>', '&gt;', $this->indicadores_nombre);
         $this->texto_tag .= "<td>" . $this->indicadores_nombre . "</td>\r\n";
   }
   //----- variables_id_variable
   function NM_export_variables_id_variable()
   {
         nmgp_Form_Num_Val($this->variables_id_variable, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->variables_id_variable))
         {
             $this->variables_id_variable = mb_convert_encoding($this->variables_id_variable, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->variables_id_variable = str_replace('<', '&lt;', $this->variables_id_variable);
          $this->variables_id_variable = str_replace('>', '&gt;', $this->variables_id_variable);
         $this->texto_tag .= "<td>" . $this->variables_id_variable . "</td>\r\n";
   }
   //----- variables_descripcion
   function NM_export_variables_descripcion()
   {
         if (!NM_is_utf8($this->variables_descripcion))
         {
             $this->variables_descripcion = mb_convert_encoding($this->variables_descripcion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->variables_descripcion = str_replace('<', '&lt;', $this->variables_descripcion);
          $this->variables_descripcion = str_replace('>', '&gt;', $this->variables_descripcion);
         $this->texto_tag .= "<td>" . $this->variables_descripcion . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $rtf_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> -  :: RTF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
  <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
  <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
  <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
  <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
  <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">RTF</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_indicadores_1_1_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="nm_tit_doc" value="<?php echo NM_encode_input($this->tit_doc); ?>"> 
<input type="hidden" name="nm_name_doc" value="<?php echo NM_encode_input($this->Ini->path_imag_temp . "/" . $this->arquivo) ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
}

?>
