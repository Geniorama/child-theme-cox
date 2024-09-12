<?php

if(!function_exists('show_project_info_func')){
    add_shortcode( 'show_project_info', 'show_project_info_func' );

    function show_project_info_func(){
        $type_project = get_field('type');
        $icon_water = 518;
        $icon_energy = "";

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
            $output .= wp_get_attachment_image( $icon_water, 'thumbnail', false, array('class' => 'capacity-icon') );
            $output .= "</div>";
            $output .= "</div>";
        }

        if($type_project === "energy"){
            $output .= "<h3>Installed Power</h3>";
        }

        return $output;
    }
}