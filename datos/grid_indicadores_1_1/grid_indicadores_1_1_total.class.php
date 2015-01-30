<?php

class grid_indicadores_1_1_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function grid_indicadores_1_1_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("es");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_indicadores_1_1']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_indicadores_1_1']['campos_busca']))
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
          $dimension_id_dimension_2 = $Busca_temp['dimension_id_dimension_input_2']; 
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
          $tematica_id_tematica_2 = $Busca_temp['tematica_id_tematica_input_2']; 
          $this->tematica_id_tematica_2 = $Busca_temp['tematica_id_tematica_input_2']; 
          $this->tematica_descripcion = $Busca_temp['tematica_descripcion']; 
          $tmp_pos = strpos($this->tematica_descripcion, "##@@");
          if ($tmp_pos !== false)
          {
              $this->tematica_descripcion = substr($this->tematica_descripcion, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['tot_geral'] = array() ;  
      $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq']; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['contr_total_geral'] = "OK";
   } 

   //-----  dimension_id_dimension
   function quebra_dimension_id_dimension_agrupar($dimension_id_dimension, $arg_sum_dimension_id_dimension) 
   {
      global $tot_dimension_id_dimension ;  
      $tot_dimension_id_dimension = array() ;  
      $tot_dimension_id_dimension[0] = $dimension_id_dimension ; 
   }
   //-----  dimension_descripcion
   function quebra_dimension_descripcion_agrupar($dimension_id_dimension, $dimension_descripcion, $arg_sum_dimension_id_dimension, $arg_sum_dimension_descripcion) 
   {
      global $tot_dimension_descripcion ;  
      $tot_dimension_descripcion = array() ;  
      $tot_dimension_descripcion[0] = $dimension_descripcion ; 
   }
   //-----  tematica_id_tematica
   function quebra_tematica_id_tematica_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica, $arg_sum_dimension_id_dimension, $arg_sum_dimension_descripcion, $arg_sum_tematica_id_tematica) 
   {
      global $tot_tematica_id_tematica ;  
      $tot_tematica_id_tematica = array() ;  
      $tot_tematica_id_tematica[0] = $tematica_id_tematica ; 
   }
   //-----  tematica_descripcion
   function quebra_tematica_descripcion_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica, $tematica_descripcion, $arg_sum_dimension_id_dimension, $arg_sum_dimension_descripcion, $arg_sum_tematica_id_tematica, $arg_sum_tematica_descripcion) 
   {
      global $tot_tematica_descripcion ;  
      $tot_tematica_descripcion = array() ;  
      $tot_tematica_descripcion[0] = $tematica_descripcion ; 
   }
   //-----  indicadores_id_indicadores
   function quebra_indicadores_id_indicadores_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica, $tematica_descripcion, $indicadores_id_indicadores, $arg_sum_dimension_id_dimension, $arg_sum_dimension_descripcion, $arg_sum_tematica_id_tematica, $arg_sum_tematica_descripcion, $arg_sum_indicadores_id_indicadores) 
   {
      global $tot_indicadores_id_indicadores ;  
      $tot_indicadores_id_indicadores = array() ;  
      $tot_indicadores_id_indicadores[0] = $indicadores_id_indicadores ; 
   }
   //-----  indicadores_nombre
   function quebra_indicadores_nombre_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica, $tematica_descripcion, $indicadores_id_indicadores, $indicadores_nombre, $arg_sum_dimension_id_dimension, $arg_sum_dimension_descripcion, $arg_sum_tematica_id_tematica, $arg_sum_tematica_descripcion, $arg_sum_indicadores_id_indicadores, $arg_sum_indicadores_nombre) 
   {
      global $tot_indicadores_nombre ;  
      $tot_indicadores_nombre = array() ;  
      $tot_indicadores_nombre[0] = $indicadores_nombre ; 
   }
   //-----  variables_id_variable
   function quebra_variables_id_variable_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica, $tematica_descripcion, $indicadores_id_indicadores, $indicadores_nombre, $variables_id_variable, $arg_sum_dimension_id_dimension, $arg_sum_dimension_descripcion, $arg_sum_tematica_id_tematica, $arg_sum_tematica_descripcion, $arg_sum_indicadores_id_indicadores, $arg_sum_indicadores_nombre, $arg_sum_variables_id_variable) 
   {
      global $tot_variables_id_variable ;  
      $tot_variables_id_variable = array() ;  
      $tot_variables_id_variable[0] = $variables_id_variable ; 
   }
   //-----  variables_descripcion
   function quebra_variables_descripcion_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica, $tematica_descripcion, $indicadores_id_indicadores, $indicadores_nombre, $variables_id_variable, $variables_descripcion, $arg_sum_dimension_id_dimension, $arg_sum_dimension_descripcion, $arg_sum_tematica_id_tematica, $arg_sum_tematica_descripcion, $arg_sum_indicadores_id_indicadores, $arg_sum_indicadores_nombre, $arg_sum_variables_id_variable, $arg_sum_variables_descripcion) 
   {
      global $tot_variables_descripcion ;  
      $tot_variables_descripcion = array() ;  
      $tot_variables_descripcion[0] = $variables_descripcion ; 
   }

   //----- 
   function resumo_agrupar($destino_resumo, &$array_total_dimension_id_dimension, &$array_total_dimension_descripcion, &$array_total_tematica_id_tematica, &$array_total_tematica_descripcion, &$array_total_indicadores_id_indicadores, &$array_total_indicadores_nombre, &$array_total_variables_id_variable, &$array_total_variables_descripcion)
   {
      global $nada, $nm_lang;
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
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq_filtro'];
   $nmgp_order_by = " order by `dimension`.`id_dimension` asc, `dimension`.`Descripcion` asc, `tematica`.`id_tematica` asc, `tematica`.`Descripcion` asc, `indicadores`.`id_indicadores` asc, `indicadores`.`Nombre` asc, `variables`.`id_variable` asc, `variables`.`descripcion` asc"; 
     $comando  = "select count(*), `dimension`.`id_dimension`, `dimension`.`Descripcion`, `tematica`.`id_tematica`, `tematica`.`Descripcion`, `indicadores`.`id_indicadores`, `indicadores`.`Nombre`, `variables`.`id_variable`, `variables`.`descripcion` from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by `dimension`.`id_dimension`, `dimension`.`Descripcion`, `tematica`.`id_tematica`, `tematica`.`Descripcion`, `indicadores`.`id_indicadores`, `indicadores`.`Nombre`, `variables`.`id_variable`, `variables`.`descripcion`  " . $nmgp_order_by;
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
         $dimension_id_dimension      = $registro[1];
         $dimension_id_dimension_orig = $registro[1];
         $conteudo = $registro[1];
        nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $dimension_id_dimension = $conteudo;
         if (null === $dimension_id_dimension)
         {
             $dimension_id_dimension = '';
         }
         if (null === $dimension_id_dimension_orig)
         {
             $dimension_id_dimension_orig = '';
         }
         $val_grafico_dimension_id_dimension = $dimension_id_dimension;
         $dimension_descripcion      = $registro[2];
         $dimension_descripcion_orig = $registro[2];
         $conteudo = $registro[2];
         $dimension_descripcion = $conteudo;
         if (null === $dimension_descripcion)
         {
             $dimension_descripcion = '';
         }
         if (null === $dimension_descripcion_orig)
         {
             $dimension_descripcion_orig = '';
         }
         $val_grafico_dimension_descripcion = $dimension_descripcion;
         $tematica_id_tematica      = $registro[3];
         $tematica_id_tematica_orig = $registro[3];
         $conteudo = $registro[3];
        nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $tematica_id_tematica = $conteudo;
         if (null === $tematica_id_tematica)
         {
             $tematica_id_tematica = '';
         }
         if (null === $tematica_id_tematica_orig)
         {
             $tematica_id_tematica_orig = '';
         }
         $val_grafico_tematica_id_tematica = $tematica_id_tematica;
         $tematica_descripcion      = $registro[4];
         $tematica_descripcion_orig = $registro[4];
         $conteudo = $registro[4];
         $tematica_descripcion = $conteudo;
         if (null === $tematica_descripcion)
         {
             $tematica_descripcion = '';
         }
         if (null === $tematica_descripcion_orig)
         {
             $tematica_descripcion_orig = '';
         }
         $val_grafico_tematica_descripcion = $tematica_descripcion;
         $indicadores_id_indicadores      = $registro[5];
         $indicadores_id_indicadores_orig = $registro[5];
         $conteudo = $registro[5];
        nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $indicadores_id_indicadores = $conteudo;
         if (null === $indicadores_id_indicadores)
         {
             $indicadores_id_indicadores = '';
         }
         if (null === $indicadores_id_indicadores_orig)
         {
             $indicadores_id_indicadores_orig = '';
         }
         $val_grafico_indicadores_id_indicadores = $indicadores_id_indicadores;
         $indicadores_nombre      = $registro[6];
         $indicadores_nombre_orig = $registro[6];
         $conteudo = $registro[6];
         $indicadores_nombre = $conteudo;
         if (null === $indicadores_nombre)
         {
             $indicadores_nombre = '';
         }
         if (null === $indicadores_nombre_orig)
         {
             $indicadores_nombre_orig = '';
         }
         $val_grafico_indicadores_nombre = $indicadores_nombre;
         $variables_id_variable      = $registro[7];
         $variables_id_variable_orig = $registro[7];
         $conteudo = $registro[7];
        nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $variables_id_variable = $conteudo;
         if (null === $variables_id_variable)
         {
             $variables_id_variable = '';
         }
         if (null === $variables_id_variable_orig)
         {
             $variables_id_variable_orig = '';
         }
         $val_grafico_variables_id_variable = $variables_id_variable;
         $variables_descripcion      = $registro[8];
         $variables_descripcion_orig = $registro[8];
         $conteudo = $registro[8];
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
         if (isset($dimension_id_dimension_orig))
         {
            //-----  dimension_id_dimension
            if (!isset($array_total_dimension_id_dimension[$dimension_id_dimension_orig]))
            {
               $array_total_dimension_id_dimension[$dimension_id_dimension_orig][0] = $registro[0];
               $array_total_dimension_id_dimension[$dimension_id_dimension_orig][1] = $val_grafico_dimension_id_dimension;
               $array_total_dimension_id_dimension[$dimension_id_dimension_orig][2] = $dimension_id_dimension_orig;
            }
            else
            {
               $array_total_dimension_id_dimension[$dimension_id_dimension_orig][0] += $registro[0];
            }
            if (isset($dimension_descripcion_orig))
            {
               //-----  dimension_descripcion
               if (!isset($array_total_dimension_descripcion[$dimension_id_dimension_orig][$dimension_descripcion_orig]))
               {
                  $array_total_dimension_descripcion[$dimension_id_dimension_orig][$dimension_descripcion_orig][0] = $registro[0];
                  $array_total_dimension_descripcion[$dimension_id_dimension_orig][$dimension_descripcion_orig][1] = $val_grafico_dimension_descripcion;
                  $array_total_dimension_descripcion[$dimension_id_dimension_orig][$dimension_descripcion_orig][2] = $dimension_descripcion_orig;
               }
               else
               {
                  $array_total_dimension_descripcion[$dimension_id_dimension_orig][$dimension_descripcion_orig][0] += $registro[0];
               }
               if (isset($tematica_id_tematica_orig))
               {
                  //-----  tematica_id_tematica
                  if (!isset($array_total_tematica_id_tematica[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig]))
                  {
                     $array_total_tematica_id_tematica[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][0] = $registro[0];
                     $array_total_tematica_id_tematica[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][1] = $val_grafico_tematica_id_tematica;
                     $array_total_tematica_id_tematica[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][2] = $tematica_id_tematica_orig;
                  }
                  else
                  {
                     $array_total_tematica_id_tematica[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][0] += $registro[0];
                  }
                  if (isset($tematica_descripcion_orig))
                  {
                     //-----  tematica_descripcion
                     if (!isset($array_total_tematica_descripcion[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig]))
                     {
                        $array_total_tematica_descripcion[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][0] = $registro[0];
                        $array_total_tematica_descripcion[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][1] = $val_grafico_tematica_descripcion;
                        $array_total_tematica_descripcion[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][2] = $tematica_descripcion_orig;
                     }
                     else
                     {
                        $array_total_tematica_descripcion[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][0] += $registro[0];
                     }
                     if (isset($indicadores_id_indicadores_orig))
                     {
                        //-----  indicadores_id_indicadores
                        if (!isset($array_total_indicadores_id_indicadores[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig]))
                        {
                           $array_total_indicadores_id_indicadores[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][0] = $registro[0];
                           $array_total_indicadores_id_indicadores[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][1] = $val_grafico_indicadores_id_indicadores;
                           $array_total_indicadores_id_indicadores[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][2] = $indicadores_id_indicadores_orig;
                        }
                        else
                        {
                           $array_total_indicadores_id_indicadores[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][0] += $registro[0];
                        }
                        if (isset($indicadores_nombre_orig))
                        {
                           //-----  indicadores_nombre
                           if (!isset($array_total_indicadores_nombre[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][$indicadores_nombre_orig]))
                           {
                              $array_total_indicadores_nombre[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][$indicadores_nombre_orig][0] = $registro[0];
                              $array_total_indicadores_nombre[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][$indicadores_nombre_orig][1] = $val_grafico_indicadores_nombre;
                              $array_total_indicadores_nombre[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][$indicadores_nombre_orig][2] = $indicadores_nombre_orig;
                           }
                           else
                           {
                              $array_total_indicadores_nombre[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][$indicadores_nombre_orig][0] += $registro[0];
                           }
                           if (isset($variables_id_variable_orig))
                           {
                              //-----  variables_id_variable
                              if (!isset($array_total_variables_id_variable[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][$indicadores_nombre_orig][$variables_id_variable_orig]))
                              {
                                 $array_total_variables_id_variable[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][$indicadores_nombre_orig][$variables_id_variable_orig][0] = $registro[0];
                                 $array_total_variables_id_variable[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][$indicadores_nombre_orig][$variables_id_variable_orig][1] = $val_grafico_variables_id_variable;
                                 $array_total_variables_id_variable[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][$indicadores_nombre_orig][$variables_id_variable_orig][2] = $variables_id_variable_orig;
                              }
                              else
                              {
                                 $array_total_variables_id_variable[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][$indicadores_nombre_orig][$variables_id_variable_orig][0] += $registro[0];
                              }
                              if (isset($variables_descripcion_orig))
                              {
                                 //-----  variables_descripcion
                                 if (!isset($array_total_variables_descripcion[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][$indicadores_nombre_orig][$variables_id_variable_orig][$variables_descripcion_orig]))
                                 {
                                    $array_total_variables_descripcion[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][$indicadores_nombre_orig][$variables_id_variable_orig][$variables_descripcion_orig][0] = $registro[0];
                                    $array_total_variables_descripcion[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][$indicadores_nombre_orig][$variables_id_variable_orig][$variables_descripcion_orig][1] = $val_grafico_variables_descripcion;
                                    $array_total_variables_descripcion[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][$indicadores_nombre_orig][$variables_id_variable_orig][$variables_descripcion_orig][2] = $variables_descripcion_orig;
                                 }
                                 else
                                 {
                                    $array_total_variables_descripcion[$dimension_id_dimension_orig][$dimension_descripcion_orig][$tematica_id_tematica_orig][$tematica_descripcion_orig][$indicadores_id_indicadores_orig][$indicadores_nombre_orig][$variables_id_variable_orig][$variables_descripcion_orig][0] += $registro[0];
                                 }
                              } // isset
                           } // isset
                        } // isset
                     } // isset
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
}

?>
