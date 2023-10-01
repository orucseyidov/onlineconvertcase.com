<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Gopanel {
	

	
	function __construct(){
		parent::__construct();
		$this->admin_control();
		$this->load->helper("filter");
		$this->load->helper("seflink");
		$this->load->helper("file_upload");
		$this->data['btitle']		= ' Galereya';
		$this->data['size'] 		= $this->input->get("size",true);
	}

	public function index(){

		$this->manage();
	}

	public function add(){
		if (isset($_GET['parent']) && !empty($_GET['parent']) && isset($_GET['section']) && !empty($_GET['section'])) {
			
			$this->data['parent']	= $this->input->get("parent",true);
			$this->data['section']	= $this->input->get("section",true);

			$this->render($this->table.'/add',$this->data);
		}
		else{
			$this->session->set_flashdata('info', "Sistem Xətası Baş verdi. Zəhmət olmasa yenidən cəhd edin");
			redirect("/gopanel/");
		}
	}

	public function manage(){

		if (isset($_GET['parent']) && !empty($_GET['parent']) && isset($_GET['section']) && !empty($_GET['section'])) {
			
			$this->data['parent']	= $this->input->get("parent",true);
			$this->data['section']	= $this->input->get("section",true);
			$this->data['gallery'] 	= $this->gopanel->get_gallery($this->data['parent'],$this->data['section']);

			$this->render($this->table.'/manage',$this->data);
		}
		else{
			$this->session->set_flashdata('info', "Sistem Xətası Baş verdi. Zəhmət olmasa yenidən cəhd edin");
			redirect("/gopanel/");
		}
	}

	public function edit(){
		$id 					= intval(filter($this->input->get('id',true)));
		$this->data['values'] 	= $this->core->get_values($this->table,$id);
		$section 				= $this->data['values']['section'];
		$parent 				= $this->data['values']['parent'];
		$image 					= $this->data['values']['image'];
		if (isset($_POST['token'])) {
			unset($_POST['token']);
			
			if (isset($_FILES['image']) && strlen($_FILES['image']['name'])>1) {
				$_POST['image'] = file_upload($_FILES['image'],"/uploads/gallery/{$section}/");
				if (is_file($_SERVER['DOCUMENT_ROOT'].$image)) {
					unlink($_SERVER['DOCUMENT_ROOT'].$image);
				}
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
			redirect($this->app."/".$this->table."/edit/?id=".$id);
		}
		$this->data['id'] 		= $id;
		$this->data['parent'] 	= $parent;
		$this->data['section'] 	= $section;
		$this->render($this->table.'/edit',$this->data);
	}


	public function upload(){

		if (isset($_POST['token'])) {
			$parent 	= $this->input->post("parent");
			$section 	= $this->input->post("section");
			$image 		= file_upload($_FILES['file'],"/uploads/gallery/{$section}/");
			if (isset($image) && !empty($image)) {
				$insertArray = array(
					"parent"	=> $parent,
					"section" 	=> $section,
					"image" 	=> $image,
				);
				if ($this->core->add($this->table,$insertArray)) {
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}


	public function deleteall(){
		$data = array();
		if (isset($_POST['id'])) {
			$id 	  = $_POST['id'];
			$images   = $this->gopanel->all_delted_images($id);

			if ($this->gopanel->delete_in($this->table,$id)) {
				$data['status'] 	= 'success';
				$data['title'] 		= 'Uğurlu əməliyyat!';
				$data['msg']		= 'Seçdikləriniz uğurla silindi!!!';
				$data['deleted'] 	= $id;
				foreach ($images as $key => $value) {
					if (is_file($_SERVER['DOCUMENT_ROOT'].$value['image'])) {
						unlink($_SERVER['DOCUMENT_ROOT'].$value['image']);
					}
				}
			}
			else{
				$data['status'] = 'error';
				$data['title'] 	= 'Xəta !';
				$data['msg']	= 'Sistem xətası baş verdi zəhmət olmasa səhifəni yeniləyib yenidən yoxlayın';
			}
		}
		else{
			$data['status'] = 'error';
			$data['title'] 	= 'Xəta !';
			$data['msg']	= 'Sistem xətası baş verdi zəhmət olmasa səhifəni yeniləyib yenidən yoxlayın';
		}

		echo json_encode($data);
	}

	public function delete(){
		$id 		= intval(filter($this->input->post('id',true)));
		$table 		= $this->input->post('table',true);
		$image   	= $this->gopanel->all_delted_images($id);

		if ($this->gopanel->delete($table,$id)) {
			if (isset($image[0]['image'])) {
				if (is_file($_SERVER['DOCUMENT_ROOT'].$image[0]['image'])) {
					unlink($_SERVER['DOCUMENT_ROOT'].$image[0]['image']);
				}
			}
			echo $id;
		}
		else{
			echo "0";
		}
	}


}
