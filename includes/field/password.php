<?php

/**
 * Field: Password
 * @version 2.0.0
 */

namespace sacf\field;

class password extends base {

	protected $defaults = array(
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
	);

	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'password');
	}

	/**
	 * @help: set placeholder text
	 */
	public function placeholder($string) {
		$this->options['placeholder'] = $string;
		return $this;
	}

	/**
	 * @help: prepend text to input field
	 */
	public function prepend($string) {
		$this->options['prepend'] = $string;
		return $this;
	}
	/**
	 * @help: append text to input field
	 */
	public function append($string) {
		$this->options['append'] = $string;
		return $this;
	}

}
