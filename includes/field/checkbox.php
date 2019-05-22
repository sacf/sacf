<?php

/**
 * File: Checkbox
 * 
 * @package sacf\fields
 * @since 2.0.0
 * @version 2.0.0
 * 
 */

namespace sacf\field;

/**
 * Field: Checkbox - on or more checkboxes
 */
class checkbox extends base {
	/**
	 * defaults
	 *
	 * @var array
	 */

	protected $defaults = array(
		'choices' => array(),
		'allow_custom' => 0,
		'default_value' => array(),
		'layout' => 'vertical',
		'toggle' => 0,
		'return_format' => 'value',
		'save_custom' => 0,
	);

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'checkbox');
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
	 * Allow 'custom' values to be added
	 *
	 * @param boolean $bool are custom values allowed?
	 * @return void
	 */
	public function allow_custom($bool = true) {
		$this->options['allow_custom'] = $bool;
		return $this;
	}

	/**
	 * Appears when creating a new post
	 *
	 * @param String $string key of the default value
	 * @return void
	 */
	public function default_value($string) {
		$this->options['default_value'] = $string;
		return $this;
	}

	/**
	 * Layout
	 *
	 * @param string $string <code>vertical</code> or <code>horizontal</code>
	 * @return void
	 */
	public function layout($string = 'horizontal') {
		$this->$options['layout'] = $string;
		return $this;
	}
	
	/**
	 * Prepend an extra checkbox to toggle all choices
	 *
	 * @param boolean $bool enable toggle
	 * @return void
	 */
	public function toggle($bool = true) {
		$this->options['toggle'] = $bool;
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
	 * Save 'custom' values to the field's choices
	 *
	 * @param boolean $bool save the 'custom' value
	 * @return void
	 */
	public function save_custom($bool = true) {
		$this->options['save_custom'] = $bool;
		return $this;
	}

}
