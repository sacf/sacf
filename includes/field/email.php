<?php

/**
 * File: E-Mail
 * 
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 * 
 */

namespace sacf\field;

/**
 * Input Field: E-Mail
 */
class email extends base {

	protected $defaults = array(
		'default_value' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => ''
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false, $type = 'email') {
		parent::__construct($label, $name, $type);
		$this->class = "email";
	}

	/**
	 * set a default text
	 *
	 * @param string $string default text
	 * @return void
	 */
	public function default_value($string) {
		$this->default_value = $string;
		return $this;
	}
	
	/**
	 * set placeholder text
	 *
	 * @param string $string placeholder
	 * @return void
	 */
	public function placeholder($string) {
		$this->placeholder = $string;
		return $this;
	}

	/**
	 * prepend text to input field
	 *
	 * @param string $string text to prepend
	 * @return void
	 */
	public function prepend($string) {
		$this->prepend = $string;
		return $this;
	}
	
	/**
	 * append text to input field
	 *
	 * @param string $string text to append
	 * @return void
	 */
	public function append($string) {
		$this->append = $string;
		return $this;
	}


}
