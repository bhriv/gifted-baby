<?php /* Template Name: Book Session  */
?>
<section class="span6">
  <?php while (have_posts()) : the_post(); ?>
  <div class="page-header">
    <h1 class="red"><?php echo roots_title(); ?></h1>
  </div>
    <form>
      <input type="hidden" value="<?php echo $_GET["session_studio_id"]; ?>" id="session_studio_id">
      <input type="hidden" value="<?php echo $_GET["day_rate"]; ?>" id="day_rate">
    </form>
    <?php the_content(); ?>
  <?php endwhile; ?>
</section>
 

<?php // generate random title
  $raw_time = gettimeofday(true);
  $trimmed = substr($raw_time,8,2); //string,starting position, length
  // $trimmed_top = substr($raw_time,6,1); //string,starting position, length
  $current_studio_id = $_GET["session_studio_id"];
  // get current user to play with
  $current_user_id = get_current_user_id();
  $constructed_post_id = $current_studio_id . $trimmed . $current_user_id;
?>

  <script type="text/javascript">
    $(document).ready(function() {
    
    var studio_id = $("#session_studio_id").val();
    // alert(studio_id);
    $('input:hidden[name="session_studio_id"]').val(studio_id);

    
    $('select[name="number_of_days[]"]').change(calculateQuote);

    var how_many_days = $("select.number_of_days").children("option").filter(":selected").val();
    
    function calculateQuote(){
      var day_rate = $("#day_rate").val();
      var number_of_days = $('select[name="number_of_days[]"]').val();
      var session_quote = day_rate*number_of_days;
      $('input#session_quote').val(session_quote);
      // alert('Days: ' + number_of_days);
      // alert('Rate: ' + day_rate);
      // alert('Quote: ' + session_quote);
    };
    // $('input:hidden[name="session_studio_id"]').val(studio_id);
    
    $('input#post_title').val(<?php echo $constructed_post_id;?>);
    $('input[name="studio_day_rate"]').val(<?php echo get_the_ID();?>);

    // $("li.services_needed label:nth-child(2)").addClass('everything_trigger').appendTo("li.services_needed div.wpuf-label");
   
  });
</script>
<style type="text/css">
  li.services_needed label:nth-child(2),
  li.services_needed label:nth-child(2).hidden{
    display: block !important;
    font-style: italic;
    text-decoration: underline;
  }
</style>