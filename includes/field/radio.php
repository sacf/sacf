<?php

namespace sacf\field;

class radio extends base {

    protected $defaults = array(
            'choices' => array(),
            'default_value' => array(),
            'layout' => 'vertical',
            'other_choice' => 0,
            'save_other_choice' => 0,
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'radio');
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
	 * @help: set layout of checkboxes: vertical, horizontal
	 */
	public function layout($string) {
		$this->options['layout'] = $string;
		return $this;
	}
	/**
	 * @help: add other choice to allow for custom values: 0, 1
	 */
	public function other_choice($bool) {
		$this->options['other_choice'] = $bool;
		return $this;
	}
	/**
	 * @help: save other values to the field's choices: 0, 1
	 */
	public function save_other_choice($bool) {
		$this->options['save_other_choice'] = $bool;
		return $this;
	}



	/**
	 * creates field array
     * @todo default default_value?
	 */
	// public function make() {
	// 	if ($this->default_value == null) {
	// 		$first_key = key($this->choices);
	// 		$this->default_value = $first_key;
	// 	}
	// 	$arr = parent::make();
	// 	$arr['choices'] = $this->choices;
	// 	$arr['default_value'] = $this->default_value;
	// 	$arr['layout'] = $this->layout;
	// 	$arr['other_choice'] = $this->other_choice;
	// 	$arr['save_other_choice'] = $this->save_other_choice;
	// 	return $arr;
	// }

}
