<?php

/**
 * See the shortcode styles in Elementor template named Project Card, in advanced options
 */

if(!function_exists('show_project_info_func')){
    add_shortcode( 'show_project_info', 'show_project_info_func' );

    function show_project_info_func(){
        $uri_images = get_stylesheet_directory_uri() . '/inc/assets/img/';

        $type_project = get_field('type');
        $icon_water = $uri_images . 'drop.svg';
        $icon_energy = $uri_images . "cox-icon-energy.svg";

        $output = "";
        if($type_project === "water"){
            $capacity_group = get_field('capacity');
            $capacity_number = $capacity_group['number'];
            $capacity_sufix = $capacity_group['sufix'];

            $output .= "<h3 class='type-title'>Capacity</h3>";
            $output .= "<div class='type-row'>";
            $output .= "<div class='capacity'>";
            $output .= "<span class='capacity-number'>".number_format($capacity_number, 0)."</span>";
            $output .= "<span class='capacity-sufix'>".$capacity_sufix."</span>";
            $output .= "</div>";
            $output .= "<div>";
            $output .= "<img src='".$icon_water."' class='capacity-icon' />";
            $output .= "</div>";
            $output .= "</div>";
        }

        if($type_project === "energy"){
            $capacity_group = get_field('installed_power');
            $capacity_number = $capacity_group['number'];
            $capacity_sufix = $capacity_group['sufix'];

            $output .= "<h3 class='type-title'>Installed Power</h3>";
            $output .= "<div class='type-row'>";
            $output .= "<div class='capacity'>";
            $output .= "<span class='capacity-number'>".number_format($capacity_number, 0)."</span>";
            $output .= "<span class='capacity-sufix'>".$capacity_sufix."</span>";
            $output .= "</div>";
            $output .= "<div>";
            $output .= "<img src='".$icon_energy."' class='capacity-icon' />";
            $output .= "</div>";
            $output .= "</div>";
        }

        return $output;
    }
}