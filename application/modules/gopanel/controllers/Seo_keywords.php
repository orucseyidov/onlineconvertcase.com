<?php defined('BASEPATH') or exit('No direct script access allowed');

class Seo_keywords extends Gopanel
{

	private $page_id;

	function __construct()
	{
		parent::__construct();
		$this->admin_control();
		$this->load->helper("filter");
		$this->load->helper("file_upload");
		$this->data['btitle']	= ' Açar sözlər';
		$this->page_id = isset($_GET['page_id']) ? $_GET['page_id'] : NULL;
		$this->data['other_groups'] = $this->gopanel->get_tools_others();
	}

	public function index()
	{
		$this->manage();
	}

	public function manage()
	{
		$this->data['datatable'] = true;
		$this->data['manage'] 	 = $this->gopanel->get_select_all($this->table);
		$this->render($this->table . '/manage', $this->data);
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

			redirect("/gopanel/{$this->table}/edit/?id={$id}");
		}

		$this->data['id'] 		= $id;
		$this->render($this->table . '/edit', $this->data);
	}
}
