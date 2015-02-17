<?php
class Item_model extends CI_Model {
	var $id	= '';
	var $name = ''; 
	var $user_id = '';
	var $active ='';
	var $date_created ='';
	var $date_modified = '';
 
	function __construct() {
		parent::__construct();
		$this->load->model('Listing_model');
	}

	function insert($name) {


		$user = $this->session->userdata('loged_in');
		$this->name = $name; 
		$this->user_id = $user['user_id'];
		$this->active = 1;
		$this->date_created	= date("Y-m-d H:i:s");
		$this-> date_modified	= date("Y-m-d H:i:s");
		
		$this->db->insert('item', $this);
		
		
	}

	function get($id) {
		$query = $this->db->get_where('item', array('id' => $id));
		return $query->result_array();
	}
	
	function getItemName($id){
		$query = $this->db->get_where('item', array('id' => $id));
		$listing =  $query->result_array();
		return $listing[0]['name'];
		
		
	}
	
	
	function get_all() {
		$query = $this->db->get('item');
		return $query->result_array();
	}

	function get_all_user($user_id) {
		$query = $this->db->get_where('item', array('user_id'=>$user_id));
		$results = $query->result_array();
		$i = 0;
		foreach($results as $result){
			$results[$i]['total'] = $this->Listing_model->getTotalByKeyword($result['name']);
		}
		return $results;
	}
	
	function delete($id) {
		$this->db->delete('item', array('id' => $id));
	}

	function done($id){
		$data = array('status' => 1);
		$this->db->where('id', $id);
		$this->db->update('item', $data); 
	}
	
}
?>