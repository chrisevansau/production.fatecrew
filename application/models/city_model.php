<?php
class City_model extends CI_Model {
	var $id	= '';
	var $name	= '';
	var $active	= '';
	var $date_created	= '';
	var $date_modified	= '';

	function __construct() {
		parent::__construct();
	}

	function insert() {
		$this->id	= $_POST['id'];
		$this->name	= $_POST['name'];
		$this->active	= $_POST['active'];
		$this->date_created	= $_POST['date_created'];
		$this->date_modified	= $_POST['date_modified'];

		$this->db->insert('city', $this);
	}

	function get($id) {
		$query = $this->db->get_where('city', array('id' => $id));
		return $query->result_array();
	}
	
	function get_all() {
		$query = $this->db->get('city');
		return $query->result_array();
	}
	
	function get_field_data() {
		return $this->db->field_data('city');
	}

	function update() {
		$this->id	= $_POST['id'];
		$this->name	= $_POST['name'];
		$this->active	= $_POST['active'];
		$this->date_created	= $_POST['date_created'];
		$this->date_modified	= $_POST['date_modified'];

		$this->db->update('city', $this, array('id' => $_POST['id']));
	}

	function delete($id) {
		$this->db->delete('city', array('id' => $id));
	}
}
?>