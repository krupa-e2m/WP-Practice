<?php
/**
 * Register Project Custom Post Type and Custom Taxonomy.
 */

function e2m_register_project_cpt() {

    // 1. Register Custom Taxonomy: project_type
    $taxonomy_labels = array(
        'name'              => _x( 'Project Types', 'taxonomy general name', '_s' ),
        'singular_name'     => _x( 'Project Type', 'taxonomy singular name', '_s' ),
        'search_items'      => __( 'Search Project Types', '_s' ),
        'all_items'         => __( 'All Project Types', '_s' ),
        'parent_item'       => __( 'Parent Project Type', '_s' ),
        'parent_item_colon' => __( 'Parent Project Type:', '_s' ),
        'edit_item'         => __( 'Edit Project Type', '_s' ),
        'update_item'       => __( 'Update Project Type', '_s' ),
        'add_new_item'      => __( 'Add New Project Type', '_s' ),
        'new_item_name'     => __( 'New Project Type Name', '_s' ),
        'menu_name'         => __( 'Project Types', '_s' ),
    );

    $taxonomy_args = array(
        'hierarchical'      => true, // Behaves like Categories
        'labels'            => $taxonomy_labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'project-type' ),
        'show_in_rest'      => true, // Essential for REST API and Block Editor
    );

    register_taxonomy( 'project_type', array( 'project' ), $taxonomy_args );

    // 2. Register Custom Post Type: project
    $cpt_labels = array(
        'name'               => _x( 'Projects', 'post type general name', '_s' ),
        'singular_name'      => _x( 'Project', 'post type singular name', '_s' ),
        'menu_name'          => _x( 'Projects', 'admin menu', '_s' ),
        'name_admin_bar'     => _x( 'Project', 'add new on admin bar', '_s' ),
        'add_new'            => _x( 'Add New', 'project', '_s' ),
        'add_new_item'       => __( 'Add New Project', '_s' ),
        'new_item'           => __( 'New Project', '_s' ),
        'edit_item'          => __( 'Edit Project', '_s' ),
        'view_item'          => __( 'View Project', '_s' ),
        'all_items'          => __( 'All Projects', '_s' ),
        'search_items'       => __( 'Search Projects', '_s' ),
        'parent_item_colon'  => __( 'Parent Projects:', '_s' ),
        'not_found'          => __( 'No projects found.', '_s' ),
        'not_found_in_trash' => __( 'No projects found in Trash.', '_s' ),
    );

    $cpt_args = array(
        'labels'             => $cpt_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'projects' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio', // Dashboard icon
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
        'show_in_rest'       => true, // Mandatory for REST API and AI tooling
    );

    register_post_type( 'project', $cpt_args );
}
// Always register on init
add_action( 'init', 'e2m_register_project_cpt' );