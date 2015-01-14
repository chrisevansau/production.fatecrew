<?php
class City_model extends CI_Model {
	var $id	= '';
	var $name	= '';
	var $active	= '';
	var $date_created	= '';
	var $date_modified	= '';

	var $longitude 	= '';
	var $latitude 	= '';
	var $backgroundImageUrl 	= '';
	var $timezone 	= '';
	var $countryName = '';
	var $state = '';
	var $city_id_ls = "";

	function __construct() {
		parent::__construct();
	}

	function insert() {
		$this->id	= $_POST['id'];
		$this->name	= $_POST['name'];
		$this->active	= $_POST['active'];
		$this->date_created	= $_POST['date_created'];
		$this->date_modified	= $_POST['date_modified'];

		$this->db->insert('city', $this);
	}

	function get($id) {
		$query = $this->db->get_where('city', array('id' => $id));
		return $query->result_array();
	}
	
	function get_all() {
		$query = $this->db->get('city');
		return $query->result_array();
	}
	
	function get_field_data() {
		return $this->db->field_data('city');
	}

	function update() {
		$this->id	= $_POST['id'];
		$this->name	= $_POST['name'];
		$this->active	= $_POST['active'];
		$this->date_created	= $_POST['date_created'];
		$this->date_modified	= $_POST['date_modified'];

		$this->db->update('city', $this, array('id' => $_POST['id']));
	}

	function delete($id) {
		$this->db->delete('city', array('id' => $id));
	}

	function integration_insert($data){

		
		for($i =0 ;$i<count($data);++$i){
		
			if(!is_null($data[$i])){

				// Numbers to skip 9

				$this->name	= $data[$i]['name'];
				$this->active	= $data[$i]['active'];
				$this->date_created	= $data[$i]['date_created'];
				$this->date_modified	= $data[$i]['date_modified'];

				$this->longitude 	= $data[$i]['longitude'];
				$this->latitude 	= $data[$i]['latitude'];
				$this->backgroundImageUrl 	= $data[$i]['backgroundImageUrl'];
				$this->timezone 	= $data[$i]['timezone'];
				$this->countryName 	= $data[$i]['countryName'];
				$this->state 	= $data[$i]['state'];
				$this->city_id_ls = $i+1;
				$this->addCitySku($this->city_id_ls);

				//echo ".....".$i."....";

				//var_dump($data[$i]);

				try{
					$this->db->insert('city', $this);

				} catch (Exception $e) {
	 			   echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
			}

		} 

	}

	function addCitySku($city_id){

		// call api

		$data = json_decode(file_get_contents("http://monocle.livingsocial.com/v2/deals?city=".$city_id."&api-key=881E8E5F32BD45D193BD2A03CC2DD213"),true);


		// look through SKU 

		for($i=0;$i<count($data['deals']);$i++){
			$sku =$data['deals'][$i]['id'];
			// loop through city IDs 
			for($j=0;$j<count($data['deals'][$i]["city_ids"]);$j++){
				$city =$data['deals'][$i]["city_ids"][$j];
				// insert to city
				$this->db->insert('city_sku', array("sku" =>$sku, "city_id_ls"=>$city));
			}
		}

		

	}
}
?>