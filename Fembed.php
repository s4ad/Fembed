<?php
/**
 * Plugin Name: Fembed
 * Description: Embed Facebook videos easily 
 * Plugin URI:  https://github.com/s4ad/Fembed
 * Version:     0.0.1
 * Author:      Saad Bouteraa
 **/

add_action( 'admin_head', 'Fembed_tinymce' );
function Fembed_tinymce() {
    global $typenow;

    // only on Post Type: post and page
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return ;

    add_filter( 'mce_external_plugins', 'Fembed_tinymce_plugin' );
    // Add to line 1 form WP TinyMCE
    add_filter( 'mce_buttons', 'Fembed_tinymce_button' );
}

// inlcude the js for tinymce
function s4_embed_tinymce_plugin( $plugin_array ) {

    $plugin_array['Fembed'] = plugins_url( '/Fembed.js', __FILE__ );
    // Print all plugin js path
    
    return $plugin_array;
}

// Add the button key for address via JS
function Fembed_tinymce_button( $buttons ) {

    array_push( $buttons, 'Fembed_button_key' );
    // Print all buttons
    
    return $buttons;
}
