<?php

/**
 * File: truefalse
 *
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 * @todo allow boolean values in different formats?
 *
 */

namespace sacf\field;

/**
 * Select Field: Truefalse
 */
class truefalse extends base {
	
	protected $defaults = array( 
		'message' => '',
		'default_value' => 0,
		'ui' => 0,
		'ui_on_text' => '',
		'ui_off_text' => '',
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 * @param string $type type of this field
	 */
	public function __construct($label, $name = false, $type = 'true_false') {
		parent::__construct($label, $name, $type);
	}
	
	/**
	 * set the message (label)
	 *
	 * @param string $string message used as label
	 * @return void
	 * 
	 */
	public function message($string) {
		$this->options['message'] = $string;
		return $this;
	}
	
	/**
	 * set the default checked state
	 *
	 * @param boolean $bool checked state
	 * @return void
	 */
	public function default_value($bool = true) {
		$this->options['default_value'] = $bool;
		return $this;
	}


	/**
	 * enable modern ui
	 *
	 * @param boolean $bool 
	 * @return void
	 */
	public function ui($bool = true) {
		$this->options['ui'] = $bool;
		return $this;
	}

	/**
	 * set "on"-text on modern ui. only works if "ui" is true
	 *
	 * @param string $string "On"-Text
	 * @return void
	 */
	public function ui_on_text($string) {
		$this->options['ui_on_text'] = $string;
		return $this;
	}

	/**
	 * set "off"-text on modern ui. only works if "ui" is true
	 *
	 * @param string $string "Off"-Text
	 * @return void
	 */
	public function ui_off_text($string) {
		$this->options['ui_off_text'] = $string;
		return $this;
	}

}
