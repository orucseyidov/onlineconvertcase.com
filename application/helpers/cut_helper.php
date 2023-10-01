<?php 

function cut($str,$size=null,$start,$stop){

	$size = $size == null ? 50 : $size;
	
	if(strlen($str) > $size){
		$str = substr($str, $start, $stop).'[...]';
	}

	return $str;
}
?>