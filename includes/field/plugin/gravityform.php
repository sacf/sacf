<?php

/**
 * GravityForms Field
 * @source https://wordpress.org/plugins/acf-gravityforms-add-on/
 * @version 2.0.0
 * @package sacf\fields\plugins
 */

namespace sacf\field\plugin;

class gravityform extends generic {

	protected $defaults = array(
		'return_format' => 'post_object',
		'allow_null' => 0,
		'multiple' => 0,
	);

	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'forms');
	}

	/**
	 * @help: sets return format: post_object | id
	 */
	public function return_format($string = 'id') {
		$this->options['return_format'] = $string;
		return $this;
	}

	/**
	 * @help: sets if null is allowed
	 */
	public function allow_null($bool = 1) {
		$this->options['allow_null'] = $bool;
		return $this;
	}
	/**
	 * @help: set if multiple selections are allowed
	 */
	public function multiple($bool = 1) {
		$this->options['multiple'] = $bool;
		return $this;
	}

}
