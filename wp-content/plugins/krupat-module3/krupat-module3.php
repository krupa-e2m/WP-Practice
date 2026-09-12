<?php
/**
 * Plugin Name: E2M Training — Krupa Thakkar
 * Description: Module 3 hook experiments.
 * Version:     1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:      Krupa Thakkar
 * License:     GPL-2.0-or-later
 * Text Domain: e2m-training
 */

// Never let the file be loaded directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Example1
add_filter('the_content' , 'module3_append_to_content');

function module3_append_to_content($content){
    $lastLine = "This is the end of content. Thank You for Reading!";
    $content = $content.$lastLine; 
    return $content;
}

//Example2
add_action('wp_footer' , 'module3_add_to_footer' ,20);
function module3_add_to_footer(){
    echo "<p style='text-align:center'>Hey , I am FOOTER!!</p>";
}


//Example 3 
add_action( 'init', 'module3_register_custom_post_type' );

function module3_register_custom_post_type() {
    $args = array(
        'labels' => array(
            'name'          => 'Books',
            'singular_name' => 'Book',
            'add_new_item'  => 'Add New Book',
            'edit_item'     => 'Edit Book',
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-book',
        'supports'     => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest' => true, // Enables Gutenberg Block Editor
    );

    register_post_type( 'krupat_book', $args );
}


// Example4 - Func1
add_filter('the_title' , 'module3_change_title_bg',20);

function module3_change_title_bg($title){
    if (!in_the_loop() ) {
           return $title; }
    $title = "<span style='background-color: #d9534f; color: #ffffff; padding: 4px 12px; border-radius: 4px; font-weight: bold; display: inline-block;'>".$title."</span>";
    return $title;
}

// Example4 - Func2
add_filter('the_title' , 'module3_change_title_bg2',5);

function module3_change_title_bg2($title){
    if (!in_the_loop() ) {
           return $title; }
    $title = "<span style='background-color: #337ab7; color: #ffffff; padding: 4px 12px; border-radius: 4px; font-weight: bold; display: inline-block;'>".$title."</span>";
    return $title;
}

//Example5
add_action( 'save_post', 'module3_log_save_post', 10, 2 );

function module3_log_save_post( $post_id, $post ) {
    //While editing post , wordpress saves post every 60 seconds automatically. Doing so triggers the save_post hook. To avoid logging during autosave, we can check if the current save is an autosave and skip logging in that case.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    //On clicking save or publish , wp calls save_post for 2 times : FGor original post and for the revision. To avoid logging for revisions, we can check if the current post is a revision and skip logging in that case.
    if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) ) {
        return;
    }

    // 3. Log the Post ID and Post Object to debug.log
    error_log( '--- Module 3 Save Post Triggered ---' );
    error_log( 'Post ID: ' . $post_id );
    error_log( 'Post Title: ' . $post->post_title );

}

// add_action('save_post' , 'print_confirmation_message');
// function print_confirmation_message($post_id) {
//     // wp_update_post(array(
//     //     'ID'         => $post_id,
//     //     'post_title' => 'Updated title',
//     // ));

//     error_log('Post saved: ' . $post_id);
// }

// Hook into save_post
// add_action( 'save_post', 'my_broken_save_post_callback', 10, 2 );

// function my_broken_save_post_callback( $post_id, $post ) {

//     $updated_post = array(
//         'ID'         => $post_id,
//         'post_title' => $post->post_title . ' [Updated]',
//     );

//     // THIS CALL CAUSES THE INFINITE LOOP
//     wp_update_post( $updated_post ); 
// }

//safer way 
    // If you need to update the post inside this hook, calling wp_update_post()
    // will trigger 'save_post' AGAIN, causing an infinite loop and crashing PHP.
    // 
    // To prevent this, unhook the callback before updating and re-hook it after:
    //
    // remove_action( 'save_post', 'module3_log_save_post', 10 );
    // wp_update_post( array( 'ID' => $post_id, 'post_title' => 'Updated Title' ) );
    // add_action( 'save_post', 'module3_log_save_post', 10, 2 );


//Example 6 
add_action('wp_footer', 'module3_render_custom_banner');

function module3_render_custom_banner() {
    $default_message = 'End of Practice Plugin!';
    
    // Allow external code/plugins to modify $default_message
    $filtered_message = apply_filters( 'module3_custom_banner_text', $default_message );

    // Output the resulting message
    echo '<div style="background: #e7f3fe; border-left: 6px solid #2196F3; padding: 10px; margin: 20px 0;">';
    echo '<p><strong>Banner:</strong> ' . esc_html( $filtered_message ) . '</p>';
    echo '</div>';

    // Fire a Custom Action Hook immediately after rendering the banner
    do_action( 'module3_after_custom_banner', $filtered_message );
}




