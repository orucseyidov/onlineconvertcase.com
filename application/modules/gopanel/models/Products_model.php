<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends GO_Model {


	function __construct(){
		parent::__construct();
	}


	public function get_products($param,$count=false){
        $this->db->select('*');
        $this->db->from('products');
        if (!empty($param['search'])) {
                $this->db->like('title', $param['search']);
                $this->db->or_like('slug',$param['search']);
                $this->db->or_like('price_azn',$param['search']);
                // $this->db->or_like('test',$param['search']);
        }
        if ($count == false) {
                if ($param['length'] != -1) {
                        $this->db->limit($param['length'],$param['start']);
                }
                $this->db->order_by("id","DESC");
                return $this->db->get()->result_array();
        }
        else{
                return $this->db->count_all_results();
        }
}
	
	public function update_product_cat($id,$updatedata) {
	    $this->db->where('product', $id);
	    $this->db->update("product_category", $updatedata);
	    return true;
	}
	
	public function get_parametrs(){
		$this->db->select('
			`parametrs`.*,
			(SELECT COUNT(id) FROM parametr_value pv WHERE pv.parametr=parametrs.id) as `values`
		');
        $this->db->from('parametrs');
        return $this->db->get()->result_array();
	}

	public function get_parametr_value($parametr){
		$this->db->select('*');
        $this->db->from('parametr_value');
        $this->db->where("parametr",$parametr);
        $this->db->order_by("rank","asc");
        return $this->db->get()->result_array();
	}

	// public function get_products(){
	// 	$this->db->select('*');
 //        $this->db->from('products');
 //        $this->db->where("parent",0);
 //        $this->db->order_by("id","DESC");
 //        return $this->db->get()->result_array();
	// }


	public function get_product_translate($product){
		$this->db->select('*');
        $this->db->from('product_translate');
        $this->db->where("product",$product);
        return $this->db->get()->result_array();
	}


	public function get_product_translte_single($id){
		$this->db->select('*');
        $this->db->from('product_translate');
        $this->db->where("id",$id);
        return $this->db->get()->row_array();
	}

	public function parametrs(){
		$this->db->select('id,title_az,key,type');
        $this->db->from('parametrs');
        return $this->db->get()->result_array();
	}

	public function parametr_values($id){
		$this->db->select('id,title_az,type');
        $this->db->from('parametr_value');
        $this->db->where("parametr",$id);
        return $this->db->get()->result_array();
	}
	

	public function product_parametr($product){
		$this->db->select('
			product_parametr.*,
			parametr_value.title_az as parametr_val,
			parametr_value.type as prametr_type
		');
        $this->db->from('product_parametr');
        $this->db->join("parametr_value","parametr_value.id=product_parametr.value_id","left");
        $this->db->where("product_parametr.product",$product);
        return $this->db->get()->result_array();
	}


	public function countries(){
		$this->db->select('*');
        $this->db->from('countries');
        return $this->db->get()->result_array();
	}

	public function countries_all_add(){
		$this->db->select('id,code');
        $this->db->from('countries');
        return $this->db->get()->result_array();
	}

	public function countries_all_control($product){
		$this->db->select('id');
        $this->db->from('product_delivery_countries');
        $this->db->where("product",$product);
        return $this->db->count_all_results();
	}


	public function product_countries($product){
		$this->db->select('
			countries.name as name,
			countries.code as code,
			product_delivery_countries.id as id
		');
        $this->db->from('product_delivery_countries');
        $this->db->join("countries","countries.id=product_delivery_countries.country","left");
        $this->db->where("product_delivery_countries.product",$product);
        return $this->db->get()->result_array();
	}

	public function get_parametr_image($parametr){
		$this->db->select('*');
        $this->db->from('parametr_images');
        $this->db->where("parametr",$parametr);
        return $this->db->get()->row_array();
	}

	public function updateParametrImage($table,$id,$updatedata) {
	    $this->db->where('parametr', $id);
	    $this->db->update($table, $updatedata);
	    return true;
	}


	public function get_product_category($product){
		$this->db->select('category');
        $this->db->from('product_category');
        $this->db->where("product",$product);
        $data = $this->db->get()->result_array();
        $result = array();
        foreach ($data as $key => $value) {
        	$result[] = $value['category'];
        }
        return $result;
	}


	public function delete_match($product,$match){
		$sql = "
			DELETE FROM product_category WHERE id IN 
			(select id from (select * from product_category) as scm where
			scm.product = {$product}
			and
			scm.category NOT IN ({$match}))
		";
		return $this->db->query($sql);
	}


	public function get_parametr_products($parent,$parametr){
		$this->db->select('*');
        $this->db->from('products');
        $this->db->where("parent",$parent);
        $this->db->where("parametr",$parametr);
        $this->db->order_by("id","DESC");
        return $this->db->get()->result_array();
	}


	public function get_product_values($product){
		$this->db->select('
			price_azn,discount_azn,
			price_usd,discount_usd,
			price_rub,discount_rub,
			video,title,slug,slug_en,slug_ru
		');
        $this->db->from('products');
        $this->db->where("id",$product);
        return $this->db->get()->row_array();
	}


	public function get_product_trasnlate_copy_data($product){
		$this->db->select('*');
        $this->db->from('product_translate');
        $this->db->where("product",$product);
        return $this->db->get()->result_array();
	}


	public function get_product_match_copy_data($product){
		$this->db->select('*');
        $this->db->from('product_category');
        $this->db->where("product",$product);
        return $this->db->get()->result_array();
	}

	public function get_product_param_copy_data($product){
		$this->db->select('
			product_parametr.*,
			(SELECT type FROM parametr_value WHERE parametr_value.id = product_parametr.value_id) as type
		');
        $this->db->from('product_parametr');
        $this->db->where("product",$product);
        return $this->db->get()->result_array();
	}

	public function product_delivery_countries($product){
		$this->db->select('*');
        $this->db->from('product_delivery_countries');
        $this->db->where("product",$product);
        return $this->db->get()->result_array();
	}


	public function get_colors(){
		$this->db->select('*');
        $this->db->from('parametr_value');
        $this->db->where("type",2);
        return $this->db->get()->result_array();
	}

	public function getNext(){
		$this->db->select('next');
        $this->db->from('products');
        $this->db->order_by("next","DESC");
        $result = $this->db->get()->row_array();
        return isset($result['next']) ? $result['next'] : 0;
	}


	public function get_order($id){
		$this->db->select('
			orders.*,
			users.fullname,
			users.email
		');
        $this->db->from('orders');
        $this->db->join("users","users.id=orders.user","left");
        $this->db->where("orders.id",$id);
        return $this->db->get()->row_array();
	}

	public function order_detail($id,$dil){
		$this->db->select('
			order_details.*,
			parametr_value.title_'.$dil.' as param
		');
        $this->db->from('order_details');
        $this->db->join("parametr_value","parametr_value.id=order_details.parametrs","left");
        $this->db->where("order_details.order_id",$id);
        return $this->db->get()->result_array();
	}

}


