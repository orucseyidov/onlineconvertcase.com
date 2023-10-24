<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends GO_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model("Pages_model","pages");
		$this->load->helper("filter");
		
	}

	public function index($slug){
		return false;
	}

	public function about(){
		$this->data['json_ltd']				= ['breadcrumb'];
		$meta = $this->meta_seo($this->uri->segment(1));
		$about = $this->pages->about($this->locale);
		$this->data['about']		   = $about;
		$this->render("/pages/about",$this->data);
	}

	public function contact(){
		$this->data['json_ltd']				= ['breadcrumb'];
		$this->getSeoInfo($this->uri->segment(1));
		$this->render("/pages/contact",$this->data);
	}

	public function faq(){
		$this->data['json_ltd']				= ['breadcrumb','faq'];
		$this->getSeoInfo($this->uri->segment(1));
		$faq = $this->pages->faq($this->locale);
		$this->data['faq'] = $faq;
		$this->render("/pages/faq",$this->data);
	}

	public function error_404(){
		$this->data['json_ltd']					= ['breadcrumb'];
		$this->data['footerdata'] 				.= '<script type="application/javascript" src="/assets/js/home.js" async></script>';
		$this->getSeoInfo($this->uri->segment(1));
		$this->render("/pages/404",$this->data);
	}
	

	public function static_pages($slug = false){
		// $locale = $this->uri->segment(1);
		$locale = 'en';
		$slug 	= $this->uri->segment(1);
		$page 	= $this->pages->get_static_page($locale, $slug);
		if (isset($page['id'])) {
			$this->meta_seo($slug);
			$this->data['page'] 			= $page;
			$this->data['title']			= $page['title'];
			$this->data['desc']				= $page['meta_description'];
			$this->data['key']				= $page['keywords'];
			if (!empty($page['image'])) {
				$this->data['ogimage']		= $page['image'];
			}
			$this->data['desc']				= mb_substr(strip_tags($page['meta_description']), 0,300);
			$this->data['bgimage']			= $this->data['ogimage'];
			$this->data['json_ltd']			= ['breadcrumb'];
			$this->render("/pages/static/static",$this->data);
		}
		else{
			$this->error_404();
		}
	}


	public function static_pages_seo($slug = false){
		// $locale = $this->uri->segment(1);
		$locale = 'en';
		$slug 	= $this->uri->segment(1);
		$page 	= $this->pages->get_static_page($locale, $slug);
		if (isset($page['id'])) {
			$this->data['other_tools'] 			= $this->groups();
			$this->meta_seo($slug);
			$this->data['page'] 			= $page;
			$this->data['title']			= $page['title'];
			$this->data['key']				= $page['keywords'];
			if (!empty($page['image'])) {
				$this->data['ogimage']		= $page['image'];
			}
			$this->data['desc']				= mb_substr(strip_tags($page['meta_description']), 0,300);
			$this->data['bgimage']			= $this->data['ogimage'];
			$this->data['json_ltd']			= ['breadcrumb'];
			$this->render("/pages/static/seo",$this->data);
		}
		else{
			$this->error_404();
		}
	}

	public function groups(){
		$this->load->model("Home_model","home");
		$response = [];
		$groups = $this->home->other_tool_groups();
		$tools 	= $this->home->other_tools();
		foreach ($groups as $key => $value) {
			$response[$key] = $value;
			foreach ($tools as $toolKey => $tool) {
				if ($tool['group_id'] == $value['id']) {
					$response[$key]['tools'][] = $tool;
				}
			}
		}
		return $response;
	}


	public function meta_seo($slug)
	{
		$seo 		= $this->core->get_seo_info($slug) ?? array();
		$settings 	= $this->settings;
		if (count($seo) > 0) {
			$this->data['breadcrumbTitle'] = !empty($seo['title']) ? $seo['title'] : $settings['site_title'];
			$this->data['title']  	= !empty($seo['meta_title']) ? $seo['meta_title'] : $settings['site_title'];
			$this->data['desc']   	= !empty($seo['meta_description']) ? $seo['meta_description'] : $settings['description'];
			$this->data['key']     	= !empty($seo['keywords']) ? $seo['keywords'] : $settings['tags'];
			$this->data['ogimage'] 	= !empty($seo['image']) ? base_url($seo['image']) : base_url($settings['og_image']);
		}
		if (empty($this->data['ogimage'])) {
			$this->data['ogimage'] = $settings['og_image'];
		}

		return $seo;
	}


	public function pingGoogleSitemaps( $url_xml ){ 
	   $status = 0; 
	   $google = 'www.google.com'; 
	   if( $fp=@fsockopen($google, 80) ) 
	   { 
	      $req =  'GET /webmasters/sitemaps/ping?sitemap=' . 
	              urlencode( $url_xml ) . " HTTP/1.1\r\n" . 
	              "Host: $google\r\n" . 
	              "User-Agent: Mozilla/5.0 (compatible; " . 
	              PHP_OS . ") PHP/" . PHP_VERSION . "\r\n" . 
	              "Connection: Close\r\n\r\n"; 
	      fwrite( $fp, $req ); 
	      while( !feof($fp) ) 
	      { 
	         if( @preg_match('~^HTTP/\d\.\d (\d+)~i', fgets($fp, 128), $m) ) 
	         { 
	            $status = intval( $m[1] ); 
	            break; 
	         } 
	      } 
	      fclose( $fp ); 
	   } 
	   return( $status ); 
	} 

	// Once the sitemaps are ready, we ping Google... 
	public function pingback(){
		if( 200 === ($status=$this->pingGoogleSitemaps(base_url('sitemap.xml'))) ) 
		   echo "Success Ping Back"; 
		else 
		   echo "error: Ping back error";
	} 


	public function search(){
		$this->render("/pages/static/search",$this->data);
	}

}