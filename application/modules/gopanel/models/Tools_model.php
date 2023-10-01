<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tools_model extends GO_Model {


	function __construct(){
		parent::__construct();
	}


	public function get_groups(){
		$this->db->select("
			`tool_groups`.*,
			(SELECT COUNT(id) FROM other_tools WHERE group_id=tool_groups.id) as count_tools
		");
		$this->db->from("tool_groups");
		// debug($this->db->get_compiled_select());
		return $this->db->get()->result_array();
	}


	public function other_tools($group){
		$this->db->select("*");
		$this->db->from("other_tools");
		$this->db->where("group_id",$group);
		return $this->db->get()->result_array();
	}

}


