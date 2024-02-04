<?php
/**
 * Custom Post Types
 *
 * @package YourThemeName
 */

/**
 * Register Custom Post Type 1
 */
function custom_post_type_1() {
    $labels = array(
        'name'                  => _x( 'Custom Post Type 1', 'Post type general name', 'yourthemename' ),
        'singular_name'         => _x( 'Custom Post Type 1', 'Post type singular name', 'yourthemename' ),
        'menu_name'             => _x( 'Custom Post Type 1', 'Admin Menu text', 'yourthemename' ),
        'name_admin_bar'        => _x( 'Custom Post Type 1', 'Add New on Toolbar', 'yourthemename' ),
        'add_new'               => __( 'Add New', 'yourthemename' ),
        'add_new_item'          => __( 'Add New Custom Post Type 1', 'yourthemename' ),
        'new_item'              => __( 'New Custom Post Type 1', 'yourthemename' ),
        'edit_item'             => __( 'Edit Custom Post Type 1', 'yourthemename' ),
        'view_item'             => __( 'View Custom Post Type 1', 'yourthemename' ),
        'all_items'             => __( 'All Custom Post Type 1', 'yourthemename' ),
        'search_items'          => __( 'Search Custom Post Type 1', 'yourthemename' ),
        'parent_item_colon'     => __( 'Parent Custom Post Type 1:', 'yourthemename' ),
        'not_found'             => __( 'No Custom Post Type 1 found.', 'yourthemename' ),
        'not_found_in_trash'    => __( 'No Custom Post Type 1 found in Trash.', 'yourthemename' ),
        'featured_image'        => _x( 'Custom Post Type 1 Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'yourthemename' ),
        'set_featured_image'    => _x( 'Set Custom Post Type 1 Image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'yourthemename' ),
        'remove_featured_image' => _x( 'Remove Custom Post Type 1 Image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'yourthemename' ),
        'use_featured_image'    => _x( 'Use as Custom Post Type 1 Image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'yourthemename' ),
        'archives'              => _x( 'Custom Post Type 1 Archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'yourthemename' ),
        'insert_into_item'      => _x( 'Insert into Custom Post Type 1', 'Overrides the "Insert into post"/ "Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'yourthemename' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Custom Post Type 1', 'Overrides the "Uploaded to this post"/ "Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'yourthemename' ),
        'filter_items_list'     => _x( 'Filter Custom Post Type 1 list', 'Screen reader text for filter links heading on post type listing screen. Default "Filter posts list". Added in 4.4', 'yourthemename' ),
        'items_list_navigation'  => _x( 'Custom Post Type 1 list navigation', 'Screen reader text for the pagination heading on post type listing screen. Default "Posts list navigation". Added in 4.4', 'yourthemename' ),
        'items_list'            => _x( 'Custom Post Type 1 list', 'Screen reader text for the items list heading on post type listing screen. Default "Posts list". Added in 4.4', 'yourthemename' ),
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'custom-post-type-1' ), // Customize the slug.
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false, // Set to true for hierarchical (like pages) post type.
        'menu_position'         => null,
        'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ), // Customize supported features.
    );

    register
