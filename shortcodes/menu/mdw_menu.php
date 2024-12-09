<?php

/**
 * Custom menu
 */
function mostrar_menu_main_menu()
{
  wp_enqueue_style('mdw-menu-style', get_stylesheet_directory_uri() . '/shortcodes/menu/mdw_menu.css', array(), '1.0');
  wp_enqueue_script('mdw-menu-script', get_stylesheet_directory_uri() . '/shortcodes/menu/mdw_menu.js', array('jquery'), null, true);

  // Obtiene el menú con el nombre 'main menu'
  $menu_name = pll_current_language('slug') == 'es' ? 'menu principal' : 'main menu';
  $menu = wp_get_nav_menu_object($menu_name);

  // Si el menú existe, genera la lista
  if ($menu) {
    $menu_items = wp_get_nav_menu_items($menu->term_id);

    // Organiza los elementos en una estructura jerárquica
    $menu_list = build_menu_hierarchy($menu_items);

    // Genera el HTML del menú
    $logoURL = "/wp-content/uploads/2024/09/66Recurso-3.svg";
    $htmlmenu = generate_menu_html($menu_list);
    $html = '';
    $html .= "
      <div id='mdw__megamenu' class='mdw__megamenu'>
        <div class='mdw__megamenu_header'>
          <img src='$logoURL' alt='Logo' width='100' height='80' class='mdw__megamenu_logo'>
        </div>
        $htmlmenu        
      </div>
    ";
    return $html;
  }
}
add_shortcode('mostrar_menu', 'mostrar_menu_main_menu');

// Función recursiva para generar el HTML del menú
function generate_menu_html($items, $parent_id = 0, $level = 0)
{
  $output = '';
  $output .= '<ul class="mdw__menu_level">';

  // Agregar botón de volver solo en niveles 1 y 2
  if ($level > 0) {
    $backText = pll_current_language('slug') == 'es' ? 'Volver' : 'Back';
    $output .= "<div class='mdw__megamenu_back'>$backText</div>";
  }

  // Definir el icono de tener hijos
  $iconHaveChildren = "/wp-content/uploads/2024/09/a-bRecurso-3.svg";

  foreach ($items as $item) {
    $classes = !empty($item->classes) ? implode(' ', (array) $item->classes) : '';
    $output .= '<li class="mdw__menu_item ' . esc_attr($classes) . '"><a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';

    if (!empty($item->children)) {
      $output .= generate_menu_html($item->children, $item->ID, $level + 1); // Incrementa el nivel
      $output .= "<img src='$iconHaveChildren' alt='Logo' width='14' height='14' class='mdw__megamenu_logo'>";
    }

    $output .= '</li>';
  }

  if ($level === 0) {
    $searchMobile = pll_current_language('slug') == 'es' ? do_shortcode('[elementor-template id="3851"]') : do_shortcode('[elementor-template id="1861"]');
    // $output .= '<li class="mdw__menu_item">';
    $output .= "$searchMobile";
    // $output .= '</li>';
  }
  $output .= "</ul>";
  return $output;
}


// Función para construir la jerarquía de menús
function build_menu_hierarchy($menu_items, $parent_id = 0)
{
  $hierarchy = [];

  foreach ($menu_items as $item) {
    if ($item->menu_item_parent == $parent_id) {
      $children = build_menu_hierarchy($menu_items, $item->ID); // Encuentra hijos
      if ($children) {
        $item->children = $children; // Asigna hijos al item
      }
      $hierarchy[] = $item;
    }
  }

  return $hierarchy;
}
