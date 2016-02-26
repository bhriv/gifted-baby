<?php /* Template Name: Add Review  */
?>
<style type="text/css">
  
</style>
 
 <?php while (have_posts()) : the_post(); ?>
 <div style="display:none">
  <input type="text" value="<?php echo $_GET["original_studio_id"]; ?>" id="original_studio_id">
 </div>
  <?php the_content(); ?>
  <?php endwhile; ?>

  <script type="text/javascript">
    $(document).ready(function() {
    var myvalue = $("#original_studio_id").val();
    // alert(myvalue);
    $('input:hidden[name="review_studio_id"]').val(myvalue);
  });
</script>