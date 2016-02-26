<div class="clearfix"></div>
<?php wp_nav_menu( array( 'theme_location' => 'articles-nav-menu' ) ); ?>
<div class="clearfix push"></div>
<style type="text/css">
  ul#menu-articles-nav-menu li{
    width: auto;
    float: left;
    margin-right: 17.5px;
    text-transform: uppercase;
  }
  ul#menu-articles-nav-menu li a{
    color: #000;
    text-decoration: underline;
  }
  ul#menu-articles-nav-menu li.active a{
    color: #49e1cd;
  }
</style>