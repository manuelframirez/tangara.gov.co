<?php

class grid_datos_3_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function grid_datos_3_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("es");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_datos_3']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_datos_3']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->variables1_descripcion = $Busca_temp['variables1_descripcion']; 
          $tmp_pos = strpos($this->variables1_descripcion, "##@@");
          if ($tmp_pos !== false)
          {
              $this->variables1_descripcion = substr($this->variables1_descripcion, 0, $tmp_pos);
          }
          $this->variables_descripcion = $Busca_temp['variables_descripcion']; 
          $tmp_pos = strpos($this->variables_descripcion, "##@@");
          if ($tmp_pos !== false)
          {
              $this->variables_descripcion = substr($this->variables_descripcion, 0, $tmp_pos);
          }
          $this->categoria_nombre = $Busca_temp['categoria_nombre']; 
          $tmp_pos = strpos($this->categoria_nombre, "##@@");
          if ($tmp_pos !== false)
          {
              $this->categoria_nombre = substr($this->categoria_nombre, 0, $tmp_pos);
          }
          $this->datos_valor = $Busca_temp['datos_valor']; 
          $tmp_pos = strpos($this->datos_valor, "##@@");
          if ($tmp_pos !== false)
          {
              $this->datos_valor = substr($this->datos_valor, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['tot_geral'] = array() ;  
      $nm_comando = "select count(*), sum(`datos`.`Valor`) as sum_datos_valor from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['where_pesq']; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['contr_total_geral'] = "OK";
   } 

   //-----  categoria_nombre
   function quebra_categoria_nombre_descripcion($categoria_nombre, $arg_sum_categoria_nombre) 
   {
      global $tot_categoria_nombre ;  
      $tot_categoria_nombre = array() ;  
      $nm_comando = "select count(*), sum(`datos`.`Valor`) as sum_datos_valor from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['where_pesq']; 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['where_pesq'])) 
      { 
         $nm_comando .= " where `categoria`.`Nombre`" . $arg_sum_categoria_nombre ; 
      } 
      else 
      { 
         $nm_comando .= " and `categoria`.`Nombre`" . $arg_sum_categoria_nombre ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_categoria_nombre[0] = $categoria_nombre ; 
      $tot_categoria_nombre[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_categoria_nombre[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //-----  variables2_descripcion
   function quebra_variables2_descripcion_descripcion($categoria_nombre, $variables2_descripcion, $arg_sum_categoria_nombre, $arg_sum_variables2_descripcion) 
   {
      global $tot_variables2_descripcion ;  
      $tot_variables2_descripcion = array() ;  
      $nm_comando = "select count(*), sum(`datos`.`Valor`) as sum_datos_valor from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['where_pesq']; 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['where_pesq'])) 
      { 
         $nm_comando .= " where `categoria`.`Nombre`" . $arg_sum_categoria_nombre . " and `variables2`.`descripcion`" . $arg_sum_variables2_descripcion ; 
      } 
      else 
      { 
         $nm_comando .= " and `categoria`.`Nombre`" . $arg_sum_categoria_nombre . " and `variables2`.`descripcion`" . $arg_sum_variables2_descripcion ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_variables2_descripcion[0] = $variables2_descripcion ; 
      $tot_variables2_descripcion[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_variables2_descripcion[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //-----  variables1_descripcion
   function quebra_variables1_descripcion_descripcion($categoria_nombre, $variables2_descripcion, $variables1_descripcion, $arg_sum_categoria_nombre, $arg_sum_variables2_descripcion, $arg_sum_variables1_descripcion) 
   {
      global $tot_variables1_descripcion ;  
      $tot_variables1_descripcion = array() ;  
      $nm_comando = "select count(*), sum(`datos`.`Valor`) as sum_datos_valor from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['where_pesq']; 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['where_pesq'])) 
      { 
         $nm_comando .= " where `categoria`.`Nombre`" . $arg_sum_categoria_nombre . " and `variables2`.`descripcion`" . $arg_sum_variables2_descripcion . " and `variables1`.`descripcion`" . $arg_sum_variables1_descripcion ; 
      } 
      else 
      { 
         $nm_comando .= " and `categoria`.`Nombre`" . $arg_sum_categoria_nombre . " and `variables2`.`descripcion`" . $arg_sum_variables2_descripcion . " and `variables1`.`descripcion`" . $arg_sum_variables1_descripcion ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_variables1_descripcion[0] = $variables1_descripcion ; 
      $tot_variables1_descripcion[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_variables1_descripcion[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //-----  variables_descripcion
   function quebra_variables_descripcion_descripcion($categoria_nombre, $variables2_descripcion, $variables1_descripcion, $variables_descripcion, $arg_sum_categoria_nombre, $arg_sum_variables2_descripcion, $arg_sum_variables1_descripcion, $arg_sum_variables_descripcion) 
   {
      global $tot_variables_descripcion ;  
      $tot_variables_descripcion = array() ;  
      $nm_comando = "select count(*), sum(`datos`.`Valor`) as sum_datos_valor from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['where_pesq']; 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['where_pesq'])) 
      { 
         $nm_comando .= " where `categoria`.`Nombre`" . $arg_sum_categoria_nombre . " and `variables2`.`descripcion`" . $arg_sum_variables2_descripcion . " and `variables1`.`descripcion`" . $arg_sum_variables1_descripcion . " and `variables`.`descripcion`" . $arg_sum_variables_descripcion ; 
      } 
      else 
      { 
         $nm_comando .= " and `categoria`.`Nombre`" . $arg_sum_categoria_nombre . " and `variables2`.`descripcion`" . $arg_sum_variables2_descripcion . " and `variables1`.`descripcion`" . $arg_sum_variables1_descripcion . " and `variables`.`descripcion`" . $arg_sum_variables_descripcion ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_variables_descripcion[0] = $variables_descripcion ; 
      $tot_variables_descripcion[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_variables_descripcion[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 


   //----- 
   function resumo_descripcion($destino_resumo, &$array_total_categoria_nombre, &$array_total_variables2_descripcion, &$array_total_variables1_descripcion, &$array_total_variables_descripcion)
   {
      global $nada, $nm_lang;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['campos_busca']))
   { 
      $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['campos_busca'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
       $this->variables1_descripcion = $Busca_temp['variables1_descripcion']; 
       $tmp_pos = strpos($this->variables1_descripcion, "##@@");
       if ($tmp_pos !== false)
       {
           $this->variables1_descripcion = substr($this->variables1_descripcion, 0, $tmp_pos);
       }
       $this->variables_descripcion = $Busca_temp['variables_descripcion']; 
       $tmp_pos = strpos($this->variables_descripcion, "##@@");
       if ($tmp_pos !== false)
       {
           $this->variables_descripcion = substr($this->variables_descripcion, 0, $tmp_pos);
       }
       $this->categoria_nombre = $Busca_temp['categoria_nombre']; 
       $tmp_pos = strpos($this->categoria_nombre, "##@@");
       if ($tmp_pos !== false)
       {
           $this->categoria_nombre = substr($this->categoria_nombre, 0, $tmp_pos);
       }
       $this->datos_valor = $Busca_temp['datos_valor']; 
       $tmp_pos = strpos($this->datos_valor, "##@@");
       if ($tmp_pos !== false)
       {
           $this->datos_valor = substr($this->datos_valor, 0, $tmp_pos);
       }
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_datos_3']['where_pesq_filtro'];
   $nmgp_order_by = " order by `categoria`.`Nombre` asc, `variables2`.`descripcion` asc, `variables1`.`descripcion` asc, `variables`.`descripcion` asc"; 
      $_SESSION['scriptcase']['grid_datos_3']['contr_erro'] = 'on';
if (!isset($_SESSION['Foot_tangara'])) {$_SESSION['Foot_tangara'] = "";}
if (!isset($this->sc_temp_Foot_tangara)) {$this->sc_temp_Foot_tangara = (isset($_SESSION['Foot_tangara'])) ? $_SESSION['Foot_tangara'] : "";}
if (!isset($_SESSION['Header_tangara'])) {$_SESSION['Header_tangara'] = "";}
if (!isset($this->sc_temp_Header_tangara)) {$this->sc_temp_Header_tangara = (isset($_SESSION['Header_tangara'])) ? $_SESSION['Header_tangara'] : "";}
if (!isset($_SESSION['Resumen'])) {$_SESSION['Resumen'] = "";}
if (!isset($this->sc_temp_Resumen)) {$this->sc_temp_Resumen = (isset($_SESSION['Resumen'])) ? $_SESSION['Resumen'] : "";}
if (!isset($_SESSION['var_id_municipio'])) {$_SESSION['var_id_municipio'] = "";}
if (!isset($this->sc_temp_var_id_municipio)) {$this->sc_temp_var_id_municipio = (isset($_SESSION['var_id_municipio'])) ? $_SESSION['var_id_municipio'] : "";}
if (!isset($_SESSION['var_id_indicador'])) {$_SESSION['var_id_indicador'] = "";}
if (!isset($this->sc_temp_var_id_indicador)) {$this->sc_temp_var_id_indicador = (isset($_SESSION['var_id_indicador'])) ? $_SESSION['var_id_indicador'] : "";}
   
     $nm_select = "set names 'utf8'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
$Resum='Información';
$val='';
$Footers='';
$Municipios='';
$id = "$this->sc_temp_var_id_indicador";
$mun = "$this->sc_temp_var_id_municipio";
$check_sql_header = "SELECT `Nombre` FROM `indicadores` WHERE `id_indicadores` = '".$id."'";
$check_sql_footer = "SELECT `texto_fuente` FROM `fuente` WHERE `id_municipio`='".$mun."' AND `id_indicador`='".$id."'";

$check_sql_Municipio = "SELECT `municipio`.`nombreMunicipio` FROM `municipio` WHERE `municipio`.`idmunicipio` = '".$mun."'";
$check_sql_Resumen="SELECT `Descripcion` FROM `indicadores` WHERE `id_indicadores` = '".$id."'";
 
      $nm_select = $check_sql_header; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->header = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->header[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->header = false;
          $this->header_erro = $this->Db->ErrorMsg();
      } 
;
 
      $nm_select = $check_sql_Resumen; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Resumen = array();
      $this->resumen = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->Resumen[$y] [$x] = $rx->fields[$x];
                        $this->resumen[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Resumen = false;
          $this->Resumen_erro = $this->Db->ErrorMsg();
          $this->resumen = false;
          $this->resumen_erro = $this->Db->ErrorMsg();
      } 
;
 
      $nm_select = $check_sql_footer; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Footer = array();
      $this->footer = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->Footer[$y] [$x] = $rx->fields[$x];
                        $this->footer[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Footer = false;
          $this->Footer_erro = $this->Db->ErrorMsg();
          $this->footer = false;
          $this->footer_erro = $this->Db->ErrorMsg();
      } 
;
 
      $nm_select = $check_sql_Municipio; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->Municipio = array();
      $this->municipio = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->Municipio[$y] [$x] = $rx->fields[$x];
                        $this->municipio[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Municipio = false;
          $this->Municipio_erro = $this->Db->ErrorMsg();
          $this->municipio = false;
          $this->municipio_erro = $this->Db->ErrorMsg();
      } 
;


if(isset($this->resumen[0][0]))     
{
	foreach($this->resumen[0] as $Temp)
	{
		$Resum=($Temp);
	}
}

if(isset($this->header[0][0]))     
{
   $val = $this->header[0][0];
}
if(isset($this->footer[0][0]))     
{
	$Total=count($this->footer );
	for($i=0;$i<$Total;$i++)
	{
		$Footers.=$this->footer [$i][0].'<br/>';
	}
}

if(isset($this->municipio[0][0]))     
{
   $Municipios = $this->municipio[0][0];
}
$this->sc_temp_Resumen='<center>'.$Resum.'</center>';
$this->sc_temp_Header_tangara=$Municipios.' - '.$val;
$this->sc_temp_Foot_tangara=$Footers;
if (isset($this->sc_temp_var_id_indicador)) {$_SESSION['var_id_indicador'] = $this->sc_temp_var_id_indicador;}
if (isset($this->sc_temp_var_id_municipio)) {$_SESSION['var_id_municipio'] = $this->sc_temp_var_id_municipio;}
if (isset($this->sc_temp_Resumen)) {$_SESSION['Resumen'] = $this->sc_temp_Resumen;}
if (isset($this->sc_temp_Header_tangara)) {$_SESSION['Header_tangara'] = $this->sc_temp_Header_tangara;}
if (isset($this->sc_temp_Foot_tangara)) {$_SESSION['Foot_tangara'] = $this->sc_temp_Foot_tangara;}
$_SESSION['scriptcase']['grid_datos_3']['contr_erro'] = 'off'; 
      if (!empty($this->Ini->nm_order_dinamico)) 
      {
          foreach ($this->Ini->nm_order_dinamico as $nm_cada_col => $nm_nova_col)
          {
              $nmgp_order_by = str_replace($nm_cada_col, $nm_nova_col, $nmgp_order_by); 
          }
      }
     $comando  = "select count(*), sum(`datos`.`Valor`) as sum_datos_valor, `categoria`.`Nombre`, `variables2`.`descripcion`, `variables1`.`descripcion`, `variables`.`descripcion` from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by `categoria`.`Nombre`, `variables2`.`descripcion`, `variables1`.`descripcion`, `variables`.`descripcion`  " . $nmgp_order_by;
      if (!empty($this->Ini->nm_col_dinamica)) 
      {
          foreach ($this->Ini->nm_col_dinamica as $nm_cada_col => $nm_nova_col)
          {
                   $comando = str_replace($nm_cada_col, $nm_nova_col, $comando); 
          }
      }
      if ($destino_resumo != "gra") 
      {
          $comando = str_replace("avg(", "sum(", $comando); 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $array_db_total = $this->get_array($rt);
      $rt->Close();
      foreach ($array_db_total as $registro)
      {
         $categoria_nombre      = $registro[2];
         $categoria_nombre_orig = $registro[2];
         $conteudo = $registro[2];
         $categoria_nombre = $conteudo;
         if (null === $categoria_nombre)
         {
             $categoria_nombre = '';
         }
         if (null === $categoria_nombre_orig)
         {
             $categoria_nombre_orig = '';
         }
         $val_grafico_categoria_nombre = $categoria_nombre;
         $variables2_descripcion      = $registro[3];
         $variables2_descripcion_orig = $registro[3];
         $conteudo = $registro[3];
         $variables2_descripcion = $conteudo;
         if (null === $variables2_descripcion)
         {
             $variables2_descripcion = '';
         }
         if (null === $variables2_descripcion_orig)
         {
             $variables2_descripcion_orig = '';
         }
         $val_grafico_variables2_descripcion = $variables2_descripcion;
         $variables1_descripcion      = $registro[4];
         $variables1_descripcion_orig = $registro[4];
         $conteudo = $registro[4];
         $variables1_descripcion = $conteudo;
         if (null === $variables1_descripcion)
         {
             $variables1_descripcion = '';
         }
         if (null === $variables1_descripcion_orig)
         {
             $variables1_descripcion_orig = '';
         }
         $val_grafico_variables1_descripcion = $variables1_descripcion;
         $variables_descripcion      = $registro[5];
         $variables_descripcion_orig = $registro[5];
         $conteudo = $registro[5];
         $variables_descripcion = $conteudo;
         if (null === $variables_descripcion)
         {
             $variables_descripcion = '';
         }
         if (null === $variables_descripcion_orig)
         {
             $variables_descripcion_orig = '';
         }
         $val_grafico_variables_descripcion = $variables_descripcion;
         $registro[1] = str_replace(",", ".", $registro[1]);
         $registro[1] = (strpos(strtolower($registro[1]), "e")) ? (float)$registro[1] : $registro[1]; 
         $registro[1] = (string)$registro[1];
         if ($registro[1] == "") 
         {
             $registro[1] = 0;
         }
         if (isset($categoria_nombre_orig))
         {
            //-----  categoria_nombre
            if (!isset($array_total_categoria_nombre[$categoria_nombre_orig]))
            {
               $array_total_categoria_nombre[$categoria_nombre_orig][0] = $registro[0];
               $array_total_categoria_nombre[$categoria_nombre_orig][1] = $registro[1];
               $array_total_categoria_nombre[$categoria_nombre_orig][2] = $val_grafico_categoria_nombre;
               $array_total_categoria_nombre[$categoria_nombre_orig][3] = $categoria_nombre_orig;
            }
            else
            {
               $array_total_categoria_nombre[$categoria_nombre_orig][0] += $registro[0];
               $array_total_categoria_nombre[$categoria_nombre_orig][1] += $registro[1];
            }
            if (isset($variables2_descripcion_orig))
            {
               //-----  variables2_descripcion
               if (!isset($array_total_variables2_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig]))
               {
                  $array_total_variables2_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][0] = $registro[0];
                  $array_total_variables2_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][1] = $registro[1];
                  $array_total_variables2_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][2] = $val_grafico_variables2_descripcion;
                  $array_total_variables2_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][3] = $variables2_descripcion_orig;
               }
               else
               {
                  $array_total_variables2_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][0] += $registro[0];
                  $array_total_variables2_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][1] += $registro[1];
               }
               if (isset($variables1_descripcion_orig))
               {
                  //-----  variables1_descripcion
                  if (!isset($array_total_variables1_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][$variables1_descripcion_orig]))
                  {
                     $array_total_variables1_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][$variables1_descripcion_orig][0] = $registro[0];
                     $array_total_variables1_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][$variables1_descripcion_orig][1] = $registro[1];
                     $array_total_variables1_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][$variables1_descripcion_orig][2] = $val_grafico_variables1_descripcion;
                     $array_total_variables1_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][$variables1_descripcion_orig][3] = $variables1_descripcion_orig;
                  }
                  else
                  {
                     $array_total_variables1_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][$variables1_descripcion_orig][0] += $registro[0];
                     $array_total_variables1_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][$variables1_descripcion_orig][1] += $registro[1];
                  }
                  if (isset($variables_descripcion_orig))
                  {
                     //-----  variables_descripcion
                     if (!isset($array_total_variables_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][$variables1_descripcion_orig][$variables_descripcion_orig]))
                     {
                        $array_total_variables_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][$variables1_descripcion_orig][$variables_descripcion_orig][0] = $registro[0];
                        $array_total_variables_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][$variables1_descripcion_orig][$variables_descripcion_orig][1] = $registro[1];
                        $array_total_variables_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][$variables1_descripcion_orig][$variables_descripcion_orig][2] = $val_grafico_variables_descripcion;
                        $array_total_variables_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][$variables1_descripcion_orig][$variables_descripcion_orig][3] = $variables_descripcion_orig;
                     }
                     else
                     {
                        $array_total_variables_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][$variables1_descripcion_orig][$variables_descripcion_orig][0] += $registro[0];
                        $array_total_variables_descripcion[$categoria_nombre_orig][$variables2_descripcion_orig][$variables1_descripcion_orig][$variables_descripcion_orig][1] += $registro[1];
                     }
                  } // isset
               } // isset
            } // isset
         } // isset
      }
   }
   //-----
   function get_array($rs)
   {
       if ('ado_mssql' != $this->Ini->nm_tpbanco)
       {
           return $rs->GetArray();
       }

       $array_db_total = array();
       while (!$rs->EOF)
       {
           $arr_row = array();
           foreach ($rs->fields as $k => $v)
           {
               $arr_row[$k] = $v . '';
           }
           $array_db_total[] = $arr_row;
           $rs->MoveNext();
       }
       return $array_db_total;
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
function Registro()
{
$_SESSION['scriptcase']['grid_datos_3']['contr_erro'] = 'on';
if (!isset($_SESSION['var_id_municipio'])) {$_SESSION['var_id_municipio'] = "";}
if (!isset($this->sc_temp_var_id_municipio)) {$this->sc_temp_var_id_municipio = (isset($_SESSION['var_id_municipio'])) ? $_SESSION['var_id_municipio'] : "";}
if (!isset($_SESSION['var_id_indicador'])) {$_SESSION['var_id_indicador'] = "";}
if (!isset($this->sc_temp_var_id_indicador)) {$this->sc_temp_var_id_indicador = (isset($_SESSION['var_id_indicador'])) ? $_SESSION['var_id_indicador'] : "";}
   
$insert_table  = 'registro';      
$insert_fields = array( 
	 'fecha'=>'now()',
     'fk_indicador' => "'$this->sc_temp_var_id_indicador'",
     'fk_municipio' => "'$this->sc_temp_var_id_municipio'",
 );


$insert_sql = 'INSERT INTO ' . $insert_table
    . ' ('   . implode(', ', array_keys($insert_fields))   . ')'
    . ' VALUES ('    . implode(', ', array_values($insert_fields)) . ')';


     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->sc_temp_var_id_indicador)) {$_SESSION['var_id_indicador'] = $this->sc_temp_var_id_indicador;}
if (isset($this->sc_temp_var_id_municipio)) {$_SESSION['var_id_municipio'] = $this->sc_temp_var_id_municipio;}
$_SESSION['scriptcase']['grid_datos_3']['contr_erro'] = 'off';
}
}

?>
