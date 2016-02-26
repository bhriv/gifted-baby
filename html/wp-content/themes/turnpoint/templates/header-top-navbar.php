<div class="main-container" id="banner_holder">
  <div class="main full-width">
    <div class="header-container">
      <header id="" class="navigation" role="banner">
        <div class="navigation-wrapper">
          <span id="logo_holder">
              <a class="logolink" href="/">
                <img src="/images/logoTP.png" alt="Home">
                <span><?php echo get_bloginfo ( 'description' ); ?></span>
              </a>
            </span>
            <!--  -->
            <div class="nav">
              <ul class="navigation-menu" role="navigation"  id="navigation-menu" rel="nofollow">
                <li class="nav-link more" id="learn">
                  <a href="javascript:void(0)">Learn</a>
                  <ul class="submenu">
                    <li id="courses"><a href="<?= site_url() ?>/courses">Courses</a></li>
                    <li><a href="<?= site_url() ?>/info-for-students">Info for Students</a></li>
                  </ul>
                </li>
                <li class="nav-link more" id="about">
                  <a href="javascript:void(0)">About</a>
                  <ul class="submenu">
                    <li><a href="<?= site_url() ?>/about-us">About Us</a></li>
                    <li><a href="<?= site_url() ?>/faq">FAQ</a></li>
                  </ul>
                </li>
                <li class="nav-link more" id="contribute">
                  <a href="javascript:void(0)">Contribute</a>
                  <ul class="submenu">
                    <li><a href="<?= site_url() ?>/write-for-us">Write for Us</a></li>
                    <li><a href="<?= site_url() ?>/pitch-us-a-course">Pitch Us a Course</a></li>
                  </ul>
                </li>
                <li class="nav-link more" id="blog">
                  <a href="javascript:void(0)">Blog</a>
                  <ul class="submenu">
                    <li><a href="<?= site_url() ?>/articles/">Latest Articles</a></li>
                    <li><a href="<?= site_url() ?>/podcasts/">TurnPoint Radio</a></li>
                    <li><a href="<?= site_url() ?>/authors/">Authors</a></li>
                  </ul>
                </li>
                <li class="nav-link" id="contact"><a href="<?= site_url() ?>/contact">Contact</a></li>
                <li class="nav-link">
                  <div class="navigation-tools">
                    <div class="search-bar">
                      <div class="search-and-submit">
                        <!-- id="searchform" class="form-search" -->
                        <form role="search" method="get" action="<?php echo home_url('/'); ?>">
                          <label class="hide" for="s"><?php _e('Search for:', 'roots'); ?></label>
                          <input type="search" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" id="" class="" placeholder="">
                          <input type="hidden" id="searchsubmit" value="<?php _e('Search', 'roots'); ?>">
                          <!-- <span class="close_btn"><a class="show_search"><i class="fa fa-times-circle-o"></i></a></span> -->
                        </form>
                      </div>

                    </div>
                    <!-- <a href="javascript:void(0)" class="sign-up">Sign Up</a> -->
                  </div>
                </li>
              </ul>

              <ul class="navigation-menu" role="navigation"  id="mobile-navigation-menu" rel="nofollow">
                <li class="nav-link">
                  <a href="<?= site_url() ?>/courses">Courses</a>
                </li>
                <li class="nav-link">
                  <a href="<?= site_url() ?>/info-for-students">Info for Students</a>
                </li>
                <li class="nav-link">
                  <a href="<?= site_url() ?>/about-us">About Us</a>
                </li>
                <li class="nav-link">
                  <a href="<?= site_url() ?>/faq">FAQ</a>
                </li>
                <li class="nav-link">
                  <a href="<?= site_url() ?>/write-for-us">Write for Us</a>
                </li>
                <li class="nav-link">
                  <a href="<?= site_url() ?>/pitch-us-a-course">Pitch Us a Course</a>
                </li>
                <li class="nav-link">
                  <a href="<?= site_url() ?>/articles/">Latest Articles</a>
                </li>
                <li class="nav-link">
                  <a href="<?= site_url() ?>/podcasts/">TurnPoint Radio</a>
                </li>
                <li class="nav-link">
                  <a href="<?= site_url() ?>/authors/">Authors</a>
                </li>
                <li class="nav-link" id="contact">
                  <a href="<?= site_url() ?>/contact">Contact</a>
                </li>
                <li class="nav-link">
                  <div class="navigation-tools">
                    <div class="search-bar">
                      <div class="search-and-submit">
                        <!-- id="searchform" class="form-search" -->
                        <form role="search" method="get" action="<?php echo home_url('/'); ?>">
                          <label class="hide" for="s"><?php _e('Search for:', 'roots'); ?></label>
                          <input type="search" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" id="" class="" placeholder="">
                          <input type="hidden" id="searchsubmit" value="<?php _e('Search', 'roots'); ?>">
                          <!-- <span class="close_btn"><a class="show_search"><i class="fa fa-times-circle-o"></i></a></span> -->
                        </form>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
              <!-- <a href="" class="navigation-menu-button" id="js-mobile-menu">MENU</a> -->
              <a id="js-mobile-menu" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                 <i class="fa fa-navicon"></i>
              </a>
            </div>
        </div>
      </header>
    </div>
  </div>
</div>


