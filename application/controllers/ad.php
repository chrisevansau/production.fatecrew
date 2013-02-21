<?php
class ad extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->database();
		$this->load->model('Ad_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}
		
	function index() {
		redirect('ad/show_list');
	}

	function show_list() {
		$data['results'] = $this->Ad_model->get_all();
		$this->load->view('ad/list', $data);
	}

	function show($id) {
		$data['result'] = $this->Ad_model->get($id);
		$this->load->view('ad/show', $data);		
	}

	function new_entry() {
		$this->load->view('ad/new');
	}

	function create() {
		$this->Ad_model->insert();
		
		$this->session->set_flashdata('msg', 'Entry Created');
		redirect('ad/show_list');
	}

	function edit($id) {
		$res = $this->Ad_model->get($id);
		$data['result'] = $res[0];
		$this->load->view('ad/edit', $data);
	}

	function update() {
		$this->Ad_model->update();
		
		$this->session->set_flashdata('msg', 'Entry Updated');
		redirect('ad/show_list');
	}

	function delete($id) {
		$this->Ad_model->delete($id);
		
		$this->session->set_flashdata('msg', 'Entry Deleted');
		redirect('ad/show_list');
	}
}
?>