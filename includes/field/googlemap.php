<?php

/**
 * File: Google Map
 *
 * @package sacf\fields
 * @since 2.0.0
 * @version 2.0.0
 */

namespace sacf\field;

/**
 * Field: Google Map
 */
class googlemap extends Base {

	/**
	 * default values
	 *
	 * @var array
	 */
	protected $defaults = array(
		'center_lat' => '',
		'center_lng' => '',
		'zoom' => '',
		'height' => '',
	);

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'google_map');
	}

	/**
	 * set latitude
	 *
	 * @param float $float e.g. <code>-37.81411</code>
	 * @return void
	 */
	public function center_lat($float) {
		$this->options['center_lat'] = $float;
		return $this;
	}

	/**
	 * set longitute
	 *
	 * @param float $float e.g. <code>144.96328</code>
	 * @return void
	 */
	public function center_lng($float) {
		$this->options['center_lng'] = $float;
		return $this;
	}

	/**
	 * set zoom position
	 *
	 * @param int $int e.g. <code>14</code>
	 * @return void
	 */
	public function zoom($int) {
		$this->options['zoom'] = $int;
		return $this;
	}

	/**
	 * set height of map
	 *
	 * @param int $int height of map in pixels
	 * @return void
	 */
	public function height($int) {
		$this->options['height'] = $int;
		return $this;
	}

}
