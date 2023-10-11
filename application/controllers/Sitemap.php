<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends GO_Controller {
	
	private $keys = array();

	function __construct(){
		parent::__construct();
		$this->load->model("Sitemap_model","map");
		if ($this->uri->segment(1) != false) {
			$this->load->helper("filter");
			$this->data['baselink'] = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		}
		
	}

	public function index(){
		
		$this->data['menu'] 			= $this->map->menu();
		$this->data['tools'] 			= $this->map->other_tools();
		$this->data['seo'] 				= $this->map->seo_pages();
		header("Content-type: text/xml");
		$this->load->view("feed/sitemap",$this->data);
	}


	public function rss(){
		
		$this->data['services'] 		= $this->map->services_rss();
		$this->data['products'] 		= $this->map->products_rss();
		$this->data['blog'] 			= $this->map->blog_rss();
		$this->data['productstatus']	= $this->settings['products'];
		header("Content-type: text/xml");
		$this->load->view("feed/rss",$this->data);
	}



	public function robots(){
		
	}





	

}