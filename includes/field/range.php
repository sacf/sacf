<?php

/**
 * File: Range
 *
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 *
 */
namespace sacf\field;

/**
 * Select-Field: Range
 */
class range extends base {

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
	 * @param string $type type of this field
	 */
	public function __construct($label, $name = false, $type = 'range') {
		parent::__construct($label, $name, $type);
	}

	/**
	 * set default values
	 *
	 * @param int $int default value
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
	 * set minimum value in int
	 *
	 * @param float $int
	 * @return void
	 */
	public function min($int) {
		$this->options['min'] = $int;
		return $this;
	}

	/**
	 * set minimum value in int
	 *
	 * @param float $int
	 * @return void
	 */
	public function max($int) {
		$this->options['max'] = $int;
		return $this;
	}

	/**
	 * set stepper value in int
	 *
	 * @param float $int
	 * @return void
	 */
	public function step($int) {
		$this->options['step'] = $int;
		return $this;
	}
}
