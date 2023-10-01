<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends Gopanel {
	
	function __construct(){
		parent::__construct();
		$this->admin_control();
		$this->load->helper("filter");
		$this->load->helper("seflink");
		$this->load->helper("file_upload");
		$this->data['btitle']	= ' Mesajlar';
		// $this->table = "contactForm";
	}

	public function index(){

		$this->manage();
	}

	public function manage(){
		$this->data['datatable'] = true;
		$this->data['manage'] 	 = $this->gopanel->get_messages();
		// debug($this->data['manage']);
		$this->render($this->table.'/manage',$this->data);
	}

	public function details($id){
		$this->core->update("messages",$id,['status' => 1]);
		$this->data['message'] = $this->gopanel->get_message_by_id($id);
		// debug($this->data['message']);
		$this->render($this->table.'/details',$this->data);
	}
	public function no_read($id){
		$this->core->update("messages",$id,['status' => 0]);
		redirect("/gopanel/{$this->table}/manage");
	}
	public function read($id){
		$this->core->update("messages",$id,['status' => 1]);
		redirect("/gopanel/{$this->table}/manage");
	}
}