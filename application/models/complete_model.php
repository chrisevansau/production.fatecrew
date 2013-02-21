<?php
class Complete_model extends CI_Model {
	var $id	= '';
	var $image	= '';
	var $rating	= '';
	var $active	= '';
	var $date_created	= '';

	function __construct() {
		parent::__construct();
	}

	function insert() {
		$this->id	= $_POST['id'];
		$this->image	= $_POST['image'];
		$this->rating	= $_POST['rating'];
		$this->active	= $_POST['active'];
		$this->date_created	= $_POST['date_created'];

		$this->db->insert('complete', $this);
	}

	function get($id) {
		$query = $this->db->get_where('complete', array('id' => $id));
		return $query->result_array();
	}
	
	function get_all() {
		$query = $this->db->get('complete');
		return $query->result_array();
	}
	
	function get_field_data() {
		return $this->db->field_data('complete');
	}

	function update() {
		$this->id	= $_POST['id'];
		$this->image	= $_POST['image'];
		$this->rating	= $_POST['rating'];
		$this->active	= $_POST['active'];
		$this->date_created	= $_POST['date_created'];

		$this->db->update('complete', $this, array('id' => $_POST['id']));
	}

	function delete($id) {
		$this->db->delete('complete', array('id' => $id));
	}
}
?>