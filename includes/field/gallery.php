<?php

/**
 * File: Gallery
 * 
 * @package sacf\fields
 * @since 2.0.0
 * @version 2.0.0
 */

namespace sacf\field;

/**
 * Field: Gallery
 */
class gallery extends Base {

	/**
	 * default values
	 *
	 * @var array
	 */
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

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'gallery');
	}

	/**
	 * set the minimum amount of images
	 *
	 * @param int $int min amount of images
	 * @return void
	 */
	public function min($int) {
		$this->options['min'] = $int;
		return $this;
	}

	/**
	 * set the maximum amount of images
	 *
	 * @param int $int maximum amount of images
	 * @return void
	 */
	public function max($int) {
		$this->options['max'] = $int;
		return $this;
	}

	/**
	 * set the preview size for the backend (thumbnail, large, full, etc.)
	 *
	 * @param string $string name of image size as defined via <code>add_image_size()</code>
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
	public function library($string) {
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
