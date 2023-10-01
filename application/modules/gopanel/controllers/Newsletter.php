<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends Gopanel {
	

	
	function __construct(){
		parent::__construct();
		$this->admin_control();
		$this->data['btitle']	= ' Brendlər';
	}

	public function index(){

		$this->manage();
	}


	public function manage(){
		$this->data['datatable'] = true;
		$this->data['manage'] 	 = $this->core->get_select_all($this->table);
		$this->render($this->table.'/manage',$this->data);
	}


}
