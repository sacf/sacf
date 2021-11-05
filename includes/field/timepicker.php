<?php

/**
 * File: Timepicker
 *
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 *
 */

namespace sacf\field;

/**
 * Input field: Timepicker
 */

class timepicker extends base {

	protected $defaults = array( 
		'display_format' => 'g:i a',
		'return_format' => 'g:i a',
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 * @param string $type type of this field
	 */
	public function __construct($label, $name = false, $type = 'time_picker') {
		parent::__construct($label, $name, $type);
	}
	
	/**
	 * set format displayed when editing a post
	 *
	 * @param string $string e.g. <code>g:i a</code> or <code>H:i:s</code>
	 * @return void
	 */
	public function display_format($string) {
		$this->options['display_format'] = $string;
		return $this;
	}

	/**
	 * set format returned via template functions
	 *
	 * @param string $string e.g. <code>g:i a</code> or <code>H:i:s</code>
	 * @return void
	 */
	public function return_format($string) {
		$this->options['return_format'] = $string;
		return $this;
	}
}
