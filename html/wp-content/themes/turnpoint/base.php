<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
  <!--[if lt IE 7]><div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</div><![endif]-->
<?php if (!is_page('Home')) : // FB not needed on Homepage ?>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '626750474098422',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<?php endif ?>
  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

  <div class="wrap" role="document">
    <?php $current_post_type = get_post_type(); ?>
    <?php if ( !is_post_type_archive( 'faq' ) && ($current_post_type != 'course') && !is_page(array('Contact','About Us', 'Home', 'Courses')) && !is_page_template( 'templates/content-wide-image.php' ) && !is_category() ) : ?>
    <div class="main-container">
      <?php $is_tax = is_tax(); ?>
      
        <?php if ( (is_post_type_archive( 'archive' )) || is_page(array('articles','podcasts')) || is_page(array('Most Popular'))) : ?>
        <div class="main full-width">
          <?php get_template_part('articles_nav') ?>  
        </div>
        <?php endif ?>
      
      <div class="main clearfix">
        <?php include roots_template_path(); ?>
      </div>
    </div>
    <?php else : ?>
    <?php include roots_template_path(); ?>
    <?php endif ?>
    <?php if(!is_page(array('Home','Contact'))) : ?>
    <aside class="sidebar" role="complementary" id="sidebar-<?php echo get_the_ID() ?>">
      <?php include roots_sidebar_path(); ?>
      <?php get_template_part('sidebar-switching');?>
    </aside><!-- /.sidebar -->
    <?php endif ?>
  </div><!-- /.wrap -->
  <div class="clearfix"></div>
  <?php get_template_part('templates/footer'); ?>
</body>
</html>