<?php

// use LDAP\Result;

function debug($data, $type = false)
{
	echo "<pre>";
	$type == true ? var_dump($data) : print_r($data);
	echo "</pre>";
	exit();
}


function json($data,$object=false){
	header('Content-Type: application/json; charset=utf-8');
	$data = is_array($data) ? json_encode($data,$object) : $data;
	echo $data;
}

function file_get($url){
	$arrContextOptions=array(
	    "ssl"=>array(
	        "verify_peer"=>false,
	        "verify_peer_name"=>false,
	    ),
	);
	$response = file_get_contents($url, false, stream_context_create($arrContextOptions));
	return $response;
}


function s($key,$value){
	if ($key == $value) {
		return "selected";
	}
	else{
		return null;
	}
}



function hash_pass($pass)
{
	return md5(sha1(md5(sha1($pass))));
}




function GetIP(){
	if(getenv("HTTP_CLIENT_IP")) {
 		$ip = getenv("HTTP_CLIENT_IP");
 	} elseif(getenv("HTTP_X_FORWARDED_FOR")) {
 		$ip = getenv("HTTP_X_FORWARDED_FOR");
 		if (strstr($ip, ',')) {
 			$tmp = explode (',', $ip);
 			$ip = trim($tmp[0]);
 		}
 	} else {
 	$ip = getenv("REMOTE_ADDR");
 	}
	return $ip;
}

// function cut($str,$size=null,$start,$stop){
function cut($str, $start, $stop, $size = null)
{
	$size = $size == null ? 50 : $size;
	if (strlen($str) > $size) {
		$str = mb_substr($str, $start, $stop) . '...';
	}
	return $str;
}




function sanitize_output($buffer)
{

	$search = array(
		'/\>[^\S ]+/s',     // strip whitespaces after tags, except space
		'/[^\S ]+\</s',     // strip whitespaces before tags, except space
		'/(\s)+/s',         // shorten multiple whitespace sequences
		'/<!--(.|\s)*?-->/' // Remove HTML comments
	);

	$replace = array(
		'>',
		'<',
		'\\1',
		''
	);

	$buffer = preg_replace($search, $replace, $buffer);

	return $buffer;
}

function send_mail($senddingmail, $mailtitle, $subject, $content)
{
	$to = $senddingmail;
	$subject = $subject;
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
	$headers .= "From: info@goweb.az" . "\r\n" .
		"Reply-To: info@goweb.az" . "\r\n" .
		"X-Mailer: PHP/" . phpversion();
	$message = "<html><head>" .
		"<meta http-equiv='Content-Language' content='en-us'>" .
		"<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>" .
		"<title>{$mailtitle}</title>" .
		"</head><body>" . $content .
		"<br><br></body></html>";
	mail($to, $subject, $message, $headers);
}


function lang_check($lang, $languages)
{
	if (is_array($languages)) {
		foreach ($languages as $key => $value) {
			if ($value['locale'] == $lang) {
				return true;
			}
		}
	}
	return false;
}



function lang($key){
	$CI 		= get_instance();
	$lang 		= $CI->session->locale;
	$titles 	= $CI->config->item("langs");
	foreach ($titles as $keyForeach => $value) {
		if ($value['keyword'] == $key && $value['locale'] == $lang) {
			$key = $value['title'];
			break;
		}
	}
	return $key;
}

function content($key){
	$result = array(
		'title' => $key,
		'desc' => $key
	);
	$CI 		= get_instance();
	$lang 		= $CI->session->locale;
	$content 	= $CI->config->item("content");
	foreach ($content as $keyLoop => $value) {
		if ($value['keyword'] == $key && $value['locale'] == $lang) {
			$result = [
				'title' => $value['title'],
				'desc' 	=> $value['description']
			];
			break;
		}
	}
	return $result;
}




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


function get_lang($languages, $current)
{
	$result = [];
	foreach ($languages as $key => $value) {
		if ($value['locale'] == $current) {
			$result = $value;
		}
	}
	return $result;
}


function get_lang_url($current, $lang)
{
	$result = base_url($lang);
	$current_url = current_url();
	if (strstr($current_url, '/' . $current)) {
		$result = str_replace("/{$current}", "/{$lang}", $current_url);
	}
	return $result;
}


if (!function_exists("decode_text")) {
    function decode_text($text)
    {
        $text = str_replace("\n"," ",html_entity_decode(strip_tags($text)));
        $text = str_replace('"', '', $text);
        return $text;
    }
}

if (!function_exists("search_keywrods")) {
	function search_keywrods($keywords,$break = 5){
		$keywords = explode(",", $keywords);
        shuffle($keywords);
        $counter = 0;
        $result = '&lrm; ';
        foreach ($keywords as $key => $value){
        	$counter++;
        	$result .= ' <a href="'.base_url("search/?q={$value}").'">'.$value.'</a> ·';
        	if ($counter == $break)
        		break;
        }
    	return rtrim($result,' ·');
	}
}



