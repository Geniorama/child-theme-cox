<?php

if ( ! function_exists('cox_projects_function') ) {

// Register Custom Post Type
function cox_projects_function() {

    $labels = array(
        'name'                  => _x( 'Projects', 'Post Type General Name', 'web_cox' ),
        'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'web_cox' ),
        'menu_name'             => __( 'Projects', 'web_cox' ),
        'name_admin_bar'        => __( 'Projects', 'web_cox' ),
        'archives'              => __( 'Item Archives', 'web_cox' ),
        'attributes'            => __( 'Item Attributes', 'web_cox' ),
        'parent_item_colon'     => __( 'Parent Item:', 'web_cox' ),
        'all_items'             => __( 'All Items', 'web_cox' ),
        'add_new_item'          => __( 'Add New Item', 'web_cox' ),
        'add_new'               => __( 'Add New', 'web_cox' ),
        'new_item'              => __( 'New Item', 'web_cox' ),
        'edit_item'             => __( 'Edit Item', 'web_cox' ),
        'update_item'           => __( 'Update Item', 'web_cox' ),
        'view_item'             => __( 'View Item', 'web_cox' ),
        'view_items'            => __( 'View Items', 'web_cox' ),
        'search_items'          => __( 'Search Item', 'web_cox' ),
        'not_found'             => __( 'Not found', 'web_cox' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'web_cox' ),
        'featured_image'        => __( 'Featured Image', 'web_cox' ),
        'set_featured_image'    => __( 'Set featured image', 'web_cox' ),
        'remove_featured_image' => __( 'Remove featured image', 'web_cox' ),
        'use_featured_image'    => __( 'Use as featured image', 'web_cox' ),
        'insert_into_item'      => __( 'Insert into item', 'web_cox' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'web_cox' ),
        'items_list'            => __( 'Items list', 'web_cox' ),
        'items_list_navigation' => __( 'Items list navigation', 'web_cox' ),
        'filter_items_list'     => __( 'Filter items list', 'web_cox' ),
    );
    $rewrite = array(
        'slug'                  => 'project',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Project', 'web_cox' ),
        'description'           => __( 'Post Type Description', 'web_cox' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'post_tag', 'tipo' ), // Añadimos la taxonomía 'tipo'
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );
    register_post_type( 'cox_projects', $args );

}
add_action( 'init', 'cox_projects_function', 0 );

// Register Custom Taxonomy "Tipo"
function cox_tipo_taxonomy() {

    $labels = array(
        'name'              => _x( 'Tipos', 'taxonomy general name', 'web_cox' ),
        'singular_name'     => _x( 'Tipo', 'taxonomy singular name', 'web_cox' ),
        'search_items'      => __( 'Search Tipos', 'web_cox' ),
        'all_items'         => __( 'All Tipos', 'web_cox' ),
        'parent_item'       => __( 'Parent Tipo', 'web_cox' ),
        'parent_item_colon' => __( 'Parent Tipo:', 'web_cox' ),
        'edit_item'         => __( 'Edit Tipo', 'web_cox' ),
        'update_item'       => __( 'Update Tipo', 'web_cox' ),
        'add_new_item'      => __( 'Add New Tipo', 'web_cox' ),
        'new_item_name'     => __( 'New Tipo Name', 'web_cox' ),
        'menu_name'         => __( 'Tipo', 'web_cox' ),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true, // true si quieres que sea jerárquica como categorías
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
        'show_in_rest'      => true,
    );
    register_taxonomy( 'tipo', array( 'cox_projects' ), $args );
}
add_action( 'init', 'cox_tipo_taxonomy', 0 );

}
