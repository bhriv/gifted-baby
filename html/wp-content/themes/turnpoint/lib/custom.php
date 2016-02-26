<?php

// Register Options Page

// Custom functions

//Add Body Class for Browser
// http://www.jayonline.co.uk/news/wordpress-function-bodyclass-browser-detection/

add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
  global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
  if($is_lynx) $classes[] = 'lynx';
  elseif($is_gecko) $classes[] = 'gecko';
  elseif($is_opera) $classes[] = 'opera';
  elseif($is_NS4) $classes[] = 'ns4';
  elseif($is_safari) $classes[] = 'safari';
  elseif($is_chrome) $classes[] = 'chrome';
  elseif($is_IE) $classes[] = 'ie';
  else $classes[] = 'unknown';
  if($is_iphone) $classes[] = 'iphone';
  return $classes;
}

/*
Registers custom menus
*/

function register_my_menus() {
  register_nav_menus(
    array(
      'footer-nav-menu' => __( 'Footer Nav Menu' )
    )
  );
  register_nav_menus(
    array(
      'articles-nav-menu' => __( 'Articles Nav Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );



// Custom Widgets

  // register_sidebar(array(
  //   'name' => __( 'Facebook Sidebar' ),
  //   'id' => 'facebook-sidebar',
  //   'before_title' => '',
  //   'after_title' => ''
  // ));
  // register_sidebar(array(
  //   'name' => __( 'Twitter Sidebar' ),
  //   'id' => 'twitter-sidebar',
  //   'before_title' => '',
  //   'after_title' => ''
  // ));
  register_sidebar(array(
    'name' => __( 'Instagram Sidebar' ),
    'id' => 'instagram-sidebar',
    'before_title' => '',
    'after_title' => ''
  ));
  register_sidebar(array(
    'name' => __( 'Advertising Sidebar' ),
    'id' => 'advertizing-sidebar',
    'before_title' => '',
    'after_title' => ''
  ));
  register_sidebar(array(
    'name' => __( 'About Us Sidebar' ),
    'id' => 'about-us-sidebar',
    'before_title' => '',
    'after_title' => ''
  ));


  // register_sidebar(array(
  //   'name' => __( 'Contact Sidebar' ),
  //   'id' => 'contact-sidebar',
  //   'before_title' => '<h3>',
  //   'after_title' => '</h3>'
  // ));

  // register_sidebar(array(
  //   'name' => __( 'About Sidebar' ),
  //   'id' => 'about-sidebar',
  //   'before_title' => '<h3>',
  //   'after_title' => '</h3>'
  // ));


// Get user role: Use <?php echo get_user_role(); // http://wordpress.org/support/topic/how-to-get-the-current-logged-in-users-role
  function get_user_role() {
    global $current_user;
    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);
    return $user_role;
  }


// shorten excerpt length
  function custom_excerpt_length( $length ) {
    return 20;
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
  // new read more link
  function new_excerpt_more( $more ) {
    return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('more >', 'TurnPoint') . '</a>';
  }
  add_filter('excerpt_more', 'new_excerpt_more');


// Changing excerpt more
   // function new_excerpt_more_1($more) {
   // global $post;
   // return '… <a href="'. get_permalink($post->ID) . '">' . 'Read More &raquo;' . '</a>';
   // }
   // add_filter('excerpt_more', 'new_excerpt_more_1');
// Orbit Slider
  //add_image_size( 'orbit-custom', 620, 350, true ); // Custom Orbit Slider Size

//Date Picker
  // http://wordpress.org/support/topic/how-to-add-jquery-datepicker

/**** Customize Login Section *****/  
  // Custom login site url
  function my_login_logo_url() {
      return get_bloginfo( 'url' );
  }
  add_filter( 'login_headerurl', 'my_login_logo_url' );

  // Custom Site Title
  // function my_login_logo_url_title() {
  //     return 'LMFMusic';
  // }
  // add_filter( 'login_headertitle', 'my_login_logo_url_title' );

  // Welcome Message
  // function custom_login_message() {
  // $message = '<h1 class="join_message">Give your music a chance</h1><p class="join_submessage">Register / Login to get started.</p>';
  // return $message;
  // }
  // add_filter('login_message', 'custom_login_message');


/***** ADMIN DASHBOARD TWEAKS *****/

  // Add Hide Update Wordpress notices
  function hideUpdateNag() {
      remove_action( 'admin_notices', 'update_nag', 3 );
  }
  if ( !current_user_can('activate_plugins') ) {
      add_action('admin_menu','hideUpdateNag');
  }

  // Add custom links to header
  // function add_profile_admin_bar_link() {
  //  global $wp_admin_bar;
  //  if ( !is_super_admin() || !is_admin_bar_showing() )
  //    return;
  //  $wp_admin_bar->add_menu( array(
  //  'id' => 'profile_link',
  //  'title' => __( 'My Profile'),
  //  'href' => __('http://localhost:8888/wp-admin/profile.php'),
  //  ) );
  // }
  // add_action('admin_bar_menu', 'add_profile_admin_bar_link',25);


  // Hide Admin Bar for everyone except Admin
  // show admin bar only for admins
  if (!current_user_can('manage_options')) {
   add_filter('show_admin_bar', '__return_false');
  }


 /**** Add Profile Customization *****/

  // Hide extra contact methods
  // add_filter( 'user_contactmethods', 'update_contact_methods',10,1);
  // function update_contact_methods( $contactmethods ) {
  //   unset($contactmethods['aim']);  
  //   unset($contactmethods['jabber']);  
  //   unset($contactmethods['yim']);  
  //   return $contactmethods;
  // }

  // remove personal options block
  if(is_admin()){
    remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
    add_action( 'personal_options', 'prefix_hide_personal_options' );
    
    // wp_delete_term( 6, 'category' );
  }
  function prefix_hide_personal_options() {
    echo '
    <script type="text/javascript">
      jQuery(document).ready(function( $ ){
        $("#your-profile .form-table:first, #your-profile h3:first").remove();
      });
    </script>';
  }

  // Hide Info from Profile
  // add_action( 'personal_options', array ( 'T5_Hide_Profile_Bio_Box', 'start' ) );

  // /**
  //  * Captures the part with the biobox in an output buffer and removes it.
  //  *
  //  * @author Thomas Scholz, <info@toscho.de>
  //  *
  //  */
  // class T5_Hide_Profile_Bio_Box
  // {
  //     /**
  //      * Called on 'personal_options'.
  //      *
  //      * @return void
  //      */
  //     public static function start()
  //     {
  //         $action = ( IS_PROFILE_PAGE ? 'show' : 'edit' ) . '_user_profile';
  //         add_action( $action, array ( __CLASS__, 'stop' ) );
  //         ob_start();
  //     }

  //     /**
  //      * Strips the bio box from the buffered content.
  //      *
  //      * @return void
  //      */
  //     public static function stop()
  //     {
  //         $html = ob_get_contents();
  //         ob_end_clean();

  //         // remove the headline
  //         $headline = __( IS_PROFILE_PAGE ? 'About Yourself' : 'About the user' );
  //         $html = str_replace( '<h3>' . $headline . '</h3>', '', $html );

  //         // remove the table row
  //         $html = preg_replace( '~<tr>\s*<th><label for="description".*</tr>~imsUu', '', $html );
  //         print $html;
  //     }
  // }

  // http://premium.wpmudev.org/blog/limit-access-to-your-wordpress-dashboard/
  // add_action( 'init', 'blockusers_init' );
  // function blockusers_init() {
  //   if ( is_admin() && ! current_user_can( 'administrator' ) &&
  //     ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
  //     wp_redirect( home_url() );
  //     exit;
  //   }
  // }

  // Hide wordpress footer info and credits
    function change_footer_admin () {return '&nbsp;';}
    add_filter('admin_footer_text', 'change_footer_admin', 9999);

    function change_footer_version() {return ' ';}
    add_filter( 'update_footer', 'change_footer_version', 9999);

  // Hide Help tab
    add_filter( 'contextual_help', 'mytheme_remove_help_tabs', 999, 3 );
    function mytheme_remove_help_tabs($old_help, $screen_id, $screen){
        $screen->remove_help_tabs();
        return $old_help;
    }
  // Remove Screen Options
    //add_filter('screen_options_show_screen', '__return_false'); 


  // Change Login Page styling
  function my_login_style() { ?>
    <link rel="stylesheet" href="/css/login.css">
  <?php }
  add_action( 'login_enqueue_scripts', 'my_login_style' );



//BHRIV CUSTOM POST TYPES
    
add_action( 'init', 'register_cpts' );

function register_cpts() {

    // Articles
    $labels = array( 
        'name' => _x( 'Word', 'article' ),
        'singular_name' => _x( 'Word', 'article' ),
        'add_new' => _x( 'Add New', 'article' ),
        'add_new_item' => _x( 'Add New Word', 'article' ),
        'edit_item' => _x( 'Edit Word', 'article' ),
        'new_item' => _x( 'New Word', 'article' ),
        'view_item' => _x( 'View Word', 'article' ),
        'search_items' => _x( 'Search Words', 'article' ),
        'not_found' => _x( 'No Words found', 'article' ),
        'not_found_in_trash' => _x( 'No Words found in Trash', 'article' ),
        'parent_item_colon' => _x( 'Parent Word:', 'article' ),
        'menu_name' => _x( 'Words', 'article' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'articles',
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'excerpt', 'author','tags' ),
        'taxonomies' => array( 'page-category', 'tag' ,'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        // 'rewrite' => true,
        'rewrite' => array('slug' => 'word','with_front' => false),
        'capability_type' => 'post'
    );
    register_post_type( 'article', $args );

    // Podcasts
    $labels = array( 
        'name' => _x( 'Podcast', 'podcast' ),
        'singular_name' => _x( 'Podcast', 'podcast' ),
        'add_new' => _x( 'Add New', 'podcast' ),
        'add_new_item' => _x( 'Add New Podcast', 'podcast' ),
        'edit_item' => _x( 'Edit Podcast', 'podcast' ),
        'new_item' => _x( 'New Podcast', 'podcast' ),
        'view_item' => _x( 'View Podcast', 'podcast' ),
        'search_items' => _x( 'Search Podcasts', 'podcast' ),
        'not_found' => _x( 'No Podcasts found', 'podcast' ),
        'not_found_in_trash' => _x( 'No Podcasts found in Trash', 'podcast' ),
        'parent_item_colon' => _x( 'Parent Podcast:', 'podcast' ),
        'menu_name' => _x( 'Podcasts', 'podcast' ),
    );
    $args = array( 
        'labels' => $labels,
        // 'hierarchical' => true,
        // Changed for Podcast feed
        'hierarchical' => false,
        'description' => 'podcasts',
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'excerpt', 'author','tags' ),
        'taxonomies' => array( 'page-category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        // 'rewrite' => true,
        'rewrite' => array('slug' => 'podcast','with_front' => false),
        'capability_type' => 'post'
    );
    register_post_type( 'podcast', $args );

    // Courses
    $labels = array( 
        'name' => _x( 'Course', 'course' ),
        'singular_name' => _x( 'Course', 'course' ),
        'add_new' => _x( 'Add New', 'course' ),
        'add_new_item' => _x( 'Add New Course', 'course' ),
        'edit_item' => _x( 'Edit Course', 'course' ),
        'new_item' => _x( 'New Course', 'course' ),
        'view_item' => _x( 'View Course', 'course' ),
        'search_items' => _x( 'Search Courses', 'course' ),
        'not_found' => _x( 'No Courses found', 'course' ),
        'not_found_in_trash' => _x( 'No Courses found in Trash', 'course' ),
        'parent_item_colon' => _x( 'Parent Course:', 'course' ),
        'menu_name' => _x( 'Courses', 'course' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'courses',
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'excerpt', 'author' ,'tags' ),
        'taxonomies' => array( 'page-category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        // 'rewrite' => true,
        'rewrite' => array('slug' => 'course','with_front' => false),
        'capability_type' => 'post'
    );
    register_post_type( 'course', $args );

    // FAQ
    $labels = array( 
        'name' => _x( 'FAQ', 'faq' ),
        'singular_name' => _x( 'FAQ', 'faq' ),
        'add_new' => _x( 'Add New', 'faq' ),
        'add_new_item' => _x( 'Add New FAQ', 'faq' ),
        'edit_item' => _x( 'Edit FAQ', 'faq' ),
        'new_item' => _x( 'New FAQ', 'faq' ),
        'view_item' => _x( 'View FAQ', 'faq' ),
        'search_items' => _x( 'Search FAQ', 'faq' ),
        'not_found' => _x( 'No FAQs found', 'faq' ),
        'not_found_in_trash' => _x( 'No FAQs found in Trash', 'faq' ),
        'parent_item_colon' => _x( 'Parent FAQ:', 'faq' ),
        'menu_name' => _x( 'FAQs', 'faq' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'faqs',
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'excerpt', 'author','tags' ),
        'taxonomies' => array( 'page-category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        // 'rewrite' => true,
        'rewrite' => array('slug' => 'faq','with_front' => false),
        'capability_type' => 'post'
    );
    register_post_type( 'faq', $args );

    // Quotes
    $labels = array( 
        'name' => _x( 'Quote', 'quote' ),
        'singular_name' => _x( 'Quote', 'quote' ),
        'add_new' => _x( 'Add New', 'quote' ),
        'add_new_item' => _x( 'Add New Quote', 'quote' ),
        'edit_item' => _x( 'Edit Quote', 'quote' ),
        'new_item' => _x( 'New Quote', 'quote' ),
        'view_item' => _x( 'View Quote', 'quote' ),
        'search_items' => _x( 'Search Quotes', 'quote' ),
        'not_found' => _x( 'No Quotes found', 'quote' ),
        'not_found_in_trash' => _x( 'No Quotes found in Trash', 'quote' ),
        'parent_item_colon' => _x( 'Parent Quote:', 'quote' ),
        'menu_name' => _x( 'Quotes', 'quote' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'quote',
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'excerpt', 'author','tags' ),
        'taxonomies' => array( 'page-category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        // 'rewrite' => false,
        'rewrite' => array('slug' => 'quote','with_front' => false),
        'capability_type' => 'post'
    );
    register_post_type( 'quote', $args );
}; // End Register CPTs

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_article_taxonomies', 0 );
// create two taxonomies, genres and writers for the post type "book"
function create_article_taxonomies() {
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Category', 'taxonomy general name' ),
    'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Categories' ),
    'all_items'         => __( 'All Categories' ),
    'parent_item'       => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item'         => __( 'Edit Category' ),
    'update_item'       => __( 'Update Category' ),
    'add_new_item'      => __( 'Add New Category' ),
    'new_item_name'     => __( 'New Category Name' ),
    'menu_name'         => __( 'Categories' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'category' ),
  );

  register_taxonomy( 'category', array( 'article','course','podcast','post' ), $args );

  // Add new taxonomy, NOT hierarchical (like tags)
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name'                       => _x( 'TP Tag', 'taxonomy general name' ),
    'singular_name'              => _x( 'TP Tag', 'taxonomy singular name' ),
    'search_items'               => __( 'Search TP Tags' ),
    'popular_items'              => __( 'Popular TP Tags' ),
    'all_items'                  => __( 'All TP Tags' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit TP Tag' ),
    'update_item'                => __( 'Update TP Tag' ),
    'add_new_item'               => __( 'Add New TP Tag' ),
    'new_item_name'              => __( 'New TP Tag Name' ),
    'separate_items_with_commas' => __( 'Separate TP tags with commas' ),
    'add_or_remove_items'        => __( 'Add or remove TP tags' ),
    'choose_from_most_used'      => __( 'Choose from the most used TP tags' ),
    'not_found'                  => __( 'No TP tags found.' ),
    'menu_name'                  => __( 'TP Tags' ),
  );

  $args = array(
    'hierarchical'          => false,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'tp_tag' ),
  );

  register_taxonomy( 'tag', array( 'article','course','podcast' ), $args );

}

/**
 * add_shortcode for Liquid Slider
 */

function recent_post_func(){
  $protest_number = 1;
    $the_query = new WP_Query( 'post_type=protest' ); //post_type=post&order=ASC&cat=6
    echo '<div class="liquid-slider" id="main-slider">';
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                $the_query->the_post();
                // echo '<p>liquid slider loop</p>';
                echo '
                  <div>
                    ' .get_the_post_thumbnail() .'
                    <div class="slider_title">
                    <a href="'.get_permalink().'">
                        <span class="red">#' .$protest_number. ': Country, City </span>
                        <span>'.get_the_title().'</span>
                      </a>
                    </div>
                  </div>';
                $protest_number++;  
              }
            } else {
              // no posts found
            }
    echo '</div>';        
    wp_reset_postdata();
}
add_shortcode('recent_post_excerpts','recent_post_func');

/**
 * add_shortcode for Quotes
 */

function quotes_post_func(){
    $quote_query = new WP_Query( 'post_type=quote' ); //post_type=post&order=ASC&cat=6
    echo '<div class="liquid-slider" id="quote-slider">';
            if ( $quote_query->have_posts() ) {
                while ( $quote_query->have_posts() ) {
                $quote_query->the_post();
                echo '
                  <div>
                    <p>'.get_the_content().' <strong> - '.get_the_title().'</strong></p>
                  </div>';
              }
            } else {
              // no posts found
            }
    echo '</div>';        
    wp_reset_postdata();
}
add_shortcode('quotes_posts','quotes_post_func');

 // wp_deregister_style( $handle ) 

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

// Custom Form Hook to Select the Location and Store full Google Location Object
  add_action('SELECT_LOCATION', 'show_select_location', 10, 3 );
  function show_select_location( $form_id, $post_id, $form_settings ) { ?>
  <div id="google_picker_holder">
    <input id="geocomplete" type="text" placeholder="Type the event address" value="" class="form-control">
    <input id="find"  value="find" class="form-control" readonly>
    <input id="event_location" name="event_location" type="hidden" value="<?php echo $event_location ?>" class="form-control">
    <input id="event_latitude" name="event_latitude" type="hidden" name="event_latitude" placeholder="Latitude" value="<?php echo $event_latitude ?>" class="form-control">
    <input id="event_longitude" name="event_longitude" type="hidden" name="event_longitude" placeholder="Longitude" value="<?php echo $event_longitude ?>" class="form-control">
    <div class="clearfix"></div>
    <div class="map_canvas"></div>
    <fieldset id="google_object">
      <input name="name" type="text" value="">
      <input name="point_of_interest" type="text" value="">
      <input name="lat" type="text" value="" id="google_lat">
      <input name="lng" type="text" value="" id="google_lng">
      <input name="location" type="text" value="">
      <input name="location_type" type="text" value="">
      <input name="formatted_address" type="text" value="" id="event_location_picker">
      <input name="bounds" type="text" value="">
      <input name="viewport" type="text" value="">
      <input name="route" type="text" value="">
      <input name="street_number" type="text" value="">
      <input name="postal_code" type="text" value="">
      <input name="locality" type="text" value="">
      <input name="sublocality" type="text" value="">
      <input name="country" type="text" value="">
      <input name="country_short" type="text" value="">
      <input name="administrative_area_level_1" type="text" value="">
      <input name="id" type="text" value="">
      <input name="reference" type="text" value="">
      <input name="url" type="text" value="">
      <input name="website" type="text" value="">
    </fieldset>
  </div>
<?php }      

// Resize Default Thumbs
  if ( function_exists( 'add_theme_support' ) ) {
      add_theme_support( 'post-thumbnails' );
      set_post_thumbnail_size( 1200, 480, true );
    }
  // add_image_size( 'post-thumb', 320, 200, true ); 
  add_image_size( 'author-thumb', 240, 240, true ); // (cropped)
  add_image_size( 'small-thumb', 150, 150, true ); // (cropped)
  // add_image_size( 'instagram-low', 306, 306, true ); 

//http://codex.wordpress.org/Function_Reference/register_post_status

// Custom Post Status
// function my_custom_post_status2(){
//  register_post_status( 'updated', array(
//    'label'                     => _x( 'Updated', 'protest' ),
//    'public'                    => true,
//    'exclude_from_search'       => false,
//    'show_in_admin_all_list'    => true,
//    'show_in_admin_status_list' => true,
//    'label_count'               => _n_noop( 'Updated <span class="count">(%s)</span>', 'Update <span class="count">(%s)</span>' ),
//  ) );
// }
// add_action( 'init', 'my_custom_post_status2' );



//BHRIV CUSTOM POST TYPE FOR artist PORTFOLIO
    
add_action( 'init', 'register_cpt_faq' );

function register_cpt_faq() {

    $labels = array( 
        'name' => _x( 'FAQ', 'faq' ),
        'singular_name' => _x( 'FAQ', 'faq' ),
        'add_new' => _x( 'Add New', 'faq' ),
        'add_new_item' => _x( 'Add New FAQ', 'faq' ),
        'edit_item' => _x( 'Edit FAQ', 'faq' ),
        'new_item' => _x( 'New FAQ', 'faq' ),
        'view_item' => _x( 'View FAQ', 'faq' ),
        'search_items' => _x( 'Search FAQs', 'faq' ),
        'not_found' => _x( 'No FAQs found', 'faq' ),
        'not_found_in_trash' => _x( 'No FAQs found in Trash', 'faq' ),
        'parent_item_colon' => _x( 'Parent FAQ:', 'faq' ),
        'menu_name' => _x( 'FAQs', 'faq' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'faqs',
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes','comments' ),
        'taxonomies' => array( 'page-category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 19,
        
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        // 'rewrite' => false,
        'rewrite' => array('slug' => 'faq','with_front' => false),
        'capability_type' => 'post'
    );

    register_post_type( 'faq', $args );
};


// 
// Custom Form Hook to Select the ACCESSORY FOR THE THE BYO FORM
  add_action('ADDARTIST_INTRO', 'show_addartist_intro', 10, 3 );
  function show_addartist_intro( $form_id, $post_id, $form_settings ) { ?>
  <!-- <div>
    <p><big><strong>Creating Your Profile is Easy and Free.</strong></big></p>
    <p>Fill in the details below you'll have a mini website for your article that looks great works well on mobile devices, and is very Google friendly so you can passively receive session bookings - all without any coding necessary.</p>
    <p>Creating your profile will take around 25-30 minutes depending on what info you have easily accessible. It will be worth the effort, and non-essential details can be added after we've activated your profile. We recommend taking a bit of extra time in choosing your main profile images to ensure they capture you / your article. Check out the reference profile of producer / article owner <a href="/article/mike-green.php" target="blank">Mike Green</a> to see how your information will be used. When you submit your article we'll review the info to see if there are any suggestions we may have to help your profile look the best it can be.</p>
    <p>Now, without futher adieu....add your profile!</p>
  </div> -->
<?php }    

// Custom Form Hook to Select the ACCESSORY FOR THE THE BYO FORM

  add_action('HOOKBOTTOM', 'show_hookbottom', 10, 3 );
  function show_hookbottom( $form_id, $post_id, $form_settings ) { ?>

<?php }     

/*  
* Build a YouTube Playlist of your music by following the instructions here: https://support.google.com/youtube/answer/4489417 and get the Embed Code for the playlist by following the instructions here:
* https://support.google.com/youtube/answer/171780
* For Spotify Playlists: http://news.spotify.com/us/2012/08/17/how-to-embed-a-spotify-play-button-on-your-blog-forum-or-website/
*
*/

// Custom Form Hook to Select the ACCESSORY FOR THE THE BYO FORM
  add_action('LOCATION_SELECT', 'show_location_select', 10, 3 );
  function show_location_select( $form_id, $post_id, $form_settings ) { ?>
  <?php /* Template Name: Google Location */ ?>
        <!-- <input name="where" id="geocomplete" type="text" placeholder="Street Address of Your Place" value="123 Main Street California" data-type="text"> -->
      <div class="map_canvas"></div>
      <p class="geocomplete">
          <input type="text" value="" name="geo[name]" data-geo="name">
          <input type="text" value="" name="geo[point_of_interest]" data-geo="point_of_interest">
          <input type="text" value="" name="geo[lat]" data-geo="lat">
          <input type="text" value="" name="geo[lng]" data-geo="lng">
          <input type="text" value="" name="geo[location]" data-geo="location">
          <input type="text" value="" name="geo[location_type]" data-geo="location_type">
          <input type="text" value="" name="geo[formatted_address]" data-geo="formatted_address">
          <input type="text" value="" name="geo[bounds]" data-geo="bounds">
          <input type="text" value="" name="geo[viewport]" data-geo="viewport">
          <input type="text" value="" name="geo[route]" data-geo="route">
          <input type="text" value="" name="geo[street_number]" data-geo="street_number">
          <input type="text" value="" name="geo[postal_code]" data-geo="postal_code">
          <input type="text" value="" name="geo[locality]" data-geo="locality">
          <input type="text" value="" name="geo[sublocality]" data-geo="sublocality">
          <input type="text" value="" name="geo[country]" data-geo="country">
          <input type="text" value="" name="geo[country_short]" data-geo="country_short">
          <input type="text" value="" name="geo[administrative_area_level_1]" data-geo="administrative_area_level_1">
          <input type="text" value="" name="geo[id]" data-geo="id">
          <input type="text" value="" name="geo[reference]" data-geo="reference">
          <input type="text" value="" name="geo[url]" data-geo="url">
          <input type="text" value="" name="geo[website]" data-geo="website">
          
      </p>      
<?php } 

// Add Taxonomy to search results
// http://stackoverflow.com/questions/13491828/how-to-amend-wordpress-search-so-it-queries-taxonomy-terms-and-category-terms

function tax_search_join( $join )
{
  global $wpdb;
  if( is_search() )
  {
    $join .= "
        INNER JOIN
          {$wpdb->term_relationships} ON {$wpdb->posts}.ID = {$wpdb->term_relationships}.object_id
        INNER JOIN
          {$wpdb->term_taxonomy} ON {$wpdb->term_taxonomy}.term_taxonomy_id = {$wpdb->term_relationships}.term_taxonomy_id
        INNER JOIN
          {$wpdb->terms} ON {$wpdb->terms}.term_id = {$wpdb->term_taxonomy}.term_id
      ";
  }
  return $join;
}
add_filter('posts_join', 'tax_search_join');



// Add the search term 'genre' to the query
function tax_search_where( $where )
{
  global $wpdb;
  if( is_search() )
  {
    // add the search term to the query
    $where .= " OR
    (
      {$wpdb->term_taxonomy}.taxonomy LIKE 'category'
      AND
      {$wpdb->terms}.name LIKE ('%".$wpdb->escape( get_query_var('s') )."%')
    ) ";
  // add the search term to the query
  // $where .= " OR
  //   (
  //     {$wpdb->term_taxonomy}.taxonomy LIKE 'service'
  //     AND
  //     {$wpdb->terms}.name LIKE ('%".$wpdb->escape( get_query_var('s') )."%')
  //   ) ";
  
  }
  return $where;
}
add_filter('posts_where', 'tax_search_where');


function tax_search_groupby( $groupby )
{
  global $wpdb;
  if( is_search() )
  {
    $groupby = "{$wpdb->posts}.ID";
  }
  return $groupby;
}
add_filter('posts_groupby', 'tax_search_groupby');


// http://davidwalsh.name/hide-admin-bar-wordpress
add_filter('show_admin_bar', '__return_false');

// https://gist.github.com/rosshanney/3829836
// function gce_fix_ajax_error() {
//  global $wp_scripts;
 
//  if ( isset( $wp_scripts->registered['gce_scripts']->extra['data'] ) ) {
//    $wp_scripts->registered['gce_scripts']->extra['data'] = str_replace( 'https', 'http', $wp_scripts->registered['gce_scripts']->extra['data'] );
//  }
// }
// add_action( 'wp_print_scripts', 'gce_fix_ajax_error' );


function render_moreinfo( $form_id, $post_id, $form_settings ) { ?>
  <form accept-charset="UTF-8" action="https://db195.infusionsoft.com/app/form/process/4b92eabb199baf20620e0575e4c9d7c6" class="infusion-form" method="POST">
    <input name="inf_form_xid" type="hidden" value="4b92eabb199baf20620e0575e4c9d7c6" />
    <input name="inf_form_name" type="hidden" value="&quot;More info&quot; pop up" />
    <input name="infusionsoft_version" type="hidden" value="1.36.0.45" />
    <div class="infusion-field">
        <label for="inf_field_FirstName">First Name *</label>
        <input class="infusion-field-input-container" id="inf_field_FirstName" name="inf_field_FirstName" type="text" />
    </div>
    <div class="infusion-field">
        <label for="inf_field_Email">Email *</label>
        <input class="infusion-field-input-container" id="inf_field_Email" name="inf_field_Email" type="text" />
    </div>
    <div class="infusion-field">
        <label for="inf_field_Country">Country *</label>
        <select id="inf_field_Country" name="inf_field_Country"><option value="">Please select one</option><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antarctica">Antarctica</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Åland Islands">Åland Islands</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Bouvet Island">Bouvet Island</option><option value="Brazil">Brazil</option><option value="British Indian Ocean Territory">British Indian Ocean Territory</option><option value="Brunei Darussalam">Brunei Darussalam</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo">Congo</option><option value="Democratic Republic Of Congo">Democratic Republic Of Congo</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Côte D'Ivoire">Côte D'Ivoire</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern Territories">French Southern Territories</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard and McDonald Islands">Heard and McDonald Islands</option><option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Isle of Man">Isle of Man</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jersey">Jersey</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="North Korea">North Korea</option><option value="South Korea">South Korea</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macao">Macao</option><option value="Republic of Macedonia">Republic of Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Federated States of Micronesia">Federated States of Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestine">Palestine</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn">Pitcairn</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Romania">Romania</option><option value="Russian Federation">Russian Federation</option><option value="Rwanda">Rwanda</option><option value="Réunion">Réunion</option><option value="St. Barthélemy">St. Barthélemy</option><option value="St. Helena, Ascension and Tristan Da Cunha">St. Helena, Ascension and Tristan Da Cunha</option><option value="St. Kitts And Nevis">St. Kitts And Nevis</option><option value="St. Lucia">St. Lucia</option><option value="St. Martin">St. Martin</option><option value="St. Pierre And Miquelon">St. Pierre And Miquelon</option><option value="St. Vincent And The Grenedines">St. Vincent And The Grenedines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard And Jan Mayen">Svalbard And Jan Mayen</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syrian Arab Republic">Syrian Arab Republic</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Timor-Leste">Timor-Leste</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="US Minor Outlying Islands">US Minor Outlying Islands</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Viet Nam">Viet Nam</option><option value="Virgin Islands, British">Virgin Islands, British</option><option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option><option value="Wallis and Futuna">Wallis and Futuna</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option></select>
    </div>
    <div class="infusion-field">
        <label for="inf_custom_9toThriveDates">Course Dates *</label>
        <select id="inf_custom_9toThriveDates" name="inf_custom_9toThriveDates"><option value="">Please select one</option><option value="February 22-28">February 22-28</option><option value="2015">2015</option><option value="April 5-11">April 5-11</option><option value="July 5-11">July 5-11</option><option value="Aug 23-29">Aug 23-29</option><option value="October 11-17">October 11-17</option><option value="Dec 13-19">Dec 13-19</option><option value="Dec 27-Jan 2">Dec 27-Jan 2</option><option value="2015/2016">2015/2016</option></select>
    </div>
    <div class="infusion-submit">
        <input type="submit" value="Let's connect!" />
    </div>
</form>
<script type="text/javascript" src="https://db195.infusionsoft.com/app/webTracking/getTrackingCode?trackingId=435791db8ad6ebe19ccfc3c515bbe9fc"></script>

    <?php
}
 
add_action( 'add_moreinfo', 'render_moreinfo', 10, 3 );

function update_geolocation( $post_id ) {
    
    if ( isset( $_POST['geo_name'] ) ) {
        update_post_meta( $post_id, 'geo_name', $_POST['geo_name'] );
    }
    if ( isset( $_POST['geo_point_of_interest'] ) ) {
        update_post_meta( $post_id, 'geo_point_of_interest', $_POST['geo_point_of_interest'] );
    }
    if ( isset( $_POST['geo_lat'] ) ) {
        update_post_meta( $post_id, 'geo_lat', $_POST['geo_lat'] );
    }
    if ( isset( $_POST['geo_lng'] ) ) {
        update_post_meta( $post_id, 'geo_lng', $_POST['geo_lng'] );
    }
    if ( isset( $_POST['geo_name'] ) ) {
        update_post_meta( $post_id, 'geo_name', $_POST['geo_name'] );
    }
    if ( isset( $_POST['geo_point_of_interest'] ) ) {
        update_post_meta( $post_id, 'geo_point_of_interest', $_POST['geo_point_of_interest'] );
    }
    if ( isset( $_POST['geo_lat'] ) ) {
        update_post_meta( $post_id, 'geo_lat', $_POST['geo_lat'] );
    }
    if ( isset( $_POST['geo_lng'] ) ) {
        update_post_meta( $post_id, 'geo_lng', $_POST['geo_lng'] );
    }
    if ( isset( $_POST['geo_location'] ) ) {
        update_post_meta( $post_id, 'geo_location', $_POST['geo_location'] );
    }
    if ( isset( $_POST['geo_location_type'] ) ) {
        update_post_meta( $post_id, 'geo_location_type', $_POST['geo_location_type'] );
    }
    if ( isset( $_POST['geo_formatted_address'] ) ) {
        update_post_meta( $post_id, 'geo_formatted_address', $_POST['geo_formatted_address'] );
    }
    if ( isset( $_POST['geo_bounds'] ) ) {
        update_post_meta( $post_id, 'geo_bounds', $_POST['geo_bounds'] );
    }
    if ( isset( $_POST['geo_viewport'] ) ) {
        update_post_meta( $post_id, 'geo_viewport', $_POST['geo_viewport'] );
    }
    if ( isset( $_POST['geo_route'] ) ) {
        update_post_meta( $post_id, 'geo_route', $_POST['geo_route'] );
    }
    if ( isset( $_POST['geo_street_number'] ) ) {
        update_post_meta( $post_id, 'geo_street_number', $_POST['geo_street_number'] );
    }
    if ( isset( $_POST['geo_bounds'] ) ) {
        update_post_meta( $post_id, 'geo_bounds', $_POST['geo_bounds'] );
    }
    if ( isset( $_POST['geo_viewport'] ) ) {
        update_post_meta( $post_id, 'geo_viewport', $_POST['geo_viewport'] );
    }
    if ( isset( $_POST['geo_route'] ) ) {
        update_post_meta( $post_id, 'geo_route', $_POST['geo_route'] );
    }
    if ( isset( $_POST['geo_street_number'] ) ) {
        update_post_meta( $post_id, 'geo_street_number', $_POST['geo_street_number'] );
    }
    if ( isset( $_POST['geo_postal_code'] ) ) {
        update_post_meta( $post_id, 'geo_postal_code', $_POST['geo_postal_code'] );
    }
    if ( isset( $_POST['geo_locality'] ) ) {
        update_post_meta( $post_id, 'geo_locality', $_POST['geo_locality'] );
    }
    if ( isset( $_POST['geo_sublocality'] ) ) {
        update_post_meta( $post_id, 'geo_sublocality', $_POST['geo_sublocality'] );
    }
    if ( isset( $_POST['geo_country'] ) ) {
        update_post_meta( $post_id, 'geo_country', $_POST['geo_country'] );
    }
    if ( isset( $_POST['geo_country_short'] ) ) {
        update_post_meta( $post_id, 'geo_country_short', $_POST['geo_country_short'] );
    }
    if ( isset( $_POST['geo_administrative_area_level_1'] ) ) {
        update_post_meta( $post_id, 'geo_administrative_area_level_1', $_POST['geo_administrative_area_level_1'] );
    }
    if ( isset( $_POST['geo_id'] ) ) {
        update_post_meta( $post_id, 'geo_id', $_POST['geo_id'] );
    }
    if ( isset( $_POST['geo_reference'] ) ) {
        update_post_meta( $post_id, 'geo_reference', $_POST['geo_reference'] );
    }
    if ( isset( $_POST['geo_website'] ) ) {
        update_post_meta( $post_id, 'geo_website', $_POST['geo_website'] );
    }
}
add_action( 'wpuf_add_post_after_insert', 'update_geolocation' );
add_action( 'wpuf_edit_post_after_update', 'update_geolocation' );


// update_post_meta($post_id, $meta_key, $meta_value, $prev_value);
  function favorites_button(){
    Global $post;
    echo '<input id="favorites_post_id" type="" name="favorites_post_id" value="'.$post->ID.'" />';
    $post_id = $post->ID;
    $current_user = wp_get_current_user();
    $user_id = $current_user->ID;
    $meta_key = 'fav_post';
    $meta_value = 'fav_post_user_'.$user_id;
    $fav_single = true;
    $user_fav_stored = get_post_meta( $post->ID, $meta_key, $fav_single );
    
    echo '
    <form action="" method="POST" name="favorite_posts">';
    echo '
            <input id="favorites_post_id" type="hidden" name="favorites_post_id" value="'.$post_id.'" />
            <input id="favorites_user_id" type="hidden" name="favorites_user_id" value="'.$current_user->ID .'" />';
    if ($user_fav_stored != $meta_value ) {
      echo '<input id="ADD_TO_FAVORITES" type="hidden" name="ADD_TO_FAVORITES" value="ADD_TO_FAVORITES" />
            <button id="favorites_post_submit" type="submit" name="favorites_post_submit"><i class="fa fa-heart-o"></i> Add to Favorites</button>';
    }else{
      echo '<input id="REMOVE_FROM_FAVORITES" type="hidden" name="REMOVE_FROM_FAVORITES" value="REMOVE_FROM_FAVORITES" />
            <button id="favorites_post_submit" type="submit" name="favorites_post_submit"><i class="fa fa-heart"></i> Remove from Favorites</button>';
    }
    echo '
    </form>';
  }

  if (isset($_POST['ADD_TO_FAVORITES']) && $_POST['ADD_TO_FAVORITES'] == 'ADD_TO_FAVORITES') {
    if (isset($_POST['favorites_post_id']) && !empty($_POST['favorites_post_id'])) {

      $post_id = $_POST['favorites_post_id'];
      $user_id = $_POST['favorites_user_id']; // Name field of input must be set
      $meta_key = 'fav_post';
      $meta_value = 'fav_post_user_'.$user_id; ?>

    <?php
        update_post_meta($post_id, $meta_key, $meta_value, $prev_value);
        // update_user_meta( $user_id, $meta_key, $post_id, $prev_value ); 

      // SEND EMAIL NOTIFICATION
      //     // $rsvp_user_name = $_POST['pid13_user_name']; // Name field of input must be set
      // $manage_rsvp_url = site_url() .'/manage/';
      // $gigroom_notificatons = 'notifications@gigroom.com';
        
      // // Create a New Email to Notify the Artist Admin that they have received a Gig Offer
      // $subject = "Someone Wants To Come To Your Gig";
      // $message .= "A Gigroom member has requested to attend your House Concert. \n";
      // $message .= "RSVP Submitted By Member: " .$rsvp_user_name ."\n";
      // $message .= "View and Manage the RSVP Request Here: " .$manage_rsvp_url ."\n";
      // //Send To:
      // $multiple_to_recipients = 'notifications@gigroom.com,' .$get_host_email;
      // wp_mail( $multiple_to_recipients , $subject, $message ); 
    }
  }
  if (isset($_POST['REMOVE_FROM_FAVORITES']) && $_POST['REMOVE_FROM_FAVORITES'] == 'REMOVE_FROM_FAVORITES') {
    if (isset($_POST['favorites_post_id']) && !empty($_POST['favorites_post_id'])) {

      $post_id = $_POST['favorites_post_id'];
      $user_id = $_POST['favorites_user_id']; // Name field of input must be set
      $meta_key = 'fav_post';
      $meta_value = 'fav_post_user_'.$user_id;

      delete_post_meta($post_id, $meta_key, $meta_value); 
    }
  }

  // function remove_from_favorites_button(){
  //   Global $post;
  //   $current_user = wp_get_current_user();
  //   $user_id = $current_user->ID;
  //   $meta_key = 'fav_post';
  //   $meta_value = 'fav_post_user_'.$user_id;
  //   $fav_single = true;
  //   $user_fav_stored = get_post_meta( $post->ID, $meta_key, $fav_single );
  //   // set relevant icon
  //   $fav_icon = '<i class="fa fa-heart-o"></i>';
  //     echo '
  //     <form action="" method="POST" name="remove_from_favorites">
  //       <input id="REMOVE_FROM_FAVORITES" type="hidden" name="REMOVE_FROM_FAVORITES" value="REMOVE_FROM_FAVORITES" />
  //       <input id="remove_from_favorites_post_id" type="hidden" name="remove_from_favorites_post_id" value="'.$post->ID.'" />
  //       <input id="remove_from_favorites_user_id" type="hidden" name="remove_from_favorites_user_id" value="'.$current_user->ID .'" />
  //       <button class="btn-warning" id="remove_from_favorites_submit" type="submit" name="remove_from_favorites_submit">'.$fav_icon.' Remove Favorite</button>
  //     </form>';
  // }

//https://wordpress.org/support/topic/display-most-popular-posts-without-plugin-by-viewed-taxonomy
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
  
// if (is_page(array('Home'))) {
   
// }

// add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );
// /**
//  * Remove WooCommerce Generator tag, styles, and scripts from the homepage.
//  * Tested and works with WooCommerce 2.0+
//  *
//  * @author Greg Rickaby
//  * @since 2.0.0
//  */
// function child_manage_woocommerce_styles() {
//   remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
//   if ( is_front_page() || is_home() ) {
//     wp_dequeue_style( 'woocommerce_frontend_styles' );
//     wp_dequeue_style( 'woocommerce_fancybox_styles' );
//     wp_dequeue_style( 'woocommerce_chosen_styles' );
//     wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
//     wp_dequeue_script( 'wc_price_slider' );
//     wp_dequeue_script( 'wc-single-product' );
//     wp_dequeue_script( 'wc-add-to-cart' );
//     wp_dequeue_script( 'wc-cart-fragments' );
//     wp_dequeue_script( 'wc-checkout' );
//     wp_dequeue_script( 'wc-add-to-cart-variation' );
//     wp_dequeue_script( 'wc-single-product' );
//     wp_dequeue_script( 'wc-cart' );
//     wp_dequeue_script( 'wc-chosen' );
//     wp_dequeue_script( 'woocommerce' );
//     wp_dequeue_script( 'prettyPhoto' );
//     wp_dequeue_script( 'prettyPhoto-init' );
//     wp_dequeue_script( 'jquery-blockui' );
//     wp_dequeue_script( 'jquery-placeholder' );
//     wp_dequeue_script( 'fancybox' );
//     wp_dequeue_script( 'jqueryui' );
// }}

add_action( 'wp_enqueue_scripts', 'wpse8170_disable_all_scripts', 9999 );
function wpse8170_disable_all_scripts() {
    global $wp_scripts, $wp_styles;
    if (is_page('Home')) {
      $wp_styles = new WP_Styles(); // reset all styles
      $wp_scripts = new WP_Scripts(); // reset all scripts  
    }
    
}