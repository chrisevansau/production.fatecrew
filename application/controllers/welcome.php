<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	function __construct() {
		parent::__construct();
		
		$this->load->database();
		$this->load->model('User_model');
		$this->load->model('listing_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('globals');
	}
	
	
	public function index()
	{
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		
		$this->load->view('landing_page');
		
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
		
		
	}
	
	public function register()
	{
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		$data['city'] = $this->globals->printCitys();
		
		$this->load->view('user/new', $data);
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
		
	}
	
	
	
	
	
	public function register_fb()
	{
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		$this->load->view('user/reg_facebook');
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}
	
	public function login_fb(){
		
		$this->load->view("user/login_facebook");	
		
	}
	
	public function how_to_add(){
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		$this->load->view('mylist/howtoadd');
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}
	
	public function login()
	{
		$this->load->view('login_page');
	}
	
	public function searchListings(){
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		$data['listings']=$this->listing_model->get_all();
		$this->load->view('mylist/searchlistings',$data);
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}
	
	public function privacy_policy(){
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		
		$this->load->view('privacy_policy');
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}
	
	public function terms_and_conditions(){
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		
		$this->load->view('terms_and_conditions');
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}

	public function pageNotFound(){
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		
		$this->load->view('404');
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */