<link rel="image_src" href="<?= site_url('application_images/DishClipsLogo.png');?>" / >
<span class="container-fluid">
    <span class="row-fluid">
	<span class="span8 offset2" id="my_content_span">
				<h1 id="main-title">explore dishes </h1></br>
				<ul type=none>
				<li type=none>
						<form method="get" action="<?= site_url('search/');?>" >
							<input type="text" id="homepage_navbar_search_box" name="q" placeholder="Search Restaurants/Dishes.." class="input-medium search-query"/>
							<input type="hidden" name="loc" id="address_hidden">
							<script type="text/javascript">getAddress("#address_hidden")</script>
						</form>
				</li></ul>

		<h1 class="clips_headers"> Latest Clips </h1> 
		<div class="text show-more-height">
		     <table class="table borderless">
		    <? _print_user_clips($latest_clips);?>    
		    </table>     
		</div>
		<a class="load"><button class="show-more">Check Out More of the Latest!</button></a>
	</span>
    </span>
</span>