<?php
/**
 * Plugin Name: A-Module 3 Extension
 * Description: Tiny extension plugin to hook into module3 custom action and filter.
 * Version:     1.0.0
 * Author:      Krupa Thakkar
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

// Modify the text via the custom filter hook 'module3_custom_banner_text'
add_filter( 'module3_custom_banner_text', 'module3_modify_banner_text' );

function module3_modify_banner_text( $message ) {
    return $message . ' (Modified by Extension Plugin!)';
}

// Run custom logic via the action hook 'module3_after_custom_banner'
 
add_action( 'module3_after_custom_banner', 'module3_extend_log_after_banner', 10, 1 );

function module3_extend_log_after_banner( $message ) {
    echo '<p style="color: green; font-size: 12px;">[Extension Action Triggered] The banner message displayed was: "' . esc_html( $message ) . '"</p>';
}

//Remove the footer action registered. We hook into 'wp_loaded' to ensure that our removal happens after the original action has been added.
remove_action( 'wp_footer', 'module3_add_to_footer', 20 );