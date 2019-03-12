<?php

/**
 * Layout field: Accordion
 * @version 2.0.0
 * @package sacf\fields
 */

namespace sacf\field;

class accordion extends base {

	protected $defaults = array(
		'open' => 0,
		'multi_expand' => 0,
		'endpoint' => 0,
	);

	public function __construct($label, $name = '') {
		parent::__construct($label, $name, 'accordion');
	}

	/**
	 * @help:
	 * // @todo
	 */
	public function open($bool = true) {
		$this->options['open'] = $bool;
		return $this;
	}

	/**
	 * @help:
	 * // @todo
	 */
	public function multi_expand($bool = true) {
		$this->options['multi_expand'] = $bool;
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
