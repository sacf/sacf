<?php

/**
 * Select field: Color Picker
 * @version 2.0.0
 */

namespace sacf\field;

class colorpicker extends base {

    protected $defaults = array(
            'default_value' => '',
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'color_picker');
    }

	/**
	 * @help: set default color value as stringt in hex, eg: #333333
	 */
	public function default_value($string) {
		$this->options['default_value'] = $string;
		return $this;
	}

}
