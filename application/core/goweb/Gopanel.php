<?php defined('BASEPATH') or exit('No direct script access allowed');



class Gopanel extends MX_Controller
{

	protected $data = array();
	protected $app;
	protected $class;
	protected $method;
	protected $table;
	protected $tokent;
	protected $bactive;
	public $locale;

	function __construct()
	{
		parent::__construct();
		$this->load->model("Core", "core");
		$this->load->model("Gopanel_model", "gopanel");
		$this->load->helper("all");
		$this->change_varable();
		$this->locale = isset($_SESSION['locale']) ? $_SESSION['locale'] : 'en';
		$this->data = array(
			"app" 			=> $this->app,
			"token" 		=> $this->token,
			"class" 		=> $this->class,
			"method"		=> $this->method,
			"table"			=> $this->class,
			"title"			=> $this->settings['site_title'],
			"logo"			=> '',
			"footerdata"	=> '',
			"headdata"		=> '',
			"bactive"		=> '',
			"locale"		=> ['en'],
			"counter" 		=> 1,
			"admin_lang"	=> $this->locale,
			"locale"		=> $this->locale,
			"languages"		=> $this->config->item("languages"),
			"current_locale" => get_lang($this->config->item("languages"), $this->locale)
		);
		$this->data['front'] 	= $this->config->item("front") == NULL ? array() : $this->config->item("front");

		if ($this->uri->segment(3) != FALSE) {
			$this->load->helper("breadcrumb");
			$this->bactive 			= breadcrumb_helper($this->uri->segment(3));
			$this->data["bactive"] 	= $this->bactive;
		} else {
			$this->bactive 			= "Gopanel";
		}
	}


	public function render($view, $data = null)
	{

		$settings         				= $this->settings;
		$this->data['languages']		= $this->config->item('languages');
		$this->data['altlink'] 			= false;
		$this->data['footerdata']   	= !isset($data['footerdata']) ? '' : $data['footerdata'];
		$this->data['headdata'] 		= !isset($data['headdata']) ? '' : $data['headdata'];
		$this->data['settings'] 		= $settings;
		$this->data['scripts'] 			= "";
		// ob_start("sanitize_output");

		$this->load->view("blocks/head", $this->data);
		$this->load->view("blocks/header", $this->data);
		$this->load->view($view);
		$this->load->view("blocks/footer");
		// ob_end_flush();
	}


	public function change_varable()
	{
		$this->load->helper("all");
		$this->class 			= $this->router->fetch_class();
		$this->method			= $this->router->fetch_method();
		$this->table			= strtolower($this->router->fetch_class());
		$this->app 				= $this->uri->segment(1);
		$this->token();
		$this->settings 		= $this->get_siet_settings();
	}


	public function control_module($module, $method)
	{
		$permissions = json_decode($this->data['personal']['permissions']);
		if (!isset($permissions->$module->$method)) {
			$this->redirect_x();
		}
	}

	public function redirect_x($msg = null)
	{
		$this->load->library('user_agent');
		$this->session->set_flashdata('info', $msg != null ? "Sizin bu bölməyə icazəniz yoxdur!" : $msg);
		if ($this->agent->is_referral()) {
			redirect($this->agent->referrer());
		} else {
			redirect("/gopanel/");
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

	public function get_siet_settings()
	{
		return $this->core->getSiteSettings();
	}

	public function admin_control()
	{
		if (!isset($this->session->admin) && !($this->session->admin > 0)) {
			$this->session->set_flashdata('info', "Sessia vaxtı bitdi...");
			redirect("/gopanel/login");
		} else {
			$this->data['user'] 	= $this->core->get_values("administration", $this->session->admin);
		}
	}


	function get_category($id = 0, $st = 0, $select = null)
	{
		$result = $this->gopanel->get_category($id);
		$data   = '';
		if (count($result) > 0) {
			foreach ($result as $key => $value) {
				$id    		= $value['id'];
				$title 		= str_repeat(' - ', $st) . $value['title']; //&nbsp;
				$selected 	= $id == $select ? 'selected' : null;
				$data 		.= "<option value='{$id}' {$selected}>{$title}</option>";
				$this->get_category($id, $st + 1, $select);
			}
		} else {
			return $data;
		}

		return $data;
	}


	public function info_msg($keyword, $value, $lang = 'az')
	{
		$content = $this->core->info_msg($keyword, $lang);
		return $content[$value];
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


	public function send_mail($senddingmail, $mailtitle, $subject, $content)
	{
		$to = $senddingmail;
		$subject = $subject;
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
		$headers .= "From: info@goweb.az" . "\r\n" .
			"Reply-To: info@goweb.az" . "\r\n" .
			"X-Mailer: PHP/" . phpversion();
		$message = "<html><head>" .
			"<meta http-equiv='Content-Language' content='en-us'>" .
			"<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>" .
			"<title>{$mailtitle}</title>" .
			"</head><body>" . $content .
			"<br><br></body></html>";
		mail($to, $subject, $message, $headers);
	}
}
