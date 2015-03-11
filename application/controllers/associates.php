<?php
class associates extends CI_Controller {

	function __construct() {
		
		parent::__construct();
		$this->load->add_package_path(APPPATH.'third_party/socialize/');
		$this->load->database();
		$this->load->model('integration_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('globals');
	}
		
	public function index() {
		
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		$data['city'] = $this->globals->printCitys();
		$data['session'] = $session_data;
		$this->load->view('associates', $data);
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}
	
}
?>