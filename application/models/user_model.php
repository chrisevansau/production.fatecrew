<?php
class User_model extends CI_Model {
	var $id	= '';
	var $user_name	= '';
	var $first_name	= '';
	var $last_name	= '';
	var $email	= '';
	var $password	= '';
	var $city_id	= '';
	var $gender	= '';
	var $dob	= '';
	var $active	= '';
	var $date_created	= '';
	var $date_modified	= '';
	var $facebook_id = '';

	function __construct() {
		parent::__construct();
	}

	function insert() {
		$this->id	= $_POST['id'];
		$this->user_name	= $_POST['user_name'];
		$this->first_name	= $_POST['first_name'];
		$this->last_name	= $_POST['last_name'];
		$this->email	= $_POST['email'];
		$this->password	= md5($_POST['password']);
		$this->city_id	= $_POST['city_id'];
		$this->gender	= $_POST['gender'];
		$this->dob	= $_POST['dob'];
		$this->active	= 1;
		$this->date_created	= date("Y-m-d H:i:s");
		$this->date_modified	= date("Y-m-d H:i:s");
		$this->facebook_id = NULL;
		$this->db->insert('user', $this);
		
		
			
			$loged_in = array(
			'user_id' => $this->db->insert_id(),
			'facebook_id'=> 0,
			'pic'=> "defalt.jpg",
			'name'=> $_POST['user_name']
			);
			$this->session->set_userdata('active',true);
			$this->session->set_userdata('loged_in',$loged_in);
			
		
	}
	function fackbook_insert() {
		
		
		// see if the user is in database
		$query = $this->db->get_where('user', array('facebook_id' => $_POST['facebook_id']));
		if($user = $query->result_array()){
			$loged_in = array(
			'user_id' => $user[0]['id'],
			'facebook_id'=> $user[0]['facebook_id'],
			'pic'=> $_POST['pic'],
			'name'=> $user[0]['first_name']
			);
			$this->session->set_userdata('active',true);
			$this->session->set_userdata('loged_in',$loged_in);
			$this->session->userdata('active');
			echo "user exists";
		}else{
			
			$dateOfBirthArray = explode("/",$_POST['dob']);
			$dateOfBirth = $dateOfBirthArray[2]."-".$dateOfBirthArray[0]."-".$dateOfBirthArray[1];
			
			//$city = explode(",",$_POST["location"]["name"]);
			
			$this->id	= NULL;
			$this->user_name	= $_POST['user_name'];
			$this->first_name	= $_POST['first_name'];
			$this->last_name	= $_POST['last_name'];
			$this->email	= $_POST['email'];
			$this->password	= 'facebook user';
			//$this->city_id	= $this->getCityId($city[0]);
			$this->city_id = 1;
			$this->gender	= $_POST['gender'];
			$this->dob	= $dateOfBirth;
			$this->active	= 1;
			$this->date_created	= date("Y-m-d H:i:s");
			$this->date_modified	= date("Y-m-d H:i:s");
			$this->facebook_id = $_POST['facebook_id'];
			$this->db->insert('user', $this);
			
			
			
			$loged_in = array(
			'user_id' => $this->db->insert_id(),
			'facebook_id'=> $_POST['facebook_id'],
			
			'name'=> $_POST['first_name']
			);
			$this->session->set_userdata('active',true);
			$this->session->set_userdata('loged_in',$loged_in);
			$this->session->userdata('loged_in');
				
			
			
			
		}
	}	
	
	
	
	function insert_fb($data) {
		
		
		
		$city = explode(",",$data["location"]["name"]);
		
		$this->id	= NULL;
		$this->user_name	= $data['name'];
		$this->first_name	= $data['first_name'];
		$this->last_name	= $data['last_name'];
		$this->email	= $data['email'];
		$this->password	= "facebook_user";
		$this->city_id	= $this->getCityId($city[0]);
		$this->gender	= $data['gender'];
		$this->dob	= $data["birthday"];
		$this->active	= 1;
		$this->facebook_id = $data[0];
		$this->date_created	= date("Y-m-d H:i:s");

		$this->date_modified	= date("Y-m-d H:i:s");
		

		if($this->db->insert('user', $this)){
			return true;
		}else{
			return false;	
		}
		
	}
	
	function getCityId($city){
		
		$query = $this->db->get_where('city', array('name' => $city));
		if($city_id = $query->result_array()){
			return $city_id[0]['id'];
		}else{
			return 0;
		}
	}

	function get($id) {
		$query = $this->db->get_where('user', array('id' => $id));
		return $query->result_array();
	}
	
	function get_all() {
		$query = $this->db->get('user');
		return $query->result_array();
	}
	
	function get_field_data() {
		return $this->db->field_data('user');
	}

	function update() {
		$this->id	= $_POST['id'];
		$this->user_name	= $_POST['user_name'];
		$this->first_name	= $_POST['first_name'];
		$this->last_name	= $_POST['last_name'];
		$this->email	= $_POST['email'];
		$this->password	= $_POST['password'];
		$this->city_id	= $_POST['city_id'];
		$this->gender	= $_POST['gender'];
		$this->dob	= $_POST['dob'];
		$this->active	= $_POST['active'];
		$this->date_created	= $this->date_created;
		$this->date_modified	= date("Y-m-d H:i:s");

		$this->db->update('user', $this, array('id' => $_POST['id']));
	}

	function delete($id) {
		$this->db->delete('user', array('id' => $id));
	}
	
	function updatePWD() {
		
		$pwd['password']	= md5($_POST['password']);
		$pwd['date_modified']	= date("Y-m-d H:i:s");
		$this->db->update('user', $pwd, array('id' => $_POST['id']));
	}
	
	
	function addToList($user_id, $listing_id, $facebook_id){
		$data = array(
			'id'=> NULL,
			'user_id' => $user_id, 
			'facebook_id' => $facebook_id, 	
			'listing_id' => 	$listing_id,
			'date_added' => date("Y-m-d")
		
		);
		$this->db->insert('user_to_list', $data);
	}
	
	function getMyList($id){
		$this->db->from('listing', 'user_to_list');
		$this->db->join('user_to_list', 'listing.id = user_to_list.listing_id && user_to_list.user_id='.$id);
		$result = $this->db->get();

		return $result->result_array();
		
	}
	
	function removeFromList($user_id, $listing_id ){
		$this->db->delete('user_to_list', array('listing_id' =>$listing_id , 'user_id' =>$user_id));
	}
	
	function getFBEventId($user_id, $listing_id){
		
		$query = $this->db->get_where('event', array('user_id' => $user_id,'listing_id' => $listing_id ));
		$results = $query->result_array();
		return $results[0]['fb_event_id'];
	}
	
	function login(){
		$query = $this->db->get_where('user', array("email"=>$_POST['email'],"password"=>md5($_POST['pwd'])));
		$user = $query->result_array();
		if(isset($user[0]['email'])){
			// create user session
			$loged_in = array(
			'user_id' => $user[0]['id'],
			'facebook_id'=> NULL,
			
			'name'=> $user[0]['first_name']
			);
			$this->session->set_userdata('active',true);
			$this->session->set_userdata('loged_in',$loged_in);
			$this->session->userdata('active');
			
			
			
			return true;
		}else{
			return false;
		}
		
	}
	
	function getEmail($id){
		
		$query = $this->db->get_where('user', array('id' => $id));
		$user = $query->result_array();
		return $user[0]['email'];
		
	}
	
	function getName($id){
		
		$query = $this->db->get_where('user', array('id' => $id));
		$user = $query->result_array();
		return $user[0]['first_name']." ".$user[0]['last_name'];
		
	}
}
?>