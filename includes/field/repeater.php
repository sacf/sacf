<?php

/**
 * Field: Repeater
 * @version 2.0.0
 */

namespace sacf\field;

class repeater extends base {

	private $sub_fields = array();

	protected $defaults = array(
		'min' => '',
		'max' => '',
		'layout' => 'row',
		'collapsed' => '',
		'button_label' => '',
	);

	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'repeater');
	}

	/**
	 * @help: set minimum rows as int
	 */
	public function min($int) {
		$this->options['min'] = $int;
		return $this;
	}
	/**
	 * @help: set maximum rows as int
	 */
	public function max($int) {
		$this->options['max'] = $int;
		return $this;
	}
	/**
	 * @help: set repeater layout: row, table, block
	 */
	public function layout($string) {
		$this->options['layout'] = $string;
		return $this;
	}

	/**
	 * @help: select a sub field to show when row is collapsed by passing it's field-name
	 * @todo replace collapsed key with
	 */
	public function collapsed($field) {
		// throw error if field is not of type field
		if (!is_subclass_of($field, '\sacf\field\base')) {
			\trigger_error(__('collapsed $field must be a field. In function "', 'sacf') . __FUNCTION__ . '"', E_USER_NOTICE);
		}
		$this->options['collapsed'] = $field;
		return $this;
	}

	/**
	 * @help: set button label as string
	 */
	public function button_label($string) {
		$this->options['button_label'] = $string;
		return $this;
	}

	/**
	 * @help: add a field to the repeater
	 */
	public function add($field) {
		$this->sub_fields[] = $field;
		return $this;
	}

	public function add_layout($layout) {
		foreach ($layout->fields as $field) {
			$this->add($field);
		}
		return $this;
	}

	/**
	 * creates sub fields array for repeater
	 */
	private function makeSubFields() {
		$all = array();
		foreach ($this->sub_fields as $sub_field) {
			$all[] = $sub_field->make();
		}
		return $all;
	}

	/**
	 * creates field array
	 */
	public function make() {
		$args = parent::make();
		$args['sub_fields'] = $this->makeSubFields();
		// get key of collapsed field
		if ($args['collapsed'] != '') {
			$args['collapsed'] = $args['collapsed']->get_key();
		}
		return $args;
	}

	public function make_key($salt) {
		if (isset($this->sub_fields) && !empty($this->sub_fields)) {
			foreach ($this->sub_fields as &$subfield) {
				$subfield->make_key($salt);
			}
		}
		return parent::make_key($salt);
	}

}
