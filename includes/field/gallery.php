<?php

/**
 * Field: Gallery
 * @version 2.0.0
 */

namespace sacf\field;

class gallery extends Base {

    protected $defaults = array(
            'min' => '',
            'max' => '',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'gallery');
	}

	/**
	 * @help: sets mimimum image amount in int
	 */
	public function min($int) {
		$this->options['min'] = $int;
		return $this;
	}
	/**
	 * @help: sets maximum image amount in int
	 */
	public function max($int) {
		$this->options['max'] = $int;
		return $this;
	}
	/**
	 * @help: sets the preview size for backend view: thumbnail, medium, large, full ...
	 */
	public function preview_size($string) {
		$this->options['preview_size'] = $string;
		return $this;
	}
	/**
	 * @help: sets return format: all, uploadedTo
	 */
	public function library($string) {
		$this->options['library'] = $string;
		return $this;
	}
	/**
	 * @help: restricts file dimensions in px
	 */
	public function min_width($int) {
		$this->options['min_width'] = $int;
		return $this;
	}
	/**
	 * @help: restricts file dimensions in px
	 */
	public function min_height($int) {
		$this->options['min_height'] = $int;
		return $this;
	}
	/**
	 * @help: restricts file size in MB
	 */
	public function min_size($int) {
		$this->options['min_size'] = $int;
		return $this;
	}
	/**
	 * @help: restricts file dimensions in px
	 */
	public function max_width($int) {
		$this->options['max_width'] = $int;
		return $this;
	}
	/**
	 * @help: restricts file dimensions in px
	 */
	public function max_height($int) {
		$this->options['max_height'] = $int;
		return $this;
	}
	/**
	 * @help: restricts file size in MB
	 */
	public function max_size($int) {
		$this->options['max_size'] = $int;
		return $this;
	}
	/**
	 * @help: restricts to file types: 'png, jpg, jpeg, ...'
	 */
	public function mime_types($string) {
		$this->options['mime_types'] = $string;
		return $this;
    }

}
