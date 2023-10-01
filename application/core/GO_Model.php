<?php



class GO_Model extends CI_Model
{


	public $locale;

	public function __construct()
	{
		parent::__construct();
		$this->lang_init();
	}



	public function lang_init()
	{

		$this->countryCode = isset($_SERVER['HTTP_CF_IPCOUNTRY']) ? $_SERVER['HTTP_CF_IPCOUNTRY'] : null;

		$languages = $this->config->item("languages");
		if ($this->countryCode != null && $this->lang_check(strtolower($this->countryCode),$languages) && $this->uri->segment(1) == false) {
			$this->session->locale = $this->countryCode;
		}
		else{
			$this->session->locale 	= isset($this->session->locale) ? $this->session->locale : 'en';
			if ($this->uri->segment(1) != false) {
				if ($this->lang_check($this->uri->segment(1), $languages)) {
					$this->session->locale = $this->uri->segment(1);
					$this->locale = $this->session->locale;
				}
			}
		}
		$this->locale 			= $this->session->locale;
	}


	public function lang_check($lang, $languages)
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

	function add($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	function add_last_id($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function myquery($sql)
	{
		return $this->db->query($sql);
	}

	public function update($table, $update, $updatedata)
	{
		$this->db->where(is_array($update) ? $update : array('id' => $update));
		$this->db->update($table, $updatedata);
		return true;
	}

	public function get_select($table, $select = null)
	{
		$this->db->select($select == null ? '*' : $select);
		$this->db->from($table);
		$query  = $this->db->get();
		return $query->result_array();
	}

	public function get_values($table, $condition, $select = null)
	{
		$this->db->select($select == null ? '*' : $select);
		$this->db->from($table);
		$this->db->where(is_array($condition) ? $condition : array('id' => $condition));
		$query  = $this->db->get();
		return $query->row_array();
	}

	public function get_select_all($table, $select = null, $limit = null, $locale = null, $orderby = null)
	{
		$this->db->select($select == null ? '*' : $select);
		$this->db->from($table);
		if ($limit != null) {
			$this->db->limit($limit);
		}
		if ($locale != null) {
			$this->db->where("locale", $this->locale);
		}
		if ($orderby != null) {
			$this->db->order_by("rank", "ASC");
		} else {
			$this->db->order_by("id", "DESC");
		}
		$this->db->order_by("id", "DESC");
		return $this->db->get()->result_array();
	}

	public function get_select_all_id($table, $id)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('id', $id);
		return $this->db->get()->result_array();
	}

	public function get_count($table, $row, $where = false)
	{
		$this->db->select($row);
		$this->db->from($table);
		if ($where != false) {
			$this->db->where($where);
		}
		return $this->db->count_all_results();
	}

	public function delete($table, $id)
	{
		$this->db->where('id', $id);
		$this->db->delete($table);
		return true;
	}

	public function get_titles()
	{
		$this->db->select('*');
		$this->db->from('titles');
		$this->db->where("locale", $this->locale);
		$query  = $this->db->get();
		return $query->result_array();
	}

	public function get_content()
	{
		$this->db->select('*');
		$this->db->from('content');
		$this->db->where("locale", $this->locale);
		$query  = $this->db->get();
		return $query->result_array();
	}

	public function view_update($table, $id)
	{
		$this->db->query("UPDATE `$table` SET `view` = view+1 WHERE `$table`.`id` ='$id'");
	}


	public function get_title_with_key($key)
	{
		$this->db->select('title');
		$this->db->from('titles');
		$this->db->where(array("keyword" => $key, "locale" => $this->locale));
		$query  = $this->db->get();
		return $query->row_array();
	}

	public function get_content_with_key($key)
	{
		$this->db->select('*');
		$this->db->from('content');
		$this->db->where(array("keyword" => $key, "locale" => $this->locale));
		$query  = $this->db->get();
		return $query->row_array();
	}
}
