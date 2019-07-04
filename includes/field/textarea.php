<?php

/**
 * File: Textarea
 *
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 *
 */
namespace sacf\field;

/**
 * Input Field: Text
 */

class textarea extends text {
	
	protected $defaults = array( 
		'rows' => '',
		'new_lines' => '', 
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'textarea');
	}

	/**
	 * set amount of rows
	 *
	 * @param int $int amount of rows
	 * @return void
	 */
	public function rows($int) {
		$this->options['rows'] = $int;
		return $this;
	}
	
	/**
	 * set linebreak mode
	 *
	 * @param string $string <code>wpautop</code>, <code>br</code> or <code>''</code>
	 * @return void
	 */
	public function new_lines($string = 'wpautop') {
		$this->options['new_lines'] = $string;
		return $this;
	}

}
