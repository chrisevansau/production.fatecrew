<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	
	function __construct() {
		parent::__construct();
		
		$this->load->database();
		$this->load->model('User_model');
		$this->load->model('listing_model');
		$this->load->model('user_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}
	
	
	public function index()
	{	
		
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		
		
		$this->load->view('contact_page',$session_data);
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}
	
	function send(){
		
		if(!isset($_POST['email'])){
			$_POST['email'] = $this->user_model->getEmail($_POST['user_id']);
			$_POST['name'] = $this->user_model->getName($_POST['user_id']);
			
		}
		
		$this->email->from($_POST['email'], $_POST['name']);
		if(!isset($_POST['email_to'])){
			$to = 'chris.w.evans.au@gmail.com';
		}else{
			$to = $_POST['email_to'];
		}
		$this->email->to($to); 
		
		$this->email->subject($_POST['subject']);
		$this->email->message($_POST['message']);

		$this->email->send();
		$this->session->set_flashdata('msg', 'Message was sent');
		redirect("/contact");
		
	}
	
	function to($listing){
		
		$this->load->model('listing_model');
		$current =  $this->listing_model->get($listing);
		$current = $current[0];
		
		
		
		$listing = array();
		
		$listing['email'] = $current['contact'];
		$listing['company'] = $current['company'];
		$listing['name'] = $current['search_engine_name'];
		
		
		
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		
		$session_data['listing'] = $listing;
		
		$this->load->view('contact_listing_page',$session_data);
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
		
		
	}
	
	
}