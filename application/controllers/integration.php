<?php
class integration extends CI_Controller {

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
		
		redirect('integration/run');
	}
	

	function run(){
		
		$data = $this->integration_model->get_data();
		$this->integration_model->move_to_DB($data,"escapes");

	}

	function addbysku($SKU){
		$data = $this->integration_model->get_data_by_SKU($SKU);
		//var_dump($data);
		$this->integration_model->move_to_DB($data,"local");
	}

	function city(){
		$data = $this->integration_model->get_city_data();
		$this->integration_model->move_to_city_DB($data);

	}
}
?>