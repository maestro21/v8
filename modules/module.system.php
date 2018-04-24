<?php class system extends mastercache  {

	function extend() {
		$this->description = 'Core module for setting up global settings';
	}

	function fields() {
        return [
            'name' 		=> [ WIDGET_TEXT ],
            'value' 	=> [ WIDGET_TEXT ],
        ];
    }

	
	function install() {
		include('data/default.globals.php'); 
		foreach($globals as $k => $v) {
			$item = array(
				'name'		=> $k,
				'value'		=> $v,
			);
			$this->push($item);
		}
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
		$ret = [];
		$data = $this->cache();
		foreach($data as $row) {
			$ret[$row['name']] = $row['value'];
		}
		return $ret;
	}	

}