<div>
<?php $current_post_type = get_post_type();
  if ( ( function_exists('yoast_breadcrumb') ) && !is_front_page() && !is_page(array('Login', 'Home', 'Signup')) && ( 'session' != $current_post_type ) ) { 
  yoast_breadcrumb('<p id="breadcrumbs">','</p>'); 
} ?>
</div>