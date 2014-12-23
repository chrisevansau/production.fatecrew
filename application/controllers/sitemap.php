<?php
class sitemap extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('sitemaps');
		$this->load->model('listing_model');
	}
		
	function index() {
		

		$main = array(
    			"http://fatecrew.com/",
    			"http://fatecrew.com/login",
    			"http://fatecrew.com/register",
    			"http://fatecrew.com/how-to-add-a-listing",
    			"http://fatecrew.com/listings",
    			"http://fatecrew.com/faqs/",
    			"http://fatecrew.com/contact",
    			"http://fatecrew.com/privacy-policy",
    			"http://fatecrew.com/terms-and-conditions"

    		);

		foreach ($main AS $url)
    	{
        	$item = array(
        	    "loc" => $url,
            	"lastmod" => "2014-12-22T00:00:00+01:00",
     	       "changefreq" => "daily",
     	       "priority" => "1.0"
     	   );

     	   $this->sitemaps->add_item($item);
     	}
		//assuming a hypothetical posts_model
		$pages = $this->listing_model->get_all();

    	foreach ($pages AS $page)
    	{
        	$item = array(
        	    "loc" => "http://fatecrew.com/deal/" . $this->listing_model->getSlug($page['slug']),
            	"lastmod" => date("c", strtotime($page['date_modified'])),
     	       "changefreq" => "daily",
     	       "priority" => "2.0"
     	   );

     	   $this->sitemaps->add_item($item);
    	}

		// file name may change due to compression
		$file_name = $this->sitemaps->build("sitemap.xml");
		//$reponses = $this->sitemaps->ping(site_url($file_name));
	}

}
?>