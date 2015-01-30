function ajax_navigate(opc, parm)
{
    scAjaxProcOn();
    $.ajax({
      type: "POST",
      url: "index.php",
      data: "nmgp_opcao=ajax_navigate&script_case_init=" + document.F4.script_case_init.value + "&script_case_session=" + document.F4.script_case_session.value + "&opc=" + opc  + "&parm=" + parm,
      success: function(jsonNavigate) {
        var i, oResp;
        Tst_integrid = jsonNavigate.trim();
        if ("{" != Tst_integrid.substr(0, 1)) {
            scAjaxProcOff();
            alert (jsonNavigate);
            return;
        }
        eval("oResp = " + jsonNavigate);
        document.getElementById('nmsc_iframe_liga_A_grid_registro_municipios_mas_consultado').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_E_grid_registro_municipios_mas_consultado').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_D_grid_registro_municipios_mas_consultado').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_B_grid_registro_municipios_mas_consultado').src = 'NM_Blank_Page.htm';
        document.getElementById('nmsc_iframe_liga_A_grid_registro_municipios_mas_consultado').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_registro_municipios_mas_consultado').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_registro_municipios_mas_consultado').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_registro_municipios_mas_consultado').style.height = '0px';
        document.getElementById('nmsc_iframe_liga_A_grid_registro_municipios_mas_consultado').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_E_grid_registro_municipios_mas_consultado').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_D_grid_registro_municipios_mas_consultado').style.width  = '0px';
        document.getElementById('nmsc_iframe_liga_B_grid_registro_municipios_mas_consultado').style.width  = '0px';
        if (oResp["redirInfo"]) {
           scAjaxRedir(oResp);
        }
        if (oResp["setValue"]) {
          for (i = 0; i < oResp["setValue"].length; i++) {
               $("#" + oResp["setValue"][i]["field"]).html(oResp["setValue"][i]["value"]);
          }
        }
        if (oResp["setArr"]) {
          for (i = 0; i < oResp["setArr"].length; i++) {
               eval (oResp["setArr"][i]["var"] + ' = new Array()');
          }
        }
        if (oResp["setVar"]) {
          for (i = 0; i < oResp["setVar"].length; i++) {
               eval (oResp["setVar"][i]["var"] + ' = \"' + oResp["setVar"][i]["value"] + '\"');
          }
        }
        if (oResp["setDisplay"]) {
          for (i = 0; i < oResp["setDisplay"].length; i++) {
               document.getElementById(oResp["setDisplay"][i]["field"]).style.display = oResp["setDisplay"][i]["value"];
          }
        }
        if (oResp["setDisabled"]) {
          for (i = 0; i < oResp["setDisabled"].length; i++) {
               document.getElementById(oResp["setDisabled"][i]["field"]).disabled = oResp["setDisabled"][i]["value"];
          }
        }
        if (oResp["setClass"]) {
          for (i = 0; i < oResp["setClass"].length; i++) {
               document.getElementById(oResp["setClass"][i]["field"]).className = oResp["setClass"][i]["value"];
          }
        }
        if (oResp["setSrc"]) {
          for (i = 0; i < oResp["setSrc"].length; i++) {
               document.getElementById(oResp["setSrc"][i]["field"]).src = oResp["setSrc"][i]["value"];
          }
        }
        if (oResp["redirInfo"]) {
           scAjaxRedir(oResp);
        }
        if (oResp["htmOutput"]) {
           scAjaxShowDebug(oResp);
        }
        if (!SC_Link_View)
        {
            SC_init_jquery();
            tb_init('a.thickbox, area.thickbox, input.thickbox');
        }
        scAjaxProcOff();
      }
    });
}
