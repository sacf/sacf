<?php

/**
 * Select field: Google Map
 * @version 2.0.0
 */

namespace sacf\field;

class googlemap extends Base {

    protected $defaults = array(
            'center_lat' => '',
            'center_lng' => '',
            'zoom' => '',
            'height' => ''
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'google_map');
	}


	/**
	 * @help: set latitute in float: -37.81411
	 */
	public function center_lat($float) {
		$this->options['center_lat'] = $float;
		return $this;
	}
	/**
	 * @help: set longitute in float: 144.96328
	 */
	public function center_lng($float) {
		$this->options['center_lng'] = $float;
		return $this;
	}
	/**
	 * @help: set zoom position in int: 14
	 */
	public function zoom($int) {
		$this->options['zoom'] = $int;
		return $this;
	}
	/**
	 * @help: set height of map in px: 400
	 */
	public function height($int) {
		$this->options['height'] = $int;
		return $this;
	}

}
