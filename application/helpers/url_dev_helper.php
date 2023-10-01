<?php

	function url_for_pagination(){
		$current_url = current_url();
		$base_url = substr($current_url, strpos('?', $current_url)).'?';
		if(isset($_GET['filter'])){
			$filters = $_GET['filter'];
			foreach ($filters as $key => $value) {
				$base_url .= "filter[]"."=".$value."&";
			}
		}
		if(isset($_GET['price'])){
			$price = $_GET['price'];
			$base_url .= "price"."=".$price."&";
		}
		if(isset($_GET['q'])){
			$q = $_GET['q'];
			$base_url .= "q"."=".$q."&";
		}

		if(isset($_GET['brand'])){
			if (is_array($_GET['brand'])) {
				$filters = $_GET['brand'];
				foreach ($filters as $key => $value) {
					$base_url .= "brand[]"."=".$value."&";
				}
			}
			else{
				$brand = $_GET['brand'];
				$base_url .= "brand"."=".$brand."&";
			}
		}

		return $base_url;
		// return substr($base_url, 0,-1);

	}


	function url_for_sort(){
		$current_url = current_url();
		$base_url = substr($current_url, strpos('?', $current_url)).'?';
		if(isset($_GET['filter'])){
			$filters = $_GET['filter'];
			foreach ($filters as $key => $value) {
				$base_url .= "filter[]"."=".$value."&";
			}
		}
		if(isset($_GET['price'])){
			$price = $_GET['price'];
			$base_url .= "price"."=".$price."&";
		}
		if(isset($_GET['q'])){
			$q = $_GET['q'];
			$base_url .= "q"."=".$q."&";
		}

		if(isset($_GET['brand'])){
			if (is_array($_GET['brand'])) {
				$filters = $_GET['brand'];
				foreach ($filters as $key => $value) {
					$base_url .= "brand[]"."=".$value."&";
				}
			}
			else{
				$brand = $_GET['brand'];
				$base_url .= "brand"."=".$brand."&";
			}
		}


		if(isset($_GET['page'])){
			$page = $_GET['page'];
			$base_url .= "page"."=".$page."&";
		}

		return $base_url;
		// return substr($base_url, 0,-1);

	}

	function url_for_price(){
		$current_url = current_url();
		$base_url = substr($current_url, strpos('?', $current_url)).'?';
		if(isset($_GET['filter'])){
			$filters = $_GET['filter'];
			foreach ($filters as $key => $value) {
				$base_url .= "filter[]"."=".$value."&";
			}
		}
		if(isset($_GET['page'])){
			$page = $_GET['page'];
			$base_url .= "page"."=".$page."&";
		}
		if(isset($_GET['q'])){
			$q = $_GET['q'];
			$base_url .= "q"."=".$q."&";
		}
		

		return substr($base_url, 0,-1);
	}

	function params_for_filters(){
		$base_url = "&";
		if(isset($_GET['page'])){
			$page = $_GET['page'];
			$base_url .= "page"."=".$page."&";
		}

		if(isset($_GET['price'])){
			$price = $_GET['price'];
			$base_url .= "price"."=".$price."&";
		}
		if(isset($_GET['q'])){
			$q = $_GET['q'];
			$base_url .= "q"."=".$q."&";
		}
		if(isset($_GET['brand'])){
			if (is_array($_GET['brand'])) {
				$filters = $_GET['brand'];
				foreach ($filters as $key => $value) {
					$base_url .= "brand[]"."=".$value."&";
				}
			}
			else{
				$brand = $_GET['brand'];
				$base_url .= "brand"."=".$brand."&";
			}
		}

		return substr($base_url, 0,-1);
	}


	function url_for_brands(){
		$current_url = current_url();
		$base_url = substr($current_url, strpos('?', $current_url)).'?';
		if(isset($_GET['filter'])){
			$filters = $_GET['filter'];
			foreach ($filters as $key => $value) {
				$base_url .= "filter[]"."=".$value."&";
			}
		}
		if(isset($_GET['page'])){
			$page = $_GET['page'];
			$base_url .= "page"."=".$page."&";
		}
		if(isset($_GET['q'])){
			$q = $_GET['q'];
			$base_url .= "q"."=".$q."&";
		}
		if(isset($_GET['price'])){
			$price = $_GET['price'];
			$base_url .= "price"."=".$price."&";
		}

		return $base_url;
		// return substr($base_url, 0,-1);
	}



	function all_url_get(){
		return url_for_price();
	}
