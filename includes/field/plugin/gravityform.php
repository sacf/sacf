<?php

/**
 * GravityForms Field
 * @source https://wordpress.org/plugins/acf-gravityforms-add-on/
 * @since 2.0.0
 * @version 2.0.0
 * @package sacf\fields\plugins
 */

namespace sacf\field\plugin;

/**
 * Plugin Field: gravityform
 */
class gravityform extends generic {

	/**
	 * default values
	 *
	 * @var array
	 */
	protected $defaults = array(
		'return_format' => 'post_object',
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
		parent::__construct($label, $name, 'forms');
	}

	/**
	 * Specify the return format on front end
	 *
	 * @param string $string <code>post_object</code> or <code>id</code>
	 * @return void
	 */
	public function return_format($string = 'id') {
		$this->options['return_format'] = $string;
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

}
