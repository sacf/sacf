<?php

/**
 * File: Relationship
 *
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 *
 */

namespace sacf\field;

/**
 * Select-Field: Relationship
 */
class relationship extends base {

	protected $defaults = array(
		'post_type' => array(),
		'taxonomy' => array(),
		'filters' => array(0 => 'search', 1 => 'post_type', 2 => 'taxonomy'),
		'elements' => '',
		'min' => '',
		'min' => '',
		'return_format' => 'object',
		'show_image' => 0,
	);	 ///< defaults
	private $show_image = false;	///< flag: should a featured image be shown?

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'relationship');
	}

	/**
	 * Set filter by post types
	 *
	 * @param array $array e.g. <code>array ( 0 => 'post', 1 => 'page', 2 => 'attachment' )</code>
	 * @return void
	 */
	public function post_type($array) {
		$this->options['post_type'] = $array;
		return $this;
	}

	/**
	 * Set filter by post taxonomy
	 *
	 * @param array $array e.g. <code>array ( 0 => 'category:category-1', 1 => 'post_tag:tag-1' )</code>
	 * @return void
	 */
	public function taxonomy($array) {
		$this->options['taxonomy'] = $array;
		return $this;
	}

	/**
	 * Set filters
	 *
	 * @param array $array e.g. <code>array ( 0 => 'search', 1 => 'post_type', 2 => 'taxonomy' )</code>
	 * @return void
	 */
	public function filters($array) {
		$this->options['filters'] = $array;
		return $this;
	}

	/**
	 * set displayed elements
	 *
	 * @param array $array e.g. <code>array ( 0 => 'featured_image' )</code>
	 * @return void
	 */
	public function elements($array) {
		$this->options['elements'] = $array;
		return $this;
	}

	/**
	 * set minimum posts as int
	 *
	 * @param int $int
	 * @return void
	 */
	public function min($int) {
		$this->options['min'] = $int;
		return $this;
	}
	
	/**
	 * set maximum posts as int
	 *
	 * @param int $int
	 * @return void
	 */
	public function max($int) {
		$this->options['max'] = $int;
		return $this;
	}

	/**
	 * set return format
	 *
	 * @param string $string <code>object</code> or <code>id</code>
	 * @return void
	 */
	public function return_format($string) {
		$this->options['return_format'] = $string;
		return $this;
	}

	/**
	 * show featured images
	 *
	 * @param boolean $bool 
	 * @return void
	 */
	public function show_image($bool = true) {
		$this->show_image = $bool;
		return $this;
	}

	/**
	 * create the field array
	 *
	 * @return void
	 */
	public function make() {
		$args = parent::make();
		if ($this->show_image) {
			$args['elements'] = array(0 => 'featured_image');
		}
		return $args;
	}

}
