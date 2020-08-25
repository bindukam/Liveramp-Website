 MktoForms2.loadForm("//lp.liveramp.com", "320-CHP-056", 999, function(form) {
    jQuery('form').removeClass().removeAttr('style');
    jQuery('.mktoForm').css('width', '100%');
    jQuery('.mktoGutter').remove();
    jQuery('.mktoClear').remove();
    jQuery('.mktoOffset').remove();
    jQuery('.mktoAsterix').remove();
    jQuery('.mktoLabel').css('width', '');
    jQuery('input').css('width', '');
    jQuery('.mktoButtonWrap').css('margin-left', '');
    jQuery('.mktoButton').addClass('button cta');
    jQuery('.mktoFieldDescriptor').css('margin-bottom', '');
    jQuery('.form-wrapper').fadeIn('400');
    jQuery('.mktoInstruction').hide();
    form.onSuccess(function(values, followUpUrl) {});
});