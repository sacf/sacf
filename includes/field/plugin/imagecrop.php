<?php

/**
 * Image Crop Add-on
 * @source https://github.com/andersthorborg/ACF-Image-Crop
 * @version 2.0.0
 * @package sacf\fields\plugins
 */

namespace sacf\field\plugin;

class imagecrop extends generic {

	protected $defaults = array(
		'crop_type' => 'hard',
		'target_size' => 'thumbnail',
		'width' => '',
		'height' => '',
		'preview_size' => 'medium',
		'force_crop' => 'no',
		'save_in_media_library' => 'yes',
		'retina_mode' => 'no',
		'save_format' => 'id',
		'library' => 'all',
	);

	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'image_crop');
	}

	/**
	 * @help: set the crop-type: hard, min
	 */
	public function crop_type($string) {
		$this->options['crop_type'] = $string;
		return $this;
	}

	/**
	 * @help: set the target-size: thumbnail sizes ar availible, or "custom". if custom is selected, width and height need to be set.
	 */
	public function target_size($string) {
		$this->options['target_size'] = $string;
		return $this;
	}

	/**
	 * @help: restricts file dimensions in px
	 */
	public function width($int) {
		$this->options['width'] = $int;
		return $this;
	}
	/**
	 * @help: restricts file dimensions in px
	 */
	public function height($int) {
		$this->options['height'] = $int;
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
	 * @help: set force-crop: yes, no -> opens crop on selection
	 */
	public function force_crop($string = 'yes') {
		$this->options['force_crop'] = $string;
		return $this;
	}

	/**
	 * @help: save extra image: yes, no - if no, only url is available as return_format
	 */
	public function save_in_media_library($string) {
		$this->options['save_in_media_library'] = $string;
		return $this;
	}

	/**
	 * @help: save extra image: yes, no - should be activated if a retina plugin is active, e.g. WP Retina 2x
	 */
	public function retina_mode($string = 'yes') {
		$this->options['retina_mode'] = $string;
		return $this;
	}

	/**
	 * @help: sets return format: array, url, id
	 */
	public function save_format($string) {
		$this->options['save_format'] = $string;
		return $this;
	}

	/**
	 * @help: sets return format: all, uploadedTo
	 */
	public function library($string) {
		$this->options['library'] = $string;
		return $this;
	}

}
