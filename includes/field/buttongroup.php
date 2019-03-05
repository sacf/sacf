<?php

/**
 * Field: Button Group
 * @version 2.0.0
 * @since 2.0.0
 */

namespace sacf\field;

class buttongroup extends base {

    protected $defaults = array(
            'choices' => array(),
            'allow_null' => 0,
            'default_value' => '',
            'layout' => 'horizontal',
            'return_format' => 'value',
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'button_group');
	}


	/**
	 * @help: set choices eg: array ( 'red' => 'RED', 'blue' => 'BLUE', 'yellow' => 'YELLOW' )
	 */
	public function choices($array) {
		$this->options['choices'] = $array;
		return $this;
    }
    /**
	 * @help: allow null: 0, 1
	 */
	public function allow_null($bool = true) {
		$this->options['allow_null'] = $bool;
		return $this;
	}
	/**
	 * @help: set default choices eg: array ( 'red' => 'red', 'yellow' => 'yellow' )
	 */
	public function default_value($array) {
		$this->options['value'] = $array;
		return $this;
	}
	/**
	 * @help: set layout of checkboxes: vertical, horizontal
	 */
	public function layout($string = 'vertical') {
		$this->options['layout'] = $string;
		return $this;
	}

    /**
	 * @help: how values are returned
	 */
	public function return_format($string) {
		$this->options['return_format'] = $string;
		return $this;
    }

}
