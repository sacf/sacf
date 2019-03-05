<?php

/**
 * Field: URL
 * @version 2.0.0
 */

namespace sacf\field;

class url extends base {

    protected $defaults = array(
            'default_value' => '',
            'placeholder' => '',
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'url');
	}

	/**
	 * @help: set a default text
	 */
	public function default_value($string) {
		$this->options['default_value'] = $string;
		return $this;
	}
	/**
	 * @help: set placeholder text
	 */
	public function placeholder($string) {
		$this->options['placeholder'] = $string;
		return $this;
	}
}
