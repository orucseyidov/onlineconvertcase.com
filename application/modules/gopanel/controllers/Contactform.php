<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contactform extends Gopanel {
	

	
	function __construct(){
		parent::__construct();
		$this->admin_control();
		$this->load->helper("filter");
		$this->data['btitle']	= 'Əlaqə Formu';

	}

	public function index(){

		$this->manage();
	}


	public function manage(){
		$this->data['datatable'] = true;
		$this->data['manage'] 	 = $this->core->get_select_all($this->table);
		$this->render($this->table.'/manage',$this->data);
	}

	public function allread(){
		if ($this->gopanel->allread($this->table)) {
			$this->session->set_flashdata('success', "Bütün Mesajlar oxundu");
		}
		else{
			$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
		}
		redirect($this->app.$this->table."/manage/");
	}


	public function read(){
		$id 					= intval(filter($this->input->get('id',true)));
		$this->data['values'] 	= $this->core->get_values($this->table,$id);
		$this->data['id'] 		= $id;
		$this->render($this->table.'/read',$this->data);
		$this->gopanel->upadetData($this->table,$id,array("status" => 1));
	}


}
