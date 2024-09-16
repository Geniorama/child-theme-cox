jQuery(document).ready(function($) {
    $(document).on('elementor/popup/show', function() {
      // Oculta todos los submenús inicialmente
      $('#mdw__megamenu li ul').css('width', '0');
  
      // Al hacer hover sobre un elemento de primer nivel
      $('#mdw__megamenu ul > li').hover(
          function() {
              // Muestra el submenú de primer nivel (hijos inmediatos)
              $(this).children('ul').stop(true, true).addClass('mdw__menu_level-2');
          },
          function() {
              // Oculta el submenú de primer nivel cuando se quita el hover
              $(this).children('ul').stop(true, true).removeClass('mdw__menu_level-2');
          }
      );
  
      // Al hacer hover sobre un submenú de segundo nivel
      $('#mdw__megamenu li ul li').hover(
          function() {
              // Muestra el submenú de segundo nivel (hijos inmediatos)
              $(this).children('ul').addClass('mdw__menu_level-3');
          },
          function() {
              // Oculta el submenú de segundo nivel cuando se quita el hover
              $(this).children('ul').stop(true, true).removeClass('mdw__menu_level-3');
          }
      );
    });
  });
  