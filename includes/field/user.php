<?php

/**
 * Select field: User
 * @version 2.0.0
 */

namespace sacf\field;

class user extends base {

    protected $defaults = array(
            'rolw' => '',
            'allow_null' => 0,
            'multiple' => 0,
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'user');
	}


	/**
	 * @help: filter by role eg: array ( 0 => 'administrator', 1 => 'editor', 2 => 'author', 3 => 'contributor', 4 => 'subscriber' )
	 */
	public function role($array) {
		$this->options['role'] = $array;
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
}
