<?php
/*
Plugin Name: WebVerge Performance Tweaker
Description:  WordPress Performance Optimizer helps you to speed up your website & also disables Gutenberg Editor
Version: 1.0.1
Author: Xaif
Author URI: https://webverge.io
License: GPL-2.0 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Domain Path:     /languages
*/

function wp_font_removal() {
   wp_dequeue_style( 'fontawesome' );
}
add_action( 'wp_print_styles', 'wp_font_removal', 100 );


function gk_dns_prefetch() {
echo '<meta http-equiv="x-dns-prefetch-control" content="on">
<link rel="dns-prefetch" href="//pagead2.googlesyndication.com" />
<link rel="preconnect" href="https://pagead2.googlesyndication.com" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" />
<link rel="preconnect" href="https://tpc.googlesyndication.com" />
<link rel="preconnect" href="https://cdn.statically.io" />
';
}
add_action('wp_head', 'gk_dns_prefetch', 0);



// Enforce classic editor
// Remove block css
function remove_block_css() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'remove_block_css', 20 );


// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);
