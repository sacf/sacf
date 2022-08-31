<?php

/**
 * A generic plugin field
 * @since 2.0.0
 * @version 2.0.1
 * @package sacf/fields/plugins
 */

namespace sacf\field\plugin;

use sacf\field\base as base;

/**
 * Plugin Generic plugin base class
 */

class generic extends base {

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 * @param string $type type of this plugin field
	 * @param array $options options
	 */
	public function __construct($label, $name = false, $type = '', $options = array()) {
		parent::__construct($label, $name, $type);
		$this->options = $options;
	}

	/**
	 * set all field options in an array
	 *
	 * @param array $options eg: <code>array('output_type' => 'code', 'unique' => 'non-unique', ...)</code>
	 * @return void
	 */
	public function options($options) {
		$this->options = $options;
		return $this;
	}

}
