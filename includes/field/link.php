<?php

/**
 * Select field: Link
 * @version 2.0.0
 */

namespace sacf\field;

class link extends base {

    protected $defaults = array(
            'return_format' => 'array',
        );


	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'link');
	}

	/**
	 * @help: how values are returned
	 */
	public function return_format($string) {
		$this->options['return_format'] = $string;
		return $this;
    }

}
