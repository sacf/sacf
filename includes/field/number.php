<?php

/**
 * File: Number
 *
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 */

namespace sacf\field;

/**
 * Text Field: Number
 */

class number extends base {

	protected $defaults = array(
		'min' => '',
		'max' => '',
		'step' => '',
		'default_value' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false, $type = 'number') {
		parent::__construct($label, $name, $type);
	}

	/**
	 * Set the default value
	 *
	 * @param int $int the default value
	 * @return void
	 */
	public function default_value($int) {
		$this->options['default_value'] = $int;
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
	 * Set the minimum value
	 *
	 * @param float $int min value
	 * @return void
	 */
	public function min($int) {
		$this->options['min'] = $int;
		return $this;
	}

	/**
	 * Set the maximum value
	 *
	 * @param float $int max value
	 * @return void
	 */
	public function max($int) {
		$this->options['max'] = $int;
		return $this;
	}

	/**
	 * Set the step size
	 *
	 * @param float $int min step size
	 * @return void
	 */
	public function step($int) {
		$this->options['step'] = $int;
		return $this;
	}
}
