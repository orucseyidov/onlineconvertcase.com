<?php defined('BASEPATH') or exit('No direct script access allowed');

class Lang extends Gopanel
{

	function __construct()
	{
		parent::__construct();
		$this->admin_control();
		$this->load->helper("filter");
		$this->load->helper("file_upload");
		$this->data['btitle']	= ' Ən çox verilən suallar';
	}

	public function index(){
		$result = ['status' => false];
		if (isset($_GET['lang'])) {
			$lang = $_GET['lang'];
			$languages = $this->config->item("languages");
			if (lang_check($lang, $languages)) {
				$this->session->locale = $lang;
				$this->locale = $this->session->locale;
				$result['status'] = 'success';
			}
		}
		json($result);
	}

	
}
