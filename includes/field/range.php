<?php

/**
 * File: Range
 *
 * @package sacf\fields
 * @since 2.0.0
 * @version 2.0.0
 * @todo aren't the steps float values? This field is not working!
 *
 */
namespace sacf\field;

/**
 * Select-Field: Range
 */
class range extends text {

	/**
	 * default values
	 *
	 * @var array
	 */
	protected $defaults = array(
		'min' => '',
		'max' => '',
		'step' => '',
		'default_value' => '',
	);

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'range');
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
	 * set minimum value in int
	 *
	 * @param int $int
	 * @return void
	 */
	public function min($int) {
		$this->options['min'] = $int;
		return $this;
	}

	/**
	 * set minimum value in int
	 *
	 * @param int $int
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
