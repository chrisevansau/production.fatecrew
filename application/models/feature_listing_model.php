<?php
class Feature_listing_model extends CI_Model {
	var $id	= '';
	var $listing_id	= '';
	var $active	= '';
	var $clicks	= '';
	var $date_created	= '';
	var $date_modified	= '';
	var $modified_by	= '';

	function __construct() {
		parent::__construct();
	}

	function insert() {
		$this->id	= $_POST['id'];
		$this->listing_id	= $_POST['listing_id'];
		$this->active	= $_POST['active'];
		$this->clicks	= $_POST['clicks'];
		$this->date_created	= $_POST['date_created'];
		$this->date_modified	= $_POST['date_modified'];
		$this->modified_by	= $_POST['modified_by'];

		$this->db->insert('feature_listing', $this);
	}

	function get($id) {
		$query = $this->db->get_where('feature_listing', array('id' => $id));
		return $query->result_array();
	}
	
	function get_all() {
		$query = $this->db->get('feature_listing');
		return $query->result_array();
	}
	
	function get_field_data() {
		return $this->db->field_data('feature_listing');
	}

	function update() {
		$this->id	= $_POST['id'];
		$this->listing_id	= $_POST['listing_id'];
		$this->active	= $_POST['active'];
		$this->clicks	= $_POST['clicks'];
		$this->date_created	= $_POST['date_created'];
		$this->date_modified	= $_POST['date_modified'];
		$this->modified_by	= $_POST['modified_by'];

		$this->db->update('feature_listing', $this, array('id' => $_POST['id']));
	}

	function delete($id) {
		$this->db->delete('feature_listing', array('id' => $id));
	}
}
?>