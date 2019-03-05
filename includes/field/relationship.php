<?php

/**
 * Select field: Relationship
 * @version 2.0.0
 */

namespace sacf\field;

class relationship extends base {

    protected $defaults = array(
            'post_type' => array(),
            'taxonomy' => array(),
            'filters' => array( 0 => 'search', 1 => 'post_type', 2 => 'taxonomy' ),
            'elements' => '',
            'min' => '',
            'min' => '',
            'return_format' => 'object',
            'show_image' => 0
        );

    private $show_image = false;


	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'relationship');
	}

	/**
	 * @help: set filter by post types eg: array ( 0 => 'post', 1 => 'page', 2 => 'attachment' )
	 */
	public function post_type($array) {
		$this->options['post_type'] = $array;
		return $this;
	}
	/**
	 * @help: set filter by taxonomy eg: array ( 0 => 'category:category-1', 1 => 'post_tag:tag-1' )
	 */
	public function taxonomy($array) {
		$this->options['taxonomy'] = $array;
		return $this;
	}
	/**
	 * @help: set filters eg: array ( 0 => 'search', 1 => 'post_type', 2 => 'taxonomy' )
	 */
	public function filters($array) {
		$this->options['filters'] = $array;
		return $this;
	}
	/**
	 * @help: set displayed elements: array ( 0 => 'featured_image' )
	 */
	public function elements($array) {
		$this->options['elements'] = $array;
		return $this;
	}
	/**
	 * @help: set minimum posts as int
	 */
	public function min($int) {
		$this->options['min'] = $int;
		return $this;
	}
	/**
	 * @help: set maximum posts as int
	 */
	public function max($int) {
		$this->options['max'] = $int;
		return $this;
	}
	/**
	 * @help: sets return format: object, id
	 */
	public function return_format($string) {
		$this->options['return_format'] = $string;
		return $this;
	}

	/**
	 * @help: show featured images: 0, 1, false, true
	 */
	public function show_image($bool = true) {
		$this->show_image = $bool;
		return $this;
	}

	/**
	 * creates field array
	 */
	public function make() {
		$args = parent::make();
		if ($this->show_image) {
			$args['elements'] = array(0 => 'featured_image');
		}
		return $args;
	}

}
