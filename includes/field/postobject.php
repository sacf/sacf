<?php

/**
 * Select field: Post Object
 * @version 2.0.0
 */

 namespace sacf\field;

class postobject extends base {

    protected $defaults = array(
            'post_type' => array(),
            'taxonomy' => array(),
            'allow_null' => 0,
            'multiple' => 0,
            'return_format' => 'object'
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'post_object');
	}

	/**
	 * @help: set filter by post types eg: array ( 0 => 'post', 1 => 'page', 2 => 'attachment' )
	 */
	public function post_type($array) {
		$this->options['post_type'] = $array;
		return $this;
	}
	/**
	 * @help: set filter by taxonomy eg: array ( 0 => 'category:category-1', 1 => 'post_tag:tag-1' )
	 */
	public function taxonomy($array) {
		$this->options['taxonomy'] = $array;
		return $this;
	}
	/**
	 * @help: allow null: 0, 1
	 */
	public function allow_null($bool) {
		$this->options['allow_null'] = $bool;
		return $this;
	}
	/**
	 * @help: allow multiple selections: 0, 1
	 */
	public function multiple($bool) {
		$this->options['multiple'] = $bool;
		return $this;
	}
	/**
	 * @help: sets return format: object, id
	 */
	public function return_format($string) {
		$this->options['return_format'] = $string;
		return $this;
	}
}
