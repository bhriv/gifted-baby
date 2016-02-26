<?php
      $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
  ?>
<?php 
  $user_id = $curauth->ID;
  $all_meta_for_user = get_user_meta( $curauth->ID );
  // print_r($all_meta_for_user);
  // echo $user_id;
?>

<ul class="social_media">
  <li>
    <a href="<?= $all_meta_for_user['facebook'][0] ?>" target="blank" alt="Facebook Link">
        <i class="fa fa-facebook-square"></i>
    </a>
  </li>
  <li>
    <a href="https://twitter.com/<?= $all_meta_for_user['twitter'][0] ?>" target="blank" alt="Twitter Link">
        <i class="fa fa-twitter-square"></i>
    </a>
  </li>
  <li>
    <a href="<?= $all_meta_for_user['instagram'][0] ?>" target="blank" alt="Instagram Link">
        <i class="fa fa-instagram"></i>
    </a>
  </li>
</ul>