<?php $current_post_type = get_post_type( get_the_ID() ); ?>
<?php if ($current_post_type != 'course') : ?>
<p class="byline author vcard" id="cardid-<?= get_the_ID() ?>">
<?php// if (is_page(array('Home'))) : ?>
	<?php echo '<span class="type hidden">'.$current_post_type.'</span> ' ; ?>
    <?php echo __('By', 'roots'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author_meta('nickname'); ?></a> in 
    <span class="tax-holder uppercase">
	 <?php
		$taxonomy = 'category';
		$terms = get_the_terms( $post->ID , $taxonomy );
		if ( !empty( $terms ) ) :
		foreach ( $terms as $term ) {
			$link = get_term_link( $term, $taxonomy );
			if ( !is_wp_error( $link ) )
				echo '<a href="'.site_url().'/category/'.$term->slug.'" rel="tag" class="' . $term->slug. '">' . $term->name . '</a> ';
		}
		endif;
	?>
	</span>
	<br>
	<!-- <div class="clearfix"></div> -->
<?php //endif ?>
<?php endif ?>

<?php if ($current_post_type == 'course') : ?>
	<?php
	    $course_dates = get_post_meta( $post->ID, 'course_dates',true ); 
	    $start_date = get_post_meta( $post->ID, 'start_date',true ); 
	    if ($course_dates != ''): ?>
	      <time class="updated" datetime="<?= $start_date ?>"><?= $course_dates ?></time>
	  <?php else :
	      if($start_date != ''): ?>
	      <time class="updated" datetime="<?= $start_date ?>"><?= $start_date ?></time>
	<?php endif; ?>

  <?php endif ?>	
<?php else : ?>
	<time class="updated" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
<?php endif ?>
</p>
<?php if (!is_page('Home')) : ?>
<script type="text/javascript">
	// Format all <time> elements based on attribute data-format=""
    $('#cardid-<?= get_the_ID() ?> time').each(function(i, e) {
        var m = moment($(e).attr('datetime')).zone(0);
        var f = $(e).attr('data-format');
        // var formatted = m.format('ddd MMM D YYYY, h:mm A');
        var formatted = m.format('MMM D, YYYY');
        if ('date' == f) {
            formatted = m.format('MMM D, YYYY');
        }
        if ('time' == f) {
            formatted = m.format('h:mm A');
        }
        $(e).text(formatted);
    });
</script>
<?php endif ?>