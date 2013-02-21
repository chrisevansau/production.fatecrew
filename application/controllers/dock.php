<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dock extends CI_Controller {

	
	function __construct() {
		parent::__construct();
		
		$this->load->database();
		$this->load->model('User_model');
		$this->load->model('listing_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}
	
	
	public function index()
	{	
		
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		$data['my_list'] = $this->listing_model->get_all_my_list($session_data['user_id']);
		$data['listings']=$this->listing_model->get_all();
		$data['feat'] = $this->globals->printFeatForDock();
		$this->load->view('dock_page',$data);
		$data['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $data);
	}
	
	
}