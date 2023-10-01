<?php defined('BASEPATH') or exit('No direct script access allowed');

class Content extends Gopanel
{

	function __construct()
	{
		parent::__construct();
		$this->admin_control();
		$this->load->helper("filter");
		$this->data['btitle']	= 'Əsas Kontent';
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
			if ($this->core->add($this->table, $_POST)) {
				$this->session->set_flashdata('success', "Məlumat Uğurla Əlavə edildi");
			} else {
				$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
			}
			redirect($this->app . "/" . $this->table . "/add/");
		}

		$this->render($this->table . '/add', $this->data);
	}

	public function manage()
	{
		$this->data['datatable'] = true;
		$this->data['manage'] 	 = $this->gopanel->get_select_all($this->table, "*", null, $this->locale);
		$this->render($this->table . '/manage', $this->data);
	}

	public function edit()
	{
		$id 					= intval(filter($this->input->get('id', true)));
		$this->data['values'] 	= $this->core->get_values($this->table, $id);

		if (isset($_POST['token'])) {
			unset($_POST['token']);

			if ($this->core->update($this->table, $id, $_POST)) {
				$this->session->set_flashdata('success', "Məlumat Uğurla Dəyişdirildi!");
				$this->data['values'] 	= $this->core->get_values($this->table, $id);
			} else {
				$this->session->set_flashdata('error', "Sistem xətası baş verdi.");
			}
			redirect($this->app . "/" . $this->table . "/edit/?id=" . $id);
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
