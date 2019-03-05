<?php

/**
 * Field: Password
 * @version 2.0.0
 */

namespace sacf\field;

class password extends text {

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'password');
	}

}
