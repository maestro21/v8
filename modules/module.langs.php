<?php 

class langs extends basecache {
	
	
	
	function fields() {
		return [
			'lang_widget' => [ WIDGET_ARRAY,
				'children' => [
					'fullname' => [ WIDGET_CHECKBOX ],
					'show_flag' => [ WIDGET_CHECKBOX ],
					'dropdown' => [ WIDGET_CHECKBOX ]
				]
			],
			'langs' => [ WIDGET_TABLE, 
				'children' => [
					'abbr' => [ WIDGET_TEXT, 'search' => TRUE],
					'name' => [	WIDGET_TEXT, 'null' => TRUE ]	,
					'website' => [WIDGET_URL,  'null' => TRUE ],
					'active' => [ WIDGET_CHECKBOX, 'null' => TRUE],
				],
			],
			'i18n' => [ WIDGET_TABLE, 
				'children' => [
					'abbr' => [ WIDGET_TEXT ],
					'label' => [	WIDGET_TEXTAREA, 'multilang' => TRUE ]
				],


			]
		];
	}


    /** Save element **/
    public function save($data = null) {
    	$data = post('form');
    	if(isset($data['langs'])) $data['langs'] = saveByKey($data['langs'],'abbr');
    	if(isset($data['i18n']))  $data['i18n']  = saveByKey($data['i18n'],'abbr');

        return parent::save($data);
	}

	public function install() {
		$this->cache(
			[ 1=> [
				'abbr' => 'en',
				'name' => 'English',
				'active' => 1,
				'id' => 1,
			]]);
	}
}