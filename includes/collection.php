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

/**
 * a collection of sacf fields
 */
class collection {

	public $name = ''; ///< name of this collection
	public $fields = array(); ///< fields of this collection

	/**
	 * Creates a reusable field collection
	 * @param string $name slug
	 */
	public function __construct($name = false) {
		$this->name = sanitize_title($name);
		return $this;
	}

	/**
	 * add a field 
	 *
	 * @param sacf\\field $field
	 * @return void
	 */
	public function add($field) {
		$this->fields[] = $field;
		return $this;
	}
}
