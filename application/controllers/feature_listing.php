<?php
class feature_listing extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->database();
		$this->load->model('Feature_listing_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}
		
	function index() {
		redirect('feature_listing/show_list');
	}

	function show_list() {
		$data['results'] = $this->Feature_listing_model->get_all();
		$this->load->view('feature_listing/list', $data);
	}

	function show($id) {
		$data['result'] = $this->Feature_listing_model->get($id);
		$this->load->view('feature_listing/show', $data);		
	}

	function new_entry() {
		$this->load->view('feature_listing/new');
	}

	function create() {
		$this->Feature_listing_model->insert();
		
		$this->session->set_flashdata('msg', 'Entry Created');
		redirect('feature_listing/show_list');
	}

	function edit($id) {
		$res = $this->Feature_listing_model->get($id);
		$data['result'] = $res[0];
		$this->load->view('feature_listing/edit', $data);
	}

	function update() {
		$this->Feature_listing_model->update();
		
		$this->session->set_flashdata('msg', 'Entry Updated');
		redirect('feature_listing/show_list');
	}

	function delete($id) {
		$this->Feature_listing_model->delete($id);
		
		$this->session->set_flashdata('msg', 'Entry Deleted');
		redirect('feature_listing/show_list');
	}
}
?>