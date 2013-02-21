<?php
class Ad_model extends CI_Model {
	var $id	= '';
	var $image	= '';
	var $active	= '';
	var $date_created	= '';
	var $date_modified	= '';

	function __construct() {
		parent::__construct();
	}

	function insert() {
		$this->id	= $_POST['id'];
		$this->image	= $_POST['image'];
		$this->active	= $_POST['active'];
		$this->date_created	= $_POST['date_created'];
		$this->date_modified	= $_POST['date_modified'];

		$this->db->insert('ad', $this);
	}

	function get($id) {
		$query = $this->db->get_where('ad', array('id' => $id));
		return $query->result_array();
	}
	
	function get_all() {
		$query = $this->db->get('ad');
		return $query->result_array();
	}
	
	function get_field_data() {
		return $this->db->field_data('ad');
	}

	function update() {
		$this->id	= $_POST['id'];
		$this->image	= $_POST['image'];
		$this->active	= $_POST['active'];
		$this->date_created	= $_POST['date_created'];
		$this->date_modified	= $_POST['date_modified'];

		$this->db->update('ad', $this, array('id' => $_POST['id']));
	}

	function delete($id) {
		$this->db->delete('ad', array('id' => $id));
	}
}
?>