<div class="footer-container row-fluid">
    <footer class="wrapper" role="contentinfo">
        <ul class="social_media">
          <li><a href="https://www.facebook.com/trnpoint"><i class="fa fa-facebook-square"></i></a></li>
          <li><a href="https://twitter.com/trnpoint"><i class="fa fa-twitter-square"></i></a></li>
          <li><a href="https://www.instagram.com/trnpoint"><i class="fa fa-instagram"></i></a></li>
        </ul>
        <div class="clearfix"></div>
        <ul id="nav_shortcuts" role="navigation">
          <?php 
            if(!is_page( array('login')) ){ ?>
          <?php 
                echo '<li><a href="/courses/">Learn</a></li>';
                echo '<li><a href="/about-us">About</a></li>';
                echo '<li><a href="/write-for-us/">Contribute</a></li>';
                echo '<li><a href="/articles/">Blog</a></li>';
                echo '<li><a href="/contact">Contact</a></li>';
                echo '<li><a href="/terms-of-use">T&C</a></li>';
                
           } ?>
        </ul>
    </footer>
</div>
<div class="clearfix"></div>
<div id="sub_footer">
	<div class="container-fluid" role="contentinfo">
    <p><small>&copy; <?php echo date('Y'); ?> TurnPoint &#124; All Rights Reserved</small></p>
	</div>	
</div>	

<?php wp_footer(); ?>

<!-- Unminified -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.2/underscore-min.js"></script>
        <!--
        <script src="assets/js/lumi.js"></script>
        <script src="assets/js/lumi-blackjack.js"></script>
        -->
        
        <script src="<?php echo site_url()?>/assets/js/main.js"></script>
    <script>
        $('#newgame').hide();
        // var people = [];
        // var people = [
        //     {
        //         "name": "Mommy",
        //         "img_url": "<?php echo site_url()?>/uploads/mommy.jpg"
        //     },
        //     {
        //         "name": "Daddy",
        //         "img_url": "<?php echo site_url()?>/uploads/daddy.jpg"
        //     },
        //     {
        //         "name": "Nanni",
        //         "img_url": "<?php echo site_url()?>/uploads/nanni.jpg"
        //     },
        //     {
        //         "name": "Grandma",
        //         "img_url": "<?php echo site_url()?>/uploads/grandma.jpg"
        //     }
        // ];

        var game_counter = 0;
        var correct_answers = 0;
        var attempts = 0;

        // RUN
        runGame();
        function runGame(){
            game_counter++;
            var correct_item = Math.floor(Math.random() * 2);
            var left_card = Math.floor(Math.random() * 2);

            // Randomize the Array
            people.sort(function() { return 0.5 - Math.random() });
            cc(people[0].name+' '+people[1].name+' '+people[2].name, 'info');
            var first_card = people[0];
            cc(first_card.name);
            // Remove first choice to prevent duplicate
            var second_card = people[1];
            cc(second_card.name);
            
            $('#left img').attr("src", people[0].img_url);
            $('#right img').attr("src", people[1].img_url);
            $('#left .name').html(people[0].name);
            $('#right .name').html(people[1].name);

            $('#total_hands').html(game_counter);
            $('.people').removeClass('correct');
            cc('random: '+correct_item, 'info');

            if (correct_item == 0) {
                $('#left').addClass('correct');
            }
            if (correct_item == 1) {
                $('#right').addClass('correct');
            }
            cc(people[0].name,'success');
        }
        

        
        $('.people').on('click', function(event) {
            // getResult();
            attempts++;
            var test = $(this).hasClass('correct');
            cc('test: '+test, 'warning');
            if (test == true) {
                correct_answers++;
                alert('CORRECT ('+correct_answers+'/'+attempts+' attempts) ');
                runGame();
            }else{
                alert('FALSE ('+correct_answers+'/'+attempts+' attempts)');
            }
        });
       
    </script>

    <style>
    .people{
        background: #fff;
        width: 150px;
        height: 150px;
        float: left;
        margin-right: 0px;
        text-align: center;
    }
    .correct{
        background-color: #ccc;
        font-weight: bold;
    }
    </style>
         

<?php 
  $active = false;
if ($active) : ?>
<script>
  alert('BING');
</script>
  <?php if (is_page(array('Home'))) : ?>
    <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js'></script>
    <script>window.jQuery || document.write('<script src="<?php echo site_url();?>/static/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
    <script src="<?php echo site_url();?>/js/min/master-min.js?v=1.1<?php //echo date("Y-m-d-H-i-s"); ?>"></script>  
  <?php endif ?>

  <?php if (is_page('Home')) : ?>
    <style type="text/css">
      body.home div.pad{
        height: 90px;
      }
      body.home .card_profile:nth-child(4n+1){
        margin-left: 2.35765%;
      }
      body.home #career_shifter{
        margin-top: 0;
      }
      h3{text-transform: uppercase;}
    </style>

    <script type='text/javascript' src='/wp-content/plugins/popover/popover-load-js.php?ver=4.0'></script>
    <script type="text/javascript">

      $("#overview").responsiveSlides({
          speed: 3000,
          auto: true,
          nav: true
      });

    $( "#stickyheader a" ).on( "click", function() {
      $( '#switcher_pad' ).css( "height", "140px" );
    });

    $(function(){
          // Check the initial Poistion of the Sticky Header
          var stickyHeaderTop = $('#stickyheader').offset().top;
   
          $(window).scroll(function(){
                  if( $(window).scrollTop() > stickyHeaderTop ) {
                          $('#stickyheader').css({position: 'fixed', top: '0px'});
                          $('#stickyalias').css('display', 'block');
                  } else {
                          $('#stickyheader').css({position: 'static', top: '0px'});
                          $('#stickyalias').css('display', 'none');
                  }
          });
    });
    </script>

  <?php endif ?>
  <?php // include_once('page_based_js.php') ?>
  <script src="<?php echo site_url();?>/js/main.js?v=1.1<?php //echo date("Y-m-d-H-i-s"); ?>"></script>
<?php endif ?>  
