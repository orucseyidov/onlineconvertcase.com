<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Banners extends Gopanel {
	
	function __construct(){
		parent::__construct();
		$this->admin_control();
		$this->load->helper("filter");
		$this->load->helper("file_upload");
		$this->data['btitle']	= ' Reklamlar';
	}

	public function index(){

		$this->manage();
	}

	public function add(){
		// core
		if (isset($_POST['token'])) {
			unset($_POST['token']);

			$_POST['image'] = file_upload($_FILES['image'],'/uploads/images/'.$this->table.'/',$_POST['slug']);

			if ($this->core->add($this->table,$_POST)) {
				$this->session->set_flashdata('success', "Məlumat Uğurla Əlavə edildi");
			}
			else{
				$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
			}
			redirect($this->app."/".$this->table."/add/");
		}

		$this->data['positions'] = $this->core->get_select_all("positions");
		$this->render($this->table.'/add',$this->data);
	}

	public function manage(){
		$this->data['datatable'] = true;
		$this->data['manage'] 	 = $this->gopanel->get_select_all($this->table);
		$this->render($this->table.'/manage',$this->data);
	}

	public function edit(){
		$id 					= intval(filter($this->input->get('id',true)));
		$this->data['values'] 	= $this->core->get_values($this->table,$id);

		if (isset($_POST['token'])) {
			unset($_POST['token']);

			if (isset($_FILES['image']) && strlen($_FILES['image']['name'])>1) {
				$img = seflink($_POST['title_az']);
				$_POST['image'] = image_upload($_FILES['image'],'/uploads/images/'.$this->table.'/',$img);
			}
			else{
				unset($_POST['image']);
			}

			if ($this->core->update($this->table,$id,$_POST)) {
				$this->session->set_flashdata('success', "Məlumat Uğurla Dəyişdirildi!");
				$this->data['values'] 	= $this->core->get_values($this->table,$id);
			}
			else{
				$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
			}
			
			$this->data['positions'] = $this->core->get_select_all("positions");
			redirect("/gopanel/{$this->table}/edit/?id={$id}");
		}
		$this->data['id'] 		= $id;
		$this->data['positions'] = $this->core->get_select_all("positions");
		$this->render($this->table.'/edit',$this->data);
	}
}