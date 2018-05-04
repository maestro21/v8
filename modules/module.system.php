<?php class system extends mastercache  {

	function extend() {
		$this->description = 'Core module for setting up global settings';
	}

	public $fields;

	function fields() {
        return cache('settings');
    }

	
	function install() {
		$this->settings('general',[
			'sitename' => [ WIDGET_TEXT, 'default' => 'Maestro Engine v8'],
			'description' => [ WIDGET_TEXTAREA, 'default' => 'Website powered by Maestro Engine v8'],
			'theme' => [ WIDGET_TEXT, 'default' => 'maestro'], //TODO : select
			'defmodule' => [ WIDGET_TEXT, 'default' => 'pages'],
			'deflang' => [ WIDGET_TEXT, 'default' => 'en'],
		]);
		$this->settings('db_backup', [
			'db_last_backup' => [ WIDGET_TIME, 'default' => NULL],
			'db_backup_frequency' => [ WIDGET_TEXT, 'default' => '+1 day'],
		]);
	}

	
	function cache($data = NULL, $name = "settings_data") {
		return cache($name, $data);
	}


	function items() {
		return;
	}


	public $settings = null;
	function settings($key = null, $data = null) {		
		if($this->settings == null) {
			$this->settings = cache('settings');
		}
		if($data != null) {
			$this->settings[$key] = $data;
			cache('settings', $this->settings);
		}
		return $this->settings;
	}

	function save($row = null) { 
		$data = post('form'); 
		$this->cache($data);
		die();
	}


	function login() { 
		if(superAdmin()) redirect(BASE_URL);
	
		if($this->post) { 
			$this->parse = true;
			if(md5($_POST['pass']) == ADM_PASS){;	
				session('user', true);				
				echo json_encode(array('message' => T('success'), 'status' => 'ok', 'redirect' => BASE_URL));  die();
			}
			echo json_encode(array('message' => T('wrong pass'), 'status' => 'error', 'redirect' => BASE_URL));  die();
		}
	}

	function logout() {
		session('user',null);
		redirect(BASE_URL);		
	}

	/**
	 * return globals
	 */
	function globals() {
		return $this->cache();
	}	

}