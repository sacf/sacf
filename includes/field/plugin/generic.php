<?php

/**
 * A generic plugin field
 * @version 2.0.0
 */

namespace sacf\field\plugin;

use sacf\field\base as base;

class generic extends base {

	public function __construct($label, $name=false, $type, $options=array()) {
		parent::__construct($label, $name, $type);
        $this->options = $options;
	}

	/**
	 * @help: set all field options in an array, eg: array('output_type' => 'code', 'unique' => 'non-unique', ...)
	 */
	public function options($options) {
		$this->options = $options;
		return $this;
    }

}
