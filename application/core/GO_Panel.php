<?php defined('BASEPATH') or exit('No direct script access allowed');





abstract class GO_Panel extends MY_Controller
{

	protected $data = array();
	protected $app;
	protected $class;
	protected $method;
	protected $table;
	protected $tokent;
	protected $bactive;
	protected $control = true;
	public $dil = 'az';


	// public function __construct(){
	// 	parent::__construct();
	// 	$this->load->model("Core","core");
	// 	$this->load->helper("all");
	// 	// $this->locale = isset($this->session->locale) ? $this->session->locale : $this->core->language();
	// 	$this->token();
	// 	$this->settings = $this->get_siet_settings();
	// 	$this->data = array(
	// 		"app" 			=> $this->app,
	// 		"token" 		=> $this->token,
	// 		"class" 		=> $this->class,
	// 		"method"		=> $this->method,
	// 		"table"			=> $this->class,
	// 		"title"			=> '',
	// 		"desc"			=> '',
	// 		"logo"			=> '',
	// 		"key"			=> '',
	// 		"ogimage"		=> '',
	// 		"footerdata"	=> '',
	// 		"headdata"		=> '',
	// 		"counter" 		=> 0
	// 	);

	// }

	public function render($view, $data = null)
	{

		$settings         			= $this->settings;

		if ($settings['site_status'] == 1) {
			if ($this->uri->segment(1) == false) {
				$this->getMeta($settings);
			}
			$this->data['altlink'] 		= false;
			$this->data['footerdata']   = !isset($data['footerdata']) ? '' : $data['footerdata'];
			$this->data['headdata'] 	= !isset($data['headdata']) ? '' : $data['headdata'];
			$this->data['logo']     	= $settings['image'];
			$this->data['image_footer'] = $settings['image_footer'];
			$this->data['lang'] 		= $this->lang;
			$this->data['settings'] 	= $settings;
			$this->data['scripts'] 		= "";
			$this->load->view("blocks/head", $this->data);
			$this->load->view("blocks/header", $this->data);
			$this->load->view($view);
			$this->load->view("blocks/footer");
		} else {
			$this->load->view("blocks/under", $this->data);
		}
	}


	public function getMeta($settings)
	{

		$this->data['title'] = !empty($this->data['title']) ? $this->data['title'] : $settings['site_title'];

		$this->data['desc']  = !empty($this->data['description']) ? $this->data['description'] : $settings['description'];

		$this->data['key']  = !empty($this->data['key']) ? $this->data['key'] : $settings['tags'];

		$this->data['ogimage'] = !empty($this->data['ogimage']) ? $this->data['ogimage'] : $settings['image'];
	}

	public function getSeoInfo($slug)
	{
		$seo 		= $this->core->get_seo_info($slug);
		if (count($seo) > 0) {
			$settings 	= $this->settings;

			$this->data['title']  = !empty($seo['title']) ? $seo['title'] : $settings['site_title'];

			$this->data['desc']   = !empty($seo['description']) ? $seo['description'] : $settings['description'];

			$this->data['key']     = !empty($seo['keywords']) ? $seo['keywords'] : $settings['tags'];

			$this->data['ogimage'] = !empty($seo['image']) ? base_url($seo['image']) : base_url($settings['logo']);
		}
	}

	public function get_siet_settings()
	{
		return $this->core->getSiteSettings();
	}

	public function detect()
	{
		$this->load->library('Mobile-Detect/Mobile_Detect');
		$detect = new Mobile_Detect();

		if ($detect->isMobile()) {
			return 'mobile';
		} else if ($detect->isTablet()) {
			return 'tablet';
		} else if ($detect->isAndroidOS()) {
			return 'isAndroidOS';
		} else {
			return 'desktop';
		}
	}


	public function token()
	{
		$token 		 = md5(sha1(md5(sha1(md5(date("Y-m-d H:i"))))));
		$date        = strtotime(date("H:i:s"));
		$sessiondate = strtotime($this->session->token_time);
		$difference  = $date - $sessiondate;
		if ($difference > 21600) {
			$this->session->set_userdata('token_time', date("H:i:s"));
			$this->session->set_userdata('token', $token);
			$this->token = $token;
		} else {
			$this->token = $this->session->token;
		}
	}

	/* Gopanel area */

	public function fill($view, $data = null)
	{
		$this->gopanel();
		$this->load->view("gopanel/blocks/head", $this->data);
		$this->load->view("gopanel/blocks/header", $this->data);
		$this->load->view("gopanel/{$view}", $this->data);
		$this->load->view("gopanel/blocks/footer", $this->data);
	}


	public function gopanel()
	{
		$this->varable_change_value();
		if ($this->uri->segment(3) != FALSE) {
			$this->load->helper("breadcrumb");
			$this->data["bactive"] = $this->bactive;
			$this->bactive 		= breadcrumb_helper($this->uri->segment(3));
		} else {
			$this->bactive 		= "";
		}
	}

	public function varable_change_value()
	{
		$this->class 		= $this->router->fetch_class();
		$this->method		= $this->router->fetch_method();
		$this->table		= strtolower($this->router->fetch_class());
		$this->app 			= $this->uri->segment(1);
	}


	public function control_module($module, $method)
	{
		$permissions = json_decode($this->data['personal']['permissions']);
		if (!isset($permissions->$module->$method)) {
			$this->redirect_x();
		}
	}

	public function redirect_x()
	{
		$this->load->library('user_agent');
		$this->session->set_flashdata('info', "Sizin bu bölməyə icazəniz yoxdur!");
		if ($this->agent->is_referral()) {
			redirect($this->agent->referrer());
		} else {
			redirect("/gopanel/");
		}
	}
}
