<?php 

function get_translate_td($element){
	$locale 	= array("az"=>"Azərbaycan","ru"=>"По русски","en"=>"English");
	$editlink   = base_url("gopanel/product_translate/edit/?id={$element['id']}");
	$data = '<tr>';
	$data .= '<td>'.$element['id']++.'</td>';
	$data .= '<td>'.$element['title'].'</td>';
	$data .= '<td>'.strip_tags($element['description']).'</td>';
	$data .= '<td>'.$element['keywords'].'</td>';
	$data .= '<td>'.$locale[$element['locale']].'</td>';
	$data .= '
			<td style="text-align: center;">
		        <div class="manage">
		            <a class="btn btn-success" href="'.$editlink.'" data-toggle="tooltip" data-placement="top" title="Məlumatı Yenilə" ><i class="fas fa-edit"></i></a>
		            <a class="btn btn-success copy_product" unit_id="'.$element['id'].'" href="" data-toggle="tooltip" data-placement="top" title="Məlumatı Yenilə" >
		                <i class="far fa-copy"></i>
		            </a>
		            <a class="btn btn-danger delete" href="" unit_id="'.$element['id'].'" table_name="product_translate" data-toggle="tooltip" data-placement="top" title="Məlumatı Sil" ><i class="fas fa-trash-alt"></i>
		            </a>
		        </div>
		    </td>
	';
	$data .= '</tr>';
	return $data;
}


function country_ex($array,$id){
	foreach ($array as $key => $value) {
		if ($value['id'] == $id) {
			return $value['code'];
		}
	}
}


?>