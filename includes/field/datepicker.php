<?php

/**
 * File: Date Picker
 * 
 * @package sacf/fields
 * @version 2.0.0
 * @since 2.0.0
 */

namespace sacf\field;

/**
 * Select field: Date Picker
 */
class datepicker extends base {

	protected $defaults = array(
		'display_format' => 'd/m/Y',
		'return_format' => 'F j, Y',
		'first_day' => 1,
	);  ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 * @param string $type type of this field
	 */
	public function __construct($label, $name = false, $type = 'date_picker') {
		parent::__construct($label, $name, $type);
	}

	/**
	 * The format displayed when editing a post
	 *
	 * @param String $string <code>d/m/Y</code><br> <code>m/d/Y</code><br> <code>F j, Y</code><br> <code>other</code> 
	 * @return void
	 */
	public function display_format($string) {
		$this->options['display_format'] = $string;
		return $this;
	}

	/**
	 * The format returned via template functions
	 *
	 * @param String $string <code>d/m/Y</code><br> <code>m/d/Y</code><br> <code>F j, Y</code><br> <code>other</code> 
	 * @return void
	 */
	public function return_format($string) {
		$this->options['return_format'] = $string;
		return $this;
	}

	/**
	 * First day in int: 1
	 *
	 * @param int $int first day of the week as int
	 * @return void
	 */
	public function first_day($int) {
		$this->options['first_day'] = $int;
		return $this;
	}

}
