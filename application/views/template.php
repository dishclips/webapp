<!DOCTYPE html>
<html>
<head>
	<title><?= $title?></title>	
	
	<link href="<?= site_url('bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?= site_url('bootstrap/css/font-awesome.min.css');?>" rel="stylesheet">
	<link href="<?= site_url('/bootstrap/css/custom.css');?>" rel="stylesheet">
	
	<script src="<?= site_url('bootstrap/docs/assets/js/jquery-1.7.1.min.js');?>"></script> <!--jQuery-->	
	<script src="<?= site_url('bootstrap/js/bootstrap-modal.js')?>"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	<script src="<?= site_url('js/javascript.js')?>"></script>
	<? if(isset($view)):?>
		<? if($view == 'restaurant'): ?>
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
		<? endif; ?>
		<? if($view == 'clip'): ?>
		<link href="http://vjs.zencdn.net/c/video-js.css" rel="stylesheet">
		<script type="text/javascript" src="/jwplayer/jwplayer.js"></script>
		<script type="text/javascript">jwplayer.key="ABCDEFGHIJKLMOPQ";</script>
		<? endif;?>
	<? endif;?>
</head>

<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner" id="navbar">
			<ul class="nav" style="margin-left: 16%;">
				<li>
					<a href="<?= site_url('');?>"><img src="<?= site_url('application_images/DishClipsLogo.png'); ?>" class="logo" ></a>
				</li>
				
				<li>
					<a href="<?= site_url('');?>"><img src="<?= site_url('application_images/DishClipsLogoText.png');?>" class="logo_text" alt="DishClips"></a>
				</li>
			</ul>
		
			<ul class="nav pull-right" style="margin-right: 16%;">
				
				<li>
						<form method="get" action="<?= site_url('search/');?>" >
							<input type="text" id="navbar_search_box" name="q" placeholder="Search Restaurants/Dishes.." class="input-medium search-query" autpcomplete="off" data-provide="typeahead" data-items="4" autocomplete="off"/>
							<? if(isset($_COOKIE['address'])): ?>
								<input type="hidden" name="loc" id="address_hidden" value="<?= $_COOKIE['address']?>">
							<? else: ?>
								<input type="hidden" name="loc" id="address_hidden">
								<script type="text/javascript">getAddress("#address_hidden")</script>
							<? endif;?>
						</form>
				</li>
			</ul>
		</div>
	</div>

	<div id="contents"><?= $contents ?></div>
	
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-2459913-3']);
		_gaq.push(['_trackPageview']);
	      
		(function() {
		  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	      
	</script>
	
	<div id="footer">
		<div class="wrapper" style="background: red;">
					<div id="press_banner"></div>
					<div id="iphones_footer"></div>
					<div id="footert_text">
						<ul class="social" id="css3">
								<li class="facebook"><a href="http://facebook.com/dishclips" target="_blank"></a></li>
								<li class="twitter"><a href="http://twitter.com/dishclips" target="_blank"></a></li>
								<li class="linkedin"><a href="http://www.linkedin.com/company/dishclips-com" target="_blank"></a></li>
								<li class="google"><a href="https://plus.google.com/102089258455023556284/" target="_blank"></a></li>
						</ul>
						<a href="http://itunes.apple.com/us/app/dishclips/id536785014?ls=1&mt=8"><div id="appstore_button"></div></a>
					</div>
					<div id="footer_links">
							<strong>&copy; 2013 DishClips</strong></br>
							<a href="<?php echo site_url('about')?>"><span style ="padding-left: 1%">About Us</span></a>
							<a href="<?php echo site_url('privacypolicy')?>"><span style ="padding-left: 5%">Privacy Policy</span></a>
							<!--<a href="<?php echo site_url('contactus') ?>"><span style ="padding-left: 5%">Contact Us</span></a>-->
							<a href="<?php echo site_url('faq')?>"><span style ="padding-left: 5%">FAQ</span></a>
					</div>
				</div>
			</div>
		
</body>
</html>


<script type="text/javascript">

    $('#navbar_search_box').typeahead({
	'source': get_categories(),
	'autoSelect': false
    });
</script>

<script type="text/javascript">
	$(document).scroll(function() {
		var pos = $(document).scrollTop();
		if (pos > 0) {
			$("#navbar").css("webkit-box-shadow", "inset 0 -1px 0 rgba(0,0,0,0.1),0 1px 15px rgba(0,0,0,0.1)");
			$("#navbar").css("-moz-box-shadow", "inset 0 -1px 0 rgba(0,0,0,0.1),0 1px 15px rgba(0,0,0,0.1)");
			$("#navbar").css("box-shadow", "inset 0 -1px 0 rgba(0,0,0,0.1),0 1px 15px rgba(0,0,0,0.1)");
		} else{
			$("#navbar").css("webkit-box-shadow", "none");
			$("#navbar").css("-moz-box-shadow", "none");
			$("#navbar").css("box-shadow", "none");
		}
		
    });
</script>

<script type="text/javascript">$(document).ready(function(){
			$(".load").click(function(){
			$('.load').load("moreclips");
			
			})});

</script>

<script src="<?= site_url('bootstrap/js/bootstrap-typeahead.js')?>"></script>
<script src="<?= site_url('js/categories.js')?>"></script>
<script src="<?= site_url('js/javascript.js')?>"></script>
<script src="<?= site_url('bootstrap/modals.php')?>"></script>