<?php

class grid_registro_municipios_mas_consultado_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function grid_registro_municipios_mas_consultado_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("es");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_registro_municipios_mas_consultado']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_registro_municipios_mas_consultado']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_registro_municipios_mas_consultado']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cantidad = $Busca_temp['cantidad']; 
          $tmp_pos = strpos($this->cantidad, "##@@");
          if ($tmp_pos !== false)
          {
              $this->cantidad = substr($this->cantidad, 0, $tmp_pos);
          }
          $cantidad_2 = $Busca_temp['cantidad_input_2']; 
          $this->cantidad_2 = $Busca_temp['cantidad_input_2']; 
          $this->municipio_nombremunicipio = $Busca_temp['municipio_nombremunicipio']; 
          $tmp_pos = strpos($this->municipio_nombremunicipio, "##@@");
          if ($tmp_pos !== false)
          {
              $this->municipio_nombremunicipio = substr($this->municipio_nombremunicipio, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_registro_municipios_mas_consultado']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_registro_municipios_mas_consultado']['tot_geral'] = array() ;  
      $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_registro_municipios_mas_consultado']['where_pesq']; 
      $nm_comando .= " group by `municipio`.`nombreMunicipio`"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_registro_municipios_mas_consultado']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      while (!$rt->EOF) 
      {
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_registro_municipios_mas_consultado']['tot_geral'][1])) 
         {
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_registro_municipios_mas_consultado']['tot_geral'][1] = 1 ; 
         } 
         else
         {
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_registro_municipios_mas_consultado']['tot_geral'][1] += 1 ; 
         } 
         $rt->MoveNext() ;
      } 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_registro_municipios_mas_consultado']['contr_total_geral'] = "OK";
   } 

   //-----  cantidad
   function quebra_cantidad_sc_free_group_by($cantidad, $Where_qb) 
   {
      global $tot_cantidad ;  
      $tot_cantidad = array() ;  
      $tot_cantidad[0] = $cantidad ; 
   }
   //-----  municipio_nombremunicipio
   function quebra_municipio_nombremunicipio_sc_free_group_by($municipio_nombremunicipio, $Where_qb) 
   {
      global $tot_municipio_nombremunicipio ;  
      $tot_municipio_nombremunicipio = array() ;  
      $tot_municipio_nombremunicipio[0] = $municipio_nombremunicipio ; 
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
