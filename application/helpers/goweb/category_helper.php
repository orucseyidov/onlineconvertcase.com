<?php 


function category_view($id=0,$st=0,$select=null){

	$result = get_values_category($id);
	if (count($result) > 0) {
		foreach ($result as $key => $value) {
			$id    		= $value['id'];
			$title 		= str_repeat(' - ', $st).$value['title']; //&nbsp;
			$selected 	= in_array($id, explode(",", $select)) ? 'selected' : null;
			echo  		 "<option value='{$id}' {$selected}>{$title}</option>";
			category_view($id,$st+1,$select);
		}
	}
	else{
		return false;
	}
	
}


function get_values_category($parent){
	$CI =& get_instance();
	$CI->db->select('title,id,parent');
    $CI->db->from('category');
    $CI->db->where("parent",$parent);
    $CI->db->order_by("rank","ASC");
    return $CI->db->get()->result_array();
}


?>