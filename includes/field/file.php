<?php

/**
 * File: File
 * 
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 * 
 */

namespace sacf\field;

/**
 * Select Field: Filed
 */
class file extends base {

	protected $defaults = array( 
		'save_format' => 'object',
		'return_format' => 'array',
		'library' => 'all',
		'min_size' => '',
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
		parent::__construct($label, $name, 'file');
	}

	/**
	 * Specify the return format on front end
	 *
	 * @param string $string <code>array</code>, <code>url</code> or <code>id</code>
	 * @return void
	 */
	public function return_format($string) {
		$this->options['return_format'] = $string;
		return $this;
	}

	/**
	 * Limit the media library choice
	 *
	 * @param string $string <code>all</code> or <code>uploadedTo</code>
	 * @return void
	 */
	public function library($string) {
		$this->options['library'] = $string;
		return $this;
	}

	/**
	 * Restrict which files can be uploaded (min size)
	 *
	 * @param int $int minimum filesize in MB
	 * @return void
	 */
	public function min_size($int) {
		$this->options['min_size'] = $int;
		return $this;
	}

	/**
	 * Restrict which files can be uploaded (max size)
	 *
	 * @param int $int maximum filesize in MB
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
