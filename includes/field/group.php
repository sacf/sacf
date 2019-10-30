<?php

/**
 * File: Group
 *
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 */

namespace sacf\field;

/**
 * Layout field: Group
 */
class group extends base {

	private $sub_fields = array(); ///< subfields of this group

	protected $defaults = array(
		'layout' => 'block',
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false, $type = 'group') {
		parent::__construct($label, $name, $type);
	}
	/**
	 * Specify the style used to render the selected fields
	 *
	 * @param string $string <code>block</code>, <code>table</code> or <code>row</code>
	 * @return void
	 */
	public function layout($string) {
		$this->options['layout'] = $string;
		return $this;
	}

	/**
	 * Add a field to the group
	 *
	 * @param object $field the field to add
	 * @return void
	 */
	public function add($field) {
		$this->sub_fields[] = $field;
		return $this;
	}

	/**
	 * creates sub fields array for group
	 *
	 * @return void
	 */
	private function makeSubFields() {
		$fields = array();
		foreach ($this->sub_fields as $field) {
			$fields[] = $field->make();
		}
		return $fields;
	}

	/**
	 * create fields array
	 *
	 * @return void
	 */
	public function make() {
		$args = parent::make();
		$args['sub_fields'] = $this->makeSubFields();
		return $args;
	}

	/**
	 * create keys for subfields
	 *
	 * @param string $salt salt from parent
	 * @return void
	 */
	public function make_key($salt) {
		if (isset($this->sub_fields) && !empty($this->sub_fields)) {
			foreach ($this->sub_fields as &$subfield) {
				$subfield->make_key($salt);
			}
		}
		return parent::make_key($salt);
	}

}
