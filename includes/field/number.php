<?php

/**
 * File: Number
 * 
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 * @todo min / max / steps as float? 
 */

namespace sacf\field;

/**
 * Text Field: Number
 */

class number extends text {

	protected $defaults = array(
		'min' => '',
		'max' => '',
		'step' => '',
		'default_value' => '',
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'number');
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
	 * Set the minimum value
	 *
	 * @param int $int min value
	 * @return void
	 */
	public function min($int) {
		$this->options['min'] = $int;
		return $this;
	}
	
	/**
	 * Set the maximum value
	 *
	 * @param int $int max value
	 * @return void
	 */
	public function max($int) {
		$this->options['max'] = $int;
		return $this;
	}
	
	/**
	 * Set the step size
	 *
	 * @param int $int min step size
	 * @return void
	 */
	public function step($int) {
		$this->options['step'] = $int;
		return $this;
	}
}
