<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Statics extends Gopanel {
	

	
	function __construct(){
		parent::__construct();
		$this->admin_control();
		$this->load->helper("filter");
		$this->load->helper("file_upload");
		$this->table 			= $this->uri->segment(3);
		$this->data['table'] 	= $this->table;
		$this->data['class'] 	= $this->class;
		$this->data['id']		= 1;
		$this->id 				= 1;
		$this->data['bactive']	= 'Məlumatları yenilə';
	}

	public function index(){
		$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
		redirect(base_url("gopanel"));
	}


	public function error_404(){
		$this->render($this->class."/".$this->table,$this->data);
	}

	public function about(){
		$this->data['btitle']	= 'Haqqımızda';
		$this->data['values'] 	= $this->core->get_values($this->table,$this->id);
		if (isset($_POST['token'])) {
			if ($_POST['token'] == $this->token) {
				if (isset($_FILES['image']) && strlen($_FILES['image']['name'])>1) {
					$_POST['image'] = file_upload($_FILES['image'],'/uploads/images/statics/',$_POST['title_en']);
				}
				else{
					unset($_POST['image']);
				}
				unset($_POST['token']);
				if ($this->core->update($this->table,$this->id,$_POST)) {
					$this->session->set_flashdata('success', "Məlumat Uğurla Dəyişdirildi!");
					$this->data['values'] 	= $this->core->get_values($this->table,$this->id);
				}
				else{
					$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
				}
			// redirect($this->table."/edit/?id=".$id);
			}
			else{
				$this->session->set_flashdata('error', "Sistem xətası baş verdi. Səhifəni yeniləyib yenidən cəhd edin zəhmət olmasa");
			}
		}
		$this->render($this->class."/".$this->table);
	}

	public function home_video(){
		$this->data['btitle']	= 'Ana səhifə video';
		$this->data['values'] 	= $this->core->get_values($this->table,$this->id);
		if (isset($_POST['token'])) {
			if ($_POST['token'] == $this->token) {
				if (isset($_FILES['image']) && strlen($_FILES['image']['name'])>1) {
					$_POST['image'] = file_upload($_FILES['image'],'/uploads/images/statics/',$_POST['title_en']);
				}
				else{
					unset($_POST['image']);
				}
				unset($_POST['token']);
				if ($this->core->update($this->table,$this->id,$_POST)) {
					$this->session->set_flashdata('success', "Məlumat Uğurla Dəyişdirildi!");
					$this->data['values'] 	= $this->core->get_values($this->table,$this->id);
				}
				else{
					$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
				}
			// redirect($this->table."/edit/?id=".$id);
			}
			else{
				$this->session->set_flashdata('error', "Sistem xətası baş verdi. Səhifəni yeniləyib yenidən cəhd edin zəhmət olmasa");
			}
		}
		$this->render($this->class."/".$this->table);
	}



	public function settings(){
		$this->data['btitle']	= 'Əsas Ayarlar';
		$this->data['values'] 	= $this->core->get_values($this->table,$this->id);
		if (isset($_POST['token'])) {
			unset($_POST['token']);

			if (isset($_FILES['image']) && strlen($_FILES['image']['name'])>1) {
				$_POST['image'] = file_upload($_FILES['image'],'/uploads/images/statics/',$_POST['site_title']);
			}
			else{
				unset($_POST['image']);
			}

			if (isset($_FILES['logo_mobile']) && strlen($_FILES['logo_mobile']['name'])>1) {
				$_POST['logo_mobile'] = file_upload($_FILES['logo_mobile'],'/uploads/images/statics/',"logo_mobile".$_POST['site_title']);
			}
			else{
				unset($_POST['logo_mobile']);
			}

			if (isset($_FILES['og_image']) && strlen($_FILES['og_image']['name'])>1) {
				$_POST['og_image'] = file_upload($_FILES['og_image'],'/uploads/images/statics/',"og_image".$_POST['site_title']);
			}
			else{
				unset($_POST['og_image']);
			}

			if (isset($_FILES['favicon']) && strlen($_FILES['favicon']['name'])>1) {
				$_POST['favicon'] = file_upload($_FILES['favicon'],'/uploads/images/statics/',"favicon");
			}
			else{
				unset($_POST['favicon']);
			}

			if ($this->core->update($this->table,$this->id,$_POST)) {
				$this->session->set_flashdata('success', "Məlumat Uğurla Dəyişdirildi!");
				$this->data['values'] 	= $this->core->get_values($this->table,$this->id);
			}
			else{
				$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
			}
			// redirect($this->table."/edit/?id=".$id);
		}
		$this->render($this->class."/".$this->table);
	}

	public function offer(){
		$this->data['btitle']	= 'Təkliflər';
		$this->data['values'] 	= $this->core->get_values($this->table,$this->id);
		if (isset($_POST['token'])) {
			if ($_POST['token'] == $this->token) {
				
				unset($_POST['token']);
				if ($this->core->update($this->table,$this->id,$_POST)) {
					$this->session->set_flashdata('success', "Məlumat Uğurla Dəyişdirildi!");
					$this->data['values'] 	= $this->core->get_values($this->table,$this->id);
				}
				else{
					$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
				}
			// redirect($this->table."/edit/?id=".$id);
			}
			else{
				$this->session->set_flashdata('error', "Sistem xətası baş verdi. Səhifəni yeniləyib yenidən cəhd edin zəhmət olmasa");
			}
		}
		$this->render($this->class."/".$this->table);
	}

	public function contacts(){
		$this->data['btitle']	= 'Əlaqə Məlumatları';
		$this->data['values'] 	= $this->core->get_values($this->table,$this->id);
		if (isset($_POST['token'])) {
			if ($_POST['token'] == $this->token) {
				unset($_POST['token']);
				if ($this->core->update($this->table,$this->id,$_POST)) {
					$this->session->set_flashdata('success', "Məlumat Uğurla Dəyişdirildi!");
					$this->data['values'] 	= $this->core->get_values($this->table,$this->id);
				}
				else{
					$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
				}
				// redirect($this->table."/edit/?id=".$id);
			}
			else{
				$this->session->set_flashdata('error', "Sistem xətası baş verdi. Səhifəni yeniləyib yenidən cəhd edin zəhmət olmasa");
			}
		}
		$this->render($this->class."/".$this->table);
	}


	public function intro(){
		$this->data['btitle']	= ' Intro';
		$this->data['values'] 	= $this->core->get_values($this->table,$this->id);
		if (isset($_POST['token'])) {
			if (isset($_FILES['image']) && strlen($_FILES['image']['name'])>1) {
				$_POST['image'] = file_upload($_FILES['image'],'/uploads/images/statics/',"intro");
			}
			else{
				unset($_POST['image']);
			}
			unset($_POST['token']);
			if ($this->core->update($this->table,$this->id,$_POST)) {
				$this->session->set_flashdata('success', "Məlumat Uğurla Dəyişdirildi!");
				$this->data['values'] 	= $this->core->get_values($this->table,$this->id);
			}
			else{
				$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
			}
		}
		$this->render($this->class."/".$this->table);
	}

}
