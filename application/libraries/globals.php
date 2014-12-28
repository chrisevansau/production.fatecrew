<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class globals {

    public function printCitys($current_id = NULL)
    {
		$CI =& get_instance();
		$query = $CI->db->get_where('city', array('active' => "1"));
		$city = $query->result();
		$dropDown = '
		<label for="city_id">City:</label><br/>
        <select name="city_id">
        	<option value="">Please Select</option>';
				for ($i =0; $i<count($city);$i++)
				{
					if($current_id == $city[$i]->id){
						$selected = 'selected="selected"';	
					}else{
						$selected = "";	
					}
					
    				$dropDown .='<option value="'.$city[$i]->id.'" '.$selected.'>'.$city[$i]->name.'</option>';	
				}
    			$dropDown .='</select>';
		return $dropDown;
		
    }
	
	public function printFeat()
    {
		// 
		
		// get four lisings
		$CI =& get_instance();
		$total = 0;
		$ids = array();
		while($total <4){

			$sql = "SELECT * FROM listing ORDER BY RAND() LIMIT 1";
			$query = $CI->db->query($sql); 
			$result = $query->result();
			$currentId = $result[0]->id;
			$notInList = true;	
			foreach($ids as $id){
				if($currentId == $id){
					$notInList = false;
				}
			}
				
			if($notInList){
				$listing[$total] = $result;
				array_push($ids, $result[0]->id);
				$total++;
			}

				
		}
		$count =0;
		$result = "";
		
		foreach($listing as $list)
		{
			// width="279"
			$result .='<a href="/deal/'.$list[0]->slug.'">';
			$result .='<div class="feat_item">';
            $result .='<img src="'.$list[0]->image.'" width="279"  height="197" />';
            $result .='<div class="feat_sup_content">';
    	    $result .='<h2>'.$list[0]->bucket_list_name.'</h2>';
            $result .='<p>'.substr($list[0]->desc,0,40).'...</p>';
			$result .='<p><a class="black_button" href="/deal/'.$list[0]->slug.'">view...</a></p>';
            $result .='</div>';
			$result .='</div>';
			$result .='</a>';
			
			$count++;
		}
		
		return $result;
		
		
	}
	
	
	public function printFeatForDock()
    {
		// 
		
		// get four lisings
		$CI =& get_instance();
		$total = 0;
		$ids = array();
		while($total <4){

			$sql = "SELECT * FROM listing ORDER BY RAND() LIMIT 1";
			$query = $CI->db->query($sql); 
			$result = $query->result();
			$currentId = $result[0]->id;
			$notInList = true;	
			foreach($ids as $id){
				if($currentId == $id){
					$notInList = false;
				}
			}
				
			if($notInList){
				$listing[$total] = $result;
				array_push($ids, $result[0]->id);
				$total++;
			}

				
		}
		$count =0;
		$result = "";
		
		foreach($listing as $list)
		{
			$this->load->helper('text');
			// width="279"
			$result .='<a href="/deal/'.str_replace(" ","-",$list[0]->search_engine_name).'">';
			$result .='<div class="feat_item">';
            $result .='<img src="'.$list[0]->image.'" width="129"   />';
            $result .='<div class="feat_sup_content">';
    	    $result .='<h2>'.word_limiter($list[0]->bucket_list_name,47).'</h2>';
            
            $result .='</div>';
			$result .='</div>';
			$result .='</a>';
			$count++;
		}
		
		return $result;
		
		
	}
}

