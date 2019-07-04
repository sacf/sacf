<?php

/**
 * File: Tab
 * 
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 * 
 */

namespace sacf\field;

/**
 * Layout Field: Tab
 */
class tab extends Base {

	protected $defaults = array(
		'placement' => 'top',
		'endpoint' => 0,
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'tab');
	}

	/**
	 * set tab placement
	 *
	 * @param string $string <code>top</code>, <code>left</code>
	 * @return void
	 */
	public function placement($string = 'left') {
		$this->options['placement'] = $string;
		return $this;
	}


	/**
	 * set endpoint for this tab? 
	 *
	 * @param boolean $bool
	 * @return void
	 * @todo what does this do? 
	 */
	public function endpoint($bool = true) {
		$this->options['endpoint'] = $bool;
		return $this;
	}

}
