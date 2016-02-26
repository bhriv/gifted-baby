<?php
    $course_dates = get_post_meta( get_the_ID(), 'course_dates',true ); 
    $start_date = get_post_meta( get_the_ID(), 'start_date',true ); 
    $end_date = get_post_meta( get_the_ID(), 'end_date',true ); 
    if ($course_dates != ''): ?>
      <time class="updated" datetime="<?= $start_date ?>"><?= $course_dates ?></time>
  <?php else : ?>
      <time class="updated" datetime="<?= $start_date ?>"><?= $start_date ?></time> - 
      <time class="updated" datetime="<?= $end_date ?>"><?= $end_date ?></time>
<?php endif ?>