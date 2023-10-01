<?php 

function order_parametrs($parametr,$lang = 'en'){
	$CI =& get_instance();
	$CI->db->select("
		id,title_{$lang} as title,type
	");
    $CI->db->from('parametr_value');
    $CI->db->where_in("id",explode(",", $parametr));
    $result =  $CI->db->get()->result_array();
    $data 	= '';
    foreach ($result as $key => $value) {
    	if ($value['type'] == 1) {
            $data .= '<span>'.$value['title'].'</span> <br>';
        }
        else if ($value['type'] == 2) {
            $data .= '<span class="cartColor" style="background:'.$value['title'].'">&nbsp;</span> <br>';
        }
    	else{
    		$data .= '<span>'.$value['title'].'</span> <br>';
    	}
    }
    return $data;
}

?>