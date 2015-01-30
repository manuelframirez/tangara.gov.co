
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
  $('#id_sc_field_id_categoria_' + iSeqRow).bind('blur', function() { sc_form_categorias_id_categoria__onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_categorias_id_categoria__onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_' + iSeqRow).bind('blur', function() { sc_form_categorias_nombre__onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_categorias_nombre__onfocus(this, iSeqRow) });
  $('#id_sc_field_fk_tipo_categoria_' + iSeqRow).bind('blur', function() { sc_form_categorias_fk_tipo_categoria__onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_categorias_fk_tipo_categoria__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_categorias_id_categoria__onblur(oThis, iSeqRow) {
  do_ajax_form_categorias_inline_validate_id_categoria_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_categorias_id_categoria__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_categorias_nombre__onblur(oThis, iSeqRow) {
  do_ajax_form_categorias_inline_validate_nombre_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
  do_ajax_form_categorias_inline_validate_nombre_();
  scCssBlur(oThis);
}

function sc_form_categorias_nombre__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_categorias_fk_tipo_categoria__onblur(oThis, iSeqRow) {
  do_ajax_form_categorias_inline_validate_fk_tipo_categoria_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
  do_ajax_form_categorias_inline_validate_fk_tipo_categoria_();
  scCssBlur(oThis);
}

function sc_form_categorias_fk_tipo_categoria__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

