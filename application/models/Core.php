<?php defined('BASEPATH') or exit('No direct script access allowed');

class Core extends GO_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getSiteSettings()
	{
		$this->db->select('*');
		$this->db->from('settings');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_seo_info($page)
	{
		$this->db->select('*');
		$this->db->from('seo_settings');
		$this->db->where("page", $page);
		$this->db->where("locale", $this->locale);
		$query  = $this->db->get();
		return $query->row_array();
	}

	public function contact()
	{
		$this->db->select('*');
		$this->db->from('contacts');
		$query  = $this->db->get();
		return $query->row_array();
	}

	public function social()
	{
		$this->db->select('*');
		$this->db->from('social');
		return $this->db->get()->result_array();
	}


	public function keyword()
	{
		$this->db->select('*');
		$this->db->from('seo_keywords');
		$this->db->order_by('rand()');
		$this->db->limit(rand(10,15));
		return $this->db->get()->result_array();
	}

	public function menu()
	{
		$this->db->select('name,slug');
		$this->db->from('menu');
		$this->db->where("status", 1);
		$this->db->where("locale", $this->locale);
		return $this->db->get()->result_array();
	}


	public function info_msg($keyyword){
		$this->db->select("title as title, description as desc");
		$this->db->from("info_msg");
		$this->db->where(array("keyword" => $keyyword, "locale" => $this->locale));
		return $this->db->get()->row_array();
	}

	public function get_all_for_locale($table, $select = null)
	{
		$this->db->select($select == null ? '*' : $select);
		$this->db->from($table);
		$this->db->where("locale", $this->locale);
		$this->db->order_by("id", "DESC");
		return $this->db->get()->result_array();
	}

	public function limit_in_home($table, $limit)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($limit);
		$this->db->where("$table.status", 1);
		$this->db->where("$table.locale", $this->locale);
		$this->db->order_by("$table.id", "DESC");
		return $this->db->get()->result_array();
	}

	public function get_banner($slug)
	{
		$this->db->select('*');
		$this->db->from("banners");
		$this->db->where('position', $slug);
		$this->db->where('status', 1);
		$this->db->order_by('id', "RANDOM");
		$query  = $this->db->get();
		return $query->row_array();
	}


	public function get_country($code){
        $this->db->select('*');
        $this->db->from('country');
        $this->db->where("code", $code);
        return $this->db->get()->row_array();
    }

    public function get_rating($ip,$device,$countryCode){
        $this->db->select('*');
        $this->db->from('rating');
        $this->db->where("ip", $ip);
        $this->db->where("device", $device);
        $this->db->where("country_code", $countryCode);
        return $this->db->get()->row_array();
    }


    public function count_rating(){
        $this->db->select('COUNT(id) as say');
        $this->db->from('rating');
        return $this->db->get()->row_array()['say'];
    }

    public function avg_rating(){
        $this->db->select('AVG(rating) as avg_rtaing');
        $this->db->from('rating');
        return $this->db->get()->row_array()['avg_rtaing'];
    }

}
