<?php

/**
 * Field: Textarea
 * @version 2.0.0
 */

namespace sacf\field;

class textarea extends text {

    protected $defaults = array(
            'rows' => '',
            'new_lines' => '', // wpautop | br | ''
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'textarea');
	}

	/**
	 * @help: set row amount in int
	 */
	public function rows($int) {
		$this->options['rows'] = $int;
		return $this;
	}
	/**
	 * @help: set linebreak: wpautop, br, ''
	 */
	public function new_lines($string = 'wpautop') {
		$this->options['new_lines'] = $string;
		return $this;
	}

}
