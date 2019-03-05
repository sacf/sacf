<?php

/**
 * Layout field: Range
 * @version 2.0.0
 * @since 2.0.0
 */

namespace sacf\field;

class range extends text {

    protected $defaults = array(
        'min' => '',
        'max' => '',
        'step' => '',
        'default_value' => ''
    );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'range');
	}

    /**
	 * @help: sets a default value
	 */
	public function default_value($int) {
		$this->options['default_value'] = $int;
		return $this;
	}

	/**
	 * @help: set minimum value in int
	 */
	public function min($int) {
		$this->options['min'] = $int;
		return $this;
	}
	/**
	 * @help: set maximum value in int
	 */
	public function max($int) {
		$this->options['max'] = $int;
		return $this;
	}
	/**
	 * @help: set stepper value in int
	 */
	public function step($int) {
		$this->options['step'] = $int;
		return $this;
	}
}
