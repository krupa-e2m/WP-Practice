<?php
/**
 * Plugin Name: Register custom route
 * Description: Custom route registration for the REST API.
 * Version:     1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:      Krupa Thakkar
 * License:     GPL-2.0-or-later
 */

// Never let the file be loaded directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'rest_api_init', 'e2m_register_project_count_route' );

function e2m_register_project_count_route() {

    register_rest_route(
        'e2m/v1',
        '/projects/count',
        [
            'methods'             => 'GET',
            'callback'            => 'e2m_get_project_count',
            'permission_callback' => function () {

                return current_user_can( 'edit_posts' );

            },
        ]
    );

}

function e2m_get_project_count( WP_REST_Request $request ) {

    // The CPT is registered by the theme, so it can legitimately be absent.
    // wp_count_posts() returns a bare stdClass in that case, which would
    // otherwise raise an undefined-property warning inside the JSON body.
    if ( ! post_type_exists( 'project' ) ) {
        return new WP_Error(
            'e2m_post_type_missing',
            __( 'The project post type is not registered.', 'e2m' ),
            [ 'status' => 404 ]
        );
    }

    $project_count = wp_count_posts( 'project' );

    return [
        'post_type' => 'project',
        'status'    => 'publish',
        'count'     => isset( $project_count->publish ) ? (int) $project_count->publish : 0,
    ];

}
