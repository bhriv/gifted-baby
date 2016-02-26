<?php while (have_posts()) : the_post(); ?>
<?php 
  $user = wp_get_current_user();
  $user_id = $user->ID;
  $author_email = get_the_author_meta('user_email');
  $author_name = get_the_author_meta('display_name');
  $author_id = get_the_author_meta('ID');
  $this_post_id = $post->ID;
?>
<section class="slider_holder" id="top_slider">
  <?php 
      if ( !is_user_logged_in() ) 
      { 
        echo '<a onclick="you_must_login()" id="book_a_session" class="modal_trigger"><button>Book Session</button></a>'; ?>
        <a id="contact_seller" onclick="you_must_login()"><button><i class="fa fa-envelope"></i> Contact</button></a>
      <?php
      }else{
      $day_rate = get_post_meta( $post->ID, 'studio_day_rate', true );
      echo '<a id="book_a_session" class="modal_trigger" href="'.site_url().
                        '/book-session/?session_studio_id='.$post->ID.'&day_rate='.$day_rate.'" class="btn btn-success cta"><button>Book Session</button></a>
      ';
      echo '<a id="contact_seller" class="userpro-init-chat dt-btn dt-btn-s btn-orange" href="#" data-chat_from="'.$user_id.'" data-chat_with="'.$author_id.'"><button><i class="fa fa-envelope"></i> Contact</button></a>';
    }
  ?>
  <div class="studio_overview"> 
    <h1><span class="seo_term">Recording Studio </span><?php the_title();?></h1>
  </div>
  <ul class="rslides">
    <li>
      <?php the_post_thumbnail(); ?>
    </li>
    <?php 
      $images = get_post_meta( $post->ID, 'studio_image_gallery' );
      if ( $images ) {
          $slide_number = 0;
          foreach ( $images as $attachment_id ) {
              $thumb = wp_get_attachment_image( $attachment_id, 'full' );
              // $thumb = wp_get_attachment_image( $attachment_id, 'post-thumb' );
              $full_size = wp_get_attachment_url( $attachment_id );
              // print_r($full_size);
              printf( '<li><a href="%s">%s</a></li>', '#', $thumb );
              echo "<!-- slide #" .$slide_number ."-->";
              $slide_number++;
          }?>
      <script type="text/javascript">
        $(function() {
          if ($(".rslides").length) {
              $(".rslides").responsiveSlides({
                  speed: 1000,
                  auto: false,
                  nav: true
              });
            }
        });
      </script>
    <?php           
      }
    ?>
  </ul>
</section>
<article>
  <?php include_once('key_terms.php'); ?>
  <div class="clearfix"></div>
  <section id="description">
    <h3><big><i class="fa fa-info-circle"></i></big> Description</h3>
    <?php the_content();?>
    <a id="read_more">Read More...</a>
  </section>
  <section id="studio_listen">
      <h3><big><i class="fa fa-headphones"></i></big> Listen</h3>
      <?php 
        $soundcloud_playlist = get_post_meta( $post->ID, 'studio_music_playlist', true ); 
        if($soundcloud_playlist != '') : ?>
          <p><?php  echo do_shortcode('[soundcloud]'.get_post_meta( $post->ID, "studio_music_playlist", true ).'[/soundcloud]'); ?></p>
      <?php endif ?>
      <?php 
        $spotify_user = get_post_meta( $post->ID, 'studio_spotify_playlist_username', true ); 
        if($spotify_user != '') : ?>
          <p><iframe src="https://embed.spotify.com/?uri=spotify:user:<?php echo get_post_meta( $post->ID, 'studio_spotify_playlist_username', true ); ?>:playlist:<?php echo get_post_meta( $post->ID, 'studio_spotify_playlist_id_code', true ); ?>" width="500" height="100" frameborder="0" allowtransparency="true" style="width: 100% !important;"></iframe></p>
      <?php endif ?>
  </section>
  <section id="studio_credits">
      <h3><big><i class="fa fa-history"></i></big> Previous Sessions</h3>
      <ul class="nav nav-pills">
        <?php 
          $repeat_field = get_post_meta( $post->ID, 'studio_previous_sessions', true );
          if ( $repeat_field ) {
              $values = explode( '| ', $repeat_field );
              foreach ($values as $value) {
                echo '<li><a>'.$value.'</a></li>';
              }
          } 
        ?>
      </ul>
  </section>
  <section id="reviews">
    <h3><big><i class="fa fa-comments-o"></i></big> Reviews</h3>
    <?php include_once('star_rating.php');?>
    <?php 
        echo '<a class="modal_trigger" target="blank" id="counter_protest_link" href="'.site_url().
                          '/add-review/?original_studio_id='.$post->ID.'" class="btn btn-success cta"><i class="fa fa-pencil"></i> Submit a Review</a>
        ';?>
    <div class="clearfix"></div>
  </section>

  <section id="equipment">
    <h3><big><i class="fa fa-gears"></i></big> Equipment</h3>
    <ul class="nav nav-pills">
      <?php 
        $repeat_field = get_post_meta( $post->ID, 'studio_equipment', true );
        if ( $repeat_field ) {
            $values = explode( '| ', $repeat_field );
            foreach ($values as $value) {
              echo '<li><a>'.$value.'</a></li>';
            }
        } 
      ?>
    </ul>
  </section>

<!--   <section>
    <h2>Videos</h2>
    <div class="videoWrapper">
      <iframe width="640" height="360" src="//www.youtube.com/embed/wBvC446s75I?list=UUazBLv32tH4vdigL_Bic1OQ" frameborder="0" allowfullscreen></iframe>
    </div>
  </section> -->

  <!-- <section>
    <h2>Links</h2>
    <p>
      <ul class="social_media">
        <li><i class="fa fa-facebook-square"></i></li>
        <li><i class="fa fa-twitter-square"></i></li>
        <li><i class="fa fa-youtube-square"></i></li>
        <li><i class="fa fa-soundcloud"></i></li>
      </ul>
    </p>
  </section> -->
  <section>
    <div class="addthis_toolbox addthis_default_style ">
      <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
      <a class="addthis_button_tweet"></a>
      <a class="addthis_button_google_plusone at300b" g:plusone:size="medium"></a>
      <a class="addthis_counter addthis_pill_style"></a>
      <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal"></a>
    </div> 
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-545d6a7c37a82288" async="async"></script>
    <div class="clearfix"></div>
  </section>
  <h3><i class="fa fa-comments-o"></i> <a id="report_a_problem" class="modal_trigger" href="mailto:admin@trud.io">Report a Problem</a></h3>
</article>

<aside id="booking_details">
  <div class="">
    <h2>Booking Details</h2>
    <div class="prices">
      <p>
        <ul>
          <?php // echo get_post_meta( $post->ID, 'studio_rate', true ); ?>
          <li><span><?php echo '<a href="'.site_url().'/faq/" target="blank">Day Rate:</a>'; ?></span> $<?php echo get_post_meta( $post->ID, 'studio_day_rate', true ); ?> <small>/ 10 hour day</small></li>
          <li><span><?php echo '<a href="'.site_url().'/faq/" target="blank">Min Booking:</a>'; ?></span> <?php echo get_post_meta( $post->ID, 'studio_minimum_booking', true ); ?> Days</li>
          <li><span><?php echo '<a href="'.site_url().'/faq/" target="blank">Terms:</a>'; ?></span> 
          <?php 
            $my_studio_terms = get_post_meta( $post->ID, 'studio_terms', true );
            // echo $studio_terms; 
            if ($my_studio_terms == 'Moderate - Cancellations must be made at least 1 week in advance. Rescheduling is possible.'){
              echo 'Moderate';
            }
            if ($my_studio_terms == 'Medium - Cancellations must be made at least 10 or more days in advance. Rescheduling is possible.'){
              echo 'Medium';
            }
            if ($my_studio_terms == 'Strict - Cancellations or rescheduling must be made at least 20 days in advance.'){
              echo 'Strict';
            }
          ?>
          </li>
        </ul>
      </p>  
    </div>
    <footer>
      <?php echo do_shortcode('[userpro template=view user=author]'); ?>
    </footer>
    <hr>
    <?php 
      $google_cal_feed = get_post_meta( $post->ID, 'studio_calendar_id', true );
      if ($google_cal_feed != '') { ?>
        <p class="h2">Availablility</p>
        <script type='text/javascript'>
          $(document).ready(function() {
              $('#calendar').fullCalendar({
                  // events: '<?php $google_cal_feed; ?>'
                  height: 400,
                  events: 'https://www.google.com/calendar/feeds/bej8ep6rcerkl9gki34fclhp3g%40group.calendar.google.com/public/basic'
              });
          });
        </script>
        <div id='calendar'></div>
        <span class='busy'> <i class="fa fa-stop"></i> = Not Available</span></span>
      <?php 
      }
    ?>
  </div>
</aside>
<aside>
  <section id="studio_tweets">
    <?php 
      $username_twitter = get_post_meta( $post->ID, 'studio_twitter_username', true );
    ?>
    <h2><big><i class="fa fa-twitter-square"></i></big> Twitter <small>&#64;<?= $username_twitter ?></small></h2>
    <div class="entry-content">
      <div id="twitter_box" class="social_box">
        <div id="twitter_inner_box">
          <div id="latest_tweet"></div>  
          <script type="text/javascript">
            /*********************************************************************
            *  #### Twitter Post Fetcher v10.0 ####
            *  Coded by Jason Mayes 2013. A present to all the developers out there.
            *  www.jasonmayes.com
            *  Please keep this disclaimer with my code if you use it. Thanks. :-)
            *  Got feedback or questions, ask here: 
            *  http://www.jasonmayes.com/projects/twitterApi/
            *  Updates will be posted to this site.
            *********************************************************************/
            var twitterFetcher=function(){function x(e){return e.replace(/<b[^>]*>(.*?)<\/b>/gi,function(c,e){return e}).replace(/class=".*?"|data-query-source=".*?"|dir=".*?"|rel=".*?"/gi,"")}function p(e,c){for(var g=[],f=RegExp("(^| )"+c+"( |$)"),a=e.getElementsByTagName("*"),h=0,d=a.length;h<d;h++)f.test(a[h].className)&&g.push(a[h]);return g}var y="",l=20,s=!0,k=[],t=!1,q=!0,r=!0,u=null,v=!0,z=!0,w=null,A=!0;return{fetch:function(e,c,g,f,a,h,d,b,m,n){void 0===g&&(g=20);void 0===f&&(s=!0);void 0===a&&(a=
            !0);void 0===h&&(h=!0);void 0===d&&(d="default");void 0===b&&(b=!0);void 0===m&&(m=null);void 0===n&&(n=!0);t?k.push({id:e,domId:c,maxTweets:g,enableLinks:f,showUser:a,showTime:h,dateFunction:d,showRt:b,customCallback:m,showInteraction:n}):(t=!0,y=c,l=g,s=f,r=a,q=h,z=b,u=d,w=m,A=n,c=document.createElement("script"),c.type="text/javascript",c.src="//cdn.syndication.twimg.com/widgets/timelines/"+e+"?&lang=en&callback=twitterFetcher.callback&suppress_response_codes=true&rnd="+Math.random(),document.getElementsByTagName("head")[0].appendChild(c))},
            callback:function(e){var c=document.createElement("div");c.innerHTML=e.body;"undefined"===typeof c.getElementsByClassName&&(v=!1);e=[];var g=[],f=[],a=[],h=[],d=0;if(v)for(c=c.getElementsByClassName("tweet");d<c.length;){0<c[d].getElementsByClassName("retweet-credit").length?a.push(!0):a.push(!1);if(!a[d]||a[d]&&z)e.push(c[d].getElementsByClassName("e-entry-title")[0]),h.push(c[d].getAttribute("data-tweet-id")),g.push(c[d].getElementsByClassName("p-author")[0]),f.push(c[d].getElementsByClassName("dt-updated")[0]);
            d++}else for(c=p(c,"tweet");d<c.length;)e.push(p(c[d],"e-entry-title")[0]),h.push(c[d].getAttribute("data-tweet-id")),g.push(p(c[d],"p-author")[0]),f.push(p(c[d],"dt-updated")[0]),0<p(c[d],"retweet-credit").length?a.push(!0):a.push(!1),d++;e.length>l&&(e.splice(l,e.length-l),g.splice(l,g.length-l),f.splice(l,f.length-l),a.splice(l,a.length-l));c=[];d=e.length;for(a=0;a<d;){if("string"!==typeof u){var b=new Date(f[a].getAttribute("datetime").replace(/-/g,"/").replace("T"," ").split("+")[0]),b=u(b);
            f[a].setAttribute("aria-label",b);if(e[a].innerText)if(v)f[a].innerText=b;else{var m=document.createElement("p"),n=document.createTextNode(b);m.appendChild(n);m.setAttribute("aria-label",b);f[a]=m}else f[a].textContent=b}b="";s?(r&&(b+='<div class="user">'+x(g[a].innerHTML)+"</div>"),b+='<p class="tweet">'+x(e[a].innerHTML)+"</p>",q&&(b+='<p class="timePosted">'+f[a].getAttribute("aria-label")+"</p>")):e[a].innerText?(r&&(b+='<p class="user">'+g[a].innerText+"</p>"),b+='<p class="tweet">'+e[a].innerText+
            "</p>",q&&(b+='<p class="timePosted">'+f[a].innerText+"</p>")):(r&&(b+='<p class="user">'+g[a].textContent+"</p>"),b+='<p class="tweet">'+e[a].textContent+"</p>",q&&(b+='<p class="timePosted">'+f[a].textContent+"</p>"));A&&(b+='<p class="interact"><a href="https://twitter.com/intent/tweet?in_reply_to='+h[a]+'" class="twitter_reply_icon">Reply</a><a href="https://twitter.com/intent/retweet?tweet_id='+h[a]+'" class="twitter_retweet_icon">Retweet</a><a href="https://twitter.com/intent/favorite?tweet_id='+
            h[a]+'" class="twitter_fav_icon">Favorite</a></p>');c.push(b);a++}if(null==w){e=c.length;g=0;f=document.getElementById(y);for(h="<ul>";g<e;)h+="<li>"+c[g]+"</li>",g++;f.innerHTML=h+"</ul>"}else w(c);t=!1;0<k.length&&(twitterFetcher.fetch(k[0].id,k[0].domId,k[0].maxTweets,k[0].enableLinks,k[0].showUser,k[0].showTime,k[0].dateFunction,k[0].showRt,k[0].customCallback,k[0].showInteraction),k.splice(0,1))}}}();
            // Go to https://twitter.com/settings/widgets/
            // Signin 
            // Click Create New (light gray button)
            // Click Create Widget
            // Add your Username
            // Click Save
            // Copy the long number that is in the URL /widgets/476563884354990080/
            twitterFetcher.fetch('<?php echo get_post_meta( $post->ID, "studio_twitter_widget_id_number", true ); ?>', 'latest_tweet', 4, true,false,false,'default',false);
            function dateFormatter(date) {
              return date.toTimeString();
            }
          </script>   
        </div>
    </div>
    </div>
  </section>
  <section id="studio_gallery">
    <?php 
      // $userid = "1149774617"; // Mike: 1149774617 Ben: 4154009
      
      $instagram_is_public = get_post_meta( $post->ID, 'is_your_instagram_account_public', true );
if ($instagram_is_public != 'No') : ?>
      <?php     
      $userid = get_post_meta( $post->ID, 'instagram_user_id_number', true ); // Mike: 1149774617 Ben: 4154009
      // echo $userid;
      // $username_instagram = "mikegreenproducer";
      $username_instagram = get_post_meta( $post->ID, 'studio_instagram_username', true ); 
      // echo $username_instagram; ?>
<?php if( ($userid != '') && ($username_instagram != '') ) : ?>
  <?php
      // Get Credentials: http://jelled.com/instagram/access-token
      // http://jelled.com/instagram/lookup-user-id#
      // Supply a user id and an access token
      $accessToken = "4154009.49df296.89adf986c2dc45c8a519d3ae52dc5d0e";
      // Gets our data
      function fetchData($url){
           $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL, $url);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
           curl_setopt($ch, CURLOPT_TIMEOUT, 40);
           $result = curl_exec($ch);
           curl_close($ch); 
           return $result;
      }
      $result = fetchData("https://api.instagram.com/v1/users/".$userid."/media/recent/?access_token=4154009.e267d37.1f41ebeb0fa644da97a39904e273c223&count=8");
      //print_r($result);
      $result = json_decode($result);
      $total_img = 0;
    ?>

  <?php if (!empty($result)) : // Only show Instagram section if there are images returned ?>
    <?php foreach ($result->data as $post): ?>
      <?php $total_img++; ?>
    <?php endforeach ?>
    <?php // echo '<p class="">Total images from this location within the date range: ' .$total_img .'</p>'; ?>
    <?php if ($total_img > 0 ) : ?>
        <div id="instagram_contents">
          <?php 
            echo "<h2><big><i class='fa fa-instagram'></i></big> Instagram <small>&#64;".$username_instagram."</small></h2>";
              foreach ($result->data as $post): ?>
            <?php $insta_tags = $post->tags; ?>
                <a class="thumb fancybox" data-fancybox-group="gallery" target="blank" href="<?= $post->images->standard_resolution->url ?>">
                  <img src="<?= $post->images->thumbnail->url ?>">
                </a>  
            <?php endforeach ?> 
        </div>
  <?php  endif // end check for images ?>
  <?php endif // end check for result ?>
<?php endif // end check for userid and username_instagram ?>
<?php endif // end check for instagram_is_public is not NO ?>
  </section>
</aside>
<?php $done = false; if ($done) : ?>
<aside id="favorites">
  <?php // favorites_button(); ?>
</aside>
<?php endif ?>
<div class="clearfix"></div>
<p class="h1" id="back_up"><a onclick="$('#logo-holder').animatescroll();"><i class="fa fa-arrow-circle-o-up"></i></a></p>      
<script type="text/javascript">
  $("#read_more").click(function() {
    $("section#description").addClass(' full_height');
    $(this).toggle();
  });
</script>
<?php endwhile ?>
