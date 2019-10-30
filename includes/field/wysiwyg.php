<?php

/**
 * File: Wysiwyg
 *
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 *
 */

namespace sacf\field;

/**
 * Input Field: wysiwyg
 */

class wysiwyg extends base {

	protected $defaults = array( 
		'default_value' => '',
		'tabs' => 'all',
		'toolbar' => 'full',
		'media_upload' => 1,
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false, $type = 'wysiwyg') {
		parent::__construct($label, $name, $type);
	}

	/**
	 * set a default text
	 *
	 * @param string $string default text
	 * @return void
	 */
	public function default_value($string) {
		$this->options['default_value'] = $string;
		return $this;
	}

	/**
	 * set Tabs availability
	 *
	 * @param string $string <code>all</code>, <code>visual</code>, <code>text</code>
	 * @return void
	 */
	public function tabs($string = 'visual') {
		$this->options['tabs'] = $string;
		return $this;
	}

	/**
	 * set a toolbar
	 *
	 * @param string $string <code>full</code>, <code>basic</code>, (or a custom made one eg: <code>minimal</code>)
	 * @return void
	 */
	public function toolbar($string = 'basic') {
		$this->options['toolbar'] = $string;
		return $this;
	}

	/**
	 * set media upload ability
	 *
	 * @param boolean $bool is media upload possible
	 * @return void
	 */
	public function media_upload($bool = false) {
		$this->options['media_upload'] = $bool;
		return $this;
	}

}
