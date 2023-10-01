<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tool_groups extends Gopanel
{

	function __construct()
	{
		parent::__construct();
		$this->admin_control();
		$this->load->helper("filter");
		$this->load->model("Tools_model","tools");
		$this->data['btitle']	= 'Alətlər Qrupu';
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
		$this->data['manage'] 	 = $this->tools->get_groups();
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
}
