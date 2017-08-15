'use strict';

var j = jQuery.noConflict();

(function ($) {
  var $win = j(window),
      $doc = j(document);

  $win.on('resize', function() {
    if (map) {
      var $map = j('#map');

      if ($map.length) {
        var lat = $map.data('lat'),
            long = $map.data('long');

        map.setCenter({lat: lat, lng: long});
      }
    }

    if (player) {
      if (j(window).width() >= 768) {
        player.setSize('640', '360');
      }

      if (j(window).width() < 768) {
        player.setSize('426', '240');
      }

      if (j(window).width() < 450) {
        player.setSize('320', '240');
      }
    }
  });

  $doc.on('ready', function () {
    j('#js-frm-contact').formValidation({
      locale: 'es_ES',
      framework: 'bootstrap',
      icon: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      }
    }).on('err.field.fv', function(e, data){
      var field = e.target;
      j('small.help-block[data-bv-result="INVALID"]').addClass('hide');
    }).on('success.form.fv', function(e){
      e.preventDefault();

      var $form = j(e.target),
          fv = j(e.target).data('formValidation');

      var msg     = j('#js-form-contact-msg'),
          loader  = j('#js-form-contact-loader');

      loader.removeClass('hidden').addClass('infinite animated');
      msg.text('');

      var data = $form.serialize() + '&nonce=' + ReyesMarinosAjax.nonce + '&action=register_contact';

      j.post(ReyesMarinosAjax.url, data, function(data){
        $form.data('formValidation').resetForm(true);

        if (data.result) {
          msg.text('Ya tenemos su consulta. En breve nos pondremos en contacto con usted.').addClass('alert alert-info');
        } else {
          msg.text(data.error).addClass('alert alert-danger');
        }

        loader.addClass('hidden').removeClass('infinite animated');
        msg.fadeIn('slow');
        setTimeout(function(){
          msg.fadeOut('slow', function(){
              j(this).text('').removeClass('alert alert-info alert-danger');
          });
        }, 5000);
      }, 'json').fail(function(){
        alert('No se pudo realizar la operación solicitada. Por favor vuelva a intentarlo.');
      });
    });

    j('.js-toggle-slidebar .Icon').on('click', function(ev) {
      ev.preventDefault();
      var slidebar = j('.Slidebar');

      if (slidebar.hasClass('active')) {
        slidebar.removeClass('active');
      } else {
        slidebar.addClass('active');
      }
    });
  });
})(jQuery);
