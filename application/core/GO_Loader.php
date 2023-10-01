<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";
class GO_Loader extends MX_Loader {
	function __construct(){
		$this->otherClass();
	}



	public function loadClass(){

		// $core = $this->uri->segment(1);
		// $modules = $this->config->item("gomodule") == NULL ? array() : $this->config->item("gomodule");
		// if (in_array(strtolower($core), $modules)) {
		// 	$file = APPPATH."core/goweb/".ucfirst($core).".php";
		// 	if (file_exists($file)) {
		// 		spl_autoload_register();
		// 		@require_once $file;
		// 	}
		// }
		// return;
	}

	public function otherClass(){
		if ($this->uri->segment(1) == 'Gopanel' || $this->uri->segment(1) == 'gopanel') {
			spl_autoload_register();
			require_once APPPATH."core/goweb/Gopanel.php";
		}
	}

}