jQuery(document).ready(function($) {
  $('.mdw__grid_card').each(function() {
    var $card = $(this);
    var bgColor = $card.data('bgcolor');

    $card.hover(
      function() {
        // Mouse enter
        $card.css('background-color', bgColor);
      },
      function() {
        // Mouse leave
        $card.css('background-color', 'transparent');
      }
    );
  });

  $('.mdw__grid_card').on('click', function() {
    var id = $(this).data('id'); // Obtén el data-id del card clickeado
    var $displayCard = $('#' + id); // Selecciona el card correspondiente en el display

    $('.mdw__grid_card').removeClass('hide'); // Muestra el card que estaba oculto
    $(this).addClass('hide'); // Oculta e card que se ha clickeado
    $('.mdw__display_card').addClass('hide'); // Oculta todos los cards del display

    // Muestra solo el card correspondiente en el display y oculta el card clickeado en el grid
    $displayCard.removeClass('hide');
  });
});
