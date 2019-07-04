<?php

/**
 * File: OEmbed
 *
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 *
 */

namespace sacf\field;

/**
 * Field: OEmbed
 */

class oembed extends base {

	protected $defaults = array(
		'width' => '',
		'height' => '',
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'oembed');
	}

	/**
	 * Set the embed width in px
	 *
	 * @param int $int width
	 * @return void
	 */
	public function width($int) {
		$this->options['width'] = $int;
		return $this;
	}
	
	/**
	 * Set the embed height in px
	 *
	 * @param int $int height
	 * @return void
	 */
	public function height($int) {
		$this->options['height'] = $int;
		return $this;
	}
}
