<?php //echo do_shortcode('[acps id="246"]');?>
<?php $form_id = 246; ?>
<?php 
  $site_address = site_url();
  // echo "site address:" .$site_address;
  if ($site_address == 'http://bhriv.local:5757') {
    $term_id = '-2'  ;
  }
  else{
    $term_id = '';
  }
?>
<?php 
$form_active = true;
if($form_active) : ?>
<form action="<?= $site_address ?>/find/" class="acps_form" id="acps_form_<?= $form_id ?>" method="post" name="acps_form_<?= $form_id ?>">
  <input name="acps_post_type" type="hidden" value="studio">
  <input name="acps_form_id" type="hidden" value="<?= $form_id ?>">
  <div class="filter_form">
      <ul class="genre">
        <li><span class="acps_form_label">Genres</span></li>
        <li><label for="term_rock"><input id="term_rock" name="genre[]" type="checkbox" value="rock"> Rock</label></li>
        <li><label for="term_pop<?= $term_id ?>"><input id="term_pop<?= $term_id ?>" name="genre[]" type="checkbox" value="pop<?= $term_id ?>"> Pop</label></li>
        <li><label for="term_hip-hop"><input id="term_hip-hop" name="genre[]" type="checkbox" value="hip-hop"> Hip Hop</label></li>
        <li><label for="term_electronic"><input id="term_electronic" name="genre[]" type="checkbox" value="electronic"> Electronic</label></li>
        <li><label for="term_country"><input id="term_country" name="genre[]" type="checkbox" value="country"> Country</label></li>
      </ul>
      <ul class="service">
        <li><span class="acps_form_label">Services</span></li>
        <li><label for="term_production"><input id="term_production" name="service[]" type="checkbox" value="production"> Production</label></li>
        <li><label for="term_mixing"><input id="term_mixing" name="service[]" type="checkbox" value="mixing"> Mixing</label></li>
        <li><label for="term_mastering"><input id="term_mastering" name="service[]" type="checkbox" value="mastering"> Mastering</label></li>
        <li><label for="term_writing"><input id="term_writing" name="service[]" type="checkbox" value="writing"> Writing</label></li>
        <li><label for="term_recording"><input id="term_recording" name="service[]" type="checkbox" value="recording"> Recording</label></li>
      </ul>
      <ul class="rate">
        <li><span class="acps_form_label">Day Rates</span></li>
        <li><label for="term_dayrate-100-300"><input id="term_dayrate-100-300" name="rate[]" type="checkbox" value="dayrate-100-300"> $100-$300</label></li>
        <li><label for="term_dayrate-301-600"><input id="term_dayrate-301-600" name="rate[]" type="checkbox" value="dayrate-301-600"> $301-$600</label></li>
        <li><label for="term_dayrate-601-1000"><input id="term_dayrate-601-1000" name="rate[]" type="checkbox" value="dayrate-601-1000"> $601-$1000</label></li>
        <li><label for="term_dayrate-1000-plus"><input id="term_dayrate-1000-plus" name="rate[]" type="checkbox" value="dayrate-1000-plus"> $1000+</label></li>
      </ul>
      <span class="acps_form_control_wrap submit_wrap">
        <input class="acps_submit" type="submit" value="Filter Studios">
      </span>
  </div>
</form> 
<?php endif ?>
