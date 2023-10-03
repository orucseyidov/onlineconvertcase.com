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

	
	public function feedback(){
		$response = [
			'status' => 'error','message' => 'System error occured!!!', 'code' => 500
		];
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		    $data 		= json_decode(file_get_contents('php://input'), true);
			$rating 	= intval($data['rate']);
			$comment 	= intval($data['comment']);
			$ratingList	= [1 => 5, 2 => 4, 3 => 3, 4 => 2, 5 => 1];
			$rating 	= $ratingList[$rating] ?? 5;
			$countrol  	= 0;//$this->process->control_rating($this->ip,$this->device,$this->countryCode);
			if ($rating > 0 && $countrol == 0) {
				$addRating = $this->core->add_last_id("rating",[
					'rating' 		=> $rating,
					'comment' 		=> empty($comment) ? NULL : $comment,
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
			json($response);
		}
	}

	

	public function recommend(){
		$response = [
			'status' => 'error','message' => 'System error occured!!!', 'code' => 500
		];
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		    $data 		= json_decode(file_get_contents('php://input'), true);
			$fullname 	= $data['fullname'];
			$email 		= $data['email'] ?? NULL;
			$comment 	= $data['comment'];
			$checkForm 	= $data['checkForm'] ?? false;
			if (!empty($fullname) && !empty($comment)) {
				$add = $this->core->add_last_id("recommend",[
					'fullname'	 	=> $fullname,
					'email'	 		=> empty($email) ? NULL : $email,
					'comment'	 	=> $comment,
					'checkForm'	 	=> $checkForm,
					'ip'   			=> $this->ip,
					'locale'		=> $this->locale,
					'device'		=> $this->device,
					'user_agent'	=> $_SERVER['HTTP_USER_AGENT'] ?? null,
					'country_code'	=> $this->countryCode,
					'country'		=> $this->country['name'] ?? null,
				]);
				$response['status'] 	= 'success';
				$response['message'] 	= 'Thanks for voting. Thanks to your game, we will try to improve it even more.';
				$response['code'] 		= 200;
			}
			json($response);
		}
	}


	

}
