<?php defined('BASEPATH') or exit('No direct script access allowed');

class Faq extends Gopanel
{

	private $page_id;

	function __construct()
	{
		parent::__construct();
		$this->admin_control();
		$this->load->helper("filter");
		$this->load->helper("file_upload");
		$this->data['btitle']	= ' Ən çox verilən suallar';
		$this->page_id = isset($_GET['page_id']) ? $_GET['page_id'] : NULL;
		$this->data['other_groups'] = $this->gopanel->get_tools_others();
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
			if (isset($_POST['page_id']) && (empty($_POST['page_id']) || is_null($_POST['page_id']))) {
				$_POST['page_id'] = NULL;
			}
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
		$this->data['manage'] 	 = $this->gopanel->get_faqs($this->page_id);
		$this->render($this->table . '/manage', $this->data);
	}

	public function edit()
	{
		$id 					= intval(filter($this->input->get('id', true)));
		$this->data['values'] 	= $this->core->get_values($this->table, $id);

		if (isset($_POST['token'])) {
			unset($_POST['token']);
			if (isset($_POST['page_id']) && (empty($_POST['page_id']) || is_null($_POST['page_id']))) {
				$_POST['page_id'] = NULL;
			}
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
