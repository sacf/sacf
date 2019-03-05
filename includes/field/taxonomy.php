<?php

/**
 * Select field: Taxonomy
 * @version 2.0.0
 */

namespace sacf\field;

class taxonomy extends base {

    protected $defaults = array(
            'taxonomy' => 'category',
            'field_type' => 'checkbox',
            'allow_null' => 0,
            'add_term' => 0,
            'save_terms' => 0,
            'load_terms' => 0,
            'return_format' => 'object',
            'multiple' => 0
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'taxonomy');
	}


	/**
	 * @help: sets the taxonomy to be displayed: category, post_tag, post_format
	 */
	public function taxonomy($string) {
		$this->options['taxonomy'] = $string;
		return $this;
	}
	/**
	 * @help: sets appearance of this field: checkbox, multi_select, radio, select
	 */
	public function field_type($string) {
		$this->options['field_type'] = $string;
		return $this;
	}
	/**
	 * @help: allow null: 0, 1
	 */
	public function allow_null($bool = 1) {
		$this->options['allow_null'] = $bool;
		return $this;
	}
	/**
	 * @help: allow new terms to be created whilst editing: 0, 1
	 */
	public function add_term($bool = 1) {
		$this->options['add_term'] = $bool;
		return $this;
	}/**
	 * @help: connect selected terms to the post: 0, 1
	 */
	public function save_terms($bool = 1) {
		$this->options['save_terms'] = $bool;
		return $this;
	}
	/**
	 * @help: load value from posts terms: 0, 1
	 */
	public function load_terms($bool = 1) {
		$this->options['load_terms'] = $bool;
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
	 * @help: allow multiple selections: 0, 1
	 */
	public function multiple($bool = 1) {
		$this->options['multiple'] = $bool;
		return $this;
	}

}
