<?php
class integration_model extends CI_Model {
	
	var $Authorization = '0096a6b89402aa02368786af221f89fd6adff90ed13262b53424e1dc770c111a29887304ba56f4ce20c8d110454c89bca9f9b2999caf9b4a955be6e3fc615daced/677bdaaa8131fb172dfd4c6c2a32058bd69224a57af0e6fc0ca1c1695d369a3b02be86d8c1adedd902755cceb30272b17175ffd5cfb551b4ba30d0e5e3f09f99';
	var $url	= 'https://product-search.api.cj.com/v2/product-search';
	var $advertiser_ids ='3724478';
	var $serviceable_area= "US";
	var $website_id="7554568";


	function __construct() {
		parent::__construct();
		$this->load->model('listing_model');
		$this->load->library('xmlrpc');
	}

	function get_data() {

		
		
		$this->load->helper('xml');
    
    	//get the raw textdata of sample.xml
  		$opts = array(
  			'http'=>array(
    			'method'=>"GET",
    			'header'=>"Authorization: ".$this->Authorization."\r\n"   
  			)
		);

		$context = stream_context_create($opts);
  		$xmlRaw = file_get_contents($this->url.$this->getParam(), false, $context);
		//load the simplexml library NOTE, this is a userdefined library @See libraries/simplexml.php
		$this->load->library('simplexml');
		
		//use the method to parse the data from xml
		$xmlData = $this->simplexml->xml_parse($xmlRaw);
		//set the data
		$data["xmlData"] = $xmlData;
		//load the view/xmlparcer.php along with the data
		
		return $data;
		//$this->load->view('xml', $data);
	}

	function getParam(){

		return "?"."website-id=".$this->website_id."&"."advertiser-ids=".$this->advertiser_ids;
	}

	function move_to_DB($data){
		$this->listing_model->addAffilate($data);

	}
}
?>