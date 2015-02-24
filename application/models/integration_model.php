<?php
class integration_model extends CI_Model {
	
	var $Authorization = '009ad90767c9c39bc2c4d696d4c3462dcb9cd6ae40ae46a137796f60d2f4041d1aefde71d897002ac4548208ebe96723bab782a3e96e28fff69636b53aaece56e3/7982fd90b07fd3670fd7e51ca8f01557c687a0ce18f44be6a0608a76800e0a57b43ffb9597ef977f82f9c7401454f7afd49fc37d57007f08a4e6fefa0f9e6341';
	var $url	= 'https://product-search.api.cj.com/v2/product-search';
	var $advertiser_ids ='3724478'; // Accorhotels.com US & Canada (3412620) LivingSocial (3724478)   2928793 - Cloud 9 Living
	var $serviceable_area= "US";
	var $website_id="7554568";
	var $records_per_page = "500";


	function __construct() {
		parent::__construct();
		$this->load->model('listing_model');
		$this->load->model('city_model');
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
		//echo $this->url.$this->getParam(); die();
		//use the method to parse the data from xml
		$xmlData = $this->simplexml->xml_parse($xmlRaw);
		//set the data
		$data["xmlData"] = $xmlData;
		//load the view/xmlparcer.php along with the data
		
		return $data;
		//$this->load->view('xml', $data);
	}

	function get_data_by_SKU($SKU) {
		$this->load->helper('xml');
    
    	//get the raw textdata of sample.xml
  		$opts = array(
  			'http'=>array(
    			'method'=>"GET",
    			'header'=>"Authorization: ".$this->Authorization."\r\n"   
  			)
		);

		$context = stream_context_create($opts);
  		$xmlRaw = file_get_contents($this->url.$this->getParamSKU($SKU), false, $context);
		//load the simplexml library NOTE, this is a userdefined library @See libraries/simplexml.php
		$this->load->library('simplexml');
		//echo $this->url.$this->getParam(); die();
		//use the method to parse the data from xml
		$xmlData = $this->simplexml->xml_parse($xmlRaw);
		//set the data
		$data["xmlData"] = $xmlData;
		//load the view/xmlparcer.php along with the data
		
		return $data;
	}

	function getParam(){

		return "?"."website-id=".$this->website_id."&"."advertiser-ids=".$this->advertiser_ids."&"."records-per-page=".$this->records_per_page.
		"&"."page-number=22";
	}

		function getParamSKU($sku){

		return "?"."website-id=".$this->website_id.
		"&"."advertiser-ids=".$this->advertiser_ids.
		"&"."advertiser-sku=".$sku;
		
	}

	function move_to_DB($data,$type){
		if($type == 'local'){
			$this->listing_model->addAffilateSKU($data,$type);	
		}else{
			$this->listing_model->addAffilate($data,$type);	
		}
		

	}

	function get_city_data(){
		return json_decode(file_get_contents("http://www.livingsocial.com/services/city/v2/cities"),true);
	}

	function move_to_city_DB($data){
		$array = array();

		for ($i = 0; $i < count($data); ++$i) {

			if($data[$i]['countryName'] == "United States"){

				$array[$i]['name']	= $data[$i]['name'];
				$array[$i]['active']	= 1;
				$array[$i]['date_created']	= date("Y-m-d H:i:s");
				$array[$i]['date_modified']	= date("Y-m-d H:i:s");

				$array[$i]['longitude'] 	= $data[$i]['longitude'];
				$array[$i]['latitude']	= $data[$i]['latitude'];
				$array[$i]['backgroundImageUrl']	= $data[$i]['backgroundImageUrl'];
				$array[$i]['timezone'] 	= $data[$i]['timezone'];

				$array[$i]['countryName'] 	= $data[$i]['countryName'];
				$array[$i]['state'] 	= $data[$i]['state'];			
			}
		}
		$this->city_model->integration_insert($array);

	}
}
?>