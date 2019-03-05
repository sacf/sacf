<?php

/**
 * Field: Text
 * @version 2.0.0
 */

namespace sacf\field;

class text extends base {

    protected $defaults = array(
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
            'readonly' => 0,
            'disabled' => 0,
        );

    public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'text');
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
	/**
	 * @help: set maximum length of text input
	 */
	public function maxlength($int) {
		$this->options['maxlength'] = $int;
		return $this;
	}
	/**
	 * @help: prepend text to input field
	 */
	public function prepend($string) {
		$this->options['prepend'] = $string;
		return $this;
	}
	/**
	 * @help: append text to input field
	 */
	public function append($string) {
		$this->options['append'] = $string;
		return $this;
	}
	/**
	 * @help: set input field to readonly: false, true
	 */
	public function readonly($bool = true) {
		$this->options['readonly'] = $bool;
		return $this;
	}
	/**
	 * @help: set input field disabled: false, true
	 */
	public function disabled($bool = true) {
		$this->options['disabled'] = $bool;
		return $this;
	}
}
