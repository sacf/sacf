<?php

/**
 * Field: WYSIWYG
 * @version 2.0.0
 */

namespace sacf\field;

class wysiwyg extends base {

    protected $defaults = array(
            'default_value' => '',
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'wysiwyg');
	}

	/**
	 * @help: set a default text
	 */
	public function default_value($string) {
		$this->options['default_value'] = $string;
		return $this;
	}
	/**
	 * @help: set tabs availability: all, visual, text
	 */
	public function tabs($string = 'visual') {
		$this->options['tabs'] = $string;
		return $this;
	}
	/**
	 * @help: set toolbar: full, basic, (or a custom made one eg: minimal)
	 */
	public function toolbar($string = 'basic') {
		$this->options['toolbar'] = $string;
		return $this;
    }
	/**
	 * @help: set media upload availability: 1, 0, true, false
	 */
	public function media_upload($bool = false) {
		$this->options['media_upload'] = $bool;
		return $this;
	}

}
