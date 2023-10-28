<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pages_model extends GO_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function about($locale)
	{
		$this->db->select('
			title,description
		');
		$this->db->from("about");
		$this->db->where("about.locale", $locale);
		return $this->db->get()->row_array();
	}

	public function faq($locale)
	{
		$this->db->select('
			id,question,answer
		');
		$this->db->from("faq");
		$this->db->where("faq.locale", $locale);
		$this->db->where("faq.page_id", NULL);
		$this->db->order_by("rank","ASC");
		return $this->db->get()->result_array();
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


	public function other_tools_search($string,$locale='en')
	{
		$this->db->select("
			`other_tools`.slug,
			common_contents.meta_title,
			common_contents.meta_description,
		");
		$this->db->from("other_tools");
		$this->db->join('common_contents','common_contents.page_id = other_tools.id','left');
		$this->db->where("common_contents.table_name", "other_tools");
		$this->db->where("common_contents.locale", $this->locale);
		$this->db->where("other_tools.status", 1);
		$this->db->where("other_tools.slug !=", NULL);
		$this->db->like('common_contents.title', $string);
        $this->db->or_like('common_contents.description',$string);
        $this->db->or_like('common_contents.seo_title',$string);
        $this->db->or_like('common_contents.seo_description',$string);
        $this->db->or_like('common_contents.meta_title',$string);
        $this->db->or_like('common_contents.meta_description',$string);
        $this->db->or_like('common_contents.keywords',$string);
		$this->db->order_by("other_tools.rank", "ASC");
		return $this->db->get()->result_array();
	}

	public function other_tools_search_sql($string,$locale='en'){
		$sql = "
			SELECT
			    `other_tools`.slug,
			    common_contents.meta_title,
			    common_contents.meta_description,
			    common_contents.keywords
			FROM other_tools
			LEFT JOIN common_contents ON common_contents.page_id = other_tools.id
			WHERE common_contents.table_name = 'other_tools'
			AND common_contents.locale = '{$locale}'
			AND other_tools.status = 1
			AND other_tools.slug IS NOT NULL
			AND 
		";
		$sqlLike ='';
		foreach ($string as $key => $value) {
			$sqlLike .= "
				(common_contents.title LIKE '%{$value}%'
			     OR common_contents.description LIKE '%{$value}%'
			     OR common_contents.seo_title LIKE '%{$value}%'
			     OR common_contents.seo_description LIKE '%{$value}%'
			     OR common_contents.meta_title LIKE '%{$value}%'
			     OR common_contents.meta_description LIKE '%{$value}%'
			     OR common_contents.keywords LIKE '%{$value}%') OR ";
		}
		$sqlLike = rtrim($sqlLike, " OR");
		$sql .= "($sqlLike) ORDER BY other_tools.id RAND() ";
		return $this->db->query($sql)->result_array();
	}

	public function get_static_page_search($string,$locale='en')
	{
		$this->db->select('static_pages.meta_title,static_pages.meta_description,static_pages.slug');
		$this->db->from('static_pages');
		$this->db->where("static_pages.status", 1);
		$this->db->where("static_pages.type", 2);
		$this->db->where("static_pages.locale", $locale);
		$this->db->where("static_pages.slug !=", NULL);
		$this->db->like('static_pages.title', $string);
        $this->db->or_like('static_pages.description',$string);
        $this->db->or_like('static_pages.meta_title',$string);
        $this->db->or_like('static_pages.meta_description',$string);
        $this->db->or_like('static_pages.keywords',$string);
		$this->db->order_by("static_pages.id", "DESC");
		return $this->db->get()->result_array();
	}

	public function get_static_page_search_sql($string,$locale='en')
	{
		$sql = "
			SELECT static_pages.meta_title, static_pages.meta_description, static_pages.keywords, static_pages.slug
			FROM static_pages
			WHERE static_pages.status = 1
			AND static_pages.type = 2
			AND static_pages.locale = '{$locale}'
			AND static_pages.slug IS NOT NULL
			AND ";
		$sqlLike = '';
		foreach ($string as $key => $value) {
			$sqlLike .= "(static_pages.title LIKE '%{$value}%'
			     OR static_pages.description LIKE '%{$value}%'
			     OR static_pages.meta_title LIKE '%{$value}%'
			     OR static_pages.meta_description LIKE '%{$value}%'
			     OR static_pages.keywords LIKE '%{$value}%') OR";
		}
		$sqlLike = rtrim($sqlLike, " OR");
		$sql .= "($sqlLike) ORDER BY static_pages.id RAND() ";
		return $this->db->query($sql)->result_array();
	}

	public function get_keyword($string)
	{
		$this->db->select("*");
		$this->db->from("seo_keywords");
		$this->db->like('seo_keywords.keyword', $string);
		return $this->db->get()->row_array();
	}
}
