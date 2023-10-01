<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends GO_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model("Home_model","home");
		$this->load->helper("filter");
		$this->getSeoInfo("home");
		$this->data['footerdata']			= '<script type="application/javascript" src="/assets/js/home.js"></script>';
	}

	public function index(){
		if ($this->uri->segment(2)) {
			$slug = $this->uri->segment(2);
			$tool = $this->home->get_other_tool($slug);
			if (isset($tool['id'])) {
				$this->renderTool($tool,$slug);
			} else {
				$this->renderHome();
			}
			
		} else {
			$this->renderHome();
		}
	}

	public function renderTool($tool,$slug){
		if ($tool['page_status'] == 2) {
			if (! file_exists(APPPATH.'views\\other_tools\\'.$slug."\\".$slug.".php")) {
				$this->renderHome();
			}
			else{
				$this->render("other_tools/{$slug}/{$slug}",$this->data);
			}
		} else {
			$this->renderHome();
		}
		
	}
	public function renderHome(){
		$this->data['other_tools'] = $this->test();
		$this->render("home/home",$this->data);
	}

	public function language($lang){
		$languages = $this->config->item('languages');
		if (lang_check($lang,$languages)) {
			$this->index();
		}
		else{
			redirect("404");
		}
	}

	public function test(){
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
}