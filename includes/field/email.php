<?php

namespace sacf\field;

class email extends base {

	public $default_value 	= "";
	public $placeholder 	= "";
	public $prepend 		= "";
	public $append 			= "";

	public function __construct($label, $name=false) {
		parent::__construct($label, $name);
		$this->type = "email";
		$this->class = "email";
	}
	/**
	 * @help: set a default text
	 */
	public function default_value($string) {
		$this->default_value = $string;
		return $this;
	}
	/**
	 * @help: set placeholder text
	 */
	public function placeholder($string) {
		$this->placeholder = $string;
		return $this;
	}
	/**
	 * @help: prepend text to input field
	 */
	public function prepend($string) {
		$this->prepend = $string;
		return $this;
	}
	/**
	 * @help: append text to input field
	 */
	public function append($string) {
		$this->append = $string;
		return $this;
	}


	/**
	 * creates field array
	 */
	public function make() {
		$arr = parent::make();
		$arr['default_value'] = $this->default_value;
		$arr['placeholder'] = $this->placeholder;
		$arr['prepend'] = $this->prepend;
		$arr['append'] = $this->append;
		return $arr;
	}

}
