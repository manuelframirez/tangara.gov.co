<?php
class grid_indicadores_1_1_grid
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Tot;
   var $Lin_impressas;
   var $Lin_final;
   var $Rows_span;
   var $NM_colspan;
   var $rs_grid;
   var $nm_grid_ini;
   var $nm_grid_sem_reg;
   var $nm_prim_linha;
   var $Rec_ini;
   var $Rec_fim;
   var $nmgp_reg_start;
   var $nmgp_reg_inicial;
   var $nmgp_reg_final;
   var $SC_seq_register;
   var $SC_seq_page;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $NM_raiz_img; 
   var $Ind_lig_mult; 
   var $NM_opcao; 
   var $NM_flag_antigo; 
   var $nm_campos_cab = array();
   var $NM_cmp_hidden = array();
   var $nmgp_botoes = array();
   var $nmgp_label_quebras = array();
   var $nmgp_prim_pag_pdf;
   var $Campos_Mens_erro;
   var $Print_All;
   var $NM_field_over;
   var $NM_field_click;
   var $progress_fp;
   var $progress_tot;
   var $progress_now;
   var $progress_lim_tot;
   var $progress_lim_now;
   var $progress_lim_qtd;
   var $progress_grid;
   var $progress_pdf;
   var $progress_res;
   var $progress_graf;
   var $count_ger;
   var $dimension_id_dimension_Old;
   var $arg_sum_dimension_id_dimension;
   var $Label_dimension_id_dimension;
   var $sc_proc_quebra_dimension_id_dimension;
   var $count_dimension_id_dimension;
   var $dimension_descripcion_Old;
   var $arg_sum_dimension_descripcion;
   var $Label_dimension_descripcion;
   var $sc_proc_quebra_dimension_descripcion;
   var $count_dimension_descripcion;
   var $tematica_id_tematica_Old;
   var $arg_sum_tematica_id_tematica;
   var $Label_tematica_id_tematica;
   var $sc_proc_quebra_tematica_id_tematica;
   var $count_tematica_id_tematica;
   var $tematica_descripcion_Old;
   var $arg_sum_tematica_descripcion;
   var $Label_tematica_descripcion;
   var $sc_proc_quebra_tematica_descripcion;
   var $count_tematica_descripcion;
   var $indicadores_id_indicadores_Old;
   var $arg_sum_indicadores_id_indicadores;
   var $Label_indicadores_id_indicadores;
   var $sc_proc_quebra_indicadores_id_indicadores;
   var $count_indicadores_id_indicadores;
   var $indicadores_nombre_Old;
   var $arg_sum_indicadores_nombre;
   var $Label_indicadores_nombre;
   var $sc_proc_quebra_indicadores_nombre;
   var $count_indicadores_nombre;
   var $variables_id_variable_Old;
   var $arg_sum_variables_id_variable;
   var $Label_variables_id_variable;
   var $sc_proc_quebra_variables_id_variable;
   var $count_variables_id_variable;
   var $variables_descripcion_Old;
   var $arg_sum_variables_descripcion;
   var $Label_variables_descripcion;
   var $sc_proc_quebra_variables_descripcion;
   var $count_variables_descripcion;
   var $dimension_id_dimension;
   var $dimension_descripcion;
   var $tematica_id_tematica;
   var $tematica_descripcion;
   var $indicadores_id_indicadores;
   var $indicadores_nombre;
   var $variables_id_variable;
   var $variables_descripcion;
//--- 
 function monta_grid($linhas = 0)
 {
   global $nm_saida;

   clearstatcache();
   $this->NM_cor_embutida();
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_init'])
   { 
        return; 
   } 
   $this->inicializa();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['charts_html'] = '';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
   { 
       $this->Lin_impressas = 0;
       $this->Lin_final     = FALSE;
       $this->grid($linhas);
       $this->nm_fim_grid();
   } 
   else 
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
       { 
           include_once($this->Ini->path_embutida . "grid_indicadores_1_1/" . $this->Ini->Apl_resumo); 
       } 
       else 
       { 
           include_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
       } 
       $this->Res         = new grid_indicadores_1_1_resumo();
       $this->Res->Db     = $this->Db;
       $this->Res->Erro   = $this->Erro;
       $this->Res->Ini    = $this->Ini;
       $this->Res->Lookup = $this->Lookup;
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['pdf_res'])
       {
           $this->cabecalho();
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf")
       { 
           $this->nmgp_barra_top();
           $this->nmgp_embbed_placeholder_top();
       } 
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['pdf_res'] && (!isset($_GET['flash_graf']) || 'chart' != $_GET['flash_graf']))
       {
           $this->grid();
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf")
       { 
           if (isset($_GET['flash_graf']) && 'chart' == $_GET['flash_graf'])
           {
               $this->Res->monta_resumo(true);
               require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
               $this->Graf  = new grid_indicadores_1_1_grafico();
               $this->Graf->Db     = $this->Db;
               $this->Graf->Erro   = $this->Erro;
               $this->Graf->Ini    = $this->Ini;
               $this->Graf->Lookup = $this->Lookup;
               $this->Graf->monta_grafico();
               exit;
           }
           else
           {
               $this->Res->monta_html_ini_pdf();
               $this->Res->monta_resumo();
               $this->Res->monta_html_fim_pdf();
           }
       } 
       $flag_apaga_pdf_log = TRUE;
       if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf")
       { 
           $flag_apaga_pdf_log = FALSE;
       } 
       $this->nm_fim_grid($flag_apaga_pdf_log);
       if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf")
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] = "igual";
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao_print'] == "print")
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao_ant'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao_print'] = "";
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'];
 }
 function resume($linhas = 0)
 {
    $this->Lin_impressas = 0;
    $this->Lin_final     = FALSE;
    $this->grid($linhas);
 }
//--- 
 function inicializa()
 {
   global $nm_saida,
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det,
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->Ind_lig_mult = 0;
   $this->nm_data    = new nm_data("es");
   $this->force_toolbar = false;
   $this->width_tabula_quebra  = "94px";
   $this->width_tabula_display = "''";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['lig_edit'];
   }
   $this->grid_emb_form = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_form'])
   {
       $this->grid_emb_form = true;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['mostra_edit'] = "N";
   }
   if ($this->Ini->SC_Link_View)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['mostra_edit'] = "N";
   }
   $this->sc_proc_quebra_dimension_id_dimension = false;
   $this->sc_proc_quebra_dimension_descripcion = false;
   $this->sc_proc_quebra_tematica_id_tematica = false;
   $this->sc_proc_quebra_tematica_descripcion = false;
   $this->sc_proc_quebra_indicadores_id_indicadores = false;
   $this->sc_proc_quebra_indicadores_nombre = false;
   $this->sc_proc_quebra_variables_id_variable = false;
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] = array();
   }
   $this->aba_iframe = false;
   $this->Print_All = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['print_all'];
   if ($this->Print_All)
   {
       $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin_prt; 
   }
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("grid_indicadores_1_1", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['group_1'] = "on";
   $this->nmgp_botoes['exit'] = "on";
   $this->nmgp_botoes['first'] = "on";
   $this->nmgp_botoes['back'] = "on";
   $this->nmgp_botoes['forward'] = "on";
   $this->nmgp_botoes['last'] = "on";
   $this->nmgp_botoes['pdf'] = "on";
   $this->nmgp_botoes['xls'] = "on";
   $this->nmgp_botoes['xml'] = "on";
   $this->nmgp_botoes['csv'] = "on";
   $this->nmgp_botoes['rtf'] = "on";
   $this->nmgp_botoes['word'] = "on";
   $this->nmgp_botoes['export'] = "on";
   $this->nmgp_botoes['print'] = "on";
   $this->nmgp_botoes['summary'] = "on";
   $this->nmgp_botoes['sel_col'] = "on";
   $this->nmgp_botoes['sort_col'] = "on";
   $this->nmgp_botoes['qsearch'] = "on";
   $this->nmgp_botoes['groupby'] = "on";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['btn_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
       {
           $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['SC_Gb_Free_cmp']))
   { 
       $this->nmgp_botoes['summary'] = "off";
   } 
   $this->sc_proc_grid = false; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['doc_word'])
   { 
       $this->NM_raiz_img = $this->Ini->root; 
   } 
   else 
   { 
       $this->NM_raiz_img = ""; 
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq_ant'];  
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
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq_filtro'];
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "muda_qt_linhas")
   { 
       unset($rec);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "muda_rec_linhas")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] = "muda_qt_linhas";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
   {
       $nmgp_ordem = ""; 
       $rec = "ini"; 
   } 
//
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
   { 
       include_once($this->Ini->path_embutida . "grid_indicadores_1_1/grid_indicadores_1_1_total.class.php"); 
   } 
   else 
   { 
       include_once($this->Ini->path_aplicacao . "grid_indicadores_1_1_total.class.php"); 
   } 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_pdf'] != "pdf")  
       { 
           $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
       } 
       else 
       { 
           $_SESSION['scriptcase']['contr_link_emb'] = "pdf";
       } 
   } 
   else 
   { 
       $this->nm_location = $_SESSION['scriptcase']['contr_link_emb'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_pdf'] = $_SESSION['scriptcase']['contr_link_emb'];
   } 
   $this->Tot         = new grid_indicadores_1_1_total($this->Ini->sc_page);
   $this->Tot->Db     = $this->Db;
   $this->Tot->Erro   = $this->Erro;
   $this->Tot->Ini    = $this->Ini;
   $this->Tot->Lookup = $this->Lookup;
   if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_lin_grid']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_lin_grid'] = 100 ;  
   }   
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_lin_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['rows'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['rows']);
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['cols']);
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_liga']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_lin_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_liga']['rows'];  
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_liga']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_col_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_liga']['cols'];  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "muda_qt_linhas") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao']  = "igual" ;  
       if (!empty($nmgp_quant_linhas)) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_lin_grid'] = $nmgp_quant_linhas ;  
       } 
   }   
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_reg_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_lin_grid']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['SC_Ind_Groupby'] == "agrupar") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_select'] = array(); 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['SC_Ind_Groupby'] == "agrupar") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_quebra'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_quebra']["`dimension`.`id_dimension`"] = "asc"; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_quebra']["`dimension`.`Descripcion`"] = "asc"; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_quebra']["`tematica`.`id_tematica`"] = "asc"; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_quebra']["`tematica`.`Descripcion`"] = "asc"; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_quebra']["`indicadores`.`id_indicadores`"] = "asc"; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_quebra']["`indicadores`.`Nombre`"] = "asc"; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_quebra']["`variables`.`id_variable`"] = "asc"; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_quebra']["`variables`.`descripcion`"] = "asc"; 
       } 
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_grid']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_ant']  = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_desc'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_cmp']  = "" ; 
   }   
   if (!empty($nmgp_ordem))  
   { 
       $nmgp_ordem = str_replace('\"', '"', $nmgp_ordem); 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_quebra'][$nmgp_ordem])) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] = "inicio" ;  
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_grid'] = ""; 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_quebra'][$nmgp_ordem] == "asc") 
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_quebra'][$nmgp_ordem] = "desc"; 
           }   
           else   
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_quebra'][$nmgp_ordem] = "asc"; 
           }   
       }   
       else   
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_grid'] = $nmgp_ordem  ; 
       }   
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "ordem")  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] = "inicio" ;  
       if (($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_grid']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_desc'] == "")  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_desc'] = " desc" ; 
       } 
       else   
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_desc'] = "" ;  
       } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_grid'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_cmp'] = $nmgp_ordem;  
   }  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['inicio']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['inicio'] = 0 ;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['final']  = 0 ;  
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_edit'])  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_edit'] = false;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "inicio") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] = "edit" ; 
       } 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_orig'] = " where `variables`.`id_padre` IS NULL";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq_filtro'];
   $this->sc_where_atual_f = (!empty($this->sc_where_atual)) ? "(" . trim(substr($this->sc_where_atual, 6)) . ")" : "";
   $this->sc_where_atual_f = str_replace("%", "@percent@", $this->sc_where_atual_f);
   $this->sc_where_atual_f = "NM_where_filter*scin" . str_replace("'", "@aspass@", $this->sc_where_atual_f) . "*scout";
//
//--------- 
//
   $nmgp_opc_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao']; 
   if (isset($rec)) 
   { 
       if ($rec == "ini") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] = "inicio" ; 
       } 
       elseif ($rec == "fim") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] = "final" ; 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] = "avanca" ; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['final'] = $rec; 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['final'] > 0) 
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['final']-- ; 
           } 
       } 
   } 
   $this->NM_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao']; 
   if ($this->NM_opcao == "print") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao_print'] = "print" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao']       = "igual" ; 
   } 
// 
   $this->count_ger = 0;
   $this->arg_sum_dimension_id_dimension = "";
   $this->count_dimension_id_dimension = 0;
   $this->arg_sum_dimension_descripcion = "";
   $this->count_dimension_descripcion = 0;
   $this->arg_sum_tematica_id_tematica = "";
   $this->count_tematica_id_tematica = 0;
   $this->arg_sum_tematica_descripcion = "";
   $this->count_tematica_descripcion = 0;
   $this->arg_sum_indicadores_id_indicadores = "";
   $this->count_indicadores_id_indicadores = 0;
   $this->arg_sum_indicadores_nombre = "";
   $this->count_indicadores_nombre = 0;
   $this->arg_sum_variables_id_variable = "";
   $this->count_variables_id_variable = 0;
   $this->arg_sum_variables_descripcion = "";
   $this->count_variables_descripcion = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['tot_geral'][1] ;  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "final" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_reg_grid'] == "all") 
   { 
       $this->Tot->quebra_geral() ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['tot_geral'][1] ;  
       $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['tot_geral'][1];
   } 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_dinamic']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_dinamic'] != $this->nm_where_dinamico)  
   { 
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['tot_geral']);
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_dinamic'] = $this->nm_where_dinamico;  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['tot_geral']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq_ant'] || $nmgp_opc_orig == "edit") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['contr_total_geral'] = "NAO";
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['total']);
       $this->Tot->quebra_geral() ; 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['contr_array_resumo']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['contr_array_resumo'] = "NAO";
       } 
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['tot_geral'][1] ;  
   $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['tot_geral'][1];
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_resumo'])) 
   { 
       $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela; 
       $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq']; 
       if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq'])) 
       { 
           $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_resumo']; 
       } 
       else
       { 
           $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_resumo'] . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $rt_grid = $this->Db->Execute($nmgp_select) ; 
       if ($rt_grid === false && !$rt_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit ; 
       }  
       $this->count_ger = $rt_grid->fields[0];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['total'] = $rt_grid->fields[0];  
       
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_reg_grid'] == "all") 
   { 
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_reg_grid'] = $this->count_ger;
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao']       = "inicio";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pesq") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['inicio'] = 0 ; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "final") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "retorna") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "avanca" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['total'] >  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['final']) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['final']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao_print'] != "print" && substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'], 0, 7) != "detalhe" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] = "igual"; 
   } 
   $this->Rec_ini = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_reg_grid']; 
   if ($this->Rec_ini < 0) 
   { 
       $this->Rec_ini = 0; 
   } 
   $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_reg_grid'] + 1; 
   if ($this->Rec_fim > $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['total']) 
   { 
       $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['total']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['inicio'] > 0) 
   { 
       $this->Rec_ini++ ; 
   } 
   $this->nmgp_reg_start = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['inicio']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['inicio'] > 0) 
   { 
       $this->nmgp_reg_start-- ; 
   } 
   $this->nm_grid_ini = $this->nmgp_reg_start + 1; 
   if ($this->nmgp_reg_start != 0) 
   { 
       $this->nm_grid_ini++;
   }  
//----- 
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
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_quebra'] as $campo => $ordem) 
   {
       if (!empty($campos_order)) 
       {
           $campos_order .= ", ";
       }
       $campos_order .= $campo . " " . $ordem;
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['order_grid'] = $nmgp_order_by;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" || isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_liga']['paginacao']))
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   }
   else  
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, " . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_reg_grid'] + 2) . ", $this->nmgp_reg_start)" ; 
       $this->rs_grid = $this->Db->SelectLimit($nmgp_select, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_reg_grid'] + 2, $this->nmgp_reg_start) ; 
   }  
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
   }  
   else 
   { 
       $this->dimension_id_dimension = $this->rs_grid->fields[0] ;  
       $this->dimension_id_dimension = (string)$this->dimension_id_dimension;
       $this->dimension_descripcion = $this->rs_grid->fields[1] ;  
       $this->tematica_id_tematica = $this->rs_grid->fields[2] ;  
       $this->tematica_id_tematica = (string)$this->tematica_id_tematica;
       $this->tematica_descripcion = $this->rs_grid->fields[3] ;  
       $this->indicadores_id_indicadores = $this->rs_grid->fields[4] ;  
       $this->indicadores_id_indicadores = (string)$this->indicadores_id_indicadores;
       $this->indicadores_nombre = $this->rs_grid->fields[5] ;  
       $this->variables_id_variable = $this->rs_grid->fields[6] ;  
       $this->variables_id_variable = (string)$this->variables_id_variable;
       $this->variables_descripcion = $this->rs_grid->fields[7] ;  
       if (!isset($this->dimension_id_dimension)) { $this->dimension_id_dimension = ""; }
       if (!isset($this->dimension_descripcion)) { $this->dimension_descripcion = ""; }
       if (!isset($this->tematica_id_tematica)) { $this->tematica_id_tematica = ""; }
       if (!isset($this->tematica_descripcion)) { $this->tematica_descripcion = ""; }
       if (!isset($this->indicadores_id_indicadores)) { $this->indicadores_id_indicadores = ""; }
       if (!isset($this->indicadores_nombre)) { $this->indicadores_nombre = ""; }
       if (!isset($this->variables_id_variable)) { $this->variables_id_variable = ""; }
       if (!isset($this->variables_descripcion)) { $this->variables_descripcion = ""; }
       $this->arg_sum_dimension_id_dimension = " = " . $this->dimension_id_dimension;
       $this->arg_sum_dimension_descripcion = " = " . $this->Db->qstr($this->dimension_descripcion);
       $this->arg_sum_tematica_id_tematica = " = " . $this->tematica_id_tematica;
       $this->arg_sum_tematica_descripcion = " = " . $this->Db->qstr($this->tematica_descripcion);
       $this->arg_sum_indicadores_id_indicadores = " = " . $this->indicadores_id_indicadores;
       $this->arg_sum_indicadores_nombre = " = " . $this->Db->qstr($this->indicadores_nombre);
       $this->arg_sum_variables_id_variable = " = " . $this->variables_id_variable;
       $this->arg_sum_variables_descripcion = " = " . $this->Db->qstr($this->variables_descripcion);
       $this->SC_seq_register = $this->nmgp_reg_start ; 
       $this->SC_seq_page = 0; 
       $this->SC_sep_quebra = false;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['SC_Ind_Groupby'] == "agrupar") 
       {
           $this->dimension_id_dimension_Old = $this->dimension_id_dimension ; 
           $this->quebra_dimension_id_dimension_agrupar($this->dimension_id_dimension) ; 
           $this->dimension_descripcion_Old = $this->dimension_descripcion ; 
           $this->quebra_dimension_descripcion_agrupar($this->dimension_id_dimension, $this->dimension_descripcion) ; 
           $this->tematica_id_tematica_Old = $this->tematica_id_tematica ; 
           $this->quebra_tematica_id_tematica_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica) ; 
           $this->tematica_descripcion_Old = $this->tematica_descripcion ; 
           $this->quebra_tematica_descripcion_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion) ; 
           $this->indicadores_id_indicadores_Old = $this->indicadores_id_indicadores ; 
           $this->quebra_indicadores_id_indicadores_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores) ; 
           $this->indicadores_nombre_Old = $this->indicadores_nombre ; 
           $this->quebra_indicadores_nombre_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre) ; 
           $this->variables_id_variable_Old = $this->variables_id_variable ; 
           $this->quebra_variables_id_variable_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre, $this->variables_id_variable) ; 
           $this->variables_descripcion_Old = $this->variables_descripcion ; 
           $this->quebra_variables_descripcion_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre, $this->variables_id_variable, $this->variables_descripcion) ; 
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['final'] = $this->nmgp_reg_start ; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['inicio'] != 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['final']++ ; 
           $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['final']; 
           $this->rs_grid->MoveNext(); 
           $this->dimension_id_dimension = $this->rs_grid->fields[0] ;  
           $this->dimension_descripcion = $this->rs_grid->fields[1] ;  
           $this->tematica_id_tematica = $this->rs_grid->fields[2] ;  
           $this->tematica_descripcion = $this->rs_grid->fields[3] ;  
           $this->indicadores_id_indicadores = $this->rs_grid->fields[4] ;  
           $this->indicadores_nombre = $this->rs_grid->fields[5] ;  
           $this->variables_id_variable = $this->rs_grid->fields[6] ;  
           $this->variables_descripcion = $this->rs_grid->fields[7] ;  
           if (!isset($this->dimension_id_dimension)) { $this->dimension_id_dimension = ""; }
           if (!isset($this->dimension_descripcion)) { $this->dimension_descripcion = ""; }
           if (!isset($this->tematica_id_tematica)) { $this->tematica_id_tematica = ""; }
           if (!isset($this->tematica_descripcion)) { $this->tematica_descripcion = ""; }
           if (!isset($this->indicadores_id_indicadores)) { $this->indicadores_id_indicadores = ""; }
           if (!isset($this->indicadores_nombre)) { $this->indicadores_nombre = ""; }
           if (!isset($this->variables_id_variable)) { $this->variables_id_variable = ""; }
           if (!isset($this->variables_descripcion)) { $this->variables_descripcion = ""; }
       } 
   } 
   $this->nmgp_reg_inicial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['final'] + 1;
   $this->nmgp_reg_final   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['final'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_reg_grid'];
   $this->nmgp_reg_final   = ($this->nmgp_reg_final > $this->count_ger) ? $this->count_ger : $this->nmgp_reg_final;
// 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
   { 
       if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['pdf_res'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_pdf'] != "pdf")
       {
           //---------- Gauge ----------
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> -  :: PDF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
           if ($_SESSION['scriptcase']['proc_mobile'])
           {
?>
              <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
           }
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
 <SCRIPT LANGUAGE="Javascript" SRC="<?php echo $this->Ini->path_js; ?>/nm_gauge.js"></SCRIPT>
</HEAD>
<BODY scrolling="no">
<table class="scGridTabela" style="padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;"><tr class="scGridFieldOddVert"><td>
<?php echo $this->Ini->Nm_lang['lang_pdff_gnrt']; ?>...<br>
<?php
           $this->progress_grid    = $this->rs_grid->RecordCount();
           $this->progress_pdf     = 0;
           $this->progress_res     = 0;
           $this->progress_graf    = 0;
           $this->progress_tot     = 0;
           $this->progress_now     = 0;
           $this->progress_lim_tot = 0;
           $this->progress_lim_now = 0;
           if (-1 < $this->progress_grid)
           {
               $this->progress_lim_qtd = (250 < $this->progress_grid) ? 250 : $this->progress_grid;
               $this->progress_lim_tot = floor($this->progress_grid / $this->progress_lim_qtd);
               $this->progress_pdf     = floor($this->progress_grid * 0.25) + 1;
               $this->progress_tot     = $this->progress_grid + $this->progress_pdf + $this->progress_res + $this->progress_graf;
               $str_pbfile             = isset($_GET['pbfile']) ? urldecode($_GET['pbfile']) : $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
               $this->progress_fp      = fopen($str_pbfile, 'w');
               fwrite($this->progress_fp, "PDF\n");
               fwrite($this->progress_fp, $this->Ini->path_js   . "\n");
               fwrite($this->progress_fp, $this->Ini->path_prod . "/img/\n");
               fwrite($this->progress_fp, $this->progress_tot   . "\n");
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_strt'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = mb_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               fwrite($this->progress_fp, "1_#NM#_" . $lang_protect . "...\n");
               flush();
           }
       }
       $nm_fundo_pagina = ""; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['doc_word'])
       {
           $nm_saida->saida("  <html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:word\" xmlns=\"http://www.w3.org/TR/REC-html40\">\r\n");
       }
       $nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
       $nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
       $nm_saida->saida("  <HTML" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
       $nm_saida->saida("  <HEAD>\r\n");
       $nm_saida->saida("   <TITLE>" . $this->Ini->Nm_lang['lang_othr_grid_titl'] . " - </TITLE>\r\n");
       $nm_saida->saida("   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\" />\r\n");
       if ($_SESSION['scriptcase']['proc_mobile'])
       {
           $nm_saida->saida("   <meta name=\"viewport\" content=\"width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;\" />\r\n");
       }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['doc_word'])
       {
           $nm_saida->saida("   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Last-Modified\" content=\"" . gmdate("D, d M Y H:i:s") . " GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
       { 
           $css_body = "";
       } 
       else 
       { 
           $css_body = "margin-left:0px;margin-right:0px;margin-top:0px;margin-bottom:0px;";
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
       { 
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery/js/jquery.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery/js/jquery-ui.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery/css/smoothness/jquery-ui.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/touch_punch/jquery.ui.touch-punch.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/malsup-blockui/jquery.blockUI.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_indicadores_1_1_jquery.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var sc_ajaxBg = '" . $this->Ini->Color_bg_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordC = '" . $this->Ini->Border_c_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordS = '" . $this->Ini->Border_s_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordW = '" . $this->Ini->Border_w_ajax . "';\r\n");
           $nm_saida->saida("   </script>\r\n");
           include_once("grid_indicadores_1_1_sajax_js.php");
           $nm_saida->saida("   <script type=\"text/javascript\">var sc_pathToTB = '" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/';</script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox-compressed.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery.scInput.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <style type=\"text/css\">\r\n");
           $nm_saida->saida("     #quicksearchph_top {\r\n");
           $nm_saida->saida("       position: relative;\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     #quicksearchph_top img {\r\n");
           $nm_saida->saida("       position: absolute;\r\n");
           $nm_saida->saida("       top: 0;\r\n");
           $nm_saida->saida("       right: 0;\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   </style>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\"> \r\n");
           $nm_saida->saida("   var SC_Link_View = false;\r\n");
           if ($this->Ini->SC_Link_View)
           {
               $nm_saida->saida("   SC_Link_View = true;\r\n");
           }
           $nm_saida->saida("   var Qsearch_ok = true;\r\n");
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] != "on")
           {
               $nm_saida->saida("   Qsearch_ok = false;\r\n");
           }
           $nm_saida->saida("   var scQSInit = true;\r\n");
           $nm_saida->saida("   var scQtReg  = " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_reg_grid'] . ";\r\n");
           $nm_saida->saida("  function SC_init_jquery(){ \r\n");
           $nm_saida->saida("   \$(function(){ \r\n");
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
           {
               $nm_saida->saida("     \$('#SC_fast_search_top').keyup(function(e) {\r\n");
               $nm_saida->saida("       scQuickSearchKeyUp('top', e);\r\n");
               $nm_saida->saida("     });\r\n");
           }
           $nm_saida->saida("     $('#id_F0_top').keyup(function(e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("          return false; \r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#id_F0_bot').keyup(function(e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("          return false; \r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $(\".scBtnGrpText\").mouseover(function() { $(this).addClass(\"scBtnGrpTextOver\"); }).mouseout(function() { $(this).removeClass(\"scBtnGrpTextOver\"); });\r\n");
           $nm_saida->saida("   }); \r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  SC_init_jquery();\r\n");
           $nm_saida->saida("   \$(window).load(function() {\r\n");
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
           {
               $nm_saida->saida("     scQuickSearchInit(false, '');\r\n");
               $nm_saida->saida("     $('#SC_fast_search_top').listen();\r\n");
               $nm_saida->saida("     scQuickSearchKeyUp('top', null);\r\n");
               $nm_saida->saida("     scQSInit = false;\r\n");
           }
           $nm_saida->saida("   });\r\n");
           $nm_saida->saida("   function scQuickSearchSubmit_top() {\r\n");
           $nm_saida->saida("     document.F0_top.nmgp_opcao.value = 'fast_search';\r\n");
           $nm_saida->saida("     document.F0_top.submit();\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scQuickSearchInit(bPosOnly, sPos) {\r\n");
           $nm_saida->saida("     if (!bPosOnly) {\r\n");
           $nm_saida->saida("       if ('' == sPos || 'top' == sPos) scQuickSearchSize('SC_fast_search_top', 'SC_fast_search_close_top', 'SC_fast_search_submit_top', 'quicksearchph_top');\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scQuickSearchSize(sIdInput, sIdClose, sIdSubmit, sPlaceHolder) {\r\n");
           $nm_saida->saida("     var oInput = $('#' + sIdInput),\r\n");
           $nm_saida->saida("         oClose = $('#' + sIdClose),\r\n");
           $nm_saida->saida("         oSubmit = $('#' + sIdSubmit),\r\n");
           $nm_saida->saida("         oPlace = $('#' + sPlaceHolder),\r\n");
           $nm_saida->saida("         iInputP = parseInt(oInput.css('padding-right')) || 0,\r\n");
           $nm_saida->saida("         iInputB = parseInt(oInput.css('border-right-width')) || 0,\r\n");
           $nm_saida->saida("         iInputW = oInput.outerWidth(),\r\n");
           $nm_saida->saida("         iPlaceW = oPlace.outerWidth(),\r\n");
           $nm_saida->saida("         oInputO = oInput.offset(),\r\n");
           $nm_saida->saida("         oPlaceO = oPlace.offset(),\r\n");
           $nm_saida->saida("         iNewRight;\r\n");
           $nm_saida->saida("     iNewRight = (iPlaceW - iInputW) - (oInputO.left - oPlaceO.left) + iInputB + 1;\r\n");
           $nm_saida->saida("     oInput.css({\r\n");
           $nm_saida->saida("       'height': Math.max(oInput.height(), 16) + 'px',\r\n");
           $nm_saida->saida("       'padding-right': iInputP + 16 + " . $this->Ini->Str_qs_image_padding . " + 'px'\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     oClose.css({\r\n");
           $nm_saida->saida("       'right': iNewRight + " . $this->Ini->Str_qs_image_padding . " + 'px',\r\n");
           $nm_saida->saida("       'cursor': 'pointer'\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     oSubmit.css({\r\n");
           $nm_saida->saida("       'right': iNewRight + " . $this->Ini->Str_qs_image_padding . " + 'px',\r\n");
           $nm_saida->saida("       'cursor': 'pointer'\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scQuickSearchKeyUp(sPos, e) {\r\n");
           $nm_saida->saida("     if ('' != scQSInitVal && $('#SC_fast_search_' + sPos).val() == scQSInitVal && scQSInit) {\r\n");
           $nm_saida->saida("       $('#SC_fast_search_close_' + sPos).show();\r\n");
           $nm_saida->saida("       $('#SC_fast_search_submit_' + sPos).hide();\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     else {\r\n");
           $nm_saida->saida("       $('#SC_fast_search_close_' + sPos).hide();\r\n");
           $nm_saida->saida("       $('#SC_fast_search_submit_' + sPos).show();\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     if (null != e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("         if ('top' == sPos) nm_gp_submit_qsearch('top');\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGroupByShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).success(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGroupByHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_groupby_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSaveGridShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).success(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_save_grid_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_save_grid_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSaveGridHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_save_grid_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_save_grid_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSelCamposShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).success(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSelCamposHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_sel_campos_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnOrderCamposShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).success(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnOrderCamposHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_order_campos_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   var scBtnGrpStatus = {};\r\n");
           $nm_saida->saida("   function scBtnGrpShow(sGroup) {\r\n");
           $nm_saida->saida("     var btnPos = $('#sc_btgp_btn_' + sGroup).offset();\r\n");
           $nm_saida->saida("     scBtnGrpStatus[sGroup] = 'open';\r\n");
           $nm_saida->saida("     $('#sc_btgp_btn_' + sGroup).mouseout(function() {\r\n");
           $nm_saida->saida("       setTimeout(function() {\r\n");
           $nm_saida->saida("         scBtnGrpHide(sGroup);\r\n");
           $nm_saida->saida("       }, 1000);\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#sc_btgp_div_' + sGroup + ' span a').click(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'out';\r\n");
           $nm_saida->saida("       scBtnGrpHide(sGroup);\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#sc_btgp_div_' + sGroup).css({\r\n");
           $nm_saida->saida("       'left': btnPos.left\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .mouseover(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'over';\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .mouseleave(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'out';\r\n");
           $nm_saida->saida("       setTimeout(function() {\r\n");
           $nm_saida->saida("         scBtnGrpHide(sGroup);\r\n");
           $nm_saida->saida("       }, 1000);\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .show('fast');\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGrpHide(sGroup) {\r\n");
           $nm_saida->saida("     if ('over' != scBtnGrpStatus[sGroup]) {\r\n");
           $nm_saida->saida("       $('#sc_btgp_div_' + sGroup).hide('fast');\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   </script> \r\n");
       } 
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['num_css']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['num_css'] = rand(0, 1000);
       }
       $write_css = true;
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && !$this->Print_All && $this->NM_opcao != "print" && $this->NM_opcao != "pdf")
       {
           $write_css = false;
       }
       if ($write_css) {$NM_css = @fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_indicadores_1_1_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['num_css'] . '.css', 'w');}
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
       {
           $this->NM_field_over  = 0;
           $this->NM_field_click = 0;
           $Css_sub_cons = array();
           if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
           { 
               $NM_css_file = $this->Ini->str_schema_all . "_grid_bw.css";
               $NM_css_dir  = $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw'])) 
               { 
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw'] as $Apl => $Css_apl)
                   {
                       $Css_sub_cons[] = $Css_apl;
                       $Css_sub_cons[] = str_replace(".css", $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css", $Css_apl);
                   }
               } 
           } 
           else 
           { 
               $NM_css_file = $this->Ini->str_schema_all . "_grid.css";
               $NM_css_dir  = $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css'])) 
               { 
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css'] as $Apl => $Css_apl)
                   {
                       $Css_sub_cons[] = $Css_apl;
                       $Css_sub_cons[] = str_replace(".css", $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css", $Css_apl);
                   }
               } 
           } 
           if (is_file($this->Ini->path_css . $NM_css_file))
           {
               $NM_css_attr = file($this->Ini->path_css . $NM_css_file);
               foreach ($NM_css_attr as $NM_line_css)
               {
                   if (substr(trim($NM_line_css), 0, 16) == ".scGridFieldOver" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_over = 1;
                   }
                   if (substr(trim($NM_line_css), 0, 17) == ".scGridFieldClick" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_click = 1;
                   }
                   $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                   if ($write_css) {@fwrite($NM_css, "    " .  $NM_line_css . "\r\n");}
               }
           }
           if (is_file($this->Ini->path_css . $NM_css_dir))
           {
               $NM_css_attr = file($this->Ini->path_css . $NM_css_dir);
               foreach ($NM_css_attr as $NM_line_css)
               {
                   if (substr(trim($NM_line_css), 0, 16) == ".scGridFieldOver" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_over = 1;
                   }
                   if (substr(trim($NM_line_css), 0, 17) == ".scGridFieldClick" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_click = 1;
                   }
                   $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                   if ($write_css) {@fwrite($NM_css, "    " .  $NM_line_css . "\r\n");}
               }
           }
           if (!empty($Css_sub_cons))
           {
               $Css_sub_cons = array_unique($Css_sub_cons);
               foreach ($Css_sub_cons as $Cada_css_sub)
               {
                   if (is_file($this->Ini->path_css . $Cada_css_sub))
                   {
                       $compl_css = str_replace(".", "_", $Cada_css_sub);
                       $temp_css  = explode("/", $compl_css);
                       if (isset($temp_css[1])) { $compl_css = $temp_css[1];}
                       $NM_css_attr = file($this->Ini->path_css . $Cada_css_sub);
                       foreach ($NM_css_attr as $NM_line_css)
                       {
                           $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                           if ($write_css) {@fwrite($NM_css, "    ." .  $compl_css . "_" . substr(trim($NM_line_css), 1) . "\r\n");}
                       }
                   }
               }
           }
       }
       if ($write_css) {@fclose($NM_css);}
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_tab.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_tab" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       elseif ($this->NM_opcao == "print" || $this->Print_All)
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_indicadores_1_1_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['num_css'] . '.css');
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("  </style>\r\n");
       }
       else
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_imag_temp . "/sc_css_grid_indicadores_1_1_grid_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['num_css'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       $str_iframe_body = ($this->aba_iframe) ? 'marginwidth="0px" marginheight="0px" topmargin="0px" leftmargin="0px"' : '';
       $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $nm_saida->saida("  </style>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       $nm_saida->saida("  </HEAD>\r\n");
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
   { 
       $nm_saida->saida("  <body class=\"" . $this->css_scGridPage . "\" " . $str_iframe_body . " style=\"" . $css_body . "\">\r\n");
       $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf" && !$this->Print_All)
       { 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
           $nm_saida->saida("<div id=\"id_debug_window\" style=\"display: none; position: absolute; left: 50px; top: 50px\"><table class=\"scFormMessageTable\">\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageTitle\">" . $Cod_Btn . "&nbsp;&nbsp;Output</td></tr>\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageMessage\" style=\"padding: 0px; vertical-align: top\"><div style=\"padding: 2px; height: 200px; width: 350px; overflow: auto\" id=\"id_debug_text\"></div></td></tr>\r\n");
           $nm_saida->saida("</table></div>\r\n");
       } 
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$this->Print_All)
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['SC_Ind_Groupby'] == "agrupar")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">Id Dimension</H1></div>\r\n");
               } 
           }
       } 
       $this->Tab_align  = "center";
       $this->Tab_valign = "top";
       $this->Tab_width = "";
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['pdf_res'])
       {
           return;
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
       { 
           $this->form_navegacao();
       } 
       $nm_saida->saida("   <TABLE id=\"main_table_grid\" class=\"scGridBorder\" align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
       $nm_saida->saida("  <div id=\"id_div_process\" style=\"display: none; margin: 10px; whitespace: nowrap\" class=\"scFormProcessFixed\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
       $nm_saida->saida("  <div id=\"id_div_process_block\" style=\"display: none; margin: 10px; whitespace: nowrap\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
       $nm_saida->saida("  <div id=\"id_fatal_error\" class=\"" . $this->css_scGridLabel . "\" style=\"display: none; position: absolute\"></div>\r\n");
   }  
 }  
 function NM_cor_embutida()
 {  
   $compl_css = "";
   include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
   {
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['SC_herda_css'] == "N")
   {
       if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_indicadores_1_1']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_indicadores_1_1']) . "_";
           } 
       } 
       else 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_indicadores_1_1']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_indicadores_1_1']) . "_";
           } 
       }
   }
   $temp_css  = explode("/", $compl_css);
   if (isset($temp_css[1])) { $compl_css = $temp_css[1];}
   $this->css_scGridPage          = $compl_css . "scGridPage";
   $this->css_scGridPageLink      = $compl_css . "scGridPageLink";
   $this->css_scGridToolbar       = $compl_css . "scGridToolbar";
   $this->css_scGridToolbarPadd   = $compl_css . "scGridToolbarPadding";
   $this->css_css_toolbar_obj     = $compl_css . "css_toolbar_obj";
   $this->css_scGridHeader        = $compl_css . "scGridHeader";
   $this->css_scGridHeaderFont    = $compl_css . "scGridHeaderFont";
   $this->css_scGridFooter        = $compl_css . "scGridFooter";
   $this->css_scGridFooterFont    = $compl_css . "scGridFooterFont";
   $this->css_scGridBlock         = $compl_css . "scGridBlock";
   $this->css_scGridBlockFont     = $compl_css . "scGridBlockFont";
   $this->css_scGridBlockAlign    = $compl_css . "scGridBlockAlign";
   $this->css_scGridTotal         = $compl_css . "scGridTotal";
   $this->css_scGridTotalFont     = $compl_css . "scGridTotalFont";
   $this->css_scGridSubtotal      = $compl_css . "scGridSubtotal";
   $this->css_scGridSubtotalFont  = $compl_css . "scGridSubtotalFont";
   $this->css_scGridFieldEven     = $compl_css . "scGridFieldEven";
   $this->css_scGridFieldEvenFont = $compl_css . "scGridFieldEvenFont";
   $this->css_scGridFieldEvenVert = $compl_css . "scGridFieldEvenVert";
   $this->css_scGridFieldEvenLink = $compl_css . "scGridFieldEvenLink";
   $this->css_scGridFieldOdd      = $compl_css . "scGridFieldOdd";
   $this->css_scGridFieldOddFont  = $compl_css . "scGridFieldOddFont";
   $this->css_scGridFieldOddVert  = $compl_css . "scGridFieldOddVert";
   $this->css_scGridFieldOddLink  = $compl_css . "scGridFieldOddLink";
   $this->css_scGridFieldClick    = $compl_css . "scGridFieldClick";
   $this->css_scGridFieldOver     = $compl_css . "scGridFieldOver";
   $this->css_scGridLabel         = $compl_css . "scGridLabel";
   $this->css_scGridLabelVert     = $compl_css . "scGridLabelVert";
   $this->css_scGridLabelFont     = $compl_css . "scGridLabelFont";
   $this->css_scGridLabelLink     = $compl_css . "scGridLabelLink";
   $this->css_scGridTabela        = $compl_css . "scGridTabela";
   $this->css_scGridTabelaTd      = $compl_css . "scGridTabelaTd";
   $this->css_scGridBlockBg       = $compl_css . "scGridBlockBg";
   $this->css_scGridBlockLineBg   = $compl_css . "scGridBlockLineBg";
   $this->css_scGridBlockSpaceBg  = $compl_css . "scGridBlockSpaceBg";
   $this->css_scGridLabelNowrap   = "";
   $this->css_scAppDivMoldura     = $compl_css . "scAppDivMoldura";
   $this->css_scAppDivHeader      = $compl_css . "scAppDivHeader";
   $this->css_scAppDivHeaderText  = $compl_css . "scAppDivHeaderText";
   $this->css_scAppDivContent     = $compl_css . "scAppDivContent";
   $this->css_scAppDivContentText = $compl_css . "scAppDivContentText";
   $this->css_scAppDivToolbar     = $compl_css . "scAppDivToolbar";
   $this->css_scAppDivToolbarInput= $compl_css . "scAppDivToolbarInput";
 }  
// 
//----- 
 function cabecalho()
 {
   global
          $nm_saida;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_liga']['cab']))
   {
       return; 
   }
   $nm_cab_filtro   = ""; 
   $nm_cab_filtrobr = ""; 
   $Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
   $Lim   = strlen($Str_date);
   $Ult   = "";
   $Arr_D = array();
   for ($I = 0; $I < $Lim; $I++)
   {
       $Char = substr($Str_date, $I, 1);
       if ($Char != $Ult)
       {
           $Arr_D[] = $Char;
       }
       $Ult = $Char;
   }
   $Prim = true;
   $Str  = "";
   foreach ($Arr_D as $Cada_d)
   {
       $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
       $Str .= $Cada_d;
       $Prim = false;
   }
   $Str = str_replace("a", "Y", $Str);
   $Str = str_replace("y", "Y", $Str);
   $nm_data_fixa = date($Str); 
   $this->sc_proc_grid = false; 
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq_filtro'];
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['cond_pesq']))
   {  
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['cond_pesq'];
       while ($pos_tmp)
       {
          $pos = strpos($tmp, "##*@@", $pos);
          if ($pos !== false)
          {
              $trab_pos = $pos;
              $pos += 4;
          }
          else
          {
              $pos_tmp = false;
          }
       }
       $nm_cond_filtro_or  = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['cond_pesq'], $trab_pos + 5) == "or")  ? " " . trim($this->Ini->Nm_lang['lang_srch_orr_cond']) . " " : "";
       $nm_cond_filtro_and = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['cond_pesq'], $trab_pos + 5) == "and") ? " " . trim($this->Ini->Nm_lang['lang_srch_and_cond']) . " " : "";
       $nm_cab_filtro   = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['cond_pesq'], 0, $trab_pos);
       $nm_cab_filtrobr = str_replace("##*@@", ", " . $nm_cond_filtro_or . $nm_cond_filtro_and . "<br />", $nm_cab_filtro);
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $nm_cab_filtro;
       while ($pos_tmp)
       {
          $pos = strpos($tmp, "##*@@", $pos);
          if ($pos !== false)
          {
              $trab_pos = $pos;
              $pos += 4;
          }
          else
          {
              $pos_tmp = false;
          }
       }
       if ($trab_pos === false)
       {
       }
       else  
       {  
          $nm_cab_filtro = substr($nm_cab_filtro, 0, $trab_pos) . " " .  $nm_cond_filtro_or . $nm_cond_filtro_and . substr($nm_cab_filtro, $trab_pos + 5);
          $nm_cab_filtro = str_replace("##*@@", ", " . $nm_cond_filtro_or . $nm_cond_filtro_and, $nm_cab_filtro);
       }   
   }   
   $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS"); 
   $nm_saida->saida(" <TR id=\"sc_grid_head\">\r\n");
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['sv_dt_head']))
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['sv_dt_head'] = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['sv_dt_head']['fix'] = $nm_data_fixa;
       $nm_refresch_cab_rod = true;
   } 
   else 
   { 
       $nm_refresch_cab_rod = false;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['sv_dt_head'] as $ind => $val)
   {
       $tmp_var = "sc_data_cab" . $ind;
       if ($$tmp_var != $val)
       {
           $nm_refresch_cab_rod = true;
           break;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['sv_dt_head']['fix'] != $nm_data_fixa)
   {
       $nm_refresch_cab_rod = true;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'] && $nm_refresch_cab_rod)
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['sv_dt_head']['fix'] = $nm_data_fixa;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf")
   { 
       $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
   } 
   else 
   { 
       $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
   } 
   $nm_saida->saida("<style>\r\n");
   $nm_saida->saida("#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 \r\n");
   $nm_saida->saida("#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}\r\n");
   $nm_saida->saida("</style>\r\n");
   $nm_saida->saida("<div style=\"width: 100%\">\r\n");
   $nm_saida->saida(" <div class=\"" . $this->css_scGridHeader . "\" style=\"height:11px; display: block; border-width:0px; \"></div>\r\n");
   $nm_saida->saida(" <div style=\"height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block\">\r\n");
   $nm_saida->saida(" 	<table style=\"width:100%; border-collapse:collapse; padding:0;\">\r\n");
   $nm_saida->saida("    	<tr>\r\n");
   $nm_saida->saida("        	<td id=\"lin1_col1\" class=\"" . $this->css_scGridHeaderFont . "\"><span>" . $this->Ini->Nm_lang['lang_othr_grid_titl'] . " - </span></td>\r\n");
   $nm_saida->saida("            <td id=\"lin1_col2\" class=\"" . $this->css_scGridHeaderFont . "\"><span>" . $nm_data_fixa . "</span></td>\r\n");
   $nm_saida->saida("        </tr>\r\n");
   $nm_saida->saida("    </table>		 \r\n");
   $nm_saida->saida(" </div>\r\n");
   $nm_saida->saida("</div>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'] && $nm_refresch_cab_rod)
   { 
       $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_head', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   $nm_saida->saida(" </TR>\r\n");
 }
// 
 function label_grid($linhas = 0)
 {
   global 
           $nm_saida;
   static $nm_seq_titulos   = 0; 
   $contr_embutida = false;
   $salva_htm_emb  = "";
   if (1 < $linhas)
   {
      $this->Lin_impressas++;
   }
   $nm_seq_titulos++; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['exibe_titulos'] != "S")
   { 
   } 
   else 
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_label'])
      { 
          if (!isset($_SESSION['scriptcase']['saida_var']) || !$_SESSION['scriptcase']['saida_var']) 
          { 
              $_SESSION['scriptcase']['saida_var']  = true;
              $_SESSION['scriptcase']['saida_html'] = "";
              $contr_embutida = true;
          } 
          else 
          { 
              $salva_htm_emb = $_SESSION['scriptcase']['saida_html'];
              $_SESSION['scriptcase']['saida_html'] = "";
          } 
      } 
   $nm_saida->saida("    <TR id=\"tit_grid_indicadores_1_1#?#" . $nm_seq_titulos . "\" align=\"center\" class=\"" . $this->css_scGridLabel . "\">\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  style=\"" . $this->css_scGridLabelNowrap . "text-align:left;vertical-align:middle;font-weight:bold;\" >&nbsp;</TD>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_psq']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "text-align:left;vertical-align:middle;font-weight:bold;\" >&nbsp;</TD>\r\n");
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['field_order'] as $Cada_label)
   { 
       $NM_func_lab = "NM_label_" . $Cada_label;
       $this->$NM_func_lab();
   } 
   $nm_saida->saida("</TR>\r\n");
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_label'])
     { 
         if (isset($_SESSION['scriptcase']['saida_var']) && $_SESSION['scriptcase']['saida_var'])
         { 
             $Cod_Html = $_SESSION['scriptcase']['saida_html'];
             $pos_tag = strpos($Cod_Html, "<TD ");
             $Cod_Html = substr($Cod_Html, $pos_tag);
             $pos      = 0;
             $pos_tag  = false;
             $pos_tmp  = true; 
             $tmp      = $Cod_Html;
             while ($pos_tmp)
             {
                $pos = strpos($tmp, "</TR>", $pos);
                if ($pos !== false)
                {
                    $pos_tag = $pos;
                    $pos += 4;
                }
                else
                {
                    $pos_tmp = false;
                }
             }
             $Cod_Html = substr($Cod_Html, 0, $pos_tag);
             $Nm_temp = explode("</TD>", $Cod_Html);
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['cols_emb'] = count($Nm_temp) - 1;
             if ($contr_embutida) 
             { 
                 $_SESSION['scriptcase']['saida_var']  = false;
                 $nm_saida->saida($Cod_Html);
             } 
             else 
             { 
                 $_SESSION['scriptcase']['saida_html'] = $salva_htm_emb . $Cod_Html;
             } 
         } 
     } 
     $NM_seq_lab = 1;
     foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['labels'] as $NM_cmp => $NM_lab)
     {
         if (empty($NM_lab) || $NM_lab == "&nbsp;")
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['labels'][$NM_cmp] = "No_Label" . $NM_seq_lab;
             $NM_seq_lab++;
         }
     } 
   } 
 }
 function NM_label_dimension_id_dimension()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['dimension_id_dimension'])) ? $this->New_label['dimension_id_dimension'] : "Id Dimension"; 
   if (!isset($this->NM_cmp_hidden['dimension_id_dimension']) || $this->NM_cmp_hidden['dimension_id_dimension'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "text-align:right;vertical-align:middle;font-weight:bold;\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf")
   {
      $NM_cmp_class =  "dimension_id_dimension";
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_cmp'] == $NM_cmp_class)
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_desc'] == " desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = nl2br($SC_Label) . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<IMG style=\"float: right\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG style=\"float: left\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_dimension_descripcion()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['dimension_descripcion'])) ? $this->New_label['dimension_descripcion'] : "Descripcion"; 
   if (!isset($this->NM_cmp_hidden['dimension_descripcion']) || $this->NM_cmp_hidden['dimension_descripcion'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "text-align:left;vertical-align:middle;font-weight:bold;\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf")
   {
      $NM_cmp_class =  "dimension_descripcion";
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_cmp'] == $NM_cmp_class)
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_desc'] == " desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = nl2br($SC_Label) . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<IMG style=\"float: right\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG style=\"float: left\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_tematica_id_tematica()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['tematica_id_tematica'])) ? $this->New_label['tematica_id_tematica'] : "Id Tematica"; 
   if (!isset($this->NM_cmp_hidden['tematica_id_tematica']) || $this->NM_cmp_hidden['tematica_id_tematica'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "text-align:right;vertical-align:middle;font-weight:bold;\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf")
   {
      $NM_cmp_class =  "tematica_id_tematica";
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_cmp'] == $NM_cmp_class)
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_desc'] == " desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = nl2br($SC_Label) . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<IMG style=\"float: right\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG style=\"float: left\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_tematica_descripcion()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['tematica_descripcion'])) ? $this->New_label['tematica_descripcion'] : "Descripcion"; 
   if (!isset($this->NM_cmp_hidden['tematica_descripcion']) || $this->NM_cmp_hidden['tematica_descripcion'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "text-align:left;vertical-align:middle;font-weight:bold;\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf")
   {
      $NM_cmp_class =  "tematica_descripcion";
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_cmp'] == $NM_cmp_class)
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_desc'] == " desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = nl2br($SC_Label) . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<IMG style=\"float: right\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG style=\"float: left\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_indicadores_id_indicadores()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['indicadores_id_indicadores'])) ? $this->New_label['indicadores_id_indicadores'] : "Id Indicadores"; 
   if (!isset($this->NM_cmp_hidden['indicadores_id_indicadores']) || $this->NM_cmp_hidden['indicadores_id_indicadores'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "text-align:right;vertical-align:middle;font-weight:bold;\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf")
   {
      $NM_cmp_class =  "indicadores_id_indicadores";
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_cmp'] == $NM_cmp_class)
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_desc'] == " desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = nl2br($SC_Label) . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<IMG style=\"float: right\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG style=\"float: left\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_indicadores_nombre()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['indicadores_nombre'])) ? $this->New_label['indicadores_nombre'] : "Nombre"; 
   if (!isset($this->NM_cmp_hidden['indicadores_nombre']) || $this->NM_cmp_hidden['indicadores_nombre'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "text-align:left;vertical-align:middle;font-weight:bold;\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf")
   {
      $NM_cmp_class =  "indicadores_nombre";
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_cmp'] == $NM_cmp_class)
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ordem_desc'] == " desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = nl2br($SC_Label) . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<IMG style=\"float: right\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG style=\"float: left\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>" . nl2br($SC_Label);
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('" . $NM_cmp_class . "')\" class=\"" . $this->css_scGridLabelLink . "\">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_variables_id_variable()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['variables_id_variable'])) ? $this->New_label['variables_id_variable'] : "Id Variable"; 
   if (!isset($this->NM_cmp_hidden['variables_id_variable']) || $this->NM_cmp_hidden['variables_id_variable'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "text-align:right;vertical-align:middle;font-weight:bold;\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_variables_descripcion()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['variables_descripcion'])) ? $this->New_label['variables_descripcion'] : "Descripcion"; 
   if (!isset($this->NM_cmp_hidden['variables_descripcion']) || $this->NM_cmp_hidden['variables_descripcion'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "text-align:left;vertical-align:middle;font-weight:bold;\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida;
   $fecha_tr               = "</tr>";
   $this->Ini->qual_linha  = "par";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['rows_emb'] = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ini_cor_grid']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ini_cor_grid'] == "impar")
       {
           $this->Ini->qual_linha = "impar";
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ini_cor_grid']);
       }
   }
   static $nm_seq_execucoes = 0; 
   static $nm_seq_titulos   = 0; 
   $this->Rows_span = 1;
   $nm_seq_execucoes++; 
   $nm_seq_titulos++; 
   $this->nm_prim_linha  = true; 
   $this->Ini->nm_cont_lin = 0; 
   $this->sc_where_orig    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_orig'];
   $this->sc_where_atual   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq'];
   $this->sc_where_filtro  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['where_pesq_filtro'];
// 
   $SC_Label = (isset($this->New_label['dimension_id_dimension'])) ? $this->New_label['dimension_id_dimension'] : "Id Dimension"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['labels']['dimension_id_dimension'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['dimension_descripcion'])) ? $this->New_label['dimension_descripcion'] : "Descripcion"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['labels']['dimension_descripcion'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['tematica_id_tematica'])) ? $this->New_label['tematica_id_tematica'] : "Id Tematica"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['labels']['tematica_id_tematica'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['tematica_descripcion'])) ? $this->New_label['tematica_descripcion'] : "Descripcion"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['labels']['tematica_descripcion'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['indicadores_id_indicadores'])) ? $this->New_label['indicadores_id_indicadores'] : "Id Indicadores"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['labels']['indicadores_id_indicadores'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['indicadores_nombre'])) ? $this->New_label['indicadores_nombre'] : "Nombre"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['labels']['indicadores_nombre'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['variables_id_variable'])) ? $this->New_label['variables_id_variable'] : "Id Variable"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['labels']['variables_id_variable'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['variables_descripcion'])) ? $this->New_label['variables_descripcion'] : "Descripcion"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['labels']['variables_descripcion'] = $SC_Label; 
   if (!$this->grid_emb_form && isset($_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_indicadores_1_1']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
       {
           $this->Lin_impressas++;
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_grid'])
           {
               $NM_span_sem_reg  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['cols_emb'];
               $nm_saida->saida("  <TR> <TD class=\"" . $this->css_scGridFieldOdd . "\" colspan = \"$NM_span_sem_reg\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "</TD> </TR>\r\n");
               $nm_saida->saida("##NM@@\r\n");
               $this->rs_grid->Close();
           }
           else
           {
               $nm_saida->saida("<table id=\"apl_grid_indicadores_1_1#?#$nm_seq_execucoes\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("  <tr><td style=\"padding: 0px; font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\">\r\n");
               $nm_id_aplicacao = "";
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['cab_embutida'] != "S")
               {
                   $this->label_grid($linhas);
               }
               $this->NM_calc_span();
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridFieldOdd . "\"  style=\"padding: 0px; font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\" colspan = \"" . $this->NM_colspan . "\" align=\"center\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "\r\n");
               $nm_saida->saida("  </td></tr>\r\n");
               $nm_saida->saida("  </table></td></tr></table>\r\n");
               $this->Lin_final = $this->rs_grid->EOF;
               if ($this->Lin_final)
               {
                   $this->rs_grid->Close();
               }
           }
       }
       else
       {
           $nm_saida->saida("  <tr><td id=\"sc_grid_body\" class=\"" . $this->css_scGridTabelaTd . " " . $this->css_scGridFieldOdd . "\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
           if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['force_toolbar']))
           { 
               $this->force_toolbar = true;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['force_toolbar'] = true;
           } 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
           { 
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  " . $this->nm_grid_sem_reg . "\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
           { 
               $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  </td></tr>\r\n");
           $this->nmgp_embbed_placeholder_bot();
           $this->nmgp_barra_bot();
       }
       return;
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['force_toolbar']))
   { 
       $this->force_toolbar = true;
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['force_toolbar']);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
   { 
       $nm_saida->saida("<table id=\"apl_grid_indicadores_1_1#?#$nm_seq_execucoes\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
       $nm_saida->saida(" <TR> \r\n");
       $nm_id_aplicacao = "";
   } 
   else 
   { 
       $nm_saida->saida(" <TR> \r\n");
       $nm_id_aplicacao = " id=\"apl_grid_indicadores_1_1#?#1\"";
   } 
   $nm_saida->saida("  <TD id=\"sc_grid_body\" class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top;text-align: center;\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_psq'])
   { 
       $nm_saida->saida("        <div id=\"div_FBtn_Run\" style=\"display: none\"> \r\n");
       $nm_saida->saida("        <form name=\"Fpesq\" method=post>\r\n");
       $nm_saida->saida("         <input type=hidden name=\"nm_ret_psq\"> \r\n");
       $nm_saida->saida("        </div> \r\n");
   } 
   $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['cab_embutida'] != "S" )
      { 
          $this->label_grid($linhas);
      } 
   } 
   else 
   { 
      $this->label_grid($linhas);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_grid'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
// 
   $nm_quant_linhas = 0 ;
   $nm_inicio_pag = 0 ;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['final'] = 0;
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['final'] == 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['SC_Ind_Groupby'] == "agrupar") 
   { 
       if (isset($this->dimension_id_dimension))
       {
           $this->quebra_dimension_id_dimension_agrupar_top(); 
       }
       if (isset($this->dimension_descripcion))
       {
           $this->quebra_dimension_descripcion_agrupar_top(); 
       }
       if (isset($this->tematica_id_tematica))
       {
           $this->quebra_tematica_id_tematica_agrupar_top(); 
       }
       if (isset($this->tematica_descripcion))
       {
           $this->quebra_tematica_descripcion_agrupar_top(); 
       }
       if (isset($this->indicadores_id_indicadores))
       {
           $this->quebra_indicadores_id_indicadores_agrupar_top(); 
       }
       if (isset($this->indicadores_nombre))
       {
           $this->quebra_indicadores_nombre_agrupar_top(); 
       }
       if (isset($this->variables_id_variable))
       {
           $this->quebra_variables_id_variable_agrupar_top(); 
       }
       if (isset($this->variables_descripcion))
       {
           $this->quebra_variables_descripcion_agrupar_top(); 
       }
   } 
   $this->nmgp_prim_pag_pdf = false;
   $this->Ini->cor_link_dados = $this->css_scGridFieldEvenLink;
   $this->NM_flag_antigo = FALSE;
   $ini_grid = true;
   while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_reg_grid'] && ($linhas == 0 || $linhas > $this->Lin_impressas)) 
   {  
          $this->Rows_span = 1;
          $this->NM_field_style = array();
          //---------- Gauge ----------
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && -1 < $this->progress_grid)
          {
              $this->progress_now++;
              if (0 == $this->progress_lim_now)
              {
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_rows'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = mb_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
                  fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n");
              }
              $this->progress_lim_now++;
              if ($this->progress_lim_tot == $this->progress_lim_now)
              {
                  $this->progress_lim_now = 0;
              }
          }
          $this->Lin_impressas++;
          $this->dimension_id_dimension = $this->rs_grid->fields[0] ;  
          $this->dimension_id_dimension = (string)$this->dimension_id_dimension;
          $this->dimension_descripcion = $this->rs_grid->fields[1] ;  
          $this->tematica_id_tematica = $this->rs_grid->fields[2] ;  
          $this->tematica_id_tematica = (string)$this->tematica_id_tematica;
          $this->tematica_descripcion = $this->rs_grid->fields[3] ;  
          $this->indicadores_id_indicadores = $this->rs_grid->fields[4] ;  
          $this->indicadores_id_indicadores = (string)$this->indicadores_id_indicadores;
          $this->indicadores_nombre = $this->rs_grid->fields[5] ;  
          $this->variables_id_variable = $this->rs_grid->fields[6] ;  
          $this->variables_id_variable = (string)$this->variables_id_variable;
          $this->variables_descripcion = $this->rs_grid->fields[7] ;  
          if (!isset($this->dimension_id_dimension)) { $this->dimension_id_dimension = ""; }
          if (!isset($this->dimension_descripcion)) { $this->dimension_descripcion = ""; }
          if (!isset($this->tematica_id_tematica)) { $this->tematica_id_tematica = ""; }
          if (!isset($this->tematica_descripcion)) { $this->tematica_descripcion = ""; }
          if (!isset($this->indicadores_id_indicadores)) { $this->indicadores_id_indicadores = ""; }
          if (!isset($this->indicadores_nombre)) { $this->indicadores_nombre = ""; }
          if (!isset($this->variables_id_variable)) { $this->variables_id_variable = ""; }
          if (!isset($this->variables_descripcion)) { $this->variables_descripcion = ""; }
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf")
          {
              $this->Res->nm_acum_res_unit($this->rs_grid);
          }
          $this->arg_sum_dimension_id_dimension = " = " . $this->dimension_id_dimension;
          $this->arg_sum_dimension_descripcion = " = " . $this->Db->qstr($this->dimension_descripcion);
          $this->arg_sum_tematica_id_tematica = " = " . $this->tematica_id_tematica;
          $this->arg_sum_tematica_descripcion = " = " . $this->Db->qstr($this->tematica_descripcion);
          $this->arg_sum_indicadores_id_indicadores = " = " . $this->indicadores_id_indicadores;
          $this->arg_sum_indicadores_nombre = " = " . $this->Db->qstr($this->indicadores_nombre);
          $this->arg_sum_variables_id_variable = " = " . $this->variables_id_variable;
          $this->arg_sum_variables_descripcion = " = " . $this->Db->qstr($this->variables_descripcion);
          $this->SC_seq_page++; 
          $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['final'] + 1; 
          if (!$ini_grid) {
              $this->SC_sep_quebra = true;
          }
          else {
              $ini_grid = false;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['rows_emb']++;
          if ($this->dimension_id_dimension !== $this->dimension_id_dimension_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['SC_Ind_Groupby'] == "agrupar") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$this->Print_All && !$NM_prim_qb)
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->variables_descripcion_Old = $this->variables_descripcion ; 
              $this->quebra_variables_descripcion_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre, $this->variables_id_variable, $this->variables_descripcion) ; 
              $this->variables_id_variable_Old = $this->variables_id_variable ; 
              $this->quebra_variables_id_variable_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre, $this->variables_id_variable) ; 
              $this->indicadores_nombre_Old = $this->indicadores_nombre ; 
              $this->quebra_indicadores_nombre_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre) ; 
              $this->indicadores_id_indicadores_Old = $this->indicadores_id_indicadores ; 
              $this->quebra_indicadores_id_indicadores_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores) ; 
              $this->tematica_descripcion_Old = $this->tematica_descripcion ; 
              $this->quebra_tematica_descripcion_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion) ; 
              $this->tematica_id_tematica_Old = $this->tematica_id_tematica ; 
              $this->quebra_tematica_id_tematica_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica) ; 
              $this->dimension_descripcion_Old = $this->dimension_descripcion ; 
              $this->quebra_dimension_descripcion_agrupar($this->dimension_id_dimension, $this->dimension_descripcion) ; 
              $this->dimension_id_dimension_Old = $this->dimension_id_dimension ; 
              $this->quebra_dimension_id_dimension_agrupar($this->dimension_id_dimension) ; 
              if (isset($this->dimension_id_dimension_Old))
              {
                 $this->quebra_dimension_id_dimension_agrupar_top() ; 
              }
              if (isset($this->dimension_descripcion_Old))
              {
                 $this->quebra_dimension_descripcion_agrupar_top() ; 
              }
              if (isset($this->tematica_id_tematica_Old))
              {
                 $this->quebra_tematica_id_tematica_agrupar_top() ; 
              }
              if (isset($this->tematica_descripcion_Old))
              {
                 $this->quebra_tematica_descripcion_agrupar_top() ; 
              }
              if (isset($this->indicadores_id_indicadores_Old))
              {
                 $this->quebra_indicadores_id_indicadores_agrupar_top() ; 
              }
              if (isset($this->indicadores_nombre_Old))
              {
                 $this->quebra_indicadores_nombre_agrupar_top() ; 
              }
              if (isset($this->variables_id_variable_Old))
              {
                 $this->quebra_variables_id_variable_agrupar_top() ; 
              }
              if (isset($this->variables_descripcion_Old))
              {
                 $this->quebra_variables_descripcion_agrupar_top() ; 
              }
          } 
          if ($this->dimension_descripcion !== $this->dimension_descripcion_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['SC_Ind_Groupby'] == "agrupar") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$this->Print_All)
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->variables_descripcion_Old = $this->variables_descripcion ; 
              $this->quebra_variables_descripcion_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre, $this->variables_id_variable, $this->variables_descripcion) ; 
              $this->variables_id_variable_Old = $this->variables_id_variable ; 
              $this->quebra_variables_id_variable_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre, $this->variables_id_variable) ; 
              $this->indicadores_nombre_Old = $this->indicadores_nombre ; 
              $this->quebra_indicadores_nombre_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre) ; 
              $this->indicadores_id_indicadores_Old = $this->indicadores_id_indicadores ; 
              $this->quebra_indicadores_id_indicadores_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores) ; 
              $this->tematica_descripcion_Old = $this->tematica_descripcion ; 
              $this->quebra_tematica_descripcion_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion) ; 
              $this->tematica_id_tematica_Old = $this->tematica_id_tematica ; 
              $this->quebra_tematica_id_tematica_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica) ; 
              $this->dimension_descripcion_Old = $this->dimension_descripcion ; 
              $this->quebra_dimension_descripcion_agrupar($this->dimension_id_dimension, $this->dimension_descripcion) ; 
              if (isset($this->dimension_descripcion_Old))
              {
                 $this->quebra_dimension_descripcion_agrupar_top() ; 
              }
              if (isset($this->tematica_id_tematica_Old))
              {
                 $this->quebra_tematica_id_tematica_agrupar_top() ; 
              }
              if (isset($this->tematica_descripcion_Old))
              {
                 $this->quebra_tematica_descripcion_agrupar_top() ; 
              }
              if (isset($this->indicadores_id_indicadores_Old))
              {
                 $this->quebra_indicadores_id_indicadores_agrupar_top() ; 
              }
              if (isset($this->indicadores_nombre_Old))
              {
                 $this->quebra_indicadores_nombre_agrupar_top() ; 
              }
              if (isset($this->variables_id_variable_Old))
              {
                 $this->quebra_variables_id_variable_agrupar_top() ; 
              }
              if (isset($this->variables_descripcion_Old))
              {
                 $this->quebra_variables_descripcion_agrupar_top() ; 
              }
          } 
          if ($this->tematica_id_tematica !== $this->tematica_id_tematica_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['SC_Ind_Groupby'] == "agrupar") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$this->Print_All)
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->variables_descripcion_Old = $this->variables_descripcion ; 
              $this->quebra_variables_descripcion_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre, $this->variables_id_variable, $this->variables_descripcion) ; 
              $this->variables_id_variable_Old = $this->variables_id_variable ; 
              $this->quebra_variables_id_variable_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre, $this->variables_id_variable) ; 
              $this->indicadores_nombre_Old = $this->indicadores_nombre ; 
              $this->quebra_indicadores_nombre_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre) ; 
              $this->indicadores_id_indicadores_Old = $this->indicadores_id_indicadores ; 
              $this->quebra_indicadores_id_indicadores_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores) ; 
              $this->tematica_descripcion_Old = $this->tematica_descripcion ; 
              $this->quebra_tematica_descripcion_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion) ; 
              $this->tematica_id_tematica_Old = $this->tematica_id_tematica ; 
              $this->quebra_tematica_id_tematica_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica) ; 
              if (isset($this->tematica_id_tematica_Old))
              {
                 $this->quebra_tematica_id_tematica_agrupar_top() ; 
              }
              if (isset($this->tematica_descripcion_Old))
              {
                 $this->quebra_tematica_descripcion_agrupar_top() ; 
              }
              if (isset($this->indicadores_id_indicadores_Old))
              {
                 $this->quebra_indicadores_id_indicadores_agrupar_top() ; 
              }
              if (isset($this->indicadores_nombre_Old))
              {
                 $this->quebra_indicadores_nombre_agrupar_top() ; 
              }
              if (isset($this->variables_id_variable_Old))
              {
                 $this->quebra_variables_id_variable_agrupar_top() ; 
              }
              if (isset($this->variables_descripcion_Old))
              {
                 $this->quebra_variables_descripcion_agrupar_top() ; 
              }
          } 
          if ($this->tematica_descripcion !== $this->tematica_descripcion_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['SC_Ind_Groupby'] == "agrupar") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$this->Print_All)
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->variables_descripcion_Old = $this->variables_descripcion ; 
              $this->quebra_variables_descripcion_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre, $this->variables_id_variable, $this->variables_descripcion) ; 
              $this->variables_id_variable_Old = $this->variables_id_variable ; 
              $this->quebra_variables_id_variable_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre, $this->variables_id_variable) ; 
              $this->indicadores_nombre_Old = $this->indicadores_nombre ; 
              $this->quebra_indicadores_nombre_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre) ; 
              $this->indicadores_id_indicadores_Old = $this->indicadores_id_indicadores ; 
              $this->quebra_indicadores_id_indicadores_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores) ; 
              $this->tematica_descripcion_Old = $this->tematica_descripcion ; 
              $this->quebra_tematica_descripcion_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion) ; 
              if (isset($this->tematica_descripcion_Old))
              {
                 $this->quebra_tematica_descripcion_agrupar_top() ; 
              }
              if (isset($this->indicadores_id_indicadores_Old))
              {
                 $this->quebra_indicadores_id_indicadores_agrupar_top() ; 
              }
              if (isset($this->indicadores_nombre_Old))
              {
                 $this->quebra_indicadores_nombre_agrupar_top() ; 
              }
              if (isset($this->variables_id_variable_Old))
              {
                 $this->quebra_variables_id_variable_agrupar_top() ; 
              }
              if (isset($this->variables_descripcion_Old))
              {
                 $this->quebra_variables_descripcion_agrupar_top() ; 
              }
          } 
          if ($this->indicadores_id_indicadores !== $this->indicadores_id_indicadores_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['SC_Ind_Groupby'] == "agrupar") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$this->Print_All)
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->variables_descripcion_Old = $this->variables_descripcion ; 
              $this->quebra_variables_descripcion_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre, $this->variables_id_variable, $this->variables_descripcion) ; 
              $this->variables_id_variable_Old = $this->variables_id_variable ; 
              $this->quebra_variables_id_variable_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre, $this->variables_id_variable) ; 
              $this->indicadores_nombre_Old = $this->indicadores_nombre ; 
              $this->quebra_indicadores_nombre_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre) ; 
              $this->indicadores_id_indicadores_Old = $this->indicadores_id_indicadores ; 
              $this->quebra_indicadores_id_indicadores_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores) ; 
              if (isset($this->indicadores_id_indicadores_Old))
              {
                 $this->quebra_indicadores_id_indicadores_agrupar_top() ; 
              }
              if (isset($this->indicadores_nombre_Old))
              {
                 $this->quebra_indicadores_nombre_agrupar_top() ; 
              }
              if (isset($this->variables_id_variable_Old))
              {
                 $this->quebra_variables_id_variable_agrupar_top() ; 
              }
              if (isset($this->variables_descripcion_Old))
              {
                 $this->quebra_variables_descripcion_agrupar_top() ; 
              }
          } 
          if ($this->indicadores_nombre !== $this->indicadores_nombre_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['SC_Ind_Groupby'] == "agrupar") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$this->Print_All)
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->variables_descripcion_Old = $this->variables_descripcion ; 
              $this->quebra_variables_descripcion_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre, $this->variables_id_variable, $this->variables_descripcion) ; 
              $this->variables_id_variable_Old = $this->variables_id_variable ; 
              $this->quebra_variables_id_variable_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre, $this->variables_id_variable) ; 
              $this->indicadores_nombre_Old = $this->indicadores_nombre ; 
              $this->quebra_indicadores_nombre_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre) ; 
              if (isset($this->indicadores_nombre_Old))
              {
                 $this->quebra_indicadores_nombre_agrupar_top() ; 
              }
              if (isset($this->variables_id_variable_Old))
              {
                 $this->quebra_variables_id_variable_agrupar_top() ; 
              }
              if (isset($this->variables_descripcion_Old))
              {
                 $this->quebra_variables_descripcion_agrupar_top() ; 
              }
          } 
          if ($this->variables_id_variable !== $this->variables_id_variable_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['SC_Ind_Groupby'] == "agrupar") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$this->Print_All)
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->variables_descripcion_Old = $this->variables_descripcion ; 
              $this->quebra_variables_descripcion_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre, $this->variables_id_variable, $this->variables_descripcion) ; 
              $this->variables_id_variable_Old = $this->variables_id_variable ; 
              $this->quebra_variables_id_variable_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre, $this->variables_id_variable) ; 
              if (isset($this->variables_id_variable_Old))
              {
                 $this->quebra_variables_id_variable_agrupar_top() ; 
              }
              if (isset($this->variables_descripcion_Old))
              {
                 $this->quebra_variables_descripcion_agrupar_top() ; 
              }
          } 
          if ($this->variables_descripcion !== $this->variables_descripcion_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['SC_Ind_Groupby'] == "agrupar") 
          {  
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$this->Print_All)
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->variables_descripcion_Old = $this->variables_descripcion ; 
              $this->quebra_variables_descripcion_agrupar($this->dimension_id_dimension, $this->dimension_descripcion, $this->tematica_id_tematica, $this->tematica_descripcion, $this->indicadores_id_indicadores, $this->indicadores_nombre, $this->variables_id_variable, $this->variables_descripcion) ; 
              if (isset($this->variables_descripcion_Old))
              {
                 $this->quebra_variables_descripcion_agrupar_top() ; 
              }
          } 
          $this->sc_proc_grid = true;
          $nm_inicio_pag++;
          if (!$this->NM_flag_antigo)
          {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['final']++ ; 
          }
          $seq_det =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['final']; 
          $this->Ini->cor_link_dados = ($this->Ini->cor_link_dados == $this->css_scGridFieldOddLink) ? $this->css_scGridFieldEvenLink : $this->css_scGridFieldOddLink; 
          $this->Ini->qual_linha   = ($this->Ini->qual_linha == "par") ? "impar" : "par";
          if ("impar" == $this->Ini->qual_linha)
          {
              $this->css_line_back = $this->css_scGridFieldOdd;
              $this->css_line_fonf = $this->css_scGridFieldOddFont;
          }
          else
          {
              $this->css_line_back = $this->css_scGridFieldEven;
              $this->css_line_fonf = $this->css_scGridFieldEvenFont;
          }
          $NM_destaque = " onmouseover=\"over_tr(this, '" . $this->css_line_back . "');\" onmouseout=\"out_tr(this, '" . $this->css_line_back . "');\" onclick=\"click_tr(this, '" . $this->css_line_back . "');\"";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_grid'])
          {
             $NM_destaque ="";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_psq'])
          {
              $temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['dado_psq_ret'];
              eval("\$teste = \$this->$temp;");
          }
          $nm_saida->saida("    <TR  class=\"" . $this->css_line_back . "\"" . $NM_destaque . ">\r\n");
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">&nbsp;</TD>\r\n");
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_psq']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"left\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\">\r\n");
 $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcapture", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "", "Rad_psq", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
          $nm_saida->saida(" $Cod_Btn</TD>\r\n");
 } 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['field_order'] as $Cada_col)
          { 
              $NM_func_grid = "NM_grid_" . $Cada_col;
              $this->$NM_func_grid();
          } 
          $nm_saida->saida("</TR>\r\n");
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_grid'] && $this->nm_prim_linha)
          { 
              $nm_saida->saida("##NM@@"); 
              $this->nm_prim_linha = false; 
          } 
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" || isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_liga']['paginacao']))
          { 
              $nm_quant_linhas = 0; 
          } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
   { 
      $this->Lin_final = $this->rs_grid->EOF;
      if ($this->Lin_final)
      {
         $this->rs_grid->Close();
      }
   } 
   else
   {
      $this->rs_grid->Close();
   }
   if ($this->rs_grid->EOF) 
   { 
  
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['exibe_total'] == "S")
       { 
           $this->quebra_geral_top() ;
       } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_grid'])
   {
       $nm_saida->saida("X##NM@@X");
   }
   $nm_saida->saida("</TABLE>");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_psq'])
   { 
          $nm_saida->saida("       </form>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
   { 
       $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   $nm_saida->saida("</TD>");
   $nm_saida->saida($fecha_tr);
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_grid'])
   { 
       return; 
   } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
       { 
            $this->nmgp_embbed_placeholder_bot();
            $this->nmgp_barra_bot();
       } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf")
   { 
      $this->Res->finaliza_arrays();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['SC_Ind_Groupby'] == "agrupar")
      {
          ksort($this->Res->array_total_dimension_id_dimension);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['arr_total']['dimension_id_dimension'] = $this->Res->array_total_dimension_id_dimension;
          ksort($this->Res->array_total_dimension_descripcion);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['arr_total']['dimension_descripcion'] = $this->Res->array_total_dimension_descripcion;
          ksort($this->Res->array_total_tematica_id_tematica);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['arr_total']['tematica_id_tematica'] = $this->Res->array_total_tematica_id_tematica;
          ksort($this->Res->array_total_tematica_descripcion);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['arr_total']['tematica_descripcion'] = $this->Res->array_total_tematica_descripcion;
          ksort($this->Res->array_total_indicadores_id_indicadores);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['arr_total']['indicadores_id_indicadores'] = $this->Res->array_total_indicadores_id_indicadores;
          ksort($this->Res->array_total_indicadores_nombre);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['arr_total']['indicadores_nombre'] = $this->Res->array_total_indicadores_nombre;
          ksort($this->Res->array_total_variables_id_variable);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['arr_total']['variables_id_variable'] = $this->Res->array_total_variables_id_variable;
          ksort($this->Res->array_total_variables_descripcion);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['arr_total']['variables_descripcion'] = $this->Res->array_total_variables_descripcion;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['contr_array_resumo'] = "OK";
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
   { 
       $_SESSION['scriptcase']['contr_link_emb'] = "";   
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
   {
       $nm_saida->saida("</TABLE>\r\n");
   }
   if ($this->Print_All) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao']       = "igual" ; 
   } 
 }
 function NM_grid_dimension_id_dimension()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['dimension_id_dimension']) || $this->NM_cmp_hidden['dimension_id_dimension'] != "off") { 
          $conteudo = $this->dimension_id_dimension; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"right\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_dimension_id_dimension_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_dimension_descripcion()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['dimension_descripcion']) || $this->NM_cmp_hidden['dimension_descripcion'] != "off") { 
          $conteudo = $this->dimension_descripcion; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"   align=\"left\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_dimension_descripcion_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_tematica_id_tematica()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['tematica_id_tematica']) || $this->NM_cmp_hidden['tematica_id_tematica'] != "off") { 
          $conteudo = $this->tematica_id_tematica; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"right\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_tematica_id_tematica_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_tematica_descripcion()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['tematica_descripcion']) || $this->NM_cmp_hidden['tematica_descripcion'] != "off") { 
          $conteudo = $this->tematica_descripcion; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"   align=\"left\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_tematica_descripcion_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_indicadores_id_indicadores()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['indicadores_id_indicadores']) || $this->NM_cmp_hidden['indicadores_id_indicadores'] != "off") { 
          $conteudo = $this->indicadores_id_indicadores; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"right\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_indicadores_id_indicadores_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_indicadores_nombre()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['indicadores_nombre']) || $this->NM_cmp_hidden['indicadores_nombre'] != "off") { 
          $conteudo = $this->indicadores_nombre; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"   align=\"left\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_indicadores_nombre_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_variables_id_variable()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['variables_id_variable']) || $this->NM_cmp_hidden['variables_id_variable'] != "off") { 
          $conteudo = $this->variables_id_variable; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"right\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_variables_id_variable_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_variables_descripcion()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['variables_descripcion']) || $this->NM_cmp_hidden['variables_descripcion'] != "off") { 
          $conteudo = $this->variables_descripcion; 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"   align=\"left\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_variables_descripcion_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_calc_span()
 {
   $this->NM_colspan  = 9;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_psq'])
   {
       $this->NM_colspan++;
   }
   foreach ($this->NM_cmp_hidden as $Cmp => $Hidden)
   {
       if ($Hidden == "off")
       {
           $this->NM_colspan--;
       }
   }
 }
 function nm_quebra_pagina($nm_parms)
 {
    global $nm_saida;
    if ($this->nmgp_prim_pag_pdf && $nm_parms == "pagina")
    {
        $this->nmgp_prim_pag_pdf = false;
        return;
    }
    $this->Ini->nm_cont_lin++;
    if (($this->Ini->nm_limite_lin > 0 && $this->Ini->nm_cont_lin > $this->Ini->nm_limite_lin) || $nm_parms == "pagina" || $nm_parms == "resumo" || $nm_parms == "total")
    {
        $nm_saida->saida("</TABLE></TD></TR>\r\n");
        $this->Ini->nm_cont_lin = ($nm_parms == "pagina") ? 0 : 1;
        if ($this->Print_All)
        {
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['print_navigator']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['print_navigator'] == "Netscape")
            {
                $nm_saida->saida("</TABLE><TABLE id=\"main_table_grid\" class=\"scGridBorder\" style=\"page-break-before:always;\" align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
            }
            else
            {
                $nm_saida->saida("</TABLE><TABLE id=\"main_table_grid\" class=\"scGridBorder\" style=\"page-break-before:always;\" align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
            }
        }
        else
        {
            $nm_saida->saida("<tr><td style=\"border-width:0;height:1px;padding:0\"><span style=\"display: none;\">&nbsp;</span><div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></td></tr>\r\n");
        }
        if ($nm_parms != "resumo" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
        {
            $this->cabecalho();
        }
        $nm_saida->saida(" <TR> \r\n");
        $nm_saida->saida("  <TD style=\"padding: 0px; vertical-align: top;\"> \r\n");
   $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
        if ($nm_parms != "resumo")
        {
            $this->label_grid();
        }
    }
 }
 function quebra_dimension_id_dimension_agrupar($dimension_id_dimension) 
 {
   global
          $tot_dimension_id_dimension;
   $this->sc_proc_quebra_dimension_descripcion = false;
   $this->sc_proc_quebra_tematica_id_tematica = false;
   $this->sc_proc_quebra_tematica_descripcion = false;
   $this->sc_proc_quebra_indicadores_id_indicadores = false;
   $this->sc_proc_quebra_indicadores_nombre = false;
   $this->sc_proc_quebra_variables_id_variable = false;
   $this->sc_proc_quebra_variables_descripcion = false;
   $this->sc_proc_quebra_dimension_id_dimension = true; 
   $this->Tot->quebra_dimension_id_dimension_agrupar($dimension_id_dimension, $this->arg_sum_dimension_id_dimension);
   $conteudo = $tot_dimension_id_dimension[0] ;  
   $this->count_dimension_id_dimension = $tot_dimension_id_dimension[1];
   $this->campos_quebra_dimension_id_dimension = array(); 
   $conteudo = $this->dimension_id_dimension; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
   $this->campos_quebra_dimension_id_dimension[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['dimension_id_dimension']))
   {
       $this->campos_quebra_dimension_id_dimension[0]['lab'] = $this->nmgp_label_quebras['dimension_id_dimension']; 
   }
   else
   {
       $this->campos_quebra_dimension_id_dimension[0]['lab'] = "Id Dimension"; 
   }
   $this->sc_proc_quebra_dimension_id_dimension = false; 
 } 
 function quebra_dimension_descripcion_agrupar($dimension_id_dimension, $dimension_descripcion) 
 {
   global
          $tot_dimension_descripcion;
   $this->sc_proc_quebra_dimension_id_dimension = false;
   $this->sc_proc_quebra_tematica_id_tematica = false;
   $this->sc_proc_quebra_tematica_descripcion = false;
   $this->sc_proc_quebra_indicadores_id_indicadores = false;
   $this->sc_proc_quebra_indicadores_nombre = false;
   $this->sc_proc_quebra_variables_id_variable = false;
   $this->sc_proc_quebra_variables_descripcion = false;
   $this->sc_proc_quebra_dimension_descripcion = true; 
   $this->Tot->quebra_dimension_descripcion_agrupar($dimension_id_dimension, $dimension_descripcion, $this->arg_sum_dimension_id_dimension, $this->arg_sum_dimension_descripcion);
   $conteudo = $tot_dimension_descripcion[0] ;  
   $this->count_dimension_descripcion = $tot_dimension_descripcion[1];
   $this->campos_quebra_dimension_descripcion = array(); 
   $conteudo = $this->dimension_descripcion; 
   $this->campos_quebra_dimension_descripcion[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['dimension_descripcion']))
   {
       $this->campos_quebra_dimension_descripcion[0]['lab'] = $this->nmgp_label_quebras['dimension_descripcion']; 
   }
   else
   {
       $this->campos_quebra_dimension_descripcion[0]['lab'] = "Descripcion"; 
   }
   $this->sc_proc_quebra_dimension_descripcion = false; 
 } 
 function quebra_tematica_id_tematica_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica) 
 {
   global
          $tot_tematica_id_tematica;
   $this->sc_proc_quebra_dimension_id_dimension = false;
   $this->sc_proc_quebra_dimension_descripcion = false;
   $this->sc_proc_quebra_tematica_descripcion = false;
   $this->sc_proc_quebra_indicadores_id_indicadores = false;
   $this->sc_proc_quebra_indicadores_nombre = false;
   $this->sc_proc_quebra_variables_id_variable = false;
   $this->sc_proc_quebra_variables_descripcion = false;
   $this->sc_proc_quebra_tematica_id_tematica = true; 
   $this->Tot->quebra_tematica_id_tematica_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica, $this->arg_sum_dimension_id_dimension, $this->arg_sum_dimension_descripcion, $this->arg_sum_tematica_id_tematica);
   $conteudo = $tot_tematica_id_tematica[0] ;  
   $this->count_tematica_id_tematica = $tot_tematica_id_tematica[1];
   $this->campos_quebra_tematica_id_tematica = array(); 
   $conteudo = $this->tematica_id_tematica; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
   $this->campos_quebra_tematica_id_tematica[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['tematica_id_tematica']))
   {
       $this->campos_quebra_tematica_id_tematica[0]['lab'] = $this->nmgp_label_quebras['tematica_id_tematica']; 
   }
   else
   {
       $this->campos_quebra_tematica_id_tematica[0]['lab'] = "Id Tematica"; 
   }
   $this->sc_proc_quebra_tematica_id_tematica = false; 
 } 
 function quebra_tematica_descripcion_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica, $tematica_descripcion) 
 {
   global
          $tot_tematica_descripcion;
   $this->sc_proc_quebra_dimension_id_dimension = false;
   $this->sc_proc_quebra_dimension_descripcion = false;
   $this->sc_proc_quebra_tematica_id_tematica = false;
   $this->sc_proc_quebra_indicadores_id_indicadores = false;
   $this->sc_proc_quebra_indicadores_nombre = false;
   $this->sc_proc_quebra_variables_id_variable = false;
   $this->sc_proc_quebra_variables_descripcion = false;
   $this->sc_proc_quebra_tematica_descripcion = true; 
   $this->Tot->quebra_tematica_descripcion_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica, $tematica_descripcion, $this->arg_sum_dimension_id_dimension, $this->arg_sum_dimension_descripcion, $this->arg_sum_tematica_id_tematica, $this->arg_sum_tematica_descripcion);
   $conteudo = $tot_tematica_descripcion[0] ;  
   $this->count_tematica_descripcion = $tot_tematica_descripcion[1];
   $this->campos_quebra_tematica_descripcion = array(); 
   $conteudo = $this->tematica_descripcion; 
   $this->campos_quebra_tematica_descripcion[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['tematica_descripcion']))
   {
       $this->campos_quebra_tematica_descripcion[0]['lab'] = $this->nmgp_label_quebras['tematica_descripcion']; 
   }
   else
   {
       $this->campos_quebra_tematica_descripcion[0]['lab'] = "Descripcion"; 
   }
   $this->sc_proc_quebra_tematica_descripcion = false; 
 } 
 function quebra_indicadores_id_indicadores_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica, $tematica_descripcion, $indicadores_id_indicadores) 
 {
   global
          $tot_indicadores_id_indicadores;
   $this->sc_proc_quebra_dimension_id_dimension = false;
   $this->sc_proc_quebra_dimension_descripcion = false;
   $this->sc_proc_quebra_tematica_id_tematica = false;
   $this->sc_proc_quebra_tematica_descripcion = false;
   $this->sc_proc_quebra_indicadores_nombre = false;
   $this->sc_proc_quebra_variables_id_variable = false;
   $this->sc_proc_quebra_variables_descripcion = false;
   $this->sc_proc_quebra_indicadores_id_indicadores = true; 
   $this->Tot->quebra_indicadores_id_indicadores_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica, $tematica_descripcion, $indicadores_id_indicadores, $this->arg_sum_dimension_id_dimension, $this->arg_sum_dimension_descripcion, $this->arg_sum_tematica_id_tematica, $this->arg_sum_tematica_descripcion, $this->arg_sum_indicadores_id_indicadores);
   $conteudo = $tot_indicadores_id_indicadores[0] ;  
   $this->count_indicadores_id_indicadores = $tot_indicadores_id_indicadores[1];
   $this->campos_quebra_indicadores_id_indicadores = array(); 
   $conteudo = $this->indicadores_id_indicadores; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
   $this->campos_quebra_indicadores_id_indicadores[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['indicadores_id_indicadores']))
   {
       $this->campos_quebra_indicadores_id_indicadores[0]['lab'] = $this->nmgp_label_quebras['indicadores_id_indicadores']; 
   }
   else
   {
       $this->campos_quebra_indicadores_id_indicadores[0]['lab'] = "Id Indicadores"; 
   }
   $this->sc_proc_quebra_indicadores_id_indicadores = false; 
 } 
 function quebra_indicadores_nombre_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica, $tematica_descripcion, $indicadores_id_indicadores, $indicadores_nombre) 
 {
   global
          $tot_indicadores_nombre;
   $this->sc_proc_quebra_dimension_id_dimension = false;
   $this->sc_proc_quebra_dimension_descripcion = false;
   $this->sc_proc_quebra_tematica_id_tematica = false;
   $this->sc_proc_quebra_tematica_descripcion = false;
   $this->sc_proc_quebra_indicadores_id_indicadores = false;
   $this->sc_proc_quebra_variables_id_variable = false;
   $this->sc_proc_quebra_variables_descripcion = false;
   $this->sc_proc_quebra_indicadores_nombre = true; 
   $this->Tot->quebra_indicadores_nombre_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica, $tematica_descripcion, $indicadores_id_indicadores, $indicadores_nombre, $this->arg_sum_dimension_id_dimension, $this->arg_sum_dimension_descripcion, $this->arg_sum_tematica_id_tematica, $this->arg_sum_tematica_descripcion, $this->arg_sum_indicadores_id_indicadores, $this->arg_sum_indicadores_nombre);
   $conteudo = $tot_indicadores_nombre[0] ;  
   $this->count_indicadores_nombre = $tot_indicadores_nombre[1];
   $this->campos_quebra_indicadores_nombre = array(); 
   $conteudo = $this->indicadores_nombre; 
   $this->campos_quebra_indicadores_nombre[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['indicadores_nombre']))
   {
       $this->campos_quebra_indicadores_nombre[0]['lab'] = $this->nmgp_label_quebras['indicadores_nombre']; 
   }
   else
   {
       $this->campos_quebra_indicadores_nombre[0]['lab'] = "Nombre"; 
   }
   $this->sc_proc_quebra_indicadores_nombre = false; 
 } 
 function quebra_variables_id_variable_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica, $tematica_descripcion, $indicadores_id_indicadores, $indicadores_nombre, $variables_id_variable) 
 {
   global
          $tot_variables_id_variable;
   $this->sc_proc_quebra_dimension_id_dimension = false;
   $this->sc_proc_quebra_dimension_descripcion = false;
   $this->sc_proc_quebra_tematica_id_tematica = false;
   $this->sc_proc_quebra_tematica_descripcion = false;
   $this->sc_proc_quebra_indicadores_id_indicadores = false;
   $this->sc_proc_quebra_indicadores_nombre = false;
   $this->sc_proc_quebra_variables_descripcion = false;
   $this->sc_proc_quebra_variables_id_variable = true; 
   $this->Tot->quebra_variables_id_variable_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica, $tematica_descripcion, $indicadores_id_indicadores, $indicadores_nombre, $variables_id_variable, $this->arg_sum_dimension_id_dimension, $this->arg_sum_dimension_descripcion, $this->arg_sum_tematica_id_tematica, $this->arg_sum_tematica_descripcion, $this->arg_sum_indicadores_id_indicadores, $this->arg_sum_indicadores_nombre, $this->arg_sum_variables_id_variable);
   $conteudo = $tot_variables_id_variable[0] ;  
   $this->count_variables_id_variable = $tot_variables_id_variable[1];
   $this->campos_quebra_variables_id_variable = array(); 
   $conteudo = $this->variables_id_variable; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
   $this->campos_quebra_variables_id_variable[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['variables_id_variable']))
   {
       $this->campos_quebra_variables_id_variable[0]['lab'] = $this->nmgp_label_quebras['variables_id_variable']; 
   }
   else
   {
       $this->campos_quebra_variables_id_variable[0]['lab'] = "Id Variable"; 
   }
   $this->sc_proc_quebra_variables_id_variable = false; 
 } 
 function quebra_variables_descripcion_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica, $tematica_descripcion, $indicadores_id_indicadores, $indicadores_nombre, $variables_id_variable, $variables_descripcion) 
 {
   global
          $tot_variables_descripcion;
   $this->sc_proc_quebra_dimension_id_dimension = false;
   $this->sc_proc_quebra_dimension_descripcion = false;
   $this->sc_proc_quebra_tematica_id_tematica = false;
   $this->sc_proc_quebra_tematica_descripcion = false;
   $this->sc_proc_quebra_indicadores_id_indicadores = false;
   $this->sc_proc_quebra_indicadores_nombre = false;
   $this->sc_proc_quebra_variables_id_variable = false;
   $this->sc_proc_quebra_variables_descripcion = true; 
   $this->Tot->quebra_variables_descripcion_agrupar($dimension_id_dimension, $dimension_descripcion, $tematica_id_tematica, $tematica_descripcion, $indicadores_id_indicadores, $indicadores_nombre, $variables_id_variable, $variables_descripcion, $this->arg_sum_dimension_id_dimension, $this->arg_sum_dimension_descripcion, $this->arg_sum_tematica_id_tematica, $this->arg_sum_tematica_descripcion, $this->arg_sum_indicadores_id_indicadores, $this->arg_sum_indicadores_nombre, $this->arg_sum_variables_id_variable, $this->arg_sum_variables_descripcion);
   $conteudo = $tot_variables_descripcion[0] ;  
   $this->count_variables_descripcion = $tot_variables_descripcion[1];
   $this->campos_quebra_variables_descripcion = array(); 
   $conteudo = $this->variables_descripcion; 
   $this->campos_quebra_variables_descripcion[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['variables_descripcion']))
   {
       $this->campos_quebra_variables_descripcion[0]['lab'] = $this->nmgp_label_quebras['variables_descripcion']; 
   }
   else
   {
       $this->campos_quebra_variables_descripcion[0]['lab'] = "Descripcion"; 
   }
   $this->sc_proc_quebra_variables_descripcion = false; 
 } 
 function quebra_dimension_id_dimension_agrupar_top() 
 { global
          $dimension_id_dimension_ant_desc, 
          $nm_saida, $tot_dimension_id_dimension; 
   $this->SC_tab_quebra = 0;
   $dimension_id_dimension_ant_desc = $this->campos_quebra_dimension_id_dimension[0]['cmp'];
   static $cont_quebra_dimension_id_dimension = 0; 
   $cont_quebra_dimension_id_dimension++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_dimension_id_dimension[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_dimension_id_dimension[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 20px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
   }
   $colspan = $this->NM_colspan;
   $this->Label_dimension_id_dimension = "<table>"; 
   foreach ($this->campos_quebra_dimension_id_dimension as $cada_campo) 
   { 
       $this->Label_dimension_id_dimension .= "<tr>"; 
       if ($this->SC_tab_quebra > 0)
       {
           $this->Label_dimension_id_dimension .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_dimension_id_dimension .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_dimension_id_dimension .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_dimension_id_dimension .= "</tr>"; 
   } 
   $this->Label_dimension_id_dimension .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " align=\"left\">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_dimension_id_dimension . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_dimension_descripcion_agrupar_top() 
 { global
          $dimension_descripcion_ant_desc, 
          $nm_saida, $tot_dimension_descripcion; 
   $this->SC_tab_quebra = 10;
   $dimension_descripcion_ant_desc = $this->campos_quebra_dimension_descripcion[0]['cmp'];
   static $cont_quebra_dimension_descripcion = 0; 
   $cont_quebra_dimension_descripcion++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H3 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_dimension_descripcion[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H3></div>";
   }
   $conteudo = $tot_dimension_descripcion[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 20px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
   }
   $colspan = $this->NM_colspan;
   $this->Label_dimension_descripcion = "<table>"; 
   foreach ($this->campos_quebra_dimension_descripcion as $cada_campo) 
   { 
       $this->Label_dimension_descripcion .= "<tr>"; 
       if ($this->SC_tab_quebra > 0)
       {
           $this->Label_dimension_descripcion .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_dimension_descripcion .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_dimension_descripcion .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_dimension_descripcion .= "</tr>"; 
   } 
   $this->Label_dimension_descripcion .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"   " . "colspan=\"" . $colspan . "\"" . " align=\"left\">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_dimension_descripcion . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_tematica_id_tematica_agrupar_top() 
 { global
          $tematica_id_tematica_ant_desc, 
          $nm_saida, $tot_tematica_id_tematica; 
   $this->SC_tab_quebra = 20;
   $tematica_id_tematica_ant_desc = $this->campos_quebra_tematica_id_tematica[0]['cmp'];
   static $cont_quebra_tematica_id_tematica = 0; 
   $cont_quebra_tematica_id_tematica++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H4 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_tematica_id_tematica[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H4></div>";
   }
   $conteudo = $tot_tematica_id_tematica[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 20px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
   }
   $colspan = $this->NM_colspan;
   $this->Label_tematica_id_tematica = "<table>"; 
   foreach ($this->campos_quebra_tematica_id_tematica as $cada_campo) 
   { 
       $this->Label_tematica_id_tematica .= "<tr>"; 
       if ($this->SC_tab_quebra > 0)
       {
           $this->Label_tematica_id_tematica .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_tematica_id_tematica .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_tematica_id_tematica .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_tematica_id_tematica .= "</tr>"; 
   } 
   $this->Label_tematica_id_tematica .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " align=\"left\">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_tematica_id_tematica . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_tematica_descripcion_agrupar_top() 
 { global
          $tematica_descripcion_ant_desc, 
          $nm_saida, $tot_tematica_descripcion; 
   $this->SC_tab_quebra = 30;
   $tematica_descripcion_ant_desc = $this->campos_quebra_tematica_descripcion[0]['cmp'];
   static $cont_quebra_tematica_descripcion = 0; 
   $cont_quebra_tematica_descripcion++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H5 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_tematica_descripcion[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H5></div>";
   }
   $conteudo = $tot_tematica_descripcion[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 20px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
   }
   $colspan = $this->NM_colspan;
   $this->Label_tematica_descripcion = "<table>"; 
   foreach ($this->campos_quebra_tematica_descripcion as $cada_campo) 
   { 
       $this->Label_tematica_descripcion .= "<tr>"; 
       if ($this->SC_tab_quebra > 0)
       {
           $this->Label_tematica_descripcion .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_tematica_descripcion .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_tematica_descripcion .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_tematica_descripcion .= "</tr>"; 
   } 
   $this->Label_tematica_descripcion .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"   " . "colspan=\"" . $colspan . "\"" . " align=\"left\">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_tematica_descripcion . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_indicadores_id_indicadores_agrupar_top() 
 { global
          $indicadores_id_indicadores_ant_desc, 
          $nm_saida, $tot_indicadores_id_indicadores; 
   $this->SC_tab_quebra = 40;
   $indicadores_id_indicadores_ant_desc = $this->campos_quebra_indicadores_id_indicadores[0]['cmp'];
   static $cont_quebra_indicadores_id_indicadores = 0; 
   $cont_quebra_indicadores_id_indicadores++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H6 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_indicadores_id_indicadores[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H6></div>";
   }
   $conteudo = $tot_indicadores_id_indicadores[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 20px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
   }
   $colspan = $this->NM_colspan;
   $this->Label_indicadores_id_indicadores = "<table>"; 
   foreach ($this->campos_quebra_indicadores_id_indicadores as $cada_campo) 
   { 
       $this->Label_indicadores_id_indicadores .= "<tr>"; 
       if ($this->SC_tab_quebra > 0)
       {
           $this->Label_indicadores_id_indicadores .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_indicadores_id_indicadores .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_indicadores_id_indicadores .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_indicadores_id_indicadores .= "</tr>"; 
   } 
   $this->Label_indicadores_id_indicadores .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " align=\"left\">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_indicadores_id_indicadores . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_indicadores_nombre_agrupar_top() 
 { global
          $indicadores_nombre_ant_desc, 
          $nm_saida, $tot_indicadores_nombre; 
   $this->SC_tab_quebra = 50;
   $indicadores_nombre_ant_desc = $this->campos_quebra_indicadores_nombre[0]['cmp'];
   static $cont_quebra_indicadores_nombre = 0; 
   $cont_quebra_indicadores_nombre++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$this->Print_All)
   {
   }
   $conteudo = $tot_indicadores_nombre[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 20px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
   }
   $colspan = $this->NM_colspan;
   $this->Label_indicadores_nombre = "<table>"; 
   foreach ($this->campos_quebra_indicadores_nombre as $cada_campo) 
   { 
       $this->Label_indicadores_nombre .= "<tr>"; 
       if ($this->SC_tab_quebra > 0)
       {
           $this->Label_indicadores_nombre .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_indicadores_nombre .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_indicadores_nombre .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_indicadores_nombre .= "</tr>"; 
   } 
   $this->Label_indicadores_nombre .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"   " . "colspan=\"" . $colspan . "\"" . " align=\"left\">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_indicadores_nombre . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_variables_id_variable_agrupar_top() 
 { global
          $variables_id_variable_ant_desc, 
          $nm_saida, $tot_variables_id_variable; 
   $this->SC_tab_quebra = 60;
   $variables_id_variable_ant_desc = $this->campos_quebra_variables_id_variable[0]['cmp'];
   static $cont_quebra_variables_id_variable = 0; 
   $cont_quebra_variables_id_variable++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$this->Print_All)
   {
   }
   $conteudo = $tot_variables_id_variable[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 20px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
   }
   $colspan = $this->NM_colspan;
   $this->Label_variables_id_variable = "<table>"; 
   foreach ($this->campos_quebra_variables_id_variable as $cada_campo) 
   { 
       $this->Label_variables_id_variable .= "<tr>"; 
       if ($this->SC_tab_quebra > 0)
       {
           $this->Label_variables_id_variable .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_variables_id_variable .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_variables_id_variable .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_variables_id_variable .= "</tr>"; 
   } 
   $this->Label_variables_id_variable .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " align=\"left\">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_variables_id_variable . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_variables_descripcion_agrupar_top() 
 { global
          $variables_descripcion_ant_desc, 
          $nm_saida, $tot_variables_descripcion; 
   $this->SC_tab_quebra = 70;
   $variables_descripcion_ant_desc = $this->campos_quebra_variables_descripcion[0]['cmp'];
   static $cont_quebra_variables_descripcion = 0; 
   $cont_quebra_variables_descripcion++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" && !$this->Print_All)
   {
   }
   $conteudo = $tot_variables_descripcion[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 20px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
   }
   $colspan = $this->NM_colspan;
   $this->Label_variables_descripcion = "<table>"; 
   foreach ($this->campos_quebra_variables_descripcion as $cada_campo) 
   { 
       $this->Label_variables_descripcion .= "<tr>"; 
       if ($this->SC_tab_quebra > 0)
       {
           $this->Label_variables_descripcion .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_variables_descripcion .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_variables_descripcion .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_variables_descripcion .= "</tr>"; 
   } 
   $this->Label_variables_descripcion .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"   " . "colspan=\"" . $colspan . "\"" . " align=\"left\">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_variables_descripcion . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_geral_top() 
 {
   global $nm_saida; 
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
   function nmgp_barra_top()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn = false;
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_top\" name=\"F0_top\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_top\" name=\"sc_truta_f0_top\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_top\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=hidden id=\"script_session_f0_top\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/>\r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_top\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr>\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_top\"  class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao_print'] != "print") 
      {
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['fast_search'][2] : "";
          $nm_saida->saida("           <script type=\"text/javascript\">var change_fast_top = \"\";</script>\r\n");
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
          {
              $this->Ini->Arr_result['setVar'][] = array('var' => 'change_fast_top', 'value' => "");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_cmp))
          {
              $OPC_cmp = NM_conv_charset($OPC_cmp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_arg))
          {
              $OPC_arg = NM_conv_charset($OPC_arg, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_dat))
          {
              $OPC_dat = NM_conv_charset($OPC_dat, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $nm_saida->saida("          <input type=\"hidden\"  id=\"fast_search_f0_top\" name=\"nmgp_fast_search\" value=\"SC_all_Cmp\">\r\n");
          $nm_saida->saida("          <input type=\"hidden\" id=\"cond_fast_search_f0_top\" name=\"nmgp_cond_fast_search\" value=\"qp\">\r\n");
          $nm_saida->saida("          <script type=\"text/javascript\">var scQSInitVal = \"" . $OPC_dat . "\";</script>\r\n");
          $nm_saida->saida("          <span id=\"quicksearchph_top\">\r\n");
          $nm_saida->saida("           <input type=\"text\" id=\"SC_fast_search_top\" class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;\" name=\"nmgp_arg_fast_search\" value=\"" . NM_encode_input($OPC_dat) . "\" size=\"10\" onChange=\"change_fast_top = 'CH';\" alt=\"{watermark:'" . $this->Ini->Nm_lang['lang_othr_qk_watermark'] . "', watermarkClass:'css_toolbar_objWm', maxLength: 255}\">\r\n");
          $nm_saida->saida("           <img style=\"display: none\" id=\"SC_fast_search_close_top\" src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_clean . "\" onclick=\"document.getElementById('SC_fast_search_top').value = ''; nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("           <img style=\"display: none\" id=\"SC_fast_search_submit_top\" src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_search . "\" onclick=\"nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("          </span>\r\n");
          $NM_btn = true;
      }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
      if ($this->nmgp_botoes['sel_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $path_fields = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/fields/";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcolumns", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_indicadores_1_1/grid_indicadores_1_1_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&embbed_groupby=Y&toolbar_pos=top', 'top')", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_indicadores_1_1/grid_indicadores_1_1_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&embbed_groupby=Y&toolbar_pos=top', 'top')", "selcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $UseAlias =  "S";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_indicadores_1_1/grid_indicadores_1_1_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&embbed_groupby=Y&toolbar_pos=top', 'top')", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_indicadores_1_1/grid_indicadores_1_1_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&embbed_groupby=Y&toolbar_pos=top', 'top')", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
      if ($this->nmgp_botoes['group_1'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_1_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_1", "scBtnGrpShow('group_1_top')", "scBtnGrpShow('group_1_top')", "sc_btgp_btn_group_1_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn = true;
          $nm_saida->saida("           <table style=\"border-collapse: collapse; border-width: 0; display: none; position: absolute; z-index: 1000\" id=\"sc_btgp_div_group_1_top\">\r\n");
              $nm_saida->saida("           <tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_indicadores_1_1/grid_indicadores_1_1_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=XX&language=es&conf_socor=S&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['word'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bword", "", "", "word_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_indicadores_1_1/grid_indicadores_1_1_config_word.php?nm_cor=AM&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bexcel", "nm_gp_move('xls', '0')", "nm_gp_move('xls', '0')", "xls_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bxml", "nm_gp_move('xml', '0')", "nm_gp_move('xml', '0')", "xml_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcsv", "nm_gp_move('csv', '0')", "nm_gp_move('csv', '0')", "csv_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "brtf", "nm_gp_move('rtf', '0')", "nm_gp_move('rtf', '0')", "rtf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div class=\"scBtnGrpText\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_indicadores_1_1/grid_indicadores_1_1_config_print.php?nm_opc=AM&nm_cor=AM&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
      }
              $nm_saida->saida("           </td></tr>\r\n");
          $nm_saida->saida("           </table>\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_1_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_1_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_grid))
      {
          if ($NM_btn)
          {
              $NM_btn = false;
              $NM_ult_sep = "NM_sep_1";
              $nm_saida->saida("          <img id=\"NM_sep_1\" src=\"" . $this->Ini->path_img_global . $this->Ini->Img_sep_grid . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
          }
      }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['summary'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
          {
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bresumo", "nm_gp_move('resumo', '0')", "nm_gp_move('resumo', '0')", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
                  $NM_btn = true;
          }
          if (is_file("grid_indicadores_1_1_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_indicadores_1_1_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "help_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['b_sair'] || $this->grid_emb_form)
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_psq'])
      {
         if ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") 
         { 
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='$nm_url_saida'; document.F5.submit()", "document.F5.action='$nm_url_saida'; document.F5.submit()", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
            $nm_saida->saida("           $Cod_Btn \r\n");
            $NM_btn = true;
         } 
         elseif (!$this->Ini->SC_Link_View && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") 
         { 
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsair", "document.F5.action='$nm_url_saida'; document.F5.submit()", "document.F5.action='$nm_url_saida'; document.F5.submit()", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
            $nm_saida->saida("           $Cod_Btn \r\n");
            $NM_btn = true;
         } 
      }
      elseif ($this->nmgp_botoes['exit'] == "on")
      {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['sc_modal'])
        {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "self.parent.tb_remove()", "self.parent.tb_remove()", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
        }
        else
        {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "window.close()", "window.close()", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
        }
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
      }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_top', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_bot()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn = false;
      $this->NM_calc_span();
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_bot\" name=\"F0_bot\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_bot\" name=\"sc_truta_f0_bot\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_bot\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=hidden id=\"script_session_f0_bot\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/>\r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_bot\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr>\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_bot\" class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao_print'] == "print")
      {
      } 
      else 
      {
          if (empty($this->nm_grid_sem_reg) && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_liga']['paginacao']))
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_lin_grid'];
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "birpara", "var rec_nav = ((document.getElementById('rec_f0_bot').value - 1) * " . NM_encode_input($Reg_Page) . ") + 1; nm_gp_submit_ajax('muda_rec_linhas', rec_nav)", "var rec_nav = ((document.getElementById('rec_f0_bot').value - 1) * " . NM_encode_input($Reg_Page) . ") + 1; nm_gp_submit_ajax('muda_rec_linhas', rec_nav)", "brec_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $Page_Atu   = ceil($this->nmgp_reg_inicial / $Reg_Page);
              $nm_saida->saida("          <input id=\"rec_f0_bot\" type=\"text\" class=\"" . $this->css_css_toolbar_obj . "\" name=\"rec\" value=\"" . NM_encode_input($Page_Atu) . "\" style=\"width:25px;vertical-align: middle;\"/> \r\n");
              $NM_btn = true;
          }
          if (empty($this->nm_grid_sem_reg) && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_liga']['paginacao']))
          {
              $nm_saida->saida("          <span class=\"" . $this->css_css_toolbar_obj . "\" style=\"border: 0px;vertical-align: middle;\">" . $this->Ini->Nm_lang['lang_btns_rows'] . "</span>\r\n");
              $nm_saida->saida("          <select class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;\" id=\"quant_linhas_f0_bot\" name=\"nmgp_quant_linhas\" onchange=\"sc_ind = document.getElementById('quant_linhas_f0_bot').selectedIndex; nm_gp_submit_ajax('muda_qt_linhas', document.getElementById('quant_linhas_f0_bot').options[sc_ind].value)\"> \r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_lin_grid'] == 10) ? " selected" : "";
              $nm_saida->saida("           <option value=\"10\" " . $obj_sel . ">10</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_lin_grid'] == 20) ? " selected" : "";
              $nm_saida->saida("           <option value=\"20\" " . $obj_sel . ">20</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_lin_grid'] == 50) ? " selected" : "";
              $nm_saida->saida("           <option value=\"50\" " . $obj_sel . ">50</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_lin_grid'] == 100) ? " selected" : "";
              $nm_saida->saida("           <option value=\"100\" " . $obj_sel . ">100</option>\r\n");
              $nm_saida->saida("          </select>\r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['first'] == "on" && empty($this->nm_grid_sem_reg) && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_liga']['nav']))
          {
              if ($this->Rec_ini == 0)
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_inicio_off", "nm_gp_submit_rec('ini')", "nm_gp_submit_rec('ini')", "first_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
              else
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_inicio", "nm_gp_submit_rec('ini')", "nm_gp_submit_rec('ini')", "first_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
                  $NM_btn = true;
          }
          if ($this->nmgp_botoes['back'] == "on" && empty($this->nm_grid_sem_reg) && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_liga']['nav']))
          {
              if ($this->Rec_ini == 0)
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_retorna_off", "nm_gp_submit_rec('" . $this->Rec_ini . "')", "nm_gp_submit_rec('" . $this->Rec_ini . "')", "back_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
              else
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_retorna", "nm_gp_submit_rec('" . $this->Rec_ini . "')", "nm_gp_submit_rec('" . $this->Rec_ini . "')", "back_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
                  $NM_btn = true;
          }
          if (empty($this->nm_grid_sem_reg) && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_liga']['nav']) && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_liga']['paginacao']))
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['qt_lin_grid'];
              $Max_link   = 5;
              $Mid_link   = ceil($Max_link / 2);
              $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
              $Qtd_Pages  = ceil($this->count_ger / $Reg_Page);
              $Page_Atu   = ceil($this->nmgp_reg_final / $Reg_Page);
              $Link_ini   = 1;
              if ($Page_Atu > $Max_link)
              {
                  $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
              }
              elseif ($Page_Atu > $Mid_link)
              {
                  $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
              }
              if (($Qtd_Pages - $Link_ini) < $Max_link)
              {
                  $Link_ini = ($Qtd_Pages - $Max_link) + 1;
              }
              if ($Link_ini < 1)
              {
                  $Link_ini = 1;
              }
              for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
              {
                  $rec = (($Link_ini - 1) * $Reg_Page) + 1;
                  if ($Link_ini == $Page_Atu)
                  {
                      $nm_saida->saida("            <span class=\"scGridToolbarNavOpen\" style=\"vertical-align: middle;\">" . $Link_ini . "</span>\r\n");
                  }
                  else
                  {
                      $nm_saida->saida("            <a class=\"scGridToolbarNav\" style=\"vertical-align: middle;\" href=\"javascript: nm_gp_submit_rec(" . $rec . ")\">" . $Link_ini . "</a>\r\n");
                  }
                  $Link_ini++;
                  if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
                  {
                      $nm_saida->saida("            <img src=\"" . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
                  }
              }
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['forward'] == "on" && empty($this->nm_grid_sem_reg) && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_liga']['nav']))
          {
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_avanca", "nm_gp_submit_rec('" . $this->Rec_fim . "')", "nm_gp_submit_rec('" . $this->Rec_fim . "')", "forward_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['last'] == "on" && empty($this->nm_grid_sem_reg) && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_liga']['nav']))
          {
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_final", "nm_gp_submit_rec('fim')", "nm_gp_submit_rec('fim')", "last_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if (empty($this->nm_grid_sem_reg))
          {
              $nm_sumario = "[" . $this->Ini->Nm_lang['lang_othr_smry_info'] . "]";
              $nm_sumario = str_replace("?start?", $this->nmgp_reg_inicial, $nm_sumario);
              $nm_sumario = str_replace("?final?", $this->nmgp_reg_final, $nm_sumario);
              $nm_sumario = str_replace("?total?", $this->count_ger, $nm_sumario);
              $nm_saida->saida("           <span class=\"" . $this->css_css_toolbar_obj . "\" style=\"border:0px;\">" . $nm_sumario . "</span>\r\n");
              $NM_btn = true;
          }
          if (is_file("grid_indicadores_1_1_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_indicadores_1_1_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_bot', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_embbed_placeholder_top()
   {
      global $nm_saida;
      $nm_saida->saida("     <tr id=\"sc_id_save_grid_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
   }
   function nmgp_embbed_placeholder_bot()
   {
      global $nm_saida;
      $nm_saida->saida("     <tr id=\"sc_id_save_grid_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
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
 function nm_fim_grid($flag_apaga_pdf_log = TRUE)
 {
   global
   $nm_saida, $nm_url_saida, $NMSC_modal;
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']))
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']);
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']);
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
   { 
        return;
   } 
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   </body>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] == "pdf" || $this->Print_All)
   { 
   $nm_saida->saida("   </HTML>\r\n");
        return;
   } 
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['embutida'])
   { 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']))
       {
           $temp = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] as $NM_aplic => $resto)
           {
               $temp[] = $NM_aplic;
           }
           $temp = array_unique($temp);
           foreach ($temp as $NM_aplic)
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
               { 
                   $this->Ini->Arr_result['setArr'][] = array('var' => ' NM_tab_' . $NM_aplic, 'value' => '');
               } 
               $nm_saida->saida("   NM_tab_" . $NM_aplic . " = new Array();\r\n");
           }
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] as $NM_aplic => $resto)
           {
               foreach ($resto as $NM_ind => $NM_quebra)
               {
                   foreach ($NM_quebra as $NM_nivel => $NM_tipo)
                   {
                       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
                       { 
                           $this->Ini->Arr_result['setVar'][] = array('var' => ' NM_tab_' . $NM_aplic . '[' . $NM_ind . ']', 'value' => $NM_tipo . $NM_nivel);
                       } 
                       $nm_saida->saida("   NM_tab_" . $NM_aplic . "[" . $NM_ind . "] = '" . $NM_tipo . $NM_nivel . "';\r\n");
                   }
               }
           }
       }
   }
   $nm_saida->saida("   function NM_liga_tbody(tbody, Obj, Apl)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      Nivel = parseInt (Obj[tbody].substr(3));\r\n");
   $nm_saida->saida("      for (ind = tbody + 1; ind < Obj.length; ind++)\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("           Nv = parseInt (Obj[ind].substr(3));\r\n");
   $nm_saida->saida("           Tp = Obj[ind].substr(0, 3);\r\n");
   $nm_saida->saida("           if (Nivel == Nv && Tp == 'top')\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               break;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           if (((Nivel + 1) == Nv && Tp == 'top') || (Nivel == Nv && Tp == 'bot'))\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.getElementById('tbody_' + Apl + '_' + ind + '_' + Tp).style.display='';\r\n");
   $nm_saida->saida("           } \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function NM_apaga_tbody(tbody, Obj, Apl)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      Nivel = Obj[tbody].substr(3);\r\n");
   $nm_saida->saida("      for (ind = tbody + 1; ind < Obj.length; ind++)\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("           Nv = Obj[ind].substr(3);\r\n");
   $nm_saida->saida("           Tp = Obj[ind].substr(0, 3);\r\n");
   $nm_saida->saida("           if ((Nivel == Nv && Tp == 'top') || Nv < Nivel)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               break;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           if ((Nivel != Nv) || (Nivel == Nv && Tp == 'bot'))\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.getElementById('tbody_' + Apl + '_' + ind + '_' + Tp).style.display='none';\r\n");
   $nm_saida->saida("               if (Tp == 'top')\r\n");
   $nm_saida->saida("               {\r\n");
   $nm_saida->saida("                   document.getElementById('b_open_' + Apl + '_' + ind).style.display='';\r\n");
   $nm_saida->saida("                   document.getElementById('b_close_' + Apl + '_' + ind).style.display='none';\r\n");
   $nm_saida->saida("               } \r\n");
   $nm_saida->saida("           } \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   NM_obj_ant = '';\r\n");
   $nm_saida->saida("   function NM_apaga_div_lig(obj_nome)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      if (NM_obj_ant != '')\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          NM_obj_ant.style.display='none';\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      obj = document.getElementById(obj_nome);\r\n");
   $nm_saida->saida("      NM_obj_ant = obj;\r\n");
   $nm_saida->saida("      ind_time = setTimeout(\"obj.style.display='none'\", 300);\r\n");
   $nm_saida->saida("      return ind_time;\r\n");
   $nm_saida->saida("   }\r\n");
   $str_pbfile = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
   if (@is_file($str_pbfile) && $flag_apaga_pdf_log)
   {
      @unlink($str_pbfile);
   }
   if ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf")
   { 
       $nm_saida->saida("   document.getElementById('first_bot').disabled = true;\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
       {
           $this->Ini->Arr_result['setDisabled'][] = array('field' => 'first_bot', 'value' => "true");
       }
       $nm_saida->saida("   document.getElementById('back_bot').disabled = true;\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
       {
           $this->Ini->Arr_result['setDisabled'][] = array('field' => 'back_bot', 'value' => "true");
       }
   } 
   if ($this->rs_grid->EOF && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf")
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['opc_liga']['nav']))
       { 
           if ($this->arr_buttons['bcons_avanca']['type'] != 'image')
           { 
               $nm_saida->saida("   document.getElementById('forward_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('forward_bot').className = \"scButton_" . $this->arr_buttons['bcons_avanca_off']['style'] . "\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
               {
                   $this->Ini->Arr_result['setDisabled'][] = array('field' => 'forward_bot', 'value' => "true");
                   $this->Ini->Arr_result['setClass'][] = array('field' => 'forward_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_avanca_off']['style']);
               }
               if ($this->arr_buttons['bcons_avanca']['display'] == 'only_img' || $this->arr_buttons['bcons_avanca']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_forward_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca_off']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_forward_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca_off']['image']);
                   }
               } 
           } 
           else 
           { 
               $nm_saida->saida("   document.getElementById('forward_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('id_img_forward_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca_off']['image'] . "\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
               {
                   $this->Ini->Arr_result['setDisabled'][] = array('field' => 'forward_bot', 'value' => "true");
                   $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_forward_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca_off']['image']);
               }
           } 
           if ($this->arr_buttons['bcons_final']['type'] != 'image')
           { 
               $nm_saida->saida("   document.getElementById('last_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('last_bot').className = \"scButton_" . $this->arr_buttons['bcons_final_off']['style'] . "\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
               {
                  $this->Ini->Arr_result['setDisabled'][] = array('field' => 'last_bot', 'value' => "true");
                  $this->Ini->Arr_result['setClass'][] = array('field' => 'last_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_final_off']['style']);
               }
               if ($this->arr_buttons['bcons_final']['display'] == 'only_img' || $this->arr_buttons['bcons_final']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_last_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final_off']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_last_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final_off']['image']);
                   }
               } 
           } 
           else 
           { 
               $nm_saida->saida("   document.getElementById('last_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('id_img_last_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final_off']['image'] . "\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
               {
                   $this->Ini->Arr_result['setDisabled'][] = array('field' => 'last_bot', 'value' => "true");
                   $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_last_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final_off']['image']);
               }
           } 
       } 
       $nm_saida->saida("   nm_gp_fim = \"fim\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_fim', 'value' => "fim");
       }
   }
   else
   {
       $nm_saida->saida("   nm_gp_fim = \"\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_fim', 'value' => "");
       }
   }
   if (isset($this->redir_modal) && !empty($this->redir_modal))
   {
       echo $this->redir_modal;
   }
   $nm_saida->saida("   </script>\r\n");
   if ($this->grid_emb_form)
   {
       $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
       $nm_saida->saida("      parent.scAjaxDetailHeight('grid_indicadores_1_1', $(document).innerHeight());\r\n");
       $nm_saida->saida("   </script>\r\n");
   }
   $nm_saida->saida("   </HTML>\r\n");
 }
//--- 
//--- 
 function form_navegacao()
 {
   global
   $nm_saida, $nm_url_saida;
   $str_pbfile = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
   $nm_saida->saida("   <form name=\"F3\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_chave\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_ordem\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_chave_det\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_quant_linhas\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_url_saida\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tipo_pdf\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_outra_jan\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_orig_pesq\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F4\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"rec\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"rec\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_call_php\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F5\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"grid_indicadores_1_1_pesq.class.php\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F6\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("  <form name=\"Fdoc_word\" method=\"post\" \r\n");
   $nm_saida->saida("        action=\"./\" \r\n");
   $nm_saida->saida("        target=\"_self\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"doc_word\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_cor_word\" value=\"AM\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_navegator_print\" value=\"\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"> \r\n");
   $nm_saida->saida("  </form> \r\n");
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("    document.Fdoc_word.nmgp_navegator_print.value = navigator.appName;\r\n");
   $nm_saida->saida("   function nm_gp_word_conf(cor)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.Fdoc_word.nmgp_cor_word.value = cor;\r\n");
   $nm_saida->saida("       document.Fdoc_word.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var obj_tr      = \"\";\r\n");
   $nm_saida->saida("   var css_tr      = \"\";\r\n");
   $nm_saida->saida("   var field_over  = " . $this->NM_field_over . ";\r\n");
   $nm_saida->saida("   var field_click = " . $this->NM_field_click . ";\r\n");
   $nm_saida->saida("   function over_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_over != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj.className = '" . $this->css_scGridFieldOver . "';\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function out_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_over != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj.className = class_obj;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function click_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_click != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr != \"\")\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           obj_tr.className = css_tr;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       css_tr        = class_obj;\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           obj_tr     = '';\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj_tr        = obj;\r\n");
   $nm_saida->saida("       css_tr        = class_obj;\r\n");
   $nm_saida->saida("       obj.className = '" . $this->css_scGridFieldClick . "';\r\n");
   $nm_saida->saida("   }\r\n");
   if ($this->Rec_ini == 0)
   {
       $nm_saida->saida("   nm_gp_ini = \"ini\";\r\n");
   }
   else
   {
       $nm_saida->saida("   nm_gp_ini = \"\";\r\n");
   }
   $nm_saida->saida("   nm_gp_rec_ini = \"" . $this->Rec_ini . "\";\r\n");
   $nm_saida->saida("   nm_gp_rec_fim = \"" . $this->Rec_fim . "\";\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['ajax_nav'])
   {
       if ($this->Rec_ini == 0)
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_ini', 'value' => "ini");
       }
       else
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_ini', 'value' => "");
       }
       $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_rec_ini', 'value' => $this->Rec_ini);
       $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_rec_fim', 'value' => $this->Rec_fim);
   }
   $nm_saida->saida("   function nm_gp_submit_rec(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (nm_gp_ini == \"ini\" && (campo == \"ini\" || campo == nm_gp_rec_ini)) \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          return; \r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      if (nm_gp_fim == \"fim\" && (campo == \"fim\" || campo == nm_gp_rec_fim)) \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          return; \r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      nm_gp_submit_ajax(\"rec\", campo); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit_qsearch(pos) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      var out_qsearch = \"\";\r\n");
   $nm_saida->saida("       out_qsearch = document.getElementById('fast_search_f0_' + pos).value;\r\n");
   $nm_saida->saida("       out_qsearch += \"_SCQS_\" + document.getElementById('cond_fast_search_f0_' + pos).value;\r\n");
   $nm_saida->saida("       out_qsearch += \"_SCQS_\" + document.getElementById('SC_fast_search_' + pos).value;\r\n");
   $nm_saida->saida("       ajax_navigate('fast_search', out_qsearch); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit_ajax(opc, parm) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      ajax_navigate(opc, parm); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F3.target = \"_self\"; \r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value = campo ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_opcao.value = \"igual\" ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = \"\";\r\n");
   $nm_saida->saida("      document.F3.action           = \"./\"  ;\r\n");
   $nm_saida->saida("      document.F3.submit() ;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit2(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      nm_gp_submit_ajax(\"ordem\", campo); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit3(campo, opc) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value = \"\";\r\n");
   $nm_saida->saida("      document.F3.target               = \"_self\"; \r\n");
   $nm_saida->saida("      document.F3.nmgp_chave_det.value = campo ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_opcao.value     = opc ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = \"\";\r\n");
   $nm_saida->saida("      document.F3.action               = \"./\"  ;\r\n");
   $nm_saida->saida("      document.F3.submit() ;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_move(tipo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F6.target = \"_self\"; \r\n");
   $nm_saida->saida("      document.F6.submit() ;\r\n");
   $nm_saida->saida("      return;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_move(x, y, z, p, g) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       document.F3.action           = \"./\"  ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_parms.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_orig_pesq.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_url_saida.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_opcao.value = x; \r\n");
   $nm_saida->saida("       document.F3.nmgp_outra_jan.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.target = \"_self\"; \r\n");
   $nm_saida->saida("       if (y == 1) \r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.target = \"_blank\"; \r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (\"busca\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.nmgp_orig_pesq.value = z; \r\n");
   $nm_saida->saida("           z = '';\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (z != null && z != '') \r\n");
   $nm_saida->saida("       { \r\n");
   $nm_saida->saida("           document.F3.nmgp_tipo_pdf.value = z; \r\n");
   $nm_saida->saida("       } \r\n");
   $nm_saida->saida("       if (\"xls\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   if (!extension_loaded("zip"))
   {
       $nm_saida->saida("           alert (\"" . html_entity_decode($this->Ini->Nm_lang['lang_othr_prod_xtzp']) . "\");\r\n");
       $nm_saida->saida("           return false;\r\n");
   } 
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (\"pdf\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           window.location = \"" . $this->Ini->path_link . "grid_indicadores_1_1/grid_indicadores_1_1_iframe.php?scsess=" . session_id() . "&str_tmp=" . $this->Ini->path_imag_temp . "&str_prod=" . $this->Ini->path_prod . "&str_btn=" . $this->Ini->Str_btn_css . "&str_lang=" . $this->Ini->str_lang . "&str_schema=" . $this->Ini->str_schema_all . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&pbfile=" . urlencode($str_pbfile) . "&jspath=" . urlencode($this->Ini->path_js) . "&sc_apbgcol=" . urlencode($this->Ini->path_css) . "&sc_tp_pdf=\" + z + \"&sc_parms_pdf=\" + p + \"&sc_graf_pdf=\" + g;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.submit();  \r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_print_conf(tp, cor)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       window.open('" . $this->Ini->path_link . "grid_indicadores_1_1/grid_indicadores_1_1_iframe_prt.php?path_botoes=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&opcao=print&tp_print=' + tp + '&cor_print=' + cor,'','location=no,menubar,resizable,scrollbars,status=no,toolbar');\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   nm_img = new Image();\r\n");
   $nm_saida->saida("   function nm_mostra_img(imagem, altura, largura)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       tb_show(\"\", imagem, \"\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_mostra_doc(campo1, campo2, campo3, campo4)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       while (campo2.lastIndexOf(\"&\") != -1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("          campo2 = campo2.replace(\"&\" , \"**Ecom**\");\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       while (campo2.lastIndexOf(\"#\") != -1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("          campo2 = campo2.replace(\"#\" , \"**Jvel**\");\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       NovaJanela = window.open (campo4 + \"?script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&nm_cod_doc=\" + campo1 + \"&nm_nome_doc=\" + campo2 + \"&nm_cod_apl=\" + campo3, \"ScriptCase\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_escreve_window()\r\n");
   $nm_saida->saida("   {\r\n");
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['form_psq_ret']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['campo_psq_ret']) && empty($this->nm_grid_sem_reg))
   {
      $nm_saida->saida("      if (document.Fpesq.nm_ret_psq.value != \"\")\r\n");
      $nm_saida->saida("      {\r\n");
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['sc_modal'])
      {
          $nm_saida->saida("          var Obj_Form = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['campo_psq_ret'] . ";\r\n");
          $nm_saida->saida("          var Obj_Doc = parent;\r\n");
          $nm_saida->saida("          if (parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['campo_psq_ret'] . "\"))\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['campo_psq_ret'] . "\");\r\n");
          $nm_saida->saida("          }\r\n");
      }
      else
      {
          $nm_saida->saida("          var Obj_Form = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['campo_psq_ret'] . ";\r\n");
          $nm_saida->saida("          var Obj_Doc = opener;\r\n");
          $nm_saida->saida("          if (opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['campo_psq_ret'] . "\"))\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['campo_psq_ret'] . "\");\r\n");
          $nm_saida->saida("          }\r\n");
      }
          $nm_saida->saida("          else\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = null;\r\n");
          $nm_saida->saida("          }\r\n");
      $nm_saida->saida("          if (Obj_Form.value != document.Fpesq.nm_ret_psq.value)\r\n");
      $nm_saida->saida("          {\r\n");
      $nm_saida->saida("              Obj_Form.value = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              if (null != Obj_Readonly)\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Readonly.innerHTML = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              }\r\n");
     if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['js_apos_busca']))
     {
      $nm_saida->saida("              if (Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['js_apos_busca'] . ")\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['js_apos_busca'] . "();\r\n");
      $nm_saida->saida("              }\r\n");
      $nm_saida->saida("              else if (Obj_Form.onchange && Obj_Form.onchange != '')\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form.onchange();\r\n");
      $nm_saida->saida("              }\r\n");
     }
     else
     {
      $nm_saida->saida("              if (Obj_Form.onchange && Obj_Form.onchange != '')\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form.onchange();\r\n");
      $nm_saida->saida("              }\r\n");
     }
      $nm_saida->saida("          }\r\n");
      $nm_saida->saida("      }\r\n");
   }
   $nm_saida->saida("      document.F5.action = \"grid_indicadores_1_1_fim.php\";\r\n");
   $nm_saida->saida("      document.F5.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_open_popup(parms)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (parms, '', 'resizable, scrollbars');\r\n");
   $nm_saida->saida("   }\r\n");
   if ($this->grid_emb_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_indicadores_1_1']['reg_start']))
   {
       $nm_saida->saida("      parent.scAjaxDetailStatus('grid_indicadores_1_1');\r\n");
       $nm_saida->saida("      parent.scAjaxDetailHeight('grid_indicadores_1_1', $(document).innerHeight());\r\n");
   }
   $nm_saida->saida("   </script>\r\n");
 }
}
?>
