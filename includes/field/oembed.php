<?php

/**
 * Field: oEmbed
 * @version 2.0.0
 */

namespace sacf\field;

class oembed extends base {

    protected $defaults = array(
            'width' => '',
            'height' => '',
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'oembed');
	}

	/**
	 * @help: sets embed height in px
	 */
	public function width($string) {
		$this->options['width'] = $string;
		return $this;
	}
	/**
	 * @help: sets embed height in px
	 */
	public function height($string) {
		$this->options['height'] = $string;
		return $this;
	}
}
