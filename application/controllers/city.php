<?php
class city extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->database();
		$this->load->model('City_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}
		
	function index() {
		redirect('city/show_list');
	}

	function show_list() {
		$data['results'] = $this->City_model->get_all();
		$this->load->view('city/list', $data);
	}

	function show($id) {
		$data['result'] = $this->City_model->get($id);
		$this->load->view('city/show', $data);		
	}

	function new_entry() {
		$this->load->view('city/new');
	}

	function create() {
		$this->City_model->insert();
		
		$this->session->set_flashdata('msg', 'Entry Created');
		redirect('city/show_list');
	}

	function edit($id) {
		$res = $this->City_model->get($id);
		$data['result'] = $res[0];
		$this->load->view('city/edit', $data);
	}

	function update() {
		$this->City_model->update();
		
		$this->session->set_flashdata('msg', 'Entry Updated');
		redirect('city/show_list');
	}

	function delete($id) {
		$this->City_model->delete($id);
		
		$this->session->set_flashdata('msg', 'Entry Deleted');
		redirect('city/show_list');
	}
}
?>