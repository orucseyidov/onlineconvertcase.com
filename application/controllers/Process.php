<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends GO_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model("Process_model","process");
		$this->load->helper("filter");
	}

	public function index(){
		redirect(base_url());	
	}


	public function seed(){
		$sql 		= $_SERVER["DOCUMENT_ROOT"]."/change.sql";
		$sql_code 	= file_get($sql);
		if (strlen($sql_code) > 0) {
			$result = $this->core->myquery($sql_code);
		}
	}

	
	public function fetch(){
		$api 		= $this->config->item("api");
		$response 	= [
			'status' => 'error',
			'code'	 => 500,
			'message'=> ''
		];
		// debug(http_build_query($_POST));
		if (isset($_POST['token']) /*&& $_POST['token'] == $api['token'] */) {
			// $this->db->trans_start();
			try {
				$search_id = $this->core->add_last_id("search_links",[
					'link' 			=> $_POST['link'],
					'ip'   			=> GetIP(),
					'locale'		=> $this->locale,
					'device'		=> $this->device,
					'user_agent'	=> $_SERVER['HTTP_USER_AGENT'] ?? null,
					'country_code'	=> $this->countryCode,
					'country'		=> $this->country['name'] ?? null,
				]);
				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://bomtik.site/full/v2/index.php",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"token\"\r\n\r\n".$api['token']."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"link\"\r\n\r\n".$_POST['link']."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"search_id\"\r\n\r\n".$search_id."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
				  CURLOPT_HTTPHEADER => array(
				    "cache-control: no-cache",
				    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
				    "postman-token: 350eef05-c45e-ca5e-02dc-ee104518e420"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);
				$result_id = $this->add_response_search($response);
				if ($result_id > 0) {
					$response 				= json_decode($response,true);
					$response['result_id'] 	= $result_id;
					$response 				= json_encode($response);
				}
				// $this->db->trans_complete();
			
			} catch (Exception $e) {
				// $this->db->trans_rollback();
			}
		}
		else{
			$response['code'] 		= 503;
			$response['message']	= 'Token not found or not matching!';
			// $this->db->trans_rollback();
		}
		json($response);
	}

	public function add_response_search($response){
		if (isset($response) && !empty($response) && strlen($response) > 5) {
			try {
				$data = json_decode($response);
				if (isset($data->status)) {
					$this->db->trans_start();
					$status 	= $data->status ?? null;
					$search_id 	= $data->search_id ?? 0;
					$link 		= $data->link ?? null;
					$post_link 	= $data->post_link ?? null;
					$video_id 	= $data->video_id ?? null;
					$nickname 	= $data->nickname ?? null;
					$username 	= $data->username ?? null;
					$this->core->update("search_links",$search_id,[
						'status' 		=> $status == 'success' ? 1 : 2,
						'updated_at'	=> date("Y-m-d H:i:s")
					]);
					$add = $this->core->add_last_id("search_results",[
						'search_id' => $search_id,
						'status' 	=> $status,
						'link' 		=> $link,
						'post_link' => $post_link,
						'video_id' 	=> $video_id,
						"nickname" 	=> $nickname,
						"username" 	=> $username,
						"response"	=> $response
					]);
					$this->db->trans_complete();
					return $add;
				}
			} catch (Exception $e) {
				$this->db->trans_rollback();
			}
		}
	}


	public function download(){
		if (isset($_GET['link']) && isset($_GET['mim']) && isset($_GET['name'])) {
			$link 			= urldecode($_GET['link']);
			$mim 			= $_GET['mim'];
			$name 			= $_GET['name'];
			$mime_types 	= ['mp3','mp4','png','webp','jpeg'];
			$file_formats 	= [
				'mp3' 	=> 'audio/mpeg',
				'mp4' 	=> 'video/mp4',
				'png' 	=> 'image/png',
				'jpeg' 	=> 'image/jpeg',
				'webp' 	=> 'image/webp',
			];
			if (!empty($link) && !empty($mim) && !empty($name)) {
				// debug($_GET['search_id']);
				if (in_array($mim, $mime_types)) {
					header('Content-Type: '.$file_formats[$mim]);
			        // header('Content-Description: File Transfer');
			        header('Expires: 0');
    				header('Cache-Control: must-revalidate');
			        header('Content-Disposition: attachment; filename="' . $name . '.'.$mim.'"');
			        header("Content-Transfer-Encoding: Binary");
			        if (isset($_GET['search_id']) && isset($_GET['download_type'])) {
			        	$this->downloadCalculate($_GET['search_id'],$_GET['download_type']);
			        }
			        echo file_get("http://bomtik.site/download/index.php?link=".get_download_url($_GET));
			        exit();
			        // redirect("/");
				}
				else{
					// redirect("/");
				}
			}
			else{
				// redirect("/");
			}
		}
		else{
			// redirect("/");
		}
	}


	public function downloadCalculate($search_id,$download_type){
		if ($search_id > 0 && $download_type > 0) {
			try {
				$this->db->trans_start();
				$control = $this->process->get_result($search_id);
				if (isset($control['id']) && $control['id'] > 0) {
					$update = [
						'download' 		=> ($control['download'] + 1) ?? 1,
						'updated_at'	=> date("Y-m-d H:i:s")
					];
					$this->process->upadetResult($control['id'],$update);
					$this->core->update("search_links",$search_id,$update);
				}
				$this->core->add("search_downloads",[
					'search_id' 	=> $search_id,
					'type' 			=> $download_type,
					'count'			=> 1,
					'ip' 			=> GetIP(),
					'locale' 		=> $this->locale,
					'device'		=> $this->device,
					'country_code'	=> $this->countryCode,
					'country'		=> $this->country['name'] ?? null,
				]);
				$this->db->trans_complete();
			} catch (Exception $e) {
				$this->db->trans_rollback();
			}
		}
	}


	public function rating(){
		$response = [
			'status' => 'error','message' => 'System error occured!!!', 'code' => 500
		];
		if (isset($_POST['token']) && isset($_POST['rating']) && $_POST['rating'] > 0) {
			$rating 	= intval($_POST['rating']);
			$ratingList	= [1 => 5, 2 => 4, 3 => 3, 4 => 2, 5 => 1];
			$rating 	= $ratingList[$rating] ?? 5;
			$countrol  	= 0;//$this->process->control_rating($this->ip,$this->device,$this->countryCode);
			if ($rating > 0 && $countrol == 0) {
				$addRating = $this->core->add_last_id("rating",[
					'rating' 		=> $rating,
					'ip'   			=> $this->ip,
					'locale'		=> $this->locale,
					'device'		=> $this->device,
					'user_agent'	=> $_SERVER['HTTP_USER_AGENT'] ?? null,
					'country_code'	=> $this->countryCode,
					'country'		=> $this->country['name'] ?? null,
				]);
				if ($addRating > 0) {
					$response['status'] 	= 'success';
					$response['message'] 	= 'Thanks for voting. Thanks to your game, we will try to improve it even more.';
					$response['code'] 		= 200;
					$response['data']		= [
						'count'	=> $this->core->count_rating(),
						'avg'	=> number_format($this->core->avg_rating(),1)
					];
				}
			}
			else{
				$response['message'] = 'You have voted before';
			}
		}
		echo json($response);
	}


	

}
