<?php

/**
 * Select field: Date Time Picker
 * @version 2.0.0
 */

namespace sacf\field;

class datetimepicker extends base {

    protected $defaults = array(
            'display_format' => 'd/m/Y g:i a',
            'return_format' => 'd/m/Y g:i a',
            'first_day' => 1,
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'date_time_picker');
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

	/**
	 * @help: set first day in int: 1
	 */
	public function first_day($bool) {
		$this->options['first_day'] = $bool;
		return $this;
	}

}
