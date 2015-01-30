
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
  $('#id_sc_field_id_padre' + iSeqRow).bind('blur', function() { sc_form_variables_2_2_id_padre_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_variables_2_2_id_padre_onfocus(this, iSeqRow) });
  $('#id_sc_field_descripcion' + iSeqRow).bind('blur', function() { sc_form_variables_2_2_descripcion_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_variables_2_2_descripcion_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_variables_2_2_id_padre_onblur(oThis, iSeqRow) {
  do_ajax_form_variables_2_2_validate_id_padre();
  scCssBlur(oThis);
}

function sc_form_variables_2_2_id_padre_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_variables_2_2_descripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_variables_2_2_validate_descripcion();
  scCssBlur(oThis);
}

function sc_form_variables_2_2_descripcion_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

