<div class="main-container">
	<div class="main full-width">
	  <?php get_template_part('articles_nav') ?>  
	</div>
	<div class="main full-width">
		<?php //include_once('map-loop.php');
		$general_args = array(
		    'post_status' => 'publish',
		    'post_type' => array('course'),
		    'category__in' => 3,
		    'posts_per_page' => -1,
		    'order' => 'DESC'
		 );
		 $general_tax_query = new WP_Query($general_args);
		?>
		<?php $general_tax_item = 1; if($general_tax_query->have_posts()) : ?>
		<h5><i class="fa fa-eye"></i> Courses</h5>
		   <?php while($general_tax_query->have_posts()) : $general_tax_query->the_post() ?>
		    <?php get_template_part('card_profile');?>
		   <?php $general_tax_item++; endwhile ?>
		<?php endif ?>
		<div class="clearfix"></div>
		<?php //include_once('map-loop.php');
		$general_args = array(
		    'post_status' => 'publish',
		    'post_type' => array('article'),
		    'category__in' => 3,
		    'posts_per_page' => -1,
		    'order' => 'DESC'
		 );
		 $general_tax_query = new WP_Query($general_args);
		?>
		<?php $general_tax_item = 1; if($general_tax_query->have_posts()) : ?>
		<h5><i class="fa fa-eye"></i> Articles</h5>
		   <?php while($general_tax_query->have_posts()) : $general_tax_query->the_post() ?>
		    <?php get_template_part('card_profile');?>
		   <?php $general_tax_item++; endwhile ?>
		<?php endif ?>
	
		<?php //include_once('map-loop.php');
		$general_args = array(
		    'post_status' => 'publish',
		    'post_type' => array('podcast'),
		    'category__in' => 3,
		    'posts_per_page' => -1,
		    'order' => 'DESC'
		 );
		 $general_tax_query = new WP_Query($general_args);
		?>
		<?php $general_tax_item = 1; if($general_tax_query->have_posts()) : ?>
		<h5><i class="fa fa-eye"></i> Podcasts</h5>
		   <?php while($general_tax_query->have_posts()) : $general_tax_query->the_post() ?>
		    <?php get_template_part('card_profile');?>
		   <?php $general_tax_item++; endwhile ?>
		<?php endif ?>
	</div>
</div>