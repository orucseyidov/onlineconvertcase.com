<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap_model extends GO_Model {


	public function __construct(){
		parent::__construct();
	}


	/* Start Sitemap area */
	public function menu()
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where("status",1);
		$this->db->where("slug !=","/");
		return $this->db->get()->result_array();
	}

	public function other_tools()
	{
		$this->db->select('slug');
		$this->db->from('other_tools');
		$this->db->where("status",1);
		return $this->db->get()->result_array();
	}

	public function seo_pages()
	{
		$this->db->select('slug');
		$this->db->from('static_pages');
		$this->db->where("status", 1);
		$this->db->where("type", 2);
		return $this->db->get()->result_array();
	}
}
