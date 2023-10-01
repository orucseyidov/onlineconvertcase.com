<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Gopanel {
	

	
	function __construct(){
		parent::__construct();
		$this->load->helper("filter");
		$this->data['btitle']	= 'Auth';
		

	}

	public function index(){
		// return false;
		debug("SALAM");
	}


	public function login(){
		if (isset($this->session->admin) && $this->session->admin) {
			redirect(base_url("gopanel"));
		}
		// debug(hash_pass(12345));
		$this->load->view("auth/login",$this->data);

	}


	public function login_procces(){
		$data = array();
		if (isset($_POST['token']) && !empty($_POST['token'])) {
			$username = filter($this->input->post('username',true));
			$password = filter($this->input->post('password',true));
			if (!empty($username) && !empty($password)) {
				$user = $this->gopanel->get_user_control($username,hash_pass($password));
				if (isset($user['id']) && $user['id'] > 0) {
					if ($user['status'] == 1) {
						$this->session->admin = $user['id'];
						$data['status'] = 'success';
						$data['msg'] 	= 'Uğurla daxil oldunuz əsas səhifəyə yönləndirilirsiniz.';
					}
					else{
						$name 			= $user['fullname'];
						$data['status'] = 'error';
						$data['msg'] 	= '<b> '.$name.' </b> sizin sitemə girişiniz administrator tərəfindən qadağan edilmişdir.';
					}
				}
				else{
					$data['status'] = 'error';
					$data['msg'] 	= 'Belə bir istifadəçi mövcud deyil zəhmət olmasa e-poçtunuzu və şifrənizi yenidən yoxlayasınız.';
				}
			}
			else{
				$data['status'] = 'error';
				$data['msg'] 	= 'Məlumatlar boş göndərilə bilməz!';
			}
		}
		else{
			$data['status'] = 'error';
			$data['msg'] 	= 'Sistem xətası baş verdi.';
		}

		echo json_encode($data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect("/gopanel/login");
	}



}
