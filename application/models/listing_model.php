<?php
class Listing_model extends CI_Model {
	var $id	= '';
	var $bucket_list_name	= '';
	var $search_engine_name	= '';
	var $company	= '';
	var $desc	= '';
	var $cost	= '';
	var $contact	= '';
	var $image	= '';
	var $address	= '';
	var $date_live	= '';
	var $status	= '';
	var $city_id	= '';
	var $user_id	= '';
	var $active	= '';
	var $date_created	= '';
	var $date_modified	= '';

	function __construct() {
		parent::__construct();
	}

	function insert() {
		
		$config['upload_path'] = './listing_images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '400';
		$config['max_width']  = '3024';
		$config['max_height']  = '1768';
			
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
		}
		
		// Load image_lib ref: http://ellislab.com/codeigniter/user-guide/libraries/image_lib.html
		/*
		$config['image_library'] = 'gd2';
		$config['source_image'] = './listing_images/'.$data['upload_data']['file_name'];
		//$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		//$config['width'] = 1280;
		$config['height'] = 960;

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
		
		$crop['image_library'] = 'imagemagick';
		$crop['library_path'] = '/usr/X11R6/bin/';
		$crop['source_image'] = './listing_images/'.$data['upload_data']['file_name'];
		$crop['x_axis'] = '1280';
		$crop['y_axis'] = '960';

		$this->image_lib->initialize($crop);

		if ( ! $this->image_lib->crop())
		{
    		echo $this->image_lib->display_errors();
		}
		
		
		
		// calculate if widths > then height
		
		/*$current_width = $data['upload_data']['image_width'];
		$current_height = $data['upload_data']['image_height'];
		$image_type = "port";
		if($current_width > $current_height ){
			$image_type = "land";		
		}
		
		switch($image_type){
			case "land":
			
				break;
			case "port":
					
					
				break;
			
		}
		*/
		// Resize and crop to 1280 x 960.
		
		
		
		$this->id	= $_POST['id'];
		$this->bucket_list_name	= $_POST['bucket_list_name'];
		$this->search_engine_name	= $_POST['search_engine_name'];
		$this->company	= $_POST['company'];
		$this->desc	= $_POST['desc'];
		$this->cost	= substr($_POST['cost'], 0, -2).".".substr($_POST['cost'], -2, 2);
		$this->contact	= $_POST['contact'];
		$this->image	= $data['upload_data']['file_name'];
		$this->address	= $_POST['address'];
		$this->date_live	= date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d"), date("Y")));$_POST['date_live'];
		$this->status	= 1;
		$this->city_id	= $_POST['city_id'];
		$this->user_id	= $_POST['user_id'];
		$this-> active	= 1;
		$this->date_created	= date("Y-m-d H:i:s");
		$this-> date_modified	= date("Y-m-d H:i:s");

		$this->db->insert('listing', $this);
		
		
		// $this->image
		
		
		
	}

	function get($id) {
		$query = $this->db->get_where('listing', array('id' => $id));
		return $query->result_array();
	}
	
	function getListingName($id){
		$query = $this->db->get_where('listing', array('id' => $id));
		$listing =  $query->result_array();
		return $listing[0]['bucket_list_name'];
		
		
	}
	
	function getListingAddress($id){
		$query = $this->db->get_where('listing', array('id' => $id));
		$listing =  $query->result_array();
		return $listing[0]['address'];
		
		
	}
	
	function getFacebookImage($id){
		$query = $this->db->get_where('listing', array('id' => $id));
		$listing =  $query->result_array();
		return "http://www.fatecrew.com/".$listing[0]['image'];
	}
	
	// get company
	
	function getListingCompanyName($id){
		$query = $this->db->get_where('listing', array('id' => $id));
		$listing =  $query->result_array();
		return $listing[0]['company'];
		
	}
	
	function getByName($slug) {
		$name = str_replace("-"," ",$slug);
		
		$query = $this->db->get_where('listing', array('search_engine_name' => $name));
		return $query->result_array();
	}
	
	function list_status($user_id, $list_id){
		$query = $this->db->get_where('user_to_list', array('user_id' => $user_id, 'listing_id'=>$list_id));
		$result = $query->result_array();
		
		if(is_null($user_id)){
			return "not_loged_in";
		}else if($result){
		
			if($result[0]['invited_friends'] ==0){
				return "in_list_no_friends";	
			}else {
				return "in_list_with_friends";
			}
		}else{
			return "not_in_list";
		}
		
	}
	
	function get_all() {
		$query = $this->db->get('listing');
		return $query->result_array();
	}
	
	function get_all_my_list($user_id,$limit = 5) {
		//var_dump($user_id);// user_to_list
		$this->db->from('listing', 'user_to_list');
		$this->db->join('user_to_list', 'listing.id = user_to_list.listing_id');
		$this->db->where("user_to_list.user_id =".$user_id);
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	
	function getByKeyWord($word){
		$query = $this->db->query("SELECT * FROM  `listing` WHERE  `bucket_list_name` LIKE  '%".$word."%'AND  `search_engine_name` LIKE  '%".$word."%' AND  `desc` LIKE  '%".$word."%'");
		
		return $query->result_array();
	}
	
	function get_field_data() {
		return $this->db->field_data('listing');
	}

	function update() {
		$this->id	= $_POST['id'];
		$this->bucket_list_name	= $_POST['bucket_list_name'];
		$this->search_engine_name	= $_POST['search_engine_name'];
		$this->company	= $_POST['company'];
		$this->desc	= $_POST['desc'];
		$this->cost	= $_POST['cost'];
		$this->contact	= $_POST['contact'];
		$this->image	= $_POST['image'];
		$this->address	= $_POST['address'];
		$this->date_live	= $_POST['date_live'];
		$this->status	= $_POST['status'];
		$this->user_id	= $_POST['user_id'];
		$this->city_id	= $_POST['city_id'];
		$this-> active	= $_POST[' active'];
		$this->date_created	= $this->date_created;
		$this-> date_modified	= date("Y-m-d H:i:s");

		$this->db->update('listing', $this, array('id' => $_POST['id']));
	}
	
	function addHit($user_id, $listing_id){
		
		$data = array(
			'id' => '',
			'user_id'=> $user_id,
			'listing_id'=> $listing_id,
			'date' => date("Y-m-d H:i:s")
		
		);
		$this->db->insert('listing_view', $data);
	}

	function delete($id) {
		$this->db->delete('listing', array('id' => $id));
	}
	
	function getMyListing($id){
		$query = $this->db->get_where('listing', array('user_id' => $id));
		return $query->result_array();
	}
	
	function getResults($listing_id){
		// get current month
		$currentMonth = date('n');
		$currentYear = date('Y');
		$numDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
		
		$results = array();
		for($i = 1; $i<$numDaysInMonth;$i++){
			$this->db->where(array("listing_id"=>$listing_id, 'date'=>$currentYear."-".$currentMonth."-".$i));
			$this->db->from('listing_view');		
			$results[$i] = $this->db->count_all_results();
		}
		
		return $results;
			
	}
}
?>