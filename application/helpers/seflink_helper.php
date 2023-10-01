<?php 

function seflink($link_yap){
	$link_yap = trim($link_yap);
	$link_yap = html_entity_decode($link_yap, ENT_QUOTES, 'UTF-8'); // Html öğeleri karakterlere dönüştür
	$link_yap = str_replace('Ç','c', $link_yap);
	$link_yap = str_replace('ç','c', $link_yap);
	$link_yap = str_replace('Ğ','g', $link_yap);
	$link_yap = str_replace('ğ','g', $link_yap);
	$link_yap = str_replace('I','i', $link_yap);
	$link_yap = str_replace('ı','i', $link_yap);
	$link_yap = str_replace('İ','i', $link_yap);
	$link_yap = str_replace('Ö','o', $link_yap);
	$link_yap = str_replace('ö','o', $link_yap);
	$link_yap = str_replace('Ş','s', $link_yap);
	$link_yap = str_replace('ş','s', $link_yap);
	$link_yap = str_replace('Ü','u', $link_yap);
	$link_yap = str_replace('ü','u', $link_yap);
	$link_yap = str_replace('Ə','E', $link_yap);
	$link_yap = str_replace('ə','e', $link_yap);
	$link_yap = str_replace(' ','-',  $link_yap);
	$link_yap = preg_replace("@[^A-Za-z0-9\-_]+@i","",$link_yap); // A-Z, 0-9 ve "-" hariç tüm karakterleri kaldır
	$link_yap = str_replace('-----','-',$link_yap);
	$link_yap = str_replace('----','-',$link_yap);
	$link_yap = str_replace('---','-',$link_yap);
	$link_yap = str_replace('--','-', $link_yap);
	$link_yap = str_replace('--','-', $link_yap);
	$link_yap = strtolower($link_yap);
	$link_yap = trim($link_yap,'-');
	return $link_yap;
}

?>