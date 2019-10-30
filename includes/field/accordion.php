<?php

/**
 * File: Accordion field
 * 
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 * 
 */

namespace sacf\field;

/**
 * Accordions help you organize fields into panels that open and close.
 * All fields following this accordion (or until another accordion is defined) will be grouped together.
 */
class accordion extends base {

	
	protected $defaults = array(
		'open' => 0,
		'multi_expand' => 0,
		'endpoint' => 0,
	); ///< defaults

	/**
	 * Constructor method
	 * 
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false, $type = 'accordion') {
		parent::__construct($label, $name, $type);
	}

	/**
	 * Display this accordion as open on page load.
	 *
	 * @param boolean $bool is open on page load 
	 * @return void
	 */
	public function open($bool = true) {
		$this->options['open'] = $openOnPageLoad;
		return $this;
	}

	/**
	 * Allow this accordion to open without closing others.
	 *
	 * @param boolean $bool can be open while others are
	 * @return void
	 */
	public function multi_expand($bool = true) {
		$this->options['multi_expand'] = $bool;
		return $this;
	}

	/**
	 * Define an endpoint for the previous accordion to stop. This accordion will not be visible.
	 *
	 * @param boolean $bool is there an endpoint
	 * @return void
	 */
	public function endpoint($bool = true) {
		$this->options['endpoint'] = $bool;
		return $this;
	}
}
