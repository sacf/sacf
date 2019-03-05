<?php

/**
 * Layout field: Tab
 * @version 2.0.0
 */

namespace sacf\field;

class tab extends Base {

	protected $defaults = array(
            'placement' => 'top',
            'endpoint' => 0,
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'tab');
	}

	/**
	 * @help: set tab placement: top, left
	 */
	public function placement($string = 'left') {
		$this->options['placement'] = $string;
		return $this;
    }

    /**
	 * @help:
     * // @todo
	 */
	public function endpoint($bool = true) {
		$this->options['endpoint'] = $bool;
		return $this;
	}

}
