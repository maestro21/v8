<?php 

class langs extends masterdb {
	
	
	function tables() {
		return [
            $this->cl() => [
                'fields' => $this->fields(),
                'idx' => [
                    'abbr' => [ 'abbr' ],
                ],
            ],
		];	
	}
	
	function fields() {
		return [
			'abbr' => [ WIDGET_STRING, 'search' => TRUE],
			'name' => [	WIDGET_STRING, 'null' => TRUE ]	,
			'website' => [WIDGET_URL,  'null' => TRUE ],
			'active' => [ WIDGET_CHECKBOX, 'null' => TRUE],
		];
	}


		/** Save element **/
	public function save($row = null)  {  //die();
		$this->parse = FALSE;
		$ret = $this->saveDB($this->post['form']);
		$this->cache();
		return json_encode($ret);
	}

	public function install() {
		parent:: install();
		$this->saveDB(
			[
				'abbr' => 'en',
				'name' => 'English',
				'active' => 1
			]);
		$this->cache();	
	}
}