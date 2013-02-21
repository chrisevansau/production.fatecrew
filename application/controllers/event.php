<?php
class event extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->database();
		$this->load->model('Event_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}
		
	function index() {
		redirect('event/show_list');
	}

	function show_list() {
		$data['results'] = $this->Event_model->get_all();
		$this->load->view('event/list', $data);
	}

	function show($id) {
		$data['result'] = $this->Event_model->get($id);
		$this->load->view('event/show', $data);		
	}

	function new_entry() {
		$this->load->view('event/new');
	}

	function create() {
		$this->Event_model->insert();
		
		$this->session->set_flashdata('msg', 'Entry Created');
		redirect('event/show_list');
	}

	function edit($id) {
		$res = $this->Event_model->get($id);
		$data['result'] = $res[0];
		$this->load->view('event/edit', $data);
	}

	function update() {
		$this->Event_model->update();
		
		$this->session->set_flashdata('msg', 'Entry Updated');
		redirect('event/show_list');
	}

	function delete($id) {
		$this->Event_model->delete($id);
		
		$this->session->set_flashdata('msg', 'Entry Deleted');
		redirect('event/show_list');
	}
}
?>