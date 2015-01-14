<?php
class integration_model extends CI_Model {
	
	var $Authorization = '00b94dd1f3098c92637c7c49f08107648a39804e42641eeab8d7e46b07f40a757e5a8b36d4be37593219bf9bca75101b4ee615f6929701968b7919f30a93b5273b/7f5fefd66914f8b76c259f49b3d7da136dad359e4b663920703eb217d877ac04ceca325a2355f9a230435d2b8b1fa63d25ce4425a72d4a460afffbf1e87e6f21';
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

	function getParam(){

		return "?"."website-id=".$this->website_id."&"."advertiser-ids=".$this->advertiser_ids."&"."records-per-page=".$this->records_per_page.
		"&"."page-number=27";
	}

	function move_to_DB($data){
		$this->listing_model->addAffilate($data);

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