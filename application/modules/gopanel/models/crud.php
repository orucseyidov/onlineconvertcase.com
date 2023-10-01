<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends GO_Model {


	public function __construct(){
		// $this->load->library('database');
		parent::__construct();
		
	}

	/* Crud Area */
	public function add_post($table, $array){

		$columns = '';
		$values = '';

		$noFilter = array();
		if(isset($array['nofilter'])){
			$noFilterString = $array['nofilter'];
			unset($array['nofilter']);
			$noFilter = explode(',', $noFilterString);
		}

		foreach($array as $key=>$val){

			if($key == 'sent'){
				continue;
			}
			
			// if( !is_numeric(array_search($key, $noFilter)) || array_search($key, $noFilter)<0 ){
			// 	$key = $this->security_filter($key);
			// 	$val = $this->security_filter($val);
			// }
			
			$val = addslashes($val);

			$columns .= "`".$key."`,";
			$values .= "'".$val."',";
		}

		$columns = substr($columns, 0, -1);
		$values = substr($values, 0, -1);

		$sql = "INSERT INTO `{$table}` ({$columns}) VALUES ({$values})";

		//echo $sql;

		$result = $this->db->query($sql);

		return $result;
	}

	public function edit_post($table, $array, $id){

		$update_string = '';

		$noFilter = array();
		if(isset($array['nofilter'])){
			$noFilterString = $array['nofilter'];
			unset($array['nofilter']);
			$noFilter = explode(',', $noFilterString);
		}

		foreach($array as $key=>$val){

			if($key == 'sent'){
				continue;
			}

			if($key == 'password'){
				if(empty($val)){
					continue;
				}
			}

			if ($key != 'image') {
				$val = filter(addslashes($val));
			}
			
			$update_string .= "`".$key."`='".$val."',";
		}

		$update_string = substr($update_string, 0, -1);

		$sql = "UPDATE `{$table}` SET {$update_string} WHERE id='{$id}'";

		//echo $sql;

		$result = $this->db->query($sql);

		return $result;
	}

	public function delete_post($table, $id){
		$sql_get_data = "SELECT * FROM `{$table}` WHERE id='{$id}'";

		$query_get_data = $this->query($sql_get_data);
		$qgd = $this->fetch($query_get_data);
		
		if(isset($qgd['image'])){
			if( file_exists($_SERVER['DOCUMENT_ROOT'].$qgd['image']) ){
				unlink($_SERVER['DOCUMENT_ROOT'].$qgd['image']);
			}
		}

		if(isset($qgd['icone'])){
			if( file_exists($_SERVER['DOCUMENT_ROOT'].$qgd['icone']) ){
				unlink($_SERVER['DOCUMENT_ROOT'].$qgd['icone']);
			}
		}
		
		$sql = "DELETE FROM `{$table}` WHERE id='{$id}'";

		$query = $this->query($sql);

		if($query){
			return true;
		}
		else {
			return false;
		}
	}
}

?>