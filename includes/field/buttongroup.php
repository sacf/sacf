<?php

/**
 * File: Button Group
 * 
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 */

namespace sacf\field;

/**
 * Field: Button Group
 */

class buttongroup extends base {
	
	protected $defaults = array(
		'choices' => array(),
		'allow_null' => 0,
		'default_value' => '',
		'layout' => 'horizontal',
		'return_format' => 'value',
	); ///< defaults
	
	/**
	* Constructor method
	* 
	* @param string $label Label for this field
	* @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	* @param string $type type of this field
	*/
	public function __construct($label, $name = false, $type = 'button_group') {
		parent::__construct($label, $name, $type);
	}
	
	/**
	* Set availible choices
	*
	* @param array $array <code>array('key' => 'value', 'red' => 'Red')</code>
	* @return void
	*/
	public function choices($array) {
		$this->options['choices'] = $array;
		return $this;
	}
	
	/**
	* Allow Null?
	*
	* @param boolean $bool is null allowed?
	* @return void
	*/
	public function allow_null($bool = true) {
		$this->options['allow_null'] = $bool;
		return $this;
	}

	/**
	 * Appears when creating a new post
	 *
	 * @param String $string key of the default value
	 * @return void
	 */
	public function default_value($string) {
		$this->options['value'] = $string;
		return $this;
	}
	
	/**
	 * Layout
	 *
	 * @param string $string <code>vertical</code> or <code>horizontal</code>
	 * @return void
	 */
	public function layout($string = 'vertical') {
		$this->options['layout'] = $string;
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
	
}
