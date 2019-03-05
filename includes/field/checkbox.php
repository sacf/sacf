<?php

/**
 * Field: Checkbox
 * @version 2.0.0
 */

namespace sacf\field;

class checkbox extends base {

    protected $defaults = array(
            'choices' => array(),
            'allow_custom' => 0,
            'default_value' => array(),
            'layout' => 'vertical',
            'toggle' => 0,
            'return_format' => 'value',
            'save_custom' => 0,
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'checkbox');
	}


	/**
	 * @help: set choices eg: array ( 'red' => 'RED', 'blue' => 'BLUE', 'yellow' => 'YELLOW' )
	 */
	public function choices($array) {
		$this->options['choices'] = $array;
		return $this;
    }
    /**
	 * @help: @todo
	 */
	public function allow_custom($bool = true) {
		$this->options['allow_custom'] = $bool;
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
	 * @help: set layout of checkboxes: vertical, horizontal
	 */
	public function layout($string = 'horizontal') {
		$this->$options['layout'] = $string;
		return $this;
	}
	/**
	 * @help: prepend an extra checkbox to toggle all choices: 0, 1
	 */
	public function toggle($bool = true) {
		$this->options['toggle'] = $bool;
		return $this;
    }
    /**
	 * @help: @todo
	 */
	public function return_format($string) {
		$this->options['return_format'] = $string;
		return $this;
    }
    /**
	 * @help: @todo
	 */
	public function save_custom($bool = true) {
		$this->options['save_custom'] = $bool;
		return $this;
	}

}
