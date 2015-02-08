<?php
class listing extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->database();
		$this->load->model('Listing_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('globals');
		
	}
		
	function index() {
		redirect('listing/show_list');
	}

	function show_list() {
		
		$data['results'] = $this->Listing_model->get_all();
		$this->load->view('listing/list', $data);
	}

	function show($slug) {
		$session_data = $this->session->userdata('loged_in');
		//$this->load->view('header',$session_data);
		
		$data['result'] = $this->Listing_model->getByName($slug);
		$data['name'] = $session_data['name'];
		$this->Listing_model->addHit($session_data['user_id'],$data['result'][0]['id'] );
		$data['status'] = $this->Listing_model->list_status($session_data['user_id'],$data['result'][0]['id']);
		$this->load->view('listing/show', $data);
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);	
			
	}

	function new_entry() {
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		$data['city'] = $this->globals->printCitys();
		$data['session'] = $session_data;
		$myListings = $this->Listing_model->getMyListing($session_data['user_id']);
		$data['myListings'] = $myListings;
		$this->load->view('listing/new', $data);
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}

	function create() {
		$this->Listing_model->insert();
		$this->session->set_flashdata('msg', 'Entry Created');
		redirect('/dock');
	}

	function edit($id) {
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		$data['city'] = $this->globals->printCitys();
		$data['session'] = $session_data;
		$res = $this->Listing_model->get($id);
		$data['hits'] = $this->Listing_model->getResults($id);
		$data['result'] = $res[0];
		$this->load->view('listing/edit', $data);
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}

	function update() {
		$this->Listing_model->update();
		
		$this->session->set_flashdata('msg', 'Entry Updated');
		redirect('listing/show_list');
	}

	function delete($id) {
		$this->Listing_model->delete($id);
		
		$this->session->set_flashdata('msg', 'Entry Deleted');
		redirect('listing/show_list');
	}
	
	function search($word){
		
		$session_data = $this->session->userdata('loged_in');
		$this->load->view('header',$session_data);
		$data['listings'] = $this->Listing_model->getByKeyWord($word);
		$this->load->view('listing/search', $data);
		$date['feat'] = $this->globals->printFeat();
		$this->load->view('footer', $date);
	}
}
?>