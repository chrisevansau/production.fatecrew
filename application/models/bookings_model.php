<?php
class Bookings_model extends CI_Model {
	var $id	= '';
	var $group_name	= '';
	var $user_id	= '';
	var $listing_id	= '';
	var $num_people	= '';
	var $comment	= '';
	var $date	= '';
	var $date_added	= '';
	var $status	= '';

	function __construct() {
		parent::__construct();
	}

	function insert() {
		$this->id	= $_POST['id'];
		$this->group_name	= $_POST['group_name'];
		$this->user_id	= $_POST['user_id'];
		$this->listing_id	= $_POST['listing_id'];
		$this->num_people	= $_POST['num_people'];
		$this->comment	= $_POST['comment'];
		$this->date	= $_POST['date'];
		$this->date_added	= $_POST['date_added'];
		$this->status	= $_POST['status'];

		$this->db->insert('bookings', $this);
	}

	function get($id) {
		$query = $this->db->get_where('bookings', array('id' => $id));
		return $query->result_array();
	}
	
	function get_all() {
		$query = $this->db->get('bookings');
		return $query->result_array();
	}
	
	function get_field_data() {
		return $this->db->field_data('bookings');
	}

	function update() {
		$this->id	= $_POST['id'];
		$this->group_name	= $_POST['group_name'];
		$this->user_id	= $_POST['user_id'];
		$this->listing_id	= $_POST['listing_id'];
		$this->num_people	= $_POST['num_people'];
		$this->comment	= $_POST['comment'];
		$this->date	= $_POST['date'];
		$this->date_added	= $_POST['date_added'];
		$this->status	= $_POST['status'];

		$this->db->update('bookings', $this, array('id' => $_POST['id']));
	}

	function delete($id) {
		$this->db->delete('bookings', array('id' => $id));
	}
}
?>