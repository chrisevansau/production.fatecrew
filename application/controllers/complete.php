<?php
class complete extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->database();
		$this->load->model('Complete_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}
		
	function index() {
		redirect('complete/show_list');
	}

	function show_list() {
		$data['results'] = $this->Complete_model->get_all();
		$this->load->view('complete/list', $data);
	}

	function show($id) {
		$data['result'] = $this->Complete_model->get($id);
		$this->load->view('complete/show', $data);		
	}

	function new_entry() {
		$this->load->view('complete/new');
	}

	function create() {
		$this->Complete_model->insert();
		
		$this->session->set_flashdata('msg', 'Entry Created');
		redirect('complete/show_list');
	}

	function edit($id) {
		$res = $this->Complete_model->get($id);
		$data['result'] = $res[0];
		$this->load->view('complete/edit', $data);
	}

	function update() {
		$this->Complete_model->update();
		
		$this->session->set_flashdata('msg', 'Entry Updated');
		redirect('complete/show_list');
	}

	function delete($id) {
		$this->Complete_model->delete($id);
		
		$this->session->set_flashdata('msg', 'Entry Deleted');
		redirect('complete/show_list');
	}
}
?>