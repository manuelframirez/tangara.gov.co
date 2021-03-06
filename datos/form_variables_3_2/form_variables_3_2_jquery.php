
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
  $('#id_sc_field_id_variable_' + iSeqRow).bind('blur', function() { sc_form_variables_3_2_id_variable__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_variables_3_2_id_variable__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_variables_3_2_id_variable__onfocus(this, iSeqRow) });
  $('#id_sc_field_descripcion_' + iSeqRow).bind('blur', function() { sc_form_variables_3_2_descripcion__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_variables_3_2_descripcion__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_variables_3_2_descripcion__onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle_' + iSeqRow).bind('blur', function() { sc_form_variables_3_2_detalle__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_variables_3_2_detalle__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_variables_3_2_detalle__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_variables_3_2_id_variable__onblur(oThis, iSeqRow) {
  do_ajax_form_variables_3_2_validate_id_variable_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_variables_3_2_id_variable__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_variables_3_2_id_variable__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_variables_3_2_descripcion__onblur(oThis, iSeqRow) {
  do_ajax_form_variables_3_2_validate_descripcion_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_variables_3_2_descripcion__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_variables_3_2_descripcion__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_variables_3_2_detalle__onblur(oThis, iSeqRow) {
  do_ajax_form_variables_3_2_validate_detalle_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_variables_3_2_detalle__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_variables_3_2_detalle__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

