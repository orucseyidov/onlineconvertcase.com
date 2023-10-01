<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Gopanel {
	public function __construct(){
		parent::__construct();
		$this->admin_control();
		$this->load->model("Dashboard_model","dashboard");
		$this->data['btitle'] = 'Əsas Panel';
	}
	
	public function index(){

		// $this->data['downloads'] = [
		// 	'withoutWatermark' => $this->dashboard->count_downloads(1),
		// 	'Watermark' => $this->dashboard->count_downloads(2),
		// 	'mp3' => $this->dashboard->count_downloads(3),
		// 	'profile' => $this->dashboard->count_downloads(4),
		// 	'cover' => $this->dashboard->count_downloads(5),
		// ];

		// $this->data['search_links'] = $this->dashboard->search_links(15);

		$this->render("dashboard",$this->data);
	}

}