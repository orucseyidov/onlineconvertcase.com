<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends GO_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model("Home_model","home");
		$this->load->helper("filter");
		$this->getSeoInfo("home");
	}

	public function index(){
		if ($this->uri->segment(1)) {
			$slug = $this->uri->segment(1);
			$tool = $this->home->get_other_tool($slug);
			if (isset($tool['id'])) {
				$this->data['tool'] = $tool;
				$this->data['faq'] 	= $this->home->faq($tool['id']);
				$this->meta_seo($tool);
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
			if (!is_null($tool['view'])) {
				$file 	= $tool['view'];
				if (file_exists(APPPATH.'views\\other_tools\\'.$file."\\index.php")) {
					$this->data['json_ltd']	  			= ['tool','faq'];
					$this->data['other_tool_json']		= $this->home->other_tools();
					$this->data['footerdata'] .= '<script type="application/javascript" src="/assets/js/other_tools/'.$tool['javascript'].'.js?v='.time().'" async></script>';
					$this->render("other_tools/{$file}/index",$this->data);
				}
				else{
					$this->renderHome();
				}
			}
			else{
				if (!is_null($tool['javascript'])) {
					$this->data['footerdata'] .= '<script type="application/javascript" src="/assets/js/other_tools/'.$tool['javascript'].'.js?v='.time().'" async></script>';
				}
				$this->data['json_ltd']	  			= ['tool','faq'];
				$this->data['other_tool_json']		= $this->home->other_tools();
				$this->render("other_tools/static/index",$this->data);
			}
		} else {
			$this->data['footerdata'] 			.= '<script src="/assets/js/slider.js?v=1" async></script>';
			$this->data['footerdata'] 			.= '<script type="application/javascript" src="/assets/js/home.js" async></script>';
			$this->data['json_ltd']				= ['tool','faq'];
			$this->data['other_tool_json']		= $this->home->other_tools();
			$this->render("home/other_tools/index",$this->data);
		}
		
	}
	public function renderHome(){
		$this->data['footerdata'] 			.= '<script src="/assets/js/slider.js?v=1" async></script>';
		$this->data['footerdata'] 			.= '<script type="application/javascript" src="/assets/js/home.js"></script>';
		$this->data['other_tools'] 			= $this->groups();
		$this->data['home_about_blocks'] 	= $this->home->home_about_blocks();
		$this->data['other_tool_json'] 		= $this->home->other_tools();
		$this->data['usefull_links'] 		= $this->home->usefull_links();
		$this->data['json_ltd']				= ['home'];
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

	public function groups(){
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


	public function meta_seo($tool)
	{
		$settings 	= $this->settings;
		if (isset($tool['id'])) {
			$this->data['title']  	= !empty($tool['seo_title']) ? $tool['seo_title'] : $settings['site_title'];
			$this->data['desc']   	= !empty($tool['seo_description']) ? mb_substr(strip_tags($tool['seo_description']), 0,300) : $settings['description'];
			$this->data['key']     	= !empty($tool['keywords']) ? $tool['keywords'] : $settings['tags'];
			$this->data['ogimage'] 	= !empty($tool['image']) ? base_url($tool['image']) : base_url($settings['og_image']);
		}
		if (empty($this->data['ogimage'])) {
			$this->data['ogimage'] = $settings['og_image'];
		}
		debug($this->data);
		// return $seo;
	}
}