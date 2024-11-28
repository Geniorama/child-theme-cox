<?php

/**
 * See the shortcode styles in assets folder from child theme
 */

if (!function_exists('show_project_info_func')) {
    add_shortcode('show_project_info', 'show_project_info_func');
    add_action('wp_enqueue_scripts', 'add_cox_project_info_styles');

    function add_cox_project_info_styles()
    {
        wp_enqueue_style('sc-project-info', get_stylesheet_directory_uri() . '/inc/assets/css/style-project-info.css', array(), '1.0');
    }

    function show_project_info_func()
    {
        $current_language = pll_current_language();
        $uri_images = get_stylesheet_directory_uri() . '/inc/assets/img/';

        $type_project = get_field('type');
        $icon_water = $uri_images . 'drop.svg';
        $icon_energy = "/wp-content/uploads/2024/09/rayo-icon_1.svg";

        $capacity_text = $current_language === 'es' ? "Capacidad" : "Capacity";
        $power_text = $current_language === 'es' ? "Potencia instalada" : "Installed Power";

        $output = "";
        if ($type_project === "water") {
            $capacity_group = get_field('capacity');
            $capacity_number = isset($capacity_group['number']) ? $capacity_group['number'] : 0;
            $capacity_sufix = $capacity_group['sufix'];

            if (is_numeric($capacity_number)) {
                if ($current_language === 'es') {
                    $capacity_number_format = number_format($capacity_number, 0, ',', '.');
                } else {
                    $capacity_number_format = number_format($capacity_number, 0, '.', ',');
                }
            } else {
                $capacity_number_format = ''; // O algún valor por defecto
            }

            $output .= "<div class='cox-project-info'>";
            $output .= "<h3 class='type-title'>" . $capacity_text . "</h3>";
            $output .= "<div class='type-row'>";
            $output .= "<div class='capacity'>";
            $output .= "<span class='capacity-number'>" . $capacity_number_format . "</span>";
            $output .= "<span class='capacity-sufix'>" . $capacity_sufix . "</span>";
            $output .= "</div>";
            $output .= "<div>";
            $output .= "<img src='" . $icon_water . "' class='capacity-icon' />";
            $output .= "</div>";
            $output .= "</div>";
            $output .= "</div>";
        }

        if ($type_project === "energy") {
            $capacity_group = get_field('installed_power');
            $capacity_number = $capacity_group['number'];
            $capacity_sufix = $capacity_group['sufix'];

            $output .= "<div class='cox-project-info'>";
            $output .= "<h3 class='type-title'>" . $power_text . "</h3>";
            $output .= "<div class='type-row'>";
            $output .= "<div class='capacity'>";
            $output .= "<span class='capacity-number'>" . $capacity_number . "</span>";
            $output .= "<span class='capacity-sufix'>" . $capacity_sufix . "</span>";
            $output .= "</div>";
            $output .= "<div>";
            $output .= "<img src='" . $icon_energy . "' class='capacity-icon' />";
            $output .= "</div>";
            $output .= "</div>";
            $output .= "</div>";
        }

        return $output;
    }
}
