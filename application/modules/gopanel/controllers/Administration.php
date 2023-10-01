<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends Gopanel {
	

	
	function __construct(){
		parent::__construct();
		$this->admin_control();
		$this->load->helper("filter");
		$this->load->helper("file_upload");
		$this->data['btitle']	= 'İstifadəçilər';

	}

	public function index(){
		$this->manage();
	}

	public function add(){
		// core
		if (isset($_POST['token'])) {
			unset($_POST['token']);
			
			$_POST['image'] 	  	= file_upload($_FILES['image'],'/uploads/images/'.$this->table.'/',$_POST['fullname']);
			$_POST['password'] 	= hash_pass($_POST['password']);

			if ($this->core->add($this->table,$_POST)) {
				$this->session->set_flashdata('success', "Məlumat Uğurla Əlavə edildi");
			}
			else{
				$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
			}
			redirect($this->app."/".$this->table."/add/");
		}

		$this->render($this->table.'/add',$this->data);
	}

	public function manage(){
		$this->data['datatable'] = true;
		$this->data['manage'] 	 = $this->core->get_select_all($this->table);
		$this->render($this->table.'/manage',$this->data);
	}

	public function edit(){
		$id 					= intval(filter($this->input->get('id',true)));
		$this->data['values'] 	= $this->core->get_values($this->table,$id);

		if (isset($_POST['token'])) {
			unset($_POST['token']);

			if (isset($_FILES['image']) && strlen($_FILES['image']['name'])>1) {
				$_POST['image'] = file_upload($_FILES['image'],'/uploads/images/'.$this->table.'/',$_POST['fullname']);
			}
			else{
				unset($_POST['image']);
			}

			if (isset($_POST['password'])) {
				$_POST['password'] 	= hash_pass($_POST['password']);
			}
			else{
				unset($_POST['password']);
			}

			if ($this->core->update($this->table,$id,$_POST)) {
				$this->session->set_flashdata('success', "Məlumat Uğurla Dəyişdirildi!");
				$this->data['values'] 	= $this->core->get_values($this->table,$id);
			}
			else{
				$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
			}
			redirect($this->app."/".$this->table."/edit/?id=".$id);
		}

		$this->data['id'] 		= $id;
		$this->render($this->table.'/edit',$this->data);
	}


	public function permissions(){
		$this->load->helper("permissions");
		$this->data['conrollorName'] 	= conrollorName();
		$id 							= intval(filter($this->input->get('id',true)));
		$this->data['this_user'] 		= $this->core->get_values($this->table,$id);
		$this->data['permissions']		= json_decode($this->data['this_user']['permissions']);
		$this->render($this->table.'/permissions',$this->data);
	}


	public function change_permissions(){
		$data = array();
		if (isset($_POST['token'])) {

			$permissions 	= json_encode($this->input->post('permissions',true));
			$user_id 	 	= $this->input->post('user_id',true);
			$update 		= array("permissions"=>$permissions);

			if ($this->core->update($this->table,$user_id,$update)) {
				$data['status'] = 'success';
				$data['msg']	= "Məlumat Uğurla dəyişdirildi";
			}
			else{
				$data['status'] = 'error';
				$data['msg']	= "Sistem xətası baş verdi zhmət olmasa yenidən yoxlayın!";
			}
		}else{
			$data['status'] = 'error';
			$data['msg']	= "Sistem Xətası baş verdi Zəhmət olmasa səhifəni yeniləyib yenidən yoxlayın.!";
		}

		echo json_encode($data);
	}

	public function profile(){
		$id 					= intval(filter($this->input->get('id',true)));
		if ($id == $this->data['user']['id']) {
			$this->data['values'] 	= $this->core->get_values($this->table,$id);

			if (isset($_POST['token'])) {
				unset($_POST['token']);

				if (isset($_FILES['image']) && strlen($_FILES['image']['name'])>1) {
					$_POST['image'] = file_upload($_FILES['image'],'/uploads/images/'.$this->table.'/',$_POST['fullname']);
				}
				else{
					unset($_POST['image']);
				}

				if (isset($_POST['password'])) {
					$_POST['password'] 	= hash_pass($_POST['password']);
				}
				else{
					unset($_POST['password']);
				}

				if ($this->core->update($this->table,$id,$_POST)) {
					$this->session->set_flashdata('success', "Məlumat Uğurla Dəyişdirildi!");
					$this->data['values'] 	= $this->core->get_values($this->table,$id);
				}
				else{
					$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
				}
				redirect($this->app."/".$this->table."/profile/?id=".$id);
			}

			$this->data['id'] 		= $id;
			$this->render($this->table.'/profile',$this->data);
		}
		else{
			$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
			redirect(base_url("gopanel"));
		}
	}


}
