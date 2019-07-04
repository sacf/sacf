<?php

/**
 * File: Image
 *
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 */

namespace sacf\field;

/**
 * Select field: Image
 */
class image extends base {

	protected $defaults = array(
		'return_format' => 'array',
		'preview_size' => 'thumbnail',
		'library' => 'all',
		'min_width' => '',
		'min_height' => '',
		'min_size' => '',
		'max_width' => '',
		'max_height' => '',
		'max_size' => '',
		'mime_types' => '',
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'image');
	}

	/**
	 * Specify the return format on front end
	 *
	 * @param string $string <code>array</code>, <code>url</code> or <code>id</code>
	 * @return void
	 */
	public function return_format($string = 'id') {
		$this->options['return_format'] = $string;
		return $this;
	}

	/**
	 * set the preview size for backend view
	 *
	 * @param string $string <code>thumbnail</code>, <code>medium</code>, <code>large</code>, <code>full</code>...
	 * @return void
	 */
	public function preview_size($string) {
		$this->options['preview_size'] = $string;
		return $this;
	}

	/**
	 * Limit the media library choice
	 *
	 * @param String $string <code>all</code> or <code>uploadedTo</code>
	 * @return void
	 */
	public function library($string = 'uploadedTo') {
		$this->options['library'] = $string;
		return $this;
	}

	/**
	 * Restrict which files can be uploaded (min width)
	 *
	 * @param int $int minimum width in pixels
	 * @return void
	 */
	public function min_width($int) {
		$this->options['min_width'] = $int;
		return $this;
	}

	/**
	 * Restrict which files can be uploaded (min height)
	 *
	 * @param int $int minimum height in pixels
	 * @return void
	 */
	public function min_height($int) {
		$this->options['min_height'] = $int;
		return $this;
	}

	/**
	 * Restrict which files can be uploaded (min size)
	 *
	 * @param int $int minimum size in MB
	 * @return void
	 */
	public function min_size($int) {
		$this->options['min_size'] = $int;
		return $this;
	}

	/**
	 * Restrict which files can be uploaded (max width)
	 *
	 * @param int $int maximum width in pixels
	 * @return void
	 */
	public function max_width($int) {
		$this->options['max_width'] = $int;
		return $this;
	}

	/**
	 * Restrict which files can be uploaded (min height)
	 *
	 * @param int $int maximum height in pixels
	 * @return void
	 */
	public function max_height($int) {
		$this->options['max_height'] = $int;
		return $this;
	}

	/**
	 * Restrict which files can be uploaded (max size)
	 *
	 * @param int $int maximum size in MB
	 * @return void
	 */
	public function max_size($int) {
		$this->options['max_size'] = $int;
		return $this;
	}

	/**
	 * Comma separated list of allowed filetypes.
	 *
	 * @param string $string comma seperated list of file types, e.g. <code>jpg, gif, png</code>
	 * @return void
	 */
	public function mime_types($string) {
		$this->options['mime_types'] = $string;
		return $this;
	}

}
