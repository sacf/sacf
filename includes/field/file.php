<?php

/**
 * Field: File
 * @version 2.0.0
 */

namespace sacf\field;

class file extends base {

    protected $defaults = array(
            'save_format' => 'object', // deprecated
            'return_format' => 'array',
            'library' => 'all',
            'min_size' => '',
            'max_size' => '',
            'mime_types' => '',
        );


	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'file');
	}

	/**
	 * @help: sets return format: array, url, id
	 */
	public function return_format($string) {
		$this->options['return_format'] = $string;
		return $this;
    }

    /**
	 * @help: sets return format: array, url, id
	 */
	public function library($string) {
		$this->options['library'] = $string;
		return $this;
	}

	/**
	 * @help: restricts file size in MB
	 */
	public function min_size($string) {
		$this->options['min_size'] = $string;
		return $this;
	}

    /**
	 * @help: restricts file size in MB
	 */
	public function max_size($string) {
		$this->options['max_size'] = $string;
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
