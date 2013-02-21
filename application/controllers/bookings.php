<?php
class bookings extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->database();
		$this->load->model('Bookings_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}
		
	function index() {
		redirect('bookings/show_list');
	}

	function show_list() {
		$data['results'] = $this->Bookings_model->get_all();
		$this->load->view('bookings/list', $data);
	}

	function show($id) {
		$data['result'] = $this->Bookings_model->get($id);
		$this->load->view('bookings/show', $data);		
	}

	function new_entry() {
		$this->load->view('bookings/new');
	}

	function create() {
		$this->Bookings_model->insert();
		
		$this->session->set_flashdata('msg', 'Entry Created');
		redirect('bookings/show_list');
	}

	function edit($id) {
		$res = $this->Bookings_model->get($id);
		$data['result'] = $res[0];
		$this->load->view('bookings/edit', $data);
	}

	function update() {
		$this->Bookings_model->update();
		
		$this->session->set_flashdata('msg', 'Entry Updated');
		redirect('bookings/show_list');
	}

	function delete($id) {
		$this->Bookings_model->delete($id);
		
		$this->session->set_flashdata('msg', 'Entry Deleted');
		redirect('bookings/show_list');
	}
	
	
}
?>