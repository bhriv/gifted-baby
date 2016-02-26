<nav rel="nofollow" class="home_page_nav" id="stickyheader">
	<ul>
		<li id="logo"><a href="javascript:void(0)" onclick="$('#logo_holder').animatescroll();"><img src="/images/logoTP@2x.png" alt="Home" width="70" height="42"></a></li>
		<li id="what"><a href="javascript:void(0)" onclick="$('#go_anywhere').animatescroll();">What</a></li>
		<li id="you"><a href="javascript:void(0)" onclick="$('#join_our_community div.pad').animatescroll();">You</a></li>
		<li id="courses"><a href="javascript:void(0)" onclick="$('#upcoming_courses').animatescroll();">Courses</a></li>
		<li id="read"><a href="javascript:void(0)" onclick="$('#recent_articles').animatescroll();">Read</a></li>
		<li id="reivews"><a href="javascript:void(0)" onclick="$('#recent_quotes').animatescroll();">Reviews</a></li>
		<li id="sign_up">
			<a href="<?= site_url();?>/signup/">
				<label for="modal-2" class="alt">
			    	<div class="btn js-btn">Let's Connect</div>
			  	</label>	
			</a>
		</li>
	</ul>
</nav>

<script type="text/javascript">
$('#stickyheader ul li').click(function() {
    $('#stickyheader ul li').removeClass('active');
    $(this).addClass('active');
  });
</script>


