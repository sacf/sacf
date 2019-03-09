<?php

/**
 * Field: Flexible Content
 * @version 2.0.0
 */

namespace sacf\field;

class flexcontent extends base {

	protected $defaults = array(
		'min' => '',
		'max' => '',
		'button_label' => 'Add Module',
	);
	private $sub_fields = array();
	private $layouts = array();

	public function __construct($label, $name = false) {
		parent::__construct($label, $name, 'flexible_content');
	}

	/**
	 * @help: set button label as string
	 */
	public function button_label($string) {
		$this->options['button_label'] = $string;
		return $this;
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
	 * @help: add a flexibel content layout: addLayout('label', 'layout_name', 'display', 'min', 'max')
	 */
	public function add_layout($label, $name = false, $display = 'block', $min = '', $max = '') {
		if (($label instanceof \sacf\flexcontentlayout)) {
			$this->buildLayoutFromClass($label);
		} else {
			$this->buildLayoutFromParameters($label, $name, $display, $min, $max);
		}
		return $this;
	}
	/**
	 * @help: add a field to a layout: add($field_var, 'layout_name')
	 */
	public function add($field, $name) {
		$this->sub_fields[$name]['fields'][] = $field;
		return $this;
	}

	private function buildLayoutFromParameters($label, $name, $display, $min, $max) {
		$this->sub_fields[$name]['label'] = $label;
		$this->sub_fields[$name]['name'] = $name;
		$this->sub_fields[$name]['key'] = \sacf\utils::key_layout($name);
		$this->sub_fields[$name]['display'] = $display;
		$this->sub_fields[$name]['min'] = $min;
		$this->sub_fields[$name]['max'] = $max;
	}

	// create layout from class \sacf\flexcontentlayout
	private function buildLayoutFromClass($layout) {
		// add flexcontent layout
		$this->buildLayoutFromParameters($layout->label, $layout->name, $layout->display, $layout->min, $layout->max);

		// add first tab if module has options
		if (sizeof($layout->fields_options) !== 0) {
			$this->add(new tab($layout->label, $layout->name . '_tab_content'), $layout->name);
		}

		// add fields to layout
		foreach ($layout->fields as $field) {
			$this->add($field, $layout->name);
		}

		// add layout options within options tab
		if (sizeof($layout->fields_options) !== 0) {
			$this->add(new tab(__('Options', 'sacf'), $layout->name . '_tab_options'), $layout->name);
			foreach ($layout->fields_options as $field) {
				$this->add($field, $layout->name);
			}
		}
	}

	/**
	 * creates sub fields array for repeater
	 */
	private function makeSubFields() {
		$layouts = array();
		foreach ($this->sub_fields as $name => $container) {
			$all = array(
				'name' => $name,
				'label' => $container['label'],
				'display' => $container['display'],
			);
			foreach ($container['fields'] as $sub_field) {
				$all['sub_fields'][] = $sub_field->make();
			}
			$layouts[] = $all;
		}
		return $layouts;
	}

	/**
	 * creates field array
	 */
	public function make() {
		$args = parent::make();
		$args['layouts'] = $this->makeSubFields();
		return $args;
	}

	public function make_key($salt) {
		if (isset($this->sub_fields) && !empty($this->sub_fields)) {
			foreach ($this->sub_fields as &$layout) {
				foreach ($layout["fields"] as &$subfield) {
					$subfield->make_key($salt);
				}
			}
		}
		return parent::make_key($salt);
	}

}
