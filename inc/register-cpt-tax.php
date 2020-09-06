<?php 

function bakehouse_register_custom_post_types(){



    $labels = array(
        'name'               => _x( 'Testimonials', 'post type general name'  ),
        'singular_name'      => _x( 'Testimonial', 'post type singular name'  ),
        'menu_name'          => _x( 'Testimonials', 'admin menu'  ),
        'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'testimonial' ),
        'add_new_item'       => __( 'Add New Testimonial' ),
        'new_item'           => __( 'New Testimonial' ),
        'edit_item'          => __( 'Edit Testimonial' ),
        'view_item'          => __( 'View Testimonial'  ),
        'all_items'          => __( 'All Testimonials' ),
        'search_items'       => __( 'Search Testimonials' ),
        'parent_item_colon'  => __( 'Parent Testimonials:' ),
        'not_found'          => __( 'No testimonials found.' ),
        'not_found_in_trash' => __( 'No testimonials found in Trash.' ),
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonials' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-heart',
        'supports'           => array( 'title', 'editor' ),
        'template'           => array( array( 'core/quote' ) ),
        'template_lock'      => 'all'
    );
    
    register_post_type( 'testimonial', $args );
    

    $labels = array(
        'name'               => _x( 'Bakers', 'post type general name' ),
        'singular_name'      => _x( 'Baker', 'post type singular name'),
        'menu_name'          => _x( 'Bakers', 'admin menu' ),
        'name_admin_bar'     => _x( 'Baker', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'baker' ),
        'add_new_item'       => __( 'Add New Baker' ),
        'new_item'           => __( 'New Baker' ),
        'edit_item'          => __( 'Edit Baker' ),
        'view_item'          => __( 'View Baker' ),
        'all_items'          => __( 'All Bakers' ),
        'search_items'       => __( 'Search Bakers' ),
        'parent_item_colon'  => __( 'Parent Bakers:' ),
        'not_found'          => __( 'No bakers found.' ),
        'not_found_in_trash' => __( 'No bakers found in Trash.' ),
        'archives'           => __( 'Baker Archives'),
        'insert_into_item'   => __( 'Insert into baker'),
        'uploaded_to_this_item' => __( 'Uploaded to this baker'),
        'filter_item_list'   => __( 'Filter bakers list'),
        'items_list_navigation' => __( 'Bakers list navigation'),
        'items_list'         => __( 'Bakers list'),
        'featured_image'     => __( 'Baker featured image'),
        'set_featured_image' => __( 'Set baker featured image'),
        'remove_featured_image' => __( 'Remove baker featured image'),
        'use_featured_image' => __( 'Use as feature image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'bakers' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
    );
    register_post_type( 'bakehouse-baker', $args );
    

    // Location CPT

    
    $labels = array(
        'name'               => _x( 'Locations', 'post type general name' ),
        'singular_name'      => _x( 'Location', 'post type singular name'),
        'menu_name'          => _x( 'Locations', 'admin menu' ),
        'name_admin_bar'     => _x( 'Loaction', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'location' ),
        'add_new_item'       => __( 'Add New Location' ),
        'new_item'           => __( 'New Location' ),
        'edit_item'          => __( 'Edit Location' ),
        'view_item'          => __( 'View Location' ),
        'all_items'          => __( 'All Locations' ),
        'search_items'       => __( 'Search Locations' ),
        'parent_item_colon'  => __( 'Parent Locations:' ),
        'not_found'          => __( 'No locations found.' ),
        'not_found_in_trash' => __( 'No locations found in Trash.' ),
        'archives'           => __( 'Location Archives'),
        'insert_into_item'   => __( 'Insert into location'),
        'uploaded_to_this_item' => __( 'Uploaded to this location'),
        'filter_item_list'   => __( 'Filter bakers list'),
        'items_list_navigation' => __( 'Locations list navigation'),
        'items_list'         => __( 'Locations list'),
        'featured_image'     => __( 'Location featured image'),
        'set_featured_image' => __( 'Set location featured image'),
        'remove_featured_image' => __( 'Remove location featured image'),
        'use_featured_image' => __( 'Use as feature image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'locations' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-location',
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
    );
    register_post_type( 'bakehouse-location', $args );
    



    // Job CPT


    $args = array(
        'public'       => true,
        'label'        => 'Job Postings',
        'show_in_rest' => true,
        'has_archive'  => true,
        'rewrite'      => array( 'slug' => 'careers' ),
        'template'     => array(
            array( 'core/heading', array( 'level' => '3', 'content' => 'Role', ) ),
            array( 'core/paragraph', array( 'placeholder' => 'Describe the role...' ) ),
            array( 'core/heading', array( 'level' => '3', 'content' => 'Requirements' ) ),
            array( 'core/list' ),
            array( 'core/heading', array( 'level' => '3', 'content' => 'Location' ) ),
            array( 'core/paragraph' ),
            array( 'core/heading', array( 'level' => '3', 'content' => 'How to Apply' ) ),
            array( 'core/paragraph' ),
        ),
        'template_lock' => 'all',
    );
    register_post_type( 'job-posting', $args );

  
}
add_action( 'init', 'bakehouse_register_custom_post_types' );

function bakehouse_register_taxonomies() {

    // // Job taxonomy


    $labels = array(
        'name'              => _x( 'Job Locations', 'taxonomy general name' ),
        'singular_name'     => _x( 'Job Location', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Job Locations' ),
        'all_items'         => __( 'All Job Location' ),
        'parent_item'       => __( 'Parent Job Location' ),
        'parent_item_colon' => __( 'Parent Job Location:' ),
        'edit_item'         => __( 'Edit Job Location' ),
        'view_item'         => __( 'Vview Job Location' ),
        'update_item'       => __( 'Update Job Location' ),
        'add_new_item'      => __( 'Add New Job Location' ),
        'new_item_name'     => __( 'New Job Location Name' ),
        'menu_name'         => __( 'Job Location' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'job-location' ),
    );
    register_taxonomy( 'job-category', array( 'job-posting' ), $args );
    
 


}add_action( 'init', 'bakehouse_register_taxonomies');


//when activating this theme, flush permalinks
function bakehouse_rewrite_flush() {
	bakehouse_register_custom_post_types();
	bakehouse_register_taxonomies();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'bakehouse_rewrite_flush' );

?>