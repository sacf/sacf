<?php

/**
 * File: Message
 * 
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 */

namespace sacf\field;

/**
 * Layout field: Message
 */

class message extends base {

	protected $defaults = array(
		'message' => '',
		'new_lines' => 'wpautop',
		'esc_html' => 0,
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = '') {
		parent::__construct($label, $name, 'message');
	}

	/**
	 * Set the message
	 *
	 * @param string $string e.g. <code>It's like a jungle sometimes</code>
	 * @return void
	 */
	public function message($string) {
		$this->options['message'] = $string;
		return $this;
	}

	/**
	 * Controls how new lines are rendered
	 *
	 * @param string $string <code>wpautop</code>, <code>br></code> or <code> </code>
	 * @return void
	 */
	public function new_lines($string) {
		$this->options['new_lines'] = $string;
		return $this;
	}

	/**
	 * Allow HTML markup to display as visible text instead of rendering
	 *
	 * @param boolean $bool <code>0</code> or <code>1</code>
	 * @return void
	 */
	public function esc_html($bool = true) {
		$this->options['esc_html'] = $book;
		return $this;
	}
}
