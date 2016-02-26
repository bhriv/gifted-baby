<?php
/**
 * Roots includes
 */
require_once locate_template('/lib/utils.php');           // Utility functions
require_once locate_template('/lib/init.php');            // Initial theme setup and constants
require_once locate_template('/lib/sidebar.php');         // Sidebar class
require_once locate_template('/lib/config.php');          // Configuration
require_once locate_template('/lib/activation.php');      // Theme activation
require_once locate_template('/lib/cleanup.php');         // Cleanup
require_once locate_template('/lib/nav.php');             // Custom nav modifications
require_once locate_template('/lib/comments.php');        // Custom comments modifications
require_once locate_template('/lib/rewrites.php');        // URL rewriting for assets
require_once locate_template('/lib/htaccess.php');        // HTML5 Boilerplate .htaccess
require_once locate_template('/lib/widgets.php');         // Sidebars and widgets
require_once locate_template('/lib/scripts.php');         // Scripts and stylesheets
require_once locate_template('/lib/custom.php');          // Custom functions

add_action( 'woocommerce_thankyou', 'redirect_custom');

function redirect_custom( $order_id ){
    $order = new WC_Order( $order_id );
    $items = $order->get_items();
    foreach ( $items as $item ) {
        $product_id = $item['product_id'];
    }
    $custom_redirect = get_post_meta($product_id,'checkout_redirect', true );
    
    if($custom_redirect != ''){
       $url = get_the_permalink($custom_redirect);

       if ( $order->status != 'failed' ) {
           wp_redirect($url);
       }
    }    
    
}