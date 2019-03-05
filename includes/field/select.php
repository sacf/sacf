<?php

/**
 * Field: Select
 * @version 2.0.0
 */

namespace sacf\field;

class select extends base {

    protected $defaults = array(
            'choices' => array(),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'ajax' => 0,
            'placeholder' => '',
            'disabled' => 0,
            'readonly' => 0,
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'select');
	}

	/**
	 * @help: set choices eg: array ( 'red' => 'RED', 'blue' => 'BLUE', 'yellow' => 'YELLOW' )
	 */
	public function choices($array) {
		$this->options['choices'] = $array;
		return $this;
	}
	/**
	 * @help: set default choices eg: array ( 'red' => 'red', 'yellow' => 'yellow' )
	 */
	public function default_value($array) {
		$this->options['default_value'] = $array;
		return $this;
	}
	/**
	 * @help: allow null: 0, 1
	 */
	public function allow_null($bool = 1) {
		$this->options['allow_null'] = $bool;
		return $this;
	}
	/**
	 * @help: allow multiple selections: 0, 1
	 */
	public function multiple($bool = 1) {
		$this->options['multiple'] = $bool;
		return $this;
	}
	/**
	 * @help: stylicsd ui: 0, 1
	 */
	public function ui($bool = 1) {
		$this->options['ui'] = $bool;
		return $this;
	}
	/**
	 * @help: use ajax to lacy load choices: 0, 1
	 */
	public function ajax($bool = 1) {
		$this->options['ajax'] = $bool;
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
	 * @help: set input field to readonly: false, true
	 */
	public function readonly($bool = 1) {
		$this->options['readonly'] = $bool;
		return $this;
	}
	/**
	 * @help: set input field disabled: false, true
	 */
	public function disabled($bool = 1) {
		$this->options['disabled'] = $bool;
		return $this;
	}

}
