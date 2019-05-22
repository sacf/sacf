<?php

/**
 * File: Text
 *
 * @package sacf\fields
 * @since 2.0.0
 * @version 2.0.0
 *
 */

namespace sacf\field;

/**
 * Select Field: User
 */

class user extends base {

	/**
	 * default values
	 *
	 * @var array
	 */
	protected $defaults = array(
		'rolw' => '',
		'allow_null' => 0,
		'multiple' => 0,
	);

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'user');
	}

	/**
	 * filter users by role
	 *
	 * @param array $array e.g. <code>array ( 0 => 'administrator', 1 => 'editor', 2 => 'author', 3 => 'contributor', 4 => 'subscriber' )</code>
	 * @return void
	 */
	public function role($array) {
		$this->options['role'] = $array;
		return $this;
	}

	/**
	 * allow null
	 *
	 * @param integer $bool
	 * @return void
	 */
	public function allow_null($bool) {
		$this->options['allow_null'] = $bool;
		return $this;
	}
	
	/**
	 * allow multiple selections
	 *
	 * @param integer $bool
	 * @return void
	 */
	public function multiple($bool) {
		$this->options['multiple'] = $bool;
		return $this;
	}
}
