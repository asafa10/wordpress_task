<?php

function custom_post_type_events() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Events', 'Post Type General Name', 'twentyseventeen' ),
        'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'twentyseventeen' ),
        'menu_name'           => __( 'Events', 'twentyseventeen' ),
        'parent_item_colon'   => __( 'Parent Movie', 'twentyseventeen' ),
        'all_items'           => __( 'All Events', 'twentyseventeen' ),
        'view_item'           => __( 'View Events', 'twentyseventeen' ),
        'add_new_item'        => __( 'Add New Event', 'twentyseventeen' ),
        'add_new'             => __( 'Add New Event', 'twentyseventeen' ),
        'edit_item'           => __( 'Edit Event', 'twentyseventeen' ),
        'update_item'         => __( 'Update Event', 'twentyseventeen' ),
        'search_items'        => __( 'Search Event', 'twentyseventeen' ),
        'not_found'           => __( 'Event not Found', 'twentyseventeen' ),
        'not_found_in_trash'  => __( 'Event not found in Trash', 'twentyseventeen' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'events', 'twentyseventeen' ),
        'description'         => __( 'Events and Reviews', 'twentyseventeen' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', '', '', 'author', 'thumbnail', '', 'revisions', '', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 14,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'events', $args );
 
}
 
/* 
* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
add_action( 'init', 'custom_post_type_events', 0 );
