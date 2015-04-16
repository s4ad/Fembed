<?php
/**
 * Plugin Name: s4_embed
 * Description: embed Facebook videos easly 
 * Plugin URI:  
 * Version:     0.0.1
 * Author:      saad
 **/

add_action( 'admin_head', 's4_embed_tinymce' );
function s4_embed_tinymce() {
    global $typenow;

    // only on Post Type: post and page
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return ;

    add_filter( 'mce_external_plugins', 's4_embed_tinymce_plugin' );
    // Add to line 1 form WP TinyMCE
    add_filter( 'mce_buttons', 's4_embed_tinymce_button' );
}

// inlcude the js for tinymce
function s4_embed_tinymce_plugin( $plugin_array ) {

    $plugin_array['s4_embed'] = plugins_url( '/s4_embed.js', __FILE__ );
    // Print all plugin js path
    
    return $plugin_array;
}

// Add the button key for address via JS
function s4_embed_tinymce_button( $buttons ) {

    array_push( $buttons, 's4_embed_button_key' );
    // Print all buttons
    
    return $buttons;
}
