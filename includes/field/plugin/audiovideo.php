<?php

/**
 * HTML 5 Audio/Video Field
 * 
 * @since 2.0.0
 * @version 2.0.0
 * @package sacf/fields/plugins
 */

namespace sacf\field\plugin;

/**
 * Select Field: Audio / Video  
 * https://github.com/ipsips/acf-audio-video
 */
class audiovideo extends generic {

	protected $defaults = array(
		'library' => 'all',
		'general_type' => 'both',
		'allowed_types' => '',
		'min_size' => '',
		'max_size' => '',
		'return_format' => 'html',
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 * @param string $type type of this field
	 */
	public function __construct($label, $name = false, $type = 'audioVideo') {
		parent::__construct($label, $name, $type);
	}
	

	/**
	 * set which sources are allowed
	 *
	 * @param string $string <code>all</code> or <code>uploadedTo</code>
	 * @return void
	 */
	public function library($string = 'uploadedTo') {
		$this->options['library'] = $string;
		return $this;
	}

	/**
	 * which type of media is allowed
	 *
	 * @param string $string <code>both</code>, <code>video</code>, <code>audio</code>
	 * @return void
	 */
	public function general_type($string) {
		$this->options['general_types'] = $string;
		return $this;
	}

	/**
	 * comma seperated list of allowed file types
	 *
	 * @param string $string e.g. <code>mp3, mp4, mov</code>
	 * @return void
	 */
	public function allowed_types($string = '') {
		$this->options['allowed_types'] = $string;
		return $this;
	}

	/**
	 * set minimum file size in MB
	 *
	 * @param int $int min file size
	 * @return void
	 */
	public function min_size($int) {
		$this->options['min_size'] = $int;
		return $this;
	}

	/**
	 * set maximum file size in MB
	 *
	 * @param int $int max file size
	 * @return void
	 */
	public function max_size($int) {
		$this->options['max_size'] = $int;
		return $this;
	}

	/**
	 * set return format
	 *
	 * @param string $string <code>html</code>, <code>array</code>, <code>shortcode</code>
	 * @return void
	 */
	public function return_format($string = 'array') {
		$this->options['return_format'] = $string;
		return $this;
	}
}
