<?php 

function breadcrumb_helper($key){
	$array = array(
		"add" 			=> "Əlavə et",
		"edit" 			=> "Yenilə",
		"read" 			=> "Oxu",
		"all" 			=> "Bütün Cədvəl",
		"permissions" 	=> "İcazələr",
		"manage" 		=> "Bütün Siyahı"
	);
	if (array_key_exists($key, $array)) {
	    return $array[$key];
	}
	else{
		return "Təyin Olunmayıb";
	}
}

?>