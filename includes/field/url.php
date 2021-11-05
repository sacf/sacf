<?php

/**
 * File: url
 *
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 * @todo allow boolean values in different formats?
 *
 */

namespace sacf\field;

/**
 * Input Field: Url
 */
class url extends base {

	protected $defaults = array( 
		'default_value' => '',
		'placeholder' => '',
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 * @param string $type type of this field
	 */
	public function __construct($label, $name = false, $type = 'url') {
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
}
