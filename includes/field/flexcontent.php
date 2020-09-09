<?php

/**
 * File: Flexible Content
 *
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 *
 */

namespace sacf\field;

/**
 * Field: Flexible Content - sort fields in layouts, that can be used flexibly
 */
class flexcontent extends base {

	private $sub_fields = array(); ///< subfields of this field
	private $layouts = array(); ///< layouts of this field
	protected $defaults = array(
		'min' => '',
		'max' => '',
		'display' => 'table',
		'button_label' => 'Add Module',
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param String $name Name for this field (optional - sanitized label if empty)<br>Used in `get_field('field_name')`
	 */
	public function __construct($label, $name = false, $type = 'flexible_content') {
		parent::__construct($label, $name, $type);
	}

	/**
	 * set button label
	 *
	 * @param string $string the "add layout" button label
	 * @return void
	 */
	public function button_label($string) {
		$this->options['button_label'] = $string;
		return $this;
	}

	/**
	 * set display style of flexcontent field
	 *
	 * @param string $string <code>row</code>, <code>table</code>, <code>block</code>
	 * @return void
	 */
	public function display($string) {
		$this->options['display'] = $string;
		return $this;
	}

	/**
	 * set minimum amount of rwos
	 *
	 * @param int $int minimum amount of rows
	 * @return void
	 */
	public function min($int) {
		$this->options['min'] = $int;
		return $this;
	}

	/**
	 * set maximum amount of rwos
	 *
	 * @param int $int maximum amount of rows
	 * @return void
	 */
	public function max($int) {
		$this->options['max'] = $int;
		return $this;
	}

	/**
	 * add a flexible content layout
	 *
	 * @param flexcontentlayout | string $label string or flexcontenlayout object
	 * @param boolean $name Name for this layout (optional - sanitized label if empty)<br>Returned by `get_row_layout()`
	 * @param string $display `block`, `table` or `row`
	 * @param string $min minimum amount of rows of this layout
	 * @param string $max maximum amount of rows of this layout
	 * @return void
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
	 * add a field to a layout: add($field_var, 'layout_name')
	 *
	 * @param object $field the field to add
	 * @param string $name the layout to add it to
	 * @return void
	 */
	public function add($field, $name) {
		$this->sub_fields[$name]['fields'][] = $field;
		return $this;
	}


	/**
	 * Adds a whole flexible content module
	 *
	 * @param class $module Must be of type flexcontentmodule
	 */
	public function add_module($module) {
		if (!($module instanceof \sacf\flexcontentmodule)) {
			return $this;
		}

		// add flexcontent layout
		$this->add_layout($module->label, $module->name, $module->display, $module->min, $module->max);

		// add first tab if module has options
		if (sizeof($module->options) !== 0) {
			$this->add(new tab($module->label, $module->name.'_tab_content'), $module->name);
		}

		// add modules
		foreach ($module->fields as $field) {
			$this->add($field, $module->name);
		}

		// add module options
		if (sizeof($module->options) !== 0) {
			$this->add(new tab('Options', $module->name.'_tab_options'), $module->name);
			foreach ($module->options as $field) {
				$this->add($field, $module->name);
			}
		}

		return $this;
	}


	/**
	 * build a layout from parameters
	 *
	 * @param string $label label of the layout
	 * @param string $name Name for this layout (optional - sanitized label if empty)<br>Returned by`get_row_layout()`
	 * @param string $display `block`<br>`table</`<br>`row</`
	 * @param int $min minimum amount of rows of this layout
	 * @param int $max maximum amount of rows of this layout
	 * @todo shouldn't the name be build from label if false?
	 * @return void
	 */
	private function buildLayoutFromParameters($label, $name, $display, $min, $max) {
		$this->sub_fields[$name]['label'] = $label;
		$this->sub_fields[$name]['name'] = $name;
		$this->sub_fields[$name]['key'] = \sacf\utils::key_layout($name);
		$this->sub_fields[$name]['display'] = $display;
		$this->sub_fields[$name]['min'] = $min;
		$this->sub_fields[$name]['max'] = $max;
	}

	/**
	 * create a layout from class \sacf\flexcontentlayout
	 *
	 * @param flexcontentlayout $layout
	 * @return void
	 */
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
	 * create sub fields array for repeater
	 *
	 * @return void
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
	 * create fields array
	 *
	 * @return void
	 */
	public function make() {
		$args = parent::make();
		$args['layouts'] = $this->makeSubFields();
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
			foreach ($this->sub_fields as &$layout) {
				foreach ($layout["fields"] as &$subfield) {
					$subfield->make_key($salt);
				}
			}
		}
		return parent::make_key($salt);
	}

}
