<?php
class Flag_model extends CI_Model {
	var $id	= '';
	var $user_id	= '';
	var $listing_id	= '';
	var $date_created	= '';

	function __construct() {
		parent::__construct();
	}

	function insert() {
		$this->id	= $_POST['id'];
		$this->user_id	= $_POST['user_id'];
		$this->listing_id	= $_POST['listing_id'];
		$this->date_created	= $_POST['date_created'];

		$this->db->insert('flag', $this);
	}

	function get($id) {
		$query = $this->db->get_where('flag', array('id' => $id));
		return $query->result_array();
	}
	
	function get_all() {
		$query = $this->db->get('flag');
		return $query->result_array();
	}
	
	function get_field_data() {
		return $this->db->field_data('flag');
	}

	function update() {
		$this->id	= $_POST['id'];
		$this->user_id	= $_POST['user_id'];
		$this->listing_id	= $_POST['listing_id'];
		$this->date_created	= $_POST['date_created'];

		$this->db->update('flag', $this, array('id' => $_POST['id']));
	}

	function delete($id) {
		$this->db->delete('flag', array('id' => $id));
	}
}
?>