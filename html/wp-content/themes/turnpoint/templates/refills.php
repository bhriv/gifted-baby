<?php /* Template Name: refills */ ?>
<h3>User</h3>
<?php
    $current_user = wp_get_current_user();

    /* *
     * @example Safe usage: $current_user = wp_get_current_user();
     * if ( !($current_user instanceof WP_User) )
     *     return;
     * 
      user_login
      user_pass
      user_email
      user_url

      user_registered
      user_activation_key
      user_status
      user_level
      
      roles

      user_nicename
      display_name
      nickname
      first_name
      last_name
      user_firstname
      user_lastname
      
      description (Biographical Info from the user's profile)

      jabber
      aim
      yim
      googleplus
      twitter
      
      
      rich_editing
      comment_shortcuts
      admin_color

      plugins_per_page
      plugins_last_view
      ID
     */
    echo '<ul class="current_user_details">
           <li>user_login: '  .$current_user->user_login . ' (' . $current_user->ID . ') </li>
           <li>user_email: '  .$current_user->user_email . '</li>
           <li>ID: '          .$current_user->ID.'</li>
           <li><br></li>
           <li>display_name: '.$current_user->display_name . '</li>
           <li>first_name: '  .$current_user->first_name . '</li>
           <li>last_name: '   .$current_user->last_name . '</li>
           <li><br></li>
           <li>user_nicename: '   .$current_user->user_nicename . '</li>
           <li>nickname: '   .$current_user->nickname . '</li>
           <li>jabber: '   .$current_user->jabber . '</li>
           <li>aim: '   .$current_user->aim . '</li>
           <li>googleplus: '   .$current_user->googleplus . '</li>
           <li>twitter: '   .$current_user->twitter . '</li>
           <li><br></li>';
      // add input for user id
  if(current_user_can('delete_users')){
    echo " <li>level 5 (admin) </li>"; 
  }
  if(current_user_can('edit_pages')){
    echo " <li>level 4 (editor) </li>"; 
  }
  if(current_user_can('publish_posts')){
    echo " <li>level 3 (author) </li>"; 
  } 
  if(current_user_can('edit_posts')){
    echo " <li>level 2 (contributor) </li>"; 
  }if(current_user_can('read')){
    echo " <li>level 1 (subscriber) </li>";
  }
  echo '</ul>';           
?>

<div class="profile">
<?php
  global $current_user;
  get_currentuserinfo();
  echo get_avatar( $current_user->ID, 240 );
?>

<?php 
  $user_id = $user->ID;
  $all_meta_for_user = get_user_meta( $user_id );
?>
<ul class="social_media">
  <li><i class="fa fa-facebook-square"></i> <?= $all_meta_for_user['facebook'][0] ?></li>
  <li><i class="fa fa-twitter-square"></i> <?= $all_meta_for_user['twitter'][0] ?></li>
  <li><i class="fa fa-instagram"></i> <?= $all_meta_for_user['instagram'][0] ?></li>
</ul>
</div>

<h3>Author</h3>
<?php 
  $blogusers = get_users('blog_id=1&orderby=nicename&role=editor'); // ALL Authors
  // $blogusers = get_users('blog_id=1&orderby=nicename&role=author&meta_key=protest_following_id&meta_value='.$this_protest_id); // ALL Authors
  foreach ($blogusers as $user) {
  $user_id = $user->ID;
  $all_meta_for_user = get_user_meta( $user_id );
  echo '<ul class="current_user_details">
           <li>user_login: '  .$all_meta_for_user['user_login'][0] . ' (' . $user->ID . ') </li>
           <li>user_email: '  .$all_meta_for_user['user_email'][0] . '</li>
           <li>ID: '          .$user->ID.'</li>
           <li><br></li>
           <li>display_name: '.$all_meta_for_user['display_name'][0] . '</li>
           <li>first_name: '  .$all_meta_for_user['first_name'][0] . '</li>
           <li>last_name: '   .$all_meta_for_user['last_name'][0] . '</li>
           <li><br></li>
           <li>user_nicename: '   .$all_meta_for_user['user_nicename'][0] . '</li>
           <li>nickname: '   .$all_meta_for_user['nickname'][0] . '</li>
           <li>jabber: '   .$all_meta_for_user['jabber'][0]. '</li>
           <li>aim: '   .$all_meta_for_user['aim'][0] . '</li>
           <li>googleplus: '   .$all_meta_for_user['googleplus'][0] . '</li>
           <li>twitter: '   .$all_meta_for_user['twitter'][0] . '</li>
           <li>Facebook: '   .$all_meta_for_user['facebook'][0] . '</li>
           <li>Avatar: '   .get_avatar( $user->ID, 240 ) . '</li>
        </ul>';
  }
?>


<ul class="rslides">
    <li>
      <?php the_post_thumbnail(); ?>
    </li>
    <li>
      <?php the_post_thumbnail(); ?>
    </li>
  </ul>
  <script type="text/javascript">
      $(function() {
        if ($(".rslides").length) {
            $(".rslides").responsiveSlides({
                speed: 1000,
                auto: true,
                nav: true
            });
          }
      });
    </script>
<h1>Expander</h1>
<div class="expander">
  <a href="javascript:void(0)" class="expander-toggle">Expandable section</a>
  <div class="expander-content">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio mollitia fugiat facilis enim accusamus quisquam aut, repellendus incidunt quod optio facere labore illo numquam ipsum beatae vero debitis, fugit excepturi.</p>
  </div>
</div>

<h1>Card Profiles</h1>
<div class="cards_profiles">
  <div class="card_profile">
    <div class="card_profile-image">
      <img src="/images/temp-thumb.png" alt="">
      <span><h5>Digital Marketing</h5></span>
    </div>
    <div class="card_profile-header">
      <p class="h1">Learn To Knit Finger Puppets</p>
      <time class="updated" datetime="<?php // echo get_the_time('c'); ?>">21 - 23 MAY 2014<?php// echo get_the_date(); ?></time>
    </div>
    <div class="card_profile-copy">
      <p>Help us make finger puppets cool again. We can have a funger puppet party which <a href="">read more <i class="fa fa-chevron-right"></i></a></p>
    </div>
    <div class="card_profile-stats">
      <ul>
        <li><span><i class="fa fa-headphones"></i></span></li>
        <li><span><i class="fa fa-eye"></i></span></li>
      </ul>
    </div>
    <button>Book It</button>
  </div>

  <div class="card_profile">
    <div class="ribbon-wrapper"><div class="ribbon">RIBBON</div></div>
    <div class="card_profile-image">
      <img src="https://raw.github.com/Magnus-G/Random/master/mountains-4.png" alt="">
    </div>
    <div class="card_profile-header">
      <p class="h1">Podcast: Fact - Children Have Small Hands and Feet</p>
      <p class="byline author vcard">
        <?php echo __('By', 'roots'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn">Author<?php // echo get_the_author(); ?></a> in <span class="tax-color brand-orange">Taxonomy</span>
      </p>
      <time class="updated" datetime="<?php // echo get_the_time('c'); ?>">21 - 23 MAY 2014<?php// echo get_the_date(); ?></time>
    </div>
    <!-- <div class="card_profile-copy">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, officiis sunt neque facilis culpa molestiae necessitatibus delectus veniam provident.</p>
    </div>
    <div class="card_profile-stats">
      <ul>
        <li>98<span>Items</span></li>
        <li>298<span>Things</span></li>
        <li>923<span>Objects</span></li>
      </ul>
    </div> -->
  </div>

  <div class="card_profile">
    <!-- <div class="ribbon-wrapper"><div class="ribbon">RIBBON</div></div> -->
<!--     <div class="card_profile-image">
      <img src="https://raw.github.com/Magnus-G/Random/master/mountains-4.png" alt="">
    </div> -->
    <div class="card_profile-header">
      <p class="h1">Podcast: Fact - Children Have Small Hands and Feet</p>
      <p class="byline author vcard">
        <?php echo __('By', 'roots'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn">Author<?php // echo get_the_author(); ?></a> in <span class="tax-color brand-lime">Taxonomy</span>
      </p>
      <time class="updated" datetime="<?php // echo get_the_time('c'); ?>">21 - 23 MAY 2014<?php// echo get_the_date(); ?></time>
    </div>
    <!-- <div class="card_profile-copy">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, officiis sunt neque facilis culpa molestiae necessitatibus delectus veniam provident.</p>
    </div>
    <div class="card_profile-stats">
      <ul>
        <li>98<span>Items</span></li>
        <li>298<span>Things</span></li>
        <li>923<span>Objects</span></li>
      </ul>
    </div> -->
  </div>
</div>
<div class="clearfix"></div>
<p><i class="fa fa-eye-o"></i> Posts by Claire</p>

<h4>Comments</h4>
<div class="author_comment outlined">
  <div class="author_comment-image">
    <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_1.png" alt="Logo image">
    <ul class="social_media">
      <li><i class="fa fa-facebook-square"></i></li>
      <li><i class="fa fa-twitter-square"></i></li>
      <li><i class="fa fa-instagram"></i></li>
    </ul>
  </div>
  <div class="author_comment-content">
    <h1>Clare Harrison</h1>
    <p>Clare Harrison is a passionate entrepreneur whose focus is creating a collaborative environment where individuals can actively learn and share their knowledge. A few years, and a few different iterations, later transitioned her consultancy into an online education offering known as LKR Social Media, an e-learning platform that provides social media and online marketing training courses for small business owners.
</p>
    <p class="author_comment-detail">
      w <a href="">www.clareharrison.com</a><br>
      e <a href="">hello@clareharrison.com</a>
    </p>
  </div>
</div>

<h1>Hero Section</h1>
<div class="hero">
  <div class="hero-inner">
    <a href="" class="hero-logo"><img src="https://raw.github.com/Magnus-G/Random/master/placeholder_logo_1.png" alt=""></a>
    <div class="hero-copy">
      <h1>Short description of Product</h1>
      <p>A few reasons why this product is worth using, who is it for and why do they need it.</p>  
    </div>
    <button>Learn More</button>
  </div>
</div>

<header class="centered-navigation">
  <div class="centered-navigation-wrapper">
    <a href="javascript:void(0)" class="mobile-logo">
      <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_3_dark.png" alt="Logo image">
    </a>
    <a href="" class="centered-navigation-menu-button">MENU</a>
    <ul class="centered-navigation-menu">
      <li class="nav-link"><a href="javascript:void(0)">Products</a></li>
      <li class="nav-link"><a href="javascript:void(0)">About Us</a></li>
      <li class="nav-link"><a href="javascript:void(0)">Contact</a></li>
      <li class="nav-link logo">
        <a href="javascript:void(0)" class="logo">
          <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_3_dark.png" alt="Logo image">
        </a>
      </li>
      <li class="nav-link"><a href="javascript:void(0)">Testimonials</a></li>
      <li class="nav-link more"><a href="javascript:void(0)">More</a>
        <ul class="submenu">
          <li><a href="javascript:void(0)">Submenu Item</a></li>
          <li><a href="javascript:void(0)">Another Item</a></li>
          <li class="more"><a href="javascript:void(0)">Item with submenu</a>
            <ul class="submenu">
              <li><a href="javascript:void(0)">Sub-submenu Item</a></li>
              <li><a href="javascript:void(0)">Another Item</a></li>
            </ul>
          </li>
          <li class="more"><a href="javascript:void(0)">Another submenu</a>
            <ul class="submenu">
              <li><a href="javascript:void(0)">Sub-submenu</a></li>
              <li><a href="javascript:void(0)">An Item</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="nav-link"><a href="javascript:void(0)">Sign up</a></li>
    </ul>
  </div>
</header>


<h1>Grid Items</h1>
<div class="grid-items">
  <a href="javascript:void(0)" class="grid-item">
    <img src="https://raw.github.com/Magnus-G/Random/master/placeholder_logo_1.png" alt="">
    <h1>Grid Item</h1>
    <p>Lorem ipsum dolor sit amet, elit. Rem, illum.</p>
  </a>
  <a href="javascript:void(0)" class="grid-item grid-item-big grid-item-image">
    <img src="https://raw.github.com/Magnus-G/Random/master/placeholder_logo_2.png" alt="">
    <h1>Grid Item With an Image</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, illum.</p>
  </a>
  <a href="javascript:void(0)" class="grid-item grid-item-big">
    <img src="https://raw.github.com/Magnus-G/Random/master/placeholder_logo_3.png" alt="">
    <h1>Another Wide Item</h1>
    <p>Lorem ipsum consectetur dolor sit amet, consectetur adipisicing elit. Rem, illum.</p>
  </a>
  <a href="javascript:void(0)" class="grid-item">
    <img src="https://raw.github.com/Magnus-G/Random/master/placeholder_logo_2.png" alt="">
    <h1>Last Grid Item</h1>
    <p>Lorem ipsum dolor sit amet, elit. Rem, illum.</p>
  </a>
  <a href="javascript:void(0)" class="grid-item">
    <img src="https://raw.github.com/Magnus-G/Random/master/placeholder_logo_2.png" alt="">
    <h1>Last Grid Item</h1>
    <p>Lorem ipsum dolor sit amet, elit. Rem, illum.</p>
  </a>
  <a href="javascript:void(0)" class="grid-item">
    <img src="https://raw.github.com/Magnus-G/Random/master/placeholder_logo_3.png" alt="">
    <h1>A Grid Item</h1>
    <p>Lorem ipsum dolor sit amet, elit. Rem, illum.</p>
  </a>
  <a href="javascript:void(0)" class="grid-item">
    <img src="https://raw.github.com/Magnus-G/Random/master/placeholder_logo_1.png" alt="">
    <h1>Item</h1>
    <p>Lorem ipsum dolor sit amet, elit. Rem, illum.</p>
  </a>
</div>


<h1>Bullet List</h1>
<div class="bullets">
  <div class="bullet three-col-bullet">
    <div class="bullet-icon bullet-icon-1">
      <img src="https://raw.github.com/Magnus-G/Random/master/placeholder_logo_2.png" alt="">
    </div>
    <div class="bullet-content">
      <h2>This Bullet Title</h2>
      <p>Lorem dolor sit amet consectetur adipisicing elit. Doloremque, minus, blanditiis, voluptatibus nulla quia ipsam sequi quos iusto aliquam iste magnam accusamus molestias quo illum impedit. Odit officia autem.</p>
      </div>
  </div>  
  <div class="bullet three-col-bullet">
    <div class="bullet-icon bullet-icon-2">
      <img src="https://raw.github.com/Magnus-G/Random/master/placeholder_logo_3.png" alt="">
    </div>
    <div class="bullet-content">
      <h2>Another Bullet Title</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, minus, blanditiis, voluptatibus nulla quia ipsam sequi quos iusto aliquam iste magnam accusamus molestias quo illum.</p>
    </div>
  </div>
  <div class="bullet three-col-bullet">
    <div class="bullet-icon bullet-icon-3">
      <img src="https://raw.github.com/Magnus-G/Random/master/placeholder_logo_4.png" alt="">
    </div>
    <div class="bullet-content">
      <h2>Last Bullet Title</h2>
      <p>Lorem ipsum sit amet consectetur adipisicing elit. Doloremque, minus, blanditiis, voluptatibus nulla quia ipsam sequi quos iusto aliquam iste magnam accusamus molestias quo illum impedit. Odit officia autem.</p>
    </div>
  </div> 
</div>
<h1>Bullet List Two</h1>
<div class="bullets">
  <div class="bullet two-col-bullet">
    <div class="bullet-icon bullet-icon-1">
      <img src="https://raw.github.com/Magnus-G/Random/master/placeholder_logo_2.png" alt="">
    </div>
    <div class="bullet-content">
      <h2>This Bullet Title</h2>
      <p>Lorem dolor sit amet consectetur adipisicing elit. Doloremque, minus, blanditiis, voluptatibus nulla quia ipsam sequi quos iusto aliquam iste magnam accusamus molestias quo illum impedit. Odit officia autem.</p>
      </div>
  </div>  
  <div class="bullet two-col-bullet">
    <div class="bullet-icon bullet-icon-2">
      <img src="https://raw.github.com/Magnus-G/Random/master/placeholder_logo_3.png" alt="">
    </div>
    <div class="bullet-content">
      <h2>Another Bullet Title</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, minus, blanditiis, voluptatibus nulla quia ipsam sequi quos iusto aliquam iste magnam accusamus molestias quo illum.</p>
    </div>
  </div>
</div>

<h3>Accordian Tabs Minimal</h3>
<ul class="accordion-tabs-minimal">
  <li class="tab-header-and-content">
    <a href="#" class="tab-link is-active">Tab Item</a>
    <div class="tab-content">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt pellentesque lorem, id suscipit dolor rutrum id. Morbi facilisis porta volutpat. Fusce adipiscing, mauris quis congue tincidunt, sapien purus suscipit odio, quis dictum odio tortor in sem. Ut sit amet libero nec orci mattis fringilla. Praesent eu ipsum in sapien tincidunt molestie sed ut magna. Nam accumsan dui at orci rhoncus pharetra tincidunt elit ullamcorper. Sed ac mauris ipsum. Nullam imperdiet sapien id purus pretium id aliquam mi ullamcorper.</p>
    </div>
  </li>
  <li class="tab-header-and-content">
    <a href="#" class="tab-link">Another Tab</a>
    <div class="tab-content">
      <p>Ut laoreet augue et neque pretium non sagittis nibh pulvinar. Etiam ornare tincidunt orci quis ultrices. Pellentesque ac sapien ac purus gravida ullamcorper. Duis rhoncus sodales lacus, vitae adipiscing tellus pharetra sed. Praesent bibendum lacus quis metus condimentum ac accumsan orci vulputate. Aenean fringilla massa vitae metus facilisis congue. Morbi placerat eros ac sapien semper pulvinar. Vestibulum facilisis, ligula a molestie venenatis, metus justo ullamcorper ipsum, congue aliquet dolor tortor eu neque. Sed imperdiet, nibh ut vestibulum tempor, nibh dui volutpat lacus, vel gravida magna justo sit amet quam. Quisque tincidunt ligula at nisl imperdiet sagittis. Morbi rutrum tempor arcu, non ultrices sem semper a. Aliquam quis sem mi.</p>
    </div>
  </li>
  <li class="tab-header-and-content">
    <a href="#" class="tab-link">Third</a>
    <div class="tab-content">
      <p>Donec mattis mauris gravida metus laoreet non rutrum sem viverra. Aenean nibh libero, viverra vel vestibulum in, porttitor ut sapien. Phasellus tempor lorem id justo ornare tincidunt. Nulla faucibus, purus eu placerat fermentum, velit mi iaculis nunc, bibendum tincidunt ipsum justo eu mauris. Nulla facilisi. Vestibulum vel lectus ac purus tempus suscipit nec sit amet eros. Nullam fringilla, enim eu lobortis dapibus, quam magna tincidunt nibh, sit amet imperdiet dolor justo congue turpis.</p>    
    </div>
  </li>
  <li class="tab-header-and-content">
    <a href="#" class="tab-link">Last Item</a>
    <div class="tab-content">
      <p>Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus dui urna, mollis vel suscipit in, pharetra at ligula. Pellentesque a est vel est fermentum pellentesque sed sit amet dolor. Nunc in dapibus nibh. Aliquam erat volutpat. Phasellus vel dui sed nibh iaculis convallis id sit amet urna. Proin nec tellus quis justo consequat accumsan. Vivamus turpis enim, auctor eget placerat eget, aliquam ut sapien.</p>
    </div>
  </li>
</ul>

<h3>Accordian Tabs</h3>
<ul class="accordion-tabs">
  <li class="tab-header-and-content">
    <a href="#" class="is-active tab-link">Tab Item</a>
    <div class="tab-content">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt pellentesque lorem, id suscipit dolor rutrum id. Morbi facilisis porta volutpat. Fusce adipiscing, mauris quis congue tincidunt, sapien purus suscipit odio, quis dictum odio tortor in sem. Ut sit amet libero nec orci mattis fringilla. Praesent eu ipsum in sapien tincidunt molestie sed ut magna. Nam accumsan dui at orci rhoncus pharetra tincidunt elit ullamcorper. Sed ac mauris ipsum. Nullam imperdiet sapien id purus pretium id aliquam mi ullamcorper.</p>
      <ol class="cols2">
        <li><i class="fa fa-check"></i> Test 1</li>
        <li><i class="fa fa-check"></i> Test 1</li>
        <li><i class="fa fa-check"></i> Test 1</li>
      </ol>
    </div>
  </li>
  <li class="tab-header-and-content">
    <a href="#" class="tab-link">Another Tab</a>
    <div class="tab-content">
      <p>Ut laoreet augue et neque pretium non sagittis nibh pulvinar. Etiam ornare tincidunt orci quis ultrices. Pellentesque ac sapien ac purus gravida ullamcorper. Duis rhoncus sodales lacus, vitae adipiscing tellus pharetra sed. Praesent bibendum lacus quis metus condimentum ac accumsan orci vulputate. Aenean fringilla massa vitae metus facilisis congue. Morbi placerat eros ac sapien semper pulvinar. Vestibulum facilisis, ligula a molestie venenatis, metus justo ullamcorper ipsum, congue aliquet dolor tortor eu neque. Sed imperdiet, nibh ut vestibulum tempor, nibh dui volutpat lacus, vel gravida magna justo sit amet quam. Quisque tincidunt ligula at nisl imperdiet sagittis. Morbi rutrum tempor arcu, non ultrices sem semper a. Aliquam quis sem mi.</p>
    </div>
  </li>
  <li class="tab-header-and-content">
    <a href="#" class="tab-link">Third</a>
    <div class="tab-content">
      <p>Donec mattis mauris gravida metus laoreet non rutrum sem viverra. Aenean nibh libero, viverra vel vestibulum in, porttitor ut sapien. Phasellus tempor lorem id justo ornare tincidunt. Nulla faucibus, purus eu placerat fermentum, velit mi iaculis nunc, bibendum tincidunt ipsum justo eu mauris. Nulla facilisi. Vestibulum vel lectus ac purus tempus suscipit nec sit amet eros. Nullam fringilla, enim eu lobortis dapibus, quam magna tincidunt nibh, sit amet imperdiet dolor justo congue turpis.</p>    
    </div>
  </li>
  <li class="tab-header-and-content">
    <a href="#" class="tab-link">Last Item</a>
    <div class="tab-content">
      <p>Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus dui urna, mollis vel suscipit in, pharetra at ligula. Pellentesque a est vel est fermentum pellentesque sed sit amet dolor. Nunc in dapibus nibh. Aliquam erat volutpat. Phasellus vel dui sed nibh iaculis convallis id sit amet urna. Proin nec tellus quis justo consequat accumsan. Vivamus turpis enim, auctor eget placerat eget, aliquam ut sapien.</p>
    </div>
  </li>
</ul>

<div class="hover-tile-outer">
  <div class="hover-tile-container">
    <div class="hover-tile hover-tile-visible" style="padding:0;">
      Hover
      <img src="/images/temp-thumb.png" alt="" style="min-width:100%;">
    </div>
    <div class="hover-tile hover-tile-hidden">
      <h4>Digital Marketing</h4>
      <p>Lorem ipsum dolor sit amet.</p>
    </div>
  </div>
</div>

<div class="tooltip-item">
  Hover for Tooltip
  <div class="tooltip">
    <p>Lorem ipsum doloandae oluptate aperiam unde voluptates quas.</p>
  </div>
</div>


