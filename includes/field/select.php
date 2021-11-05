<?php

/**
 * File: Select
 * 
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 * @todo default values as key=>value? 
 * @todo allow boolean values in different formats?
 * 
 */
namespace sacf\field;

/**
 * Select-Field: Select
 */
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
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 * @param string $type type of this field
	 */
	public function __construct($label, $name = false, $type = 'select') {
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
	 * set default values
	 *
	 * @param array $array eg: <code>array ( 'red' => 'red', 'yellow' => 'yellow' )</code>
	 * @return void
	 */
	public function default_value($array) {
		$this->options['default_value'] = $array;
		return $this;
	}
	
	/**
	 * allow null
	 *
	 * @param integer $bool
	 * @return void
	 */
	public function allow_null($bool = 1) {
		$this->options['allow_null'] = $bool;
		return $this;
	}
	
	/**
	 * allow multiple selections
	 *
	 * @param integer $bool
	 * @return void
	 */
	public function multiple($bool = 1) {
		$this->options['multiple'] = $bool;
		return $this;
	}
	
	/**
	 * enable styled ui
	 *
	 * @param integer $bool
	 * @return void
	 */
	public function ui($bool = 1) {
		$this->options['ui'] = $bool;
		return $this;
	}

	/**
	 * use ajax to lacy load choices
	 *
	 * @param integer $bool
	 * @return void
	 */
	public function ajax($bool = 1) {
		$this->options['ajax'] = $bool;
		return $this;
	}
	
	/**
	 * set placeholder text
	 *
	 * @param string $string
	 * @return void
	 */
	public function placeholder($string) {
		$this->options['placeholder'] = $string;
		return $this;
	}
	
	/**
	 * set input field to readonly
	 *
	 * @param integer $bool
	 * @return void
	 */
	public function readonly($bool = 1) {
		$this->options['readonly'] = $bool;
		return $this;
	}

	/**
	 * set input field to disabled
	 *
	 * @param integer $bool
	 * @return void
	 */
	public function disabled($bool = 1) {
		$this->options['disabled'] = $bool;
		return $this;
	}

}
