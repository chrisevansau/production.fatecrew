<?php
class Faqs_model extends CI_Model {
	var $id	= '';
	var $title	= '';
	var $desc	= '';
	var $date_created	= '';
	var $date_modified	= '';
	var $active	= '';

	function __construct() {
		parent::__construct();
	}

	function insert() {
		$this->id	= $_POST['id'];
		$this->title	= $_POST['title'];
		$this->desc	= $_POST['desc'];
		$this->date_created	= $_POST['date_created'];
		$this->date_modified	= $_POST['date_modified'];
		$this->active	= $_POST['active'];

		$this->db->insert('faqs', $this);
	}

	function get($id) {
		$query = $this->db->get_where('faqs', array('id' => $id));
		return $query->result_array();
	}
	
	function get_all() {
		$query = $this->db->get('faqs');
		return $query->result_array();
	}
	
	function get_field_data() {
		return $this->db->field_data('faqs');
	}

	function update() {
		$this->id	= $_POST['id'];
		$this->title	= $_POST['title'];
		$this->desc	= $_POST['desc'];
		$this->date_created	= $_POST['date_created'];
		$this->date_modified	= $_POST['date_modified'];
		$this->active	= $_POST['active'];

		$this->db->update('faqs', $this, array('id' => $_POST['id']));
	}

	function delete($id) {
		$this->db->delete('faqs', array('id' => $id));
	}
}
?>