<?php

/**
 * File: Link
 * 
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 */

namespace sacf\field;

/**
 * Select field: Link
 */
class link extends base {

	protected $defaults = array(
		'return_format' => 'array',
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false, $type = 'link') {
		parent::__construct($label, $name, $type);
	}
	/**
	 * Specify the return format on front end
	 *
	 * @param string $string <code>array</code> or <code>url</code>
	 * @return void
	 */
	public function return_format($string) {
		$this->options['return_format'] = $string;
		return $this;
	}

}
