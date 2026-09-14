<?php
/**
 * Projects custom post type + its taxonomy.
 *
 * The "Latest projects" section queries this, so the theme registers it rather
 * than depending on a plugin being active.
 *
 * @package PixeSaaS
 */

/**
 * Register the `project` post type.
 */
function pixesaas_register_project_cpt() {
	$labels = array(
		'name'                  => _x( 'Projects', 'Post type general name', 'pixesaas' ),
		'singular_name'         => _x( 'Project', 'Post type singular name', 'pixesaas' ),
		'menu_name'             => _x( 'Projects', 'Admin Menu text', 'pixesaas' ),
		'add_new'               => __( 'Add New', 'pixesaas' ),
		'add_new_item'          => __( 'Add New Project', 'pixesaas' ),
		'edit_item'             => __( 'Edit Project', 'pixesaas' ),
		'new_item'              => __( 'New Project', 'pixesaas' ),
		'view_item'             => __( 'View Project', 'pixesaas' ),
		'view_items'            => __( 'View Projects', 'pixesaas' ),
		'search_items'          => __( 'Search Projects', 'pixesaas' ),
		'not_found'             => __( 'No projects found.', 'pixesaas' ),
		'not_found_in_trash'    => __( 'No projects found in Trash.', 'pixesaas' ),
		'all_items'             => __( 'All Projects', 'pixesaas' ),
		'featured_image'        => __( 'Project image', 'pixesaas' ),
		'set_featured_image'    => __( 'Set project image', 'pixesaas' ),
		'remove_featured_image' => __( 'Remove project image', 'pixesaas' ),
		'archives'              => __( 'Project archives', 'pixesaas' ),
	);

	register_post_type(
		'project',
		array(
			'labels'       => $labels,
			'public'       => true,
			'has_archive'  => true,
			'menu_icon'    => 'dashicons-portfolio',
			'menu_position' => 20,
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes' ),
			'rewrite'      => array( 'slug' => 'projects' ),
			'show_in_rest' => true,
			'taxonomies'   => array( 'project_type' ),
		)
	);
}
add_action( 'init', 'pixesaas_register_project_cpt' );

/**
 * Register the `project_type` taxonomy.
 */
function pixesaas_register_project_taxonomy() {
	$labels = array(
		'name'              => _x( 'Project types', 'taxonomy general name', 'pixesaas' ),
		'singular_name'     => _x( 'Project type', 'taxonomy singular name', 'pixesaas' ),
		'search_items'      => __( 'Search project types', 'pixesaas' ),
		'all_items'         => __( 'All project types', 'pixesaas' ),
		'edit_item'         => __( 'Edit project type', 'pixesaas' ),
		'update_item'       => __( 'Update project type', 'pixesaas' ),
		'add_new_item'      => __( 'Add new project type', 'pixesaas' ),
		'new_item_name'     => __( 'New project type', 'pixesaas' ),
		'menu_name'         => __( 'Project types', 'pixesaas' ),
	);

	register_taxonomy(
		'project_type',
		array( 'project' ),
		array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array( 'slug' => 'project-type' ),
		)
	);
}
add_action( 'init', 'pixesaas_register_project_taxonomy' );

/**
 * Flush rewrite rules once after the CPT lands, so /projects/ works without a
 * manual visit to Settings → Permalinks.
 */
function pixesaas_maybe_flush_rewrites() {
	if ( get_option( 'pixesaas_rewrites_flushed' ) === _S_VERSION ) {
		return;
	}

	flush_rewrite_rules( false );
	update_option( 'pixesaas_rewrites_flushed', _S_VERSION );
}
add_action( 'init', 'pixesaas_maybe_flush_rewrites', 99 );
