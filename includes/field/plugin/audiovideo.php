<?php

/**
 * HTML 5 Audio/Video Field
 * @source https://github.com/ipsips/acf-audio-video
 * @version 2.0.0
 */

namespace sacf\field\plugin;

class audiovideo extends generic {

    protected $defaults = array(
            'library' => 'all',
			'general_type' => 'both',
			'allowed_types' => '',
			'min_size' => '',
			'max_size' => '',
			'return_format' => 'html',
        );

    public function __construct($label, $name=false) {
        parent::__construct($label, $name, 'audioVideo');
    }

	/**
     * @help: sets which sources are allowed: all | uploadedTo
     */
    public function library($string = 'uploadedTo') {
        $this->options['library'] = $string;
        return $this;
	}

	/**
     * @help: which type is allowed: both | video | audio
     */
    public function general_type($string) {
        $this->options['general_types'] = $string;
        return $this;
	}

	/**
     * @help: sets which sources are allowed, comma seperated: mp3, mp4, mov ...
     */
    public function allowed_types($string = '') {
        $this->options['allowed_types'] = $string;
        return $this;
	}

	/**
     * @help: sets min file size as int in MB
     */
    public function min_size($int) {
        $this->options['min_size'] = $int;
        return $this;
	}

	/**
     * @help: sets max file size as int in MB
     */
    public function max_size($int) {
        $this->options['max_size'] = $int;
        return $this;
    }

    /**
     * @help: sets return format: html | array | shortcode
     */
    public function return_format($string = 'array') {
        $this->options['return_format'] = $string;
        return $this;
    }
}
