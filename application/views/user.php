<? $perRow = 4; ?>
<span class="container">
    <span class="row-fluid">
	<span class="span8 offset2" id="my_content_span">
		<div id="user_page_info">
                    <div id="user_info_main_row">
                        <img id="user_image" src="<?= $image_url;?>" />
                        
                        <div id="user_extended_info">
                            <span id="name"><?= $name?></span>
                            <br>
			    <small>Member Since: <?= $joined?></small>
                        </div>
		    </div>
		    
		    <div id="user_info_stats">
			<table class="borderless">
			    <tr>
                                <td>
                                    Clips: <?= $num_clips;?>
				</td>
				<td>
				   Followers: <?= $followers;?>
				</td>
			    </tr>
			    
			    <tr>
				<td>
				   Points: <?= $points;?>
				</td>
				
				<td>
				   Following: <?= $following;?>
				</td>
			    </tr>
			</table>
		    </div>
		</div>
		    
                <table class="table borderless" id="user_page_clips">
		    <? _print_user_clips($clips_list);?>    
		</table>        	
	    </table>
	</span>
    </span>
</span>

<script type="text/javascript">
// fade in dish boxes		
$(".hidden").each(function(i) {
    $(this).delay(i * 200).fadeIn();
});
</script>