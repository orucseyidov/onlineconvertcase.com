<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends GO_Controller {
	
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

		$url = "https://freetools.seobility.net/en/backlinkchecker/check?url=https://convertcase.net/";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_PROXY, '172.67.200.220');
		curl_setopt($ch, CURLOPT_PROXYPORT, 80);
		curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
		// curl_setopt($ch, CURLOPT_INTERFACE, '172.67.200.220');
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36");
		$response = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo "cURL Hatası: " . curl_error($ch);
		}
		curl_close($ch);
		echo $response;

	}






	

}