<?php

if ( ! function_exists( 'tax_country_function' ) ) {

// Register Custom Taxonomy
function tax_country_function() {

	$labels = array(
		'name'                       => _x( 'Countries', 'Taxonomy General Name', 'web_cox' ),
		'singular_name'              => _x( 'Country', 'Taxonomy Singular Name', 'web_cox' ),
		'menu_name'                  => __( 'Country', 'web_cox' ),
		'all_items'                  => __( 'All Items', 'web_cox' ),
		'parent_item'                => __( 'Parent Item', 'web_cox' ),
		'parent_item_colon'          => __( 'Parent Item:', 'web_cox' ),
		'new_item_name'              => __( 'New Item Name', 'web_cox' ),
		'add_new_item'               => __( 'Add New Item', 'web_cox' ),
		'edit_item'                  => __( 'Edit Item', 'web_cox' ),
		'update_item'                => __( 'Update Item', 'web_cox' ),
		'view_item'                  => __( 'View Item', 'web_cox' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'web_cox' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'web_cox' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'web_cox' ),
		'popular_items'              => __( 'Popular Items', 'web_cox' ),
		'search_items'               => __( 'Search Items', 'web_cox' ),
		'not_found'                  => __( 'Not Found', 'web_cox' ),
		'no_terms'                   => __( 'No items', 'web_cox' ),
		'items_list'                 => __( 'Items list', 'web_cox' ),
		'items_list_navigation'      => __( 'Items list navigation', 'web_cox' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'country', array( 'cox_projects' ), $args );

}
add_action( 'init', 'tax_country_function', 0 );
}