<?php /* Template Name: Most Popular */ ?>
   <div id="card_profile">
	
		 <?php
			query_posts('post_type=article&meta_key=post_views_count&orderby=meta_value_num&order=DESC');
			$general_tax_item = 1; 
			if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part('card_profile');?>
			<?php
			$general_tax_item++;
			endwhile; endif;
			wp_reset_query();
		?>

</div>
