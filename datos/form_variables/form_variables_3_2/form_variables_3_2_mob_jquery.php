
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
  $('#id_sc_field_id_padre' + iSeqRow).bind('blur', function() { sc_form_variables_3_2_id_padre_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_variables_3_2_id_padre_onfocus(this, iSeqRow) });
  $('#id_sc_field_descripcion' + iSeqRow).bind('blur', function() { sc_form_variables_3_2_descripcion_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_variables_3_2_descripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_n3' + iSeqRow).bind('blur', function() { sc_form_variables_3_2_n3_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_variables_3_2_n3_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_variables_3_2_id_padre_onblur(oThis, iSeqRow) {
  do_ajax_form_variables_3_2_mob_validate_id_padre();
  scCssBlur(oThis);
}

function sc_form_variables_3_2_id_padre_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_variables_3_2_descripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_variables_3_2_mob_validate_descripcion();
  scCssBlur(oThis);
}

function sc_form_variables_3_2_descripcion_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_variables_3_2_n3_onblur(oThis, iSeqRow) {
  do_ajax_form_variables_3_2_mob_validate_n3();
  scCssBlur(oThis);
}

function sc_form_variables_3_2_n3_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup) {
  if ('over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
  }
}
