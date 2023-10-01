<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends GO_Model {


	public function __construct(){
		// $this->load->library('database');
		parent::__construct();
	}


	public function count_downloads($download_type){
		$this->db->select('COUNT(id) as say');
        $this->db->from('search_downloads');
        $this->db->where("type",$download_type);
        return $this->db->get()->row_array()['say'];
	}



	public function search_links($limit=10){
		$this->db->select('
			search_links.*,
			country.name,
			country.flag
		');
        $this->db->from('search_links');
        $this->db->join("country","country.code=search_links.country_code","LEFT");
        $this->db->order_by("search_links.id","DESC");
        $this->db->limit($limit);
        return $this->db->get()->result_array();
	}

}


?>