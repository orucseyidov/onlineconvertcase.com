<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap_model extends GO_Model {


	public function __construct(){
		parent::__construct();
	}


	/* Start Sitemap area */
	public function menu()
	{
		$this->db->select('*');
		$this->db->from('static_pages');
		$this->db->where("type", 1);
		return $this->db->get()->result_array();
	}

	public function pages()
	{
		$this->db->select('*');
		$this->db->from('static_pages');
		$this->db->where("type", 2);
		return $this->db->get()->result_array();
	}


	public function seo_pages()
	{
		$this->db->select('*');
		$this->db->from('seo_pages');
		return $this->db->get()->result_array();
	}
}
