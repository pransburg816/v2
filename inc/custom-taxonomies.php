<?php
/**
 * Custom Taxonomies
 *
 * @package YourThemeName
 */

/**
 * Register Custom Taxonomy 1
 */
function custom_taxonomy_1() {
    $labels = array(
        'name'              => _x( 'Custom Taxonomy 1', 'taxonomy general name', 'yourthemename' ),
        'singular_name'     => _x( 'Custom Taxonomy 1', 'taxonomy singular name', 'yourthemename' ),
        'search_items'      => __( 'Search Custom Taxonomy 1', 'yourthemename' ),
        'all_items'         => __( 'All Custom Taxonomy 1', 'yourthemename' ),
        'parent_item'       => __( 'Parent Custom Taxonomy 1', 'yourthemename' ),
        'parent_item_colon' => __( 'Parent Custom Taxonomy 1:', 'yourthemename' ),
        'edit_item'         => __( 'Edit Custom Taxonomy 1', 'yourthemename' ),
        'update_item'       => __( 'Update Custom Taxonomy 1', 'yourthemename' ),
        'add_new_item'      => __( 'Add New Custom Taxonomy 1', 'yourthemename' ),
        'new_item_name'     => __( 'New Custom Taxonomy 1 Name', 'yourthemename' ),
        'menu_name'         => __( 'Custom Taxonomy 1', 'yourthemename' ),
    );

    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'hierarchical'      => true, // Set to false for non-hierarchical (tags-like) taxonomy.
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'custom-taxonomy-1' ), // Customize the slug.
    );

    register_taxonomy( 'custom_taxonomy_1', array( 'post' ), $args );
}
add_action( 'init', 'custom_taxonomy_1', 0 ); // You can adjust the priority (0) as needed.

/**
 * Register Custom Taxonomy 2
 */
function custom_taxonomy_2() {
    $labels = array(
        'name'              => _x( 'Custom Taxonomy 2', 'taxonomy general name', 'yourthemename' ),
        'singular_name'     => _x( 'Custom Taxonomy 2', 'taxonomy singular name', 'yourthemename' ),
        // Add labels and arguments for Custom Taxonomy 2 as needed.
    );

    $args = array(
        // Customize the arguments for Custom Taxonomy 2 as needed.
    );

    register_taxonomy( 'custom_taxonomy_2', array( 'post' ), $args );
}
add_action( 'init', 'custom_taxonomy_2', 0 ); // You can adjust the priority (0) as needed.
