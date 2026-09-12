<?php
/**
 * Programmatically create a Project post and populate its ACF Flexible Content field.
 */
function automatic_project_generator() {

    // 1. Guard Condition: Prevent creating duplicate posts on page refreshes
    $post_title    = 'Automated Showcase Project';

    $existing_query = new WP_Query( array(
        'post_type'              => 'project',
        'title'                  => $post_title,
        'posts_per_page'         => 1,
        'post_status'            => 'any',
        'no_found_rows'          => true,
        'update_post_term_cache' => false,
        'update_post_meta_cache' => false,
    ) );

    if ( $existing_query->have_posts() ) {
        return; // Post already exists, stop execution
    }

    // 2. Create the new Project CPT post in wp_posts
    $post_id = wp_insert_post( array(
        'post_title'   => $post_title,
        'post_content' => '', // Content is managed via ACF Flexible Content
        'post_status'  => 'publish',
        'post_type'    => 'project',
    ) );

    // 3. Verify post creation succeeded and populate fields
    if ( $post_id && ! is_wp_error( $post_id ) ) {

        // Assign Custom Taxonomy term ('project_type')
        wp_set_object_terms( $post_id, 'web-design', 'project_type' );

        // Define the 3 Flexible Content Layouts
        $flexible_content_data = array(

            // Layout 1: Hero
            array(
                'acf_fc_layout'    => 'hero', // Layout slug name defined in ACF
                'title'            => 'Automated Showcase Hero',
                'subtitle'         => 'Generated programmatically via PHP and update_field().',
                'background_image' => 30, // Attachment ID of an image in your Media Library
            ),

            // Layout 2: Text Block
            array(
                'acf_fc_layout' => 'text_block',
                'heading'       => 'About This Automated Case Study',
                'content'       => '<p>This content was inserted using <code>update_field()</code> to demonstrate programmatic population of ACF Flexible Content layout sections.</p>',
            ),

            // Layout 3: Stats (Contains a Repeater field)
            array(
                'acf_fc_layout' => 'stats_section',
                'section_title' => 'Project Impact & Metrics',
                'stat_items'    => array(
                    array(
                        'number' => 100,
                        'label'  => 'Automated Execution',
                    ),
                    array(
                        'number' => 1,
                        'label'  => 'Population Time',
                    ),
                ),
            ),

        );

        // Populate the ACF Flexible Content field ('page_sections')
        update_field( 'page_sections', $flexible_content_data, $post_id );
    }
}

// Hook to admin_init to ensure ACF and WordPress core functions are fully loaded
add_action( 'admin_init', 'automatic_project_generator' );