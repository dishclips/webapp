<?php

class Moreclips extends CI_Controller {

	public function index()
	{
		$this->load->helper('MY_date');
		$this->load->helper('url');
		$this->load->helper('dishbox');
		
		// Latest Clips
			$api_latest_clips_data = file_get_contents("http://ec2-54-242-54-114.compute-1.amazonaws.com/dishclips/api/getClips?type=LATEST");
			$latest_clips_data = json_decode($api_latest_clips_data, true);
			$data['latest_clips'] = array();
			for($i = 12; $i < count($latest_clips_data['clips']); $i++):
			array_push($data['latest_clips'], $latest_clips_data['clips'][$i]);
			endfor;
			//$data['latest_clips'] = $latest_clips_data['clips'];
			// print_r($latest_clips_data);
			$latest_clips_data['url'] = "";
			$latest_clips_data['thumbnail_url'] = "";
			$latest_clips_data['restaurant_name'] = "";
			$latest_clips_data['thumbnail_id'] = "";
			$latest_clips_data['dish_name'] = "";
			$latest_clips_data['restaurant_id'] = "";
			$latest_clips_data['num_likes'] = "";
			$latest_clips_data['num_comments'] = "";
			$latest_clips_data['create_time'] = "";
			$latest_clips_data['user_image_url'] = "";
			$latest_clips_data['unique_id'] = "";
			$data['clip_url'] = $latest_clips_data['url'];
			$data['clip_thumbnail'] = $latest_clips_data['thumbnail_url'];
			
			$data['restaurant_name'] = $latest_clips_data['restaurant_name'];
			$data['restaurant_id'] = $latest_clips_data['restaurant_id'];
			$data['user_name'] = empty($latest_clips_data['user_name']) ? "Anonymous" : $latest_clips_data['user_name'];
			$data['dish_name'] = $latest_clips_data['dish_name'];
			$data['num_likes'] = $latest_clips_data['num_likes'];
			$data['num_comments'] = $latest_clips_data['num_comments'];
			$data['unique_id'] = $latest_clips_data['unique_id'];
			
			$data['create_time'] = RelevantTime($latest_clips_data['create_time']);
			$data['user_image_url'] = $latest_clips_data['user_image_url'];
	//	print_r($latest_clips_data);
	//	print_r(count($latest_clips_data['clips']));
		$this->template->set('title', 'More Clips');
		$this->load->view('moreclips', $data);
		
	}
	
}
?>