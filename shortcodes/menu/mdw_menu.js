jQuery(document).ready(function($) {
  // Oculta todos los submenús inicialmente
  $('#mdw__megamenu li ul').hide(); // Selecciona todos los <ul> que son hijos de <li>

  // Al hacer hover sobre un elemento de primer nivel
  $('#mdw__megamenu ul > li').hover(
      function() {
          // Muestra el submenú de primer nivel (hijos inmediatos)
          $(this).children('ul').stop(true, true).slideDown(300);
      },
      function() {
          // Oculta el submenú de primer nivel cuando se quita el hover
          $(this).children('ul').stop(true, true).slideUp(300);
      }
  );

  // Al hacer hover sobre un submenú de segundo nivel
  $('#mdw__megamenu li ul li').hover(
      function() {
          // Muestra el submenú de segundo nivel (hijos inmediatos)
          $(this).children('ul').stop(true, true).slideDown(300);
      },
      function() {
          // Oculta el submenú de segundo nivel cuando se quita el hover
          $(this).children('ul').stop(true, true).slideUp(300);
      }
  );
});
