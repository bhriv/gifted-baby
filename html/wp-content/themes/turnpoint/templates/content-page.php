<?php while (have_posts()) : the_post(); ?>
  <?php 
    //Page switching
  		if(is_page('How it Works')){ 
           get_template_part('templates/how_it_works'); 
        } 
        elseif(is_page('Contact')){ 
           get_template_part('templates/contact'); 
        } 
        elseif(is_page('Refills')){ 
           get_template_part('templates/refills'); 
        } 
        elseif(is_page('Snipps')){ 
           get_template_part('templates/snipps/snipps'); 
        } 
        elseif (is_page('Typography')){ 
           get_template_part('templates/snipps/typography'); 
        } 
        else {
            the_content();
        } 
    ?>
    <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>

