<?php

/**
 * Registers a new field group
 *
 * @since 2.0.0
 * @package sacf
 */

namespace sacf;

class group {

	private $fields = array();
	private $location = array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'post')));
	private $is_default_location = true;
	private $defaults = array(
		'menu_order' => 0,
		'position' => 'normal', // side
		'style' => 'default', // seamless
		'label_placement' => 'top', // left
		'instruction_placement' => 'label', // field
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	);
	public $label; // the groups title
	public $name; // the groups id
	public $key;
	protected static $group_count = 0;
	// hide_on_screen array
	/* array (
	                0 => 'permalink',
	                1 => 'the_content',
	                2 => 'excerpt',
	                3 => 'custom_fields',
	                4 => 'discussion',
	                5 => 'comments',
	                6 => 'revisions',
	                7 => 'slug',
	                8 => 'author',
	                9 => 'format',
	                10 => 'page_attributes',
	                11 => 'featured_image',
	                12 => 'categories',
	                13 => 'tags',
	                14 => 'send-trackbacks',
*/

	public function __construct($title, $name = false) {
		$this->label = $title;
		$this->name = $name ? sanitize_title($name) : sanitize_title($title);
		$this->key = utils::key_group($this->name);

		self::$group_count++;
	}

	/**
	 * @help: sets manually sorting of field groups: 0, 1, 2, ...
	 */
	public function menu_order($int) {
		$this->defaults['menu_order'] = $int;
		return $this;
	}
	/**
	 * @help: sets fieldgroup position: normal, acf_after_title, side
	 */
	public function position($string = 'side') {
		$this->defaults['position'] = $string;
		return $this;
	}

	/**
	 * @help: sets fieldgroup box style: default, seamless
	 */
	public function style($string = 'seamless') {
		$this->defaults['style'] = $string;
		return $this;
	}
	/**
	 * @help: sets label placement: top, left
	 */
	public function label_placement($string = 'left') {
		$this->defaults['label_placement'] = $string;
		return $this;
	}

	/**
	 * @help: sets instruction placement: label, field
	 */
	public function instruction_placement($string = 'field') {
		$this->defaults['instruction_placement'] = $string;
		return $this;
	}

	/**
	 * @help: hides meta boxes: array (	0 => 'permalink', 1 => 'the_content', 2 => 'excerpt', 3 => 'custom_fields', 4 => 'discussion', 5 => 'comments', 6 => 'revisions', 7 => 'slug', 8 => 'author', 9 => 'format', 10 => 'page_attributes', 11 => 'featured_image', 12 => 'categories', 13 => 'tags', 14 => 'send-trackbacks' );
	 */
	public function hide_on_screen($array) {
		$this->defaults['hide_on_screen'] = $array;
		return $this;
	}

	/**
	 * @help: activates/deactives field group
	 */
	public function active($bool = true) {
		$this->defaults['active'] = $bool;
		return $this;
	}
	/**
	 * @help: deactives field group
	 */
	public function inactive($bool = false) {
		return $this->active($bool);
	}

	/**
	 * @help: sets a description
	 */
	public function description($string) {
		$this->defaults['description'] = $string;
		return $this;
	}

	// creates one location array partial
	private function create_location_logic($p, $o, $v) {
		return array('param' => $p, 'operator' => $o, 'value' => $v);
	}
	/**
	 * @help: show this field group if: location(param, operator, value) as strings: (post_type, ==, project) or as acf array
	 */
	public function location($p, $o = '==', $v = 'post') {
		// directly set array
		if (is_array($p)) {
			$this->location = $p;
			$this->is_default_location = false;
			return $this;
		} else if ($this->is_default_location) {
			// reset default location
			$this->location = array();
			$this->is_default_location = false;
		}
		$this->location[][] = $this->create_location_logic($p, $o, $v);
		return $this;
	}
	/**
	 * @help: alias for location
	 */
	public function on($p, $o, $v) {
		return $this->location($p, $o, $v);
	}

	/**
	 * @help: add AND rule to location setting
	 */
	public function  and ($p, $o, $v) {
		$this->location[sizeof($this->location) - 1][] = $this->create_location_logic($p, $o, $v);
		return $this;
	}

	/**
	 * @help: add OR rule to location setting
	 */
	public function  or ($p, $o, $v) {
		return $this->location($p, $o, $v);
	}

	/**
	 * @help: clone field group for reuse
	 * @todo checkout - ask mo?
	 */
	public function copy($new_label, $new_name) {
		$new_obj = unserialize(serialize($this));
		$new_obj->name = $new_name;
		$new_obj->label = $new_label;
		self::$group_count++;
		return $this;
	}

	/**
	 * @help: adds fields to fieldgroup
	 */
	public function add($field) {
		$this->fields[] = $field;
		return $this;
	}

	/**
	 * @help: registers a fieldgroup with ACFs register_field_group function
	 */
	public function register() {
		if (function_exists('acf_add_local_field_group')) {
			acf_add_local_field_group($this->make());
		}
		return $this;
	}

	// creates array for fieldgroup
	private function make() {
		$arr = array();
		$arr['title'] = $this->label;
		$arr['key'] = $this->key;
		foreach ($this->fields as $field) {
			$arr['fields'][] = $field->make_key($this->name)->make();
		}
		$arr['location'] = $this->location;
		// @todo @deprecated ???
		$arr['menu_order'] = $this->defaults['menu_order'] ? $this->defaults['menu_order'] : self::$group_count;

		return wp_parse_args($arr, $this->defaults);
	}

	// additional location helper functions
	/**
	 * @help: shows fieldgroup on post type
	 * @param string $v The post type slug
	 */
	public function on_post_type($v = 'post') {
		return $this->on('post_type', '==', $v);
	}
	/**
	 * @help: shows fieldgroup on post template
	 * @param string $v The post template slug
	 */
	public function on_post_template($v = 'default') {
		return $this->on('post_template', '==', $v);
	}
	/**
	 * @help: shows fieldgroup on page template
	 * @param string $v The page template slug
	 */
	public function on_page_template($v = 'default') {
		return $this->on('page_template', '==', $v);
	}
	/**
	 * @help: shows fieldgroup on front page
	 * @param string $v The post type slug
	 */
	public function on_front_page() {
		return $this->on('page_type', '==', 'front_page');
	}
	/**
	 * @help: shows fieldgroup in ACF Gutenberg block
	 * @param string $v The block slug
	 */
	public function on_block($v) {
		$v = preg_replace('/^acf\//', '', $v);
		return $this->on('block', '==', 'acf/' . $v);
	}
	/**
	 * @help: shows fieldgroup on options page
	 * @param string $v The options page slug
	 */
	public function on_options($v) {
		// get options slug
		if ($v instanceof \sacf\optionspage) {
			$v = $v->get_slug();
		}
		return $this->on('options_page', '==', $v);
	}
	public function on_user_form($v = 'all') {
		return $this->on('user_form', '==', $v);
	}
	/**
	 * @help: shows fieldgroup only for certain roles
	 * @param string $v The users role
	 */
	public function on_user_role($v = 'administrator') {
		return $this->on('user_role', '==', $v);
	}

	public function get_key() {
		return $this->key;
	}

	/**
	 * @help: displays all useful functions for this group
	 */
	public function help() {
		\sacf\utils::help_for_group($this);
		return $this;
	}

	// @todo create php export like acf is doing
	public function export() {
		$groups = $this->make();
		var_dump($groups);
		return $this;
	}

}
