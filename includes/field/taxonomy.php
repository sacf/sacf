<?php

/**
 * File: Taxonomy
 * 
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 * 
 */

namespace sacf\field;

/**
 * Select Field: Taxonomy
 */
class taxonomy extends base {
	
	protected $defaults = array( 
		'taxonomy' => 'category',
		'field_type' => 'checkbox',
		'allow_null' => 0,
		'add_term' => 0,
		'save_terms' => 0,
		'load_terms' => 0,
		'return_format' => 'object',
		'multiple' => 0,
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false, $type = 'taxonomy') {
		parent::__construct($label, $name, $type);
	}
	
	/**
	 * set the taxonomy to be displayed
	 *
	 * @param string $string <code>category</code>, <code>post_tag</code>, <code>post_format</code>
	 * @return void
	 */
	public function taxonomy($string) {
		$this->options['taxonomy'] = $string;
		return $this;
	}

	/**
	 * set the appearance of this field
	 *
	 * @param string $string <code>checkbox</code>, <code>multi_select</code>, <code>radio</code> or <code>select</code>
	 * @return void
	 */
	public function field_type($string) {
		$this->options['field_type'] = $string;
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
	 * allow new terms to be created whilst editing
	 *
	 * @param integer $bool
	 * @return void
	 */
	public function add_term($bool = 1) {
		$this->options['add_term'] = $bool;
		return $this;
	}

	/**
	 * connect selected terms to the post
	 *
	 * @param integer $bool
	 * @return void
	 */
	public function save_terms($bool = 1) {
		$this->options['save_terms'] = $bool;
		return $this;
	}

	/**
	 * load value from posts terms
	 *
	 * @param integer $bool
	 * @return void
	 */
	public function load_terms($bool = 1) {
		$this->options['load_terms'] = $bool;
		return $this;
	}

	/**
	 * Specify the return format on front end
	 *
	 * @param string $string <code>object</code> or <code>id</code>
	 * @return void
	 */
	public function return_format($string) {
		$this->options['return_format'] = $string;
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

}
