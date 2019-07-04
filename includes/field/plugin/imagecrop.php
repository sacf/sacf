<?php

/**
 * Image Crop Add-on
 * 
 * @since 2.0.0
 * @version 2.0.0
 * @package sacf/fields/plugins
 */

namespace sacf\field\plugin;

/**
 * Plugin Field: Image Crop  
 * https://github.com/andersthorborg/ACF-Image-Crop
 */
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
	);  ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'image_crop');
	}

	/**
	 * set crop-type
	 *
	 * @param string $string <code>hard</code>, <code>min</code>
	 * @return void
	 */
	public function crop_type($string) {
		$this->options['crop_type'] = $string;
		return $this;
	}

	/**
	 * set the target size
	 *
	 * @param string $string thumbnail sizes ar availible, or "custom". if custom is selected, width and height need to be set.
	 * @return void
	 */
	public function target_size($string) {
		$this->options['target_size'] = $string;
		return $this;
	}

	/**
	 * restrict file width in px
	 *
	 * @param int $int max width in px
	 * @return void
	 */
	public function width($int) {
		$this->options['width'] = $int;
		return $this;
	}
	
	/**
	 * restrict file height in px
	 *
	 * @param int $int max height in px
	 * @return void
	 */
	public function height($int) {
		$this->options['height'] = $int;
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
	 * set force-crop: yes, no -> opens crop on selection
	 *
	 * @param string $string <code>yes</code> or <code>no</code>
	 * @return void
	 */
	public function force_crop($string = 'yes') {
		$this->options['force_crop'] = $string;
		return $this;
	}

	/**
	 * save an extra image. if no, only url is available as return_format
	 *
	 * @param string $string <code>yes</code> or <code>no</code>
	 * @return void
	 */
	public function save_in_media_library($string) {
		$this->options['save_in_media_library'] = $string;
		return $this;
	}

	/**
	 * save a retina image - should be activated if a retina plugin is active, e.g. WP Retina 2x
	 *
	 * @param string $string <code>yes</code> or <code>no</code>
	 * @return void
	 */
	public function retina_mode($string = 'yes') {
		$this->options['retina_mode'] = $string;
		return $this;
	}

	/**
	 * Specify the return format on front end
	 *
	 * @param string $string <code>array</code>, <code>url</code> or <code>id</code>
	 * @return void
	 */
	public function save_format($string) {
		$this->options['save_format'] = $string;
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

}
