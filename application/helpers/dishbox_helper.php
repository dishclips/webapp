<?php
function _print_clips($list, $current_clip_id){
	$perRow = 4;
	$counter = 0;

	$space_fill_up = count($list) % $perRow != 0 ? $perRow - (count($list) % $perRow): 0; //used to create additional empty TD's

	foreach($list as $clip):
		if($clip['unique_id'] == $current_clip_id) continue; //don't show current clip again
	?>
	<div class="clip_box">
		<a href="<?php echo site_url('clip/' . $clip['unique_id']);?>">
			<img class="img-rounded" style="width: 200px; height: 160px;" src="<?php echo $clip['thumbnail_url'];?>"/>
		</a>
		<em>
		<h6>
		<img src="<?php echo $clip['user_image_url']?>" class="user_image" style="height: 25px; width: 25px;"/>
		<a href="#"><?php echo $clip['user_name'];?></a></h6>
		</em>
	</div>

<?php		
	$counter++;
	endforeach;
}

//////

function _print_dishes($list, $page=false, $restaurant_id=0, $hidden=false){
	global $name;
	$info = array();
	$info['perRow'] = 4;
	$info['page'] = $page;
	$info['name'] = $name;
	$info['perRow'] = 4;
	$info['counter'] = 0;
	$break = true;
	
	$info['space_fill_up'] = count($list) % $info['perRow'] != 0 ? $info['perRow'] - (count($list) % $info['perRow']) - 1: 0; //used to create additional empty TD's

	if(empty($list)):
		$space_fill_up = 3;
		_addNewDishBox($space_fill_up);
	else:
		foreach($list as $dish):
			$info['has_clips'] = count($dish['clips']) > 0 ? true : false;
			
			//if the dish has dishes
			if($info['has_clips']){
				$info['unique_id'] = $dish['clips'][0]['unique_id'];
				$info['thumbnail'] = $dish['clips'][0]['thumbnail_url'];
			}
			else{
				$info['unique_id'] = $dish['unique_id'];
				$info['thumbnail'] = site_url('application_images/DishClipsLogo-old.png');
			}
			
			$info['dish_name'] = $dish['name'];
			$info['restaurant_name'] = $dish['restaurant_name'];
			$info['restaurant_id'] = $dish['restaurant_id'];
			@$info['create_time'] = RelevantTime($dish['clips'][0]['create_time']);
			$info['rating'] = $dish['rating'];
		
		$info = _printHTML($info);
		if($info == false) break;
		
		endforeach;
		
		if($info['counter'] % $info['perRow'] == 0){echo "<tr>";}
		
		if($info['page'] == 'restaurant') _addNewDishBox($info['space_fill_up']);
		else if($break) return;
		else for($i=0; $i<$info['space_fill_up']+1; $i++): ?><td class="dish_box_td"></td><?php endfor;
	endif;

}

function _print_user_clips($list){
	$info = array();
	$info['perRow'] = 4;
	$info['counter'] = 0;
	$info['space_fill_up'] = count($list) % $info['perRow'] != 0 ? $info['perRow'] - (count($list) % $info['perRow']): 0; //used to create additional empty TD's
	$info['page'] = false;
	
	if(empty($list)):
		$space_fill_up = 3;
		_addNewDishBox($space_fill_up);
	else:
		foreach($list as $clip):
			$info['thumbnail'] = $clip['thumbnail_url'];
			$info['unique_id'] = $clip['unique_id'];
			$info['dish_name'] = $clip['dish_name'];
			$info['restaurant_name'] = $clip['restaurant_name'];
			$info['create_time'] = RelevantTime($clip['create_time']);
			$info['rating'] = 0;
		
			$info = _printHTML($info);
		endforeach;
	
		if($info['counter'] % $info['perRow'] == 0){echo "<tr>";}	
		
		if($info['page'] == 'restaurant') _addNewDishBox($info['space_fill_up']);
		else for($i=0; $i<$info['space_fill_up']; $i++): ?><td class="dish_box_td"></td><?php endfor;
		
	endif;
}

//////////////////////////////////

function _printHTML($info){
	
	if($info['page'] == 'clip' && $info['counter'] == 8 ){?>
		<td colspan='4' style="text-align: right; height:30px;">
			<a href="<?php echo site_url('restaurant/' . 1);?>">Show more &rarr;</a>
		</td>
		<?php return false;
	}
		elseif(($info['counter'] % $info['perRow']) == 0){ echo "<tr>";}
		?>
			<td class="dish_box_td">
					<div class="borderless dish_box">
						<div>
							<a href="<?php echo site_url('clip/' . $info['unique_id']);?>">
								<img src="<?php echo $info['thumbnail'];?>"  class="dish_thumbnail" alt="<?php echo $info['dish_name'];?>"/>
							</a>
						</div>
	
					
						<div class="dish_info">
							<div class="left_side">
								<span class="food_name">
									<a style="color: white;" href="<?php echo site_url('clip/' . $info['unique_id']);?>" title="<?php echo $info['dish_name'];?>">
										<?php echo mb_strimwidth($info['dish_name'], 0, 25, "...");?>
									</a>
									
									<br>
									<span style="color: #dddddd; font-size: 14px;">@
														
									<i style="color: #c6e17e;"><?php echo mb_strimwidth($info['restaurant_name'], 0, 25, "...");?></i>
									</span>
								</span>
							</div>
							
							<div class="right_side">
								<?php if($info['page'] != false): ?><div class="heart_small"><?php echo $info['rating']; ?></div><?php endif;?>
								<br>
								<i style="font-size: 9px;"><?php echo $info['create_time'];?></i>
							</div>
						</div>												
					</div>
			</td>
	
	<?php		
		$info['counter']++;
		if(($info['counter'] % $info['perRow']) == 0 and $info['counter'] > 0){ echo "</tr>";}
		
		return $info;
		
}

function _addNewDishBox($space_fill_up) {
	?>
	<td class="dish_box_td">
		<div class="hidden" data-toggle="modal" href="#AddNewDish">
			<img src="<?php echo site_url("application_images/plus-icon.png")?>" />
			<h6>Add a New Dish</h6>
		</div>
	</td>
	<?php
	for($i=0; $i<$space_fill_up; $i++): ?><td></td><?php endfor;
}
?>
