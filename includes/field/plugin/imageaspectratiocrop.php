<?php

/**
 * Image Aspect Ratio Crop Add-on
 * 
 * @since 2.0.2
 * @version 2.0.2
 * @package sacf/fields/plugins
 */

namespace sacf\field\plugin;

use sacf\field\image as image;

/**
 * Plugin Field: Image Aspect Ratio Crop  
 * https://wordpress.org/plugins/acf-image-aspect-ratio-crop
 */
class imageaspectratiocrop extends image
{

	protected $defaults = array(
		'crop_type' => 'aspect_ratio',
		'aspect_ratio_width' => '',
		'aspect_ratio_height' => '',
		'return_format' => 'id',
		'preview_size' => 'thumbnail',
		'library' => 'all',
		'min_width' => '',
		'min_height' => '',
		'min_size' => '',
		'max_width' => '',
		'max_height' => '',
		'max_size' => '',
		'mime_types' => '',
	);  ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 * @param string $type type of this field
	 */
	public function __construct($label, $name = false, $type = 'image_aspect_ratio_crop')
	{
		parent::__construct($label, $name, $type);
	}

	/**
	 * set crop-type
	 *
	 * @param string $string <code>aspect_ratio</code>, <code>pixel_size</code> or <code>free_crop</code>
	 * @return void
	 */
	public function crop_type($string)
	{
		$this->options['crop_type'] = $string;
		return $this;
	}

	/**
	 * set aspect ratio width - must be set when crop-type is <code>aspect_ratio</code> or <code>pixel_size</code>
	 *
	 * @param int $int width to be used for the aspect ratio
	 * @return void
	 */
	public function aspect_ratio_width($int)
	{
		$this->options['aspect_ratio_width'] = $int;
		return $this;
	}

	/**
	 * set aspect ratio width - must be set when crop-type is <code>aspect_ratio</code> or <code>pixel_size</code>
	 *
	 * @param int $int height to be used for the aspect ratio
	 * @return void
	 */
	public function aspect_ratio_height($int)
	{
		$this->options['aspect_ratio_height'] = $int;
		return $this;
	}

	/**
	 * shorthand to set aspect ratio
	 *
	 * @param int $width width to be used for the aspect ratio
	 * @param int $height height to be used for the aspect ratio
	 * @return void
	 */
	public function aspect_ratio($width, $height)
	{
		$this->aspect_ratio_width($width);
		$this->aspect_ratio_height($height);
		return $this;
	}

	/**
	 * before we call the parent:make function take care of some conditional stuff: 
	 * * if <code>crop_type</code> is <code>pixel_size</code>, set min width and height to aspect ratio
	 * * if <code>crop_type</code> is <code>pixel_size</code> or <code>aspect_ratio</code>, aspect_ratio_width and aspect_ratio_height are mandatory
	 * 
	 * @return void
	 */
	public function make()
	{

		// 	\trigger_error('Make Crop Field ' . $this->name, E_USER_NOTICE);
		$crop_type = isset($this->options['crop_type']) ? $this->options['crop_type'] : $this->defaults['crop_type'];

		// show an error if we aren't in free crop mode, but don't have ratio-sizes either
		if ($crop_type != 'free_crop') {
			if (!isset($this->options['aspect_ratio_width']) || !is_int($this->options['aspect_ratio_width'])) {
				\trigger_error(sprintf(__('Crop-type of "%s" needs an aspect_ratio_width.', 'sacf'), $crop_type), E_USER_NOTICE);
			} else {
				// if the crop_type is pixel_size and we have a width set it as min width
				if ($crop_type == 'pixel_size') {
					$this->options['min_width'] = $this->options['aspect_ratio_width'];
				}
			}
			if (!isset($this->options['aspect_ratio_height']) || !is_int($this->options['aspect_ratio_height'])) {
				\trigger_error(sprintf(__('Crop-type of "%s" needs an aspect_ratio_height.', 'sacf'), $crop_type), E_USER_NOTICE);
			} else {
				// if the crop_type is pixel_size and we have a height set it as min height
				if ($crop_type == 'pixel_size') {
					$this->options['min_height'] = $this->options['aspect_ratio_height'];
				}
			}
		}

		return parent::make();
	}
}
