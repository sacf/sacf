<?php

/**
 * The base field to extend from
 * @version 2.0.0
 * @package sacf\fields
 */

namespace sacf\field;

class base {

	public $label;
	public $name;
	public $type;
	public $key;
	protected $array = false;

	// options for all fields
	private $base_args = array(
		'label' => '',
		'name' => '',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => array(
			'width' => '',
			'class' => '',
			'id' => '',
		),
	);
	// options for field type
	protected $defaults = array();
	protected $options = array();

	/**
	 * Creates a new field of undefined type
	 *
	 * @param string $label The field label
	 * @param string $name The fields name you use in get_field('field_name')
	 */
	public function __construct($label, $name = false, $type = '') {
		$this->label = $label;
		$this->name = $name ? sanitize_title($name) : sanitize_title($label);
		$this->type = $type;
		$this->key = \sacf\utils::key_field($this->name);
	}

	/**
	 * @help: set instruction text as string
	 */
	public function instructions($string) {
		$this->base_args['instructions'] = $string;
		return $this;
	}

	/**
	 * @help: set field as required: false, true
	 */
	public function required($bool = true) {
		$this->base_args['required'] = $bool;
		return $this;
	}
	/**
	 * @help: set wrapper options as one array('width' => 50, 'class' => "foo", 'id' => "bar")
	 */
	public function wrapper($width, $class, $id) {
		$this->base_args['wrapper'] = array('width' => $width, 'class' => $class, 'id' => $id);
		return $this;
	}

	/**
	 * @help: add class name for field wrapper
	 */
	public function class ($string) {
		$this->base_args['wrapper']['class'] = $string;
		return $this;
	}

	/**
	 * @help: change id for field wrapper
	 */
	public function id($string) {
		$this->base_args['wrapper']['id'] = $string;
		return $this;
	}

	/**
	 * @help: change width in % for field wrapper
	 */
	public function width($int) {
		$this->base_args['wrapper']['width'] = $int;
		return $this;
	}

	/**
	 * @help: set conditional logic as standard acf array(...)
	 */
	public function conditional_logic($array) {
		$this->base_args['conditional_logic'] = $array;
		return $this;
	}

	// creates a logic array partial
	private function create_conditional_logic($field, $operator, $value) {
		return array('field' => $field, 'operator' => $operator, 'value' => $value);
	}

	/**
	 * @help: show this field if: if($field, operator='==', value='1')
	 */
	public function if ($field, $operator = '==', $value = '1') {
		// throw error if field is not of type field
		if (!is_subclass_of($field, '\sacf\field\base')) {
			\trigger_error(__('Confitional logics $field must be a field. In function "', 'sacf') . __FUNCTION__ . '"', E_USER_NOTICE);
		}
		if (!$this->base_args['conditional_logic']) {
			// clear array if logic is not set until now
			$this->base_args['conditional_logic'] = array();
		}
		$this->base_args['conditional_logic'][][] = $this->create_conditional_logic($field, $operator, $value);
		return $this;
	}

	/**
	 * @help: continue with: and($field, operator='==', value='1')
	 */
	public function  and ($field, $operator = '==', $value = '1') {
		// throw error if field is not of type field
		if (!is_subclass_of($field, '\sacf\field\base')) {
			\trigger_error(__('Confitional logics $field must be a field. In function "', 'sacf') . __FUNCTION__ . '"', E_USER_NOTICE);
		}
		$logic_temp = $this->base_args['conditional_logic'];
		$logic_temp[sizeof($logic_temp) - 1][] = $this->create_conditional_logic($field, $operator, $value);
		$this->base_args['conditional_logic'] = $logic_temp;
		return $this;
	}

	/**
	 * @help: continue with: or($field, operator='==', value='1')
	 */
	public function  or ($field, $operator = '==', $value = '1') {
		// throw error if field is not of type field
		if (!is_subclass_of($field, '\sacf\field\base')) {
			\trigger_error(__('Confitional logics $field must be a field. In function "', 'sacf') . __FUNCTION__ . '"', E_USER_NOTICE);
		}
		$this->if($field, $operator, $value);
		return $this;
	}

	/**
	 * returns the field key
	 */
	public function get_key() {
		return $this->key;
	}

	/**
	 * @help: allows you to add a field directly to a group
	 * @param sacf\group $group
	 */
	public function add_to($group) {
		$group->add($this);
		return $this;
	}

	/**
	 * @help: displays all useful functions for this field
	 */
	public function help() {
		\sacf\utils::help_for_field($this);
		return $this;
	}

	/**
	 * creates field array
	 */
	public function make() {
		// bail early if array is already created
		if ($this->array) {
			return $this->array;
		}

		// set base args
		$this->base_args['label'] = $this->label;
		$this->base_args['name'] = $this->name;
		$this->base_args['type'] = $this->type;
		$this->base_args['key'] = $this->key;

		// merges base args with default field options
		$args = wp_parse_args($this->base_args, $this->defaults);
		// merges filtered defaults with args if key exists
		$settings = \sacf\settings::defaults();
		if (array_key_exists('fields', $settings)) {
			if (array_key_exists($this->base_args['type'], $settings['fields'])) {
				$args = wp_parse_args($settings['fields'][$this->base_args['type']], $args);
			}
		}

		$args['conditional_logic'] = $this->make_conditional_logic();

		// merges field options with args
		return $this->array = wp_parse_args($this->options, $args);
	}

	/**
	 * compiles conditional logic
	 */
	private function make_conditional_logic() {
		$logic = $this->base_args['conditional_logic'];
		if (empty($logic)) {
			return [];
		}
		foreach ($logic as &$or) {
			foreach ($or as &$and) {
				if (!isset($and["field"]->key)) {
					continue;
				}
				$and["field"] = $and["field"]->key;
			}
		}
		return $logic;
	}

	/**
	 * make key for this field
	 */
	public function make_key($salt) {
		if (!isset($this->name)) {
			return $this;
		}
		$this->key = \sacf\utils::key_field($this->key, $salt);
		return $this;
	}

}
