<?php

/**
 * Select field: Time Picker
 * @version 2.0.0
 */

namespace sacf\field;

class timepicker extends base {

    protected $defaults = array(
            'display_format' => 'g:i a',
            'return_format' => 'g:i a',
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'time_picker');
    }

	/**
	 * @help: set format displayed when editing a post: d/m/Y
	 */
	public function display_format($string) {
		$this->options['display_format'] = $string;
		return $this;
	}

	/**
	 * @help: set format returned via template functions: F j, Y
	 */
	public function return_format($string) {
		$this->options['return_format'] = $string;
		return $this;
	}
}
