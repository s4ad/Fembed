<?php
/**

Plugin Name: fembed - Facebook videos embeder
Plugin URI: https://github.com/s4ad/Fembed
Description: Embed Facebook videos easily
Version: 1.0.1
Author: Saad Bouteraa
Author URI: https://github.com/s4ad/

 **/
 

add_action( 'admin_head', 'fembed_tinymce' );
function fembed_tinymce() {
    global $typenow;

    // only on Post Type: post and page
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return ;

    add_filter( 'mce_external_plugins', 'fembed_tinymce_plugin' );
    // Add to line 1 form WP TinyMCE
    add_filter( 'mce_buttons', 'fembed_tinymce_button' );
}

// inlcude the js for tinymce
function fembed_tinymce_plugin( $plugin_array ) {

    $plugin_array['fembed'] = plugins_url( '/fembed.js', __FILE__ );
    
    
    return $plugin_array;
}

// Add the button key for address via JS
function fembed_tinymce_button( $buttons ) {

    array_push( $buttons, 'fembed_button_key' );
    // Print all buttons
    
    return $buttons;
}
