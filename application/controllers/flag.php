<?php
class flag extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->database();
		$this->load->model('Flag_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}
		
	function index() {
		redirect('flag/show_list');
	}

	function show_list() {
		$data['results'] = $this->Flag_model->get_all();
		$this->load->view('flag/list', $data);
	}

	function show($id) {
		$data['result'] = $this->Flag_model->get($id);
		$this->load->view('flag/show', $data);		
	}

	function new_entry() {
		$this->load->view('flag/new');
	}

	function create() {
		$this->Flag_model->insert();
		
		$this->session->set_flashdata('msg', 'Entry Created');
		redirect('flag/show_list');
	}

	function edit($id) {
		$res = $this->Flag_model->get($id);
		$data['result'] = $res[0];
		$this->load->view('flag/edit', $data);
	}

	function update() {
		$this->Flag_model->update();
		
		$this->session->set_flashdata('msg', 'Entry Updated');
		redirect('flag/show_list');
	}

	function delete($id) {
		$this->Flag_model->delete($id);
		
		$this->session->set_flashdata('msg', 'Entry Deleted');
		redirect('flag/show_list');
	}
}
?>