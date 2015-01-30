
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (0 < $oField.length && 0 < $oField[0].offsetHeight && 0 < $oField[0].offsetWidth && !$oField[0].disabled) {
    $oField[0].focus();
  }
} // scFocusField

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_id_municipio_' + iSeqRow).bind('blur', function() { sc_form_editar_fuente_id_municipio__onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_editar_fuente_id_municipio__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_indicador_' + iSeqRow).bind('blur', function() { sc_form_editar_fuente_id_indicador__onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_editar_fuente_id_indicador__onfocus(this, iSeqRow) });
  $('#id_sc_field_texto_fuente_' + iSeqRow).bind('blur', function() { sc_form_editar_fuente_texto_fuente__onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_editar_fuente_texto_fuente__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_editar_fuente_id_municipio__onblur(oThis, iSeqRow) {
  do_ajax_form_editar_fuente_inline_validate_id_municipio_();
  scCssBlur(oThis);
}

function sc_form_editar_fuente_id_municipio__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_editar_fuente_id_indicador__onblur(oThis, iSeqRow) {
  do_ajax_form_editar_fuente_inline_validate_id_indicador_();
  scCssBlur(oThis);
}

function sc_form_editar_fuente_id_indicador__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_editar_fuente_texto_fuente__onblur(oThis, iSeqRow) {
  do_ajax_form_editar_fuente_inline_validate_texto_fuente_();
  scCssBlur(oThis);
}

function sc_form_editar_fuente_texto_fuente__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

