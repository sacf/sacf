<?php

/**
 * File: Radio
 *
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 * @todo multiple default values?
 * @todo allow boolean values in different formats?
 *
 */

namespace sacf\field;

/**
 * Select-Field: Radio
 */
class radio extends base {

	protected $defaults = array(
		'choices' => array(),
		'default_value' => '',
		'layout' => 'vertical',
		'other_choice' => 0,
		'save_other_choice' => 0,
		'return_format' => 'value',
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 * @param string $type type of this field
	 */
	public function __construct($label, $name = false, $type = 'radio') {
		parent::__construct($label, $name, $type);
	}
	/**
	 * set choices
	 *
	 * @param array $array e.g. <code>array ( 'red' => 'RED', 'blue' => 'BLUE', 'yellow' => 'YELLOW' )</code>
	 * @return void
	 */
	public function choices($array) {
		$this->options['choices'] = $array;
		return $this;
	}

	/**
	 * set default value
	 *
	 * @param string $string eg: <code>'red'</code>
	 * @return void
	 */
	public function default_value($string) {
		$this->options['default_value'] = $string;
		return $this;
	}

	/**
	 * set layout of the radioboxes
	 *
	 * @param string $string <code>vertical</code> or <code>horizontal</code>
	 * @return void
	 */
	public function layout($string = 'horizontal') {
		$this->options['layout'] = $string;
		return $this;
	}

	/**
	 * add other choice to allow for custom values
	 *
	 * @param boolean $bool
	 * @return void
	 */
	public function other_choice($bool) {
		$this->options['other_choice'] = $bool;
		return $this;
	}

	/**
	 * save other value to the fields' choices
	 *
	 * @param boolean $bool
	 * @return void
	 */
	public function save_other_choice($bool) {
		$this->options['save_other_choice'] = $bool;
		return $this;
	}
	
	/**
	 * Specify the returned value on front end
	 *
	 * @param string $string <code>value</code>, <code>label</code> or <code>array</code>, 
	 * @return void
	 */
	public function return_format($string) {
		$this->options['return_format'] = $string;
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
