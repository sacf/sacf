<?php

/**
 * File: Text
 *
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 *
 */

namespace sacf\field;

/**
 * Input Field: Text
 */
class text extends base {

	protected $defaults = array( 
		'default_value' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
		'maxlength' => '',
		'readonly' => 0,
		'disabled' => 0,
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false, $type = 'text') {
		parent::__construct($label, $name, $type);
	}
	
	/**
	 * set a default text
	 *
	 * @param string $string default text
	 * @return void
	 */
	public function default_value($string) {
		$this->options['default_value'] = $string;
		return $this;
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
	 * set maximum length of input
	 *
	 * @param int $int max length
	 * @return void
	 */
	public function maxlength($int) {
		$this->options['maxlength'] = $int;
		return $this;
	}

	/**
	 * prepend text to input field
	 *
	 * @param string $string text to prepend
	 * @return void
	 */
	public function prepend($string) {
		$this->options['prepend'] = $string;
		return $this;
	}
	
	/**
	 * append text to input field
	 *
	 * @param string $string text to append
	 * @return void
	 */
	public function append($string) {
		$this->options['append'] = $string;
		return $this;
	}

	/**
	 * set readonly value of the field
	 *
	 * @param boolean $bool is readonly
	 * @return void
	 */
	public function readonly($bool = true) {
		$this->options['readonly'] = $bool;
		return $this;
	}
	
	/**
	 * set disabled value of the field
	 *
	 * @param boolean $bool is disabled
	 * @return void
	 */
	public function disabled($bool = true) {
		$this->options['disabled'] = $bool;
		return $this;
	}
}
