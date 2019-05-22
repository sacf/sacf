<?php

/**
 * File: Password
 *
 * @package sacf\fields
 * @since 2.0.0
 * @version 2.0.0
 *
 */

namespace sacf\field;

/**
 * Input-Field: Password
 */
class password extends base {

	/**
	 * default values
	 *
	 * @var array
	 */
	protected $defaults = array(
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
	);

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'password');
	}

	/**
	 * set placeholder text
	 *
	 * @param string $string placeholder
	 * @return void
	 */
	public function placeholder($string) {
		$this->options['placeholder'] = $string;
		return $this;
	}

	/**
	 * prepend text to the input field
	 *
	 * @param string $string text to prepend
	 * @return void
	 */
	public function prepend($string) {
		$this->options['prepend'] = $string;
		return $this;
	}

	/**
	 * append text to the input field
	 *
	 * @param string $string text to append
	 * @return void
	 */
	public function append($string) {
		$this->options['append'] = $string;
		return $this;
	}

}
