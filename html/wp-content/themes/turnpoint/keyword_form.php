<!-- <input type="text" placeholder"button" data-toggle="modal" data-target="#keywordSearch_modal"> -->
<div class="modal fade" id="keywordSearch_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      <div id="keyword_search">
			<form role="search" method="get" id="searchform" class="form-search" action="<?php echo home_url('/'); ?>">
			  <label class="hide" for="s"><?php _e('Search for:', 'roots'); ?></label>
			  <input type="text" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" id="s" class="search-query" placeholder="Search by name, credits, keywords..." autofocus>
			  <input type="submit" id="searchsubmit" value="<?php _e('Search', 'roots'); ?>">
			</form>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>