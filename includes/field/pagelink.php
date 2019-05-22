<?php

/**
 * File: Pagelink
 * 
 * @package sacf\fields
 * @since 2.0.0
 * @version 2.0.0
 * @todo allow boolean values in different formats?
 * 
 */


namespace sacf\field;

/**
 * Select Field: Pagelink
 */
class pagelink extends base {

	/**
	 * default values
	 *
	 * @var array
	 */
	protected $defaults = array(
		'post_type' => array(),
		'taxonomy' => array(),
		'allow_null' => 0,
		'multiple' => 0,
	);

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'page_link');
	}

	/**
	 * filter possible post types
	 *
	 * @param array $array e.g. <code>array ( 0 => 'post', 1 => 'page', 2 => 'attachment' )</code>
	 * @return void
	 */
	public function post_type($array) {
		$this->options['post_type'] = $array;
		return $this;
	}

	/**
	 * filter possible taxonomies
	 *
	 * @param array $array e.g. <code>array ( 0 => 'category:category-1', 1 => 'post_tag:tag-1' )</code>
	 * @return void
	 */
	public function taxonomy($array) {
		$this->options['taxonomy'] = $array;
		return $this;
	}

	/**
	 * is null allowed
	 *
	 * @param boolean $bool null allowed
	 * @return void
	 */
	public function allow_null($bool) {
		$this->options['allow_null'] = $bool;
		return $this;
	}
	
	/**
	 * are multiple values allowed
	 *
	 * @param boolean $bool multiple allowed
	 * @return void
	 */
	public function multiple($bool) {
		$this->options['multiple'] = $bool;
		return $this;
	}
}
