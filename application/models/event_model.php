<?php
class Event_model extends CI_Model {
	var $id	= '';
	var $user_id	= '';
	var $listing_id	= '';
	var $fb_event_id = '';
	var $event_date_time	= '';
	var $date_created	= '';
	var $date_modified	= '';
	var $active	= '';

	function __construct() {
		parent::__construct();
	}

	function insert() {
		$this->id	= NULL;
		$this->user_id	= $_POST['user_id'];
		$this->listing_id	= $_POST['listing_id'];
		$this->fb_event_id	= $_POST['event_id'];
		$this->event_date_time	= $_POST['event_date_time'] . " " . $_POST['time'];
		$this->date_created	= date("Y-m-d");
		$this->date_modified	= date("Y-m-d");
		$this->active	= 1;

		$this->db->insert('event', $this);
		
		//$this->addEventToFaceBook($_POST['people']);
	}

	function get($id) {
		$query = $this->db->get_where('event', array('id' => $id));
		return $query->result_array();
	}
	
	function get_all() {
		$query = $this->db->get('event');
		return $query->result_array();
	}
	
	function get_field_data() {
		return $this->db->field_data('event');
	}

	function update() {
		
		$this->id	= $_POST['id'];
		$this->user_id	= $_POST['user_id'];
		$this->listing_id	= $_POST['listing_id'];
		$this->event_date_time	= $_POST['event_date_time'] . " " . $_POST['time'];
		$this->date_created	= $_POST['date_created'];
		$this->date_modified	= $_POST['date_modified'];
		$this->active	= $_POST['active'];

		$this->db->update('event', $this, array('id' => $_POST['id']));
	}

	function delete($id) {
		$this->db->delete('event', array('id' => $id));
	}
	
	
	
	function addEventToFaceBook($people){
			
		$this->load->library('facebook');
		//$attendees = explode($people);
		$facebook = $this->facebook;
		
		$session = $facebook->getSession();
		
		$me = null;
// Session based API call.
if ($session) {
try {
$uid = $facebook->getUser();
$me = $facebook->api('/me');
}
catch (FacebookApiException $e) {
error_log($e);
}
}
		
			$uid = $facebook->getUser();
			$me = $facebook->api('/me');
				echo $uid;
		$fb_event_array = array('name' => "Test event in Group nnn",
		'start_time' => mktime("14","30","00","08","01","2010"),
		'category' => "1",
		'subcategory' => "1",
		'location' => "Location",
		'end_time' => mktime("15","30","00","08","01","2010"),
		'street' => "123 Street Address",
		'city' => "Sheffield",
		'phone' => "0123 456 7890",
		'email' => "info@email.com",
		'description' => "Description of the test event",
		'privacy_type' => "OPEN",
		'tagline' => "Event tagline",
		'host' => "Event host",
		'page_id' => "nnn"
		);
		$fb_event_utf8 = array_map('utf8_encode', $fb_event_array);
		
		$param = array(
			'method' => 'event.create',
			'method_parameter' => json_encode($fb_event_utf8),
			'callback' => ''
		);
		echo $eventID = $facebook->api($param);
	}
}
?>