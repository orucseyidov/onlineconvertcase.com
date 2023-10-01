<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pages_model extends GO_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_category($table, $slug)
	{
		$this->db->select('
			title_' . $this->locale . ' as title,
			id,slug
		');
		$this->db->from($table);
		$this->db->where(array("status" => 1, "slug" => $slug));
		return $this->db->get()->row_array();
	}

	public function menu_by_slug($slug)
	{
		$this->db->select('
			name
		');
		$this->db->from('menu');
		$this->db->where(array("status" => 1, "slug" => $slug, "locale" => $this->locale));
		$query  = $this->db->get();
		return $query->row_array();
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
