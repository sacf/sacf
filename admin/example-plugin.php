<?php

/**
 * GravityForms Field
 */

namespace sacf\field\plugin;

class gravityform extends generic {

	protected $defaults = array(
		'return_format' => 'post_object',
		'allow_null' => 0,
		'multiple' => 0,
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'forms');
	}

	/**
	 * sets return format: 
	 *
	 * @param string $string `post_object` or `id`
	 * @return void
	 */
	public function return_format($string = 'id') {
		$this->options['return_format'] = $string;
		return $this;
	}

	/**
	 * is null allowed?
	 *
	 * @param integer $bool null allowded?
	 * @return void
	 */
	public function allow_null($bool = 1) {
		$this->options['allow_null'] = $bool;
		return $this;
	}
	
	/**
	 * set if multiple selections are allowed
	 *
	 * @param integer $bool multiple selections?
	 * @return void
	 */
	public function multiple($bool = 1) {
		$this->options['multiple'] = $bool;
		return $this;
	}

}
