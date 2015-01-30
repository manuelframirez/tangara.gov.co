
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
  $('#id_sc_field_id_tipo_categoria_' + iSeqRow).bind('blur', function() { sc_form_tipo_categoria_id_tipo_categoria__onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_form_tipo_categoria_id_tipo_categoria__onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_tipo_categoria_id_tipo_categoria__onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_categoria_' + iSeqRow).bind('blur', function() { sc_form_tipo_categoria_tipo_categoria__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_tipo_categoria_tipo_categoria__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_tipo_categoria_tipo_categoria__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tipo_categoria_id_tipo_categoria__onblur(oThis, iSeqRow) {
  do_ajax_form_tipo_categoria_validate_id_tipo_categoria_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tipo_categoria_id_tipo_categoria__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tipo_categoria_id_tipo_categoria__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tipo_categoria_tipo_categoria__onblur(oThis, iSeqRow) {
  do_ajax_form_tipo_categoria_validate_tipo_categoria_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tipo_categoria_tipo_categoria__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tipo_categoria_tipo_categoria__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

