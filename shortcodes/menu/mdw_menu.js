jQuery(document).ready(function($) {
  $(document).on('elementor/popup/show', function() {
    // Oculta todos los submenús inicialmente
    $('#mdw__megamenu li ul').css('width', '0');

    // Función para determinar si es móvil
    function isMobile() {
      return window.matchMedia("(max-width: 768px)").matches; // Cambia el tamaño según tus necesidades
    }

    // Manejo de hover según el dispositivo
    function setupHoverHandlers() {
      if (isMobile()) {
        // Al hacer clic sobre mdw__megamenu_logo en mobile
        $('#mdw__megamenu li > .mdw__megamenu_logo').click(function(e) {
          e.stopPropagation(); // Evitar que el clic se propague
          var $parentLi = $(this).closest('li');
          $parentLi.children('ul').stop(true, true).toggleClass('mdw__menu_level-2');
        });

        // Cerrar el submenú si se hace clic fuera
        $(document).click(function(e) {
          if (!$(e.target).closest('#mdw__megamenu').length) {
            $('#mdw__megamenu li ul').removeClass('mdw__menu_level-2');
          }
        });

      } else {
        // Al hacer hover sobre un elemento de primer nivel en desktop
        $('#mdw__megamenu ul > li').hover(
          function() {
            $(this).children('ul').stop(true, true).addClass('mdw__menu_level-2');
          },
          function() {
            $(this).children('ul').stop(true, true).removeClass('mdw__menu_level-2');
          }
        );

        // Al hacer hover sobre un submenú de segundo nivel
        $('#mdw__megamenu li ul li').hover(
          function() {
            $(this).children('ul').addClass('mdw__menu_level-3');
          },
          function() {
            $(this).children('ul').stop(true, true).removeClass('mdw__menu_level-3');
          }
        );
      }
    }

    // Llamar a la función para configurar los handlers
    setupHoverHandlers();

    // Actualizar los handlers al redimensionar la ventana
    $(window).resize(function() {
      setupHoverHandlers();
    });
  });
});  
