<?php
class item extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->database();
		$this->load->model('Item_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('globals');
		
	}

	function add_item($name){
		$name = urldecode($name);
		$this->Item_model->insert($name);
		redirect('/mylist');
	}
	function delete($id){
		$this->Item_model->delete($id);
		redirect('/mylist');

	}

	function done($id){
		$this->Item_model->done($id);
		redirect('/mylist');
	}

}
?>