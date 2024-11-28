jQuery(document).ready(function($) {
  var lastScrollTop = 0;
  var delta = 5;
  var header = $('#mdw-main-header');
  var whiteLogo = $('#mdw-header-logo-white');
  var colorLogo = $('#mdw-header-logo-color');
  var headerHeight = header.outerHeight();

  $(window).on('scroll', function() {
      var currentScrollTop = $(this).scrollTop();

      // Verifica si el desplazamiento vertical ha cambiado significativamente
      if (Math.abs(lastScrollTop - currentScrollTop) <= delta) return;

      // Cambia la clase del fondo del encabezado
      if (currentScrollTop > 300) {
          header.addClass('bg-white');
          whiteLogo.addClass('hide');
          colorLogo.removeClass('hide');
        } else {
          header.removeClass('bg-white');
          whiteLogo.removeClass('hide');
          colorLogo.addClass('hide');
      }

      // Maneja el desplazamiento para ocultar o mostrar el encabezado
      if (currentScrollTop > lastScrollTop && currentScrollTop > headerHeight) {
          // Scroll hacia abajo: ocultar el encabezado
          header.removeClass('slide-down').addClass('slide-up');
      } else {
          // Scroll hacia arriba: mostrar el encabezado
          header.removeClass('slide-up').addClass('slide-down');
      }

      lastScrollTop = currentScrollTop;
  });
});


jQuery(document).ready(function($) {
  $('.hfe-menu-item, .hfe-sub-menu-item').each(function() {
    // Obtén el elemento <a> y el <span> asociado
    var $a = $(this);
    var $span = $a.find('.hfe-menu-toggle');

    // Mueve el <span> fuera del <a> y lo coloca como hermano del <a>
    if ($span.length) {
      $span.insertAfter($a);
    }
  });
  
  $('.sub-arrow').each(function() {
    $(this).on('click', function() {
      var elementoPadre = $(this).parent().parent();
      elementoPadre.addClass('clic');
      elementoPadre.find('> .sub-menu').addClass('mdw__visible');
      $('.sub-menu').on('mouseleave', function() {
        $(this).removeClass('mdw__visible');
      });
    });
  });
});