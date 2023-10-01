<?php

	function getIp() {
		// return "176.99.71.126";
	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
	        return $_SERVER['HTTP_CLIENT_IP']; 
	    } 
	    else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
	        return $_SERVER['HTTP_X_FORWARDED_FOR']; 
	    } 
	    else { 
	        return $_SERVER['REMOTE_ADDR']; 
	    } 
	} 
  

	function getCountryByIp(){
		$ip = getIp();
		$_SESSION['ip'] = $ip;

		// $ip = "172.14.42.167";
		// $ip = "46.146.243.188"; //rus ip
  
		// Use JSON encoded string and converts 
		// it into a PHP variable 
		$ipInfo = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
		// $ipInfo = @json_decode(file_get_contents("https://ipapi.co/" . $ip . "/json/"));

		// print_r($ipInfo);
		// exit();
		return $ipInfo->geoplugin_countryCode ?? "others";
	}


	function getGeoData($geoDataArray){
		$countryCode 	= strtolower(getCountryByIp());
		$geoData 	= in_array($countryCode,array_keys($geoDataArray))
					? $geoDataArray[$countryCode]
					: $geoDataArray['others'];

		return $geoData;
	}

// exit();
