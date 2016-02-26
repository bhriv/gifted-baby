<?php /* Template Name: Edit Studio */ ?>
<h1>Edit Your Studio on Trudio</h1>
<div class="vertical-tabs-container">
  <div id="tab_menu" class="vertical-tabs">
    <a href="#" class="js-vertical-tab vertical-tab is-active" rel="tab1">Overview</a>
    <a href="#" class="js-vertical-tab vertical-tab" rel="tab2">1 Settings</a>
    <a href="#" class="js-vertical-tab vertical-tab" rel="tab3">2 Details</a>
    <a href="#" class="js-vertical-tab vertical-tab" rel="tab4">3 Music</a>
    <a href="#" class="js-vertical-tab vertical-tab" rel="tab5">4 Bookings</a>
    <a href="#" class="js-vertical-tab vertical-tab" rel="tab6">5 Availability</a>
    <a href="#" class="js-vertical-tab vertical-tab" rel="tab7">6 Payments</a>
    <a href="#" class="js-vertical-tab vertical-tab" rel="tab8">7 Save / Submit</a>
  </div>

  <div class="vertical-tab-content-container">
    <?php while (have_posts()) : the_post(); ?>
    <?php the_content();?>
    <?php endwhile ?>

    <div id="tab1" class="js-vertical-tab-content vertical-tab-content">
      <h5>Edit Your Profile is Easy and Free.</h5>
      <p>Fill in the details below you'll have a mini website for your studio that looks great works well on mobile devices, and is very Google friendly so you can passively receive session bookings - all without any coding necessary.</p>
      <p>Creating your profile will take around 25-30 minutes depending on what info you have easily accessible. It will be worth the effort, and non-essential details can be added after we've activated your profile. We recommend taking a bit of extra time in choosing your main profile images to ensure they capture you / your studio. Check out the reference profile of producer / studio owner <a href="/studio/mike-green/" target="blank">Mike Green</a> to see how your information will be used. When you submit your studio we'll review the info to see if there are any suggestions we may have to help your profile look the best it can be.</p>
      <p>Fill in as many details as you can in each of the 6 sections, then <strong>save</strong> your profile to complete later, or <strong>submit</strong> your profile for approval to go live.</p>
      <!-- <p><a href="#" class="js-vertical-tab vertical-tab" rel="tab2"><button>Next: Settings</button></a></p> -->
    </div>

    <header id="music_header">
      <h5>Embedding Your Music</h5>
      <p>If your music is on Soundcloud paste the URL of one of your tracks, albums or sets in the field below. Make sure the track/album is <strong>Public</strong>.</p>
      <p>If your music is on Spotify create a playlist of your music and copy your Spotify Username and Playlist ID below. To learn how to create a Playlist <a href="https://support.spotify.com/us/learn-more/guides/#!/article/Save-your-music-with-Playlists" target="blank">click here</a>. After creating a Playlist, to learn how to find your Spotify Username and Playlist ID <a href="http://trud.io/helpers/spotify.jpg" target="blank">Click Here</a>.</p>
      <p><small>You can include both Soundcloud and Spotify players if you wish, but we recommend including only one so your profile loads faster.</small></p>
    </header>

    <header id="availability_header">
      <h5>Studios that provide an up-to-date listing of their availabililty receive twice as many bookings.</h5>
      <p><em>You can add this later but why not give yourself the best chance of bookings from the start!</em></p>
      <p>Trudio makes it easy for you to show people when you're availalbe. You can easily sync a personal calander (iCal, GCal, iPhone iCal etc) to your profile.</p>
      <p>All you need to do to sync your availability on your profile is to provide the URL of a public Google Calander. You can sync all kinds of calanders (including iCals from an iPhone) with your Google Calendar.</p>
      <p>Steps to setup a Google Calander: <a href="https://support.google.com/calendar/answer/37095" target="blank">https://support.google.com/calendar/answer/37095</a></p>
      <p>Steps to finding your Public Google Calander URL: <a href="https://support.google.com/calendar/answer/37103" target="blank">https://support.google.com/calendar/answer/37103</a>.</p>
    </header>
    
    <header id="booking_header">
      <h5>Booking Details</h5>
    </header>

    <header id="payment_header">
      <h5>Vendor Information</h5>
      <p>To pay you as a Vendor we need certain details. These details will be kept private and confidential. You can provide this information at a later point but we require this information before we can make a payment to you.</p>
    </header>

    <a href="#" class="js-vertical-tab-accordion-heading vertical-tab-accordion-heading" rel="tab8">Availability</a>
    <div id="tab8" class="js-vertical-tab-content vertical-tab-content">
      <h5>Save or Submit</h5>
      <p>When you save your profile you'll be taken to your Dashboard. You will be able to preview and edit your studio information before submitting to go live.</p>
      <p>If you are ready for your studio to go live please <a href="mailto:admin@trud.io">Email Us</a> so we can review your info and activate your profile.</p>
      <p><a href="mailto:admin@trud.io"><button>Email Us To Go Live</button></a></p>
    </div>
    
  </div>
</div>
<script src="<?php echo site_url();?>/vendor/bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tab1').prependTo('form.wpuf-form-add ul.wpuf-form');
    $('li.settings').wrapAll('<div id="tab2" class="js-vertical-tab-content vertical-tab-content">');
    $('li.details').wrapAll('<div id="tab3" class="js-vertical-tab-content vertical-tab-content">');
    $('li.music').wrapAll('<div id="tab4" class="js-vertical-tab-content vertical-tab-content">');
    $('li.bookings').wrapAll('<div id="tab5" class="js-vertical-tab-content vertical-tab-content">');
    $('li.availability').wrapAll('<div id="tab6" class="js-vertical-tab-content vertical-tab-content">');
    $('li.payments').wrapAll('<div id="tab7" class="js-vertical-tab-content vertical-tab-content">');
    
    // $('li.wpuf-submit').appendTo('#tab8');

    $('#tab2 li.wpuf-el:first-child').prepend('<h5>Basic Profile Settings</h5>');
    // $('#tab2 li.wpuf-el:last-child').append('<p><em>Next: Details</em></p>');
    $('#tab3 li.wpuf-el:first-child').prepend('<h5>Fill in the details below to provide users with an overview of you, your space, your previous work and your links.</h5>');

    var music_header = $('#music_header').html();
    $('#tab4 li.wpuf-el:first-child').prepend(music_header);

    var booking_header = $('#booking_header').html();
    $('#tab5 li.wpuf-el:first-child').prepend(booking_header);

    var availability_header = $('#availability_header').html();
    $('#tab6 li.wpuf-el:first-child').prepend(availability_header);

    var payment_header = $('#payment_header').html();
    $('#tab7 li.wpuf-el:first-child').prepend(payment_header);

    // var submit_header = $('#submit_header').html();
    // alert(submit_header);
    // $('form li.submit').prepend(submit_header);
    
  });
   $("form.wpuf-form-add").validate({
      invalidHandler: function(event, validator) {
        // 'this' refers to the form
        var errors = validator.numberOfInvalids();
        if (errors) {
          var message = errors == 1
            ? 'You missed 1 field. It has been highlighted'
            : 'You missed ' + errors + ' fields. They have been highlighted';
          $("div.error span").html(message);
          $("div.error").show();
        } else {
          $("div.error").hide();
        }
      }
    });

  $(".js-vertical-tab-content").hide();
  $(".js-vertical-tab-content:first").show();

  /* if in tab mode */
  $(".js-vertical-tab").click(function(event) {
    event.preventDefault();

    $(".js-vertical-tab-content").hide();
    var activeTab = $(this).attr("rel");
    $("#"+activeTab).show();

    $(".js-vertical-tab").removeClass("is-active");
    $(this).addClass("is-active");

    $(".js-vertical-tab-accordion-heading").removeClass("is-active");
    $(".js-vertical-tab-accordion-heading[rel^='"+activeTab+"']").addClass("is-active");
  });

  /* if in accordion mode */
  $(".js-vertical-tab-accordion-heading").click(function(event) {
    event.preventDefault();

    $(".js-vertical-tab-content").hide();
    var accordion_activeTab = $(this).attr("rel");
    $("#"+accordion_activeTab).show();

    $(".js-vertical-tab-accordion-heading").removeClass("is-active");
    $(this).addClass("is-active");

    $(".js-vertical-tab").removeClass("is-active");
    $(".js-vertical-tab[rel^='"+accordion_activeTab+"']").addClass("is-active");
  });

</script>

<style type="text/css">
p strong{
  font-weight: bold;
}
li.wpuf-submit{
  list-style: none;
  /*border-top: 1px solid #000;*/
}
li.wpuf-submit .wpuf-label{
  display: none;
}
 .vertical-tab-content-container header{
  display: none;
 }
  textarea[name="toc"]{
    display: none;
  }
  .vertical-tabs-container{
    padding-bottom: 60px;
  }
</style>


