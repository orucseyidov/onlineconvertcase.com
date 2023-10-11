<?php defined('BASEPATH') or exit('No direct script access allowed');

class Common_contents extends Gopanel
{
	private $page_id,$table_name;

	function __construct()
	{
		parent::__construct();
		$this->admin_control();
		$this->load->helper("filter");
		$this->load->helper("file_upload");
		$this->data['btitle']	= ' Statik səhifələr';
		$this->page_id 		= isset($_GET['page_id']) ? $_GET['page_id'] : NULL;
		$this->table_name 	= isset($_GET['t_name']) ? $_GET['t_name'] : NULL;
		$this->data['page_id'] = $this->page_id;
		$this->data['table_name'] = $this->table_name;
	}

	public function index()
	{
		$this->manage();
	}

	public function add()
	{
		// core
		if (isset($_POST['token'])) {
			unset($_POST['token']);


			if (isset($_FILES['image']) && strlen($_FILES['image']['name']) > 1) {
				$img = seflink($_POST['title']);
				$_POST['image'] = file_upload($_FILES['image'], '/uploads/images/' . $this->table . '/', $img);
			}
			else{
				$_POST['image'] = NULL;
			}


			$_POST['table_name'] = $_POST['t_name'];
			unset($_POST['t_name']);

			if ($this->core->add($this->table, $_POST)) {
				$this->session->set_flashdata('success', "Məlumat Uğurla Əlavə edildi");
			} else {
				$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
			}
			redirect("{$this->app}/{$this->table}/add/?page_id={$_POST['page_id']}&t_name={$_POST['table_name']}");
		}

		$this->render($this->table . '/add', $this->data);
	}

	public function manage()
	{
		$control = $this->gopanel->get_common_content($this->page_id,$this->table_name);
		if (isset($control['id'])) {
			redirect("/gopanel/{$this->table}/edit/?id={$control['id']}&page_id={$control['page_id']}&t_name={$control['table_name']}");
		} else {
			redirect("{$this->app}/{$this->table}/add/?page_id={$this->page_id}&t_name={$this->table_name}");
		}
		
		$this->data['datatable'] = true;
		$this->data['manage'] 	 = $this->gopanel->get_common_contents($this->page_id, $this->table_name);
		$this->render($this->table . '/manage', $this->data);
	}

	public function edit()
	{
		$id 					= intval(filter($this->input->get('id', true)));
		$values 				= $this->core->get_values($this->table, $id);
		$this->data['values'] 	= $values;

		if (isset($_POST['token'])) {
			unset($_POST['token']);

			if (isset($_FILES['image']) && strlen($_FILES['image']['name']) > 1) {
				$img = seflink($_POST['title']);
				$_POST['image'] = image_upload($_FILES['image'], '/uploads/images/' . $this->table . '/', $img);
			} else {
				unset($_POST['image']);
			}

			if ($this->core->update($this->table, $id, $_POST)) {
				$this->session->set_flashdata('success', "Məlumat Uğurla Dəyişdirildi!");
				$this->data['values'] 	= $this->core->get_values($this->table, $id);
			} else {
				$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
			}

			redirect("/gopanel/{$this->table}/edit/?id={$id}&page_id={$values['page_id']}&t_name={$values['table_name']}");
		}

		$this->data['id'] 		= $id;
		$this->render($this->table . '/edit', $this->data);
	}

	public function copy()
	{
		$id 					= intval(filter($this->input->get('id', true)));
		$this->data['values'] 	= $this->core->get_values($this->table, $id);

		if (isset($_POST['token'])) {
			unset($_POST['token']);

			if (isset($_FILES['image']) && strlen($_FILES['image']['name']) > 1) {
				$img = seflink($_POST['title']);
				$_POST['image'] = file_upload($_FILES['image'], '/uploads/images/' . $this->table . '/', $img);
			}

			if ($this->core->add($this->table, $_POST)) {
				$this->session->set_flashdata('success', "Məlumat Uğurla Əlavə edildi");
			} else {
				$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
			}
			redirect($this->app . "/" . $this->table . "/manage");
		}

		$this->data['id'] 		= $id;
		$this->render($this->table . '/copy', $this->data);
	}
}
