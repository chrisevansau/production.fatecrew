<?php
class faqs extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->database();
		$this->load->model('Faqs_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}
		
	function index() {
		redirect('faqs/show_list');
	}

	function show_list() {
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		$data['results'] = $this->Faqs_model->get_all();
		$this->load->view('faqs/list', $data);
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}

	function show($id) {
		$data['result'] = $this->Faqs_model->get($id);
		$this->load->view('faqs/show', $data);		
	}

	function new_entry() {
		$this->load->view('faqs/new');
	}

	function create() {
		$this->Faqs_model->insert();
		
		$this->session->set_flashdata('msg', 'Entry Created');
		redirect('faqs/show_list');
	}

	function edit($id) {
		$res = $this->Faqs_model->get($id);
		$data['result'] = $res[0];
		$this->load->view('faqs/edit', $data);
	}

	function update() {
		$this->Faqs_model->update();
		
		$this->session->set_flashdata('msg', 'Entry Updated');
		redirect('faqs/show_list');
	}

	function delete($id) {
		$this->Faqs_model->delete($id);
		
		$this->session->set_flashdata('msg', 'Entry Deleted');
		redirect('faqs/show_list');
	}
}
?>