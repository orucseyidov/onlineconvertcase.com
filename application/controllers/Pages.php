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

	public function error_404(){
		$this->load->view("/pages/404",$this->data);
	}
	

	public function static_pages($slug = false){
		$locale = $this->uri->segment(1);
		$slug = $this->uri->segment(2);
		$page = $this->pages->get_static_page($locale, $slug);
		if (isset($page['id'])) {
			$this->data['page'] = $page;
			$this->data['title']			= $page['title'];
			$this->data['key']				= $page['tags'];
			if (!empty($page['image'])) {
				$this->data['ogimage']			= $page['image'];
			}
			$this->data['desc']				= mb_substr(strip_tags($page['description']), 0,300);
			$this->data['bgimage']			= $this->data['ogimage'];
			$this->render("/pages/static/static",$this->data);
		}
		else{
			$this->error_404();
		}
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

}