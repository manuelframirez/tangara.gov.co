
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
  $('#id_sc_field_id_datos_' + iSeqRow).bind('blur', function() { sc_form_datos_3_nivel_id_datos__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_datos_3_nivel_id_datos__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_datos_3_nivel_id_datos__onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_' + iSeqRow).bind('blur', function() { sc_form_datos_3_nivel_valor__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_datos_3_nivel_valor__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_datos_3_nivel_valor__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_categoria_' + iSeqRow).bind('blur', function() { sc_form_datos_3_nivel_id_categoria__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_datos_3_nivel_id_categoria__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_datos_3_nivel_id_categoria__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_variable_' + iSeqRow).bind('blur', function() { sc_form_datos_3_nivel_id_variable__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_datos_3_nivel_id_variable__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_datos_3_nivel_id_variable__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_municipio_' + iSeqRow).bind('blur', function() { sc_form_datos_3_nivel_id_municipio__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_datos_3_nivel_id_municipio__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_datos_3_nivel_id_municipio__onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0_' + iSeqRow).bind('blur', function() { sc_form_datos_3_nivel_sc_field_0__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_datos_3_nivel_sc_field_0__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_datos_3_nivel_sc_field_0__onfocus(this, iSeqRow) });
  $('#id_sc_field_sub_variable3_' + iSeqRow).bind('blur', function() { sc_form_datos_3_nivel_sub_variable3__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_datos_3_nivel_sub_variable3__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_datos_3_nivel_sub_variable3__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_datos_3_nivel_id_datos__onblur(oThis, iSeqRow) {
  do_ajax_form_datos_3_nivel_validate_id_datos_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_datos_3_nivel_id_datos__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_datos_3_nivel_id_datos__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_datos_3_nivel_valor__onblur(oThis, iSeqRow) {
  do_ajax_form_datos_3_nivel_validate_valor_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_datos_3_nivel_valor__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_datos_3_nivel_valor__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_datos_3_nivel_id_categoria__onblur(oThis, iSeqRow) {
  do_ajax_form_datos_3_nivel_validate_id_categoria_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_datos_3_nivel_id_categoria__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_datos_3_nivel_id_categoria__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_datos_3_nivel_id_variable__onblur(oThis, iSeqRow) {
  do_ajax_form_datos_3_nivel_validate_id_variable_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_datos_3_nivel_id_variable__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_datos_3_nivel_id_variable__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_datos_3_nivel_id_municipio__onblur(oThis, iSeqRow) {
  do_ajax_form_datos_3_nivel_validate_id_municipio_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_datos_3_nivel_id_municipio__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_datos_3_nivel_id_municipio__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_datos_3_nivel_sc_field_0__onblur(oThis, iSeqRow) {
  do_ajax_form_datos_3_nivel_validate_sc_field_0_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_datos_3_nivel_sc_field_0__onchange(oThis, iSeqRow) {
  do_ajax_form_datos_3_nivel_refresh_sc_field_0_(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_datos_3_nivel_sc_field_0__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_datos_3_nivel_sub_variable3__onblur(oThis, iSeqRow) {
  do_ajax_form_datos_3_nivel_validate_sub_variable3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_datos_3_nivel_sub_variable3__onchange(oThis, iSeqRow) {
  do_ajax_form_datos_3_nivel_refresh_sub_variable3_(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_datos_3_nivel_sub_variable3__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

