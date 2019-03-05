<?php

/**
 * Select field: TrueFalse
 * @version 2.0.0
 */

namespace sacf\field;

class truefalse extends base {

    protected $defaults = array(
            'message' => '',
            'default_value' => 0,
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => ''
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'true_false');
	}


	/**
	 * @help: set the message as string
	 */
	public function message($string) {
		$this->options['message'] = $string;
		return $this;
	}
	/**
	 * @help: set if checkbox is checked by default: 0, 1
	 */
	public function default_value($bool = true) {
		$this->options['default_value'] = $bool;
		return $this;
	}

	/**
	 * @help: set if the modern ui should be displayed: 0, 1
	 */
	public function ui($bool = true) {
		$this->options['ui'] = $bool;
		return $this;
	}

	/**
	 * @help: set on text of modern ui. only works if ui = 1
	 */
	public function ui_on_text($string) {
		$this->options['ui_on_text'] = $string;
		return $this;
	}

	/**
	 * @help: set off text of modern ui. only works if ui = 1
	 */
	public function ui_off_text($string) {
		$this->options['ui_off_text'] = $string;
		return $this;
	}

}
