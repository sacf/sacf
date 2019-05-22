<?php

/**
 * File: Repeater
 *
 * @package sacf\fields
 * @since 2.0.0
 * @version 2.0.0
 *
 */

namespace sacf\field;

/**
 * Input-Field: Repeater
 */
class repeater extends base {

	/**
	 * store the subfields
	 *
	 * @var array
	 */
	private $sub_fields = array();

	/**
	 * defaults
	 *
	 * @var array
	 */
	protected $defaults = array(
		'min' => '',
		'max' => '',
		'layout' => 'row',
		'collapsed' => '',
		'button_label' => '',
	);

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 */
	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'repeater');
	}

	/**
	 * set miminum amount of rows
	 *
	 * @param int $int amount of min rows
	 * @return void
	 */
	public function min($int) {
		$this->options['min'] = $int;
		return $this;
	}
	
	/**
	 * set maximum amount of rows
	 *
	 * @param int $int amount of max rows
	 * @return void
	 */
	public function max($int) {
		$this->options['max'] = $int;
		return $this;
	}

	/**
	 * set layout of repeater
	 *
	 * @param string $string <code>row</code>, <code>table</code>, <code>block</code>
	 * @return void
	 */
	public function layout($string) {
		$this->options['layout'] = $string;
		return $this;
	}


	/**
	 * select a subfield to show when row is collapsed
	 *
	 * @param sacf\field $field 
	 * @return void
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
	 * set button label as string
	 *
	 * @param string $string button label
	 * @return void
	 */
	public function button_label($string) {
		$this->options['button_label'] = $string;
		return $this;
	}

	/**
	 * add a field to the repeater
	 *
	 * @param sacf\field $field
	 * @return void
	 */
	public function add($field) {
		$this->sub_fields[] = $field;
		return $this;
	}

	/**
	 * add a new layout 
	 *
	 * @param $layout $layout
	 * @return void
	 * @todo what does this function do here?
	 */
	public function add_layout($layout) {
		foreach ($layout->fields as $field) {
			$this->add($field);
		}
		return $this;
	}

	/**
	 * create repeater subfields
	 *
	 * @return void
	 */
	private function makeSubFields() {
		$all = array();
		foreach ($this->sub_fields as $sub_field) {
			$all[] = $sub_field->make();
		}
		return $all;
	}

	/**
	 * create field array
	 *
	 * @return void
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

	/**
	 * also create subfield keys
	 *
	 * @param string $salt salt the subfields
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
