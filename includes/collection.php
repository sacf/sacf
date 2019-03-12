<?php
/**
 * Creates a new collection of fields easier reuse
 *
 * @todo not quite there yet
 *
 * @version 2.0.0
 * @since 2.0.0
 * @package sacf
 */

namespace sacf;

class collection {

	public $name = '';
	public $fields = array();

	/**
	 * Creates a reusable field collection
	 * @param string $name The slug
	 */
	public function __construct($name = false) {
		$this->name = sanitize_title($name);
		return $this;
	}

	// add a field
	public function add($field) {
		$this->fields[] = $field;
		return $this;
	}
}
