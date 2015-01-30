
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
  $('#id_sc_field_nombre' + iSeqRow).bind('blur', function() { sc_form_indicadores_nombre_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_indicadores_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_fk_tematica' + iSeqRow).bind('blur', function() { sc_form_indicadores_fk_tematica_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_indicadores_fk_tematica_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_indicadores_fk_tematica_onfocus(this, iSeqRow) });
  $('#id_sc_field_fk_tipo_categoria' + iSeqRow).bind('blur', function() { sc_form_indicadores_fk_tipo_categoria_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_indicadores_fk_tipo_categoria_onfocus(this, iSeqRow) });
  $('#id_sc_field_descripcion' + iSeqRow).bind('blur', function() { sc_form_indicadores_descripcion_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_indicadores_descripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_dimension' + iSeqRow).bind('blur', function() { sc_form_indicadores_dimension_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_indicadores_dimension_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_indicadores_dimension_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_indicadores_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_indicadores_validate_nombre();
  scCssBlur(oThis);
}

function sc_form_indicadores_nombre_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_indicadores_fk_tematica_onblur(oThis, iSeqRow) {
  do_ajax_form_indicadores_validate_fk_tematica();
  scCssBlur(oThis);
}

function sc_form_indicadores_fk_tematica_onchange(oThis, iSeqRow) {
  do_ajax_form_indicadores_refresh_fk_tematica();
}

function sc_form_indicadores_fk_tematica_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_indicadores_fk_tipo_categoria_onblur(oThis, iSeqRow) {
  do_ajax_form_indicadores_validate_fk_tipo_categoria();
  scCssBlur(oThis);
}

function sc_form_indicadores_fk_tipo_categoria_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_indicadores_descripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_indicadores_validate_descripcion();
  scCssBlur(oThis);
}

function sc_form_indicadores_descripcion_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_indicadores_dimension_onblur(oThis, iSeqRow) {
  do_ajax_form_indicadores_validate_dimension();
  scCssBlur(oThis);
}

function sc_form_indicadores_dimension_onchange(oThis, iSeqRow) {
  do_ajax_form_indicadores_refresh_dimension();
}

function sc_form_indicadores_dimension_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

