<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gopanel_model extends GO_Model {


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

	public function update_cat_par($table,$id,$updatedata) {
	    $this->db->where('category', $id);
	    $this->db->update($table, $updatedata);
	    return true;
	}


	public function status_change($table,$id,$data){
		$this->db->where('id', $id);
	    $this->db->update($table, $data);
	    return true;
	}

	public function sortable($table,$data){
	    $this->db->update($table, $data);
	    return true;
	}

	public function delete($table,$id){
		$this->db->where('id', $id);
		$this->db->delete($table);
		return true;
	}

	public function delete_where($table,$where){
		$this->db->where($where);
		$this->db->delete($table);
		return true;
	}

	public function delete_in($table,$id){
		$this->db->where_in('id', $id);
		$this->db->delete($table);
		return true;
	}

	public function info_msg($keyyword,$lang) {
		$this->db->select("title_{$lang} as title, description_{$lang} as desc");
        $this->db->from("info_msg");
        $this->db->where("keyword",$keyyword);
        return $this->db->get()->row_array();
	}

	public function get_user_control($username,$password){
		$this->db->select('*');
        $this->db->from('administration');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        return $this->db->get()->row_array();
	}

	public function get_seo_settings($page=null, $locale = null){
		$this->db->select('
			seo_settings.*,
			
		');
		// menu.name as menu
        $this->db->from('seo_settings');
        if ($page != null) {
        	$this->db->where("seo_settings.page",$page);
		}
		if ($locale != null) {
			$this->db->where("seo_settings.locale", $this->locale);
		}
        // $this->db->join('menu','menu.slug=seo_settings.page','left');
        return $this->db->get()->result_array();
	}

	public function allread($table){
	    $this->db->update($table, array("status"=>1));
	    return true;
	}


	public function get_gallery($id,$table){
		$this->db->select('*');
        $this->db->from('gallery');
        $this->db->where("parent",$id);
        $this->db->where("section",$table);
        return $this->db->get()->result_array();
	}


	public function all_delted_images($id){
		$this->db->select('image,id');
        $this->db->from('gallery');
        $this->db->where_in("id",$id);
        return $this->db->get()->result_array();
        // print_r($this->db->get_compiled_select());
	}


	public function category_slug($id){
		$this->db->select('slug');
        $this->db->from("category");
        $this->db->where_in("id",$id);
        $query  = $this->db->get();
        return $query->row_array();
	}


	public function get_category($parent){
		$this->db->select('title,id,parent');
        $this->db->from('category');
        $this->db->where("parent",$parent);
        $this->db->order_by("rank","ASC");
        return $this->db->get()->result_array();
	}

	public function get_category_manage($parent){
		$this->db->select('
			category.*,
			(SELECT COUNT(id) FROM category cat WHERE cat.parent=category.id) as childs
		');
        $this->db->from('category');
        $this->db->where("parent",$parent);
        $this->db->order_by("rank","ASC");
        return $this->db->get()->result_array();
	}

	public function slider(){
		$this->db->select('*');
        $this->db->from('slider');
        $this->db->order_by("rank","ASC");
        return $this->db->get()->result_array();
	}

	public function browsing_carousel(){
		$this->db->select('*');
        $this->db->from('browsing_carousel');
        $this->db->order_by("rank","ASC");
        return $this->db->get()->result_array();
	}


	public function get_parametrs(){
		$this->db->select('title_az,id,key');
        $this->db->from('parametrs');
        return $this->db->get()->result_array();
	}


	public function get_orders(){
		$this->db->select('
			orders.*,
			users.fullname,
			countries.name as country,
			(SELECT COUNT(id) FROM order_details ord WHERE ord.order_id=orders.id) as productCount
		');
        $this->db->from('orders');
        $this->db->join("users","users.id=orders.user","left");
        $this->db->join("countries","countries.id=orders.country","left");
        $this->db->order_by("id","DESC");
        return $this->db->get()->result_array();
	}

	public function get_order($id){
		$this->db->select('
			orders.*,
			users.fullname,
			countries.name as country,
			(SELECT COUNT(id) FROM order_details ord WHERE ord.order_id=orders.id) as productCount
		');
        $this->db->from('orders');
        $this->db->join("users","users.id=orders.user","left");
        $this->db->join("countries","countries.id=orders.country","left");
        $this->db->where("orders.id",$id);
        $this->db->order_by("id","DESC");
        return $this->db->get()->row_array();
	}

	public function get_order_detail($id){
		$this->db->select('*');
        $this->db->from('order_details');
        $this->db->where("order_details.order_id",$id);
        $this->db->order_by("id","DESC");
        return $this->db->get()->result_array();
	}


	public function category_ads($category){
		$this->db->select('*');
        $this->db->from('category_ads');
        $this->db->where("category",$category);
        $this->db->order_by("id","DESC");
        return $this->db->get()->result_array();
	}

	public function get_category_main(){
		$this->db->select('*');
        $this->db->from('category');
        $this->db->where("parent",0);
        $this->db->order_by("id","DESC");
        return $this->db->get()->result_array();
	}

	public function get_delete_product_id($product){
		$this->db->select('*');
        $this->db->from('products');
        $this->db->where("parent",0);
        return $this->db->get()->row_array();
	}

	public function get_messages(){
		$this->db->select('*');
        $this->db->from('messages');
		$this->db->order_by("id","DESC");
        return $this->db->get()->result_array();
	}

	public function get_message_by_id($id){
		$this->db->select('*');
		$this->db->from('messages');
		$this->db->where("id",$id);
		$this->db->order_by("id","DESC");
        return $this->db->get()->row_array();
	}


	public function get_common_contents($page_id,$table_name){
		$this->db->select('*');
		$this->db->from('common_contents');
		$this->db->where("page_id",$page_id);
		$this->db->where("table_name",$table_name);
		$this->db->order_by("id","DESC");
        return $this->db->get()->result_array();
	}

	public function get_common_content($page_id,$table_name){
		$this->db->select('id');
		$this->db->from('common_contents');
		$this->db->where("page_id",$page_id);
		$this->db->where("table_name",$table_name);
		$this->db->order_by("id","DESC");
        return $this->db->get()->result_array();
	}


	public function get_tools_others(){
		$this->db->select('*');
		$this->db->from('other_tools');
		$this->db->order_by("id","DESC");
        return $this->db->get()->result_array();
	}


	public function get_faqs(){
		$this->db->select('
			faq.*,
			(SELECT name FROM other_tools WHERE id=faq.page_id) as page_name
		');
		$this->db->from('faq');
		$this->db->order_by("id","DESC");
        return $this->db->get()->result_array();
	}
}