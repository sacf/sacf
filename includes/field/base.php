<?php

/**
 * File: Base Field
 *
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.6
 *
 */

namespace sacf\field;

/**
 * The base field to extend from
 */
class base {


	public $label; 	///< label for this field
	public $name; 	///< name for this field
	public $type; 	///< type of this field
	public $key; 	///< key for this field
	protected $array = false; ///< the field array
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
		'translations' => 'translate',
	);	///< base options for all fields

	protected $defaults = array(); ///< defaults
	protected $options = array(); ///< options


	/**
	 * Create a new field of a given type
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 * @param string $type type of this field
	 */
	public function __construct($label, $name = false, $type = '') {
		$this->label = $label;
		$this->name = $name ? sanitize_title($name) : sanitize_title($label);
		$this->type = $type;
		$this->key = \sacf\utils::key_field($this->name);
	}

	/**
	 * set instructions for this field
	 *
	 * @param string $string instructions
	 * @return self
	 */
	public function instructions($string) {
		$this->base_args['instructions'] = $string;
		return $this;
	}

	/**
	 * set field as required
	 *
	 * @param boolean $bool is required
	 * @return self
	 */
	public function required($bool = true) {
		$this->base_args['required'] = $bool;
		return $this;
	}

	/**
	 * set wrapper options
	 *
	 * @param int $width width in px
	 * @param string $class css class names
	 * @param string $id css id
	 * @return self
	 */
	public function wrapper($width, $class, $id) {
		$this->base_args['wrapper'] = array('width' => $width, 'class' => $class, 'id' => $id);
		return $this;
	}

	/**
	 * add class name for field wrapper
	 *
	 * @param string $string css class names
	 * @return self
	 */
	public function class($string) {
		$this->base_args['wrapper']['class'] = $this->base_args['wrapper']['class'].' '.$string;
		return $this;
	}

	/**
	 * change id for field wrapper
	 *
	 * @param string $string css id
	 * @return self
	 */
	public function id($string) {
		$this->base_args['wrapper']['id'] = $string;
		return $this;
	}


	/**
	 * Add field specific css, eg: {{field}} { width: 50%; float: left; clear: none; }
	 *
	 * @param string $css
	 * @return self
	 */
	public function css($css) {
		$css = str_replace("{{field}}", '.acf-field[data-name="'.$this->name.'"]', $css);
		add_action('acf/input/admin_head', function() use ($css){
			echo '<style type="text/css">';
			echo $css;
			echo '</style>';
		});
		return $this;
	}

	/**
	 * set width in % for field wrapper
	 *
	 * @param int $int
	 * @return self
	 */
	public function width($int) {
		$this->base_args['wrapper']['width'] = $int;
		return $this;
	}

	/**
	 * set polylang translation logic - find out mor here: https://polylang.pro/doc/working-with-acf-pro/#customize-acf-fields
	 *
	 * @param string $string  <code>ignore</code>, <code>copy_once</code>, <code>translate</code> (default), <code>translate_once</code>, <code>sync</code>
	 * @return self
	 */
	public function translations($string) {
		$this->base_args['translations'] = $string;
		return $this;
	}

	/**
	 * set conditional logic as standard acf array
	 *
	 * @param array $array conditional logic as acf array
	 * @return self
	 */
	public function conditional_logic($array) {
		$this->base_args['conditional_logic'] = $array;
		return $this;
	}

	/**
	 * create a logic partial
	 *
	 * @param sacf\field $field
	 * @param string $operator
	 * @param string $value
	 * @return void
	 */
	private function create_conditional_logic($field, $operator, $value) {
		return array('field' => $field, 'operator' => $operator, 'value' => $value);
	}

	/**
	 * conditional "if" logic. <code>if($field, operator='==', value='1')</code>
	 *
	 * @param sacf\field $field
	 * @param string $operator
	 * @param string $value
	 * @return void
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
	 * continue a previously started conditional logic: <code>and($field, operator='==', value='1')</code>
	 *
	 * @param sacf\field $field
	 * @param string $operator
	 * @param string $value
	 * @return void
	 */
	public function and ($field, $operator = '==', $value = '1') {
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
	 * continue a previously started conditional logic: <code>or($field, operator='==', value='1')</code>
	 *
	 * @param sacf\field $field
	 * @param string $operator
	 * @param string $value
	 * @return void
	 */
	public function or($field, $operator = '==', $value = '1') {
		// throw error if field is not of type field
		if (!is_subclass_of($field, '\sacf\field\base')) {
			\trigger_error(__('Confitional logics $field must be a field. In function "', 'sacf') . __FUNCTION__ . '"', E_USER_NOTICE);
		}
		$this->if($field, $operator, $value);
		return $this;
	}

	/**
	 * get field key
	 *
	 * @return void
	 */
	public function get_key() {
		return $this->key;
	}

	/**
	 * add a field directly to a field group
	 *
	 * @param sacf\group $group
	 * @return void
	 */
	public function add_to($group) {
		$group->add($this);
		return $this;
	}

	/**
	 * display all useful functions for this field
	 *
	 * @return void
	 */
	public function help() {
		\sacf\utils::help_for_field($this);
		return $this;
	}

	/**
	 * create the field array
	 *
	 * @return void
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
	 * clone a field to a different label/name
	 *
	 * @param boolean $label
	 * @param boolean $name
	 * @return void
	 */
	public function clone($label=false, $name=false) {
		$clone = unserialize(serialize($this));
		if($label) {
			$clone->label = $label;
		}

		if($name) {
			$clone->name = $name;
			$clone->make_key($name);
		}

		return $clone;
	}

	/**
	 * compile conditional logic
	 *
	 * @return void
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
	 *
	 * @param string $salt
	 * @return void
	 */
	public function make_key($salt) {
		if (!isset($this->name)) {
			return $this;
		}
		$this->key = \sacf\utils::key_field($this->key, $salt);
		return $this;
	}

}
