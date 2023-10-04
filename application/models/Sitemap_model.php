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
		$this->db->where("slug !=","/");
		return $this->db->get()->result_array();
	}

	public function other_tools()
	{
		$this->db->select('*');
		$this->db->from('other_tools');
		return $this->db->get()->result_array();
	}
}
