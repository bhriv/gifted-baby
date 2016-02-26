<?php  /* Template Name: Courses */
$general_args = array(
    'post_status' => 'publish',
    'post_type' => 'course',
    'posts_per_page' => -1,
    'order' => 'ASC'
 );
 $general_article_query = new WP_Query($general_args);
?>
<?php 
  // $tab = 'all active';
  $tab = ($_GET["tab"]); 
  // echo 'tab: ' .$tab;
?>
<div class="main-container">
  <div class="">
    <div class="default-page">
      <div class="clearfix push"></div>
      <nav>
        <ul id="course_switch">
          <li id="show-all" <?php if ($tab == 'all') : echo 'class=" active"'; endif ?>><a href="javascript:void(0)">All</a></li>
          <li id="show-creative" <?php if ($tab == 'creative') : echo 'class=" active"'; endif ?>><a href="javascript:void(0)">Creative</a></li>
          <li id="show-entrepreneurship" <?php if ($tab == 'entrepreneurship') : echo 'class=" active"'; endif ?>><a href="javascript:void(0)">Entrepreneurship</a></li>
          <!-- <li id="show-future-of-work"><a href="javascript:void(0)">Future of Work</a></li> -->
          <li id="show-marketing" <?php if ($tab == 'marketing') : echo 'class=" active"'; endif ?>><a href="javascript:void(0)" >Marketing</a></li>
          <li id="show-self" <?php if ($tab == 'self') : echo 'class=" active"'; endif ?>><a href="javascript:void(0)">Self</a></li>
          <li id="show-technology" <?php if ($tab == 'technology') : echo 'class=" active"'; endif ?>><a href="javascript:void(0)">Technology</a></li>
        </ul>
      </nav>
      <div class="clearfix"></div>
      <div id="coming_soon" class="hidden" style="margin-top: 40px; margin-left:16px;">
        <p>Coming soon!</p>
      </div>
    <?php $general_article_item = 1; ?>
      <div class="cards_profiles" id="card_holder">
      <?php if($general_article_query->have_posts()) : ?>
      <?php while($general_article_query->have_posts()) : $general_article_query->the_post() ?>

       <?php get_template_part('card_profile');?>

      <?php $general_article_item++; 
            endwhile ?>
    <?php endif; wp_reset_query(); ?>
      </div>    
    </div>
  </div>
</div>


<script type="text/javascript">
  function reset_course_filter(){
    $('#show-all').removeClass('active');
    $('#show-creative').removeClass('active');
    $('#show-entrepreneurship').removeClass('active');
    $('#show-future-of-work').removeClass('active');
    $('#show-marketing').removeClass('active');
    $('#show-self').removeClass('active');
    $('#show-technology').removeClass('active');
    $('#coming_soon').addClass('hidden');
  }
  function clear_floats(){
    $('div.card_profile').css('clear','none');
  }

  $(document).ready(function(){
    $('#show-all').on('click touchstart', function(e){
      reset_course_filter();
      $(this).addClass('active');
      $('#card_holder .card_profile.creative').addClass('show-me');
      $('#card_holder .card_profile.entrepreneurship').addClass('show-me');
      $('#card_holder .card_profile.future-of-work').addClass('show-me');
      $('#card_holder .card_profile.marketing').addClass('show-me');
      $('#card_holder .card_profile.self').addClass('show-me');
      $('#card_holder .card_profile.technology').addClass('show-me');
      e.preventDefault();
    });
    $('#show-creative').on('click touchstart', function(e){
      reset_course_filter();
      $(this).addClass('active');
      $('#card_holder .card_profile.card_profile').removeClass('show-me');
      $('#card_holder .card_profile.creative').addClass('show-me');
      $('#coming_soon').removeClass('hidden');
      clear_floats();
      e.preventDefault();
    });
    $('#show-entrepreneurship').on('click touchstart', function(e){
      reset_course_filter();
      $(this).addClass('active');
      $('#card_holder .card_profile.card_profile').removeClass('show-me');
      $('#card_holder .card_profile.entrepreneurship').addClass('show-me');
      $('#coming_soon').addClass('hidden');
      clear_floats();
      e.preventDefault();
    });
    $('#show-future-of-work').on('click touchstart', function(e){
      reset_course_filter();
      $(this).addClass('active');
      $('#card_holder .card_profile.card_profile').removeClass('show-me');
      $('#card_holder .card_profile.future-of-work').addClass('show-me');
      $('#coming_soon').addClass('hidden');
      clear_floats();
      e.preventDefault();
    });
    $('#show-marketing').on('click touchstart', function(e){
      reset_course_filter();
      $(this).addClass('active');
      $('#card_holder .card_profile.card_profile').removeClass('show-me');
      $('#card_holder .card_profile.marketing').addClass('show-me');
      $('#coming_soon').removeClass('hidden');
      clear_floats();
      e.preventDefault();
    });
    $('#show-self').on('click touchstart', function(e){
      reset_course_filter();
      $(this).addClass('active');
      $('#card_holder .card_profile.card_profile').removeClass('show-me');
      $('#card_holder .card_profile.self').addClass('show-me');
      $('#coming_soon').addClass('hidden');
      clear_floats();
      e.preventDefault();
    });
    $('#show-technology').on('click touchstart', function(e){
      reset_course_filter();
      $(this).addClass('active');
      $('#card_holder .card_profile.card_profile').removeClass('show-me');
      $('#card_holder .card_profile.technology').addClass('show-me');
      $('#coming_soon').addClass('hidden');
      clear_floats();
      e.preventDefault();
    });
  });
</script>

<style type="text/css">
  body.courses #card_holder .card_profile:nth-child(4),
  body.courses #card_holder .card_profile:nth-child(7),
  body.courses #card_holder .card_profile:nth-child(10),
  body.courses #card_holder .card_profile:nth-child(13),
  body.courses #card_holder .card_profile:nth-child(16){
    clear: left;
  }
</style>