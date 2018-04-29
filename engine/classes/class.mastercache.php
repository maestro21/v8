<?php
define('P_JSON', 'json');
define('P_RAW', 'raw');
define('P_TPL', 'tpl');
define('P_FULL', 'full');


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of class
 *
 * @author MAECTPO
 */
abstract class mastercache {

    public function __toString() {
        return $this->cl();
    }


    function install() {
        $this->uninstall();
        $this->cache($this->modules());
    }

    function uninstall()
    {
        $this->clear();
    }

    /**
     * Key properties that are changed a lot and thus require getter\setter
     * ai, id, json, parse
     */


    /*
     * Autoincrement
     * @var int
     */
    public $ai = 0;
    function ai($ai = null) {
        if($ai != null) $this->ai = $ai;
        return $this->ai;
    }


    /**
     * ID getter/setter
     * @param null|$id
     * @return int|null
     */
    public $id = 0;
    function id($id = null) {
        if($id != null) $this->id = $id;
        return $this->id;
    }

    /**
     * Define if we want to cache data as json
     * @param null|$id
     * @return int|null
     */
    public $json = 0;
    function json($json = null) {
        if($json != null) $this->json = $json;
        return $this->json;
    }

    /**
     * Rendering mode:
     * P_FULL - will output template and site template
     * P_TPL  - will output template
     * P_JSON - will output json encoded data
     * P_RAW  - will output raw data
     */
    public $parse = P_FULL;

    /**
     * Set class name
     * @param null|$cl
     * @return string|null
     */
    public $cl;
    function cl($cl = null) {
        if($cl != null) $this->cl = $cl;
        if($this->cl == null) $this->cl = get_class($this);
        return $this->cl;
    }

    /**
     * Template
     */
    public $tpl;
    function tpl($tpl = null) {
        if($tpl != null) $this->tpl = $tpl;
        return $this->tpl;
    }

    /**
     * Setting properties that should be changed once in construct
     * and thus dont need getter\setter
     */

    /**
     * Method to be called
     */
    public $method;

    /**
     * Default method to be called
     */
    public $defmethod = 'items';

    /**
     * Defines how many items should be shown per page
     * @var int
     */
    public $perpage = 20;

    /**
     * Defines if we want to wrap content or show it fullscreen
     */
    public $wrap = TRUE;


    /**
     * Title
     */
    public $title;

    /**
     * List of buttons
     */
    public $buttons;
    function buttons() {
        return $this->buttons;
    }

    public $description;

    /**
     * Cache path
     */
    public $cachepath = 'data/cache/';

    /**
     * Data
     */
    public $data;
    function data($data = null) {
        if($data != null) {
            $this->data = $data;
            $this->ai = count($data);
        }
        return $this->data;
    }

    /**
     * mastercache constructor.
     */
    function __construct(){
        /** Class routing parameters **/
        if(empty($cl)) $cl = get_class($this);
        $this->title = $this->cl = $cl;
        $this->method 	= (method_exists($this, fn()) ? fn() : $this->defmethod);
        $this->id 		= (post('id') ? post('id') : id());

        /** Class data parameters **/
        if(get('ajax') > 0) $this->parse = FALSE;
        $this->fileNamePolicy = array(
            '/^(.*)/' => [
                $this->cl() . '/{time}{uid}.{ext}',
                //$this->cl() . '/{uid}-{id}-{fkey}-{time}-{date}-{time}-{fname}.{ext}',
                'thumb' => $this->cl() . '/{id}/{uid}_thumb.{ext}',
                'imgsize' => [400,300],
                'thumbsize'  => [100,100],
            ]
        );

        /** Class template parameters **/
        $this->buttons = [
            'items' => [
                 'add' => 'fa-plus'
            ],
            //'view'  => array( 'items' => 'list', 'item/'.$this->id => 'edit' ),
            'table' => [
                'item/{id}' => 'edit',
                'view/{id}' => 'view'
            ],
        ];
        //$this->buttons->get('items')->set('add','val');

        /** Calls virtual method for class extension in child classes **/
        $this->extend();

    }

   var $fields = [];


   function fields() {
        return $this->fields;
   }


    /**
	 *	Default method for class data listing
	 *	@return array() or FALSE;
	 */
  	public function items() {
		return $this->cache();
  	}


  	public function reset() {
        $this->data = [];
        $this->ai = 0;
    }

    /**
     * set and save element
     */
    public function set($key, $row) {
        if(empty($this->data)) {
            $this->cache();
        }
        $this->data[$key] = $row; 
        $this->cache($this->data);
    }

    public function get($key) {
        $this->cache();
        if($this->data[$key]) return $this->data[$key];
        return NULL;
    }

    public function find($k,$v) {
        if(is_array($this->data())) {
            foreach ($this->data() as $id => $row) {
                if (isset($row[$k]) && $row[$k] == $v) {
                    $row['id'] = $id;
                    return $row;
                }
            }
        }
        return NULL;
    }

    /**
     * Add data to array
     */
    public function push($row) {
        $data = $this->cache();
        $this->ai++;
        $this->id($this->ai);
        $row['id'] = $this->id();
        $data[$this->id()] = $row;
        $this->cache($data);
    }


    /** Save element **/
    public function save($row = null) {
		$this->parse = P_JSON;
        $data = $this->cache();
        if($row == null) $row = post('form');
        if($this->id() < 1) {
            $this->ai++;
            $this->id($this->ai);
        }
        $this->saveFiles();
        $row['id'] = $this->id();
        $data[$this->id()] = $row;
        $this->cache($data);

        return [
            'redirect' => BASE_URL . $this->cl() . '/edit/' . $this->id(),
            'id' => $this->id(),
            'status' => 'ok',
            'message' => 'saved'
        ];
	}

   /** Retrieves data of a single element for edit **/
    public function edit($id = NULL) {
        $id = V($id, $this->id());
		return $this->add($this->view($id));
    }

	/** Retrieves data of a single element for view **/
    public function view($id = NULL) {
        $id = V($id, $this->id());
		$data = $this->cache();
        return $data[$id];
    }

    /* Opens form for adding new element **/
	public function add($data = NULL) {
		$this->tpl = 'addedit';
		return array('data' => $data, 'fields' =>$this->fields());
	}

    /** Delete element **/
    public function del($id = NULL) {
		$this->parse = P_JSON;
        $id = v($id, $this->id());
		$data = $this->cache();
        unset($data[$id]);
        $this->cache($data);
		return json_encode(array('redirect' => 'self', 'status' => 'ok', 'timeout' => 1));
    }

    /** Renders class output **/
	public function render() {
        //if(isset($this->data['data'])) $this->data = $this->data['data'];
        switch($this->parse) {

            case P_RAW: return $this->data; break;

            case P_JSON: return json_encode($this->data); break;

            case P_TPL:
            case P_FULL:
                $params = [
                    'data' => $this->data,
                    'title' => $this->title,
                    'buttons' => $this->buttons,
                    'fields' => $this->fields(),
                    'id' => $this->id(),
                    'class' => $this->cl()
                ];
                return tpl( $this->cl() . '/' . $this->tpl, $params);
            break;
        }
        return NULL;
    }

    public function clear() {
        $this->data = [];
        $this->ai = 0;
        cacherm($this->cl(), $this->json());
    }
    /*
    public function clear($name = '') {
        if(empty($name)) $name = $this->cl();
        $cp     = get('cp');
        $json   = get('json');
        cacherm($name, $json, $cp);
        $this->parse = NULL;
        redirect(BASE_URL . $name .'/admin');
    } */

    public function cache($data = null, $name = '') {
        if(empty($name)) $name = $this->cl();
        // save
		if(!empty($data)) {
            $data = [
                'ai' => $this->ai,
                'data' => $data,
            ]; 
            cache($name, $data, $this->json, $this->cachepath);
        }
        // load
        $data =  cache($name, null, $this->json, $this->cachepath);
        if(!isset($data['ai'])) {
            $data = [
                'ai' => @max(array_keys($data)),
                'data' => $data,
            ];
            cache($name, $data, $this->json, $this->cachepath);
        }
        $this->data = $data['data'];
        $this->ai = (int)@$data['ai'];
        return $this->data();
	}

	public function extend(){}

	public function saveFiles($pol = []) {
        $files = files();
        if(!empty($files)) {
            foreach($files as $fn => $file) {
                foreach($this->fileNamePolicy as $fnpkey => $fnp) {
                    //print_r($fn . ' ' . $fnpkey);
                    preg_match($fnpkey, $fn, $matches);
                    if(!empty($matches)) {
                        $filename = $fnp[0];
                        $type = explode('/',$file['type']);
                        $replace = [
                            '{uid}'     => uniqid(),
                            '{id}'      => $this->id,
                            '{fname}'   => slug($file['name']),
                            '{fkey}'    => $fn,
                            '{datetime}'=> date("YmdHis"),
                            '{date}'    => date("Ymd"),
                            '{time}'    => date("His"),
                            '{ext}'     => $type[1],
                        ];
                        if(!empty($pol)) $replace = array_merge($pol, $replace);
                        $filename =  strtr($filename, $replace);
                        $thumb = @$fnp['thumb'];
                        if($thumb) {
                            $thumb = strtr($thumb, $replace);
                        }
                        $fileparam = explode('-',$fn);
                        fm()->fupload($fn,BASEFMDIR . $filename, BASEFMDIR . $thumb, @$fnp['imgsize'], @$fnp['thumbsize']);
                        $imgsize = getimagesize(BASEFMDIR . $filename);
                        setArrayValue($this->post, $fileparam, [
                            'width' => $imgsize[0],
                            'height' => $imgsize[1],
                            'name' => $filename,
                            'thumb' => $thumb,
                            'type' => $type[0]
                        ]);
                        if(@$fnp['animate'] > 0) {
                            createCSSAnimation($fn . '_' . $this->id,[
                                'fname' => BASEFMURL . $filename,
                                'width' => $imgsize[0],
                                'height' => $imgsize[1],
                                'rows' => (isset($fnp['rows'])? $fnp['rows'] : 1 ),
                            ]);
                        }
                        continue;
                    }
                }
            }
        }
    }
}


