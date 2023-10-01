<?php 

require_once(BASEPATH . 'database/DB.php');
$db =& DB();
$config['languages'] = $db->get('titles')->result_array() ?? [];
$db->close();


?>