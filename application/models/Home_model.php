<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends GO_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function advantages()
	{
		$this->db->select('*');
		$this->db->from("advantages");
		$this->db->limit(3);
		$this->db->where("locale", $this->locale);
		$this->db->order_by("rank", "ASC");
		return $this->db->get()->result_array();
	}

	public function faq()
	{
		$this->db->select('*');
		$this->db->from("faq");
		$this->db->where("locale", $this->locale);
		$this->db->order_by("rank", "ASC");
		return $this->db->get()->result_array();
	}


	public function other_tool_groups()
	{
		$this->db->select("
			`tool_groups`.*,
			common_contents.title
		");
		$this->db->from("tool_groups");
		$this->db->join('common_contents','common_contents.page_id = tool_groups.id','left');
		$this->db->where("common_contents.table_name", "tool_groups");
		$this->db->where("common_contents.locale", $this->locale);
		$this->db->order_by("tool_groups.rank", "ASC");
		return $this->db->get()->result_array();
	}


	public function other_tools()
	{
		$this->db->select("
			`other_tools`.*,
			common_contents.title
		");
		$this->db->from("other_tools");
		$this->db->join('common_contents','common_contents.page_id = other_tools.id','left');
		$this->db->where("common_contents.table_name", "other_tools");
		$this->db->where("common_contents.locale", $this->locale);
		$this->db->order_by("other_tools.rank", "ASC");
		return $this->db->get()->result_array();
	}

	public function get_other_tool($slug)
	{
		$this->db->select("
			`other_tools`.*,
			common_contents.title,
			common_contents.description,
			common_contents.keywords,
			common_contents.image
		");
		$this->db->from("other_tools");
		$this->db->join('common_contents','common_contents.page_id = other_tools.id','left');
		$this->db->where("common_contents.table_name", "other_tools");
		$this->db->where("common_contents.locale", $this->locale);
		$this->db->where("other_tools.slug", $slug);
		return $this->db->get()->row_array();
	}


	
}
