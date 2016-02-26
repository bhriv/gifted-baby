<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  	<!-- Mobile hide the address bar on load -->
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <link rel="shortcut icon" href="<?php echo site_url(); ?>/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="<?php echo site_url(); ?>/apple-touch-icon.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo site_url(); ?>/apple-touch-icon-ipad.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo site_url(); ?>/apple-touch-icon-iphone4.png" />

  <?php wp_head(); ?>
  <?php if (is_page('Home')) : ?>
    <link rel="stylesheet" href="/wp-content/themes/turnpoint/style.css">
  <?php endif ?>
  

  <style type="text/css">
    .action_buttons div.btn.js-btn, h3, button,div.btn, a.cta, input[type="submit"] { font-family:"Apercu Pro Bold", 'Trebuchet MS', Arial, sans-serif; font-weight:bold; font-style:normal; }
    h1,h2,h4,h5,h6, p, a, body p, ol, ol li, ul, ul li, blockquote, time, small { font-family:"Apercu Pro Regular", 'Trebuchet MS', Arial, sans-serif; font-weight:normal; font-style:normal; }
  </style>

<?php 
$active = false;

if ( !is_page(array('Home')) && $active ) : ?>
  <script src="<?php echo site_url();?>/js/min/master-min.js?v=1.1<?php //echo date("Y-m-d-H-i-s"); ?>"></script>  
<?php endif ?>
  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
 
  <?php if ( is_user_logged_in() ) : ?>
  <style type="text/css">html{margin-top: 0 !important;}div#wpadminbar{display: none !important;visibility: hidden !important; height: 0 !important;}</style>
  <?php endif ?>

  <link rel="stylesheet" href="<?php echo site_url() ?>/assets/css/screen.css">
  <script src="<?php echo site_url() ?>/assets/js/vendor/modernizr.min.js"></script>
  <script src="<?php echo site_url() ?>/assets/js/console-class.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<?php flush(); //http://developer.yahoo.com/performance/rules.html ?>
