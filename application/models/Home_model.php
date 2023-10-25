<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends GO_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function home_about_blocks()
	{
		$this->db->select('*');
		$this->db->from("home_about_blocks");
		$this->db->where("locale", $this->locale);
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
		$this->db->where("tool_groups.status", 1);
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
		$this->db->where("other_tools.status", 1);
		$this->db->order_by("other_tools.rank", "ASC");
		return $this->db->get()->result_array();
	}

	public function get_other_tool($slug)
	{
		$this->db->select("
			`other_tools`.*,
			common_contents.title,
			common_contents.description,
			common_contents.seo_title,
			common_contents.seo_description,
			common_contents.meta_title,
			common_contents.meta_description,
			common_contents.keywords,
			common_contents.image
		");
		$this->db->from("other_tools");
		$this->db->join('common_contents','common_contents.page_id = other_tools.id','left');
		$this->db->where("common_contents.table_name", "other_tools");
		$this->db->where("common_contents.locale", $this->locale);
		$this->db->where("other_tools.slug", $slug);
		$this->db->where("other_tools.status", 1);
		return $this->db->get()->row_array();
	}


	public function faq($page_id)
	{
		$this->db->select('
			id,question,answer
		');
		$this->db->from("faq");
		$this->db->where("faq.locale", $this->locale);
		$this->db->where("faq.page_id", $page_id);
		$this->db->order_by("rank","ASC");
		return $this->db->get()->result_array();
	}


	public function usefull_links()
	{
		$this->db->select('title,meta_description,slug,id');
		$this->db->from("static_pages");
		$this->db->where("locale", $this->locale);
		$this->db->where("status", 1);
		$this->db->where("type", 2);
		return $this->db->get()->result_array();
	}


	public function other_info($id){
		$this->db->select("
			common_contents.id,
			common_contents.title,
			common_contents.description,
		");
		$this->db->from("other_tools");
		$this->db->join('common_contents','common_contents.page_id = other_tools.id','left');
		$this->db->where("common_contents.table_name", "other_tools_other_info");
		$this->db->where("common_contents.locale", $this->locale);
		$this->db->where("common_contents.page_id", $id);
		return $this->db->get()->result_array();
	}

	
}
