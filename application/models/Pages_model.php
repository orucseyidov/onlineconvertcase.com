<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pages_model extends GO_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function about($locale)
	{
		$this->db->select('
			title,description
		');
		$this->db->from("about");
		$this->db->where("about.locale", $locale);
		return $this->db->get()->row_array();
	}

	public function faq($locale)
	{
		$this->db->select('
			id,question,answer
		');
		$this->db->from("faq");
		$this->db->where("faq.locale", $locale);
		$this->db->where("faq.page_id", NULL);
		$this->db->order_by("rank","ASC");
		return $this->db->get()->result_array();
	}

	public function get_static_page($locale, $slug)
	{
		$this->db->select('*');
		$this->db->from('static_pages');
		$this->db->where("static_pages.status", 1);
		$this->db->where("static_pages.locale", $locale);
		$this->db->where("static_pages.slug", $slug);
		$this->db->order_by("static_pages.id", "DESC");
		return $this->db->get()->row_array();
	}
}
