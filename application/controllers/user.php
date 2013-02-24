<?php
class user extends CI_Controller {

	function __construct() {
		
		parent::__construct();
		$this->load->add_package_path(APPPATH.'third_party/socialize/');
		$this->load->database();
		$this->load->model('User_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('globals');
	}
		
	function index() {
		redirect('user/show_list');
	}
	
	function login(){
		if($this->User_model->login()){
			redirect('/dock');
		}else{
			$this->session->set_flashdata('msg', 'Wrong username or password.');
			redirect('/login');
			
			
		}
	}

	function show_list() {
		$data['results'] = $this->User_model->get_all();
		$this->load->view('user/list', $data);
	}

	function show($id) {
		$data['result'] = $this->User_model->get($id);
		$this->load->view('user/show', $data);		
	}

	function new_entry() {
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		$data['city'] = $this->globals->printCitys();
		
		$this->load->view('user/new', $data);
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}
	
	function fackbook_create(){
		$this->User_model->fackbook_insert();
	}

	function create() {
		
		$this->User_model->insert();
		
		$this->session->set_flashdata('msg', 'Welcome to Fate Crew!');
		redirect('/dock');
	}

	function edit() {
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		$res = $this->User_model->get($session_data['user_id']);
		$data['result'] = $res[0];
		$data['city'] = $this->globals->printCitys($data["result"]["city_id"]);
		$this->load->view('user/edit', $data);
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}

	function update() {
		$this->User_model->update();
		
		$this->session->set_flashdata('msg', 'Entry Updated');
		redirect('/accountupdate');
	}
	
	function updatePWD(){
		$this->User_model->updatePWD();
		
		$this->session->set_flashdata('msg', 'Password Updated');
		redirect('/accountupdate');
	}

	function delete($id) {
		$this->User_model->delete($id);
		
		$this->session->set_flashdata('msg', 'Entry Deleted');
		redirect('user/show_list');
	}
	
	function prosess_fb(){
		

		 $this->load->library('facebook');
		 $signed_request = $this->facebook->getSignedRequest();
		 $user_id = $this->facebook->getUser();
		
		 array_push( $signed_request["registration"], $user_id);
		
		if($this->User_model->insert_fb($signed_request["registration"])){
			redirect('/dock');
		}else{
			echo "error";	
		}
		
	}
}
?>