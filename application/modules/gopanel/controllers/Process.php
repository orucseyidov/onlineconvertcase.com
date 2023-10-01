<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends Gopanel {
	

	
	function __construct(){
		parent::__construct();
		$this->admin_control();
		$this->load->helper("filter");

	}

	public function index(){
		return false;
	}

	public function delete(){
		$id 		= intval(filter($this->input->post('id',true)));
		$table 		= $this->input->post('table',true);
		if ($this->gopanel->delete($table,$id)) {
			echo "1";
			if ($table == 'products') {
				$this->deleteProducts($id);
			}
		}
		else{
			echo "0";
		}
	}

	public function status(){ //status_change
		$data = array();
		$id 		= intval(filter($this->input->post('id',true)));
		$status 	= filter($this->input->post('status',true));
		$table 		= filter($this->input->post('table',true));
		$row 		= filter($this->input->post('dataROW',true));
		// debug($_POST);
		if (empty($id) && empty($table) && empty($row)) {
			$data['status'] = 'error';
			$data['title'] 	= 'Sistem Xətası';
			$data['msg'] 	= 'Sistem Xətası Baş verdi Zəhmət olmasa sistem adminstartoru ilə əlaqə saxlayın';
		}
		else{
			$status = $status == "true" ? 1 : 0;
			$update = array(
				$row => $status
			);
			if ($this->gopanel->status_change($table,$id,$update)) {
				$data['status'] = 'success';
				$data['title'] 	= 'Uğurlu Əməliyyat';
				$data['msg'] 	= 'Məlumat Uğurla dəyişdirildi';
			}
			else{
				$data['status'] = 'error';
				$data['title'] 	= 'Sistem Xətası';
				$data['msg'] 	= 'Sistem Xətası Baş verdi Zəhmət olmasa sistem adminstartoru ilə əlaqə saxlayın';
			}
		}

		echo json_encode($data);
	}


	public function sortable(){
		if (isset($_POST['table']) && isset($_POST['data'])) {
			$data  = $this->input->post('data');
			$table = $this->input->post('table');
			parse_str($data,$order);
			$items = $order['ord'];
			$query = "";
			foreach ($items as $rank => $id) {
				$this->core->myquery("UPDATE $table SET `rank`=$rank WHERE id=$id AND `rank`!=$rank"); 
			}
			echo 1;
		}
		else{
			echo 0;
		}
	}


	public function deleteProducts($product){
		$this->gopanel->delete_where("product_category",['product' => $product]);
		$this->gopanel->delete_where("product_delivery_countries",['product' => $product]);
		$this->gopanel->delete_where("product_parametr",['product' => $product]);
		$this->gopanel->delete_where("product_translate",['product' => $product]);
		$this->gopanel->delete_where("products",['parent' => $product]);
	}


}
