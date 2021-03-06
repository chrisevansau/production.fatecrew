<?php
class mylist extends CI_Controller {

	function __construct() {
		
		parent::__construct();
		$this->load->add_package_path(APPPATH.'third_party/socialize/');
		$this->load->database();
		$this->load->model('User_model');
		$this->load->model('event_model');
		$this->load->model('listing_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}
		
	function index() {
		$session_data = $this->session->userdata('loged_in');
		$date['list'] =  $this->User_model->getMyList($session_data["user_id"]);
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		
		$this->load->view('/mylist/mylist',$date);
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}
	
	function add($listing_id){
		
		$session_data = $this->session->userdata('loged_in');
		
		$this->User_model->addToList($session_data["user_id"], $listing_id, $session_data["facebook_id"] );
		redirect('/dock');
	}
	
	
	function remove($listing_id){
		$session_data = $this->session->userdata('loged_in');
		
		$this->User_model->removeFromList($session_data["user_id"], $listing_id );
		redirect('/mylist');
	}
	
	function book($listing_id){
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		$session_data = $this->session->userdata('loged_in');
		
		$data['event_id'] = $this->User_model->getFBEventId($session_data["user_id"], $listing_id );
		
		$this->load->view('/mylist/book', $data);
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}
	
	function invite($listing_id){
		$session_data = $this->session->userdata('loged_in');
		$listing_name = $this->listing_model->getListingName($listing_id);
		$company_name = $this->listing_model->getListingCompanyName($listing_id);
		$address_name = $this->listing_model->getListingAddress($listing_id);
		$image = $this->listing_model->getFacebookImage($listing_id);
		$page = array(
			'session' =>$session_data,
			'listing_name' =>$listing_name,
			'listing_id' =>$listing_id,
			'company_name' =>$company_name,
			'address' => $address_name,
			'image' => $image,
			
			); 
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		$this->load->view('/mylist/invite', $page);
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}
	
	function event_create(){
		
		// add event
		
		 $this->event_model->insert();
		
		// add people invited
		var_dump($_POST);
		
	}
	
}