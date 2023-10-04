<?php defined('BASEPATH') or exit('No direct script access allowed');





class GO_Controller extends MX_Controller
{

	protected $data = array();
	public $token;
	protected $device;
	public $settings;
	public $dil;
	public $countryCode;
	public $country;
	public $ip;


	public function __construct()
	{
		parent::__construct();
		// unset($_SESSION['ip']);
		$this->load->model("Core", "core");
		$this->load->helper("all");
		$this->lang_init();
		$this->device = $this->detect();
		$this->settings = $this->get_siet_settings();
		$this->varable_change_value();
		$this->csrf();
		$this->data = array(
			"device" 		=> $this->detect(),
			"token" 		=> $this->token,
			"title"			=> $this->settings['site_title'],
			"desc"			=> '',
			"logo"			=> '',
			"key"			=> '',
			"ogimage"		=> '',
			"footerdata"	=> '',
			"headdata"		=> '',
			"loadscript"	=> '',
			"loadstyle"		=> '',
			"counter"		=> 0,
			"ip"			=> $this->ip,
			"locale"		=> $this->locale,
			"languages"		=> $this->config->item("languages"),
			"current_locale" => get_lang($this->config->item("languages"), $this->locale),
			"json_ltd"		=> [],
		);

		$this->data['seo_slug']				= false;
	}

	public function render($view, $data = null)
	{
		// debug($this->locale);

		$settings         			= $this->settings;

		if ($settings['site_status'] == 1) {
			if ($this->uri->segment(2) == false) {
				$this->getMeta($settings);
			}
			$this->data['altlink'] 			= false;
			$this->data['footerdata']   	= !isset($data['footerdata']) ? '' : $data['footerdata'];
			$this->data['headdata'] 		= !isset($data['headdata']) ? '' : $data['headdata'];
			$this->data['logo']     		= $settings['image'];
			$this->data['logo_mobile']		= $settings['logo_mobile'];
			// $this->data['lang'] 			= $this->lang;
			$this->data['lang'] 			= $this->locale;
			$this->data['settings'] 		= $settings;
			// $this->data['social'] 			= $this->core->social();
			$this->data['contacts'] 		= $this->core->contact();
			$this->data['menu'] 			= $this->core->menu();
			// $this->data['pages'] 			= $this->core->pages();
			// $this->data['seo_pages'] 		= $this->core->seo_pages();
			// $this->data['langs'] 			= $this->titles();
			// $this->data['content'] 			= $this->content();
			$this->data['scripts']			= "";
			// ob_start("sanitize_output");
			$this->load->view("blocks/head", $this->data);
			$this->load->view("blocks/header", $this->data);
			$this->load->view($view);
			$this->load->view("blocks/footer");
			// ob_end_flush();
		} else {
			$this->load->view("blocks/under", $this->data);
		}
	}

	public function getMeta($settings)
	{

		$this->data['title'] = !empty($this->data['title']) ? $this->data['title'] : $settings['site_title'];

		$this->data['desc']  = !empty($this->data['description']) ? $this->data['description'] : $settings['description'];

		$this->data['key']  = !empty($this->data['key']) ? $this->data['key'] : $settings['tags'];

		$this->data['ogimage'] = !empty($this->data['ogimage']) ? $this->data['ogimage'] : $settings['og_image'];
	}

	public function getSeoInfo($slug)
	{
		$seo 		= $this->core->get_seo_info($slug) ?? array();
		$settings 	= $this->settings;
		if (count($seo) > 0) {

			$this->data['title']  = !empty($seo['title']) ? $seo['title'] : $settings['site_title'];

			$this->data['desc']   = !empty($seo['description']) ? $seo['description'] : $settings['description'];

			$this->data['key']     = !empty($seo['keywords']) ? $seo['keywords'] : $settings['tags'];

			$this->data['ogimage'] = !empty($seo['image']) ? base_url($seo['image']) : base_url($settings['og_image']);

		}

		if (empty($this->data['ogimage'])) {
			$this->data['ogimage'] = $settings['og_image'];
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

	public function csrf()
	{
		$token 		 = strtoupper(md5(sha1(md5(sha1(md5(time() . rand(10, 999)))))));
		if (!isset($_POST['token']) && !isset($_GET['token'])) {
			$this->session->set_userdata('token', $token);
			$this->token = $token;
		} else {
			$this->token = isset($_SESSION['token']) ? $_SESSION['token'] : $token;
		}
		return $this->token;
	}


	public function varable_change_value()
	{
		$this->class 		= $this->router->fetch_class();
		$this->method		= $this->router->fetch_method();
		$this->table		= strtolower($this->router->fetch_class());
		$this->app 			= $this->uri->segment(1);
		$this->ip  			= GetIP();
	}

	public function info_msg($keyword, $value = null)
	{
		$content = $this->core->info_msg($keyword);
		if ($value != null) {
			return $content[$value];
		} else {
			return $content;
		}
	}

	public function sendMail($senddingmail, $subject, $message)
	{
		$config = array(
			'protocol' 	=> 'smtp',
			'smtp_host' 	=> 'smtp.hostinger.com',
			'smtp_port' 	=> 465, //587
			'smtp_user' 	=> 'noreply@kalizey.com',
			'smtp_pass' 	=> '2F3^8p6YLc[',
			'mailtype' 	=> 'html',
			'charset' 	=> 'utf-8',
			'newline' 	=> '\r\n',
			'smtp_crypto' => "ssl",
			'wordwrap' 	=> TRUE
		);
		$this->load->library('email', $config);
		$this->email->from('noreply@kalizey.com', $this->settings['site_title']);
		$this->email->to($senddingmail);
		$this->email->subject($subject);
		$this->email->message($message);

		if ($this->email->send()) {
			return true;
		} else {
			return $this->email->print_debugger(array('headers'));
		}
	}

	public function lang_init()
	{
		$this->countryCode = isset($_SERVER['HTTP_CF_IPCOUNTRY']) ? $_SERVER['HTTP_CF_IPCOUNTRY'] : null;

		$this->country 	   = $this->countryCode != null ? $this->core->get_country($this->countryCode) : [];

		$languages = $this->config->item("languages");
		if ($this->countryCode != null && lang_check($this->countryCode,$languages) && $this->uri->segment(1) == false) {
			$this->session->locale = $this->countryCode;
		}
		else{
			$this->session->locale 	= isset($this->session->locale) ? $this->session->locale : 'en';
			if ($this->uri->segment(1) != false) {
				if (lang_check($this->uri->segment(1), $languages)) {
					$this->session->locale = $this->uri->segment(1);
					$this->locale = $this->session->locale;
				}
			}
		}
		$this->locale 			= $this->session->locale;
	}


	public function titles()
	{
		$langs_array = array();
		$langs       = $this->core->get_titles();
		foreach ($langs as $key => $value) {
			$keyword = $value['keyword'];
			$title   = $value['title'];
			$langs_array[$keyword] = $title;
		}
		return $langs_array;
	}

	public function content()
	{
		$result = array();
		$content = $this->core->get_content();
		foreach ($content as $key => $value) {
			$result[$value['keyword']] = array(
				'title' => $value['title'],
				'desc' => $value['description']
			);
		}
		return $result;
	}
}
