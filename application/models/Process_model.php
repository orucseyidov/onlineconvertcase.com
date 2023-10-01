<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Process_model extends GO_Model {

	function __construct(){
		parent::__construct();
	}

	public function insertData($table,$data){
		return $this->db->insert($table,$data);
	}

	public function upadetData($table,$id,$data){
		$this->db->where('id', $id);
	    $this->db->update($table, $data);
	    return true;
	}

	public function status_change($table,$id,$data){
		$this->db->where('id', $id);
	    $this->db->update($table, $data);
	    return true;
	}

	public function delete($table,$id){
		$this->db->where('id', $id);
		$this->db->delete($table);
		return true;
	}

	public function delete_doc($table,$id,$data){
		$this->db->where('id', $id);
	    $this->db->update($table, $data);
	    return true;
	}

	public function parent_folders($id){
        $this->db->select('id');
        $this->db->from('folders');
        $this->db->where("top_id",$id);
        return $this->db->get()->result_array();
    }

    public function get_result($search_id){
        $this->db->select('*');
        $this->db->from('search_results');
        $this->db->where("search_id", $search_id);
        return $this->db->get()->row_array();
    }


    public function upadetResult($id,$data){
		$this->db->where('id', $id);
	    $this->db->update("search_results", $data);
	    return true;
	}


	public function get_country($code){
        $this->db->select('*');
        $this->db->from('country');
        $this->db->where("code", $code);
        return $this->db->get()->row_array();
    }


    public function count_rating($ip,$device,$countryCode){
        $this->db->select('COUNT(id) as say');
        $this->db->from('rating');
        return $this->db->get()->row_array()['say'];
    }


    


}