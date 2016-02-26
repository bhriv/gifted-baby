<?php 
$current_post_type = get_post_type( get_the_ID() );

if (($current_post_type == 'podcast') && is_single() ) { // Info for students
    get_template_part('sidebar-top-courses');
    get_template_part('sidebar-top-podcasts');
    get_template_part('sidebar-facebook');
    get_template_part('sidebar-advertizing');
    get_template_part('sidebar-twitter');
    get_template_part('sidebar-instagram');
}
// || is_category()
if (($current_post_type == 'article') && is_single() || is_author() || is_page(array(87,'Most Popular'))  ) { // Info for students
    get_template_part('sidebar-top-courses');
    get_template_part('sidebar-latest-articles');
    get_template_part('sidebar-facebook');
    get_template_part('sidebar-advertizing');
    get_template_part('sidebar-twitter');
    get_template_part('sidebar-instagram');
}

if (is_page(array(92))) { // Info for students
  	get_template_part('sidebar-top-courses');
  	// get_template_part('sidebar-top-mentors');
    get_template_part('sidebar-top-articles');
    get_template_part('sidebar-top-podcasts');
}
if (is_page(array(127))) { // Write for us
	// get_template_part('sidebar-top-authors');
  	get_template_part('sidebar-top-articles');
  	get_template_part('sidebar-top-podcasts');
}
// if ( is_page(array(87)) ) { // Articles
//   // get_template_part('sidebar-latest-articles');
//     get_template_part('sidebar-top-authors');
//     get_template_part('sidebar-facebook');
//     get_template_part('sidebar-twitter');
//     get_template_part('sidebar-instagram');
// }

if (is_page(array(130))) { // 
  
    get_template_part('sidebar-top-courses');
    // get_template_part('sidebar-top-mentors'); 
    get_template_part('sidebar-top-articles');
    get_template_part('sidebar-top-podcasts');
    
}

if (is_page(array(132))) { // Podcasts
    get_template_part('sidebar-top-courses');
    get_template_part('sidebar-latest-podcasts');
    get_template_part('sidebar-facebook');
    get_template_part('sidebar-advertizing');
    get_template_part('sidebar-twitter');
    get_template_part('sidebar-instagram');

}


$classes = get_body_class();
if (!in_array('category',$classes)) {
    // your markup
  if (is_post_type_archive('faq')) {
    get_template_part('sidebar-top-articles');
    get_template_part('sidebar-top-podcasts');
  }

  // if ($current_post_type == 'article') {
  //   get_template_part('sidebar-latest-articles');
  //   get_template_part('sidebar-top-podcasts');
  // }
  // if ($current_post_type == 'course') {
  // 	get_template_part('sidebar-top-courses');
  //   get_template_part('sidebar-top-mentors');
  //   get_template_part('sidebar-top-articles');
  // }
} 