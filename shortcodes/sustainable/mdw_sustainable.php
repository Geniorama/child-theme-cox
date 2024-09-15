<?php
add_shortcode('sustainable', 'sustainable_function');

function sustainable_function()
{
  wp_enqueue_style('mdw-sustainable-style', get_stylesheet_directory_uri() . '/shortcodes/sustainable/mdw_sustainable.css', array(), '1.0');
  wp_enqueue_script('mdw-sustainable-script', get_stylesheet_directory_uri() . '/shortcodes/sustainable/mdw_sustainable.js', array('jquery'), null, true);

  $allSustainable = get_field('sustainability');
  $cardDisplay = display_card($allSustainable);
  $cardGrid = grid_card($allSustainable);
  $html = "
    <div class='mdw__sustainable_content'>
      <div class='mdw__sustainable_display'>$cardDisplay</div>
      <div class='mdw__sustainable_grid'>$cardGrid</div>
    </div>
  ";
  return $html;
}

function display_card($allSustainable)
{
  $html = '';
  $number = 0;
  $onuIcon = get_stylesheet_directory_uri() . '/inc/assets/img/onu.svg';
  foreach ($allSustainable as $sustainable) {
    $number++;
    $title = $sustainable['title'];
    $decription = $sustainable['decription'];
    $color_icon = $sustainable['color_icon'];
    $bgColor = $sustainable['card_color'];
    $hideClass = $number === 1 ? '' : 'hide';
    $html .= "
      <div id='mdw__card_$number' class='mdw__display_card $hideClass'>
        <div class='mdw__display_card-header' style='background-color: $bgColor'>
          <div class='mdw__header_number'>$number</div>
          <div class='mdw__header_title'>$title</div>
          <div class='mdw__header_icon'><img src='$onuIcon' alt='ONU'></div>
        </div>
        <div class='mdw__display_card-content'>
          <div class='mdw__content_header'>
            <div class='mdw__content_header-icon'><img src='$color_icon' alt='$title'></div>
            <div class='mdw__content_header-title'>Our contribution</div>
          </div>
          <div class='mdw__content_text'>$decription</div>
        </div>
      </div>
    ";
  }
  return $html;
}

function grid_card($allSustainable)
{
  $html = '';
  $number = 0;
  foreach ($allSustainable as $sustainable) {
    $number++;
    $title = $sustainable['title'];
    $white_icon = $sustainable['white_icon'];
    $bgColor = $sustainable['card_color'];
    $hideClass = $number === 1 ? 'hide' : '';
    $html .= "
      <div class='mdw__grid_card $hideClass' data-bgcolor='$bgColor' data-id='mdw__card_$number'>
        <div class='mdw__header_number'>$number</div>
        <div class='mdw__header_icon'><img src='$white_icon' alt='$title'></div>
        <div class='mdw__header_title'>$title</div>
      </div>
    ";
  }
  return $html;
}
