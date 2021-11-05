<?php

/**
 * File: Color Picker
 * 
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 * 
 */

namespace sacf\field;

/**
 * Select field: Color Picker
 */
class colorpicker extends base {

	protected $defaults = array(
		'default_value' => '',
	);  ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false, $type = 'color_picker') {
		parent::__construct($label, $name, $type);
	}

	/**
	 * Appears when creating a new post
	 *
	 * @param String $string hex-value of color
	 * @return void
	 */
	public function default_value($string) {
		$this->options['default_value'] = $string;
		return $this;
	}
	
	/**
	 * Enable opacity 
	 *
	 * @param bool $bool is opacity enabled
	 * @return void
	 */
	public function enable_opacity($bool = 1) {
		$this->options['enable_opacity'] = $bool;
		return $this;
	}
	
	/**
	 * Specify the return format on front end
	 *
	 * @param string $string <code>string</code>, <code>array</code>
	 * @return void
	 */
	public function return_format($string) {
		$this->options['return_format'] = $string;
		return $this;
	}

}
