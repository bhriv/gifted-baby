<?php
/**
 * Enqueue scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/static/css/bootstrap.css
 * 2. /theme/static/css/bootstrap-responsive.css
 * 3. /theme/static/css/app.css
 * 4. /child-theme/style.css (if a child theme is activated)
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.9.1.min.js via Google CDN
 * 2. /theme/static/js/vendor/modernizr-2.6.2.min.js
 * 3. /theme/static/js/plugins.js (in footer)
 * 4. /theme/static/js/main.js    (in footer)
 */
function roots_scripts() {

  $current_post_type = get_post_type();

  // Load style.css from child theme
  if (is_child_theme()) {
    wp_enqueue_style('roots_child', get_stylesheet_uri(), false, null);
  }

  /* Deactive Plugin scripts
  * - css files are imported via the screen.scss file
  * - new versions of plugins should keep the same file location so updating should be fine
  * - when adding a new plugin check the source code for the file location, locate the handle, deregister_style using handle
  * - add the file to the sass > screen.scss file
  * - import the screen.css file via the child theme style.css
  */ 
  // wp_enqueue_script( 'wp-api' );
  
  // Remove unsed Wordpress Styles 

  wp_deregister_style('dashicons');


  // UserPro > functions > hooks-actions
  
  wp_deregister_style( 'userpro_google_font' );
  wp_deregister_style( 'userpro_min' );
  wp_deregister_style( 'userpro_lightview' );
  wp_deregister_style( 'userpro_jquery_ui_style' );
  wp_deregister_style( 'userpro_skin_min' );
  wp_deregister_style( 'userpro_skin_custom' );
  
  // UserPro Messages
  wp_deregister_style( 'userpro_msg' );
  wp_deregister_style( 'userpro_mcsroll' );

  // Stripe Plugin Pro
  // wp_deregister_style( 'stripe-checkout-pro-public-pro' );
  // wp_deregister_style( 'stripe-checkout-css' );
  // wp_deregister_style( 'pikaday' );
  

  // Wordpress SEO
  wp_deregister_style( 'boxes' );

  // Advanced Custom Post Search
  wp_deregister_style( 'acps-frontend-styles' );


// Deregister Scripts
  // Scrips loaded via codekit inline import rules in master.js

  // Wordpress Core
  wp_deregister_script('admin-bar');
  wp_deregister_script('jquery-ui-core');
  wp_deregister_script('jquery-ui-datepicker');


  // User Pro
  wp_deregister_script( 'userpro_swf' );
  wp_deregister_script( 'userpro_spinners' );
  wp_deregister_script( 'userpro_lightview' );
  wp_deregister_script( 'userpro_min' );
  
  // User Pro Messaging
  wp_deregister_script( 'userpro_ed' );
  wp_deregister_script( 'userpro_msg' );
  wp_deregister_script( 'userpro_textarea_auto' );
  wp_deregister_script( 'userpro_mousewheel' );
  wp_deregister_script( 'userpro_mcsroll' );
  
  // User Pro Social
  wp_deregister_script( 'userpro_sc' );
  
  // Stripe Checkout Pro
  if ( ($current_post_type != 'session') && ($current_post_type != 'invoice')  ) {
    wp_deregister_script( 'stripe-checkout' );
    wp_deregister_script( 'parsley' );
    wp_deregister_script( 'moment' );
    wp_deregister_script( 'pikaday' );
    wp_deregister_script( 'pikaday-jquery' );  
  }

  // If loading js via codekit then add this to master.js: 

    // @codekit-prepend "../wp-content/plugins/stripe-checkout-pro/public/js/moment.min.js";
    // @codekit-prepend "../wp-content/plugins/stripe-checkout-pro/public/js/parsley.min.js";
    // @codekit-prepend "../wp-content/plugins/stripe-checkout-pro/public/js/pikaday.js";
    // @codekit-prepend "../wp-content/plugins/stripe-checkout-pro/public/js/pikaday.jquery.js";


  // jQuery is loaded using the same method from HTML5 Boilerplate:
  // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.

  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js', false, null, false);  
    add_filter('script_loader_src', 'roots_jquery_local_fallback', 10, 2);
  }
  wp_register_script('jquery', site_url() . '/static/js/vendor/jquery-1.10.1.min.js', false, null, false);
  //wp_register_script('jquery', get_template_directory_uri() . '/static/js/vendor/jquery-1.9.1.min.js', false, null, false);
  wp_enqueue_script('jquery');
    

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  //http://stackoverflow.com/questions/8132173/show-div-once-a-day
  //wp_register_script('cookie_master', get_stylesheet_directory_uri() . '/static/js/jquery.cookie.js', false, null, true);
  //wp_enqueue_script('cookie_master');

  //Site Loading Animation
  //wp_register_script('ivd_percentage_loader', get_stylesheet_directory_uri() . '/static/percentage-loader/js/percentage-loader.js', false, null, true);
  //wp_enqueue_script('ivd_percentage_loader');
  
  
  
// MAPBOX
  // || is_front_page()
  
  // if ( is_page( array('Search','Search Results','Near Me','Near', 'Find','Mapbox', 'Advanced Search') ) || is_post_type_archive('studio') || is_tax() || is_search() ) {
  //   wp_enqueue_script('mapjs','http://api.tiles.mapbox.com/mapbox.js/v1.6.0/mapbox.js', fasle, null ,true);
  //   wp_enqueue_script('mapjs');
  // }

  // @codekit-prepend "../vendor/mapbox/mapbox.js";
  // screen.scss > @import "../vendor/mapbox/mapbox.css";

  // if ( is_page( array('Slides') ) || get_post_type() == 'studio' ) {
  //   wp_enqueue_script('rslides', site_url() . 'vendor/ResponsiveSlides.js/responsiveslides.min.js', fasle, null ,true);
  //   wp_enqueue_script('rslides');
  //   wp_enqueue_style('rslides', site_url() . 'vendor/ResponsiveSlides.js/responsiveslides.css','1.0.0',true);
  // }

  // jquery.geocomplete.js
  // wp_register_script('geocomplete',  site_url() . '/static/js/vendor/jquery.geocomplete.js', false, null, false); // get_template_directory_uri() . 
  // wp_enqueue_script('geocomplete');

  // wp_enqueue_script('roots_main');
  wp_enqueue_script('roots_plugins');


}
add_action('wp_enqueue_scripts', 'roots_scripts', 100);


// http://wordpress.stackexchange.com/a/12450
function roots_jquery_local_fallback($src, $handle) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . site_url() . '/static/js/vendor/jquery-1.9.1.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}